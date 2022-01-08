<div id='scripts'>
<script type="text/javascript" src="/jst/func.js"></script>
<script type="text/javascript" src="/jst/general.js"></script>
<script type="text/javascript" src="/jst/profile.js"></script>
<script type="text/javascript" src="/jst/pro.js"></script>
<script type="text/javascript" src="/jst/album.js"></script>

<script type="text/javascript" src="/jst/jquery.storageapi.js"></script>
<script type="text/javascript" src="/jst/storage.js"></script>
<script type="text/javascript" src="/js/miniature.js"></script>


<?

if(isset($tek_viedo)){
	
	echo "<script>$('#vid_1').click();</script>";
	
	
}

?>


 
<script type="text/javascript">
	autosize(document.querySelectorAll('textarea'));
</script>
<script>

	
	$(document).on('click', '.cl_aud', close_box);
///////// Конец Аудио раздела ///////////////
/////////					  ///////////////		
/////////					  ///////////////	
/////////					  ///////////////	
///////// Конец Аудио раздела ///////////////





function breakText(){
  // определяем позицию курсора
  //alert('sdf'

}







	

$(document).ready(function(){
				

/*
		 $(document).on('keypress', function(e){
					alert(e.keyCode);
			if(e.ctrlKey && e.keyCode== 18){alert('привет');}
	     	   if(e.keyCode==1084){
			//alert(e.keyCode);
	     	  	 	var link = '/id1';
			
			//alert(uri);
			//сразу задаем параметры для текущего состояния
				history.pushState({link:link }, null, link);
				e.preventDefault();
		
				$.ajax({
				type: "POST",
				url: "/basic/engine_ajax.php",
				data: {link:link},
				cache: false,        
				success: function(data){  
				  // вывод в блок <div id="data">
				
				  $('#cont').empty();
				  $('#cont').append(data);
					}
				
				});
			   
				return false;	
				
	     	   }
			   
	     	 });
	*/			
				
	});		



</script>

<script >
	$(document).ready(function(){
		
		
// Левое меню ;
		
		$("#side_bar").on('click', 'a', function(e){

			var uri = this.href;
			var link = $(this).attr('href');

			/*var uri = this.href;
			var link = location.hostname+link.href
			//alert(uri);
			//сразу задаем параметры для текущего состояния
			*/
			history.pushState({uri:uri,link:link}, null, uri);
			
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "/index.php",
				data: {
					link: link
				},
				async: true,
				cache: false,     			
				success: function(data){  
					$('#page_body').html(data);
					$('html').scrollTop(0);
				}
			});
			
		});
		
// Конец Левое меню ;
		
			$(document).on('click', '.top_lnk', function(e){
			
			if(!$(e.target).is('#ac_prev_white')){
			
				if(!$(e.target).is('#ac_next_white')){
					
					if(!$(e.target).is('#head_play_btn_white')){
					
					
									var uri = this.href;
									var link = $(this).attr('href');		
	
									//сразу задаем параметры для текущего состояния
									history.pushState({uri:uri,link:link}, null, uri);
									
									e.preventDefault();

									$.ajax({
									type: "POST",
									url: "/index.php",
									data: {
										link: link
									},
									cache: false,     			
									success: function(data){  
									  // вывод в блок <div id="data">
										$('#page_body').html(data);
										$('html').scrollTop(0); 
										
							
									}
								});
				
					}
				}
			}
		});
		
		
		$('#page_body').on('click', '.dg_lnk', function(e){
			
			e.preventDefault();
			
			var uri = $(this).attr('href');
	
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri}, null, uri);
			
			

			$.ajax({
			type: "POST",
			url: "/index.php",
			data: {
				link: uri,
			},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			  $('#page_body').empty();
			  $('#page_body').append(data);
				
				}
			
			});
			
		});
		
		
		
		
		
		
		
	});
</script>
<script>
	$(document).ready(function(){
		$("#page_body").on('click', '.lnk_pr', function(e){
			
			var uri = this.href;
			var link = $(this).attr('href');		
	
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri,link:link}, null, uri);
			
			e.preventDefault();
			

				$.ajax({
				type: "POST",
				url: "/index.php",
				data: {
					link: link,
				},
				cache: false,        
				success: function(data){  
				  // вывод в блок <div id="data">
				  $('#page_body').empty();
				  $('#page_body').append(data);
					
					}
				
				});
			
		});
		
		
		
		function openPage(uri,mas){
				$.ajax({
				type: "POST",
				url: "/basic/engine_ajax.php",
				data: {link: uri,},
				cache: false,        
				success: function(data){  
				  // вывод в блок <div id="data">
				  $('#page_body').empty();
				  $('#page_body').append(data);
					
					}
				
				});
			}
	});
</script>

 

 
 <!-- Начало Музыки -->

<script type="text/javascript">





jQuery(document).ready(function ($) {
	
	var atr = $('#status').attr('class');
	var atr_id = atr.substr(11, atr.length);
	//$('#myaudio').removeClass().addClass('track'+atr_id);
	//alert(atr_id);
});
</script>
<script>
	$('#page_body').on('click', '#im_editable203439', function(){
		$('#scrit').css('display', 'none');
	});
	$('#page_body').on('click', '#scrit', function(){
		$('#scrit').css('display', 'none');
	});
	var container = $('#im_editable203439');
	
	$(document).mouseup(function(e){
	 if (!$(e.target).closest("#im_editable203439").length) {
			if ($('#im_editable203439').html()==''){
				$('#scrit').css('display', 'block');
			}


		}
	});


		 $('#page_body').on('keypress', '#im_editable203439', function(e){
	 
	     	   if(e.keyCode==13){
			
	     	   sendMsg();
			   
				return false;	
				
	     	   }
			   
	     	 });
		
		

	

	var c = 0;
	var t;
	var timer_is_on = 0;
	
	function startMsg() {

		if (!timer_is_on) {
			timer_is_on = 1;
			timedCount();
		}
	}

	function endMsg() {

		clearTimeout(t);
		timer_is_on = 0;
	}
	
	var c_p = 0;
	
	
	
