<?php
	include 'h-cust.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amethysta">
	<style type="text/css">

		body{
			margin: 0;
			padding: 0;
		}

		.team-section{
			overflow:hidden;
			text-align: center;
			background: #34495e;
			width: 100%;
			font-family: 'Amethysta';
		}

		.top-nav{
			background-color: #f5f5f5;
			height: 70px;
			width: 100%;
			margin: 0px;
		}
		
		.bar-nav{
			margin-right: 250px;
			float: right;
			display: flex;
			flex-wrap: wrap;
		}

		.nav-menu-1{
			font-family: 'Francois One', sans-serif;
			color: #969090;
			text-align: center;
			border: 1px transparent;
			width: 120px;
			margin: 10px;
		}
		.nav-menu-1:hover{
			color: #264082; 
		}

		.team-section h1{
			text-transform: uppercase;
			margin-top: 60px;
			margin-bottom: 60px;
			color:white;
			font-size: 40px;
			background-color: #34495e;
		}

		.border{
			display: block;
			margin: auto;
			width: 160px;
			height: 3px;
			background: #3498db;
			margin-bottom: 40px;
		}

		.ps {
			margin-bottom: 40px;
		}

		.ps a {
			display: inline-block;
			margin: 0 30px;
			width: 160px;
			height: 160px;
			overflow: hidden;
			border-radius: 50%;
		}

		.ps a img {
			width: 100%;
			filter: grayscale(100%);
			transition: 0.4s all;
		}

		.ps a:hover > img{
			filter: none;
		}

		.section {
			width: 600px;
			margin: auto;
			font-size: 20px;
			color: white;
			text-align: justify;
			height: 0;
			overflow: hidden;
		}

		.section:target{
			height: auto;
		}

		.name{
			display: block;
			margin-bottom: 30px;
			text-align: center;
			text-transform: uppercase;
			font-size: 22px;
		}

		p{
			text-align: center;
		}
		</style>
</head>
<body>
	<div class="team-section">
		<h1>Our Team</h1>
		<span class="border"></span>
		<div class="ps">
			<a style="padding-top: 0;" href="#p1"><img src="img-aboutus/img1.jpeg"></a>
			<a style="padding-top: 0;" href="#p2"><img src="img-aboutus/img2.jpeg"></a>
			<a style="padding-top: 0;" href="#p3"><img src="img-aboutus/img3.jpg"></a>
			<a style="padding-top: 0;" href="#p4"><img src="img-aboutus/img4.jpg"></a>
			<a style="padding-top: 0;" href="#p5"><img src="img-aboutus/img5.jpg"></a>
		</div>

		<div class="section" id="p1">
			<span class="name">A'dilah</span>
			<span class="border"></span>
			<p>
				Name : Siti Nur A'dilah Binti Hasnor             
				<br>StudentID : 2018659582
			</p>
		</div>

		<div class="section" id="p2">
			<span class="name">Arini</span>
			<span class="border"></span>
			<p>
				Name : Radin Arini Binti Radin Mohd Mokhtar
				<br>Student ID : 20185214251
			</p>
		</div>

		<div class="section" id="p3">
			<span class="name">Faizzatul</span>
			<span class="border"></span>
			<p>
				Name : Faizzatul Izzah Binti Zulkifli
				<br>Student ID : 20186532451
			</p>
		</div>

		<div class="section" id="p4">
			<span class="name">Zarfan</span>
			<span class="border"></span>
			<p>
				Name : Zarfan Fakhri Bin 
				<br>Student ID : 201865241754
			</p>
		</div>

		<div class="section" id="p5">
			<span class="name">Luqman</span>
			<span class="border"></span>
			<p>
				Name : Muhammad Luqman Hakim Bin Rohaizi
				<br>Student ID : 2018457821
			</p>
		</div>
	</div>

	
</body>
</html>