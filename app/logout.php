<?php
/*
 * Autor: Brais Carrión Ansias
 * IAWEB 14/15
 */
?>

<?php
    session_start();
    session_destroy();
    header('location: index.php'); 
?>