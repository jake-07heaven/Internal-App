$(document).ready(function(){
        $(window).resize(function(){
                    var body = $('body').height();
                    var content = $(".st-content-inner").height();
                    content = content + 155;
                    if (content > body)
                    {
                        $(".st-content").css("min-height", content);
                    }
                    else {
                         $(".st-content").css("min-height", body);
                    }
                   
                  
            });

        $(window).resize();
    });