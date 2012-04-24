$(document).ready(function(){
	$("#lnkLogin").click(function(){
		
		console.log("Start to slide");
		$("#userNav").slideToggle(function(){
			console.log("Slide complete");
		});
		
		return (false);
		
	});	
});
