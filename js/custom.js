/*jQuery(document).ready(function(){
    resizeMenu();
});

jQuery(window).resize(function(){
    resizeMenu();
});

function resizeMenu(){
    jQuery('.nav-links li').each(function(){
        jQuery(this).css('width', (jQuery(".nav").outerWidth()/jQuery('.nav-links li').length) -1);
    });
}*/

jQuery(window).scroll(function() {
    if ($(this).scrollTop() > 1){
        $('.nav').addClass("sticky");
    }
    else{
        $('.nav').removeClass("sticky");
    }
});