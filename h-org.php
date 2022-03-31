<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

		.logo{
			padding-left: 15px;
		}

		.logo img{
			float: left;
			
		}

		.bar-nav .listbutton {
  			display: none;
		}

		.listbutton img{
			padding-top: 13px;
			max-width: 25px;
		}

		
		.bar-nav{
			margin-right: 150px;
			overflow: hidden;
			float: right;
		}

		.bar-nav a{
			float: left;
			display: block;
			text-align: center;
		}
		
		.nav-menu-1{
			font-family: 'Francois One', sans-serif;
			color: #969090;
			text-align: center;
			border: 1px transparent;
			min-width: 100px;
			margin: 10px;
		}
		.nav-menu-1:hover{
			color: #264082;
		}

		.nav-menu-1:hover{
			color: #264082; 
		}

		.dropdown{
			float: left;
			overflow: hidden;
		}

		.dropdown .dropbtn{
			cursor: pointer;
			font-family: 'Francois One', sans-serif;
			color: #969090;
			text-align: center;
			margin: 0px;
			font-size: 16px;
			background-color: inherit;
			border: none;
			outline: none;
			width: 100px;
			padding: 20px 16px;
			margin: 6px 0px;
		}

		.dropdown .dropbtn:hover{
			color: #264082;
		}

		.dropdown-content{
			display: none;
  			position: absolute;
  			background-color: #f5f5f5;
  			min-width: 100px;
  			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  			z-index: 1;
		}

		.dropdown-content a {
  			float: none;
  			color: black;
  			padding: 12px 16px;
  			text-decoration: none;
  			display: block;
  			text-align: left;
  			font-family: 'Francois One', sans-serif;
  			color: #545454;
		}

		.dropdown-content a:hover{
			background-color: #ebebeb;
			color: #264082;
		}

		
		@media screen and (max-width: 850px) {
  			.bar-nav a:not(:first-child), .dropdown .dropbtn {display: none;}
  			.bar-nav a.listbutton {
    			float: right;
    			display: block;
  			}
		}

		@media screen and (max-width: 850px) {
  			.bar-nav.responsive {position: relative;}
  			.bar-nav.responsive .listbutton {
    			position: absolute;
    			right: 0;
    			top: 0;
  			}
  			.bar-nav.responsive a {
    			float: none;
    			display: block;
    			text-align: left;
  			}
  			.bar-nav.responsive .dropdown {float: none;}
  			.bar-nav.responsive .dropdown-content {position: relative;}
  			.bar-nav.responsive .dropdown .dropbtn {
    			display: block;
    			width: 100%;
    			text-align: left;
  			}
		}

		.show{display:block;}
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
</head>
<body>

	<div class="top-nav">
		
		<div class="bar-nav" id="myTopnav">
			<div class="dropdown">
			<a href="display-food.php"><div class="nav-menu-1"><p>FOOD</p></div></a>
			<a href="view-stdOrg.php"><div class="nav-menu-1"><p>VIEW ORDER</p></div></a>
			<a href="stdorg-profile.php"><div class="nav-menu-1"><p>MY ACCOUNT</p></div></a>
			<a href="logOut.php"><div class="nav-menu-1"><p>LOG OUT</p></div></a>
			<a href="javascript:void(0);" onclick="myFunction()" class="listbutton">
    			<img src="img/list.png"></a>
			</div>
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

</body>
</html>