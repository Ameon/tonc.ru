<?if(session_id() == '') {session_start();}?>
<?
	#$qwe=rand(1,10);
	$protect="PROTECT";
	define("D_PROTECT",$protect); //.$qwe
	define(D_PROTECT,true);
	define("ROOT_DIR",dirname(__FILE__).'/'); # /home/users/a/ameon/domains/site.ru/

?>
<?require_once(ROOT_DIR."class/config.php");?>
<?require_once(ROOT_DIR."class/db.php");?>
<?require_once(ROOT_DIR."class/functions.php");?>
<?require_once(ROOT_DIR."class/router_class.php");?>
<?
	/*
	if(AJAX){
		require_once(ROOT_DIR."basic/engine_ajax.php");	
	}else{
		require_once(ROOT_DIR."basic/engine.php");
	}

?>

<?
/*
if($flag_panel==true){require_once($base."/.system/index.php");}
else{
	
if(isset($_SESSION['user_id']) && $_SESSION['valid_status']==1){ require_once($base.$tmpl);}
  else {require_once('basic/page_no_auth.php');}
}
*/
?>

