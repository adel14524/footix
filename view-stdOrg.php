<?php
    session_start();
	include_once 'dbConn.php';
    include_once 'h-org.php';
    
    
	
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
			width: 500px;
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
			width: 1000px;
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
		.price{ width: 10%; }
		.quantity{ width: 14%; }
	</style>
</head>
<body>

	<div class="main-box">
		<div class="order-history">
			<div class="title-order-history">
				<h3>Food Order Information</h3>
			</div>
			<div class="table-order-history">

				<?php 
				$sql = "SELECT foodID, COUNT(`quantity`) AS quantity FROM food_booked WHERE stadiumID='".$_SESSION['stadiumID']."' GROUP BY `foodID` ORDER BY `foodID` ASC"; //B001 ni ubah
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
                    $quantity=$row['quantity'];
				?>

				<tr>
					<td class="order-id"><?php echo $foodID; ?></td> <!-- href=receipt.php-->

				<?php
					
					$query= "SELECT * FROM food WHERE foodID='$foodID';";
					$query_result = mysqli_query($conn,$query);

					while($record = mysqli_fetch_assoc($query_result)) {
				?>
					<td><?php echo $record['foodDesc']?></td>
					<td><?php echo $quantity?></td>
					<td><?php echo $record['price']?></td>
				</tr>


				<?php
					$price=(double)$record['price']*(integer)$row['quantity'];
					$foodTot=(double)$price+(double)$foodTot;
					}
					//$_SESSION['totalPay']=$totalPrice+$foodTot;
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
					echo "<div class = 'message'><p>No food order yet. :(</p></div>";
				?>
		</div>
			
	</div>
	
	
</body>
</html>

