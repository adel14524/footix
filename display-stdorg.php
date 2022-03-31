<?php
	session_start();
	include_once 'dbConn.php';
	include_once 'h-admin.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Stadium Organiser</title>
	<style type="text/css">
		body{
			margin:0px;
			padding: 0px;
			font-family: sans-serif;
		}
	
		.new{
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
		.add-new-product{
			width: 800px;
			display: flex;
			flex-wrap: wrap;
			justify-content: flex-end;

		}

		.add-new-product img{
			margin-top: 5px;
			height: 30px;
			width: 30px;
		}

		.add-new-product a{
			display: flex;
			flex-direction: row-reverse;
			text-decoration: none;
			color: white;
		}

		.add-label{
			border-radius: 10px;
			margin-left: -10px;
			text-align: center;
			padding: 10px;
			background-color:  #6abd7a;
		}

		.all-item{
			margin: 50px;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.item{
			width: 800px;
			border: 1px solid gray;
			border-radius: 10px;
			display: flex;
			flex-direction: row;
			padding: 10px;
		}

		.item-img img{
			width: 100px;
			height: 100px;
		}

		.item-desc-price-quantity{
			width: 350px;
			margin: 15px 30px;
		}
		
		.item-desc, .item-price, .item-quantity{
			margin-top: 10px;
		}

		.item-update{
			margin: 20px 5px;
		}
		
		.input-num{
			border-radius: 10px;
			text-align: center;
			margin-top: 5px;
			border: 1px solid gray;
			width: 180px;
			height: 30px;
		}

		.button-submit{
			border: 1px transparent;
			box-shadow: 0px 0px 5px lightgray;
			border-radius: 10px;
			height: 30px;
			width: 100px;
			margin-top: 5px;
			margin-left: 40px;
			background-color: #6abd7a;
			color: white;
		}

		.button-submit a{
			color: white;
		}

		.button-delete a{
			color:white;
		}

		.button-delete{
			border: 1px transparent;
			box-shadow: 0px 0px 5px lightgray;
			border-radius: 10px;
			height: 30px;
			width: 100px;
			margin-top: 5px;
			margin-left: 40px;
			background-color: #f71735;
			color: white;
		}

		.button-delete:hover{
			background-color: #42cef5;
			box-shadow: 0px 0px 5px black;
		}

		.button-submit:hover{
			background-color: #42cef5;
			box-shadow: 0px 0px 5px black;
		}
	</style>
</head>
<body>
	<div class="title-page">
		<center><h1>STADIUM ORGANIZER</h1></center>
	</div>

	<div class="new">
		<div class="add-new-product">
			<div class="add-button">
				<a href="addStadiumOrg.php">
					<div class="add-label">Add New Stadium Organizer</div>
					<img src="image/add.png">
				</a>
			</div>
		</div>
	</div>


	<div class="update-form">
		
		<?php
			$class_items = "SELECT * FROM user WHERE role='StdOrg';";
			$result = mysqli_query($conn, $class_items);

			while ($record = mysqli_fetch_assoc($result)) {
				
		?>
			
			<div class="all-item">
					<div class="item">

						<div class="item-img">
							<img src="https://img.icons8.com/pastel-glyph/64/000000/person-male.png"/>
						</div>

						<div class="item-desc-price-quantity">
							<div>Username : <?php echo $record['username']; ?></div>
							<div class="item-desc">Email : <?php echo $record['email']; ?></div>
							<div class="item-desc">Address : <?php echo $record['address']; ?></div>
							<div class="item-desc">Phone : <?php echo $record['phone']; ?></div>
							<?php
								$stadium_id = $record['stadiumID'];

								$sql = "SELECT stadiumName FROM stadium WHERE stadiumID = '$stadium_id';";
								$res = mysqli_query($conn,$sql);

								while($row = mysqli_fetch_assoc($res)){
							?>
							<div class="item-desc">From <?php echo $row['stadiumName']; ?></div>
							<?php break;} ?>
						</div>

						<div class="item-update">
						<br><button type="submit" class="button-submit"><a href="update-stdorg.php?username=<?php echo $record['username']; ?>">Update</a></button>
						<button type="submit" class="button-delete"><a href="display-stdorg.php?action=delete&username=<?php echo $record['username']; ?>">Delete</a></button>
						</div>
						
					</div>
			</div>


		<?php
			}
		?>
	

	</div>
</body>
</html>

<?php
	if(isset($_GET['action'])){
		if($_GET['action'] == "delete"){
			$user = $_GET['username'];

			$sql = "DELETE FROM user WHERE username = '$user';";
			$res = mysqli_query($conn,$sql);

			if($res > 0)
			{
				echo "<script>alert('Stadium Organiser successfully deleted');";
				echo "window.location.href = 'display-stdorg.php';</script>";
			}
		}
	}
?>