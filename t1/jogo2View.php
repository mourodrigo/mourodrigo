<?php
/****************************************************
*Visão jogo da velha (jogador2)						*
*Rodrigo Bueno Tomiosso - rodrigobt20@gmail.com 	*
*													*
*													*
****************************************************/

function printDoctype(){
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
function printArquivo($arrPartida){//debug
	echo $arrPartida[0].$arrPartida[1].$arrPartida[2].$arrPartida[3].$arrPartida[4].$arrPartida[5].$arrPartida[6].$arrPartida[7].$arrPartida[8].$arrPartida[9];
}
function printCabecalho($arrPartida, $numeropartida){
	echo '<div class="containerCabecalho">';
	echo '<div class="esquerda">';
	
	$emailJ1 = $arrPartida[11];
	$size = 180;
	$default = "retro"; //url personalizada para avatar padrão
	$grav_urlJ1 = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $emailJ1 ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
	
	echo '<img src="'.$grav_urlJ1.'" alt="avatar do usuario 1" />';
	echo '<br><span class="nomeJogador1">'.$arrPartida[10].'</span>';
	echo "</div>";
	echo '<div class="direita">';
	echo '<span class="nomeJogador2">';

	if ($arrPartida[9]==0) {
		printLinkPartida($numeropartida);//echo "aguardando jogadores...";
	}else{
		$url = "";
		$emailJ2 = $arrPartida[13];
		$grav_urlJ2 = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $emailJ2 ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
	
		echo '<img src="'.$grav_urlJ2.'" alt="avatar do usuario 1" />';
		echo '<br><span class="nomeJogador1">'.$arrPartida[12].'</span>';
	
	}
	echo '</span>';
	echo "</div>";
	echo '<div class="subCabecalho">'; 
		if ($arrPartida[9]==1) {
			printCf();
			echo '<p>Aguardando jogador adversário....</p>';
			printCf();
		}
		if ($arrPartida[9]==2) {
			printCf();
			echo '<p>Jogue!!!</p>';
			printCf();
		}
		if ($arrPartida[9]==-1) {
			printCf();
			echo '<span>VOCE PERDEU!!!</span>';
			printCf();
		}
		if ($arrPartida[9]==-2) {
			printCf();
			echo '<span>VOCE GANHOU!!!</span>';
			printCf();
		}
	echo "</div></div>";
}

function printLinkPartida($_numeropartida){
		echo '<span>compartilhe esta partida com seus amigos<span>!';
		echo '<a href="join.php?partida='.$_numeropartida.'"><br>join.php?partida='.$_numeropartida.'</a>';
}

function printTabuleiro($_arrPartida){
	echo '<div class="containerTabuleiro">';
	
	echo '<div class="bloco0">';
		printBloco($_arrPartida,0,2);
	echo'</div>';

	echo'<div class="bloco1">';
		printBloco($_arrPartida,1,2);
	echo '</div>';

	echo'<div class="bloco2">';
		printBloco($_arrPartida,2,2);
	echo '</div>';

	echo'<div class="bloco3">';
		printBloco($_arrPartida,3,2);	
	echo '</div>';

	echo'<div class="bloco4">';
		printBloco($_arrPartida,4,2);	
	echo '</div>';

	echo'<div class="bloco5">';
		printBloco($_arrPartida,5,2);
	echo '</div>';

	echo'<div class="bloco6">';
		printBloco($_arrPartida,6,2);	
	echo '</div>';

	echo'<div class="bloco7">';
		printBloco($_arrPartida,7,2);
	echo '</div>';

	echo'<div class="bloco8">';
		printBloco($_arrPartida,8,2);
	echo '</div>';
}
/*
function printXis(){
	echo'<div class="xis1"> </div>
	  	 <div class="xis2"> </div>';
}

function printCirculo(){
	echo'<div class="circulo"> </div>';
}*/

function printXis(){
	echo'<!--[if IE]><img src="imagens/XIS.png" alt="xis" height="150" width="150"><![endif]-->';
	echo'<![if !IE]><div class="xis1"></div>
	  	<div class="xis2"> </div>
		<![endif]>';
}
function printCirculo(){
	echo'<!--[if IE]><img src="imagens/CIRCULO.png" alt="xis" height="150" width="150"><![endif]-->';
	echo'<![if !IE]><div class="circulo"> </div><![endif]>';
}

function printBotao($indice, $tipo){
	echo '<form class="form" action="verificaJogada.php" method="post">
		  	<input type="hidden" name="numPartida" value="'.$_REQUEST['partida'].'">
		  	<input type="hidden" name="tipo" value="'.$tipo.'">
		  	<input type="hidden" name="indice" value="'.$indice.'">
		  	<input class="botao" type="submit" value=""> 
		  </form>';
}

function printBloco($_arrPartida,$_indice,$_caracter){
	if ($_arrPartida[$_indice]==0) {
		if ($_arrPartida[9]==2) {
			printBotao($_indice,$_caracter);
		}
	}
	if ($_arrPartida[$_indice]==1) {
		printXis();
	}
	if ($_arrPartida[$_indice]==2) {
		printCirculo();
	}
}

function printRodape(){
	echo '<div class="rodape">rodape</div>';
	echo '</div></body>'; // div que fecha o container
	echo '</html>';
}
?>