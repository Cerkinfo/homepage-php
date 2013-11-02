<?php


$data = get_memoires();
$output = get_all_memoires($data);

$upload="";
$error="";

if(isset($_SESSION['username']) && $_SESSION['username'] == 'secretaire'){

	$upload=get_upload_memoire();

}


if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['titre'])){

        upload_memoire($_POST['prenom'],$_POST['nom'],$_POST['titre']);

        if (isset($_FILES['memoire']) &&  (!empty($_FILES["memoire"])) && ($_FILES['memoire']['error'] == 0))
        {

                if ($_FILES['memoire']['size'] <= 1000000)
                {
              
                        $infos = pathinfo($_FILES['memoire']['name']);
                        $extension_upload = $infos['extension'];
                        $allowed_extensions = array('PDF');
                        if (in_array($extension_upload, $allowed_extensions) && $_FILES["memoire"]["type"] == "application/pdf")
                        {

                                if(move_uploaded_file($_FILES['memoire']['tmp_name'], 'memoires/' . basename($_FILES['memoire']['name']))){
                                	$error="<div class='succes'>Succès: Le fichier a été uploadé avec succès!</div>";
                                }
                                else
                                	$error="<div class='error'>Erreur: Problème lors de l'upload du fichier!</div>";
                                
                        }
                        else
                        	$error="<div class='error'>Erreur: le fichier n'est pas un pdf!</div>";
                }
                else
                	$error="<div class='error'>Erreur: le poids du fichier exède le poids limite</div>";

        }
        else
                $error="<div class='error'>Vous n'avez rien uploader</div>";
}

require(PATH_VIEWS .'memoires.inc.php');

?>