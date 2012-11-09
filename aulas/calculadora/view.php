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

?>