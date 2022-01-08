
<script type="text/javascript" src="/js/history.js"></script>
  
<script>
  
  autosize(document.querySelectorAll('textarea'));
  
</script>
<!--<script type="text/javascript" src="/js/queryloader2.min.js"></script>-->

<script>



function breakText(){
  // определяем позицию курсора
  //alert('sdf'

}

$(document).on('click', '#mail_box_send', function(){
	var user = $('#id_user').attr('class');
	var user_id = user.substr(4, user.length);
	var msg_cnt = $('#mail_box_editable').text();
	var pos = $('#profile').data('p');
	//alert(msg_cnt);
	
	$.ajax({
			type: "POST",
			url: "/zapr/pr_add_msg.php",
			data: {userid:user_id,
			pos:pos,
			msg:msg_cnt,
			},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			$('#box_layer').remove();
			$('#zaslon_msg').remove();
			$('html').css('overflow-y', 'scroll');	
				}
			
	});
		
});

function cr_new_msg(e){	
		
			e.preventDefault();
			var user = $('#id_user').attr('class');
			var user_id = user.substr(4, user.length);
			var pos = $('#profile').data('p');
			
			
		$.ajax({
			type: "POST",
			url: "/zapr/pr_send_msg.php",
			data: {userid:user_id,
			pos:pos,
			},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			  $('html').css('overflow-y', 'hidden');
			  $('#list').prepend(data);
				
			  
				}
			
		});
	
}


$(document).on('click', '#cl_new_msg', function(){
	$('#box_layer').remove();
	$('#zaslon_msg').remove();
	$('html').css('overflow-y', 'scroll');

})

$(document).mouseup(function (e){ 
		 if (!$(e.target).closest("#box_layer").length) {
						$('#box_layer').remove();
						$('#zaslon_msg').remove();
						$('html').css('overflow-y', 'scroll');
		 }
	});


 $('#cont').on('click', '#cr_new_msg', cr_new_msg);
 
 
 
$('#cont').on('mouseover', '.post_like', function(e){
	
	//var clam = $(this).attr('id').substr(9,20);

	
	
	
	$('#toolike').empty();
	
	var position = $('#post_like43').position();
	//var clam = $(this).attr('id').substr(9,20);

/*	
	$.ajax({
			type: "POST",
			url: "/zapr/pr_like_post.php",
			data: {clam:clam,
			},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			  $('#toolike').empty();
			  $('#toolike').append(data);
		
			  
				}
			
	});
*/	
	
	
	var l_top = $('#post_like'+clam).offset().top - 96;
	var l_left = $('#post_like'+clam).offset().left;
	$('#toolike').css('left', l_left);
	$('#toolike').css('top', l_top);
	//alert(l_top);
	$('#toolike').css('display', 'block');
	
	
});

$('#cont').on('mouseout', '.post_like', function(){
	$('#toolike').css('display', 'none');
	
})

