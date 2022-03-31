<?php
	session_start();
	include_once 'dbConn.php';

	$_SESSION['stadiumID'] = $_GET['stadium-id'];
	$_SESSION['section'] = $_GET['section'];

	$stadium = $_SESSION['stadiumID'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Stadium</title>
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<meta charset=utf-8 />
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			font-family: sans-serif;
			margin: 0px;
			padding: 0px;
			height: 900px;
			background-color: #fff;
		}

		
		.all-item{
			margin-left: 250px;
			margin-right: 250px;
			margin-bottom: 70px;
			margin-top: 30px;
			background-color: #2a9d8f;
			border: 1px solid gray;
			border-radius: 10px;
			height: 700px;
			box-shadow: 0px 0px 20px darkgray;
		}

		.tajuk{
			margin-left: 20px;
		}

		.addForm{
			width: auto;
			padding: 20px;
			height: 400px;
		}

		.leftcol,.rightcol{
			width: 45%;
			float: left;
			padding: 20px;
			height: 100%;
		}

		.input-col2{
			margin-top: 20px;
		}

		.input-col2 .gambar .logo{
			position: absolute;
  			top: 50%;
			left: 65%;
			width: 48px;
			height: 48px;
		}

		.input-col2-BTN{
			margin-top: 10px;
			width: auto;
			
		}

		button{
			width: 950px;
			height: 50px;
			margin-top: 80px;
			background-color: #d90429;
			color: #e6e6ea;
			font-family: 'Poppins', sans-serif;
			font-size: inherit;
			font-weight: 600;
			margin-bottom: 1rem;
			outline: none;
			
		}

		.gambar{
			border: 50px;
			height: 250px;
			width: auto;
			background-image: url("upload.png");
			background-repeat: no-repeat;
			background-position: 50% 50%;
			background-color: #fff;
			border: 1px solid gray;
			border-radius: 10px;
		}
		.gambar img{
			height: 250px;
		}
		
		.addForm:after {
			content: "";
			display: table;
			clear: both;
		}
		
		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: block;
			border: 1px solid black;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type="file"] {
			height: 0;
			overflow: hidden;
			width: auto;
		}

		input[type="file"] + label {
			background: #d90429;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			display: inline-block;
			font-family: 'Poppins', sans-serif;
			font-size: inherit;
			font-weight: 600;
			margin-bottom: 1rem;
			outline: none;
			padding: 1rem 50px;
			position: relative;
			transition: all 0.3s;
			vertical-align: middle;
		}

		
		@media screen and (max-width: 600px) {
		.addForm {
			width: 100%;
			
		}
		}
		
	</style>
</head>
<body>
	<script type="text/javascript">
		function success() {
			alert("Successfull add new product ");
			window.location("addProduct.php");
		  }
		function appear(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#blah')
						.attr('src', e.target.result)
						.width(400)
						.height(250);
				};

				reader.readAsDataURL(input.files[0]);
			}
		} 
	</script>
	
	
		
	<div class="all-item">
		
		<div class="tajuk">
			<h1>Update Stadium</h1>
		</div>

		<form action="process-update-stadium.php?action=edit" method="POST" enctype="multipart/form-data ">
		<div class="addForm">
			<?php 
				$sql = "SELECT * FROM stadium WHERE stadiumID = '$stadium' AND section = '".$_SESSION['section']."';";
				$result = mysqli_query($conn,$sql);

				while($record = mysqli_fetch_assoc($result)){
					$stadiumID = $record['stadiumID'];
					$stadiumName = $record['stadiumName'];
					$stadiumLayout = $record['stadiumLayout'];
					$sec = $record['section'];
					$price = $record['price'];
					$seat = $record['seat'];
				}

			?>
				<div class="leftcol ">
					<div class=input-col1>
						<label for="prodId">STADIUM ID</label>
						<input type="text" id="stadium-id" name="stadium-id" value="<?php echo $stadiumID;?>" required><br>
					</div>
					<div class="input-col1">
						<label for="prodId">STADIUM NAME</label>
						<br><input type="text" name="stadium-name" value="<?php echo $stadiumName;?>" required><br>
					</div>
					<div class="input-col1">
						<label for="prodId">SECTION</label>
						<input type="text" name="section" value="<?php echo $sec;?>" required><br>
					</div>
					<div class="input-col1">
						<label for="prodId">PRICE</label>
						<input type="text" name="price" value="<?php echo $price;?>" required><br>
					</div>
					<div class="input-col1">
						<label for="prodId">SEAT</label>
						<input type="text" name="seat" value="<?php echo $seat;?>" required><br>
					</div>
				</div>
				<div class="rightcol" >
					<center>
					<div class="input-col2">
						<div class="gambar">
							<img id="blah" src="<?php echo $stadiumLayout;?>"/>
						</div>
					</div>
					<div class="input-col2-BTN">
						<input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $stadiumLayout;?>" onchange="appear(this)" required>

						<label for="fileToUpload">Upload Stadium</label>
					</div>
					</center>
				</div>
		 </div>
			<center><button type="submit" value="Add product" name="submit">UPDATE STADIUM</button></center>
		
	</form>
			  
	</div>


</body>
</html>