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
	echo "<span>Jogo da velha 2awesome</span>";
	echo '<form class="formLogin" action="verifica.php" method="post">';
	echo '<input type="hidden" name="numPartida" value="'.$_REQUEST['partida'].'">';
	echo '<br><span id="textoInfo"> Nome: </span> <input class="txtinput" type="text" name="nome2" ><br>';
	echo '<br><span id="textoInfo"> Gravatar: </span> <input class="txtinput" type="text" name="email2"><br>';
	echo '<a href="http://www.gravatar.com">Não tem uma conta no gravatar?</a><br>';
	echo '<input class="btnOK" type="submit" value="OK">';
	echo '</form>';
	if (isset($_REQUEST['e'])) {
		echo '<span>O campo "nome" é obrigatório!';	
	}
}
function print_tabuleiro(){
	echo '<div class="containerTabuleiro">';
	
	echo '<div class="bloco1">';
	//if imprime
	echo'</div>';

	echo'<div class="bloco2">';
	//if imprime	
	echo '</div>';

	echo'<div class="bloco3">';
	//if imprime	
	echo '</div>';

	echo'<div class="bloco4">';
	//if imprime	
	echo '</div>';

	echo'<div class="bloco5">';
	//if imprime	
	echo '</div>';

	echo'<div class="bloco6">';
	//if imprime	
	echo '</div>';

	echo'<div class="bloco7">';
	//if imprime	
	echo '</div>';

	echo'<div class="bloco8">';
	//if imprime	
	echo '</div>';

	echo'<div class="bloco9">';
	//if imprime	
	echo '</div>';

	

}
function print_xis(){
	echo'<div class="xis1"> </div>
	  	 <div class="xis2"> </div>';
}
function print_circulo(){
	echo'<div class="circulo"> </div>';
}
function print_botao($indice){
	echo '<form class="form" action="index.php" method="post">
		  <input class="botao" type="submit" value="'.$indice.'"> 
		  </form>';
}

function print_rodape(){
	echo '<div class="rodape">rodape</div>';
	echo '</div></body>'; // div que fecha o container
	echo '</html>';
}



?>