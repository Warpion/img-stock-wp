$(document).ready(function(){
	var $container = $(".masonry-container");
		$container.imagesLoaded(function () {
			$container.masonry({
				columnWidth: ".item",
				itemSelector: ".item",
				isAnimated: false
		});
	});
    $(window).scroll(function(){
        var bottomOffset = 2000; 
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page
        };
        if( $(document).scrollTop() > ($(document).height() - bottomOffset) && !$('body').hasClass('loading')){
            $.ajax({
                url:ajaxurl,
                data:data,
                type:'POST',
                beforeSend: function( xhr){
                    $('body').addClass('loading');
                    $('.fa-cog').show();
                },
                success:function(data){
                    if( data ) { 
                        $('#load_more_gs').before(data);
                        $('body').removeClass('loading');
                        current_page++;
                    }
                    else {
                    $('#load_more_gs').remove();
                }
                }
            }); 
            
        }
    });
    $( document ).ajaxComplete(function() {
    	$container.masonry('reloadItems').masonry();
    	$('.fa-cog').fadeOut(300);
	});
	$('.bars-block').click(function(){
		$('.bars-block span').toggleClass('bars-active');
		$('.bars-block span:eq(0)').toggleClass('bar-1');
		$('.bars-block span:eq(1)').toggleClass('bar-2');
		$('.bars-block span:eq(2)').toggle();
		$(this).toggleClass('bars-block-fixed');
		$('.menu-col').toggleClass('show-menu');
        $('body').toggleClass('scroll-block');
	});
    $('.pic-full').click(function(){
        $('.full-img').css('display', 'flex');
        $('body').toggleClass("body-overflow");
    })

    $('.full-img').click(function(){
        $('.full-img').fadeOut();
        $('body').toggleClass("body-overflow");
    });
});