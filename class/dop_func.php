<script>

$(function(){
	
	if($("#public").length>0) {	
		gr_startPost();
	}		
	else{
		gr_endPost();
	}
	
	if($("#profile").length>0){
		pr_startPost();
	}else{
		pr_endPost();
	}
	
	
});

autosize(document.querySelectorAll('textarea'));
	
	
</script>