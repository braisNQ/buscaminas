<?php
/*
 * Autor: Brais Carrión Ansias
 * IAWEB 14/15
 */
?>

<?php include("header.php"); ?>

<?php
	if(isset($_SESSION['ID']))
    {
    	if(isset($_POST['rexistrascore']))
    	{
        
	        if($usuarioActual->rexistraScore($_POST['inputTempo'], $_POST['dimension']))
	        {
	            header("location:xogar.php?msg=exito");
	        }
	        else
	            aviso("danger", "Ocorreu un erro ao enviar a puntuaci&oacute;n.", "lista_clasificacion.php", "Ir &aacute; Clasificaci&oacute;n");
	    }
	    else
	    	aviso("danger", "Ocorreu un erro.", "lista_clasificacion.php", "Ir &aacute; Clasificaci&oacute;n");
    }
    else
        aviso("danger", "Non deber&iacute;as estar aqu&iacute;.", "index.php", "Voltar ao Inicio");
?>

<?php include("footer.php"); ?>