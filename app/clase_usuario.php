<?php


class usuario
{
    private $bd;
    
    private $id;
    
    private $mail;
    private $pass;
    private $nome;
    private $nivel;    
    
    private $existe;
    
    /*
     * nivel
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
        $sql = "select * from usuario where ID = '".$mi."'";
        $u = mysqli_query($this->bd->conexion, $sql);    
        
        if($u->num_rows > 0)
        {
            while($row = $u->fetch_assoc())
            {
                $this->mail = $row['mail'];
                $this->pass = $row['pass'];
                $this->nome = $row['nome'];
                $this->nivel = $row['nivel'];
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
     * devolve true se o usuario é administrador (nivel 1) do sistema
     */
     function admin()
     {
        return ($this->nivel == 1);
     } 
     
     /*
      * función getmail()
      * devolve o mail do usuario
      */
      function getMail()
      {
          return $this->mail;          
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
      * función getNivel()
      * devolve o nivel do usuario
      */
      function getNivel()
      {
          return $this->nivel;          
      }
     
     /*
      * funcion editar($nome, $pass)
      * edita os datos de nome e pass do usuario
      */
     function editar($nome, $pass)
     {
        $n = mysqli_real_escape_string($this->bd->conexion, $nome);
        $sql = "update usuario set nome = '".$n."', pass = '".$pass."' where ID = '".$this->id."'";
        return mysqli_query($this->bd->conexion, $sql);
     }
    
    /*
     * función darAdmin()
     * actualiza o usuario para darlle nivel de administrador
     */
    function darAdmin()
    {
        $sql = "update usuario set nivel = 1 where ID = '".$this->id."'";
        $this->nivel = 1;
        return mysqli_query($this->bd->conexion, $sql);
    }
    
    /*
     * función quitarAdmin()
     * actualiza o usuario para quitarlle nivel de administrador
     */
    function quitarAdmin()
    {
        $nivel = 2;        
        $sql = "update usuario set nivel = '".$nivel."' where ID = '".$this->id."'";        
        $this->nivel = $nivel;
        return mysqli_query($this->bd->conexion, $sql);
    }
    
    /*
     * función eliminar()
     * elimina o usuario do sistema
     */
    function eliminar()
    {
        $sql = "update usuario set ID_equipo = NULL where ID_equipo ='".$this->ID_equipo."'";
        $toret = mysqli_query($this->bd->conexion, $sql);
        
        $sql = "delete from Equipo where ID='".$this->ID_equipo."'";        
        $toret = ($toret && mysqli_query($this->bd->conexion, $sql));

        $sql = "delete from usuario where ID='".$this->id."'";        
        return ($toret && mysqli_query($this->bd->conexion, $sql));
    }
    
}

?>