<?php
function print_doctype(){
 echo '<!DOCTYPE html>';
}

function importCss($css){
echo '<link rel="stylesheet" type="text/css" href="'.$css.'" media="screen" />';
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
function printCabecalho($arrPartida, $numeropartida){
	echo '<div class="containerCabecalho">';
	echo '<div class="esquerda">';
	echo '<span class="nomeJogador1">'.$arrPartida[10].'</span>';
	$url = "http://localhost/uffs/mourodrigo/t1/";
	$email = $arrPartida[11];
	$size = 180;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=retro" . urlencode( $default ) . "&s=" . $size;
	
	echo '<img src="'.$grav_url.'" alt="avatar do usuario 1" />';
	echo "</div>";
	echo '<div class="direita">';
	echo '<span class="nomeJogador2">';

	if ($arrPartida[9]==0) {
		echo 'compartilhe esta partida com seus amigos!';
		echo '<a href="'.$url.'join.php?partida='.$numeropartida.'"><br>'.$url.'join.php?partida='.$numeropartida.'</a>';
		//echo "aguardando jogadores...";
	}
	echo '</span>';
	echo "</div>";

	echo "</div>";
}
function printTabuleiro(){
	echo '<div class="containerTabuleiro">';
	
	echo '<div class="bloco1">';
	if (printBotao) {
		# code...
	}
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
function printXis(){
	echo'<div class="xis1"> </div>
	  	 <div class="xis2"> </div>';
}
function printCirculo(){
	echo'<div class="circulo"> </div>';
}
function printBotao($indice){
	echo '<form class="form" action="index.php" method="post">
		  	<input type="hidden" name="numPartida" value="'.$_REQUEST['partida'].'">
		  	<input class="botao" type="submit" value="'.$indice.'"> 
		  </form>';
}

function printRodape(){
	echo '<div class="rodape">rodape</div>';
	echo '</div></body>'; // div que fecha o container
	echo '</html>';
}



?>