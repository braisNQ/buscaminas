<?php
	function aviso($color, $msg, $url, $btn)
	{
		echo '
			<div class="container">
			<div class="alert alert-'.$color.'" role="alert">'.$msg.'</div>
			<ul class="pager">
				<li><a href="'.$url.'">'.$btn.'</a></li>
			</ul>
			</div>
		';		
	}

	function avisosimple($color, $msg)
	{
		echo '
			<div class="container">
				<div class="alert alert-'.$color.'" role="alert">'.$msg.'</div>
			</div>
		';		
	}

	function menu($opc)
	{
		?>
			<!-- Fixed navbar -->
			<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			    <div class="container">
			        <div class="navbar-header">
			            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			                <span class="sr-only">Toggle navigation</span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			            </button>
			            <a class="navbar-brand" href="#">Buscaminas</a>
			        </div>
			        <div class="navbar-collapse collapse">
			            <ul class="nav navbar-nav">
			                <li <?php if($opc == "index") echo 'class="active"';?>><a href="index.php">Inicio</a></li>
			                <li <?php if($opc == "xogar") echo 'class="active"';?>><a href="xogar.php">Xogar</a></li>
			                <li <?php if($opc == "usuarios") echo 'class="active"';?>><a href="lista_usuarios.php">Usuarios</a></li>
			                <li <?php if($opc == "clasificacion") echo 'class="active"';?>><a href="lista_clasificacion.php">Clasificaci&oacute;n</a></li>
			            </ul>
			        </div><!--/.nav-collapse -->
			    </div>
			</div>
		<?php
	}

	function validamail($mail)
	{
		$toret = false;
		$patronmail="#^(([a-z0-9\_\.\-]){2,27}\@([a-z]{3,8})\.([a-z]{2,3}))$#i";
	  	if (preg_match($patronmail, $email))
	  	{
	   		$toret = true;
	  	}
	  	
		return $toret;
	}
?>