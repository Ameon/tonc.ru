$(function(){
	
	$('#search_input').focus();
	
	$(document).bind("submit", "#send_poisk", function(e){
		e.preventDefault();
	})
	
});