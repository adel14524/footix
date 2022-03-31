<?php
    include_once ("h-cust.php");
    include_once("dbConn.php");
    session_start();

    /*if(isset($_GET['action'])){
        if($_GET['action'] == "bayar"){
           foreach ($_SESSION['cart'] as $key => $value) {
               $product_id = $value['productid'];
               $quantity = $value['item_quantity'];
               $item_total = number_format($value['item_quantity'] * $value['product_price'], 2);
   
               $sql = "INSERT INTO temp (Product_ID, Quantity, Total_Price) VALUES ('$product_id', '$quantity', '$item_total')";
               $result = mysqli_query($conn, $sql);
           }
       }
   }*/
           
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Footix</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<meta charset=utf-8 />
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <style>
        * {box-sizing: border-box}
        
        /* Set height of body and the document to 100% */
        body, html {
          height: 100%;
          margin: 0;
          font-family: Arial;
        }
        
        /* Style tab links */
        .tablink {
          background-color: #555;
          color: white;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          font-size: 17px;
          width: 50%;
        }
        
        .tablink:hover {
          background-color: #777;
        }
        
        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent {
          color: black;
          display: none;
          padding: 100px 20px;
          height: 100%;
        }
        
        #Home {background-color: #f5f5f5;}
        #News {background-color:#f5f5f5;}
        
        .price,.payment{
            margin: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            
        }
        .payment-box{
            width: 800px;
            background-color: #e5e5e5;
            border-style: solid ;
            color: black;
            
        }
        .CardForm{
      			width: 100%;
      			padding: 20px;
      			height: 100%;
        }
        input[type=text], select {
        		width: 100%;
        		padding: 12px 20px;
        		margin: 8px 0;
        		display: block;
        		border: 1px solid #ccc;
        		border-radius: 4px;
        		box-sizing: border-box;
		    }
    		input[type="file"] {
          		height: 0;
          		overflow: hidden;
          		width: auto;
    		}

    		input[type="file"] + label {
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
        }
        
        input[type="submit"]{
      			width: 200px;
      			height: 50px;
      			background-color: #d90429;
      			color: #e6e6ea;
      			font-family: 'Poppins', sans-serif;
      			font-size: inherit;
      			font-weight: 600;
      			margin-top: 50px;
            outline: none;
            margin-left: 250px;
        }
        
        .online-banking-box{
		
      			display: flex;
      			flex-wrap: wrap;
      			justify-content: center;
		    }

    		.display-bank{
    			justify-content: flex;
    			flex-direction: column;
    		}
    		.bank-options{
    			display: flex;
    			flex-wrap: wrap;
    			justify-content: center;
    		}

		    .bank-method-title{text-align: center;}

    		.bank.button{
    			border: 1px transparent;
    			background-color: transparent;
    		}

		    .bank{margin: 20px;}

    		.bank:hover{
    			filter: drop-shadow(0px 0px 10px black);
    		}

    		.bank img{
    			border-radius: 50%;
    			width: 100px;
    			height: 100px;
    		}
    </style>
</head>
<body>
    <div class=price>
        <h1>Your Total Pay is RM<?php echo $_SESSION['totalPay'] ?></h1> <!--<?php echo $_SESSION['totalPay'] ?>-->
    </div>
    <div class=payment>
        
        <div class="payment-box">
            <button class="tablink" onclick="openPage('Home', this, '#003049')" id="defaultOpen">Card</button>
            <button class="tablink" onclick="openPage('News', this, '#d62828')" >Online Banking</button>


            <div id="Home" class="tabcontent" >
                <centre>
                <h3>Credit card / Debit card</h3>
                
                <h3>Payment</h3>

                <label for="fname">Accepted Cards</label>
                </centre>

                <div class="icon-container" >
                <i class="fa fa-cc-visa" style="color:navy;" ></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>

                <div class="CardForm">
                    <form action="receipt.php?action=card" method="POST">
                    <label for="Name">CardHolder Name</label>
                    <input type="text" id="Name" name="Name" placeholder="John More Doe" required>
                    <label for="CC_Number">Credit card number</label>
                    <input type="text" id="CC_Number" name="CC_Number" placeholder="1111-2222-3333-4444" required>
                    <label for="Month">Exp Month</label>
                    <input type="text" id="Month" name="Month" placeholder="September" required>
                    <label for="Year">Exp Year</label>
                    <input type="text" id="Year" name="Year" placeholder="2018" required>
                    <label for="CVV">CVV</label>
                    <input type="text" id="CVV" name="CVV" placeholder="352" required>
                    <centre><input type="submit" value="Pay"></centre>
                    </form>
                
                </div>
                
            </div>
        

            <div id="News" class="tabcontent" >
            
            <div class="online-banking-box">
                <div class="display-bank">
                    <div class="bank-method-title"><h3>Payment Via Online Banking</h3></div>
                    <form action="receipt.php?action=online" method="POST">
        
                        <div class="bank-options">
                            <div class="bank">
                                <button class="button" type="submit" name="bank" value="Maybank" style="border: 1px transparent;
                                background-color: transparent;">
                                    <img src="bank/maybank.png">
                                </button>
                                
                            </div>
                            <div class="bank">
                                <button style="border: 1px transparent;
                                background-color: transparent;" type="submit" name="bank" value="BSN">
                                    <img src="bank/bsn.png">
                                </button>
                                
                            </div>
                            <div class="bank">
                                <button style="border: 1px transparent;
                                background-color: transparent;" type="submit" name="bank" value="Bank Islam">
                                    <img src="bank/bankislam.png">
                                </button>
                                
                            </div>
                        </div>
        
                        <div class="bank-options">
                            <div class="bank">
                                <button style="border: 1px transparent;
                                background-color: transparent;" type="submit" name="bank" value="AmBank">
                                    <img src="bank/ambank.jpg">
                                </button>
                                
                            </div>
                            <div class="bank">
                                <button style="border: 1px transparent;
                                background-color: transparent;" type="submit" name="bank" value="CIMB Bank">
                                    <img src="bank/cimb.png">
                                </button>
                                
                            </div>
                            <div class="bank">
                                <button style="border: 1px transparent;
                                background-color: transparent;" type="submit" name="bank" value="HongLeong Bank">
                                    <img src="bank/hongbank.png">
                                </button>
                                
                            </div>
                        </div>
                    </form>
                </div>
                
                
            </div>
            </div> 
        
    </div>



<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
  
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>