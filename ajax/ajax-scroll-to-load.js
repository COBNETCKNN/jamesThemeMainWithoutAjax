jQuery(document).ready(function($) {

    var ppp = 6; // Post per page
    var pageNumber = 1;
    
    
    function load_posts(){
        pageNumber++;
        var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: str,
            success: function(data){
                var $data = $(data);
                if($data.length){
                    $(".ajax-posts").append($data);
                    $("#more_posts").attr("disabled",false); // Uncomment this if you want to disable the button once all posts are loaded
                    //$("#more_posts").hide(); // This will hide the button once all posts have been loaded
                } else{
                    $("#more_posts").attr("disabled",true);
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
    
        });
        return false;
    }
    
    $(window).on('scroll', function () {
        console.log($(window).scrollTop() + $(window).height());
        console.log($(document).height() - 0);
        if ($(window).scrollTop() + $(window).height()  >= $(document).height() - 0) {
            load_posts();        
        }
    });

});