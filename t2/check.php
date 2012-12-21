<?php
/****************************************************
*Check do Catasão, Página que verifica se o cadastro*
* pode ser efetuado, bem como efetua o login caso os*
* dados estejam corretos. Grava no banco de dados.  *
*													*
*Andrey B. Ramos - andreybramos@hotmail.com	        *
*Rodrigo Bueno Tomiosso - rodrigobt20@gmail.com 	*
****************************************************/
	require_once "lib.php";
	connection();
	session_start();
	$login = addslashes($_REQUEST["login"]);
	$pass = md5(addslashes($_REQUEST["pass"]));
	if($_REQUEST["type"]=='um'){
		$sql="SELECT * FROM usuarios WHERE LOGIN='$login'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		if(strcasecmp($login,$row['LOGIN'])==0){
			$_SESSION["logged"]=0;
			$_SESSION["login"]=$row['LOGIN'];
			header ("Location:index.php?error=1");
		}else{
			$sql="INSERT INTO usuarios(LOGIN,PASS)VALUES('$login','$pass')";
			$result=mysql_query($sql);
			if($result){
				$_SESSION["logged"]=1;
				header("Location:search.php");
	  		}
	 	}
	}else if($_REQUEST["type"]=='dois'){
	    $sql="SELECT * FROM usuarios WHERE LOGIN='$login' AND PASS='$pass'";
	    $result=mysql_query($sql);
	    $row=mysql_fetch_array($result);
	    echo $row['LOGIN']." ".$row['PASS'];
	    if((strcasecmp($login,$row['LOGIN'])==0)AND(strcasecmp($pass,$row['PASS'])==0)){
			$_SESSION["logged"]=1;
			$_SESSION["login"]=$row['LOGIN'];
		    header("Location:search.php");	    
		}else{
			$_SESSION["logged"]=0;
			header("Location:index.php?error=2");		
		}
	}
?>
