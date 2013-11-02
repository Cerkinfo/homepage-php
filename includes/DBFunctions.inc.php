<?php


$dbh = new PDO('mysql:host=localhost;dbname=ci', 'root', '');
function login($username,$password) {

	/*

		Fonction qui gere  le processus de loggage d'un utilisateur.

	*/

		$dbh = new PDO('mysql:host=localhost;dbname=ci', 'root', '');

		// $salt='hdi72hdhs&2';
		// $password = sha1($salt.$password);
		$query = "SELECT username FROM users WHERE username= '$username' AND password = '$password'";
		$result = $dbh->prepare($query);
		$result->execute();
		if($result->rowcount()!=0){
			$row= $result->fetch(PDO::FETCH_ASSOC);
			$_SESSION['username'] = $username;
			$dbh=null;
			return true;
		}
		return false;
}

function get_pvs(){


	$dbh = new PDO('mysql:host=localhost;dbname=ci', 'root', '');

 	
 	$query = "SELECT * FROM pv ORDER BY year DESC";
	$result = $dbh->prepare($query);
	$result->execute();
 	$data = $result->fetchAll();
 	$dbh = null;
 	return $data;

}

function get_os(){


	$dbh = new PDO('mysql:host=localhost;dbname=ci', 'root', '');

 	
 	$query = "SELECT * FROM os ORDER BY year DESC";
	$result = $dbh->prepare($query);
	$result->execute();
 	$data = $result->fetchAll();
 	$dbh = null;
 	return $data;

}

function get_memoires(){

	$dbh = new PDO('mysql:host=localhost;dbname=ci', 'root', '');

 	
 	$query = "SELECT * FROM memoires ORDER BY year DESC";
	$result = $dbh->prepare($query);
	$result->execute();
 	$data = $result->fetchAll();
 	$dbh = null;
 	return $data;

}



function upload_memoire($prenom,$nom,$titre){

	$dbh = new PDO('mysql:host=localhost;dbname=ci', 'root', '');
	$date=date("Y");
	$query = "insert into memoires (last_name,first_name,title,year) 
		          values ('$nom','$prenom','$titre',$date)";
	$dbh->prepare($query)->execute();
	$dbh = null;	
}

function upload_pv($pv_name,$year){


	$dbh = new PDO('mysql:host=localhost;dbname=ci', 'root', '');

	$query = "insert into pv(name,year) 
		          values ('$pv_name',$year)";
	$dbh->prepare($query)->execute();
	$dbh = null;	
}

function upload_os($os_name,$year){

	$dbh = new PDO('mysql:host=localhost;dbname=ci', 'root', '');

	$query = "insert into os(name,year) 
		          values ('$os_name',$year)";
	$dbh->prepare($query)->execute();
	$dbh = null;	
}


function register($username,$password) {


	/*

		Fonction qui inscrit un nouvel utilisateur dans la base de donnees en verifiant que l'utilisateur n'existe pas encore. 
		
	*/

/*	$dbh = new PDO('mysql:host=localhost;dbname=projet','root','');

	$salt='hdi72hdhs&2';
	$password = sha1($salt.$password);

	$query = "SELECT COUNT(username) as total FROM users WHERE username = '$username'";
	$result = $dbh->prepare($query);
	$result->execute();
	$data=$result->fetch();
	if($data['total'] != 0){
		return -1; // user already exists
	}

	if(register_regex($username)){

		$query = "insert into utilisateurs (mdp_hash,username,admin,valide) 
		          values ('$password','$username',0,0)";
		$dbh->prepare($query)->execute();
		$dbh = null;	
		return 1; // user registered
	}
	return -2; // error with the username
*/
}





?>