<?php
ini_set('default_charset', 'UTF-8');
session_start();


require('includes/globalVars.inc.php');

require('includes/DBFunctions.inc.php');



require('includes/HTMLFunctions.inc.php');

$footer=footer();
$nav = nav();




$actions = array('autres','mtsm','forumemploi','news','logout','index','presentation','os','memoires','forums','login','comite','bal','bapteme','comitebapteme','cris','pv','fosdem','ventes','enligne','noustrouver','contacts','sponsoring','settings'); 


if (isset($_GET['action']) && in_array($_GET['action'],$actions)) {


	require('actions/' . $_GET['action'] . '.inc.php');

	
} 
else {

    require('actions/news.inc.php');
}
?>