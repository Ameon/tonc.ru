<?if(!defined("$protect.$qwe")){header("HTTP/1.1 403 Forbidden");header("Location: http://" . $_SERVER['HTTP_HOST'], TRUE, 403);die();}
?><?	


	$url = urldecode($_SERVER["REQUEST_URI"]);
	$url = explode('?', $url);
	$params = $url[1];
	$tmp=explode('/', trim($url[0], '/'));+
	$module = array_shift($tmp); // Получили имя модуля
	 
	
	$module = $module[0];
	$action = array_shift($tmp); // Получили имя действия
	$pdd = array_shift($tmp);
	$module= mb_strtolower($module, mb_detect_encoding($module));
	$pr = substr($module, 0,2);
	$id = $module;
	$mseg = substr($module, 0,2);
	$fr_id = substr($module, 0,7);
	$look_id = substr($module, 0,4);
	$publ = substr($module, 0,6);
	$public_id = substr($module, 6,13);
	$gr_edit = substr($module, 0,10);
	$gr_users = substr($module, 0,11);

	$video = substr($module, 0, 5);


	$poisk_people = substr($module, 0, 12);
	$poisk_news = substr($module, 0, 10);
	$poisk_publ = substr($module, 0, 10);
	$poisk_audio = substr($module, 0, 11);
	$poisk_video = substr($module, 0, 11);

if($pr=='id'){
	//echo 'sdf';
	$id_pol = preg_replace('/id/', '', $module);
	$query = $db->query("select * from users WHERE id="."' $id_pol'");
	$num_results = count($query);
	
	
	foreach($query as $row){
		$sd=$row['id'];
	}
	
}

if($mseg=='dg'){
	$nm = preg_replace('/dg/', '', $module);
	$sql = $db->query("SELECT * FROM pfx_dialog WHERE public={$nm}");
	$row = count($sql);	
	foreach($sql as $row){
		$dalog = $row['public'];
	}
	$module='dg';
}
	



for ($i=0; $i < count($tmp); $i++) {
$params[$tmp[$i]] = $tmp[++$i];
}