</script>
<script>

$(function() {
	
	
if($("#up_msg").length>0) {	
	startMsg();
	}		
	else{
		endMsg();
	}



	 ctrl = false; // признак нажатой клавиши "Ctrl"
 


	
    /* Используйте вариант $('#more').click(function() для того, чтобы дать пользователю возможность управлять процессом, кликая по кнопке "Дальше" под блоком статей (см. файл index.php) */




			   
	     	

	
	
	
	$('#page_body').on('click', '#post_post', function(){
		$('#pr_inp').css('display', 'none');
		$('#submit_post').css('display','block');
		$('#post_post').css('min-height','40px');

		$('.post_upload_wrap').css('display','block');
	});
	$('#page_body').on('click', '#pr_inp', function(){
		$('#pr_inp').css('display', 'none');
		$('#submit_post').css('display','block');
		$('#post_post').css('min-height','40px');
		$('.post_upload_wrap').css('display','block');
		$('#post_post').focus();
	});
	var container = $('#submit_post_box');
	
	$(document).mouseup(function(e){
	 if (!$(e.target).closest("#submit_post_box").length) {
		 //alert($('#post_field').val());
	 if ($('#post_post').val()=='' && $('#page_pics_preview').is(':empty')){
				$('#pr_inp').css('display', 'block');
				$('#submit_post').css('display','none');
				$('#post_post').css('min-height','22px');
				$('#post_post').css('height','22px');
				$('.post_upload_wrap').css('display','none');
			}


		}
	});
	
	$('#page_body').on('click', '#post_gr', function(){
		
		$('#gr_inp').css('display', 'none');
		$('#submit_post').css('display','block');
		$('#post_gr').css('min-height','40px');

		$('.post_upload_wrap').css('display','block');
	});
	$('#page_body').on('click', '#gr_inp', function(){
		$('#gr_inp').css('display', 'none');
		$('#submit_post').css('display','block');
		$('#post_gr').css('min-height','40px');
		$('.post_upload_wrap').css('display','block');
		$('#post_gr').focus();
	});
	var container = $('#submit_post_box');
	$(document).mouseup(function(e){
	 if (!$(e.target).closest("#submit_post_box").length) {
		 //alert($('#post_field').val());
			if ($('#post_gr').val()=='' && $('#page_pics_preview').is(':empty')){
				$('#gr_inp').css('display', 'block');
				$('#submit_post').css('display','none');
				$('#post_gr').css('min-height','22px');
				$('#post_gr').css('height','22px');
				$('.post_upload_wrap').css('display','none');
			}


		}
	});
	
	
	
	
	
	
	


	 <!-- Профиль -->
	
	$(document).on('click', '#pr_dr_id', function(){
		
		$('#pr_act_vst').css('display','block');
		
		
		$('#pr_dr_id').addClass('ser_dr');
		 //box-shadow: 0px 1px 1px 1px #e1e1e1;
		//$('#pr_dr_id').css('box-shadow','1px 1px 1px 1px #e1e1e1');
		
		$('#pr_act_osn').css('border-radius','2px 2px 0px 0px');
		$('#pr_act_osn').addClass('munya');
		//$('#pr_act_osn').css('box-shadow', '-1px 0px 1px rgba(0,0,0,0.15), 1px 0px 0px rgba(0,0,0,0.15)');
		$('#pr_act_osn').css('box-shadow', '0 1px 1px  1px rgba(0, 0, 0, .3), 0 0 0 -1px rgba(0, 0, 0, .1)');
		$('#pr_act_vst').css('box-shadow', '0 1px 1px  1px rgba(0, 0, 0, .3), 0 0 0 -1px rgba(0, 0, 0, .1)');

		
		$(document).on('mouseleave', '#friend_status', function(){
			
				$('#pr_dr_id').removeClass('ser_dr');
				$('#pr_act_vst').css('display','none');
				$('#pr_act_osn').removeClass('munya').css('border-radius','2px');;
				$('#pr_act_osn').css('box-shadow', '0px 0px 0px 0px');
				$('#pr_act_vst').css('box-shadow', '0px 0px 0px 0px');
				
		});
		
		
	});
	
	$(document).on('mouseenter', '#pr_act_osn', function(){
		$(this).css('border','1px solid #D9DDDF').css('background','#D9DDDF');
		}).on('mouseleave', '#pr_act_osn', function(){
		$(this).css('border','1px solid #F1F1F1').css('background','#F1F1F1');

		});
		


	
	
	
	
	
	
	
});	
	


</script>
<script type="text/javascript" src="/jst/priv.js"></script>
<script type="text/javascript" src="/jst/msg.js"></script>
<script type="text/javascript" src="/jst/wide_dd.js"></script>
<script type="text/javascript" src="/jst/feed.js"></script>
<script type="text/javascript" src="/jst/friends.js"></script>
<script type="text/javascript" src="/jst/group.js"></script>
<script type="text/javascript" src="/jst/gr_sendpost.js"></script>
<script type="text/javascript" src="/jst/poisk.js"></script>

<script type="text/javascript" src="/jst/video.js"></script>
<script type="text/javascript" src="/js/edit_prof.js"></script>

<script type="text/javascript" src="/jst/fave.js"></script>
<script type="text/javascript" src="/jst/track.js"></script>
<script type="text/javascript" src="/jst/audio.js"></script>



</div>
