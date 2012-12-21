<?php
/****************************************************
*Search do Catasão, Página que faz a busca da música*
* bem como trata erros e tem opção de logout.       *
*													*       
*Andrey B. Ramos - andreybramos@hotmail.com	        *
*Rodrigo Bueno Tomiosso - rodrigobt20@gmail.com 	*
****************************************************/
	session_start();
		if ((isset($_SESSION["logged"])==false)OR($_SESSION["logged"]!=1)){
			header("Location:index.php?error=0");
		}
		else{	
		require_once "lib.php";
		top();
			if(isset($_SESSION["search"])==false)
				$_SESSION["search"] = "MUSIC,by ARTIST";
		echo '<body background="indexfundo.jpg">';
		echo '<form id="logout" method="post" action="index.php">';
		echo '<input type="hidden" name="logout" value="1">';
		echo '<input type="submit" value="Logout">';
		echo '</form>';
		echo '<div id="welcome">';
		echo "Bem vindo ".$_SESSION["login"]."!";
		echo '</div>';
		echo '<div id="search">';
		echo ' <form method="get" name="searcher" action="result.php">';
		echo '<input type="text" name="search" value="'.$_SESSION["search"].'"></br>';
		echo '<input type="submit" value="Buscar">';
		echo '</form>';
		echo '</div>';		
		echo '<div id="like">'; 
		echo '<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fandrey-uffs.rhcloud.com%2Ft2%2Findex.php&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowTransparency="true"></iframe>';
		echo '<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://andrey-uffs.rhcloud.com/t2/index.php" data-text="Eu usei o Catasão. Tente você também..." data-via="andreybramos" data-related="andreybramos" data-hashtags="catasão">Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		echo '</div>';
			if(isset($_REQUEST["error"])==true){
				echo '<div id="errorsearch">';
					if($_REQUEST["error"]==1)
						echo "<b>Please check the name of the song and the artist.</b>";
					else if($_REQUEST["error"]==2)
						echo "<b>Server error. Pleasy try again later.</b>"; 
				echo '</div>';
			}
		echo '<div id="date">';
		echo '<b>';
		date_time();
		echo '</b>';
		echo '</div>';
		bottom();
}?>
