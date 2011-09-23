$(document).ready(function(){

	$("header").slideDown(500,function(e){
	
		setTimeout(function(){
			$("section").slideDown(500);
		},1500);
	
		setTimeout(function(){
			$("section").first().next().slideDown(400);
		},1000);
	
		setTimeout(function(){
			$("footer").slideDown(500);
		},505);

	});
	
});