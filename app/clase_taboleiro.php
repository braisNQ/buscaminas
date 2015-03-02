<?php

class taboleiro
{
	private $filas;
	private $columnas;
	private $minas;

	/*
     * función __construct
     * crea un obxecto taboleiro a partir dunha dimensión
     */
    function __construct($d)
    {
    	$this->filas = $d;
    	$this->columnas = $d;
    	$this->minas = ($d * $d) /4;
    }
    
    /*
     * destructor da clase taboleiro
     */
    function __destruct()
    {}

    /*
     * función configurador
     * mostra o botón de configraución do taboleiro
     */
    function configurador()
    {
    	echo '
    		<div align="center">
				<div class="btn-group" role="group">
	  				<a class="btn btn-primary" href="configurar.php?d=6">6x6</a>
	  				<a class="btn btn-default" href="configurar.php?d=10">10x10</a>
				</div>
			</div>
			';
    }

	/*
	 * función formulario()
	 * mostra o formulario de tempo e minas
	 */
	function formulario()
	{
		echo '		
	      	<form class="form-horizontal" role="form" id="formPartida" action="score.php" method="post">                        
	        	<div class="form-group">
	          		<div class="col-sm-6">
	            		<div class="input-group">
	              			<span class="input-group-addon glyphicon glyphicon-time"></span>
	              			<input type="text" class="form-control" id="inputTempo" name="inputTempo" value=0>
	            		</div>
	          		</div>
	          		<div class="col-sm-6">
	            		<div class="input-group">
	              			<span class="input-group-addon glyphicon glyphicon-asterisk"></span>
	              			<input type="text" class="form-control" id="inputMinas" name="inputMinas" value="'.$this->minas.'">
	          	 	 	</div>
	          		</div>
	        	</div>
	       </form>
		';
	}

    /*
     * función progreso()
     * mostra o progreso da partida
     */
    function progreso()
    {
    	echo '
       		<div class="progress">
  				<div class="progress-bar" role="progressbar" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:0%">
    				0%
  				</div>
			</div>
			';
	}

	/*
	 * función debuxa()
	 * mostra o taboleiro creado con divs
	 */
	function debuxa()
	{
		for($i=0;$i<$this->filas;$i++)
		{
			echo "<div class='fila'>";

			for($j=0;$j<$this->columnas;$j++)
			{

				$nome= "celda-".$i."-".$j;
				echo "<div class='celda' name='".$nome."' id='".$nome."' ";
				$oncontext="\"marcaCelda('".$nome."');"."return false;\"";
				echo " oncontextmenu=".$oncontext;
				$onclick="\"seleccionaCelda('".$nome."');"."return false;\"";
				echo " onclick=".$onclick;
				echo ">&nbsp;&nbsp;&nbsp;&nbsp;</div>";
			}

			echo "</div>";
		}
	}

	/*
	 * función reiniciar()
	 * mostra un botón que permite reiniciar a partida
	 */
	function reiniciar()
	{
		echo '
			<div align="center">
	  			<a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-repeat"></span> Reiniciar</a>
	  		</div>
		';
	}

}



?>