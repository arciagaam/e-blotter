window.addEventListener('load', () => {
    const recordBtn = document.querySelector('#record');
    const recordIcon = document.querySelector('#record-state');

    if (recordBtn && recordIcon) {
        try {
            navigator.mediaDevices.getUserMedia({ audio: true, video: false })
                .then((stream) => {
                    const mediaRecorder = new MediaRecorder(stream, { mimeType: 'audio/webm;codecs=opus' });
                    const audioChunks = [];

                    recordBtn.addEventListener('click', () => {
                        if (mediaRecorder.state === 'recording') {
                            mediaRecorder.stop();
                        } else {
                            mediaRecorder.start();
                        }
                    });

                    mediaRecorder.addEventListener('dataavailable', event => {
                        audioChunks.push(event.data);
                    });

                    mediaRecorder.addEventListener('error', () => {
                        mediaRecorder.stop();
                    });

                    mediaRecorder.addEventListener('start', () => {
                        recordBtn.classList.add('recording');
                        recordIcon.setAttribute('name', 'stop');
                    });

                    mediaRecorder.addEventListener('stop', async () => {
                        recordBtn.classList.remove('recording');
                        recordIcon.setAttribute('name', 'microphone');

                        const api_transcription_url = 'https://api.openai.com/v1/audio/transcriptions'

                        const audioBlob = new Blob(audioChunks, { type: 'audio/mp3' });
                        const audioUrl = URL.createObjectURL(audioBlob);
                        const player = document.querySelector("#recording");

                        const fileInput = document.querySelector("#narrative_file");
                        const file = new File([audioBlob], 'audio.mp3', { type: 'audio/mpeg' });
                        const container = new DataTransfer();
                        container.items.add(file);

                        fileInput.files = container.files;

                        player.src = audioUrl;
                        player.load();

                        const form = new FormData();
                        form.append("file", new File([audioBlob], 'audio.mp3', { type: "audio/mp3" }))
                        form.append("model", "whisper-1")
                        form.append("language", "tl")

                        const headers = {
                            'Authorization': `Bearer ${document.querySelector('meta[name="openai-token"]').content}`

                        }

                        const transcript = await fetch(`${api_transcription_url}`, {
                            method: 'POST',
                            headers: headers,
                            body: form
                        })
                        
                        if (!transcript.ok) {
                            return
                        }

                        let transcriptResult = await transcript.json();

                        if (transcriptResult.text) {
                            document.querySelector("#narrative").innerText = transcriptResult.text;
                        }
                    });
                }).catch((err) => {
                    if (err.message === 'Permission denied') {
                        recordBtn.disabled = true;

                        setTimeout(() => {
                            alert(`${err.message}. Please enable the microphone and refresh to use the recording feature.`);
                        }, 100);
                    } else {
                        alert(err);
                    }
                })
        } catch (error) {
            alert(error);
        }
    }
});