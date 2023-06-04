

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
                const api_transcription_url = 'https://api.openai.com/v1/audio/transcriptions'

                const audioBlob = new Blob(audioChunks, { type: 'audio/mp3' });
                const audioUrl = URL.createObjectURL(audioBlob);
                const player = document.querySelector("#recording");
                player.src = audioUrl;
                player.load();

                const form = new FormData();
                form.append("file", new File([audioBlob], 'audio.mp3', { type: "audio/mp3" }))
                form.append("model", "whisper-1")
                form.append("language", "tl")

                const headers = {
                    'Authorization': 'Bearer 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',
                }

                const transcript = await fetch(`${api_transcription_url}`, {
                    method: 'POST',
                    headers : headers,
                    body: form
                })

                if (!transcript.ok) {
                    return
                }

                let transcriptResult = await transcript.json();

                console.log(transcriptResult)

                if(transcriptResult.text) {
                    document.querySelector("#narrative").innerText = transcriptResult.text;
                }
            });

        });
});



