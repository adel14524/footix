<?php
session_start();
include_once 'dbConn.php';
include_once 'qr.php';
?>
<?php
//update payment
    $payment_id = 'GH-'.time();
    $current_date = date("Y-m-d");
   // $total_pay=$_SESSION["total"];
    $payment_method ="";
    
    $bookingID=$_SESSION['bookingID'];
    $tp=$_SESSION['totalPay'];

    if(isset($_GET['action'])){
		if($_GET['action'] == "card"){
            $name = $_POST['Name'];
	        $cc_no = $_POST['CC_Number'];
	        $month = $_POST['Month'];
	        $year = $_POST['Year'];
	        $ccv = $_POST['CVV'];
			$payment_method = 'Credit Card';
			$payment_sql = "INSERT INTO payment (paymentID,CCname,CCnumber,month,year,CVV,datePay,paymentMethod,bank,totalPay) VALUES ('$bookingID','$name','$cc_no','$month','$year','$ccv','$current_date','$payment_method','None','$tp'); ";
            $db = mysqli_query($conn, $payment_sql);
            
        }
    }
    if(isset($_GET['action'])){
        if($_GET['action']=="online"){
            $bank=$_POST["bank"];
            $payment_method = 'Online banking';
            $payment_sql = "INSERT INTO payment (paymentID, CCname, CCnumber, month, year, CVV, datePay, paymentMethod, bank, totalPay) VALUES ('$bookingID', 'None', 'None', 'None', 'None', 'None', '$current_date', '$payment_method', '$bank', '$tp');";
            $db = mysqli_query($conn, $payment_sql);
            
        }
    }
    ?>

 

<?php
    $_SESSION['US'];
    // update table booking
    $current_date = date("Y-m-d");

    $item_buy = "SELECT * FROM temp WHERE bookingID = '".$_SESSION['bookingID']."';";
	$result = mysqli_query($conn, $item_buy);

	

	while($record = mysqli_fetch_assoc($result)){

        $bookingID=$_SESSION['bookingID'];
        $US=$_SESSION['US'];
        $matchID = $record['matchID'];
        $section = $record['section'];
        $adult = $record['adultNum'];
        $child = $record['childNum'];
        $totalPay=$_SESSION['totalPay'];
        
        $save=$file;

        $PM = "SELECT * FROM payment WHERE paymentID = '".$_SESSION['bookingID']."';";
        $result = mysqli_query($conn, $PM);
        while($row = mysqli_fetch_assoc($result)){
            $payment=$row['paymentMethod'];

            $booking_sql = "INSERT INTO booking (bookingID,username,matchID,section,adultNum,childNum,totalPay,date,paymentMethod,img_qrcode) VALUES ('$bookingID','$US','$matchID','$section','$adult','$child','$totalPay','$current_date','$payment','$save'); ";
            $db = mysqli_query($conn, $booking_sql);
        }

    }
    ?>

<?php
    //update table stadium

    $stadium = "SELECT * FROM temp WHERE bookingID = '".$_SESSION['bookingID']."';";
	$result = mysqli_query($conn, $stadium);

	while($record = mysqli_fetch_assoc($result)){

        $section = $record['section'];
        $adult =(integer) $record['adultNum'];
        $child =(integer) $record['childNum'];

        $Tseat=$adult+$child;

        $update = "SELECT * FROM stadium WHERE stadiumID = '".$_SESSION['stadiumID']."' AND section='". $section."';";
        $res = mysqli_query($conn, $update);

        $Cseat = 0;
        while($row = mysqli_fetch_assoc($res)){
        $Cseat=(integer)$row['seat'];
        $Nseat=(integer)$Cseat-(integer)$Tseat;
         }

        $stadium_sql = "UPDATE stadium SET seat='". $Nseat."' WHERE stadiumID = '".$_SESSION['stadiumID']."' AND section='".$section."'";
        $db = mysqli_query($conn, $stadium_sql);
    }

    
        
        
    
?>

    
    <?php
    include_once('h-cust.php');
    include_once('display-receipt.php');
    ?>