function send_Post(){	
			var post_gr = $('#post_gr').val();
			if(post_gr.replace(/^\s+|\s+$/g, '') == ''){}
			else{
			var id_publ = $('#public').data('publ');
			var first = $('.post:first');
			
			var id_user = $('#id_user').attr('class');

							
			if($(".post").length>0) {
				var post= first.data('post');
			}
			
			/* if($("#up_msg").length>0) {
			var r = $('#stat_form').attr('data-publ');
			//alert(r);
			}
			*/
			//alert('загрузка');
			
			$.ajax({
			type: "POST",
			data:{post_gr:post_gr,
			id_publ:id_publ,
			post:post,
			id_user:id_user,
			},
			url: "/zapr/publibc_add_post.php",
			cache: false,        
			success: function(data){  
		  
			}
			}).done(function(data){

			 data = jQuery.parseJSON(data);
         
         
                
              
            $.each(data, function(index, data){
							//alert(data.id);
			//alert(data.id);
			
				$('.post:first').before("<div id='post' data-post='" + data.id + "' class='post all own'>" +
				"<div class='post_table'><div class='post_image'>" +
				" <a class='post_image' href='/public13475'>" +
				"<img src='" + data.img_gr + "' height='50' width='50'></a>" +
			    "</div>"+
				"<div class='post_info'>" +
				"<div class='fl_r post_actions_wrap'>" +
				"<div class='post_actions'>" +
				"<div style='opacity: 0;' id='post_delete-13475_592966' class='post_delete_button fl_r'></div>" +
				"<div style='opacity: 0;' id='post_edit-13475_592966' class='post_edit_button fl_r'></div></div></div>"+
				"<div class='wall_text'><div class='wall_text_name'>" +
				"<a class='author' href='/public13475' data-from-id='13475' data-post-id=''>Сообщество</a></div>" +
				"<div id='wpt-13475_592966'><div class='wall_post_text'>" + data.text +
				"</div><div class='page_post_queue_wide'>" +
				"<div class='page_post_sized_thumbs  clear_fix' style='width: 413.33px; height: 310px;'>" +
				"<a style='width: 413.33px; height: 310px;' class='page_post_thumb_wrap  page_post_thumb_last_column page_post_thumb_last_row'>" +
				"<img src='/video/rmx.jpg' width='413.33' height='310' style='' class='page_post_thumb_sized_photo'>" +
				"</a></div></div><div class='page_post_queue_narrow'>" +
				"<div class='page_post_sized_thumbs  clear_fix' style='width: 337px;'>" +
				"</div></div><div class='clear'></div><div class='clear'></div><div class='clear'></div><div class='clear'></div>" +
				"</div></div><div class='post_full_like_wrap sm fl_r'><div class='post_full_like'>" +
				"<div class='post_like fl_r'><span class='post_like_link fl_l' id='like_link-13475_592966'>Мне нравится</span>" +
				"<i class='post_like_icon sp_main no_likes fl_l' id='like_icon-13475_592966'></i>" +
				"<span class='post_like_count fl_l' id='like_count-13475_592966'></span>" +
				"</div><div class='post_share fl_r no_shares'><span class='post_share_link fl_l' id='share_link-13475_592966'>Поделиться</span>" +
				"<i class='post_share_icon sp_main fl_l' id='share_icon-13475_592966'></i>" +
				"<span class='post_share_count fl_l' id='share_count-13475_592966'></span></div></div></div><div class='replies'>" +
				"<div class='reply_link_wrap sm' id='wpe_bottom-13475_592966'><small>" +
				"<a href='/wall-13475_592966'><span class='rel_date' abs_time='3 нед. назад' time='1483438605'>3 нед. назад</span></a>" +
				"</small><span id='reply_link-13475_592966' class='reply_link'><span class='divide'>|</span><a class='reply_link'>Комментировать</a>" +
				"</span></div><div id='post_replies13475_592966'></div><div class='replies_wrap clear' id='replies_wrap-13475_592966' style='display: none'>" +
				"<div id='replies-13475_592966'><input id='start_reply-13475_592966' value='' type='hidden'></div>" +
				"<div class='reply_fakebox_wrap' id='reply_fakebox-13475_592966'>" +
				"<div class='reply_fakebox'>Комментировать..</div></div></div></div></div></div></div>")
				
				});


		
			
	
			$('#gr_inp').css('display', 'block');
				$('#submit_post').css('display','none');
				$('#post_gr').css('min-height','24px');
				$('#post_gr').css('height','24px');
				$('.post_upload_wrap').css('display','none');
				$('#post_gr').val('');
		});
		
}
						
}

