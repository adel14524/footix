<?php
		session_start();
        include 'dbConn.php';
        $teamID=$_POST['teamID'];
        $teamname=$_POST['name'];
	    $fileToUpload='teamLogo/'.$_POST['fileToUpload'];

	    $sql= "INSERT INTO team (teamID,teamName,teamLogo) VALUES ('$teamID','$teamname','$fileToUpload');";
        $result=mysqli_query($conn,$sql);
        
        header('Location:addTeam.php');

	?>