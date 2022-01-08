<?if(session_id() == '') {session_start();}?>
<?require_once($_SERVER['DOCUMENT_ROOT'].'/class/config.php');?>
<?require_once($base.'/class/lang.php');?>
<? if(!isset($_SESSION['user_id'])){
	echo "<script>document.location.replace('https://exdu.ru/login');</script>";
}
?>
<script>


if($("#public").length>0) {	
	startPost();
	}		
	else{
		endPost();
	}
	
autosize(document.querySelectorAll('textarea'));
	
</script>
<?

$link = $_POST['link'];
if(isset($_SESSION['user_id'])){$user_id = $_SESSION['user_id'];}

if (isset($_POST['link'])) {
			
			//echo $module;

			$tmp=explode('/', trim($link, '/'));

			$module = array_shift($tmp); 
			$act = array_shift($tmp);

			$module= mb_strtolower($module, mb_detect_encoding($module));
			
			$do_log = mb_substr($module, 0, 2, "utf-8");
			$lop_mop = mb_substr($module, 0, 2, "utf-8");
			$am_lop = mb_substr($module, 0, 4, "utf-8");
			$pub_lop = mb_substr($module, 0, 6, "utf-8");
			$fr_lop = mb_substr($module, 0, 8, "utf-8");
			$gr_edit = mb_substr($module, 0, 10, "utf-8");
			$gr_users = mb_substr($module, 0, 11, "utf-8");
			
			
			if($fr_lop=="friends" || $fr_lop=="online" || $fr_lop=="requests"){require_once($base.'/modules/friends/frnds_cnt.php');}
			
			
			if($am_lop=="look"){require_once($base.'/modules/photo/look_cnt.php');}
			
			
			
			//echo "<script>alert('$fr_lop');</script>";
			if($do_log=='dg'){$tot= mb_substr($module, 2, 4, "utf-8");
				if(is_numeric($tot)){
					//echo $do_log;
					require_once($base.'/modules/mail/dg_cnt.php');
				}
				else {
					//echo "Это не число";
				}
			}
			if($do_log=='am'){require_once($base.'/modules/photo/am_cnt.php');}
			else {/*echo "Это не число";*/}
			if($lop_mop=="id"){require_once($base.'/modules/profile/prof_cnt.php');}
						
			if($module=="index"){
				
				require_once('content/index_content.php');
			}
			
			elseif($module=='general' && $_SESSION['user_id']==1){require_once($base.'/adm_modules/general/index.php');}
		

			
			elseif($module=="fave"){require_once($base.'/modules/fave/index.php');}
			elseif($module=="docs"){require_once($base.'/modules/docs/index.php');}
			
			elseif($module=="poisk_people" || $module=="poisk_news" || $module=='poisk_publ' || $module=='poisk_audio' || $module=='poisk_video'){
				require_once($base.'/modules/poisk/poisk_cnt.php');}
			elseif($module=="feed"){require_once($base.'/modules/feed/feed_cnt.php');
		
			}
			
			elseif($module=="groups"){require_once($base.'/modules/groups/index.php');}
			elseif($pub_lop =='public'){require_once($base.'/modules/groups/page/public.php');}
			
			elseif($gr_edit=="group_edit"){require_once($base.'/modules/groups/page/group_edit.php');}
			
			elseif($gr_users=="group_users"){require_once($base.'/modules/groups/page/group_users.php');}
			
			elseif($module=="groups_admin"){require_once($base.'/modules/groups/page/groups_admin.php');}
			
					
			elseif($module=="edit"){require_once($base.'/modules/edit/pod_module/edit_osn.php');}
			elseif($module=="edit_lich"){require_once($base.'/modules/edit/pod_module/edit_lich.php');}
			elseif($module=="edit_cont"){require_once($base.'/modules/edit/pod_module/edit_cont.php');}
			elseif($module=="edit_edu"){require_once($base.'/modules/edit/pod_module/edit_edu.php');}
			elseif($module=="edit_tower"){require_once($base.'/modules/edit/pod_module/edit_tower.php');}
			elseif($module=="edit_job"){require_once($base.'/modules/edit/pod_module/edit_job.php');}			
			elseif($module=="video"){require_once($base.'/modules/video/index.php');}
			elseif($module=="audio"){require_once($base.'/modules/audio/audio_cnt.php');echo "<script>sort();</script>";}
			elseif($module=="help"){require_once($base.'/modules/help/index.php');}
			elseif($module=="search"){

			require_once('content/search_content.php');

			}
			
			elseif($module=="dg"){require_once($base.'/modules/mail/dg_cnt.php');}
			
			elseif($module=="priv"){require_once($base.'/modules/settings/priv_cnt.php');}
			elseif($module=="mail"){require_once($base.'/modules/mail/index.php');}
			
			
			if($module=="mail" || $do_log=='dg'){

			echo "<script>$('#text_footer').css('display','none');</script>";
			
			}
			else{
				echo "<script>$('#text_footer').css('display','block');</script>";
			}

}

else{
echo "<script>document.location.replace('https://exdu.ru/id{$user_id}');</script>";
}
?>