
<?

class Router{
	
	protected $user_id;
	protected $req_uri;
	protected $modules = array();
	protected $mod;
	private $lvl_url = 1;
	public $db;
	private $url;
	private $params;
	private $tmp;
	
	public function __construct($req_uri=false,$user_id=false){
		$this->db = new DB;
		$this->req_uri = $req_uri;
		if(AJAX){
			if($_POST['action']){
				$this->loader_ajax_zapr();
			}else{
				$this->loader_ajax();
			}
		}else{
			$this->loader();
		}
		
		
		
		#print_r($this->modules);
		#echo $req_uri.'';
	}
	
	private function check_url(){
		
		if(AJAX){$this->req_uri = $_POST['link'];}
		$this->url = urldecode($this->req_uri);
		$this->url= explode('?', $this->url);
		$this->params = $this->url[1];
		if(isset($_POST['act_ax'])){
			$this->url[0] = $_POST['act_ax'];
		}
		$this->tmp = explode('/', trim($this->url[0], '/'));
		if(count($this->tmp) > $this->lvl_url){
			$this->er404();
		}
		
	}
	
	private function loader_ajax_zapr(){
		$path = "/modules/";
		$ix = "/index.php";
		require_once(ROOT_DIR.'class/lang.php');
		if(USER_ID){
			
			switch($_POST['action']) {
			
				# Страница профиля
				case "pr_add_com":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_add_com.php";break;
				case "pr_add_post":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_add_post.php";break;
				case "pr_add_post_down":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_add_post_down.php";break;
				case "pr_del_post":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_del_post.php";break;
				case "pr_up_ava":$zapr_cont = dirname(__DIR__).$path."profile/window/pr_up_ava.php";break;
				case "pr_miniature":$zapr_cont = dirname(__DIR__).$path."profile/window/pr_miniature.php";break;
				case "miniature_save":$zapr_cont = dirname(__DIR__).$path."profile/zapr/miniature_save.php";break;
				case "pr_get_cur_st":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_cur_st.php";break;
				case "pr_save_cur_st":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_cur_st.php";break;
				case "pr_my_subscribes":$zapr_cont = dirname(__DIR__).$path."profile/window/pr_my_subscribes.php";break;
				case "pr_add_post_rel":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_add_post_rel.php";break;
				case "pr_audio_stat":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_audio_stat.php";break;
				case "add_photo_pr":$zapr_cont = dirname(__DIR__).$path."profile/window/add_photo_pr.php";break;
				case "add_audio_pr":$zapr_cont = dirname(__DIR__).$path."profile/window/add_audio_pr.php";break;
				
				# Аудио
				case "audio_stat":$zapr_cont = dirname(__DIR__).$path."audio/zapr/audio_stat.php";break;
				case "audio_time":$zapr_cont = dirname(__DIR__).$path."audio/zapr/audio_time.php";break;
				case "audio_next":$zapr_cont = dirname(__DIR__).$path."audio/zapr/audio_next.php";break;
				case "audio_prev":$zapr_cont = dirname(__DIR__).$path."audio/zapr/audio_prev.php";break;
				case "audio_zagr":$zapr_cont = dirname(__DIR__).$path."audio/window/audio_zagr.php";break;
				case "audio_sort_str":$zapr_cont = dirname(__DIR__).$path."audio/zapr/audio_sort_str.php";break;
				case "audio_edit":$zapr_cont = dirname(__DIR__).$path."audio/window/audio_edit.php";break;
				case "audio_add_tr_baza":$zapr_cont = dirname(__DIR__).$path."audio/zapr/audio_add_tr_baza.php";break;
				case "audio_prog_bar":$zapr_cont = dirname(__DIR__).$path."audio/zapr/audio_prog_bar.php";break;
				case "auido_save_txt":$zapr_cont = dirname(__DIR__).$path."audio/zapr/auido_save_txt.php";break;
				case "audio_del_track":$zapr_cont = dirname(__DIR__).$path."audio/zapr/audio_del_track.php";break;

				# Редактирование профиля
				case "edit_osn":$zapr_cont = dirname(__DIR__).$path."edit/zapr/edit_osn.php";break;
				case "edit_lich":$zapr_cont = dirname(__DIR__).$path."edit/zapr/edit_lich.php";break;
				case "edit_izm_region":$zapr_cont = dirname(__DIR__).$path."edit/zapr/edit_izm_region.php";break;
				case "edit_izm_city":$zapr_cont = dirname(__DIR__).$path."edit/zapr/edit_izm_city.php";break;
				
				# Группы
				case "gr_add_com":$zapr_cont = dirname(__DIR__).$path."groups/zapr/pub_add_com.php";break;
				case "publibc_add_post":$zapr_cont = dirname(__DIR__).$path."groups/zapr/publibc_add_post.php";break;
				case "pub_add_sub":$zapr_cont = dirname(__DIR__).$path."groups/zapr/pub_add_sub.php";break;
				case "pub_add_unsub":$zapr_cont = dirname(__DIR__).$path."groups/zapr/pub_add_unsub.php";break;
				case "publibc_add_post_down":$zapr_cont = dirname(__DIR__).$path."groups/zapr/publibc_add_post_down.php";break;
				
				# Регистрация
				case "reg_page1":$zapr_cont = dirname(__DIR__).$path."reg/zapr/reg_page1.php";break;
				case "reg2_cnt":$zapr_cont = dirname(__DIR__).$path."reg/page/reg2_cnt.php";break;
				case "reg2_cnt":$zapr_cont = dirname(__DIR__).$path."reg/page/reg2_cnt.php";break;
				
				# Новости
				case "news_add_com":$zapr_cont = dirname(__DIR__).$path."feed/zapr/news_add_com.php";break;
				case "news_like_post":$zapr_cont = dirname(__DIR__).$path."feed/zapr/news_like_post.php";break;
				
				# Друзья
				case "fr_search":$zapr_cont = dirname(__DIR__).$path."friends/zapr/fr_search.php";break;
				case "fr_send_msg_w":$zapr_cont = dirname(__DIR__).$path."friends/window/fr_send_msg.php";break;
				case "fr_del":$zapr_cont = dirname(__DIR__).$path."friends/zapr/fr_del.php";break;
				case "fr_ver":$zapr_cont = dirname(__DIR__).$path."friends/zapr/fr_ver.php";break;
				
				case "pub_up_ava":$zapr_cont = dirname(__DIR__).$path."groups/window/pub_up_ava.php";break;
				case "pr_like_post":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_like_post.php";break;	
				
				# Поиск
				case "poisk_people":$zapr_cont = dirname(__DIR__).$path."poisk/zapr/poisk_people.php";break;
				case "poisk_video":$zapr_cont = dirname(__DIR__).$path."poisk/zapr/poisk_video.php";break;
				
				case "pr_send_msg_w":$zapr_cont = dirname(__DIR__).$path."profile/window/pr_send_msg.php";break;
				case "dg_send_msg":$zapr_cont = dirname(__DIR__).$path."mail/zapr/dg_send_msg.php";break;
				case "select_fr":$zapr_cont = dirname(__DIR__).$path."mail/page/select_fr.php";break;
				case "dg_reload_msg":$zapr_cont = dirname(__DIR__).$path."mail/zapr/dg_reload_msg.php";break;
				case "msg":$zapr_cont = dirname(__DIR__).$path."mail/zapr/msg.php";break;
				case "dg_up_msg":$zapr_cont = dirname(__DIR__).$path."mail/zapr/dg_up_msg.php";break;
				case "pr_send_msg_z":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_send_msg.php";break;
				case "publibc_add_post_rel":$zapr_cont = dirname(__DIR__).$path."groups/zapr/publibc_add_post_rel.php";break;
				case "pr_add_dr":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_add_dr.php";break;
				case "pr_ubr_iz_dr":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_ubr_iz_dr.php";break;
				case "pr_podtv_dr":$zapr_cont = dirname(__DIR__).$path."profile/zapr/pr_podtv_dr.php";break;
				case "gr_new_gr":$zapr_cont = dirname(__DIR__).$path."groups/zapr/gr_new_gr.php";break;
				
				case "edit_cont":$zapr_cont = dirname(__DIR__).$path."edit/zapr/edit_cont.php";break;
				case "language":$zapr_cont = dirname(__DIR__).$path."language/index.php";break;
				case "gr_search":$zapr_cont = dirname(__DIR__).$path."groups/zapr/gr_search.php";break;
				
				case "gr_saveinfo":$zapr_cont = dirname(__DIR__).$path."groups/zapr/gr_saveinfo.php";break;
				case "gr_like_post":$zapr_cont = dirname(__DIR__).$path."groups/zapr/gr_like_post.php";break;
				
				
				# Закладки
				case "fave_edit_lnk":$zapr_cont = dirname(__DIR__).$path."fave/window/fave_edit_lnk.php";break;
				case "fave_save_lnk":$zapr_cont = dirname(__DIR__).$path."fave/zapr/fave_save_lnk.php";break;
				case "fave_options":$zapr_cont = dirname(__DIR__).$path."fave/zapr/fave_options.php";break;
				case "fave_add_lnk_w":$zapr_cont = dirname(__DIR__).$path."fave/window/fave_add_lnk.php";break;
				case "fave_add_lnk_z":$zapr_cont = dirname(__DIR__).$path."fave/zapr/fave_add_lnk.php";break;
				case "fave_get_title":$zapr_cont = dirname(__DIR__).$path."fave/zapr/fave_get_title.php";break;
				case "fave_add_album_w":$zapr_cont = dirname(__DIR__).$path."fave/window/fave_add_album.php";break;
				case "fave_add_album_z":$zapr_cont = dirname(__DIR__).$path."fave/zapr/fave_add_album_z.php";break;

				# Видео
				case "video_add_lnk":$zapr_cont = dirname(__DIR__).$path."video/window/video_add_lnk.php";break;
				case "video_add_youtube":$zapr_cont = dirname(__DIR__).$path."video/zapr/video_add_youtube.php";break;
				case "video_play":$zapr_cont = dirname(__DIR__).$path."video/window/video_play.php";break;
				case "video_search":$zapr_cont = dirname(__DIR__).$path."video/zapr/video_search.php";break;
				case "video_add_album_w":$zapr_cont = dirname(__DIR__).$path."video/window/video_add_album.php";break;
				
				# Настройки
				case "priv_new_pass":$zapr_cont = dirname(__DIR__).$path."settings/zapr/new_pass.php";break;
				
				default:
					$zapr_cont = false;
			}
		}else{
			switch($_POST['action']) {
				case "reg_page1":$zapr_cont = dirname(__DIR__).$path."reg/zapr/reg_page1.php";break;
				case "reg2_cnt":$zapr_cont = dirname(__DIR__).$path."reg/page/reg2_cnt.php";break;
				case "reg_page2":$zapr_cont = dirname(__DIR__).$path."reg/zapr/reg_page2.php";break;
				case "reg3_cnt":$zapr_cont = dirname(__DIR__).$path."reg/page/reg3_cnt.php";break;
				
				default:$zapr_cont = false;
			}
		}

		require_once($zapr_cont);
	}
			
			
	private function loader(){
		$_SERVER['REMOTE_ADDR'];
		$this->check_url();
		require_once(ROOT_DIR.'class/lang.php');
		if(USER_ID){
			$sql = "SELECT id, email, user_photo FROM `users` WHERE id='".USER_ID."'";
			$res = $this->db->query($sql);
			if(!$res[0]['id']){
				header('Location: /logout');
			}

			
			if(empty($this->tmp[0])){
				echo "<script>document.location.replace('".SITE_URL."/id".USER_ID."');</script>";die();
			}
			else if($this->tmp[0]=="login" && empty($this->tmp[1])){
				echo $this->modules['login'];
				exit();
			}else{

				$content = $this->handler_url($this->tmp[0]);
				if($content){
					require_once(dirname(__DIR__)."/basic/page.php");
					require_once(dirname(__DIR__)."/class/dop_func.php");
					
				}else{
					require_once(dirname(__DIR__)."/err/error404.php");
				}
			}

		}elseif(isset($_COOKIE['user_id']) > 0 AND $_COOKIE['password'] AND $_COOKIE['hid']){
			$cookie_user_id = intval($_COOKIE['user_id']);
			$sql = "SELECT id, email, user_photo FROM `users` WHERE id='$cookie_user_id'";
			$res = $this->db->query($sql);
		}else{
			if(empty($this->tmp[0])){
				$content = '/modules/main/index.php';
			}
			else{
				$content = $this->handler_url($this->tmp[0]);
			}
			
			if($content){
				
				require_once(dirname(__DIR__)."/basic/page_no_auth.php");	
			}else{
				echo "<script>document.location.replace('".SITE_URL."/');</script>";die();
			}
			
		}

	}
	
