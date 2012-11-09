<!--
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<title>Portal Republica</title>
	</head>
	<body>
		<div class="container">
	</body>
</html>
-->
<?php 
require "view.php";
print_doctype();
import_css();
print_header("aula 01");
print_body();
print_cabecalho();
print_calculadora();
if (isset($_REQUEST['v1'])&&isset($_REQUEST['v2'])) {
	echo '<span> Resultado:';
	switch($_REQUEST['operacao']){
		case '+':
			# code...
			$resultado = $_REQUEST['v1']+$_REQUEST['v2'];
			echo $resultado;
			break;
		case '-':
			# code...
			$resultado = $_REQUEST['v1']-$_REQUEST['v2'];
			echo $resultado;
			break;
		case '*':
			# code...
			$resultado = $_REQUEST['v1']*$_REQUEST['v2'];
			echo $resultado;
			break;
		case '/':
			# code...
			$resultado = $_REQUEST['v1']/$_REQUEST['v2'];
			echo $resultado;
			break;
	} 
echo '</span>';
}

print_rodape();

?>