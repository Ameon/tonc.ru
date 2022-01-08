<?

function num_members($num){

	$ch_1 = array(1);
	$ch_2 = array(2,3,4);
	$ch_3 = array(0,5,6,7,8,9,11,12,13,14);
	
	

	if(in_array($num, $ch_1)){
		$word = " участник";
	}elseif(in_array($num, $ch_2)){
		$word = " участника";
	}else{
		$word = " участников";
	}

	return $num.$word;

}

function num_subscribers($num){

	$ch_1 = array(1);
	$ch_2 = array(2,3,4);
	$ch_3 = array(0,5,6,7,8,9,11,12,13,14);
	
	

	if(in_array($num, $ch_1)){
		$word = " подписчик";
	}elseif(in_array($num, $ch_2)){
		$word = " подписчика";
	}else{
		$word = " подписчиков";
	}

	return $num.$word;

}


?>