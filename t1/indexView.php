<?php
function print_doctype(){
 echo '<!DOCTYPE html>';
}

function import_css($caminho){
 echo '<link rel="stylesheet" type="text/css" href="'.$caminho.'" media="screen" />';
}

function print_header($nome){
	echo '<html>';
	echo '<head>';
	echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
	echo '<title>'.$nome.'</title>';
	echo '</head>';
}

function print_cf(){
	echo '<div class="cf"> </div>';
}
function print_body(){
	echo '<body>';
	echo '<div class="container">';
}
function print_cabecalho(){
	echo "<span>Jogo da velha awesome</span>";
	echo '<form class="formLogin" action="verifica.php" method="post">';
	echo '<br><span id="textoInfo"> Nome: </span> <input class="txtinput" type="text" name="nome" ><br>';
	echo '<br><span id="textoInfo"> Gravatar: </span> <input class="txtinput" type="text" name="email"><br>';
	echo '<a href="http://www.gravatar.com">Não tem uma conta no gravatar?</a><br>';
	echo '<input class="btnOK" type="submit" value="OK">';
	echo '</form>';
	if (isset($_REQUEST['e'])) {
		echo '<span>O campo "nome" é obrigatório!';	
	}
}

function print_rodape(){
	echo '<div class="rodape">rodape</div>';
	echo '</div></body>'; // div que fecha o container
	echo '</html>';
}



?>