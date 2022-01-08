<?
	$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
	
	$base = $_SERVER['DOCUMENT_ROOT'];
	$domen = $_SERVER['HTTP_HOST'];
	$name_site = $protocol.$domen;
	
	# ROOT_DIR  # home/users/a/ameon/domains/site.ru/
	define("SITE_URL",$name_site); # http://site.ru
	define("SHORT_URL",$_SERVER['HTTP_HOST']); # site.ru
	define("USER_ID", intval($_SESSION['user_id'])); # 1
	define("VALID", $_SESSION['valid_status']);
	define("NAME_SITE", "EXDU");
	
	if(isset($_SERVER["REQUEST_URI"])){
		define("REQ_URI", $_SERVER["REQUEST_URI"]);
	}
	
	if(isset($_SESSION['user_id'])){$user_idi = $_SESSION['user_id'];}

	define("REDIRECT_ID","<script>document.location.replace('".SITE_URL."/id$user_idi);</script>");
	define("REDIRECT_LOGIN","<script>document.location.replace('/login');</script>");
	
	$server_time = intval($_SERVER['REQUEST_TIME']);
	
	define("SERVER_TIME", $server_time);

?>
