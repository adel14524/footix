<?php 
	session_start();
	include_once 'dbConn.php';


	if(isset($_GET['action'])){
		if($_GET['action'] == "edit"){
			$new_matchid = $_POST['matchID'];
			$new_stadiumid = $_POST['stadiumID'];
			$new_teamid1 = $_POST['teamID1'];
			$new_teamid2 = $_POST['teamID2'];
			$new_date = $_POST['date'];

			$sql = "UPDATE game SET stadiumID = '$new_stadiumid', teamID1 = '$new_teamid1', teamID2 = '$new_teamid2', date = '$new_date' WHERE matchID = '".$_SESSION['matchID']."';";
			$res = mysqli_query($conn,$sql);

			if($res > 0){
				echo "<script>alert('Match has successfully updated !');";
        		echo "window.location.href = 'display-match.php';</script>";
			}
		}
	}

?>