/// Видео     


   
$flag_panel=false;
if(defined("USER_ID") && VALID==true){
	
	//$tmpl = "basic/default/index.php"; - Шаблон
	$tmpl = "/basic/page.php";
	if($module==""){echo "<script>document.location.replace('$name_site/id$user_idi');</script>";}
	elseif($module=="login"){echo "<script>document.location.replace('$name_site/id$user_idi');</script>";}
	elseif($module=='superuser' && $_SESSION['user_id']==1){$flag_panel=true;}
	elseif($module=='general' && $_SESSION['user_id']==1){$content='/adm_modules/general/index.php';}
	elseif($module=="reg"){echo "<script>document.location.replace('$name_site/id$user_idi');</script>";}
	elseif($pr=='id' && $id_pol==$sd && $id_pol!=''){$title='Профиль';$content='/modules/profile/prof_cnt.php';}
	elseif($module=='feed'){$title='Новости';$content = "/modules/feed/feed_cnt.php";}
	elseif($module=='friends'){$title='Мои друзья';$content = "/modules/friends/frnds_cnt.php";}
	elseif($look_id=='look'){$title='Обзор фотографий';$content = "/modules/photo/look_cnt.php";}
	elseif($module=='edit'){$title='Редактирование профиля';$content = "/modules/edit/pod_module/edit_osn.php";}
	elseif($module=='edit_lich'){$title='Редактирование профиля';$content = "/modules/edit/pod_module/edit_lich.php";}
	elseif($module=='edit_cont'){$title='Редактирование профиля';$content = "/modules/edit/pod_module/edit_cont.php";}
	elseif($module=='edit_edu'){$title='Редактирование профиля';$content = "/modules/edit/pod_module/edit_edu.php";}
	elseif($module=='edit_tower'){$title='Редактирование профиля';$content = "/modules/edit/pod_module/edit_tower.php";}
	elseif($module=='edit_job'){
		$title='Редактирование профиля';
		$content = "/modules/edit/pod_module/edit_job.php";
		
	}
	elseif($pr=='am' && $id_pol==$sd){
		$content = "/modules/photo/am_cnt.php";
		
	}
	elseif($video=='video'){$title='Видео';$content = "/modules/video/index.php";}
	
	elseif($module=='audio'){
		$title = 'Аудиозаписи';
		$content = "/modules/audio/audio_cnt.php";
		
	}
	elseif($module=='mail'){$title = 'Диалоги';$content = "/modules/mail/mail_cnt.php";}
	elseif($module=='dg' && $nm==$dalog){$title = 'Сообщения';$content = "/modules/mail/dg_cnt.php";}	
	elseif($module=='groups'){$title = 'Группы';$content = "/modules/groups/index.php";}
	elseif($module=='groups_admin'){$title = 'Управление группами'; $content = "/modules/groups/page/groups_admin.php";}
	elseif($gr_edit=='group_edit'){$content = "/modules/groups/page/group_edit.php";}
	elseif($gr_users=='group_users'){$content = "/modules/groups/page/group_users.php";}

	elseif($publ=='public'/*&& $id_pol==$sd*/){$title = '';$content = "/modules/groups/page/public.php";}
	elseif($module=='fave'){$title = 'Закладки';$content = "/modules/fave/index.php";}
	elseif($module=='docs'){$title = 'Документы';$content = "/modules/docs/index.php";}
	elseif($module=='help'){
		$title = 'Помощь';
		$content = "/modules/help/index.php";
		
	}
	elseif($module=='priv'){
		$title = 'Настройки';
		$content = "/modules/settings/priv_cnt.php";
		
	}
	elseif ($module=="logout"){require_once($base.'/modules/logout/index.php');}
	elseif($poisk_people=='poisk_people'){$title = 'Поиск людей';$content = "/modules/poisk/poisk_cnt.php";}
	elseif($poisk_audio=='poisk_audio'){ $title = 'Поиск аудио';$content = "/modules/poisk/poisk_cnt.php";}
	elseif($poisk_pub='poisk_publ'){$title = 'Поиск сообществ';$content = "/modules/poisk/poisk_cnt.php";}
	elseif($poisk_video=='poisk_video'){$title = 'Поиск видео';$content = "/modules/poisk/poisk_cnt.php";}
	elseif($poisk_news=='poisk_news'){$title = 'Поиск новостей';$content = "/modules/poisk/poisk_cnt.php";}
	
	elseif($module=='support'){
		$title = 'Поддержка';
		$content = "/modules/support/index.php";
		
	}
	else{
		ErrorPage404();
	}

	

}

else{
	
	if($module==""){$content = '/modules/reg/reg.php';}
	elseif ($module=="reg"){$content = '/modules/reg/reg.php';}
	elseif ($module=="superuser"){echo "<script>document.location.replace('/login');</script>";}
	elseif ($module=="login"){$content = '/modules/login/lgn_cnt.php';}
	elseif ($module=="restore"){$content = '/modules/restore/index.php';}
	elseif ($module=="logout"){require_once($base.'/modules/logout/index.php');}
	elseif($module=="about"){$content = '/modules/about/index.php';}
	elseif($module=="help"){$content = '/modules/help/index_no_auth.php';}

	 else {
		 echo "<script>document.location.replace('/login');</script>";
	 }
	

	
}
/*


elseif($module=='login'){
header("Location: http://exdu.ru/id$user_idi");
}


elseif($module=='online'){

	$tmpl = "basic/frnds.php";

}

elseif($module=='dg'){
$tmpl = "basic/dg.php";
}
elseif($module=='test'){
$tmpl = "basic/test.php";
}

elseif($fr_id=='friends'){
$tmpl = "basic/frnds.php";
}










elseif($module=='docs'){
$tmpl = "basic/docs.php";
}



elseif($module=='poisk_people'){
$tmpl = "basic/poisk.php";
}
elseif($module=='poisk_audio'){
$tmpl = "basic/poisk.php";
}
elseif($module=='poisk_publ'){
$tmpl = "basic/poisk.php";
}
elseif($module=='poisk_video'){
$tmpl = "basic/poisk.php";
}









else
  {
   //ErrorPage404();
  }


require_once($tmpl);
require_once('basic/osn/btm.php');

}
*/




?>