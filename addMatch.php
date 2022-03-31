<?php 

	session_start();
	include_once 'h-admin.php';
	include_once 'dbConn.php';

    if(isset($_GET['action'])){
    	if($_GET['action'] == "add"){

        $matchID=$_POST['matchID'];
        $stadiumID=$_POST['stadiumID'];
	    $teamID1=$_POST['teamID1'];
	    $teamID2=$_POST['teamID2'];
	    $date=$_POST['date'];
	 
		    $_SESSION['matchID'] = $matchID;
		    $_SESSION['stadiumID'] = $stadiumID;
		    $_SESSION['teamID1'] = $teamID1;
		    $_SESSION['teamID2'] = $teamID2;
		    $_SESSION['date'] = $date;

		      $sql= "INSERT INTO game (matchID,stadiumID,teamID1,teamID2,date) VALUES ('$matchID','$stadiumID','$teamID1','$teamID2','$date')";
        $result=mysqli_query($conn,$sql);

        if($result > 0){
        	echo "<script>alert('Match has successfully added !');";
        	echo "window.location.href = 'addMatch.php';</script>";
        }

    	}
    }
?> 

<!DOCTYPE html>
<html>
<head>
	<title>Add New Match</title>
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			font-family: 'Rubik';
		}

		.container{
			width: 50%;
			height: 650px;
			border: 1px solid black;
			border-radius: 8px;
			margin: 40px;
			margin-bottom: 100px;
			background-color: #B98389;
		
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
			background-color: #510D0A;
			color: #e6e6ea;
			font-family: 'Poppins', sans-serif;
			font-size: inherit;
			font-weight: 600;
			margin: 30px;
			outline: none;
		}

		input[type="file"] {
			display:none;
		}

		.upload{
			background: #d90429;
			border: none;
			border-radius: 5px;
			color: #fff;
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
			width: 30%;
			margin-right: auto;
			margin-left: auto;
		}

		.gambar{
			border: 50px;
			height: 250px;
			width: 400px;
			margin-right: auto;
			margin-left: auto;
			margin-top: 30px;
			margin-bottom: 30px;
			background-image: url("upload.png");
			background-repeat: no-repeat;
			background-position: 50% 50%;
			background-color: #fff;
			border: 1px solid gray;
			border-radius: 10px;
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
			<h2>Add new match</h2>

			<form action="addMatch.php?action=add" method="POST" enctype="multipart/form-data">
				<div class="details">
					<div class="part-detail">
						<div class="label">MATCH ID</div>
						<div class="data-cust">
							<input type="text" name="matchID" required> 
						</div>
					</div>
					<div class="part-detail">
						<div class="label">STADIUM ID</div>
						<div class="data-cust">
							<input type="text" name="stadiumID" required>
						</div>
					</div>
					<div class="part-detail">
						<div class="label">TEAM ID 1</div>
						<div class="data-cust">
							<input type="text" name="teamID1" required> 
						</div>
					</div>
					<div class="part-detail">
						<div class="label">TEAM ID 2</div>
						<div class="data-cust">
							<input type="text" name="teamID2" required> 
						</div>
					</div>
						<div class="part-detail">
						<div class="label">DATE OF MATCH</div>
						<div class="data-cust">
							<input type="date" name="date" required> 
						</div>
					</div>
				<div class="submit">
					<input type="submit" name="submit" value="ADD NEW MATCH">
				</div>
			</form>
		</div>
	</center>
</body>
</html>