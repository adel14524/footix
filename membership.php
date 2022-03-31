<?php
    include 'dbConn.php';
    $US=$_POST['Username'];
    $PW=$_POST['Password'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $role="customer";
    

    $sql= "INSERT INTO user (username,password,email,address,phone,role) VALUES ('$US','$PW','$email','$phone','$address','$role')";
    $result=mysqli_query($conn,$sql);

    $query = "SELECT * FROM `user` WHERE username='$US' and password='$PW'";
	
    if($result)
    header('Location:index.php');
?>