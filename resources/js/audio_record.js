

document.querySelector("#record").addEventListener('click', () => {
    navigator.mediaDevices.getUserMedia({ audio: true })
        .then(stream => {
            const mediaRecorder = new MediaRecorder(stream);
            mediaRecorder.start();

            const audioChunks = [];
            mediaRecorder.addEventListener("dataavailable", event => {
                audioChunks.push(event.data);
            });

            document.querySelector("#stop_record").addEventListener('click', () => {
                mediaRecorder.stop();
            });

            mediaRecorder.addEventListener("stop", async () => {
                const api_base_url = 'https://api.assemblyai.com/v2'

                const audioBlob = new Blob(audioChunks, { type: 'audio/mp3' });
                const audioUrl = URL.createObjectURL(audioBlob);
                const player = document.querySelector("#recording");
                player.src = audioUrl;
                player.load();

                const form = new FormData();
                form.append("file", new File([audioBlob], 'audio.mp3', { type: "audio/mp3" }))
                form.append("model", "whisper-1")
                form.append("language", "tl")

                const theFile = new File([audioUrl], 'audio.mp3');

                console.log(theFile)
                console.log(audioBlob)

                const uploadFile = await fetch(`${api_base_url}/upload`, {
                    method: 'POST',
                    headers: {
                        'Authorization': '60248e6836ab484dbe4bd03c22507148',
                        "Transfer-Encoding": "chunked"
                    },
                    body: {
                        data: audioBlob 
                    },

                });

                if (!uploadFile.ok) {
                    return
                }

                const response = await uploadFile.json()

                console.log(response)

                const transcript = await fetch(`${api_base_url}/transcript`, {
                    method: 'POST',
                    headers: {
                        'Authorization': '60248e6836ab484dbe4bd03c22507148',
                    },
                    body: JSON.stringify({
                        audio_url: response.upload_url,
                    }),
                })

                if (!transcript.ok) {
                    return
                }

                let transcriptResult = await transcript.json();

                console.log(transcriptResult.id)

                while (true) {
                    const finalTranscript = await fetch(`${api_base_url}/transcript/${transcriptResult.id}`, {
                        headers: {
                            'Authorization': '60248e6836ab484dbe4bd03c22507148',
                        },
                    });
                    console.log(finalTranscript)

                    let transcriptionResult = await finalTranscript.json();


                    if (transcriptionResult.status === 'completed') {
                        document.querySelector('#narrative').innerText = transcriptionResult.text;
                        break
                    } else if (transcriptionResult.status === 'error') {
                        throw new Error(`Transcription failed: ${transcriptionResult.error}`)
                    } else {
                        await new Promise((resolve) => setTimeout(resolve, 3000))
                    }
                }




            });

        });
});



