$(function() {
    var pgurl = window.location.href;
        $("ul li a").each(function(){
        if(pgurl.indexOf($(this).attr("href"))>-1)
            $(this).addClass("active");
        })
});