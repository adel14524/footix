<?php
    session_start();
    include 'dbConn.php';
    //$_SESSION['role']; ==global role
    //$_SESSION['StdOrg']== hole code for stadium organizer

    $US=$_POST['username'];

    $sql="SELECT * FROM user ;";
    $run=mysqli_query($conn,$sql);

    while($record = mysqli_fetch_assoc($run)) {

        
        if($US==$record['username']){
            $role=$record['role'];
            $_SESSION['role']=$role;
        }
        
    }


    $UScheck="";
    $PWcheck="";
    
          

    if (isset($_POST['username']) and isset($_POST['password'])){
	
        // Assigning POST values to variables.
        
        $US=$_POST['username'];
        $_SESSION['US']=$US;
        $PW=$_POST['password'];
        
        if($_SESSION['role']=="customer"){
            $query = "SELECT * FROM `user` WHERE username='$US' AND password ='$PW';";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $count = mysqli_num_rows($result);
            if ($count==1){
            //echo "Login Credentials verified";
            
            echo '<script type="text/javascript">'; 
            echo 'alert("Login Credentials verified");'; 
            echo 'window.location= "match.php";'; //redirect to customer page
            echo '</script>'; 
            //header('Location:product.php');
            }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("Please check your username or password");'; 
            echo 'window.location= "index.php";';
            echo '</script>'; 
            }
        }else if($_SESSION['role']=="admin"){
            $query = "SELECT * FROM `user` WHERE username='$US' and password='$PW';";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $count = mysqli_num_rows($result);
            if ($count==1){
            //echo "Login Credentials verified";
            echo '<script type="text/javascript">'; 
            echo 'alert("Admin Login Credentials verified");'; 
            echo 'window.location= "display-match.php";'; //redirect to admin page
            echo '</script>'; 
            //header('Location:product.php');
            }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("Please check your username or password");'; 
            echo 'window.location= "index.php";';
            echo '</script>';
            }
        }else if($_SESSION['role']=="StdOrg"){//StdOrg==StadiumOrganiser
            $query = "SELECT * FROM `user` WHERE username='$US' and password='$PW';";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $count = mysqli_num_rows($result);
            if ($count==1){
            //echo "Login Credentials verified";
            $_SESSION['StdOrg'] = substr($US, 0, 3);
            echo '<script type="text/javascript">'; 
            echo 'alert("Stadium Organizer Login Credentials verified");'; 
            echo 'window.location= "display-food.php";'; //ridirect to Stadium Organizer page
            echo '</script>'; 
            //header('Location:product.php');
            }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("Please check your username or password");'; 
            echo 'window.location= "index.php";';
            echo '</script>';
            }
        


        }
        else {
            echo '<script type="text/javascript">'; 
            echo 'alert("Please check your username or password");'; 
            echo 'window.location= "index.php";';
            echo '</script>';
        }
    }
    
?>