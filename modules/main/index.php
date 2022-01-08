<?if(!defined(D_PROTECT)){header("HTTP/1.1 403 Forbidden");header("Location: http://" . $_SERVER['HTTP_HOST'], TRUE, 403);die();}
?>
<?if(session_id() == '') {session_start();}?>
<div id="search-box">
				<div style="height:85px;box-shadow: 0 1px rgba(0,0,0,.1);">
					<div class="search-l" id="header_search" style="margin:0 auto;">
						<div>
							<form action="/poisk/" method="get" id="send_poisk">
								<div class="input-group">
									<input id="search_input" class="search" type="search"  name="srchpat[0]" value="а" autocomplete="off" placeholder="Умный поиск">
									<span class="input-group-btn">
										<button id="search_btn">Найти</button>
									</span>
								</div>
							</form>
						</div>
						
						
					</div>
					<div id="header_services">
							<div style='display: inline-block;'>Поиск</div>
							<div style='display: inline-block;'>Картинки</div>
							<div style='display: inline-block;'>Видео</div>
					</div>
				</div>
				
				
				<div id="search-result" class="search-r">
					<?
						$sql = "SELECT * FROM sites";
						$res = $this->db->query($sql);
						
						$i = 0;
						foreach($res as $row):?>
							<?$i++;?>
							<div class='s'>
								<div style='position:absolute;left:-45px'><?=$i;?>.</div>
								<div class="favicon" style='top:10px;position:absolute;left:-25px;top:2px;'>
									<div class="favicon_icon" data-rcid="81" style="
									background-position:0 0px;
									background-image:url(https://picht.ru/img/osn_logo.png);"></div>
								</div>
								<div>
									<a target="_blank" href="<?=$row['link'];?>"><?=$row['title'];?></a>
								</div>
								<span class="url"><?=$row['link'];?></span>
								<div style="">EXDU – сайт новых возможностей, постоянное стремление к лучшему Только тебе решать что тебе нужно!</div>
							</div>
									
					
					<? endforeach;?>
					

				</div>
				
			</div>
