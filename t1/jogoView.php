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
function printarquivo($arrPartida){
	echo $arrPartida[0].$arrPartida[1].$arrPartida[2].$arrPartida[3].$arrPartida[4].$arrPartida[5].$arrPartida[6].$arrPartida[7].$arrPartida[8].$arrPartida[9];
}
function printCabecalho($arrPartida, $numeropartida){
	echo '<div class="containerCabecalho">';
	echo '<div class="esquerda">';
	echo '<span class="nomeJogador1">'.$arrPartida[10].'</span>';
	$url = "";//http://localhost/uffs/mourodrigo/t1/";
	$emailJ1 = $arrPartida[11];
	$size = 180;
	$default = "";
	$grav_urlJ1 = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $emailJ1 ) ) ) . "?d=retro" . urlencode( $default ) . "&s=" . $size;
	
	echo '<img src="'.$grav_urlJ1.'" alt="avatar do usuario 1" />';
	echo "</div>";
	echo '<div class="direita">';
	echo '<span class="nomeJogador2">';

	if ($arrPartida[9]==0) {
		printLinkPartida($numeropartida, $url);		//echo "aguardando jogadores...";
	}else{
		$url = "";
		$emailJ2 = $arrPartida[13];
		$size = 180;
		$grav_urlJ2 = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $emailJ2 ) ) ) . "?d=retro" . urlencode( $default ) . "&s=" . $size;
		echo '<img src="'.$grav_urlJ2.'" alt="avatar do usuario 1" />';
		echo '<span class="nomeJogador1">'.$arrPartida[12].'</span>';
	}
	echo '</span>';
	echo "</div>";
	if ($arrPartida[9]==-2) {
		printCf();
		echo 'VOCE PERDEU!!!';
		printCf();
	}
	if ($arrPartida[9]==-1) {
		printCf();
		echo 'VOCE GANHOU!!!';
		printCf();
	}
	echo "</div>";
}

function printLinkPartida($_numeropartida, $_url){
		echo 'compartilhe esta partida com seus amigos!';
		echo '<a href="'.$_url.'join.php?partida='.$_numeropartida.'"><br>'.$_url.'join.php?partida='.$_numeropartida.'</a>';
}
function printTabuleiro($_arrPartida){
	echo '<div class="containerTabuleiro">';
	
	echo '<div class="bloco0">';
		printBloco($_arrPartida,0,1);
	echo'</div>';

	echo'<div class="bloco1">';
		printBloco($_arrPartida,1,1);
	echo '</div>';

	echo'<div class="bloco2">';
		printBloco($_arrPartida,2,1);
	echo '</div>';

	echo'<div class="bloco3">';
		printBloco($_arrPartida,3,1);	
	echo '</div>';

	echo'<div class="bloco4">';
		printBloco($_arrPartida,4,1);	
	echo '</div>';

	echo'<div class="bloco5">';
		printBloco($_arrPartida,5,1);
	echo '</div>';

	echo'<div class="bloco6">';
		printBloco($_arrPartida,6,1);	
	echo '</div>';

	echo'<div class="bloco7">';
		printBloco($_arrPartida,7,1);
	echo '</div>';

	echo'<div class="bloco8">';
		printBloco($_arrPartida,8,1);
	echo '</div>';
}



function printXis(){
	echo'<div class="xis1"> </div>
	  	 <div class="xis2"> </div>';
}
function printCirculo(){
	echo'<div class="circulo"> </div>';
}
function printBotao($indice, $tipo){
	echo '<form class="form" action="verificaJogada.php" method="post">
		  	<input type="hidden" name="numPartida" value="'.$_REQUEST['partida'].'">
		  	<input type="hidden" name="tipo" value="'.$tipo.'">
		  	<input type="hidden" name="indice" value="'.$indice.'">
		  	<input class="botao" type="submit" value="'.$tipo.$indice.'"> 
		  </form>';
}

function printBloco($_arrPartida,$_indice,$_caracter){
	if ($_arrPartida[$_indice]==0) {
		if ($_arrPartida[9]==1) {
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