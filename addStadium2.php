<?php 

	session_start();
	include_once 'h-admin.php';
	include_once 'dbConn.php';

    if(isset($_GET['action'])){
    	if($_GET['action'] == "add"){

    		$stadiumID=$_POST['stadium-id'];
    		$stadiumName=$_POST['stadium-name'];
		    $section=$_POST['no-section'];
		    $file= "image/".$_POST['fileToUpload'];

		    $_SESSION['section'] = $section;
		    $_SESSION['stadiumID'] = $stadiumID;
		    $_SESSION['stadiumName'] = $stadiumName;
		    $_SESSION['upload'] = $file;

		    $_SESSION['loop'] = $_SESSION['section'];

    	}
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Stadium</title>
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			font-family: 'Rubik';
		}

		.container{
			width: 50%;
			height: 500px;
			border: 1px solid black;
			border-radius: 8px;
			margin: 40px;
			background-color: #2a9d8f;
		}

		.container h2{
			margin: 20px;
		}

		.form{
			margin: 20px;
		}

		.details{
			display: flex;
			flex-direction: column;
			margin: 60px 30px 30px 30px;
		}

		.part-detail{
			margin: 10px 0px;
			display: flex;
			flex-direction: row;
		}

		.label{width: 150px; padding: 10px; margin: 9px;}
		.data-cust{width: 550px; padding: 10px;}

		.data-cust input{
			width: 90%;
			height: 30px;
			font-weight: bold;
		}

		.submit input{
			width: 640px;
			height: 50px;
			background-color: #d90429;
			color: #e6e6ea;
			font-family: 'Poppins', sans-serif;
			font-size: inherit;
			font-weight: 600;
			margin: 30px;
			outline: none;
		}
	</style>
</head>
<body>
	<script type="text/javascript">

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
	<center>
		<div class="container">
			<h2>Add new stadium</h2>

			<div class="details">
				<div class="part-detail">
					<div class="label">STADIUM ID</div>
					<div class="data-cust">
						<input type="text" placeholder="<?php echo $_SESSION['stadiumID']; ?>"> 
					</div>
				</div>
				<div class="part-detail">
					<div class="label">STADIUM NAME</div>
					<div class="data-cust">
						<input type="text"placeholder="<?php echo $_SESSION['stadiumName']; ?>">
					</div>
				</div>
				<div class="part-detail">
					<div class="label">NO OF SECTION</div>
					<div class="data-cust">
						<input type="text" placeholder="<?php echo $_SESSION['section']; ?>"> 
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<h2>Please fill in Section Information</h2>

			<form action="addStadium2.php?action=edit" method="POST" enctype="multipart/form-data">
				<div class="details">
					<div class="part-detail">
						<div class="label">SECTION</div>
						<div class="data-cust">
							<input type="text" name="section" required> 
						</div>
					</div>
					<div class="part-detail">
						<div class="label">PRICE</div>
						<div class="data-cust">
							<input type="text" name="price" required>
						</div>
					</div>
					<div class="part-detail">
						<div class="label">SEAT</div>
						<div class="data-cust">
							<input type="text" name="seat" required> 
						</div>
					</div>
				</div>
				<div class="submit">
					<input type="submit" name="submit" value="ADD">
				</div>
			</form>
		</div>
	</center>
</body>
</html>

<?php
	if(isset($_GET['action'])){
    	if($_GET['action'] == "edit"){

    		$sec = $_POST['section'];
    		$price = $_POST['price'];
    		$seat = $_POST['seat'];
    		$stad_id = $_SESSION['stadiumID'];
    		$stad_name = $_SESSION['stadiumName'];
    		$folder = $_SESSION['upload'];

    		$sql = "INSERT INTO stadium(stadiumID,stadiumName,stadiumLayout,section,price,seat) VALUES ('$stad_id','$stad_name','$folder','$sec','$price','$seat');";
    		$result = mysqli_query($conn,$sql);

    		$_SESSION['loop'] = $_SESSION['loop'] - 1;

    		if($_SESSION['loop'] > 0 ){
				echo "<script>window.location.href = 'addStadium2.php';</script>";
    		}
    		else{
    			echo "<script>alert('You have successfully add all stadium information');</script>";
				echo "<script>window.location.href = 'addStadium.php';</script>";
    		}

    	}
    }
?>