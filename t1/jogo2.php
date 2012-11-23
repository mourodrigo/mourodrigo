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

print_doctype();
importCss("css/jogo.css");
printHeader("Jogo da velha awesome");
printBody();
printCabecalho(leArquivo(),$_REQUEST['partida']);
printCf();
printTabuleiro(leArquivo());
printCf();
printRodape();

//mouro

/*<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<title>Jogo da Velha Maneiro</title>
	</head>
	<body>
		<div class="container">
		
			<div class="containerTelaInicial"> 
				<span>Instant Hash</span>
				<div class="cf"> </div>
			<div class="topo"> instanthash.com/3452345</div>			
					
			//imprimeCirculo
			<div class="bloco1">
				<div class="circulo"> </div>
			</div>

			//imprimeXis
			<div class="bloco2">
				<div class="xis1"> </div>
				<div class="xis2"> </div>
			</div>

			//imprimeBotao(numerodobotao)
			<div class="bloco3">
				<form class="form" action="index.php" method="post">
					<input class="botao" type="submit" value=" "> 
					</form>

			</div>
			<div class="bloco4">

			</div>
			<div class="bloco5">

			</div>
			<div class="bloco6">

			</div>
			<div class="bloco7">

			</div>
			<div class="bloco8">
			</div>
			<div class="bloco9">
/*
			</div>
			</div>
		</div>
	</body>
<html>
*/