<?php
    include_once 'h-cust.php';
    session_start(); 
    
?>
<?php
    
    include_once 'dbConn.php';

    $matchID=$_GET['matchID'];
    $_SESSION['matchID']=$matchID;
    //echo $_SESSION['matchID'];

    $stadiumID=$_GET['stadiumID'];
    $_SESSION['stadiumID']=$stadiumID;
    //echo $stadiumID;

    $match = "SELECT * FROM stadium where stadiumID='".$stadiumID."';";
    $result = mysqli_query($conn, $match); 
    while ($record = mysqli_fetch_assoc($result)) {
        $_SESSION['stadiumName']=$record['stadiumName'];
    }
   
?>


<!DOCTYPE html>
<html>
<head>
	<title>Footix</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <style type="text/css">
        body{
            margin: 0;
            padding: 0;
        }

        .first,.second,.third{
            height: 450px;
            margin-left: 100px;
            margin-right: 100px;
            margin-bottom: 20px;

        }
        .first{
            background-color: white;
            

        }
        .second{
            background-color: white;
            height: 200px;
            
        }
        .third{
            background-color: white; /*#1d3557*/
            height: 50px;
        }

        
        .first .match{
            width: 26%;
            height: 435px;
            background-color: white;
            margin: 20px;
            float: left;
            border: 1px solid black;
            box-shadow: 0px 0px 20px darkgray;
            border-radius: 20px;
            font-family: 'Rubik';
            
        }

        .first .match .legend{
            margin: 30px;

        }
        .first .stadium{
            width: 65%;
            height: 435px;
            background-color: white;
            margin: 20px;
            float: right;
            border: 1px solid black;
            box-shadow: 0px 0px 20px darkgray;
            border-radius: 20px;
            
        }

        .first .stadium img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 800px;
            height: 435px;
        }

        .second .section,.second .patron{
            width: 45%;
            height: 160px;
            margin: 20px;
            font-family: 'Rubik';
        }
        .second .section{
            background-color: white;
            float: left;
            margin: 20px;
            border: 1px solid black;
            box-shadow: 0px 0px 20px darkgray;
            border-radius: 20px;
        }

        .second .section h3{
            text-align: center;
        }

        .second .patron{
            background-color: white;
            float: right;
            border: 1px solid black;
            box-shadow: 0px 0px 20px darkgray;
            border-radius: 20px;
        }

        .second .patron h3{
            text-align: center;
        }

        .third .submit{

            margin-left: auto;
            margin-right: auto;
        }

        .title{
            font-size: 17px;
            font-weight: bold;
        }

        input[type="radio"]{
            margin-left: 30px;
            margin-top: 6px;
            margin-bottom: 6px;
        }

        input[type="number"]{
            border-radius: 10px;
            text-align: center;
            margin-left: 30px;
            margin-top: 8px;
            border: 1px solid gray;
            width: 180px;
            height: 30px;
        }

        .num-patrons{
            margin-left: 140px;
        }

        .submit{
            border: 1px transparent;
            box-shadow: 0px 0px 5px lightgray;
            border-radius: 10px;
            height: 45px;
            width: 140px;
            margin-top: 5px;
            margin-bottom: 40px;
            margin-left: 40px;
            background-color: #6abd7a;
            color: white;
            font-size: 15px;
            font-family: 'Rubik';
        }

        .submit:hover{
            background-color: #42cef5;
            box-shadow: 0px 0px 5px black;
        }

        
    </style>
</head>


<body>
    <div class="first">
        <div class="match">
            <div class="legend">
                <fieldset style="text-align:left;">
                <?php
	
                    $sql_prod="SELECT * FROM stadium WHERE stadiumID ='".$stadiumID."' AND section='A'";
                    $result=mysqli_query($conn,$sql_prod);
                
                    while($record = mysqli_fetch_assoc($result)){
                        $A=$record['price'];
                        $seatA=$record['seat'];
                    }

                    $sql_prod="SELECT * FROM stadium WHERE stadiumID ='".$stadiumID."' AND section='B'";
                    $result=mysqli_query($conn,$sql_prod);
                
                    while($record = mysqli_fetch_assoc($result)){
                        $B=$record['price'];
                        $seatB=$record['seat'];
                    }

                    $sql_prod="SELECT * FROM stadium WHERE stadiumID ='".$stadiumID."' AND section='C'";
                    $result=mysqli_query($conn,$sql_prod);
                
                    while($record = mysqli_fetch_assoc($result)){
                        $C=$record['price'];
                        $seatC=$record['seat'];
                    }

                ?>
                    <legend><b>Section information</b></legend>
                    <br>
                    
                        <div class="title">Upper </div><br/>
                        Adult : RM<?php echo $A ?> <br />
                        Child &#60 12 : RM<?php echo $A/2 ?>  <br />
                        Available seat : <?php echo  $seatA ?> <br />
                        <br>
                        
                    
                    <div class="title">Middle </div><br/>
                    Adult : RM<?php echo $B ?> <br />
                    Child &#60 12 : RM<?php echo $B/2 ?> <br />
                    Available seat : <?php echo  $seatB ?><br />
                    <br>
                    <div class="title">Low </div><br/>
                    Adult : RM<?php echo $C ?> <br />
                    Child &#60 12 : RM<?php echo $C/2 ?> <br />
                    Available seat : <?php echo  $seatC ?><br />
                    
                </fieldset>
            </div>   
        </div>

        <?php
	
            $sql_prod="SELECT * FROM stadium WHERE stadiumID ='".$stadiumID."'";
            $result=mysqli_query($conn,$sql_prod);
           
            while($record = mysqli_fetch_assoc($result)){
                $layout=$record['stadiumLayout'];
            }

        ?>
        <div class="stadium">
            <img src="<?php echo($layout); ?>"/>
        </div>
    </div>



    <div class="second">
        <form action="select-food.php?action=temp" method="POST">
            <div class="section">
                <p><h3>Please choose section</h3></p>
                <?php if($seatA>0){ ?>
                <input type="radio"  name="section" value="A" required>
                <input type="hidden" name="price" value="<?php echo $A ?>" >
                <label for="Upper">Upper section</label><br>
                <?php }   ?>
                <?php if($seatB>0){ ?>
                <input type="radio"  name="section" value="B" required>
                <input type="hidden" name="price" value="<?php echo $B ?>" >
                <label for="Middle">Middle section</label><br>
                <?php }   ?>
                <?php if($seatC>0){ ?>
                <input type="radio"  name="section" value="C" required>
                <input type="hidden" name="price" value="<?php echo $C ?>" >
                <label for="Lower">Lower Section</label>
                <?php }   ?>
            </div>
            <div class="patron">
                <p><h3>Number of patrons</h3></p>
                <label class="num-patrons">Adult : </label><input type="number" name="adult" min="0" max="6" value="0" placeholder="Enter no adult" required><br>
                <label class="num-patrons">Child : </label><input type="number" name="child" min="0" max="6" value="0" placeholder="Enter no child" required>
            </div>
        
    </div>
    <div class="third">
        <center><input class="submit" type="submit" value="Next"></center>
        </form>
        
    </div>
</body>
</html>