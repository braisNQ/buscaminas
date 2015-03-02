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
   * función login(ususario, contrasinal)
   * busca na BD se existe algunha entrada para os parámetros indicados
   * devolve o usuario solicitado
   */
  function login ($usuario, $contrasinal)
  {
    $u = mysqli_real_escape_string($this->conexion, $usuario);
    $sql = "select * from Usuario where login = '".$u."' and contrasinal ='".$contrasinal."'";
    return mysqli_query($this->conexion, $sql);
  }
     
  /*
   * función rexistro ($usuario, $contrasinal, $nome)
   * inserta na BD un novo usuario
   * devolve o resultado de executar a consulta
   */
  function rexistro ($usuario, $contrasinal, $nome)
  {
    $u = mysqli_real_escape_string($this->conexion, $usuario);
    $n = mysqli_real_escape_string($this->conexion, $nome);
    $sql = "insert into Usuario (login, contrasinal, nome, tipo) values ('".$u."', '".$contrasinal."', '".$n."', 3)";
    return mysqli_query($this->conexion, $sql);
  }
     
  /*
   * función buscaLogin($login)
   * busca un login concreto na BD
   */
  function buscaLogin($login)
  {
    $l = mysqli_real_escape_string($this->conexion, $login);
    $sql = "select * from Usuario where login = '".$l."'";
    return mysqli_query($this->conexion, $sql);         
  }
        
  /*
   * función numeroUsuarios()
   * devolve o número de usuarios creados na aplicación sen contar a "administrador"
   */
  function numeroUsuarios()
  {
    $sql = "select * from Usuario where ID > 1";
    $res = mysqli_query($this->conexion, $sql);
    return $res->num_rows;        
  }
      
  /*
   * función listarUsuarios
   * devolve a lista de usuarios que cumplen un filtro específico
   */
  function listarUsuarios($login, $nome, $orderby, $order, $inicio, $items)
  {
    $l = mysqli_real_escape_string($this->conexion, $login);
    $n = mysqli_real_escape_string($this->conexion, $nome);
    
    $sql='';
    $sql = $sql."select ID, login, nome, tipo from Usuario where ";
    $sql = $sql."ID > 1 ";
    $sql = $sql."and nome like '%".$n."%' ";
    $sql = $sql."and login like '%".$l."%' ";                
    $sql = $sql."order by ".$orderby." ".$order." ";        
    $sql = $sql."limit " . $inicio . "," . $items." " ;
    
    return mysqli_query($this->conexion, $sql);          
  }
      
  /*
   * función listarUsuariosCont
   * devolve o número de usuarios que cumplen un filtro específico
   */
  function listarUsuariosCont($login, $nome)
  {
    $l = mysqli_real_escape_string($this->conexion, $login);
    $n = mysqli_real_escape_string($this->conexion, $nome);
    
    $sql='';
    $sql = $sql."select ID, login, nome, tipo from Usuario where ";
    $sql = $sql."ID > 1 ";
    $sql = $sql."and nome like '%".$n."%' ";
    $sql = $sql."and login like '%".$l."%' ";
    
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
    $sql = "select * from Partida";
    $res = mysqli_query($this->conexion, $sql);
    return $res->num_rows;        
  }
    
  /*
   * función listarPartidas
   * devolve a lista de partidas que cumplen un filtro específico
   */
  function listarPartidas($nome, $order, $inicio, $items)
  {
    $n = mysqli_real_escape_string($this->conexion, $nome);
     
    $sql='';
    $sql = $sql."select ID, puntuacion, data";
    $sql = $sql."(select Usuario.nome from Usuario where Usuario.ID = Partida.ID_xogador) as xogador ";
    $sql = $sql." from Partida where ";
    $sql = $sql."nome like '%".$n."%' ";
                        
    $sql = $sql."order by nome ".$order." ";        
    $sql = $sql."limit " . $inicio . "," . $items." " ;
      
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
    $sql = $sql."(select count(*) from Usuario where Usuario.ID_equipo = Equipo.ID) as membros, ";
    $sql = $sql."(select Usuario.nome from Usuario where Usuario.ID = Equipo.ID_propietario) as propietario ";
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