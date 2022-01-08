<?if(session_id() == '') {session_start();}?>
<?php  
$LastModified_unix = strtotime(date("D, d M Y H:i:s",  
filectime($_SERVER['SCRIPT_FILENAME']))); 
$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix); 
$IfModifiedSince = false; 

if (isset($_ENV['HTTP_IF_MODIFIED_SINCE'])) 
   $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5)); 

if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) 
   $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5)); 

if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) { 
   header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified'); 
   exit; 
} 

header('Last-Modified: '. $LastModified); 

?>
<?//require_once($_SERVER['DOCUMENT_ROOT'].'/modules/login/lgn.php');?>
<?

if(!empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['pass']) &&  isset($_POST['pass'])){
	
	// if the user has just tried to log in 
	$username = $_POST['email']; 
	$password = $_POST['pass'];
	
	
	$sql  = "SELECT users.*, info.sex, info.first_name, info.last_name "; 
	$sql .= "FROM users ";
	$sql .= "LEFT JOIN info ON info.id = users.id ";
	$sql .= "WHERE login = '$username' AND password = md5('$password')";
	
	
	$query = $this->db->query($sql);
	#echo "<pre>";
	#print_r($query);
	#echo "</ pre>";
	#die();
	
	$num = count($query);
	
	if($num>0){
		// if they are in the database register the user id 
		$_SESSION['valid_user'] = $username;
		$_SESSION['valid_status'] = $query[0]['status'];
		$_SESSION['user_photo'] = $query[0]['user_photo'];
		$_SESSION['sex'] = $query[0]['sex'];
		$_SESSION['first_name'] = $query[0]['first_name'];
		$_SESSION['last_name'] = $query[0]['last_name'];
		$_SESSION['full_name'] = $query[0]['first_name'].' '.$query[0]['last_name'];
		
		
		foreach($query as $row) { 		
			$fd = $row['id'];			
		}
		$_SESSION['user_id'] = $fd;
		
		if($query[0]['status']==0){
			$_SESSION['page']='reg3';
			echo "<script>document.location.replace('/reg');</script>";
		}

	}
	 
	 
	 
	 
} 

if (isset($_SESSION['user_id']) && $_SESSION['user_id']!= "" && $_SESSION['valid_status']==1) {
	 if(isset($_POST['remember'])){ // Set cookie if user checked remember me
	 	setcookie("cookname", $username, time()+60*60*24*100, "/");
    	setcookie("cookpass", md5($password), time()+60*60*24*100, "/");
    }
	
	echo "<script>document.location.href='/id".$_SESSION['user_id']."';</script>\n";
	echo "<script>alert();</script>";
} 
else {
	//echo "<script>document.location.href='/login';</script>\n";
}

?>


<!DOCTYPE html>

<html>
	<head>
	
		<link rel="icon" href="<?=$name_site;?>/img/favicon1.png" type="image/x-icon">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


		<meta name="keywords" content="Социальная сеть,диалоги,общение,знакомства,аудиозаписи,поиск друзей,сеть,видеозаписи,бесплатные фильмы,сериалы,топ песен,топ фильмов,бесплатно">
		<meta name="description" content="EXDU – сайт новых возможностей, постоянное стремление к лучшему Только тебе решать что тебе нужно!">
		<title>Поиск</title>

		
		<link href="<?=$name_site;?>/css/style.css" rel="stylesheet" type="text/css">
		
		<script type="text/javascript" src="/jst/jquery-3.2.1.min.js"></script>


</head>

<body>

	<div id="page_wrap">
		
		<div id="page">
		
			<div id="page_body">
				<?require_once(ROOT_DIR.$content);?>
			</div>
			
			
		</div>
		<div>
			<script type="text/javascript" src="/jst/main.js"></script>
		</div>
	</div>
	
</body>
</html>