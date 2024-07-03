<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Player</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <audio id="audioPlayer" controls >
        <source src="uploads/connected.mp3" type="audio/mp3">
    </audio>

    <script>
        let currentAudio = ''; // Track the current audio URL

        function fetchLatestAudio() {
            $.ajax({
                url: 'get_audio.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        const audioPlayer = document.getElementById('audioPlayer');
                        if (data !== currentAudio) {
                            // Only update if new audio is different
                            audioPlayer.src = data;
                            audioPlayer.play();
                            currentAudio = data;
                        }
                    }
                },
                error: function(error) {
                    console.error('Error fetching latest audio:', error);
                }
            });
        }

        // Poll every 5 seconds
        setInterval(fetchLatestAudio, 3000);
    </script>
</body>
</html>
