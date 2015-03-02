

function seleccionaCelda(c)
{
	document.getElementById(c).className = "celda alert-info";
	document.getElementById(c).innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;';
	return false;
}

function marcaCelda(c)
{
	document.getElementById(c).className = "celda alert-warning";
	document.getElementById(c).innerHTML = '<span class="glyphicon glyphicon-flag"></span><span class="minitext">&nbsp;</span>';
	return false;
}