$(document).ready(function(){
    $(window).scroll(function(){
        console.log($(window).scrollTop());
        var value = $(window).scrollTop();
        value = value + 10;
        $(".content").css("top", value);
    })
})