function sendPost(){	

	var uri = $(this).attr('href');
			var userid = <?=$_SESSION['user_id'];?>;
			var pos = $('#profile').data('p');
			var post_t = $('#post_post').val();
			$('#post_field').text();	
			if(post_t===''){return false;} 
			else {
		$.ajax({
			type: "POST",
			url: "/zapr/pr_add_post.php",
			data: {link: uri,
			userid:userid,
			pos:pos,
			post_t:post_t,
			},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			  
			  $('#post_field').val('').blur();
			  $('#submit_post').css('display','none');
		      $('.post_upload_wrap').css('display','none');
			  $('#pr_inp').css('display', 'block');
			  $('#post_post').css('min-height','24px');
			  $('#post_post').css('height','24px');
			   $('#post_post').val('');
			   $('#post_post').blur(); 
			   
				}
			
			}).done(function(data){
				//alert(r);
			 data = jQuery.parseJSON(data);
            //alert(data.id);
            // Если массив не пуст (т.е. статьи там есть)
            if (data.length > 0) {
                
            // Делаем проход по каждому результату, оказвашемуся в массиве,
            // где в index попадает индекс текущего элемента массива, а в data - сама статья                
            $.each(data, function(index, data){
							//alert(data.id);
						
				$('.post:first').before("<div id='post_" + data.public_id +"' data-post='" + data.id +"' class='post all own'>" +
				"<div class='post_table'><div class='post_image'><a class='post_image' href='/public13475'>"+
				"<img src='/temp/dog_small.jpg' height='50' width='50'></a></div>"+
				"<div class='post_info'><div class='fl_r post_actions_wrap'><div class='post_actions'><div style='opacity: 0;' id='post_delete-13475_592966' class='post_delete_button fl_r'></div>"+
				"<div style='opacity: 0;' id='post_edit-13475_592966' class='post_edit_button fl_r'></div></div></div><div class='wall_text'><div class='wall_text_name'>"+
				"<a class='author' href='/public13475' data-from-id='-13475' data-post-id=''>Сообщество</a></div><div id='wpt-13475_592966'><div class='wall_post_text'>" + data.text +
				"</div><div class='page_post_queue_wide'><div class='page_post_sized_thumbs  clear_fix' style='width: 413.33px; height: 310px;'>"+
				"<a style='width: 413.33px; height: 310px;' class='page_post_thumb_wrap  page_post_thumb_last_column page_post_thumb_last_row'>"+
				"<img src='/video/rmx.jpg' width='413.33' height='10' style='' class='page_post_thumb_sized_photo'></a></div></div><div class='page_post_queue_narrow'>"+
				"<div class='page_post_sized_thumbs  clear_fix' style='width: 337px;'></div></div><div class='clear'></div><div class='clear'></div>"+
				"<div class='clear'></div><div class='clear'></div></div></div><div class='post_full_like_wrap sm fl_r'><div class='post_full_like'><div class='post_like fl_r' >"+
				"<span class='post_like_link fl_l' id='like_link-13475_592966'>Мне нравится</span><i class='post_like_icon sp_main no_likes fl_l' id='like_icon-13475_592966'></i>"+
				"<span class='post_like_count fl_l' id='like_count-13475_592966'></span></div><div class='post_share fl_r no_shares'>"+
				"<span class='post_share_link fl_l' id='share_link-13475_592966'>Поделиться</span><i class='post_share_icon sp_main fl_l' id='share_icon-13475_592966'></i>"+
				"<span class='post_share_count fl_l' id='share_count-13475_592966'></span></div></div></div><div class='replies'><div class='reply_link_wrap sm' id='wpe_bottom-13475_592966'>"+
				"<small><a href='/wall-13475_592966'><span class='rel_date' abs_time='3 нед. назад' time='1483438605'>3 нед. назад</span></a></small>"+
				"<span id='reply_link-13475_592966' class='reply_link'><span class='divide'>|</span><a class='reply_link'>Комментировать</a></span></div>"+
				"<div id='post_replies13475_592966'></div><div class='replies_wrap clear' id='replies_wrap-13475_592966' style='display: none'>"+						
				"<div id='replies-13475_592966'><input id='start_reply-13475_592966' value='' type='hidden'></div><div class='reply_fakebox_wrap' id='reply_fakebox-13475_592966'>"+
				"<div class='reply_fakebox'>Комментировать..</div></div></div></div></div></div></div>")
				});
			//var audio_1 = document.getElementById("message_1");
			//audio_1.play();
			//$(document).scrollTop(100000);
			}
			
			
		});
			}
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
				url: "/am.php",
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
				
				
				
	$(document).mouseup(function (e){ 
		 if (!$(e.target).closest("#cr_gr_okno").length) {
						cl_gr_cr();
		 }
	});
	
	$(document).on('click', '#cl_btn_cr_gr', cl_gr_cr);
	
	function cl_gr_cr(){
		$('#zaslon_gr').remove();
		$('#sam_gr').remove();
	}
	
	$(document).on('click', '#close_cr_gr', cl_gr_cr);	

	
	$(document).on('click', '#create_gr', function(e){		
	
				var uri = $(this).attr('href');
			
			//alert(uri);
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri}, null, uri);
			e.preventDefault();
	
			$.ajax({
			type: "POST",
			url: "/zapr/gr_create.php",
			data: {},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			
			  $('#list').prepend(data);
			  $('#group_create_title').focus();
				}
			
			});	
			
				
	});		

	$(document).on('click', '#cr_gr', function(e){	
	
	var name_gr = $('#group_create_title').val();
	//alert(name_gr);
		if(name_gr.replace(/^\s+|\s+$/g, '') != ''){
			
		$.ajax({
			type: "POST",
			url: "/zapr/gr_new_gr.php",
			data: {name:name_gr},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			cl_gr_cr();
			
			}
			});
		}
			
	});
				

	$(document).on('click', '.video_open', function(e){	
			
			var uri = $(this).attr('href');
			
			//alert(uri);
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri}, null, uri);
			e.preventDefault();
	
			$.ajax({
			type: "POST",
			url: "/zapr/video_play.php",
			data: {video:uri},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			
			  $('#list').prepend(data);
				
				}
			
			});	
			
			
	});	

	$(document).on('click', '.close_video', function(){	
		$('#zaslon').remove();
		$('#sam_vid').remove();
	});
	
	

			
$(document).mouseup(function (e){ 
	 if (!$(e.target).closest("#sam_vid").length) {
					$('#zaslon').remove();
					$('#sam_vid').remove();
	 }
});
					
