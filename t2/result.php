<?php
/****************************************************
*Result do Catasão, Página que mostra o resultado da*
*busca: letra, video e informações do artista.      *
*													*
*Andrey B. Ramos - andreybramos@hotmail.com	        *
*Rodrigo Bueno Tomiosso - rodrigobt20@gmail.com 	*
****************************************************/
session_start();
if ((isset($_SESSION["logged"])==false)OR($_SESSION["logged"]!=1)){
    header("Location:index.php?error=0");
}else{
	require_once "lib.php";
	top();
	echo '<div id="conteiner">';
	$_SESSION["search"]=$_REQUEST["search"];
	$valor=explode(",",$_REQUEST["search"]);
	$valor[1]=substr($valor[1],3);	
	getArtistMusic($valor[1],$valor[0]);
	$artist = $_SESSION["artist"];
	$music = $_SESSION["music"];
	//TRATAMENTO DAS VARIÁVEIS
	if (strlen($artist)>12){
		if (substr_compare($artist,'&',11,1)==0){	
			$artist = substr($artist,0,11);
		}
		else if(substr_compare($artist,'&',12,1)==0){	
			$artist = substr($artist,0,12);
		}
	}
	$music = str_replace('"','',$music);   
	echo '<body background="http://'.str_replace(" ","",$artist).'.jpg.to">';
	echo '<div id="title">';
	echo '<p id="tit">'.$music." - ".$artist.'</p>';
	echo '</div>';
	echo '<p id="lyricbox">';
	showLyric();
	echo '</p>';
	getArtistInfo($artist);
	echo '</div>';
	echo '<p id="videobox">';
    showVideo($artist,$music);
    echo '</p>';
    	
	bottom();
}
?>
