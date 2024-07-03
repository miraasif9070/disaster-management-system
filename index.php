<?php 

	require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Slider</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        section {
            position: relative;
            width: 100%;
            height: 400px;
        }

        section video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        section .navigation {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 100;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section .navigation li {
            list-style: none;
            cursor: pointer;
            margin: 0 10px;
            border-radius: 5px;
            background: #fff;
            
            overflow: hidden;
            opacity: 0.7;
            transition: 0.5s;
        }

        section .navigation li:hover {
            opacity: 1;
        }

        section .navigation li img {
            width: 120px;
            transition: 0.5s;
        }

        section .navigation li img:hover {
            width: 200px;
        }

        .score {
            width: 90%;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: lightgray;
            text-align: center;
        }

        .score-1 {
            width: 200px;
            height: 150px;
            background-color: white;
            border: 1px solid lightgray;
        }

        .score-1 h2 {
            color: #23a134;
            padding: 30px;
        }

        .score-1 p {
            color: blue;
            font-family: arial;
            font-weight: bold;
        }

        .text-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            
            padding: 20px;
            border-radius: 10px;
            color: #000;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .text-container h2 {
            margin-bottom: 10px;
            font-size: 24px;
            color: yellow;
            background-color: black;
            font-style: italic;
        }

        .text-container p {
            font-size: 18px;
            color: blue;
        }

    </style>
</head>

<body>
    <section>
        <video id="slider" autoplay loop muted>
            <source src="videos/v3.mp4" type="video/mp4">
        </video>
        <div class="text-container">
            <h2 id="chg">Volcanic Eruption</h2>
            <p>Description or some colorful text</p>
        </div>
        <ul class="navigation">
            <li><img onclick="videoUrl('videos/v1.mp4,')" src="images/img-1.jpg" alt=""></li>
            <li><img onclick="videoUrl('videos/v2.mp4')" src="images/img-2.jpg" alt=""></li>
            <li><img onclick="videoUrl('videos/v3.mp4',' Volcanic Erruption')" src="images/img-3.jpg" alt=""></li>
            <li><img onclick="videoUrl('videos/v4.mp4')" src="images/img-4.jpg" alt=""></li>
        </ul>
    </section>

    <div class="score">
        <div class="score-1">
            <h2>102689</h2>
            <p>Donations Collected</p>
        </div>
        <div class="score-1">
            <h2>56865</h2>
            <p>Usage</p>
        </div>
        <div class="score-1">
            <h2>4265</h2>
            <p>Benfitted</p>
        </div>
        <div class="score-1">
            <h2>256</h2>
            <p>Volunteers</p>
        </div>
    </div>

    <script>
        function videoUrl(url,text) {
            document.getElementById("slider").src = url;
            document.getElementById("chg").innerText = text;
        }
    </script>
</body>

</html>
