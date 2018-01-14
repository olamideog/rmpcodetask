$(document).ready(function($){
	var clicked = false;
	$(".checkall").on("click", function() {
		$(".student").prop("checked", !clicked);
  		clicked = !clicked;
	});
});