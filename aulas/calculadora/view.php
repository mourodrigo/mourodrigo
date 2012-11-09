<?php
function print_doctype(){
 echo '<!DOCTYPE html>';
}

function import_css(){
 echo '<link rel="stylesheet" type="text/css" href="style.css" media="screen" />';
}

function print_header($nome){
	echo '<html>';
	echo '<head>';
	echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
	echo '<title>'.$nome.'</title>';
	echo '</head>';
}
function print_body(){
	echo '<div class="container">';
}
function print_cabecalho(){
	echo '<div class="cabecalho">cabecalho</div>';
	echo '</body>';
	echo '</html>';
}

function print_rodape(){
	echo '<div class="rodape">rodape</div>';
	echo '</div></body>'; // div que fecha o container
	echo '</html>';
}

function print_calculadora(){
	echo '<div class="calculadora">
			<form class="form" action="index.php" method="post">
				Valor 1<input type="Valor 1" name="v1">
				<select name="operacao">
  					<option value="+">+</option>
  					<option value="-">-</option>
  					<option value="/">/</option>
  					<option value="*">*</option>
				</select>
				Valor 2<input type="Valor 2" name="v2">
				<br><input type="submit" value="Calcular">
				
			</form>
		  </div>';
}

?>


