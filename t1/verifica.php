<?php
/****************************************************
*Controlador de login, cria e manipula arquivo txt 	*
*com informações dos jogadores e inicia a partida	*
*Rodrigo Bueno Tomiosso - rodrigobt20@gmail.com 	*
*													*
*													*
****************************************************/

function iniciaRound($_numPartida){
	$file_url = "jogos/".$_numPartida.".txt";
	$file = fopen($file_url,"r");
	$partida = explode(";",fread($file,filesize($file_url)));
	fclose($file);
	$file = fopen($file_url,"w");
	$partida[9]=1;
	fwrite($file,$partida[0].";".$partida[1].";".$partida[2].";".$partida[3].";".$partida[4].";".$partida[5].";".$partida[6].";".$partida[7].";".$partida[8].";".$partida[9].";".$partida[10].";".$partida[11].";".$partida[12].";".$partida[13].";");
	fclose($file);
}

if (isset($_REQUEST['numPartida'])) {
	$pathNovoJogo = getcwd().'/jogos/'.$_REQUEST['numPartida'].'.txt';
	if (isset($_REQUEST['nome2'])&&isset($_REQUEST['email2'])) {
		if (count($_REQUEST['nome2'])==0||$_REQUEST['nome2']==""){
			echo '<META HTTP-EQUIV="refresh" CONTENT="3;URL=join.php?partida='.$_REQUEST['numPartida'].'&e=1">';
		}else{
			if ($_REQUEST['email2']!=""){
		 		$file = fopen($pathNovoJogo,"a");
				fwrite($file,$_REQUEST['nome2'].";".$_REQUEST['email2'].";");
				fclose($file);
				iniciaRound($_REQUEST['numPartida']);
				echo '<META HTTP-EQUIV="refresh" CONTENT="3;URL=jogo2.php?partida='.$_REQUEST['numPartida'].'">';
			}else{
				$file = fopen($pathNovoJogo,"w+");
				fwrite($file,$_REQUEST['nome2'].";nil;");	
				fclose($file);
				iniciaRound($_REQUEST['numPartida']);
				echo '<META HTTP-EQUIV="refresh" CONTENT="3;URL=jogo2.php?partida='.$_REQUEST['numPartida'].'">';
				
			}
		}
	}else{
		echo '<META HTTP-EQUIV="refresh" CONTENT="3;URL=join2.php?partida='.$_REQUEST['numPartida'].'&e=1">';
	}
}else{
	$jogos = glob("jogos/*.txt");	
 	$pathNovoJogo = getcwd().'/jogos/'.(1+count($jogos)).'.txt';
	if (isset($_REQUEST['nome'])&&isset($_REQUEST['email'])) {
		if (count($_REQUEST['nome'])==0||$_REQUEST['nome']==""){
			echo '<META HTTP-EQUIV="refresh" CONTENT="3;URL=index.php?e=1">';
		}else{
			if ($_REQUEST['email']!=""){
		 		$file = fopen($pathNovoJogo,"w+");
				fwrite($file,"0;0;0;0;0;0;0;0;0;0;".$_REQUEST['nome'].";".$_REQUEST['email'].";");
				echo '<META HTTP-EQUIV="refresh" CONTENT="3;URL=jogo.php?partida='.(1+count($jogos)).'">';
				fclose($file);
			}else{
				$file = fopen($pathNovoJogo,"w+");
				fwrite($file,"0;0;0;0;0;0;0;0;0;0;".$_REQUEST['nome'].";"."nil;");
				echo '<META HTTP-EQUIV="refresh" CONTENT="3;URL=jogo.php?partida='.(1+count($jogos)).'">';
				fclose($file);
			}
		}
	}else{
		echo '<META HTTP-EQUIV="refresh" CONTENT="3;URL=index.php?e=1">';
	}
}
?>