$(document).on('click', '#sendpost', sendPost);

$(document).on('click', '#send_post', send_Post);

$('#cont').on('click', '.str_poiska', function(e){
		var uri = $(this).attr('href');
			
			//alert(uri);
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri}, null, uri);
			e.preventDefault();
			$('.search_subtab1').removeClass('active');
			$(this).find('.search_subtab1').addClass('active');
			
			$.ajax({
			type: "POST",
			url: "/cnt/poisk/am_poisk.php",
			data: {link: uri},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			  $('#tbl_str_poiska').empty();
			  $('#tbl_str_poiska').append(data);
				
				}
			
			});
			
});


$('#cont').on('click', '.dg_lnk_msg', function(e){
	
			var uri = $(this).attr('href');
			//alert(uri);
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri}, null, uri);
			
			e.preventDefault();

			$.ajax({
			type: "POST",
			url: "/am.php",
			data: {link: uri},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			  $('#cont').empty();
			  $('#cont').append(data);
				
				}
			
			});
});

$('#cont').on('click', '.dg_lnk_tuda', function(e){
	
			var uri = $(this).attr('href');
			var uri_msg = uri.substr(3, uri.length);
			var user_id = <?=$_SESSION['user_id'];?>;
			//alert(uri_msg);
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri}, null, uri);
			var public = uri.substr(3, uri.length);
			e.preventDefault();

			$.ajax({
			type: "POST",
			url: "/zapr/msg.php",
			data: {
			user_id: user_id,
			public:public,
			},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			  $('#im_log203439').empty();
			  $('#im_log203439').append(data);
			  $(document).scrollTop(10000);
				}
			
			});
			var d_user = $(this).data('user');
			
			$.ajax({
			type: "POST",
			url: "/zapr/dg_img.php",
			data: {d_user:d_user,},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			 $('#pr_small').attr('src', data);
			
				}
			
			});
			

			var inProgress = false;
/* С какой статьи надо делать выборку из базы при ajax-запросе */ 
			$('#stat_form').attr('data-st', 10).data('st', 10);
			var userid = <?=$_SESSION['user_id'];?>;
			$.ajax({            
					/* адрес файла-обработчика запроса */
					url: '/zapr/dg_up_lnk_msg.php',
					/* метод отправки данных */
					method: 'POST',
					/* данные, которые мы передаем в файл-обработчик */
					data: {r:uri_msg,userid:userid},
					/* что нужно сделать до отправки запрса */
					beforeSend: function() {
					/* меняем значение флага на true, т.е. запрос сейчас в процессе выполнения */
					inProgress = true;},
					success: function(data){  
			  // вывод в блок <div id="data">
					$('#up_msg').empty();

					$('#up_msg').append(data);
					$('#stat_form').attr('data-publ', uri_msg).data('publ', uri_msg);
		
					}
					/* что нужно сделать по факту выполнения запроса */            
					});
			 
});

	});
</script>

<script >
	$(document).ready(function(){
		
		$("#menu").on('click', 'a', function(e){
			
			var uri = $(this).attr('href');
	
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri}, null, uri);
			
			e.preventDefault();

			$.ajax({
			type: "POST",
			url: "/am.php",
			data: {link: uri,},
			cache: false,     			
			success: function(data){  
			  // вывод в блок <div id="data">
				$('#cont').empty();

					$('#cont').append(data);
				
	
			}
		});
			
		});
		
			$("#top_links").on('click', '.top_lnk', function(e){
			
			var uri = $(this).attr('href');
	
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri}, null, uri);
			
			e.preventDefault();

			$.ajax({
			type: "POST",
			url: "/am.php",
			data: {link: uri,},
			cache: false,     			
			success: function(data){  
			  // вывод в блок <div id="data">
				$('#cont').empty();

					$('#cont').append(data);
				
	
			}
		});
			
		});
		
		
		$('#cont').on('click', '.dg_lnk', function(e){
			
			var uri = $(this).attr('href');
	
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri}, null, uri);
			
			e.preventDefault();

			$.ajax({
			type: "POST",
			url: "/am.php",
			data: {link: uri,},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			  $('#cont').empty();
			  $('#cont').append(data);
				
				}
			
			});
			
		});
		
		$('#cont').on('click', '.gr_lnk', function(e){
			
			var uri = $(this).attr('href');
	
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri}, null, uri);
			
			e.preventDefault();

			$.ajax({
			type: "POST",
			url: "/am.php",
			data: {link: uri,},
			cache: false,        
			success: function(data){  
			  // вывод в блок <div id="data">
			  $('#cont').empty();
			  $('#cont').append(data);
				
				}
			
			});
			
		});
		
		
		
		
		
	});
