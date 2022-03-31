<?php
	session_start();
	include_once 'dbConn.php';

	if(isset($_GET['action'])){
		if($_GET['action'] == "edit"){
			$bil = $_POST['bil'];
			$new_stadiumID = $_POST['stadium-id'];
			$new_stadiumName = $_POST['stadium-name'];
			$new_section = $_POST['section'];
			$new_price = $_POST['price'];
			$new_seat = $_POST['seat'];
			$new_file = "image/".$_POST['fileToUpload'];

			$query = "UPDATE stadium SET bil = '$bil', stadiumName = '$new_stadiumName', stadiumLayout='$new_file', section='$new_section', price='$new_price', seat='$new_seat' WHERE bil = '$bil';";
			$result = mysqli_query($conn,$query);

			echo "<script> alert('Stadium Details updated successfully !');";
			echo "window.location='display-stadium.php';";
			echo "</script>";
		}
	}
?>