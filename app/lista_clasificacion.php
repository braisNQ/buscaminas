<?php
/*
 * Autor: Brais Carrión Ansias
 * IAWEB 14/15
 */
?>

<?php include("header.php"); ?>


<?php menu("clasificacion");?>

<div class="container">
	<?php include("login.php"); ?>
</div>

<div class="container">
  <div class="jumbotron">
      <h4>Clasificaci&oacute;n</h4>
        
<?php

  /*
   * Variables default para o listado
   */
   $p = 1; //páxina listada
   
   $items = 10; //items listados por páxina
   $mail='';
   $nome='';
   $dimension=0;

  /*
   * recoller variables
   */
  if (isset($_POST['p']))
    $p = $_POST['p'];     
  if (isset($_POST['items']))
    $items = $_POST['items'];
  if (isset($_POST['mail']))
    $mail = $_POST['mail'];
  if (isset($_POST['nome']))
    $nome = $_POST['nome'];
  if (isset($_POST['dimension']))
    $dimension = $_POST['dimension'];

    
?>    
    <div class="panel panel-default">
        <div class="panel-heading text-right">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseForm">
              Filtro <span class="caret"></span>
            </a>
        </div>
        <div id="collapseForm" class="panel-collapse collapse">
              <div class="panel-body">
                <form class="form-horizontal" role="form" id="formFiltro" action="lista_clasificacion.php" method="post">
                    <input type="hidden" id="p" name="p" value="1">
                    <div class="form-group">
                        <label for="mail" class="col-sm-1 control-label input-sm">Correo</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control input-sm" id="mail" name="mail" maxlength="50" value="<?php echo $mail;?>">
                        </div>
                        <label for="nome" class="col-sm-1 control-label input-sm">Nome</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control input-sm" id="nome" name="nome" maxlength="50" value="<?php echo $nome;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dimension" class="col-sm-1 control-label input-sm">Dimensi&oacute;n</label>
                        <div class="col-sm-2">
                            <select class="form-control input-sm" name="dimension" id="dimension">
                              <option value="0" <?php if($dimension == 0) echo "selected";?>>Todas</option>
                              <option value="6" <?php if($dimension == 6) echo "selected";?>>6x6</option>
                              <option value="10" <?php if($dimension == 10) echo "selected";?>>10x10</option>
                            </select>
                        </div>
                        <label for="items" class="col-sm-2 control-label input-sm">Resultados por p&aacute;xina</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control input-sm" id="items" name="items" min="1" max="20" step="1" value="<?php echo $items;?>" required>
                        </div>                                      
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2">
                             <button type="submit" class="btn btn-info btn-xs" name="accion" value="filtrar"><span class='glyphicon glyphicon-search'></span> Filtrar</button> 
                             <a href="lista_clasificacion.php" class="btn btn-default btn-xs"><span class='glyphicon glyphicon-trash'></span> Limpar</a>
                        </div>
                    </div>
                </form>
              </div>
        </div>
    </div> 

<?php     

    $bd = new bd();
    
    $nt = $bd->numeroPartidas();
    $nf = $bd->listarPartidasCont($nome, $mail, $dimension);

    //calculos para paxinación
    $inicio = ($p - 1) * $items;
    $total_paxinas = ceil($nf / $items);
    
    $mostrando_inicio = intval($inicio +1);
    $mostrando_fin = intval($inicio + $items);
    
    if($mostrando_fin > $nf)
        $mostrando_fin = $mostrando_inicio + ($nf - $inicio -1);
    
    if($mostrando_inicio > $mostrando_fin)
        $mostrando_inicio = $mostrando_fin;
    
    $lista = $bd->listarPartidas($nome, $mail, $dimension, $inicio, $items);
        
    echo "<span>Listando ".$mostrando_inicio." - ".$mostrando_fin." de ".intval($nf)." partidas filtradas.</span>";
    echo "<br />";
    echo "<span>Partidas totais: ".$nt."</span>";
    
    echo "
        <table class='table table-striped table-hover'>
            <tr>
                <th>Tempo</th>
                <th>Dimensi&oacute;n</th>
                <th>Data</th>
                <th>Nome</th>
                <th>Correo</th>
            </tr>
    ";

    if($lista->num_rows > 0)
    {
        while($row = $lista->fetch_assoc())
        {
            echo "<tr>";
                echo "<td>".$row['tempo']."</td>";
                echo "<td>".$row['dimension']."x".$row['dimension']."</td>";
                echo "<td>".$row['data']."</td>";
                echo "<td>".$row['nome']."</td>";
                echo "<td>".$row['mail']."</td>";
            echo "</tr>";
        }
    }

    echo "</table>";
    
    //creando paxinación
    echo "        <ul class='pagination'>";
    if($p == 1)
    {
        echo "      <li class='disabled'><a href='#'>&laquo;</a></li>";
        echo "      <li class='disabled'><a href='#'>&lt;</a></li>";
    }
    else
    {
        echo "      <li><a href='#' onClick='cambiaPaxListado(1)'>&laquo;</a></li>";
        echo "      <li><a href='#' onClick='cambiaPaxListado(".intval($p -1).")'>&lt;</a></li>";
    }
        
    for($i=1; $i<=$total_paxinas; $i++)
    {
        if($i == $p)
            echo "<li class='active'><a href='#'>".$i."</a></li>";
        else
            echo "<li><a href='#' onClick='cambiaPaxListado(".$i.")'>".$i."</a></li>";
    }
    if($p >= $total_paxinas)
    {
        echo "          <li class='disabled'><a href='#'>&gt;</a></li>";
        echo "          <li class='disabled'><a href='#'>&raquo;</a></li>";        
    }
    else
    {
        echo "      <li><a href='#' onClick='cambiaPaxListado(".intval($p + 1).")'>&gt;</a></li>";
        echo "      <li><a href='#' onClick='cambiaPaxListado(".intval($total_paxinas).")'>&raquo;</a></li>";        
    }
    echo "        </ul>";
?>


    </div> <!--jumbotron -->
</div> <!-- /container -->

<?php include("footer.php"); ?>