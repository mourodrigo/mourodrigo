<?php 
require "jogoView.php";
print_doctype();
import_css("css/jogo.css");
print_header("Jogo da velha awesome");
print_body();
print_cabecalho();
print_cf();
print_tabuleiro();
print_cf();
print_rodape();

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