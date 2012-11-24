<?php
/****************************************************
*View da página de login							*
*Rodrigo Bueno Tomiosso - rodrigobt20@gmail.com 	*
*Andrey B. Ramos - andreybramos@hotmail.com			*
*													*
****************************************************/

function printDoctype(){
 echo '<!DOCTYPE html>';
}

function importCss($caminho){
 echo '<link rel="stylesheet" type="text/css" href="'.$caminho.'" media="screen" />';
}

function printHeader($nome){
	echo '<html>';
	echo '<head>';
	echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
	echo '<title>'.$nome.'</title>';
	echo '</head>';
}

function printCf(){
	echo '<div class="cf"> </div>';
}
function printBody(){
	echo '<body>';
	echo '<div class="container">';
}
function printCabecalho(){
	echo "<span>Jogo da velha maneiro</span>";
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

function printRodape(){
	echo '<div class="rodape">rodape</div>';
	echo '</div></body>'; // div que fecha o container
	echo '</html>';
}
?>