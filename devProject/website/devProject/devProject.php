<!DOCTYPE html>
<html>
<head>
	<title>DEV PROJECT</title>
</head>
<body>

	<p>Dit is een pagina waar ik probeer mijn JavaScript te verbeteren!</p>
<div id="para1">
<script type="text/javascript">

	document.getElementById("para1").innerHTML = formatAMPM();

	function formatAMPM() {
	var d = new Date(),
	    minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
	    hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
	    ampm = d.getHours() >= 12 ? 'pm' : 'am',
	    months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Okt','Nov','Dec'],
	    days = ['Zondag','Maandag','Dinsdag','Woensdag','Donderdag','Vrijdag','Zaterdag'];
	return 'Het is vandaag '+days[d.getDay()]+' '+d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear()+' - '+hours+':'+minutes+' '+ampm;
	}
</script>
</div>

</body>
</html>