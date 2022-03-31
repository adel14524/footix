<?php
	session_start(); //generate booking ID untuk 1 customer
	$_SESSION['totalPay']=0;
	include 'h-cust.php';
	include_once 'dbConn.php';
	if(isset($_GET['action'])){
	if($_GET['action'] == "cancel"){
		

		$temp_sql = "DELETE FROM temp WHERE bookingID = '".$_SESSION['bookingID']."' ;";
		$db = mysqli_query($conn, $temp_sql);

		$food_sql = "DELETE FROM food_booked WHERE bookingID = '".$_SESSION['bookingID']."' ;";
		$db = mysqli_query($conn, $food_sql);

	}
}
?>
<?php
	
	$sql_prod="SELECT * FROM game;";
	$result_prod=mysqli_query($conn,$sql_prod);

    $_SESSION['bookingID']="FOOTIX".uniqid();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Footix</title>
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			font-family: sans-serif;
			margin: 0px;
			padding: 0px;
		}
		
		.all-item{
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}
		.item-section{
			border: 1px transparent;
			margin: 15px;
			padding: 10px;
		}

		.item-type-name{
			border: 1px transparent;
			box-shadow: 3px 3px 5px lightgray;
			border-radius: 10px;
			text-align: center;
			margin: 30px 0px;
			padding: 10px;
		}

		.item{
			margin-bottom: 80px;
			padding: 10px;
			width: 1000px;
			height: 325px;
			border: 1px solid lightgray;
			border-radius: 5px;
			background-image: url('image/bg1.jpg');
			background-size: cover;
			background-repeat: no-repeat;
		}

		.item:hover{
			box-shadow: 0px 0px 5px gray;
		}

		.item-img img{
			margin: 5px;
			width: 140px;
			height: 140px;
		}

		.item-img{
			width:33.33%;
			float: left;
			text-align: center;
		}
		.item-caption{
			margin: 10px 5px;
			height: 40px;
		}
		.item-price{
			height: 25px;
			padding-top: 10px;
			font-size: 15px;
			color: black; /*#3fbf48*/
			margin: 10px 5px 0px 5px;
			font-family: 'Rubik', sans-serif;
			font-weight: bold;
			font-size: 17px;
		}

		.item-status{
			margin-top: 10px;
			font-family: 'Balsamiq Sans', cursive;
			border-radius: 7px;
			padding-top: 8px;
			border: 1px transparent;
			width: 100px;
			height: 25px;
		}

		.available{
			font-size: 15px;
			color: white;
			background-color: #65cf6c;
		}

		.sold-out{
			font-size: 15px;
			color: white;
			background-color: #de4f35;
		}

		.add-to-cart{
			margin-top: 10px;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.num-order{
			margin: 0px 5px;
			text-align: center;
			width: 250px;
			height: 30px;
			border: 1px solid lightgray;
			border-radius: 10px;
		}

		.add-button{
			width: 100px;
			height: 25px;
			margin-top: 7px;
			border-radius: 10px;
			border: 1px transparent;
			background-color: #65cf6c;
			color: white;
			box-shadow: 0px 0px 10px lightgray;
		}

		.add-button:hover{
			background-color: #42cef5;
			box-shadow: 0px 0px 7px black;
		}

		.item-cart{
			display: flex;
			flex-direction: row;
		}

		.item-cart img{
			margin: 5px;
			width: 140px;
			height: 140px;
		}
		
	</style>

</head>
<body>
	<?php 
	//untuk generate matchid dari tarikh (akan gabung dengan teamID1+teamID2+tarikh)
	$date   = new DateTime(); //this returns the current date time
	$result = $date->format('d-m-Y');
	//echo $result . "<br>";		
	$krr    = explode('-', $result);
	$result = implode("", $krr);
	//echo $result;
	?>
	<div class="all-item">
		
		<?php
			$item_type = array("Liga Super");
			$item_color = array('meat-seafood');
			$class_sequence = array('ms%');

			for ($i=0; $i < 1; $i++) { 
				$match = "SELECT * FROM game;";
				$result = mysqli_query($conn, $match); ?>

				<div class="item-section">
					<div class="item-type-name <?php echo $item_color[$i] ?>"><?php echo $item_type[$i] ?></div>

					<?php 
					while ($record = mysqli_fetch_assoc($result)) { 
					
						$team1="SELECT * FROM team where teamID='".$record['teamID1']."';";
						$run=mysqli_query($conn, $team1);
						while ($row = mysqli_fetch_assoc($run)) {
							$team1ID=$row['teamID'];
							$team1Name=$row['teamName'];
							$team1logo=$row['teamLogo'];
						}
						
						$team2="SELECT * FROM team where teamID='".$record['teamID2']."';";
						$run=mysqli_query($conn, $team2);
						while ($row = mysqli_fetch_assoc($run)) {
							$team2ID=$row['teamID'];
							$team2Name=$row['teamName'];
							$team2logo=$row['teamLogo'];
						}
						
						$stat="SELECT * FROM stadium where stadiumID='".$record['stadiumID']."';";
						$exec=mysqli_query($conn, $stat);
						while ($row = mysqli_fetch_assoc($exec)) {
							$statName=$row['stadiumName'];
						}
						?>

						<a href="selectSection.php?matchID=<?php echo $record['matchID'];?>&stadiumID=<?php echo $record['stadiumID'];?> "> 
                        <div class="item">
							
                            <div class="logo">
                                    <div class="item-img">
                                    <img src="<?php echo $team1logo; ?>"> 
                                    </div>
                                    <div class="item-img">
                                    <img src="<?php echo ("logo/VS.png"); ?>"> 
                                    </div>
                                    <div class="item-img" >
                                    <img src="<?php echo $team2logo; ?>"> 
                                    </div>
                            </div>
                        
                            <center>
                            <div class="item-price"><?php echo $statName; ?></div> 
                            <div class="item-price"><?php echo $record['date']; ?></div> 
                            <div class="item-price"> <?php echo ("8:45pm"); ?></div> 
                            </center>
                        </div>
                        </a>
				

					<?php
					}
					?>

				</div>
		
			<?php } ?>
		


	</div>
	
	

	
</body>
</html>