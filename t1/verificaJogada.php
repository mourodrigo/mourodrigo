<?php
/****************************************************
*Controlador de jogada, manipula arquivo txt com 	*
*informações da jogada e administra partida 		*
*Rodrigo Bueno Tomiosso - rodrigobt20@gmail.com 	*
*													*
*													*
****************************************************/

function verificaGanhador($_partida, $_jogador){
//	echo "verifica".$_jogador;

	if ($_partida[0]==$_jogador && $_partida[1]==$_jogador && $_partida[2]==$_jogador) {
		return TRUE;	
	}
	if ($_partida[3]==$_jogador && $_partida[4]==$_jogador && $_partida[5]==$_jogador) {
	return TRUE;	
	}
	if ($_partida[6]==$_jogador && $_partida[7]==$_jogador && $_partida[8]==$_jogador) {
	return TRUE;	
	}
	if ($_partida[0]==$_jogador && $_partida[3]==$_jogador && $_partida[6]==$_jogador) {
	return TRUE;	
	}
	if ($_partida[1]==$_jogador && $_partida[4]==$_jogador && $_partida[7]==$_jogador) {
	return TRUE;	
	}
	if ($_partida[2]==$_jogador && $_partida[5]==$_jogador && $_partida[8]==$_jogador) {
	return TRUE;	
	}
	if ($_partida[0]==$_jogador && $_partida[4]==$_jogador && $_partida[8]==$_jogador) {
	return TRUE;	
	}
	if ($_partida[2]==$_jogador && $_partida[4]==$_jogador && $_partida[6]==$_jogador) {
	return TRUE;	
	}else{
		return FALSE;
	}
}	

	$file_url = "jogos/".$_REQUEST['numPartida'].".txt";
	$file = fopen($file_url,"r");
	$partida = explode(";",fread($file,filesize($file_url)));
	fclose($file);
		if ($partida[$_REQUEST['indice']]==0) {
			$partida[$_REQUEST['indice']]=$_REQUEST['tipo'];
		}else{
			echo "indice inválido";
		}
	$file = fopen($file_url,"w");
	if (verificaGanhador($partida, $_REQUEST['tipo'])) {
		//echo "ganhou!";
		if ($_REQUEST['tipo']==1) {
			$partida[9]=-1;
		}else{
			$partida[9]=-2;
		}
	}else{
		if ($partida[9]==1) {
			$partida[9]=2;
		}else{
			$partida[9]=1;
		}
	}

	fwrite($file,$partida[0].";".$partida[1].";".$partida[2].";".$partida[3].";".$partida[4].";".$partida[5].";".$partida[6].";".$partida[7].";".$partida[8].";".$partida[9].";".$partida[10].";".$partida[11].";".$partida[12].";".$partida[13].";");
	fclose($file);
	
	if ($_REQUEST['tipo']==1) {
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=jogo.php?partida='.$_REQUEST['numPartida'].'">';
	}else{
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=jogo2.php?partida='.$_REQUEST['numPartida'].'">';
	}
?>