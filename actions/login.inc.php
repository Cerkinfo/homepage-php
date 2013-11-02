<?php

$error="";

if(isset($_POST['username']) && isset($_POST['password'])){

	if(login($_POST['username'],$_POST['password'])){
		$_SESSION['username'] = $_POST['username'];
		header("location: index.php");

	}
	else{

		$error="<span style='color:red'>Mauvais username ou password<br></span><br>";
		require(PATH_VIEWS .'login.inc.php');
	}

}
else{

	require(PATH_VIEWS .'login.inc.php');

}

?>