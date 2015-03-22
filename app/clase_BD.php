<?php
/*
 * Autor: Brais Carrión Ansias
 * IAWEB 14/15
 */
?>

<?php

class BD
{    
  var $conexion;    //almacena a conexión coa BD
    
  /*
   * función __construct
   * crea a conexión coa BD 
   */
  function __construct()
  {
    include("conexion.php");
    $this->conexion = mysqli_connect($bd_ip, $bd_user, $bd_pass, $bd_nome);
  }
    
  /*
   * función __destruct
   * elimina a conexión coa BD
   */    
  function __destruct()
  {
    mysqli_close($this->conexion);
  }
    
  /*
   * función login(ususario, pass)
   * busca na BD se existe algunha entrada para os parámetros indicados
   * devolve o usuario solicitado
   */
  function login ($mail, $pass)
  {
    $m = mysqli_real_escape_string($this->conexion, $mail);
    $p = mysqli_real_escape_string($this->conexion, $pass);
    $sql = "select * from usuario where mail = '".$m."' and pass ='".$p."'";
    return mysqli_query($this->conexion, $sql);
  }
     
  /*
   * función rexistro ($mail, $pass, $nome)
   * inserta na BD un novo usuario
   * devolve o resultado de executar a consulta
   */
  function rexistro ($mail, $pass, $nome)
  {
    $m = mysqli_real_escape_string($this->conexion, $mail);
    $p = mysqli_real_escape_string($this->conexion, $pass);
    $n = mysqli_real_escape_string($this->conexion, $nome);
    $sql = "insert into usuario (mail, pass, nome, nivel) values ('".$m."', '".$p."', '".$n."', 2)";
    return mysqli_query($this->conexion, $sql);
  }
     
  /*
   * función buscaLogin($login)
   * busca un mail concreto na BD
   */
  function buscaLogin($login)
  {
    $l = mysqli_real_escape_string($this->conexion, $login);
    $sql = "select * from usuario where mail = '".$l."'";
    return mysqli_query($this->conexion, $sql);         
  }
        
  /*
   * función numeroUsuarios()
   * devolve o número de usuarios creados na aplicación sen contar a "administrador"
   */
  function numeroUsuarios()
  {
    $sql = "select * from usuario where ID > 1";
    $res = mysqli_query($this->conexion, $sql);
    return $res->num_rows;        
  }
      
  /*
   * función listarUsuarios
   * devolve a lista de usuarios que cumplen un filtro específico
   */
  function listarUsuarios($mail, $nome, $nivel, $orderby, $order, $inicio, $items)
  {
    $m = mysqli_real_escape_string($this->conexion, $mail);
    $n = mysqli_real_escape_string($this->conexion, $nome);
    
    $sql='';
    $sql = $sql."select ID, mail, nome, nivel from usuario where ";
    $sql = $sql."ID > 1 ";
    $sql = $sql."and nome like '%".$n."%' ";
    $sql = $sql."and mail like '%".$m."%' ";
    if($nivel==1)   
      $sql = $sql."and nivel = '1' ";
    if($nivel==2)   
      $sql = $sql."and nivel = '2' ";         
    $sql = $sql."order by ".$orderby." ".$order." ";        
    $sql = $sql."limit " . $inicio . "," . $items." " ;
    
    return mysqli_query($this->conexion, $sql);          
  }
      
  /*
   * función listarUsuariosCont
   * devolve o número de usuarios que cumplen un filtro específico
   */
  function listarUsuariosCont($mail, $nome, $nivel)
  {
    $m = mysqli_real_escape_string($this->conexion, $mail);
    $n = mysqli_real_escape_string($this->conexion, $nome);
    
    $sql='';
    $sql = $sql."select ID, mail, nome, nivel from usuario where ";
    $sql = $sql."ID > 1 ";
    $sql = $sql."and nome like '%".$n."%' ";
    $sql = $sql."and mail like '%".$m."%' ";
    if($nivel==1)   
      $sql = $sql."and nivel = '1' ";
    if($nivel==2)   
      $sql = $sql."and nivel = '2' ";
    
    $toret = 0;
    
    if($u = mysqli_query($this->conexion, $sql))
        $toret = $u->num_rows;
    
    return $toret;            
  }
      
  /*
   * función numeroPartidas()
   * devolve o número de partidas creadas na aplicación
   */
  function numeroPartidas()
  {
    $sql = "select * from partida";
    $res = mysqli_query($this->conexion, $sql);
    return $res->num_rows;        
  }
    
  /*
   * función listarPartidas
   * devolve a lista de partidas que cumplen un filtro específico
   */
  function listarPartidas($nome, $mail, $dimension, $inicio, $items)
  {
    $n = mysqli_real_escape_string($this->conexion, $nome);
    $m = mysqli_real_escape_string($this->conexion, $mail);
     
    $sql='';
    $sql = $sql."select dimension, tempo, data, nome, mail from usuario, partida ";
    $sql = $sql." where usuario.ID = Partida.id_usuario and usuario.nome like '%".$n."%' and usuario.mail like '%".$m."%' ";
    if($dimension != 0)
      $sql = $sql." and partida.dimension ='".$dimension."' ";                        
    $sql = $sql." order by tempo asc, data asc";        
    $sql = $sql." limit " . $inicio . "," . $items." " ;
      
    return mysqli_query($this->conexion, $sql);          
  }
      
  /*
   * función listarPartidasCont
   * devolve o número de partidas que cumplen un filtro específico
   */
  function listarPartidasCont($nome, $mail, $dimension)
  {
    $n = mysqli_real_escape_string($this->conexion, $nome);
    $m = mysqli_real_escape_string($this->conexion, $mail);
      
    $sql='';
    $sql = $sql."select dimension, tempo, data, nome, mail from usuario, partida ";
    $sql = $sql." where usuario.ID = Partida.id_usuario and usuario.nome like '%".$n."%' and usuario.mail like '%".$m."%' ";
    if($dimension != 0)
      $sql = $sql." and partida.dimension ='".$dimension."' ";
              
    $toret = 0;
      
    if($u = mysqli_query($this->conexion, $sql))
      $toret = $u->num_rows;
      
    return $toret;      
  }
}

?>