
<head>
	<? require_once('tmpl/osn/head.php'); ?>
</head>
<body style='width:100%;
		margin:0;
		padding:0;
		font-family: Open Sans, sans-serif;
		font-size: 11px;
'>

<div id='list' style='width:791px;margin:0 auto;min-height:200px;'>

<!-- Начало шапки -->
<? require_once('tmpl/osn/cap.php'); ?>
<!-- Конец шапки -->

<div style='position:fixed;top:0px;outline:0px solid green;width:136px;top:46px;padding:0;padding: 4px 0 10px 4px' id='menu'> 

<? require_once('tmpl/osn/menu.php'); ?>



</div>
			
			
<div style='float: right;
    font-size: 11px;
    margin-left: 0px;
    margin-right: 15px;
    text-align: left;
    width: 632px;
    margin-top: 45px;
	border: solid #D9E0E7;
    border-width: 0px 1px 1px;
	' id='cont'>
			
<? require_once('cnt/mail_cnt.php');?>
</div> 

</div>

</body>