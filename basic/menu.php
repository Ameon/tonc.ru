
<?
$userid = $_SESSION['user_id'];

?>
<div id="side_bar" class="fl_l">
		<ol class="">
			<li>
				<table id="myprofile_table" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td id="myprofile_wrap">
								<a href="/id<?=$userid;?>" id="myprofile" class="mn_lnk left_row">
								<span class="left_label inl_bl"><?=$MESS['Menu_my_profile'];?></span></a>
							</td>
							<td id="myprofile_edit_wrap">
								<a href="/edit" id="myprofile_edit" class="left_row">
								<span class="left_label inl_bl"><?=$MESS['Menu_edit'];?></span></a>
							</td>
						</tr>
		  
					</tbody>
		  
				</table>
			</li>
			<li id="l_fr" class=" friends">
				<a href="/feed"  class="mn_lnk left_row">
					<span class="left_count_wrap left_void fl_r" style="opacity: 1; display: block;">
					<span class="inl_bl left_count">+</span></span>
					<span class="left_label inl_bl"><?=$MESS['Menu_news'];?></span>
				</a>
			</li>
			<li id="l_fr" class=" friends">
				<a href="/friends"  class="mn_lnk left_row">
					<span class="left_count_wrap left_void fl_r" style="opacity: 1; display: block;">
					<span class="inl_bl left_count">+</span></span>
					<span class="left_label inl_bl"><?=$MESS['Menu_friends'];?></span>
				</a>
			</li>
			<li id="l_ph" class=" photos">
				<a href="/am" class="mn_lnk left_row">
					<span class="left_count_wrap left_void fl_r" style="opacity: 1; display: block;">
					<span class="inl_bl left_count">+</span></span>
					<span class="left_label inl_bl"><?=$MESS['Menu_photos'];?></span>
				</a>
			</li>
			<li class=" video">
				<a href="/video" class="mn_lnk left_row">
					<span class="left_count_wrap left_void fl_r">
					<span class="inl_bl left_count">+</span></span>
					<span class="left_label inl_bl"><?=$MESS['Menu_videos'];?></span>
				</a>
			</li>
			<li class=" audios">
				<a href="/audio" class="mn_lnk left_row">
					<span class="left_count_wrap left_void fl_r">
					<span class="inl_bl left_count">+</span></span>
					<span class="left_label inl_bl"><?=$MESS['Menu_audios'];?></span>
				</a>
			</li>
			<li id="l_msg" class="im">
				<a href="/mail" class="mn_lnk left_row">
					<span class="left_count_wrap left_void fl_r" style="opacity: 1; display: block;">
					<span class="inl_bl left_count">+</span></span>
					<span class="left_label inl_bl"><?=$MESS['Menu_messages'];?></span>
				</a>
			</li>
			<li id="l_msg" class=" im">
				<a href="/groups" class="mn_lnk left_row">
					<span class="left_count_wrap left_void fl_r" style="opacity: 1; display: block;">
					<span class="inl_bl left_count">+</span></span>
					<span class="left_label inl_bl"><?=$MESS['Menu_groups'];?></span>
				</a>
			</li>
			<li class=" fave">
				<a href="/fave" class="mn_lnk left_row">
					<span class="left_count_wrap left_void fl_r">
						<span class="inl_bl left_count">+</span>
					</span>
					<span class="left_label inl_bl"><?=$MESS['Menu_faves'];?></span>
				</a>
			</li>
			<li id="l_set" class=" settings">
			<a href="/priv" class="mn_lnk left_row">
				<span class="left_count_wrap left_void fl_r">
				<span class="inl_bl left_count">+</span></span>
				<span class="left_label inl_bl"><?=$MESS['Menu_settings'];?></span></a>
			</li>
			<li class="more_div"></li>
			<li class=" docs">
				<a href="/docs" class="mn_lnk left_row">
					<span class="left_count_wrap left_void fl_r">
						<span class="inl_bl left_count">+</span>
					</span><span class="left_label inl_bl"><?=$MESS['Menu_documents'];?></span>
				</a>
			</li>
			<li class="more_div"></li>
			<li id="l_spr" class=" support">
				<a href="/apps" class="mn_lnk left_row">
					<span class="left_count_wrap left_void fl_r">
						<span class="inl_bl left_count">+</span>
					</span>
					<span class="left_label inl_bl"><?=$MESS['Menu_apps'];?></span>
				</a>
			</li>
			<li id="l_spr" class=" support">
				<a href="/support" class="mn_lnk left_row">
					<span class="left_count_wrap left_void fl_r">
						<span class="inl_bl left_count">+</span>
					</span>
					<span class="left_label inl_bl"><?=$MESS['Menu_support'];?></span>
				</a>
			</li>
		</ol>
		<div id="left_blocks"></div>
		<div id="left_ads" style="overflow: visible;">
			<div style="display: block; position: static; left: 0px; top: 0px; opacity: 0;"></div>
		</div>    
	</div>