<?php
/*
 * Autor: Brais Carrión Ansias
 * IAWEB 14/15
 */
?>

<?php include("header.php"); ?>

<?php menu("usuarios");?>

<div class="container">
  <?php include("login.php"); ?>
</div>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        
<?php

    //se chega sen loguear ou non é admin
    if(!isset($_SESSION['ID']) || !$usuarioActual->admin())
    {
        aviso("danger", "Ups! non deberías estar aqu&iacute;.", "lista_usuarios.php", "Voltar &aacute; lista de usuarios");
    }
    else
    {
        //se non hai ningunha id
        if(!isset($_GET['id']) && !isset($_POST['id']))
            aviso("danger", "Ocorreu alg&uacute;n erro ao obter o usuario.", "lista_usuarios.php", "Voltar &aacute; lista de usuarios");
        else
        {        
            $id;
            if(isset($_GET['id']))
                $id= $_GET['id'];
            if(isset($_POST['id']))
                $id= $_POST['id'];

            if($id == 1)
            {
               aviso("danger", "O superadmin non pode ser eliminado.", "lista_usuarios.php", "Voltar &aacute; lista de usuarios");
            }
            else
            {
                $usuario = new usuario($id);
                
                //se se pulsou o botón
                if(isset($_POST['accion']))
                {
                    if($_POST['accion'] == "eliminar")
                    {
                        if($usuario->eliminar())
                            aviso("success", "Usuario eliminado correctamente.", "lista_usuarios.php", "Voltar &aacute; lista de usuarios");
                        else
                            aviso("danger", "Ocorreu un erro ao eliminar o usuario.", "usuario.php?id=".$id."&tab=editar", "Voltar ao perfil");
                    }
                    //se chegou sen o botón
                    else
                    {
                        aviso("danger", "Ocorreu un erro.", "usuario.php?id=".$id, "Voltar ao perfil");
                    }
                }
                //mostrar formulario inicial
                else
                {
                    echo '
                        <form class="form-horizontal" role="form" id="formEliminarUsuario" action="usuario_delete.php" method="post">
                            <input type="hidden" id="id" name="id" value="'.$id.'">                    
                            <div class="alert alert-info" role="alert">Est&aacute;s seguro de querer eliminar o usuario <b>'.$usuario->getNome().'?</b></div>                
                            <div class="form-group">                
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-danger" id="accion" name="accion" value="eliminar"><span class="glyphicon glyphicon-remove-sign"></span> Eliminar usuario</button>
                                    <a href="usuario.php?id='.$id.'" class="btn btn-default">Voltar ao perfil</a>
                                </div>
                              </div>
                        </form>
                    ';
                }
            }               
        }
    }
?>

        </div> <!--jumbotron -->
    </div> <!-- /container -->
    
<?php include("footer.php"); ?>