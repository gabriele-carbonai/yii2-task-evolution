$(document).ready(function() {	    
    $("#menu li a").click(function(e){
	    if( !$(this).parent().hasClass('active') ){
	    	$('#menu li.active').removeClass('active');
	    	$('.task-wrapper').removeClass('task-open');
	    }
	    
	    if( $('.task-menu').hasClass('task-menu-open') ){
			if( $(this).parent().hasClass('active') ){
			 // Closing panel
				closingPanel();
				return false;
        	}
        	
        	$('.task-panel').find( '#'+$(this).attr('id') ).addClass('task-open');
        	
		}else{
			// Open panel
			openPanel();
			
			$('.task-panel').find( '#'+$(this).attr('id') ).addClass('task-open');
		}
		
	   $(this).parent().toggleClass('active');
        
       
    })
    
    $("#task-close").click(function(e){
	    closingPanel();
	})
});

function closingPanel(){
	$('.task-menu').removeClass('task-menu-open').addClass('toggled-2');
	$('.task-menu').stop().animate({
	 	left: '0'
	}, 250, 'linear', function() {});
	$('.task-panel').stop().animate({
		left: '-=50%'
	}, 940, 'linear', function() {});
}

function openPanel(){
	$('.task-menu').addClass('task-menu-open').removeClass('toggled-2');
			
	$('.task-menu').stop().animate({
	 	left: '+=50%'
	}, 400, 'linear', function() {});
	$('.task-panel').stop().animate({
		left: '+=50%'
	}, 900, 'linear', function() {});
}