<?php
/****************************************************
* Lib do Catasão, Página que contêm várias funções  *
* utilizadas na busca e tratamento dos dados.       *
*													*
*Andrey B. Ramos - andreybramos@hotmail.com	        *
*Rodrigo Bueno Tomiosso - rodrigobt20@gmail.com 	*
****************************************************/
function top(){
	echo '<!DOCTYPE html>';
	echo '<html>';
	echo '<head>';
	echo '<link rel="stylesheet" type="text/css" href="style.css" media="screen">';
	echo '<title>Catasão</title>'; 
	echo '<meta http-equiv="content-type" content="text/html;charset=utf-8" />';
	echo '</head>';
	echo '<body>';
		
}

function bottom(){
	echo '</body>';
	echo '</html>';
}

function date_time(){
  $hour = date("H:i:s");
  $day = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
  $month = array('January','February','March','April','May','June','July','August','September','October','November','December');
  echo $day[date('w')].", ".date('d')." of ".$month[date('m')-1]." , ".date('Y')." | ".$hour;
  }

function connection(){
	$hostname = "127.10.44.1";
	$database = "andrey";
	$username = "admin";
	$password = "98R4rk2Txka9";
	$con = mysql_connect($hostname,$username,$password)
	or die(mysql_error()."Error connecting to the database");	
	mysql_select_db($database,$con);	
}

function showLyric(){
	$output = $_SESSION["xml"];
	$output = str_replace("\n","<br>",$output);
	$output = explode('<Lyric>',$output);
		if(isset($output[1])==true){
			echo $output[1];
		}
		else if ($output[0]==null){
			header("Location:search.php?error=2");
		}
		else {
			header("Location:search.php?error=1");
		}
	echo '<br>';	
}

function showVideo($artist,$music){
	$ch = curl_init();
	$artist = str_replace(" ","/",$artist);
     if (substr_compare($artist,'/',0,1)==0){	
	   $artist = substr($artist,1);
	   }
	$music = str_replace(" ","/",$music);	
	curl_setopt($ch, CURLOPT_URL, "http://gdata.youtube.com/feeds/api/videos/-/".$music."/".$artist);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);	
	curl_close($ch);
	$output = explode('http://www.youtube.com/watch?',$output);
	$output = explode('/>',$output[1]);
	$output = explode('=',$output[0]);
	$output = explode('&',$output[1]);
	$link = "http://www.youtube.com/embed/".$output[0];
	echo '<iframe width="480" height="360" src="'.$link.'" frameborder="0" allowfullscreen></iframe>';	
}

function getArtistMusic($artist,$music){
	$ch = curl_init();
	$artist = str_replace(" ","%20",$artist);
	$music = str_replace(" ","%20",$music);
	
	curl_setopt($ch, CURLOPT_URL, "http://api.chartlyrics.com/apiv1.asmx/SearchLyricDirect?artist=".$artist."&song=".$music);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$output = curl_exec($ch);
	curl_close($ch);
	$_SESSION["xml"]=$output;
	$music = explode('<LyricSong>',$_SESSION["xml"]);
	$music = explode('</LyricSong>',$music[1]);
	$artist = explode('<LyricArtist>',$_SESSION["xml"]);
	$artist = explode('</LyricArtist>',$artist[1]);
	$_SESSION["artist"] = $artist[0];
	$_SESSION["music"] = $music[0];
}

function getArtistInfo($artistName){
	$xmlArtist = simplexml_load_file("http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=".$artistName."&api_key=4df4cca8ed605e2a55ba5f89f26fbdd8");
	$xmlTags = simplexml_load_file("http://ws.audioscrobbler.com/2.0/?method=artist.gettoptags&artist=".$artistName."&api_key=4df4cca8ed605e2a55ba5f89f26fbdd8");
	$xmlTracks = simplexml_load_file("http://ws.audioscrobbler.com/2.0/?method=artist.gettoptracks&artist=".$artistName."&api_key=4df4cca8ed605e2a55ba5f89f26fbdd8");
	$xmlAlbums = simplexml_load_file("http://ws.audioscrobbler.com/2.0/?method=artist.gettopalbums&artist=".$artistName."&api_key=4df4cca8ed605e2a55ba5f89f26fbdd8");

	
	$image = $xmlArtist->artist[0]->image[2];
	$url = getShortUrl($xmlArtist->artist->url);
    $bio = $xmlArtist->artist->bio->summary;

	echo '<div id="artistimage">';	
	echo '<img src="' . $image . '"><br>';
	echo "</div>";
	echo '<div id="artistbio">';	
	echo "<b>Bio Summary: </b>" . $bio . "<br>";
	echo '</div>';
	echo '<div id="artisturl">';	
	echo '<b>Artist URL: </b>' . $url . '<br>';
	echo "</div>";
	echo '<div id="tops">';
	echo "<b>Top 5 Songs:</b><br>";
		for($i=0;$i<5;$i++){
			$topTracks = $xmlTracks->toptracks->track[$i]->name;
			echo  $i+1 .' - '.$topTracks."<br>";
		}
	echo '</div>';
	echo '<div id="topa">';
	echo "<b>Top 5 Albums:</b><br>";	
		for($i=0;$i<5;$i++){
			$topAlbums = $xmlAlbums->topalbums->album[$i]->name;
			echo  $i+1 .' - '.$topAlbums."<br>";
			echo "<u><b>Last.fm Url:</b></u> ".getShortUrl($xmlAlbums->topalbums->album[$i]->url)."<br>";
		}
	echo '</div>';
	echo '<div id="topt">';
	echo "<b>Top 5 Tags:</b><br>";	
		for($i=0;$i<5;$i++){
			$topTags = $xmlTags->toptags->tag[$i]->name;
			echo  $i+1 .' - '.$topTags."<br>";
		}	
	echo '</div>';
 }


  function getShortUrl($url){
            try{
                $api= fopen("http://pra.la/api?url=$url",'r');
                return fgets($api);
            }catch(Exception $e){
                return $e;
            }
        }     
  function getLongUrl($url){
            try{
                $head = get_headers($url);
                $url = explode(": ",$head[5],2);
                return $url[1];
            }catch(Exception $e){
                return $e;
			}
		}
?>
