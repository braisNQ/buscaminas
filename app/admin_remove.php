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
            $user = new usuario($id);
            
            //se se pulsou o botón
            if(isset($_POST['accion']))
            {
                if($_POST['accion'] == "quitar")
                {
                    if($user->quitarAdmin())
                        aviso("success", "O usuario ".$user->getNome()." xa non &eacute; administrador.", "lista_usuarios.php", "Voltar &aacute; lista de usuarios");
                    else
                        aviso("danger", "Ocorreu un erro ao retirar a administraci&oacute;n.", "usuario.php?id=".$id, "Voltar ao perfil");

                }
                //se chegou sen o botón de dar admin
                else
                {
                    aviso("danger", "Ocorreu un erro.", "usuario.php?id=".$id, "Voltar ao perfil");
                }
            }
            //mostrar formulario inicial
            else
            {
                echo '
                    <form class="form-horizontal" role="form" id="formQuitarAdmin" action="admin_remove.php" method="post">
                        <input type="hidden" id="id" name="id" value="'.$id.'">                    
                        <div class="alert alert-info" role="alert">Est&aacute;s seguro de retirar o cargo de administrador/a a <b>'.$user->getNome().'?</b></div>                
                        <div class="form-group">                
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-danger" id="accion" name="accion" value="quitar"><span class="glyphicon glyphicon-minus-sign"></span> Quitar administrador</button>
                                <a href="usuario.php?id='.$id.'" class="btn btn-default">Voltar ao perfil</a>
                            </div>
                          </div>
                    </form>
                ';
            }
        }
            
    }

?>

        </div> <!--jumbotron -->
    </div> <!-- /container -->
    
<?php include("footer.php"); ?>