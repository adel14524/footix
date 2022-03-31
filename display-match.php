<?php
	session_start();
	include_once 'dbConn.php';
	include_once 'h-admin.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Match</title>
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
			margin-top: 5px;
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
		<center><h1>MATCH</h1></center>
	</div>

	<div class="new">
		<div class="add-new-product">
			<div class="add-button">
				<a href="addMatch.php">
					<div class="add-label">Add New Match</div>
					<img src="image/add.png">
				</a>
			</div>
		</div>
	</div>


	<div class="update-form">
		
		<?php
			$class_items = "SELECT * FROM game;";
			$result = mysqli_query($conn, $class_items);

			while ($record = mysqli_fetch_assoc($result)) {
		?>
			
			<div class="all-item">
					<div class="item">

						<div class="item-img">
							<img src="image/bg1.jpg">
						</div>

						<div class="item-desc-price-quantity">
							<div>Match ID : <?php echo $record['matchID']; ?></div>
							<div class="item-desc">Stadium ID : <?php echo $record['stadiumID']; ?></div>
							<div class="item-desc">Team 1 : <?php echo $record['teamID1']; ?></div>
							<div class="item-desc">Team 2 : <?php echo $record['teamID2']; ?></div>
							<div class="item-desc">Date : <?php echo $record['date']; ?></div>
						</div>

						<div class="item-update">
							<!--<input type="hidden" name="product_ID" value="<?php //echo $record['product_ID']; ?>">
							<input type="number" name="item_add" class="input-num" min="0" placeholder="Enter additional ammount"><br>-->
						<br><button class="button-submit"><a href="update-match.php?match-id=<?php echo $record['matchID']; ?>">Update</a></button>
						<button class="button-delete"><a href="display-match.php?action=delete&match-id=<?php echo $record['matchID']; ?>">Delete</a></button>
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
			$match_id = $_GET['match-id'];

			$sql = "DELETE FROM game WHERE matchID = '$match_id';";
			$res = mysqli_query($conn,$sql);

			if($res > 0)
			{
				echo "<script>alert('Match successfully deleted');";
				echo "window.location.href = 'display-match.php';</script>";
			}
		}
	}
	

	
?>