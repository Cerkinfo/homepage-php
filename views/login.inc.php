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

<h1>Login</h1><br>

$error

<form action="index.php?action=login" method="post">
<p>
   Username <input type="text" name="username" autofocus /><br>
   Password <input type="password" name="password" /><br><br>
    <input type="submit" value="Login" />
</p>
</form>

</div>

$footer

</body>
</html>
FIN
?>