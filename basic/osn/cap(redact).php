<audio id="myaudio" onended='autoload();'>
<?
$userid = $_SESSION['user_id'];

$user_sql = "select * from audio where userid = '$userid' ORDER BY number";
$user_result = mysql_query($user_sql,$connection) or die(mysql_error());
$i=0;

 while ($user_row = mysql_fetch_array($user_result)) {
	 $i++;
	 echo "<source id='play".$i."' src='/mus/".$user_row['track']."' type='audio/mpeg'></source>";
 }
?>
			</audio>

<audio id='message_1'>
        <source src="img/sys_audio/msg.mp3"></source>
        <source src="img/sys_audio/msg.mp3"></source>
</audio>
<audio id='message_2'>
        <source src="img/sys_audio/send_msg.wav"></source>
        <source src="img/sys_audio/send_msg.wav"></source>
</audio>
<?

$status_sql = "select * from status where id = '1'";
$status_result = mysql_query($status_sql,$connection) or die(mysql_error());

while ($status_row = mysql_fetch_array($status_result)) {
	 $status = $status_row['status'];
	 $id_stat = $status_row['track'];
 }

?>			
<div style='display:none' data-num-track='1' id='status' class='stop_stat'></div>
<div style='display:none' id='id_user' class='id_u<?=$_SESSION['user_id'];?>'></div>
<div id='list' style='width:791;position:fixed;height:40px;outline:0px solid black;padding:0;z-index:99;
	background:#4E729A;
-webkit-border-radius: 0px 0px 7px 7px;
    -khtml-border-radius: 0px 0px 7px 7px;
    -moz-border-radius: 0px 0px 7px 7px;
    border-radius: 0px 0px 7px 7px;
	
	'>
	<table id="top_links" cellspacing="0" cellpadding="0" style='heigth:40px;'>
			<tbody><tr>
					  <td class="top_home_link_td" style='width:146px;vertical-align: top;'>
							<div id="top_logo_down" class=""></div>
							<a class="top_home_link" href="/"></a>
					  </td>
					 <td class="top_back_link_td" style='width:100%'>
						<!--<a class="top_nav_link fl_l" href="" id="top_back_link" style="max-width: 250px;"></a>-->
					  </td>
					  <td style=""><nobr>
						<a class="top_nav_link top_lnk " id="head_people" href="/poisk_people">люди</a>
					  </nobr></td>
					  <td style=""><nobr>
						<a class="top_nav_link top_lnk" id="head_statuses" href="/poisk_news">новости </a>
					  </nobr></td>
					  <td style=""><nobr>
						<a class="top_nav_link top_lnk" id="head_communities" href="/poisk_publ">сообщества</a>
					  </nobr></td>
					  <td><nobr>
						<a class="top_nav_link top_lnk" id="head_music" href="/poisk_audio">
						  <span id="head_music_text">музыка</span>     
						  </a>
					  </nobr></td>
					  <td style="" class="dn"><nobr>
						<a class="top_nav_link" href="/search?type=videos">видео</a>
					  </nobr>
					  </td>
					  <td class='top_nav_link_l' style='width:10px;'></td>
					  <td id="logout_link_td" style=''><nobr>
						<a class="top_nav_link logout" id="logout_link" href="/logout">выход</a>
					  </nobr></td>
					  <td class='top_nav_link_l' style=''></td>
					</tr>
		  </tbody>
  </table>
  
<!-- Строка поиска -->

  <div id="ts_wrap" style='position: absolute;top: 0px;left: 144px;height: 40px;width: 171px;' class="clear_fix">
  
    <div id="ts_input_wrap" class="ts_input_wrap fl_r" style='position: relative;top: 50%;width: 167px;margin-top: -13px;padding: 1px;-webkit-border-radius: 2px;
		-moz-border-radius: 2px;border-radius: 2px;overflow: hidden;float: right;'>
		
		
		<div class="ts" style='-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			overflow: hidden;
			background-color: #FFFFFF;
			border: 1px solid #5E82A8;'>
			<div class="ts_input_wrap2">
				<div>
					<div class="input_back_wrap no_select" style="display: block;    position: relative;z-index: 90;cursor: text;">
					<div class="" style="margin: 1px; padding: 3px 41px 5px 20px;margin-top: 0 !important;margin-left: 0 !important;">
					<div class="input_back_content" style='padding: 2px 2px;white-space: nowrap;line-height: normal;'>Поиск</div></div>  </div>
			  
				</div>
			</div>
		</div>
    </div>
    <div id="ts_friends_online" class="ta_r" style="display: block;"></div>
  </div>

<!-- Конец строки поиска -->
  
</div> 
<script>
			var klas = $('#status').data('num-track');
			var klas_st = $('#status').attr('class');
			
			//$('#track'+klas_id).addClass('tr_neact');
			
			var klas_st = klas_st.substr(0, 9);
				if(klas_st==='play_stat'){
					
					$('#track'+klas).removeClass('').addClass('stop');
					
					var oAudio = document.getElementById('myaudio');
					var fop = $('#status').data('num-track');
					//alert(fop_id);
					var ntr = 'play'+fop;
					var audioURL = document.getElementById(ntr);
					//oAudio.src = audioURL.src;
					//oAudio.play();
					
					
				}
				else if(klas_st==='stop_stat'){
					
					//$('#track'+klas).addClass('tr_neact');
					
				}

</script>