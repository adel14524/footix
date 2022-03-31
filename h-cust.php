<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="icon" href="image/logo.png" type="image/logo">

	<style type="text/css">
		body{
			font-family: sans-serif;
			margin: 0px;
			padding: 0px;
		}

		a{
			padding-top: 10px;
			text-decoration: none;
		}

		.top-nav{
			background-color: #f5f5f5;
			height: 70px;
			width: 100%;
			margin: 0px;
		}
		
		.bar-nav{
			margin-right: 250px;
			float: right;
			display: flex;
			flex-wrap: wrap;
		}

		.promotion-tag{
			width: 100%;
			text-align: center;
			background-color: #1d3557;
			height: 50px;
		}
		
		.nav-menu-1{
			font-family: 'Francois One', sans-serif;
			color: #969090;
			text-align: center;
			border: 1px transparent;
			width: 120px;
			margin: 10px;
		}
		.nav-menu-1:hover{
			color: #264082; 
		}

		.logo-menu, .logo, .menu, .all-item{
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.logo-menu{
			margin: 20px 5px 10px 5px;
			background: white;
		}
		.logo-image img{
			height: 150px;
		}
		.menu{
			margin: 15px 5px;
		}
		.menu-class{
			filter:drop-shadow(3px 3px 5px lightgray);
			border-radius: 10px;
			width: 100px;
			height: 100px;
			margin: 5px;
		}
		.meat-seafood{background-color: #ff8e78;}
		.baking-needs{background-color: #ffdb78;}
		.fresh-chilled{background-color: #78ffcb;}
		.house-hold{background-color: #78ddff;}
		
		.menu-class:hover{
			filter:drop-shadow(8px 8px 10px gray);
		}
		.menu-class img{
			margin: 10px;
			width: 80px;
		}
		
	</style>
	<script>
		function clickFunc(){
			document.getElementById("myDropdown").classList.toggle("show");
		}

		window.onclick = function(e) {
  		if (!e.target.matches('.dropbtn')) {
  			var myDropdown = document.getElementById("myDropdown");
    		if (myDropdown.classList.contains('show')) {
      			myDropdown.classList.remove('show');
    		}
  		}
		}

		function myFunction() {
  			var x = document.getElementById("myTopnav");
  			if (x.className === "bar-nav") {
    			x.className += " responsive";
  			} else {
    			x.className = "bar-nav";
  			}
		}
	</script>
</head>
<body>

	<div class="top-nav">
		<div class="bar-nav">
			<a href="match.php"><div class="nav-menu-1"><p>MATCH</p></div></a>
			<a href="customer-profile.php"><div class="nav-menu-1"><p>MY ACCOUNT</p></div></a>
			<a href="aboutus.php"><div class="nav-menu-1"><p>ABOUT US </p></div></a>
			<a href="logOut.php"><div class="nav-menu-1"><p>LOG OUT</p></div></a>
			
			
		</div>
	</div>

	<div class="promotion-tag">
	</div>

	<div class="logo-menu">
		<div class="logo">
			<div class="logo-image">
				<img src="image/footix.png">
			</div>
		</div>
		<div class="menu">
			<div class="menu-class meat-seafood">
			<img src="https://img.icons8.com/ios-filled/50/000000/football.png"/>
			</div>
			<div class="menu-class baking-needs">
			<img src="https://img.icons8.com/ios-filled/50/000000/football2.png"/>
			</div>
			<div class="menu-class fresh-chilled">
			<img src="https://img.icons8.com/ios/50/000000/soccer-goal.png"/>
			</div>
			<div class="menu-class house-hold">
			<img src="https://img.icons8.com/ios/50/000000/stadium.png"/>
			</div>
		</div>

		
	</div>

</body>
</html>