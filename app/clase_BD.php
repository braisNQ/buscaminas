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
   * función listarusuarios
   * devolve a lista de usuarios que cumplen un filtro específico
   */
  function listarusuarios($mail, $nome, $orderby, $order, $inicio, $items)
  {
    $m = mysqli_real_escape_string($this->conexion, $mail);
    $n = mysqli_real_escape_string($this->conexion, $nome);
    
    $sql='';
    $sql = $sql."select ID, mail, nome, nivel from usuario where ";
    $sql = $sql."ID > 1 ";
    $sql = $sql."and nome like '%".$n."%' ";
    $sql = $sql."and mail like '%".$m."%' ";                
    $sql = $sql."order by ".$orderby." ".$order." ";        
    $sql = $sql."limit " . $inicio . "," . $items." " ;
    
    return mysqli_query($this->conexion, $sql);          
  }
      
  /*
   * función listarusuariosCont
   * devolve o número de usuarios que cumplen un filtro específico
   */
  function listarusuariosCont($mail, $nome, $nivel)
  {
    $m = mysqli_real_escape_string($this->conexion, $mail);
    $n = mysqli_real_escape_string($this->conexion, $nome);
    
    $sql='';
    $sql = $sql."select ID, login, nome, tipo from usuario where ";
    $sql = $sql."ID > 1 ";
    $sql = $sql."and nome like '%".$n."%' ";
    $sql = $sql."and mail like '%".$m."%' ";
    
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
  function listarPartidas($nome, $dimension, $inicio, $items)
  {
    $n = mysqli_real_escape_string($this->conexion, $nome);
     
    $sql='';
    $sql = $sql."select ID, dimension, tempo, data";
    $sql = $sql."(select usuario.nome from usuario where usuario.ID = Partida.id_usuario) as nome ";
    $sql = $sql." from partida where ";
    $sql = $sql." nome like '%".$n."%' ";
    $sql = $sql." and dimension ='".$dimension."' ";
                        
    $sql = $sql." order by tempo desc ";        
    $sql = $sql." limit " . $inicio . "," . $items." " ;
      
    return mysqli_query($this->conexion, $sql);          
  }
      
  /*
   * función listarEquiposCont
   * devolve o número de equipos que cumplen un filtro específico
   */
  function listarEquiposCont($nome)
  {
    $n = mysqli_real_escape_string($this->conexion, $nome);
      
    $sql='';
    $sql = $sql."select ID, nome, ID_propietario, ";
    $sql = $sql."(select count(*) from usuario where usuario.ID_equipo = Equipo.ID) as membros, ";
    $sql = $sql."(select usuario.nome from usuario where usuario.ID = Equipo.ID_propietario) as propietario ";
    $sql = $sql." from Equipo where ";
    $sql = $sql."nome like '%".$n."%' ";
              
    $toret = 0;
      
    if($u = mysqli_query($this->conexion, $sql))
      $toret = $u->num_rows;
      
    return $toret;      
  } 
    
  /*
   * función crearEquipo ($usuario, $nome, $nome)
   * inserta na BD un novo equipo
   * devolve o resultado de executar a consulta
   */
  function crearEquipo($usuario, $nome, $codigo)
  {
    $u = mysqli_real_escape_string($this->conexion, $usuario);
    $n = mysqli_real_escape_string($this->conexion, $nome);        
    $c = mysqli_real_escape_string($this->conexion, $codigo);
      
    $sql = "insert into Equipo (nome, ID_propietario, codigo_ingreso) values ('".$n."', '".$u."', '".$c."')";
    return mysqli_query($this->conexion, $sql);
  }
}

?>