<?php
/****************************************************
*Index do Catasão, Página de login e cadastro  		*
*													*
*Andrey B. Ramos - andreybramos@hotmail.com	        *
*Rodrigo Bueno Tomiosso - rodrigobt20@gmail.com 	*
****************************************************/   
	session_start();
	if (isset($_REQUEST["logout"])){
		if ($_REQUEST["logout"]=='1'){
			$_SESSION["logged"]=0;
		}
	}

	if ((isset($_SESSION["logged"]))AND($_SESSION["logged"]==1)){
  		header("Location:search.php");
 	}else{
	
		require_once "lib.php";
		top();
		echo '<body background="indexfundo.jpg">'; //trocar para css
		echo '<div id="register">';
		echo '<p id="cad"><b><u>If you are not registered.Register below:</u></b></p>';
		echo '<form name="register" method="post" action="check.php">';
		echo 'Login:<input type="text" name="login"></br>';
		echo 'Pass:<input type="password" name="pass"></br>';
		echo '<input type="hidden" name="type" value="um">';
		echo '<input type="submit" value="Register">';
		echo '</form>';
		echo '</div>';

		echo '<div id="connect">';
		echo '<p id="cad"><b><u>If you are already registered. Please login:</u></b></p>';
		echo '<form name="conectar" method="post" action="check.php">';
		echo 'Login:<input type="text" name="login"></br>';
		echo 'Pass:<input type="password" name="pass"></br>';
		echo '<input type="hidden" name="type" value="dois">';
		echo '  <input type="submit" value="Login">';
		echo '</form>';
		echo '</div>';		
		echo '<div id="error">';
			if (isset($_REQUEST["error"])==true){
			if ($_REQUEST["error"]==0){
				echo '<p id="errortext">'."You are no logged. Please login.".'</p>'; 
			}else if ($_REQUEST["error"]==1){
				echo '<p id="errortext">'."Please choose another login.".'</p>'; 
			}else if ($_REQUEST["error"]==2){
				echo '<p id="errortext">'."Login and/or Pass wrong. Please check it.".'</p>'; 
			}
		}		
		echo '</div>';
		echo '<div id="datei">';
		echo '<b>';
		date_time();
		echo '</b>';
		echo '</div>';
		bottom();
	}
?>
