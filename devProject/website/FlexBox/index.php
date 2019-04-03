<!DOCTYPE html>
<html>
<head>
	<title>Flex & Grid lay-out</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<nav class="navbar">
		<span class="open-slide">
			<a href="#" onclick="openSlideMenu()">
				<svg width="30" height="30">
					<path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
					<path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
					<path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
				</svg>
			</a>
		</span>

		<!--<ul class="navbar-nav">
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">Contact</a></li>
		</ul> -->
	</nav>

		<div id="side-menu" class="side-nav">
			<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
			<a href="../../index.php">Frontpage</a>
			<a href="../devProject/devProject.php">devProject</a>
			<a href="#">UEX</a>
			<a href="#">PROFTAAK</a>
			<a href="#">PORTFOLIO</a>
			<a href="#">REFLECTIES</a>
			<a href="#">OVER MIJ</a>
		</div>

		<div id="main">
			<div class="box"><img src="files/1.jpg"></div>
			<div class="box"><img src="files/2.jpg"></div>
			<div class="box"><img src="files/3.jpg"></div>
			<div class="box"><img src="files/4.jpg"></div>
			<div class="box"><img src="files/5.jpg"></div>
			<div class="box"><img src="files/6.jpg"></div>
			<div class="box"><img src="files/7.jpg"></div>
			<div class="box"><img src="files/8.jpg"></div>
			<div class="box"><img src="files/9.jpg"></div>
			<div class="box"><img src="files/10.jpg"></div>
			<div class="box"><img src="files/11.jpg"></div>
			<div class="box"><img src="files/12.jpg"></div>
			<div class="box"><img src="files/13.jpg"></div>
			<div class="box"><img src="files/14.jpg"></div>
			<div class="box"><img src="files/15.jpg"></div>
			<div class="box"><img src="files/16.jpg"></div>
			<div class="box"><img src="files/17.jpg"></div>
			<div class="box"><img src="files/18.jpg"></div>
		</div>

		<script type="text/javascript">
			(function() {

			var img = document.getElementById('box').firstChild;
			img.onload = function() {
			    if(img.height > img.width) {
			        img.height = '100%';
			        img.width = 'auto';
			    }
			};

			}());
		</script>

		<script type="text/javascript">
			function openSlideMenu(){
				document.getElementById('side-menu').style.width = '250px';
				document.getElementById('main').style.marginLeft = '250px';
			}

			function closeSlideMenu(){
				document.getElementById('side-menu').style.width = '0';
				document.getElementById('main').style.marginLeft = '0';
			}
		</script>

		<div class="footer">COPYRIGHT - LEX JONKER 2019</div>
	
</body>
</html>