<?

date_default_timezone_set('Europe/Moscow');

function strftime_rus($format, $date = FALSE) {
    // Работает точно так же, как и strftime(),
    // только в строке формата может принимать
    // дополнительный аргумент %B2, который будет заменен 
    // на русское название месяца в родительном падеже.
    
    // В остальном правила для $format такие же, как и для strftime().
    // (в связи с этим рекомендуется настроить выполнение скрипта
    // с помощью setlocale: http://php.net/setlocale) 
    
    // Второй аргумент можно передавать как в виде временной метки
    // так и в виде строки типа 2010-05-16 23:48:20
    // функция сама определит, в каком виде передана дата,
    // и проведет преобразование.
    // Если второй аргумент не указан,
    // функция будет работать с текущим временем.
    
    if (!$date)
        $timestamp = time();
    
    elseif (!is_numeric($date))
        $timestamp = strtotime($date);
    
    else 
        $timestamp = $date;
    
    if (strpos($format, '%B2') === FALSE) 
        return strftime($format, $timestamp);
    
    $month_number = date('n', $timestamp);
    
    switch ($month_number) { 
        case 1: $rus = 'янв'; break;
        case 2: $rus = 'фев'; break;
        case 3: $rus = 'мар'; break;
        case 4: $rus = 'апр'; break;
        case 5: $rus = 'мая'; break;
        case 6: $rus = 'июн'; break;
        case 7: $rus = 'июл'; break;
        case 8: $rus = 'авг'; break;
        case 9: $rus = 'сен'; break;
        case 10: $rus = 'окт'; break;
        case 11: $rus = 'ноя'; break;
        case 12: $rus = 'дек'; break;
    }
    
    $rusformat = str_replace('%B2', $rus, $format);
    
    return strftime($rusformat, $timestamp);
}

function get_russian_date($datetime, $flag)
{
    setlocale(LC_ALL, 'ru_RU.UTF-8');
 
    $m = strftime("%b", $datetime);
		if($flag=='var1'){ 
			return mb_strtolower(strftime_rus('%d %B2',$datetime));
			#return mb_strtolower(strftime("%d %b", $datetime));
			#return mb_strtolower(strftime("%d %b", 27254000));
		}
		elseif($flag=='var2'){
			return mb_strtolower(strftime("%d %b %Y", $datetime));
		}   
}

function seconds2Human($post_data){
	//echo date("d.m.y H:i:s"); 

	$post_data = strtotime($post_data);
	//time_diff 
	$time = date('Y:m:d , H:i:s',$post_data);
	$time_2 = get_russian_date($post_data, 'var1');
	$time_3 = get_russian_date($post_data, 'var2');
	$now = time();
	$seconds = $now - $post_data;
	$start_day = strtotime('now 00:00:00');	
	$yesterday = $now - strtotime('yesterday 00:00:00');	
	$sec_null = $seconds.'<br/>';
	$output = "";
	$back = ' назад';
	$time_post = date('H:i',$post_data);
	
	
	$today = $now - $start_day;
	
	$ch_1 = array(0,5,6,7,8,9,11,12,14);
	$ch_2 = array(2,3,4);
	$ch_3 = array(1);
	
	if($days = floor($seconds / 86400)){
		
		if(in_array(substr($days,-1), $ch_1)){
			$word = " дней ";
		}elseif(in_array(substr($days,-1), $ch_2)){
			$word = " дня ";
		}else{
			$word = " день ";
		}
		$output .= $days . $word;
		$seconds = $seconds % 86400;
	}
	if($hours = floor($seconds / 3600)){
		if(in_array(substr($hours,-1), $ch_1)){
			$word = " часов ";
		}elseif(in_array(substr($hours,-1), $ch_2)){
			$word = " часа ";
		}else{
			$word = " час ";
		}
		$output .= $hours . $word;
		$seconds = $seconds % 3600;
	}
	if($minutes = floor($seconds / 60)){
		if(in_array(substr($minutes,-1), $ch_1)){
			$word_m = " минут ";
		}elseif(in_array(substr($minutes,-1), $ch_2)){
			$word_m = " минуты ";	
		}elseif(in_array(substr($minutes,-1), $ch_3)){
			$word_m = " минуту ";
		
		}else{
			$word_m = " минута ";
		}
		
		$output .= $minutes . $word_m;
		$seconds = $seconds % 60;
	}
	if(in_array(substr($seconds,-1),$ch_1)){
		$word = " секунд ";
	}elseif (in_array(substr($seconds,-1), $ch_2)) {
		$word = " секунды ";
	}elseif (in_array(substr($seconds,-1), $ch_3)) {
		$word = " секунду ";
	}else{
		$word = " секунда ";
	}
	
	//echo '<br/>'.$sec_null.'<br/>';
	//echo $today.'<br/>';
	//echo $start_day.'<br/>';
	//echo $now.'<br/>';
		
	
	if($hours>=1){
		if($minutes<10){$minutes= '0'.$minutes;}
	}
	//echo $sec_null;
	//return $sec_null;
	if($sec_null == 0){
		return 'только что';
	}
	elseif($sec_null < 60 && $sec_null > 0 ){
		return $seconds.$word.$back;
	}
	elseif($sec_null> 59 && $sec_null < 3600){
	    return $minutes.$word_m.$back ;		
	}
	elseif($sec_null> 3599 && $sec_null < 7200){
	    return 'час'.$back;		
	}elseif($sec_null> 7199 && $sec_null < 10800){
	    return 'два часа'.$back;		
	}elseif($sec_null> 10799 && $sec_null < 14400){
	    return 'три часа'.$back;		
	}elseif($sec_null > 14399 && $today >= $sec_null){
	    return 'сегодня в '.$time_post;		
	}elseif($sec_null > $today && $sec_null <= $yesterday ){
	    return 'вчера в '.$time_post;	
	}
	elseif($sec_null > $yesterday && $sec_null < 15778800 ){
	    return $time_2.' в '.$time_post;				
	}else{
		
		if($sec_null >= 60){
		return $time_3;
	
		}
	}			
}

	

?>