<?php  
	$LastModified_unix = strtotime(
		date("D, d M Y H:i:s",  
		filectime($_SERVER['SCRIPT_FILENAME']))
	); 
	
	$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix); 
	$IfModifiedSince = false; 

	if(isset($_ENV['HTTP_IF_MODIFIED_SINCE'])){
		$IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5)); 
	}

	if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])){
		$IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5)); 
	}

	if($IfModifiedSince && $IfModifiedSince >= $LastModified_unix){ 
		header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified'); 
		exit; 
	} 

	header('Last-Modified: '. $LastModified); 

?>
<!DOCTYPE html>
<html>
	<head>
	


<? require_once(ROOT_DIR."basic/head.php"); ?>

<script>

function msg_w(){
	var h_er = document.documentElement.clientHeight-42;
	$('#dg_tbl').css('min-height',h_er).css('height',h_er);
}
window.onload = function() {
	msg_w();
};


var fleft;
var h_e;
function myFunction() {
	msg_w();
	
	if($("#im_content").length){
		h_e = document.documentElement.clientHeight-110;
		$("#im_content").css('min-height',h_e);
	}
	//alert(h_e);
	fleft = document.getElementById("page_body").getBoundingClientRect().left+1;
	var fleft2 = fleft-145;
			$('#ac').css({left: fleft});
			$('#page_head_layout').css({left: fleft2});
			$('#side_bar').css({left: fleft2});
			$('#im_controls_uved').css({left: fleft});
			$('#im_nav_wrap').css({left: fleft});
			$('#im_controls_wrap').css({left: fleft});
	
}

</script>
</head>

<body onresize="myFunction()">

<div id="page_wrap">
	<div id="page">
		<div id="page_header">
				<? require_once(ROOT_DIR.'basic/osn/cap.php'); ?>
						<!-- Меню --> 	
						<?if($module=='superuser' && $_SESSION['user_id']==1){
							require_once(ROOT_DIR.'basic/menu_superuser.php');
						}
						elseif($module=='general' && $_SESSION['user_id']==1){
							 require_once(ROOT_DIR.'basic/menu_superuser.php');
						}
						else{require_once(ROOT_DIR.'basic/menu.php');} 
						?>

		</div>
		<div id="page_body">
			<?require_once(ROOT_DIR.$content);?>
		</div>
		<div id="page_footer">
			
				<div id='text_footer' <? if($this->mod=='mail' || $this->mod=='dg'){echo 'style="display:none"';}?>>
					<div id="bottom_nav">
						<a class="bnav_a" href="/support" style=""><?=$MESS['Support'];?></a>
						<a class="bnav_a" href="/terms" style=""><?=$MESS['Terms'];?></a>
						<a class="bnav_a" href="" style=""><?=$MESS['People'];?></a>
						<a class="bnav_a" href="#" style=""><?=$MESS['Communities'];?></a>
					</div>	
					<div id="bottom_nav_2" class="clear">
						<div class="copy_lang"><?=NAME_SITE?> © 2017 - <?=date('Y');?> <a class="nav_lang" title="Язык" ><?=$MESS['LANG_CURRENT'];?></a></div>	
					</div>
				</div>
			
				<? require_once('basic/btm.php'); ?>
		</div> 
			
		
</div>

</body>
</html>