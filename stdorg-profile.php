<?php
session_start();
	include_once 'dbConn.php';
	include_once 'h-org.php';

	$id = $_SESSION['stadiumID'];

	//$_SESSION['username']=$_POST['']
	$username = $_SESSION['US']; //real session for username = $_SESSION['US'];
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
	<style type="text/css">
		body{
			margin: 0px;
			padding: 0px;
		}
		.main-box{
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin-bottom: 50px;
		}

		.my-account{
			margin: 10px 30px;
			box-shadow: 0px 0px 20px darkgray;
			border-radius: 20px;
			height: auto;
			width: 550px;
			border: 1px solid black;
		}

		.my-account-box, .details{
			display: flex;
			flex-direction: column;
			margin: 5px;
		}

		.title-myaccount{
			text-align: center;
			height: 55px;
			width: auto;
		}

		.part-detail{
			margin: 10px 0px;
			display: flex;
			flex-direction: row;
		}

		.label{width: 150px; padding: 10px; }
		.data-cust{width: 300px;}

		.data-cust input{
			color: black;
			font-weight: bold;
			width: 250px;
			background-color: #f2efe4;
			border: 1px transparent;
			border-radius: 10px;
			padding: 5px 7px;
		}

		.form-button{
			padding-top: 60px;
			padding-bottom: 20px;
			margin: 20px;
			display: flex;
			flex-direction: row;
		}

		.reset-button button, .update-button button{
			height: 40px;
			border: 1px transparent;
			border-radius: 10px;
			margin-left: 30px;
			padding: 0px 15px;
			color: white;
			transition-duration: 0.3s;
		}

		.reset-button button{
			background-color: #c97a73;
		}

		.update-button button{
			background-color: #73c974;
		}

		.reset-button button:hover, .update-button button:hover{
			opacity: 0.9;
			color: black;
			box-shadow: 0px 0px 5px black;
		}

		.order-history{
			margin: 10px 30px;
			border: 1px solid black;
			border-radius: 20px;
			box-shadow: 0px 0px 20px darkgray;
			width: 600px;
			height: 600px;
			display: flex;
			flex-direction: column;
		}

		.title-order-history{
			padding-bottom: 10px;
			text-align: center;
		}
		
		.table-order-history{
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			margin: 10px;
			overflow-y:auto;
		}

		table, th, td{
			text-align: center;
			border-collapse: collapse;
		}

		tr{
			border: 1px solid black;
		}
		.order-id{
			background-color: #8de391;
		}

		th, td{
			width: 200px;
			height: 40px;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}

		a{
			color: black;
		}

	</style>
</head>
<body>

	<div class="main-box">
		<div class="my-account">
			<div class="my-account-box">
				<div class="title-myaccount">
					<h3>My Account</h3>
				</div>
				<form method="POST" action="stdorg-profile.php?action=edit">
				<?php

				$sql = "SELECT * FROM user WHERE username = '$username';"; //adel123 ni ubah kepada $_SESSION['username']
				$result = mysqli_query($conn, $sql);

				$user = $pass = $email = $address = $phone = "";

				while ($record = mysqli_fetch_assoc($result)) {
					$user = $record['username'];
					$pass = $record['password'];
					$email = $record['email'];
					$phone = $record['phone'];
					$address = $record['address'];
				}

				?>
					<div class="details">
						<div class="part-detail">
							<div class="label">Your Username</div>
							<div class="data-cust">: &nbsp
								<?php echo $user ;?> 
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Your Password</div>
							<div class="data-cust">: 
								<input type="password" name="pass" value="<?php echo $pass ;?>"  required>
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Your Email</div>
							<div class="data-cust">: 
								<input type="text" name="email" value="<?php echo $email ;?>" placeholder="<?php echo $email ;?>" required>
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Phone Number </div>
							<div class="data-cust">: 
								<input type="text" name="phoneNo" value="<?php echo $phone ;?>" placeholder="<?php echo $phone ;?>" required>
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Address </div>
							<div class="data-cust">: 
								<input type="text" name="address" value="<?php echo $address ;?>" placeholder="<?php echo $address ;?>" required>
							</div>
						</div>
					</div>

					<input type="hidden" name="user" value="<?php echo $user ;?>">

					<div class="form-button">
						<div class="reset-button">
							<button type="reset" value="Reset">Reset</button>
						</div>
						<div class="update-button">
							<button type="submit" value="edit">Update My Account</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

</body>
</html>

<?php
	include_once 'dbConn.php';
	
	if(isset($_GET['action'])){
		if($_GET['action'] == "edit"){
			$user = $_POST['user'];
			$new_email = $_POST['email'];
			$new_password = $_POST['pass'];
			$new_phoneNo = $_POST['phoneNo'];
			$new_address = $_POST['address'];

			$sql = "UPDATE user SET email='$new_email', password='$new_password', phone='$new_phoneNo', address='$new_address' WHERE username='$user';";
			$result = mysqli_query($conn, $sql);

			echo '<script>alert("Your Profile has been UPDATED!")</script>';
            echo '<script>window.location="stdorg-profile.php"</script>';
		}
	}

?>

