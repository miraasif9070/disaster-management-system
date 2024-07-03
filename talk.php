<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Recorder</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #stopRecording {
            display: none;
        }
        .disabled-button {
            background-color: red;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <button id="startRecording">Start Recording</button>
    <button id="stopRecording">Stop Recording</button>
    <audio id="beepSound" src="beep.mp3" preload="auto"></audio> <!-- Add the beep sound file -->
    <script>
        const startButton = document.getElementById('startRecording');
        const stopButton = document.getElementById('stopRecording');
        const beepSound = document.getElementById('beepSound');
        let mediaRecorder;
        let chunks = [];
        let isRecording = false;

        function updateStatus(status) {
            return $.ajax({
                url: 'state.php',
                method: 'POST',
                data: { status: status },
            });
        }

        function checkStatus() {
            $.ajax({
                url: 'state.php',
                method: 'GET',
                success: function(response) {
                    const data = JSON.parse(response);
                    if (data.status === 1) {
                        startButton.disabled = true;
                        stopButton.disabled = true;
                        startButton.classList.add('disabled-button');
                        stopButton.classList.add('disabled-button');
                    } else {
                        if (!isRecording) {
                            startButton.disabled = false;
                            stopButton.disabled = true;
                            startButton.classList.remove('disabled-button');
                            stopButton.classList.remove('disabled-button');
                        }
                    }
                }
            });
        }

        function pollStatus() {
            setInterval(checkStatus, 2000); // Poll every 2 seconds
        }

        $(document).ready(function() {
            checkStatus();
            pollStatus();

            startButton.addEventListener('click', async () => {
                if (startButton.disabled) {
                    beepSound.play();
                    return;
                }
                const stream = await navigator.mediaDevices.getUserMedia({ audio: true });

                mediaRecorder = new MediaRecorder(stream);
                mediaRecorder.ondataavailable = (event) => {
                    chunks.push(event.data);
                };

                mediaRecorder.onstop = () => {
                    const audioBlob = new Blob(chunks, { type: 'audio/wav' });
                    chunks = [];
                    sendToServer(audioBlob);
                    isRecording = false;
                    updateStatus(0).then(() => {
                        startButton.style.display = 'inline';
                        stopButton.style.display = 'none';
                        startButton.disabled = false;
                        stopButton.disabled = true;
                        startButton.classList.remove('disabled-button');
                    });
                };

                mediaRecorder.start();
                isRecording = true;
                updateStatus(1).then(() => {
                    startButton.style.display = 'none';
                    stopButton.style.display = 'inline';
                    startButton.disabled = true;
                    stopButton.disabled = false;
                    stopButton.classList.remove('disabled-button');
                });
            });

            stopButton.addEventListener('click', () => {
                if (stopButton.disabled) {
                    beepSound.play();
                    return;
                }
                mediaRecorder.stop();
            });
        });

        function sendToServer(audioBlob) {
            const formData = new FormData();
            formData.append('audio', audioBlob);

            fetch('ajax.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(result => {
                console.log(result); // Display server response (e.g., success message)
            })
            .catch(error => {
                console.error('Error uploading audio:', error);
            });
        }
    </script>
</body>
</html>
