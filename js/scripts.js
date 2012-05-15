$(document).ready(function() {
	$(".signin").click(function(e) {
    	e.preventDefault();
		$("fieldset#signin_menu").toggle();
		$(".signin").toggleClass("menu-open");
	});
	$("fieldset#signin_menu").mouseup(function() {
		return false
	});
	$(document).mouseup(function(e) {
		if($(e.target).parent("a.signin").length==0) {
			$(".signin").removeClass("menu-open");
			$("fieldset#signin_menu").hide();
		}
	});            
});

$(document).ready(function(){
	$(".username").click(function(e){
		e.preventDefault();
		$("#userMenu").toggle();
		$(".username").toggleClass("menu-open");
	});
	$("#userMenu").mouseup(function() {
		return false
	});
	$(document).mouseup(function(e){
		if($(e.target).parent("a.username").length==0){
			$(".username").removeClass("menu-open");
			$("#userMenu").hide();
		}
	});
});
