<?php
 	$jogos = glob("jogos/*.txt");	
 	$pathNovoJogo = getcwd().'/jogos/'.(1+count($jogos)).'.txt';

if (isset($_REQUEST['nome'])&&isset($_REQUEST['email'])) {
	if (count($_REQUEST['nome'])==0||$_REQUEST['nome']==""){
		echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=index.php?e=1">';
	}else{
		//echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=lobby1.php?nome='.$_REQUEST['nome'];
		if ($_REQUEST['email']!=""){
		 	$file = fopen($pathNovoJogo,"w+");
			fwrite($file,"b0;b0;b0;b0;b0;b0;b0;b0;b0;0;".$_REQUEST['nome'].";".$_REQUEST['email'].";");
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=jogo.php?partida='.(1+count($jogos)).'">';
		//echo '&email='.$_REQUEST['email'];	
		}else{
			$file = fopen($pathNovoJogo,"w+");
			fwrite($file,"b0;b0;b0;b0;b0;b0;b0;b0;b0;0;".$_REQUEST['nome'].";"."nil;");
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=jogo.php?partida='.(1+count($jogos)).'">';
		}
	}
}else{
	echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=index.php?e=1">';
}
?>