</script>
<script>
	$(document).ready(function(){
		$("#cont").on('click', '.lnk_pr', function(e){
			
			var uri = $(this).attr('href');
	
			//сразу задаем параметры для текущего состояния
			history.pushState({uri:uri}, null, uri);
			
			e.preventDefault();
			

				$.ajax({
				type: "POST",
				url: "/am.php",
				data: {link: uri,},
				cache: false,        
				success: function(data){  
				  // вывод в блок <div id="data">
				  $('#cont').empty();
				  $('#cont').append(data);
					
					}
				
				});
			
		});
		
		$(window).bind('popstate', function(event) { 
				openPage(history.state.uri);	
		});
		
		function openPage(uri,mas){
				$.ajax({
				type: "POST",
				url: "/am.php",
				data: {link: uri,},
				cache: false,        
				success: function(data){  
				  // вывод в блок <div id="data">
				  $('#cont').empty();
				  $('#cont').append(data);
					
					}
				
				});
			}
	});
</script>

 <script type="text/javascript">
 $(document).ready(function(){
$('#cont').on('click', '#pr_inf_gr', function(){
    var p = document.getElementById('pr_full');
	if(p.style.display=="none"){
		p.style.display="block";}
	else{
		p.style.display="none";}
});
 });
 </script>
 

 
 <!-- Начало Музыки -->

<script type="text/javascript">


function autoload(){
	jQuery(document).ready(function ($) {
		var oAudio = document.getElementById('myaudio');
		var klas = $('#myaudio').attr('class');
		var klas_id = klas.substr(5, klas.length);
		var qtr = +klas_id+1;
		var sqtr = 'play'+qtr;
		var audioURL_q = document.getElementById(sqtr);
		var us_id = $('#id_user').attr('class');
		var usid = us_id.substr(4, us_id.length);
		oAudio.src = audioURL_q.src;
		oAudio.play();
		var dq = $('#track'+qtr).attr('data-id');
		
		
		
		
		//alert(sqtr);
		$('#myaudio').removeClass().addClass('track'+qtr);
		if($("#rod").length>0) {
		//alert(usid);
			$.ajax({
			type: "POST",
			url: "zapr/audio_inf_tr.php",
			data: {
			dq:dq,
			usid:usid
			},      
			success: function(data){  
				$('#ac_name').empty().append(data);
				}
			});
		
			$('.music_s').removeClass('tr_act');
			$('.'+qtr).removeClass('').addClass('tr_act');
			$('#play').removeClass('tr_pl').addClass('tr_st');
			$('.stop').removeClass('stop').addClass('play_s');
			$('#track'+qtr).removeClass('play_s').addClass('stop');
			$('.music_s').removeClass('tr_now');
			$('.play_s').removeClass('tr_neact');
			$('.stop').removeClass('tr_neact');
			$('#status').attr('data-num-track', qtr);
	}
	
	});
}


