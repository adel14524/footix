<?php
 session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Footix</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="image/logo.png" type="image/logo">
    
    <style>
        body{
            background-image: url("image/loginBG.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        img{
            background-image: url("image/bg2.jpg");
        }
    </style>
  </head>
  <body>
    <script type="text/javascript">
      function validateLI() {
        var x = document.forms["LI"]["email"].value;
        var y = document.forms["LI"]["password"].value;
        if (x == "" && y=="") {
          alert("Please enter your email and password");
          return false;
        }
        else if (x == "") {
          alert("Please enter your email");
          return false;
        }
        else if (y == "") {
          alert("Please enter your password");
          return false;
        }
      }
    </script>
    <div class="cont">
      <div class="form sign-in">
        <center><img class="logo" src="image/footix.png" /></center>
        <h2>Log In</h2>
        <form
          name="LI"
          method="Post"
          action="login.php"
          onsubmit="return validateLI()"
        >
          <label>
            <span>Username</span>
            <input type="text" name="username" />
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="password" />
          </label>
          <button class="submit" type="submit">Sign In</button>
          
        </form>

        <div class="social-media"></div>
      </div>

      <div class="sub-cont">
        <div class="img">
          <div class="img-text m-up">
            <h2>New here?</h2>
            <p>Sign up and discover great amount of new opportunities!</p>
          </div>
          <div class="img-text m-in">
            <h2>One of us?</h2>
            <p>
              If you already has an account, just sign in. We've missed you!
            </p>
          </div>
          <div class="img-btn">
            <span class="m-up">Sign Up</span>
            <span class="m-in">Log In</span>
          </div>
        </div>

        <script type="text/javascript">
          function validateSU() {
            var q = document.forms["SU"]["Username"].value;
            var w = document.forms["SU"]["Password"].value;
            var e = document.forms["SU"]["email"].value;
            var r = document.forms["SU"]["phone"].value;
            var t = document.forms["SU"]["address"].value;
            
           
            if (q == "" ||w == "" ||e == "" ||r == "" ||t == ""  ) {
              alert("Please enter all the details");
              return false;
            }
            else{
              alert("Your registration successfully saved.Now you can log in into Footix");
              return true;
            }
            
          }
        </script>
        <div class="formSU sign-up">
          <h2 style="line-height: 20px;">Sign Up</h2>
          <form
          name="SU"
          method="Post"
          action="membership.php"
          onsubmit="return validateSU()"
        >
          <div name="SU" style="float: left; margin-top: 10px;">
            <label>
              <span>Username</span>
              <input type="text" name="Username" />
            </label>
          </div>

          <div name="SU" style="float: right; margin-top: 10px;">
            <label>
              <span>Password</span>
              <input type="password" name="Password"/>
            </label>
          </div>

          <div name="SU" style="float: left; margin-bottom: 20px;">
            <label>
              <span>Email</span>
              <input type="email" name="email"/>
            </label>
          </div>

          <div name="SU" style="float: right;">
            <label>
              <span>Phone number</span>
            </label>
            <input type="text" name="phone"/>
          </div>

          <div name="SU" style="margin-right: 500px; margin-top: 10px;">
            <label>
              <span>Address</span>
              <input type="text" name="address"/>
            </label>
          </div>
          
          <button
            style="margin-top: 100px;"
            type="submit"
            class="submit"
          >
            Sign Up Now
          </button>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>
