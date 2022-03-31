<?php
	include_once 'dbConn.php';
	include_once 'h-cust.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Booking Details</title>
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
			height: 500px;
			width: 600px;
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
			width: 400px;
		}

		.part-detail{
			margin: 10px 0px;
			display: flex;
			flex-direction: row;
		}

		.label{width: 150px; padding: 10px; }
		.data-cust{width: 300px; padding: 10px;}

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
			margin-top: 30px;
			margin-bottom: 30px;
			display: flex;
			flex-direction: row;
		}

		.reset-button button, .update-button button{
			height: 50px;
			width: 150px;
			font-size: 15px;
			border: 1px transparent;
			align-items: center;
			border-radius: 10px;
			margin-left: 30px;
			padding: 0px 15px;
			color: white;
			transition-duration: 0.3s;
		}

		.update-button{
			margin-left: 0px;
			margin-right: auto;
		}

		.reset-button{
			margin-left: auto;
			margin-right: 100px;
		}

		.reset-button a{
			color: white;
		}

		.update-button a{
			color: white;
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
			height: 500px;
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
		}

		.total-price{
			margin-left: auto;
			margin-right: auto;
			border: 1px solid black;
			border-radius: 20px;
			box-shadow: 0px 0px 20px darkgray;
			width: 1170px;
			height: 100px;
			display: flex;
			flex-direction: column;
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
			width: 180px;
			height: 40px;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}

		a{
			color: black;
		}

		.foodID{ width: 20%; }
		.price{ width: 16%; }
	</style>
</head>
<body>

	<div class="main-box">
		<div class="my-account">
			<div class="my-account-box">
				<div class="title-myaccount">
					<h3>Booking Details</h3>
				</div>
				<!--<form method="POST" action="customer-profile.php?action=edit">-->
				<?php

				$sql = "SELECT * FROM temp WHERE bookingID = '".$_SESSION['bookingID']."';"; //B001 ni ubah kepada $_SESSION['booking']
				$result = mysqli_query($conn, $sql);

				$bookID = $matchID = $section = $stadium = $adult = $child = $foodID = $qty = $totalPrice = "";

				while ($record = mysqli_fetch_assoc($result)) {
					$bookID = $record['bookingID'];
					$matchID = $record['matchID'];
					$section = $record['section'];
					$stadium= $record['stadiumName'];
					$adult = $record['adultNum'];
					$child = $record['childNum'];
					$foodID = $record['foodID'];
					$qty = $record['quantity'];
					$totalPrice =(double)$record['totalPrice'];
				}

				?>
					<div class="details">
						<div class="part-detail">
							<div class="label">Booking ID</div>
							<div class="data-cust">: 
								<?php echo $bookID ;?> 
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Match ID</div>
							<div class="data-cust">: 
								<?php echo $matchID ;?> 
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Stadium</div>
							<div class="data-cust">: 
								<?php echo $stadium ;?> 
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Section</div>
							<div class="data-cust">: 
								<?php echo $section ;?> 
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Number of Adults</div>
							<div class="data-cust">: 
								<?php echo $adult ;?> 
							</div>
						</div>
						<div class="part-detail">
							<div class="label">Number of Children</div>
							<div class="data-cust">: 
								<?php echo $child ;?> 
							</div>
						</div>
						<div class="part-detail">
							<div class="label" style="font-weight: bold; font-size: 22px;">TICKET FARE</div>
							<div class="data-cust" style="font-weight: bold; font-size: 22px;">: 
								RM <?php echo $totalPrice ;?> 
								<?php $_SESSION['totalPay']=$totalPrice ?>
							</div>
						</div>
					</div>
					
				<!--</form>-->
			</div>
		</div>

		<div class="order-history">
			<div class="title-order-history">
				<h3>Food Information</h3>
			</div>
			<div class="table-order-history">

				<?php 
				$sql = "SELECT * FROM food_booked WHERE bookingID = '".$_SESSION['bookingID']."'"; //B001 ni ubah
				$result = mysqli_query($conn, $sql);
				if($result->num_rows > 0){

				?>

				<table>
					<tr>
						<th class="foodID">Food ID</th>
						<th class="desc">Description</th>
						<th class="quantity">Quantity</th>
						<th class="price">Price</th>
					</tr>
					
				

				<?php
				$foodTot="";
				while ($row = mysqli_fetch_assoc($result)) { 
					$foodID = $row['foodID'];
				?>

				<tr>
					<td class="order-id"><?php echo $foodID; ?></td> <!-- href=receipt.php-->

				<?php
					
					$query= "SELECT * FROM food WHERE foodID='$foodID';";
					$query_result = mysqli_query($conn,$query);

					while($record = mysqli_fetch_assoc($query_result)) {
				?>
					<td><?php echo $record['foodDesc']?></td>
					<td><?php echo $row['quantity']?></td>
					<td><?php echo $record['price']?></td>
				</tr>


				<?php
					$price=(double)$record['price']*(integer)$row['quantity'];
					$foodTot=(double)$price+(double)$foodTot;
					}
					$_SESSION['totalPay']=$totalPrice+$foodTot;
				}
				?>
				<tr>
					<td colspan=3 style="font-weight: bold; font-size: 22px;">Total</td>
					<td style="font-weight: bold; font-size: 22px;">RM<?php echo $foodTot?></td>
				</tr>
				

				</table>

				<div class="message">
				</div>

				<?php
				
				}
				else 
					echo "<div class = 'message'><p>No food order from you. :(</p></div>";
				?>
			</div>
			
		</div>
	</div>
	<div class="total-price">
		
		<center><h1>TOTAL PRICE : RM<?php echo $_SESSION['totalPay']; ?> </h1></center>
	</div>
	<center>
		<div class="form-button">
			<div class="reset-button">
				<button type="reset"><a href="match.php?action=cancel">Cancel</a></button>
			</div>
			<div class="update-button">
				<button type="submit"><a href="make-payment.php">Confirm Booking</a></button>
			</div>
		</div>
	</center>
</body>
</html>