jQuery(document).ready(function ($) {
	
	var atr = $('#status').attr('class');
	var atr_id = atr.substr(11, atr.length);
	$('#myaudio').removeClass().addClass('track'+atr_id);
	//alert(atr_id);
});
</script>
<script>
	$('#cont').on('click', '#im_editable203439', function(){
		$('#scrit').css('display', 'none');
	});
	$('#cont').on('click', '#scrit', function(){
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
$('#cont').on('click', '#im_send', sendMsg);
			
	     	function sendMsg(){

			
			var user = $('#id_user').attr('class');
			var user_id = user.substr(4, user.length);
			var r = $('#stat_form').attr('data-publ');
			var msg = $('#im_editable203439').text();
			var pid = $('.mess:last').attr("data-msg");
			
			if(msg.replace(/^\s+|\s+$/g, '') != ''){

			//alert(user_id);
					$.ajax({
					type: "POST",
					url: "/zapr/dg_send_msg.php",
					data: {
					msg:msg,
					r:r,
					user:user_id,
					pid:pid,
					},
					cache: false,
					success: function(data){  
						$('#im_editable203439').empty();
						
					}			
					
				});
			}
		
			

		}

		 $('#cont').on('keypress', '#im_editable203439', function(e){
	 
	     	   if(e.keyCode==13){
			
	     	   sendMsg();
			   
				return false;	
				
	     	   }
			   
	     	 });
		
		function addMsg(){	
			//alert('sdf');
			if($(".mess").length>0) {
				var pid = $('.mess:last').attr('data-msg');
			}
			//alert(pid);
			if($("#up_msg").length>0) {
			var r = $('#stat_form').attr('data-publ');
			//alert(r);
			}
			//alert('загрузка');
			$.ajax({
			type: "POST",
			url: "/zapr/dg_reload_msg.php",
			data: {r:r,
			pid:pid,
			},
			cache: false,        
			success: function(data){  
		  
			}
			}).done(function(data){
				//alert(r);
			 data = jQuery.parseJSON(data);
            // alert(data.id);
            /* Если массив не пуст (т.е. статьи там есть) */
            if (data.length > 0) {
                
            /* Делаем проход по каждому результату, оказвашемуся в массиве,
            где в index попадает индекс текущего элемента массива, а в data - сама статья */                 
            $.each(data, function(index, data){
							//alert(data.message);
						
				$('.mess:last').after("<tr class='im_out mess'  data-msg='" + data.id + "' data-date='1481911031'>"+
						"<td class='im_log_act'><div id='ma76804' class='im_log_check_wrap'>"+
						"<div class='im_log_check' id='mess_check76804'></div></div></td><td class='im_log_author'>"+
						"<div class='im_log_author_chat_thumb'>"+
							"<a href='http://exdu.ru/id203439' target='_blank'>"+
							"<img src='/img/pk/pr/small/" + data.img + ".jpg' class='im_log_author_chat_thumb' width='32' height='32'></a></div></td>"+
						"<td class='im_log_body'><div class='wrapped'><div class='im_log_author_chat_name'><a href='http://exdu.ru/id203439' class='mem_link' target='_blank'>"+
						data.first_name +
						"</a></div>"+
						"<div class='im_msg_text'>" + data.message + "</div>" +
						"<div id='im_msg_media76804' class='wall_module'>"+
						"<div class='clear'></div></div></div></td><td class='im_log_date'><a class='im_important_toggler' style='display: none;'></a>4 дн. назад<input type='hidden' id='im_date76804' value='1481911031'></tr>")
				});
			var audio_1 = document.getElementById("message_1");
			audio_1.play();
			$(document).scrollTop(100000);
			}
			
			
		});
		
		
	}
	
	function timedCount() {

    t = setInterval(function(){ addMsg() }, 1000);
}

	function timedCount_p() {

    t_p = setInterval(function(){ addPost() }, 1000);
	}
	
	function addPost(){	
			//alert('sdf');
			if($(".post").length>0) {
				var pid = $('.post:first').attr('data-post');
				//alert(pid);
			}
			
			if (pid !== undefined) {
			//alert(pid);
			
			if($("#public").length>0) {
			var id_publ = $('#public').attr('data-publ');
			//alert(id_publ);
			}
			//alert('загрузка');

						$.ajax({
						type: "POST",
						url: "/zapr/publibc_add_post_rel.php",
						data: {id_publ:id_publ,
						pid:pid,
						},
						cache: false,        
						success: function(data){  
							
						}
						}).done(function(data){
							//alert(r);
						 data = jQuery.parseJSON(data);
						//alert(data.id);
						// Если массив не пуст (т.е. статьи там есть)
						if (data.length > 0) {
							
						// Делаем проход по каждому результату, оказвашемуся в массиве,
						// где в index попадает индекс текущего элемента массива, а в data - сама статья                
						$.each(data, function(index, data){
										//alert(data.id);
									
							$('.post:first').before("<div id='post_" + data.public_id +"' data-post='" + data.id +"' class='post all own'>" +
							"<div class='post_table'><div class='post_image'><a class='post_image' href='/public13475'>"+
							"<img src='/" + data.img_gr + "' height='50' width='50'></a></div>"+
							"<div class='post_info'><div class='fl_r post_actions_wrap'><div class='post_actions'><div style='opacity: 0;' id='post_delete-13475_592966' class='post_delete_button fl_r'></div>"+
							"<div style='opacity: 0;' id='post_edit-13475_592966' class='post_edit_button fl_r'></div></div></div><div class='wall_text'><div class='wall_text_name'>"+
							"<a class='author' href='/public13475' data-from-id='-13475' data-post-id=''>Сообщество</a></div><div id='wpt-13475_592966'><div class='wall_post_text'>" + data.text +
							"</div><div class='page_post_queue_wide'><div class='page_post_sized_thumbs  clear_fix' style='width: 413.33px; height: 310px;'>"+
							"<a style='width: 413.33px; height: 310px;' class='page_post_thumb_wrap  page_post_thumb_last_column page_post_thumb_last_row'>"+
							"<img src='/video/rmx.jpg' width='413.33' height='10' style='' class='page_post_thumb_sized_photo'></a></div></div><div class='page_post_queue_narrow'>"+
							"<div class='page_post_sized_thumbs  clear_fix' style='width: 337px;'></div></div><div class='clear'></div><div class='clear'></div>"+
							"<div class='clear'></div><div class='clear'></div></div></div><div class='post_full_like_wrap sm fl_r'><div class='post_full_like'><div class='post_like fl_r' >"+
							"<span class='post_like_link fl_l' id='like_link-13475_592966'>Мне нравится</span><i class='post_like_icon sp_main no_likes fl_l' id='like_icon-13475_592966'></i>"+
							"<span class='post_like_count fl_l' id='like_count-13475_592966'></span></div><div class='post_share fl_r no_shares'>"+
							"<span class='post_share_link fl_l' id='share_link-13475_592966'>Поделиться</span><i class='post_share_icon sp_main fl_l' id='share_icon-13475_592966'></i>"+
							"<span class='post_share_count fl_l' id='share_count-13475_592966'></span></div></div></div><div class='replies'><div class='reply_link_wrap sm' id='wpe_bottom-13475_592966'>"+
							"<small><a href='/wall-13475_592966'><span class='rel_date' abs_time='3 нед. назад' time='1483438605'>3 нед. назад</span></a></small>"+
							"<span id='reply_link-13475_592966' class='reply_link'><span class='divide'>|</span><a class='reply_link'>Комментировать</a></span></div>"+
							"<div id='post_replies13475_592966'></div><div class='replies_wrap clear' id='replies_wrap-13475_592966' style='display: none'>"+						
							"<div id='replies-13475_592966'><input id='start_reply-13475_592966' value='' type='hidden'></div><div class='reply_fakebox_wrap' id='reply_fakebox-13475_592966'>"+
							"<div class='reply_fakebox'>Комментировать..</div></div></div></div></div></div></div>")
							});
						//var audio_1 = document.getElementById("message_1");
						//audio_1.play();
						//$(document).scrollTop(100000);
						}
						
						
						});
		
			}
		
		
	}

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
	var t_p;
	var timer_is_on_p = 0;
	
	function startPost() {

		if (!timer_is_on_p) {
			timer_is_on_p = 1;
			timedCount_p();
		}
	}

	function endPost() {

		clearTimeout(t_p);
		timer_is_on_p = 0;
	}
	
	
</script>
<script>

jQuery(document).ready(function ($) {
	$('#cont').on('mouseover', '.post', function(){
		$(this).find('.post_delete_button').css('opacity','0.3');
		$(this).addClass('wall_post_over');
	})
	
	$(document).on('mouseout', '.post', function(){
		$(this).find('.post_delete_button').css('opacity','0');
		$(this).removeClass('wall_post_over');
	});

	
	
	
	
	
if($("#up_msg").length>0) {	
	startMsg();
	}		
	else{
		endMsg();
	}

if($("#public").length>0) {	
	startPost();
	}		
	else{
		endPost();
	}	

	 
	     	 ctrl = false; // признак нажатой клавиши "Ctrl"
 
$('#cont').on('keydown', '#post_post', function(e){
if(e.ctrlKey && e.keyCode== 13){sendPost();}
});


	
    /* Используйте вариант $('#more').click(function() для того, чтобы дать пользователю возможность управлять процессом, кликая по кнопке "Дальше" под блоком статей (см. файл index.php) */
	
	var inProgress = false;
   $(document).on('scroll', function() {
	   if($("#public").length>0) {	
		
	 
			var B = document.body, 
				DE = document.documentElement,
				O = Math.min (B.clientHeight, DE.clientHeight); if (!O) O = B.clientHeight;
			var S = Math.max (B.scrollTop, DE.scrollTop),
				C = Math.max (B.scrollHeight, DE.scrollHeight) - 100;
				
			if (O + S > C && !inProgress){
				var r = $('#stat_post').attr('data-publ');
				var user = $('#id_user').attr('class');
				var user_id = user.substr(4, user.length);
				var lastPost = $(".post:last").data('post');
				var dv = Number($('#stat_post').attr('data-st'));
				
				//alert(dv);
				$.ajax({            
					url: '/zapr/publibc_add_post_down.php',
					method: 'POST',
					data: {r:r,user:user_id,
					last_post:dv},
					beforeSend: function() {
					inProgress = true;
					}
         
					}).done(function(data){
					//alert(data);
					data = jQuery.parseJSON(data);
						
						if (data.length > 0) {
						
						$.each(data, function(index, data){
						
						$('.post:last').after("<div id='post_1' data-post='" + data.id + "' class='post all own'>" +
						"<div class='post_table'><div class='post_image'><a class='post_image' href='/public13475'>" +
						"<img src='/"+ data.img_gr + "' height='50' width='50'></a></div><div class='post_info'>" +
						"<div class='fl_r post_actions_wrap'><div class='post_actions'>" +
						"<div style='opacity: 0;' id='post_delete-13475_592966' class='post_delete_button fl_r'></div>" +
						"<div style='opacity: 0;' id='post_edit-13475_592966' class='post_edit_button fl_r'></div>" +
						"</div></div><div class='wall_text'><div class='wall_text_name'>" +
						"<a class='author' href='/public13475' data-from-id='-13475' data-post-id=''>Сообщество</a>" +
						"</div><div id='wpt-13475_592966'><div class='wall_post_text'>" + data.text +
						"</div><div class='page_post_queue_wide'>" +
						"<div class='page_post_sized_thumbs  clear_fix' style='width: 413.33px; height: 310px;'>"+
						"<a style='width: 413.33px; height: 310px;' class='page_post_thumb_wrap  page_post_thumb_last_column page_post_thumb_last_row'"+
						"<img src='/video/rmx.jpg' width='413.33' height='310' style='' class='page_post_thumb_sized_photo'>" +
						"</a></div></div><div class='page_post_queue_narrow'><div class='page_post_sized_thumbs  clear_fix' style='width: 337px;'>"+
						"</div></div><div class='clear'></div><div class='clear'></div><div class='clear'></div><div class='clear'></div>"+
						"</div></div><div class='post_full_like_wrap sm fl_r'><div class='post_full_like'><div class='post_like fl_r'>"+
						"<span class='post_like_link fl_l' id='like_link-13475_592966'>Мне нравится</span>"+
						"<i class='post_like_icon sp_main no_likes fl_l' id='like_icon-13475_592966'></i>"+
						"<span class='post_like_count fl_l' id='like_count-13475_592966'></span></div>"+
						"<div class='post_share fl_r no_shares'><span class='post_share_link fl_l' id='share_link-13475_592966'>Поделиться</span>"+
						"<i class='post_share_icon sp_main fl_l' id='share_icon-13475_592966'></i>"+
						"<span class='post_share_count fl_l' id='share_count-13475_592966'></span></div></div>"+
						"</div><div class='replies'><div class='reply_link_wrap sm' id='wpe_bottom-13475_592966'><small>" +
						"<a href='/wall-13475_592966'><span class='rel_date' abs_time='3 нед. назад' time='1483438605'>3 нед. назад</span></a>"+
						"</small><span id='reply_link-13475_592966' class='reply_link'><span class='divide'>|</span><a class='reply_link'>Комментировать</a>" +
						"</span></div><div id='post_replies13475_592966'></div>"+
						"<div class='replies_wrap clear' id='replies_wrap-13475_592966' style='display: none'><div id='replies-13475_592966'>"+
						"<input id='start_reply-13475_592966' value='' type='hidden'></div><div class='reply_fakebox_wrap' id='reply_fakebox-13475_592966'>"+
						"<div class='reply_fakebox'>Комментировать..</div></div></div></div></div></div></div>")
						
						});
						//$(document).scrollTop(600);

						inProgress = false;
						// Увеличиваем на 10 порядковый номер статьи, с которой надо начинать выборку из базы
						$('#stat_post').attr('data-st', dv+10).data('st', dv+10);
						
					}
					}); 
				
			} 
			
		}
});



			   
	     	

	
	
	
	$('#cont').on('click', '#post_post', function(){
		$('#pr_inp').css('display', 'none');
		$('#submit_post').css('display','block');
		$('#post_post').css('min-height','40px');

		$('.post_upload_wrap').css('display','block');
	});
	$('#cont').on('click', '#pr_inp', function(){
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
			if ($('#post_post').val()==''){
				$('#pr_inp').css('display', 'block');
				$('#submit_post').css('display','none');
				$('#post_post').css('min-height','24px');
				$('#post_post').css('height','24px');
				$('.post_upload_wrap').css('display','none');
			}


		}
	});
	
	$('#cont').on('click', '#post_gr', function(){
		
		$('#gr_inp').css('display', 'none');
		$('#submit_post').css('display','block');
		$('#post_gr').css('min-height','40px');

		$('.post_upload_wrap').css('display','block');
	});
	$('#cont').on('click', '#gr_inp', function(){
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
			if ($('#post_gr').val()==''){
				$('#gr_inp').css('display', 'block');
				$('#submit_post').css('display','none');
				$('#post_gr').css('min-height','24px');
				$('#post_gr').css('height','24px');
				$('.post_upload_wrap').css('display','none');
			}


		}
	});
	
	
	
	
	
	
	

});	
	
	
	
</script>





<script type="text/javascript" src="/js/track.js"></script>
<script type="text/javascript" src="/js/music.js"></script>




 
 
 <!-- Конец Музыки -->
 