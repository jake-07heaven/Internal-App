$(document).ready(function(){
    $(window).scroll(function(){
        var value = $(window).scrollTop();
        value = value + 0;
        $(".content").css("top", value);
        
        value = value + 250;
        $(".button").css("top", value);
    });
});