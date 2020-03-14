$(document).ready(function(){

	$(function ($) {
		$(".sidebar-dropdown > a").click(function() {
			$(".sidebar-submenu").slideUp(200);

		  	if ($(this).parent().hasClass("active")) {
				$(".sidebar-dropdown").removeClass("active");
				$(this).parent().removeClass("active");
		  	} 
		 	else {
				$(".sidebar-dropdown").removeClass("active");
				$(this).next(".sidebar-submenu").slideDown(200);
				$(this).parent().addClass("active");
		 	}
		});

	});

});


	$("#sidebar").mouseenter(function(){
		if($("#sidebar").hasClass("on")){
		sidebarOpen();
		}
	});
	$("#sidebar").mouseleave(function(){
		if($("#sidebar").hasClass("on")){
		sidebarClose();
		}
	});

			



	

function sidebarOpen(){
	$("#sidebar").stop().animate({
		width:'250px'		
	});
	$(".sidebar-head").stop().animate({
			width:'250px'		
	});
	$("#page-content").stop().animate({
		
		'margin-left':'250px'			
	});
}
function sidebarClose(){
	
	$("#sidebar").stop().animate({
			width:'50px'		
	});
	$(".sidebar-head").stop().animate({
			width:'50px'		
	});
	$("#page-content").stop().animate({
		
		'margin-left':'50px'			
	});
	
		

}
function sidebarToggle(){
$("#sidebar").toggleClass("on");
		if($("#sidebar").hasClass("on")){
			sidebarClose();
		}
		else{
			sidebarOpen();
		}
	
}