	private function loader_ajax(){
	
		
		
		$this->check_url();
		require_once(ROOT_DIR.'/class/lang.php');
		
		if(USER_ID){
			if(empty($this->tmp[0])){
				$content = $this->handler_url("id".USER_ID);
			}else{
				$content = $this->handler_url($this->tmp[0]);
			}
		}else{
			$content = $this->handler_url("id".USER_ID);
		}
		#########################################
			require_once(ROOT_DIR."/class/dop_func.php");
			
			if($this->mod == "mail" || $this->mod=='dg'){

			echo "<script>$('#text_footer').css('display','none');</script>";
			
			}
			else{
				echo "<script>$('#text_footer').css('display','block');</script>";
			}
		#########################################
		
		if($content){			
			require_once(ROOT_DIR.$content);
		}else{
			echo "<script>document.location.replace('".SITE_URL."/id".USER_ID."');</script>";die();
		}
		
		
		
		
	}
	
	private function handler_url($first){
		$path = "modules/";
		$ix = "/index.php";
		if(USER_ID){
			if($this->size_url($first,"id",true)){return $path."profile".$ix;}
			if($this->size_url($first,"fave",true)){return $path."fave".$ix;}
			if($this->size_url($first,"feed")){return $path."feed".$ix;}
			
			if($this->size_url($first,"friends",true)){return $path."friends".$ix;}
			if($this->size_url($first,"friends_online")){return $path."friends/page/fr_online.php";}
			if($this->size_url($first,"friends_requests")){return $path."friends/page/fr_requests.php";}
			if($this->size_url($first,"friends_myrequests")){return $path."friends/page/fr_my_requests.php";}
			if($this->size_url($first,"friends_sub")){return $path."friends/page/fr_sub.php";}
			
			if($this->size_url($first,"am",true)){return $path."photo".$ix;}
			if($this->size_url($first,"video",true)){return $path."video".$ix;}
			if($this->size_url($first,"edit")){return $path."edit/pod_module/edit_osn.php";}
			if($this->size_url($first,"edit_lich")){return $path."edit/pod_module/edit_lich.php";}
			if($this->size_url($first,"edit_cont")){return $path."edit/pod_module/edit_cont.php";}
			if($this->size_url($first,"audio",true)){return $path."audio".$ix;}
			if($this->size_url($first,"mail")){$this->mod="mail";return $path."mail".$ix;}	
			if($this->size_url($first,"public",true)){return $path."groups/page/public.php";}
			if($this->size_url($first,"groups")){return $path."groups".$ix;}
			if($this->size_url($first,"groups_admin")){return $path."groups/page/groups_admin.php";}
			if($this->size_url($first,"priv")){return $path."settings".$ix;}
			if($this->size_url($first,"poisk_people")){return $path."poisk/poisk_cnt.php";}
			if($this->size_url($first,"poisk_publ")){return $path."poisk/poisk_cnt.php";}
			if($this->size_url($first,"poisk_audio")){return $path."poisk/poisk_cnt.php";}
			if($this->size_url($first,"poisk_audio")){return $path."poisk/poisk_cnt.php";}
			if($this->size_url($first,"poisk_news")){return $path."poisk/poisk_cnt.php";}
			if($this->size_url($first,"poisk_video")){return $path."poisk/poisk_cnt.php";}
			
			if($this->size_url($first,"test")){return $path."test".$ix;}
			if($this->size_url($first,"look",true)){return $path."photo/look_cnt.php";}
			if($this->size_url($first,"group_edit",true)){return $path."groups/page/group_edit.php";}
			if($this->size_url($first,"support")){return $path."support".$ix;}
			if($this->size_url($first,"docs")){return $path."docs".$ix;}
			if($this->size_url($first,"dg",true)){$this->mod="dg";return $path."mail/dg_cnt.php";}
			
			
				
		}else{
			if($this->size_url($first,"activate")){return $path."reg/activate.php";}	
			if($this->size_url($first,"help")){return $path."/help/index_no_auth.php";}
			if($this->size_url($first,"about")){return $path."/about/".$ix;}
			if($this->size_url($first,"reg")){return $path."/reg/reg.php";}
			
		}
		if($this->size_url($first,"logout")){return $path."logout".$ix;}
		if($this->size_url($first,"login")){return $path."login".$ix;}
		if($this->size_url($first,"404")){return "err/error404.php";}
	}
	
	private function size_url($first,$inc,$no=false){	
	
		if($no){
			if($this->sokr($first,strlen($inc))==$inc){
				$razd = explode('_', substr($first,strlen($inc)));
				if(is_numeric(substr($first,strlen($inc))) || empty(substr($first,strlen($inc)))){
					return true;
				}
				if(is_numeric($razd[0]) && is_numeric($razd[1])){
					return true;
				}
				
				
			}
		}else{
			if(strlen($first)==strlen($inc) && $first==$inc){
				return true;
			}
		}
		
		return false;
	}
	
	private function sokr($first,$size){	
			return substr($first, 0, $size);	
	}

	
	
	private function er404(){
		header($_SERVER['SERVER_PROTOCOL'].'HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
		header("location: /404/");
        exit();
	}

	
	public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
	
	private function __clone() {
    }

    private function __wakeup() {
    } 
	
	
}

$apl = new Router(REQ_URI,USER_ID);

?>