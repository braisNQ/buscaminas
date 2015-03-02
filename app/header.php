<?php
/*
 * Activar debug de php
 */
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
?>

<?php
    /*
     * iniciando sesión 
     */ 
    session_start();
     
    //incluindo todas as clases da aplicación
    include_once("clase_BD.php");
    include_once("clase_usuario.php");
    include_once("clase_taboleiro.php");
     
    if (isset($_SESSION['ID']))
    {
        $usuarioActual = new usuario($_SESSION['ID']);
    }
?>

<!DOCTYPE html>
<html lang="gl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Buscaminas - IAWEB 14/15">
        <meta name="author" content="Brais Carrion Ansias">

        <title>Buscaminas</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/navbar-fixed-top.css" rel="stylesheet">

        <!-- Brais CSS -->        
        <link href="css/buscaminas.css" rel="stylesheet">
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
  </head>

  <body>