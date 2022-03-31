<?php
	include_once 'dbConn.php';
	include_once 'h-cust.php';
	session_start(); 

	

	if(isset($_GET['action'])){
		if($_GET['action'] == "temp"){
            $section = $_POST['section'];
	        $adult =(integer) $_POST['adult'];
	        $child =(integer) $_POST['child'];
	        $matchID = $_SESSION['matchID'];
	        $stadiumName = $_SESSION['stadiumName'];
			$bookingID = $_SESSION['bookingID'];
			
			$sql_prod="SELECT * FROM stadium WHERE stadiumID ='". $_SESSION['stadiumID']."' AND section='". $section."'";
            $result=mysqli_query($conn,$sql_prod);
           
            while($record = mysqli_fetch_assoc($result)){
                $price=(double)$record['price'];
            }

			$totalPrice=($adult*$price)+($child*$price/2);

			$temp_sql = "INSERT INTO temp (bookingID, matchID, stadiumName, section, adultNum, childNum,foodID,quantity,totalPrice) VALUES ('$bookingID', '$matchID', '$stadiumName', '$section', '$adult', '$child', 'None', 'None', '$totalPrice');";
            $db = mysqli_query($conn, $temp_sql);
            
        }
	}
	if(isset($_GET['action'])){
		if($_GET['action'] == "add"){
			$bookingID = $_SESSION['bookingID'];
            $product_ID = $_POST['product_ID'];
			$quantity =(integer) $_POST['item_add'];
			$price =(double) $_POST['price'];
			$totPrice=$price*$quantity;
			$stadiumID=$_POST['stadiumID'];

			$food_sql = "INSERT INTO food_booked (bookingID, foodID,stadiumID, quantity, totalprice) VALUES ('$bookingID', '$product_ID','$stadiumID', '$quantity', '$totPrice');";
            $db = mysqli_query($conn, $food_sql);
            
        }
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Select Food</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
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

		.button-submit:hover{
			background-color: #42cef5;
			box-shadow: 0px 0px 5px black;
		}

		.button-next{
			border: 1px transparent;
			box-shadow: 0px 0px 5px lightgray;
			border-radius: 10px;
			height: 50px;
			width: 140px;
			margin: 40px;
			background-color: #f71735;
			color: white;
			font-size: 15px;
			font-weight: bold;
		}

		.button-next:hover{
			background-color: #42cef5;
			box-shadow: 0px 0px 5px black;
		}

	</style>
</head>
<body>

	<div class="title-page">
		<center><h1>SELECT FOOD</h1></center>
	</div>

	<!--<div class="new">
		<div class="add-new-product">
			<div class="add-button">
				<a href="addProduct.php">
					<div class="add-label">Add New Product</div>
					<img src="image/add.png">
				</a>
			</div>
		</div>
	</div>-->


	<div class="update-form">
		
		<?php
			$class_items = "SELECT * FROM food WHERE stadiumID='".$_SESSION['stadiumID']."';";
			$result = mysqli_query($conn, $class_items);

			while ($record = mysqli_fetch_assoc($result)) {
				
		?>
			
			<div class="all-item">
				<form method="POST" action="select-food.php?action=add">
					<div class="item">

						<div class="item-img">
							<img src="<?php echo $record['food_img']; ?>">
						</div>

						<div class="item-desc-price-quantity">
							<div class="item-desc"><?php echo $record['foodDesc']; ?></div>
							<div class="item-price">RM <?php echo $record['price']; ?></div>
						</div>

						<div class="item-update">
							<input type="hidden" name="product_ID" value="<?php echo $record['foodID']; ?>">
							<input type="number" name="item_add" class="input-num" min="0" placeholder="Enter the quantity"><br>
							<input type="hidden" name="price" value=" <?php echo $record['price']; ?> ">
							<input type="hidden" name="stadiumID" value="<?php echo $_SESSION['stadiumID'] ?>">
							<button type="submit" class="button-submit">Add</button>
						</div>
						
					</div>
				</form>
			</div>


		<?php
			}
		?>
	

	</div>
	<center>
		<a href="display-booking.php"><button class="button-next">Next</button></a>
	</center>	
</body>
</html>