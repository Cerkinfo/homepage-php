<?php

$error="";
$upload="";

if(isset($_SESSION['username']) && $_SESSION['username'] == 'secretaire'){

	$upload=get_upload_pv();

}



if (isset($_FILES['pv']) &&  (!empty($_FILES["pv"])) && ($_FILES['pv']['error'] == 0))
{

        if ($_FILES['pv']['size'] <= 1000000) // to change
        {
      
                $infos = pathinfo($_FILES['pv']['name']);
                $extension_upload = $infos['extension'];
                $allowed_extensions = array('pdf');

               
                $day = date('j');
                $month = date('n');
                $year = date('Y');



                $pv_name = $year . '-' . $month . '-' .$day;
                 if(isset($_POST['ag']))
                        $pv_name .= '-AG';

                upload_pv($pv_name,$year);


                if (in_array(strtolower($extension_upload), $allowed_extensions) && $_FILES["pv"]["type"] == "application/pdf")
                {

                        


                        if (!is_dir('../pv/'.$year)) {
                            // mkdir('../pv/'.$year,0777);         
                        }

                        if(move_uploaded_file($_FILES['pv']['tmp_name'], 'pv/'.$year.'/'.$pv_name.'.pdf')){
                        	$error="<div class='success'>Succès: Le fichier a été uploadé avec succès!</div><br>";
                        }
                        else
                        	$error="<div class='error'>Erreur: Problème lors de l'upload du fichier!</div><br>";
                        
                }
                else
                	$error="<div class='error'>Erreur: le fichier n'est pas un pdf!</div>";
        }
        else
        	$error="<div class='error'>Erreur: le poids du fichier exède le poids limite</div>";

}
/*else
	$error="Erreur: pas de fichier uploadé";*/

$pvs = get_pvs(); //data
$output = get_all_pvs($pvs); //html result


require(PATH_VIEWS .'pv.inc.php');

?>