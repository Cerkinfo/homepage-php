<?php


$data = get_os();


$output = get_all_os($data);

$upload="";
$error="";



if(isset($_SESSION['username']) && $_SESSION['username'] == 'secretaire'){

	$upload=get_upload_os();

}


if(isset($_POST['nom']) && isset($_POST['year'])){

        upload_os($_POST['nom'],$_POST['year']);

        if (isset($_FILES['os']) &&  (!empty($_FILES["os"])) && ($_FILES['os']['error'] == 0))
        {

                if ($_FILES['os']['size'] <= 1000000)
                {
              
                        $infos = pathinfo($_FILES['os']['name']);
                        $extension_upload = $infos['extension'];
                        $allowed_extensions = array('pdf');
                        if (in_array(strtolower($extension_upload), $allowed_extensions) && $_FILES["os"]["type"] == "application/pdf")
                        {

                                if(move_uploaded_file($_FILES['os']['tmp_name'], 'os/' . $_POST['nom'].'.pdf')){
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



require(PATH_VIEWS .'os.inc.php');

?>