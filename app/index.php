<?php include("header.php"); ?>


<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Buscaminas</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="lista_usuarios.php">Usuarios</a></li>
                <li><a href="lista_clasificacion.php">Clasificaci&oacute;n</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">
	<?php include("login.php"); ?>
</div>

<div class="container">
	<div class="jumbotron">
    	<h4>Buscaminas</h4>

<?php

$taboleiro = new taboleiro(6);
echo "<br />";
$taboleiro->configurador();
echo "<br /><br />";
$taboleiro->formulario();

$taboleiro->progreso();

$taboleiro->debuxa();
echo "<br />";
$taboleiro->reiniciar();

?>


    </div> <!--jumbotron -->
</div> <!-- /container -->

<?php include("footer.php"); ?>