<?php
session_start();
    include_once 'dbConn.php';
    include_once 'h-org.php';

	
	$_SESSION['US']="";
    $_SESSION['stadiumID']="SDA";
?>
<?php
        

		if(isset($_GET['action'])){
			 if(($_GET['action'])=="add"){
		  $foodid = $_POST['foodID'];
		  $desc = $_POST['foodDesc'];
		  $price = $_POST['price'];
		  $img = 'food/'.$_POST['fileToUpload'];
		  $stadiumID="$_SESSION['stadiumID']";
  
		  $sql= "UPDATE food SET foodDesc='$desc', stadiumID='$stadiumID', price='$price', food_img='$img' WHERE foodID='$foodid' ;";
		  $result=mysqli_query($conn,$sql);
		  
		  if($result>0){
			  echo '<script>alert("Food details updated!")</script>';
			  echo '<script>window.location="display-food.php"</script>';
		  }
		  else{
			  echo '<script>alert("tak masuk cibai!")</script>';
			  echo '<script>window.location="display-food.php"</script>';
		  }
		  }
	  }
  
  ?>
<!DOCTYPE html>
<html>
<head>
	<title> Update Food </title>
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
			height: 1000px;
			background-color: white;
			
		}
        .mainbox{
			width: 50%;
			height: 1000px;
			margin: 40px;
			margin-bottom: 100px;
			background-color: lightblue;

		}
        .my-account{
			margin: 10px 30px;
			box-shadow: 0px 0px 20px darkgray;
			border-radius: 20px;
			height: 750px;
			width: 600px;
			border: 1px solid black;
			background-color: lightgreen;
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
			margin: 5px;
			display: flex;
			flex-direction: row;
		}
		.data-cust input{
			color: black;
			font-weight: bold;
			width: 250px;
			background-color: #f2efe4;
			border: 1px transparent;
			border-radius: 10px;
			padding: 5px 7px;
		}
		.all-item{
			margin:20px 200px;
			background-color: lightblue;
			border: 1px solid gray;
			border-radius: 20px;
			height:700px;
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
		
		.rightcol{
			padding: 20px;
			margin-left: 15px;
		}
		.input-col2{
			margin-top: 20px;
			margin-right: 10px;
			

		}
		.input-col2 .gambar .logo{
			position: absolute;
  			top: 30%;
			left: 55%;
			width: 28px;
			height: 50px;
		}
		.input-col2-BTN{
			margin-top: 10px;
			width: auto;
			
		}
		button{
			width: 450px;
			height: 50px;
			background-color: red;
			color: white;
			font-family: 'Poppins', sans-serif;
			font-size: inherit;
			font-weight: 600;
			margin-bottom: 1rem;
			outline: none;
			
		}
		.update-button{
			margin-left: 0px;
			margin-right: auto;
		}
		.gambar{
			border: 20px;
			height: 200px;
			width: 200px;
			background-image: url("upload.png");
			background-repeat: no-repeat;
			background-position: 50% 50%;
			background-color: white;
			border: 1px solid gray;
			border-radius: 10px;
		}

		.gambar img{
			width: 200px;
			height: 200px;
		}

		.addorderBTN{
			width: 15px;
			margin: 15px;
			height:10px;
			
		}
		.label{width: 150px; padding: 10px; margin: 10px;}
		.data-cust{width: 550px; padding: 10px;}

		.submit input{
			width: 350px;
			height: 50px;
			background-color: #d90429;
			color: #e6e6ea;
			font-family: 'Poppins', sans-serif;
			font-size: inherit;
			font-weight: 600;
			margin: 30px;
			outline: none;
		}

		
		
		/* Clear floats after the columns 
		.addForm:after {
		content: "";
		display: table;
		clear: both;
		}*/
		
		input[type=text], select {
		width: 80%;
		padding: 12px 20px;
		margin: 10px 5px;
		display: block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		}
		input[type="file"] {
		height: 0;
		overflow: hidden;
		width: auto;
		}

		input[type="file"] + label {
		background: grey;
		border: none;
		border-radius: 5px;
		color: white;
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
		width: 50%;
		
		
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
			alert("Successfully added new food ");
			window.location("addTeam.php");
		  }
		function appear(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#blah')
						.attr('src', e.target.result)
						.width(200)
						.height(200);
				};

				reader.readAsDataURL(input.files[0]);
			}
		} 
		
	  </script>
	
	<center>
	<div class="main-box">
		<div class="my-account">
			<div class="my-account-box">
				<div class="title-myaccount">
			<h2>Add New Food</h2>
		</div>

		<?php 
				$id = $_GET['food-id'];
				$sql = "SELECT * FROM food WHERE foodID = '$id' AND stadiumID='".$_SESSION['stadiumID']."';";
				$result = mysqli_query($conn, $sql);

				while ($record = mysqli_fetch_assoc($result)) {
					$foodid = $record['foodID'];
					$fooddesc = $record['foodDesc'];
					$foodprice = $record['price'];
					$foodimg = $record['food_img'];
				}
		?>

		<form action="update-food.php?action=add" method="POST" enctype="multipart/form-data " >
		<div class="addForm">

				<div class="details" >
					<div class="part-detail">
                       <div class="label">Food ID</div>
                       <div class="data-cust">
                      <input type="text" id="foodID" name="foodID" value="<?php echo $foodid ?>"  >
					</div>
				</div>
					
					<div class="part-detail">
						<div class="label">Food Description</div>
                       <div class="data-cust">
						<input type="text" id="foodDesc" name="foodDesc" value="<?php echo $fooddesc ?>" required>
					</div>
				</div>

				<div class="part-detail">
						<div class="label">Price</div>
                       <div class="data-cust">
						<input type="text" id="price" name="price" value="<?php echo $foodprice ?>" required>
						<input type="hidden" name="stadiumID" value="<?php echo $_SESSION['stadiumID']; ?>" >
					</div>
				</div>
		
		
					<center>
					
						<div class="gambar">
							<img id="blah" src="<?php echo $foodimg ?>"  />
					
						</div>
					</center>
						
					</div>

			
			<center>

				<input type="file" name="fileToUpload" id="fileToUpload" onchange="appear(this)"  value="<?php echo $foodimg ?> " required>
                        <label for="fileToUpload">Upload Food Image</label>
           <div class="submit">
	      <center><button type="submit" value="Update Food" name="add"></button>
		</div>
					</div>
					</center>
				</div>
			
		</div>
	</div>
	</div>
	</form>
			  
	</div>


</body>
</html>