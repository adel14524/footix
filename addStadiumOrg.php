<?php

    include_once 'dbConn.php';
    include_once 'h-admin.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Stadium Organizer</title>
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			font-family: 'Rubik';
		}

		.container{
			width: 50%;
			height: 710px;
			border: 1px solid black;
			border-radius: 8px;
			margin: 40px;
			margin-bottom: 100px;
			background-color: lightblue;
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
			margin: 60px 30px 30px 0px;
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
			width: 670px;
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
	<center>
		<div class="container">
			<h2>Add Stadium Organizer</h2>


		<form action="addStadiumOrg.php?action=add" method="POST" enctype="multipart/form-data " onsubmit=" return success()">
		<div class="addForm">

				<div class="details" >
					<div class="part-detail">
						<div class="label">Email</div>
						<div class="data-cust">
						<br><input type="text" name="email" required><br>
					</div>
				</div>
						<div class="part-detail">
						<div class="label">Address</div>
						<div class="data-cust">
						<input type="text" name="address" required><br>
					</div>
				</div>
				<div class="part-detail">
						<div class="label">Phone No</div>
						<div class="data-cust">
						<input type="text" name="phone" required><br>
					</div>
				</div>
				<div class="part-detail">
						<div class="label">Stadium ID</div>
						<div class="data-cust">
						<input type="text" name="stadium-id" required><br>
					</div>
				</div>
					<div class="part-detail">
						<div class="label">Username</div>
						<div class="data-cust">
						<input type="text" id="user" name="username" required><br>
					</div>
				</div>

				
					<div class="part-detail">
						<div class="label">Password</div>
						<div class="data-cust">
						<input type="text" name="password" required>
					</div>
				</div>
				<div class="submit">
	      <center><input type="submit" value="Add New Organiser" name="add">
		</div>
	

</div>
</div>
</div>
</form>
</div>
		
 
	</div>
</div>
</div>





</body>
</html>
<?php
       if(isset($_GET['action'])){
       	if(($_GET['action'])=="add"){
       	$username=$_POST['username'];
        $password=$_POST['password'];
	    $email=$_POST['email'];
	    $address=$_POST['address'];
	    $stadium_id = $_POST['stadium-id'];
	    $phone=$_POST['phone'];
	    $role="StdOrg";

	    $sql= "INSERT INTO user (username,password,email,address,phone,role,stadiumID) VALUES ('$username','$password','$email','$address','$phone','$role','$stadium_id');";
        $result=mysqli_query($conn,$sql);

        if ($result > 0) {
        	echo "<script>alert('Stadium Organiser has successfully added !');";
        	echo "window.location.href = 'display-stdorg.php';</script>";
        }
        
      
       }
       }

        
	   

	    

	?>