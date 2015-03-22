<?php
/*
 * Autor: Brais Carrión Ansias
 * IAWEB 14/15
 */
?>

<?php include("header.php"); ?>

<?php menu("xogar");?>

<div class="container">
    <?php include("login.php"); ?>
</div>

<div class="container">
    <div class="jumbotron">

<?php

    //se o usuario non está logueado
    if(!isset($_SESSION['ID']))
    {
        avisosimple("danger", "Acceso non autorizado.<br />Debes iniciar sesi&oacute;n para poder xogar.");
    }
    else
    {

        if(isset($_GET['msg']))
            if($_GET['msg'] == "exito")
                avisosimple("success", "Puntuaci&oacute;n enviada correctamente.");

        //valor de dimensión por defecto
        $dimension = 6;

        //se existe a cookie de dimensión cambia o valor
        if(isset($_COOKIE['dimension']))
        {
            $dimension= $_COOKIE['dimension'];
        }

        //debuxar compoñentes do taboleiro
        $taboleiro = new taboleiro($dimension);
        $taboleiro->configurador();
        echo "<br /><br />";
        $taboleiro->formulario();

        $taboleiro->progreso();

        $taboleiro->debuxa();
        echo "<br />";
        $taboleiro->reiniciar();
    }

?>


    </div> <!--jumbotron -->
</div> <!-- /container -->

<?php include("footer.php"); ?>