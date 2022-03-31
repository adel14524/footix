<?php
//generate QR code
require_once 'phpqrcode/qrlib.php';
include_once 'dbConn.php';




$sql_prod="SELECT * FROM temp WHERE bookingID ='".$_SESSION['bookingID']."' ";
$result=mysqli_query($conn,$sql_prod);

$path = 'qr/';
$file = $path.$_SESSION['bookingID'].".png";
while($record = mysqli_fetch_assoc($result)){
    
    $matchID     =$record['matchID'];
    $stadium        =$record['stadiumName'];
    $section = $record['section'];
    $adult    = $record['adultNum'];
    $child     = $record['childNum'];
    
}

$codeContents = 'FOOTIX Sdn. Bhd'. "\n\n";
$codeContents .= '---------TICKET DETAILS------------'. "\n";
$codeContents .= 'Booking ID:'.$_SESSION['bookingID']."\n";
$codeContents .= 'Match Id:'.$matchID."\n";
$codeContents .= 'Stadium:'.$stadium."\n";
$codeContents .= 'Section:'.$section."\n";
$codeContents .= 'No of Adult:'.$adult."\n";
$codeContents .= 'No of child:'.$child."\n\n";
$codeContents .= '---------FOOD DETAILS------------'. "\n";


$sql="SELECT * FROM food_booked WHERE bookingID ='".$_SESSION['bookingID']."' ";
$res=mysqli_query($conn,$sql);
while($row= mysqli_fetch_assoc($res)){
    
    $codeContents.='Food ID :'.$row['foodID']."\n";
    $codeContents.='Quantity :'.$row['quantity']."\n\n";
   
    
}



//$file = $path.uniqid().".png";
//text to output
/*$bookingID       = 'KDHPRK01010';
$matchID     = 'KDHPRK01010';
$stadium        = 'SDA';
$section = 'A';
$adult    = '4';
$child     = '0';*/
//$email        = 'john.doe@example.com';



//$codeContents = 'FoodID:'.$bookingID."\n";


QRcode::png($codeContents,$file,'L',10,2);
// png($text,$file,ECC_LEVEL,Pixel_size,Frame_size);
//ECC_LEVEL can be 'L,M,H or Q' 
//echo "<center><img src='".$file."'><center>";


?>
