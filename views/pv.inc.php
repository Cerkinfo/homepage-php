<?php
echo <<<FIN
<html>
<head>
<title>Cerkinfo</title>
	  <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<link rel="icon" type="image/ico" href="favicon.ico"/>
</head>
<body>

$nav


<div id="main_content">

<h1>PV</h1><br><br>

<div class="error">$error</div>

$upload

$output


<br><br>


</div>

$footer

</body>
</html>
FIN
?>