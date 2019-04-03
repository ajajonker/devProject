<!DOCTYPE html>
<html>
<head>
	<title>doorlinkpagina</title>
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

	</nav>

		<div id="side-menu" class="side-nav">
			<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
			<a href="index.php">Frontpage</a>
			<a href="website/devProject/devProject.php">devProject</a>
		</div>

		<div id="main">
			<h1>Welkom, klik bovenaan op het menu om een pagina te selecteren.</h1>
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