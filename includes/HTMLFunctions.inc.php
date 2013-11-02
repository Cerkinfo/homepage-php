<?php
// <img style='width:17px;height:17px'src='imgs/skull.png'>
function nav(){

	$output = "<nav>
		
			<div id='logo'><span class='cercle'>Cerk <span class='info'>Info</span></div>
		<ul class='menu' >
			<li><a>Cercle</a>
					<ul>
					<li><a href='index.php?action=news'>News</a></li>
					<li><a href='forums/'>Forums</a></li>
				 	<li><a href='index.php?action=presentation'>Présentation</a></li>
					<li><a href='index.php?action=comite'>Comité</a></li> 
					<li><a href='index.php?action=os'>Os</a></li>
					<li><a href='index.php?action=photos'>Photos</a></li>
				</ul>
			</li><li><a>Contact</a>
					<ul>
					<li><a href='index.php?action=enligne'>En ligne</a></li><!-- 
				 --><li><a href='index.php?action=noustrouver'>Nous trouver</a></li><!-- 
				 --><li><a href='index.php?action=sponsoring'>Sponsoring</a></li><!-- 
				 --><li><a href='index.php?action=contacts'>Contacts</a></li>
				</ul>
			</li>
		 <li><a>Events</a>
					<ul>
				 <li>
				 <li><a href='index.php?action=bal'>Bal</a></li><!-- 
				 --><li><a href='index.php?action=forumemploi'>Forum de l'emploi</a></li><!-- 
				 --><li><a href='index.php?action=fosdem'>FOSDEM</a></li><!-- 
				 --><li><a href='index.php?action=mtsm'>MTSM</a></li><!-- 
				 --><li><a href='index.php?action=autres'>Autres</a></li>
				</ul>				
			</li><!-- 
		 --><li><a>Etudes</a>
					<ul>
					<li><a href='index.php?action=ventes'>Ventes de syllabus</a></li><!-- 
				 --><li><a href='index.php?action=memoires'>Memoires</a></li>
				 	<li><a href='index.php?action=cours'>Cours</a></li>
				</ul>
			</li><!-- 
			 --><li><a>Infos</a>
					<ul>
					<li><a href='index.php?action=pv'>PV</a></li><!-- 
				 --><li><a href='index.php?action=Fortunes'>Fortunes</a></li>
				 	<li><a href='index.php?action=cipedia'>Cipédia</a></li>
				</ul>
			</li>
			<li><a>Folklore </a>
					<ul>
					<li><a href='index.php?action=bapteme'>Baptême</a></li>
					<li><a href='index.php?action=comitebapteme'>Comité de bapteme</a></li>
				 	<li><a href='index.php?action=cris'>Cris</a></li>
				</ul>
			</li>
			<li><a>Guilde</a>
					<ul>
					<li><a href='index.php?action=guilde'>Guilde</a></li>

				</ul>
			</li>";
			if(isset($_SESSION['username']))
				$output .= "<li><a href='index.php?action=logout'>Logout</a>";
			else
				$output.="<li><a href='index.php?action=login'>Login</a>";
			$output .="
			</li>
		 
		</ul>
		</nav>

	";
	return $output;

}

function get_all_memoires($data){

	$output= "";
	$year_i = 0;

 foreach($data as $row){


 	$first_name = $row['first_name'];
 	$last_name = strtolower($row['last_name']);
 	$year = $row['year'];
 	$title = utf8_encode($row['title']);

 	if($year_i == 0){
 		$year_i = $year;
 		$output .= "<h2>$year_i</h2><br><br>";
 	}

 	if($year < $year_i){
 		$year_i = $year;
 		$output .= "<h2>$year_i</h2><br><br>";
 	}
 	$last_name_up = strtoupper($last_name);
 	$first_name = utf8_encode(ucfirst($first_name));
 	$output .= "<a href='memoires/$last_name.pdf'>$title</a> $first_name $last_name_up<br><br>";

 }

 return $output;


}

function footer(){


return "<div id='footer'>	<img src='imgs/logo.png' style='display:inline-block;'><div class='copyright'>Copyright 2013-2014 Cercle Informatique de L'ULB</div></div><a href='https://www.facebook.com/cerkinfo'><div id='social'><span class='fb'>f</span></div></a>";


}

function get_upload_memoire(){


	return "<form action='index.php?action=memoires' method='post' enctype='multipart/form-data'>
        <p>
                Upload d'un mémoire :<br><br>
                <label for='prenom'>Prenom</label> <input type='text' name='prenom' /><br>
                <label for='nom'>Nom</label><input type='text' name='nom' /><br>
                <label for='titre'>Titre du mémoire</label><input type='text' name='titre' /><br><br>
                <input type='file' name='memoire' /><br><br>
                <input type='submit' value='Envoyer le mémoire' />
        </p>
</form><br><br>";
}

function get_upload_pv(){


	return "<form action='index.php?action=pv' method='post' enctype='multipart/form-data'>
        <p>
                Upload d'un pv :<br><br>
                <input type='file' name='pv' /><br><br>
                AG? <input type='checkbox' name='ag' /><br><br>
                <input type='submit' value='Envoyer le PV' />
        </p>
</form><br><br>";
}

function get_upload_os(){


	return "<form action='index.php?action=os' method='post' enctype='multipart/form-data'>
        <p>
                Upload d'un os :<br><br>
                <label for='nom'>nom</label> <input type='text' name='nom' /><br>
                <label for='year'>année</label> <input type='text' name='year' /><br><br>
                <input type='file' name='os' /><br><br>
                <input type='submit' value='Envoyer l'OS />
        </p>
</form><br><br>";
}


function get_all_os($data){

 $output= "";
 $p_year=0;

 foreach($data as $row){

 	$name = $row['name'];
 	$year= $row['year'];
 	if($p_year == 0){
 		$p_year = $year;
 		$output .= "<h2>$year</h2><br><br>";
 	}
 	if($year < $p_year){
 		$p_year=$year;
 		$output .= "<h2>$year</h2><br><br>";
 	}
 	


 	$output .= "<a href='os/$year/$name.pdf'>$name</a><br>";

 }

return $output;
}

function get_all_pvs($data){

 $output= "";
 $p_year=0;

 foreach($data as $row){

 	$name = $row['name'];
 	$year = $row['year'];
 	if($p_year == 0){
 		$p_year = $year;
 		$output .= "<h2>$year</h2><br><br>";
 	}
 	if($year < $p_year){
 		$p_year=$year;
 		$output .= "<h2>$year</h2><br><br>";
 	}
 	


 	$output .= "<a href='pv/$year/$name.pdf'>$name</a><br>";

 }

return $output;
}

?>