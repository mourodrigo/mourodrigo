<meta http-equiv="refresh" content="1">
<?php 
/****************************************************
*Controlador jogo da velha (jogador2)				*
*Rodrigo Bueno Tomiosso - rodrigobt20@gmail.com 	*
*													*
*													*
****************************************************/

function leArquivo(){
	$file_url = "jogos/".$_REQUEST['partida'].".txt";
	$file = fopen($file_url,"r");
	$_partida = explode(";",fread($file,filesize($file_url)));
	fclose($file);
	return $_partida;
}

require "jogo2View.php";

printDoctype();
importCss("css/jogo.css");
printHeader("Jogo da velha awesome");
printBody();
printCabecalho(leArquivo(),$_REQUEST['partida']);
printCf();
printTabuleiro(leArquivo());
printCf();
printRodape();