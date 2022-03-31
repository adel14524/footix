<?php
	session_start();
	include_once 'dbConn.php';


	if(isset($_GET['action'])){
		if($_GET['action'] == "edit"){
			$new_teamid = $_POST['team-id'];
			$new_teamname = $_POST['team-name'];
			$new_teamlogo = "logo/".$_POST['fileToUpload'];

			$sql = "UPDATE team SET teamName = '$new_teamname', teamLogo = '$new_teamlogo' WHERE teamID = '".$_SESSION['teamID']."';";
			$res = mysqli_query($conn,$sql);

			if($res > 0){
				echo "<script>alert('Team has successfully updated !');";
        		echo "window.location.href = 'display-team.php';</script>";
			}
		}
	}

?>