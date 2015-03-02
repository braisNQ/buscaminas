<?php


class usuario
{
    private $bd;
    
    private $id;
    
    private $login;
    private $contrasinal;
    private $nome;
    private $tipo;    
    
    private $existe;
    
    /*
     * tipo
     * 1- admin
     * 2- usuaria/o
     */
    
    /*
     * función __construct
     * crea un obxecto usuario a partir da súa ID
     */
    function __construct($i)
    {
        $this->bd = new BD();
        
        $this->id = $i;    
        
        $mi = mysqli_real_escape_string($this->bd->conexion, $i);
        $sql = "select * from Usuario where ID = '".$mi."'";
        $u = mysqli_query($this->bd->conexion, $sql);    
        
        if($u->num_rows > 0)
        {
            while($row = $u->fetch_assoc())
            {
                $this->login = $row['login'];
                $this->contrasinal = $row['contrasinal'];
                $this->nome = $row['nome'];
                $this->tipo = $row['tipo'];
                $this->existe = true;
            }
        }
        else
        {
            $this->existe = false;
            
        }
    }
    
    /*
     * destructor da clase usuario
     */
    function __destruct()
    {}
    
    /*
     * función existe()
     * devolve true en caso de que o usuario exista na BD 
     */
     function existe()
     {
        return $this->existe;
     }
    
    /*
     * función admin()
     * devolve true se o usuario é administrador (tipo 1) do sistema
     */
     function admin()
     {
        return ($this->tipo == 1);
     } 
     
     /*
      * función getLogin()
      * devolve o Login do usuario
      */
      function getLogin()
      {
          return $this->login;          
      }
      
     /*
      * función getNome()
      * devolve o nome do usuario
      */
      function getNome()
      {
          return $this->nome;          
      }
            
     /*
      * función getTipo()
      * devolve o tipo do usuario
      */
      function getTipo()
      {
          return $this->tipo;          
      }
     
     /*
      * funcion editar($nome, $contrasinal)
      * edita os datos de nome e contrasinal do usuario
      */
     function editar($nome, $contrasinal)
     {
        $n = mysqli_real_escape_string($this->bd->conexion, $nome);
        $sql = "update Usuario set nome = '".$n."', contrasinal = '".$contrasinal."' where ID = '".$this->id."'";
        return mysqli_query($this->bd->conexion, $sql);
     }
    
    /*
     * función darAdmin()
     * actualiza o usuario para darlle nivel de administrador
     */
    function darAdmin()
    {
        $sql = "update Usuario set tipo = 1 where ID = '".$this->id."'";
        $this->tipo = 1;
        return mysqli_query($this->bd->conexion, $sql);
    }
    
    /*
     * función quitarAdmin()
     * actualiza o usuario para quitarlle nivel de administrador
     */
    function quitarAdmin()
    {
        $nivel = 3;
        
        $sql = "select * from TorneoModerador where ID_moderador = '".$this->id."'";
        $u = mysqli_query($this->bd->conexion, $sql);    
            
        if($u->num_rows > 0)
            $nivel = 2;
        
        $sql = "update Usuario set tipo = '".$nivel."' where ID = '".$this->id."'";
        
        $this->tipo = $nivel;
        return mysqli_query($this->bd->conexion, $sql);
    }
    
    /*
     * función eliminar()
     * elimina o usuario do sistema
     */
    function eliminar()
    {
        $sql = "update Usuario set ID_equipo = NULL where ID_equipo ='".$this->ID_equipo."'";
        $toret = mysqli_query($this->bd->conexion, $sql);
        
        $sql = "delete from Equipo where ID='".$this->ID_equipo."'";        
        $toret = ($toret && mysqli_query($this->bd->conexion, $sql));

        $sql = "delete from Usuario where ID='".$this->id."'";        
        return ($toret && mysqli_query($this->bd->conexion, $sql));
    }
    
}

?>