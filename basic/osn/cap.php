

<audio id="myaudio" onended='autoload();' src='mus/пица - найки.mp3' data-mus='mus/пица - найки.mp3' data-playlist='1' data-track='1' data-number='1' data-status='stop' >
<?
$userid = $_SESSION['user_id'];

$user_sql = $this->db->query("select * from audio where userid = '$userid' ORDER BY number");

$i=0;
foreach($user_sql as $user_row){
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

$status_sql = $this->db->query("select * from status where id = '1'");
	foreach($status_sql as $status_row){

	 $status = $status_row['status'];
	 $id_stat = $status_row['track'];
 }

?>			
<div style='display:none' data-num-track='1' id='status' class='stop_stat'></div>
<div style='display:none' id='id_user' data-id='<?=USER_ID;?>' class='id_u<?=USER_ID;?>'></div>

  <div id="notifiers_wrap" class="fixed"></div>



    <div id="page_head_layout" style="width: 791px;">
	
 <div id="page_header1" class="p_head p_head_l0">
		<div class="back"></div>
		<div class="left"></div>
		<div class="right"></div>
		<div class="content">  
    <div id="top_nav" class="head_nav">
	
	<table id="top_links" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td class="top_home_link_td">
					<div class="" id="top_logo_down"></div>
					<a class="top_home_link" href="<?=SITE_URL;?>/feed"></a>
					<?if($_SESSION['user_id']==1){
						echo "<div style='position:absolute;top:10px;left:115px;'>";
						echo "<a href='/superuser'><i class='fa fa-cog fa-2x' aria-hidden='false' style='color:white'></i></a>";
						echo "</div>";
					}
					?>	
				</td>
				<td class="top_back_link_td">
					<a style="max-width: 250px;" class="top_nav_link top_lnk fl_l" href="http://exdu.ru/id34" id="top_back_link" ></a>
				</td>
				<td id='cap_music'>
					<nobr>
						<a class="top_nav_link top_lnk" id="head_music" href="/poisk_audio">
						<!--<span id="head_music_text">музыка</span>-->
						<div id="ac_prev_white" class="ctrl_wrap fl_l" style=''>
							<div class="prev ctrl"></div>
						  </div>
						  <div id="head_play_btn_white" ></div>
						   <div id="ac_next_white" class="ctrl_wrap">
							<div class="next ctrl"></div>
						  </div>
					
						</a>
						 
					</nobr>
				</td>
				<td>
					<nobr>
						<a class="top_nav_link top_lnk" id="head_people" href="/poisk_people"><?=$MESS['People'];?></a>
					</nobr>
				</td>
				<td>
					<nobr>
						<a class="top_nav_link top_lnk" id="head_communities" href="/poisk_publ" ><?=$MESS['Communities'];?></a>
					</nobr>
				</td>
				
				<td id="support_link_td">
					<nobr>
						<a class="top_nav_link top_lnk" id="top_support_link" href="/help"><?=$MESS['Help'];?></a>
					</nobr>
				</td>
				<td id="logout_link_td">
					<nobr>
						<a class="top_nav_link " id="logout_link" href="/logout"><?=$MESS['Exit'];?></a>
					</nobr></td>    
			</tr>
		</tbody>
	</table>
  
  
		<div id="ts_wrap" class="clear_fix">
			<div id="ts_input_wrap" class="ts_input_wrap fl_r">
				<div class="ts">
					<div class="ts_input_wrap2">
						<div>
							<div class="input_back_wrap no_select">
							<div class="input_back" style="margin: 1px; padding: 4px 41px 5px 20px;">
								<div class="gp_input_back_content" style="width: 145px;"><?=$MESS['Search'];?></div>
							</div>
							</div>
							<input class="text" id="ts_input" autocomplete="off" type="text" style="padding: 4px 41px 5px 22px;">
						</div>
					</div>
				</div>
			</div> 
		</div>

	</div>
   </div>
  </div> 
 </div>    
 
 
 
 
<script>


				
</script>