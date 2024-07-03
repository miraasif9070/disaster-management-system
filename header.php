<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Head</title>
	<style>

		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		.container{
			z-index: 1;
			
			width: 100%;
			height: 140px;
			
		}
		.top{
			width: 80%;
			margin: auto;
			height: 70px;
			
			display: flex;
			justify-content: space-between;
			align-items: center;
			
			padding: 10px;
		}
		.left{
			display: flex;

		}
		.left p{
			font-size: 18px;
			text-indent: 20px;
		}
		.logo{
			width: 70px;
			height: 70px;
		}
		.right {
			display: flex;


		}
		.right p{
			background-color: green;
			color: white;
			padding: 10px;
			border-radius: 10px;
			font-size: 18px;
			font-weight: bold;
			margin: 5px;

		}

		.nav{
			display: flex;
			justify-content: center;
			align-items: center;
			width: 90%;
			height: 70px;
			margin: auto;
			z-index: 2;
			color: white;
			

		}
		.nav-bar{
			padding: 20px;
			background-color: red;
			
			border: 1px solid gray;

			text-align: center;
		}
		.nav-bar:first-child{
			border-radius: 10px 0px 0px 10px;
		}
		.nav-bar:last-child{
			border-radius: 0px 10px 10px 0px;
		}
	</style>
</head>
<body>

	<div class="container">

		<div class="top">

			<div class="left">
				<div class="logo">
					<img src="images/logo.png" width="100%" height="100%">
				</div>
				<div>
				<h1> &nbsp;Disaster Management System <sup>NGO</sup></h1>
				<p>Please come farword to save our Earth</p>
			</div>
			</div>

			<div class="right">
				<p style="background-color: blue;">JOIN US</p>
				<p>Donate Now</p>
			</div>
			
		</div>

		<div class="nav">
			<div class="nav-bar">
				<p>Home</p>
			</div>

			<div class="nav-bar">
				<p>About Us</p>
			</div>

			<div class="nav-bar">
				<p>Types of Disasters</p>
			</div>

			<div class="nav-bar">
				<p>Safety Tips</p>
			</div>

			<div class="nav-bar">
				<p>Real Time</p>
			</div>

			<div class="nav-bar">
				<p>Gallery</p>
			</div>
		</div>
		
	</div>

</body>
</html>