<?
 function ErrorPage404()
    {

        header($_SERVER['SERVER_PROTOCOL'].'HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        echo "<script>document.location.replace('/err/error404.php');</script>";
        exit();
    }	
	
	
function check_ajax(){
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
		&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		// Если к нам идёт Ajax запрос, то ловим его
		return true;
	}else {
		//Если это не ajax запрос
		return false;
	}	
}

function num_albums($num){

	$ch_1 = array(1);
	$ch_2 = array(2,3,4);
	$ch_3 = array(0,5,6,7,8,9,10,11,12,14);
	
	

	if(in_array($num, $ch_1)){
		$word = " альбом";
	}elseif(in_array($num, $ch_2)){
		$word = " альбома";
	}else{
		$word = " альбомов";
	}

	return $num.$word;

}

function num_kol($num,$word){

	$ch_1 = array(1);
	$ch_2 = array(2,3,4);
	$ch_3 = array(0,5,6,7,8,9,10,11,12,13,14);
	

	if(in_array($num, $ch_1)){
		$word = " {$word}";
	}elseif(in_array($num, $ch_2)){
		$word = " {$word}а";
	}else{
		$word = " {$word}ов";
	}

	return $num.$word;

}

	function num_kol_z($num,$word){

		$ch_1 = array(1);
		$ch_2 = array(2,3,4);
		$ch_3 = array(0,5,6,7,8,9,10,11,12,14);
		

		if(in_array($num, $ch_1)){
			$word = " {$word}";
		}elseif(in_array($num, $ch_2)){
			$word = " {$word}а";
		}else{
			$word = " друзей";
		}

		return $num.$word;

	}

	function num_posts($num,$word){

		$ch_1 = array(1);
		$ch_2 = array(2,3,4);
		$ch_3 = array(0,5,6,7,8,9,10,11,12,14);
		$word='';

		if(in_array(substr($num, -1), $ch_1) && substr($num,-2)!=11){
			$word = " запись";
		}elseif(in_array(substr($num,-1), $ch_2)){
			$word = " записи";
		}elseif($num==0){
			$num='';
			$word="Нет записей";
		}
		else{
			$word = " записей";
		}
		$all = "<span id='wall_rec_num'>{$num}</span> ".$word;
		return $all;
	
	}


function is_not_empty($var) {
	if ($var !== '' && $var !== false && $var !== array() && $var !== null) return true;
	return false;
}


define("AJAX",check_ajax());
	
?>