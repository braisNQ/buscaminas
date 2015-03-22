<?php
/*
 * Autor: Brais Carrión Ansias
 * IAWEB 14/15
 */
?>

<?php include("header.php"); ?>

<?php
    
    //se non existe unha variable de sesión
        //realiza as accións de rexistro e login
    //else
        //aviso de xa ter unha sesión iniciada

    if (!isset($_SESSION['ID']))
    {
        $accion = $_POST['accion'];    
        
        if ($accion=="rexistro")
        {
            if(validamail($_POST['inputLoginRexistro']))
            {
                $bd = new BD();
                
                //busca o login introducido na BD
                //se non existe
                    //inserta o usuario
                    //se non hai fallos
                        //crea sesión para o usuario
                        //aviso de rexistro correcto
                    //else
                        //aviso erro no rexistro
                //else
                    //aviso de login xa existente
                
                if($bd->buscaLogin($_POST['inputLoginRexistro'])->num_rows == 0)
                {
                    if($resultado = $bd->rexistro($_POST['inputLoginRexistro'], $_POST['inputContrasinalRexistro'], $_POST['inputNomeRexistro']))
                    {
                        $resultado = $bd->login($_POST['inputLoginRexistro'], $_POST['inputContrasinalRexistro']);        
                        if($resultado->num_rows > 0)
                        {
                            while($row = $resultado->fetch_assoc())
                            {
                                $_SESSION['ID'] = $row['ID'];
                            }
                        }
                        aviso("success", "Noraboa ".$_POST['inputNomeRexistro']."! Rexistr&aacute;cheste correctamente.", "index.php", "Voltar ao Inicio");
                    }
                    else
                        aviso("danger", "Algo foi mal durante o rexistro.", "index.php", "Voltar ao Inicio");
                }
                else
                    aviso("danger", "O mail introducido xa est&aacute; en uso.", "index.php", "Voltar ao Inicio");  
            }
            else
                aviso("danger", "O correo introducido non cumple os requisitos de validaci&oacute;n.", "index.php", "Voltar ao Inicio");                 
        }
    
        if ($accion=="login")
        {
            if(validamail($_POST['inputLogin']))
            {
                $bd = new BD();
                $resultado = $bd->login($_POST['inputLogin'], $_POST['inputContrasinal']);
                
                if($resultado->num_rows > 0)
                {
                    while($row = $resultado->fetch_assoc())
                    {
                        $_SESSION['ID'] = $row['ID'];
                    }
                    header("location:index.php");
                }
                else
                    aviso("danger", "Usuario ou contrasinal incorrecto.", "index.php", "Voltar ao Inicio");
            }
            else
                aviso("danger", "O correo introducido non cumple os requisitos de validaci&oacute;n.", "index.php", "Voltar ao Inicio");
        
        }
    }
    else
        aviso("danger", "Xa hai unha sesi&oacute;n aberta no navegador.", "index.php", "Voltar ao Inicio");
    
?>


<?php include("footer.php"); ?>