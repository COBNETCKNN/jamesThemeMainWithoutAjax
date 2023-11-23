(function($){

    $(document).ready(function(){
        $(document).on('click', '.cat-list_item', function(event){
            (event).preventDefault();

            var category = $(this).data('category');
            var categorySlug = $(this).data('slug');

            // changing URL based on the category slug
            window.history.pushState(null, null, categorySlug);

            $.ajax({
                url: wpAjax.ajaxUrl,
                data: { 
	                action: 'filtertermce', 
                    category: $(this).data('slug'),
	                },
                type: 'post',
                success: function(result){
                    $('#copywritingExamples_response').html(result);
                    $('.examplePosts_grid').masonry({
                        // options
                        itemSelector: '.grid-item',
                        columnWidth: 200
                      });
                },
                error: function(result){
                    console.warn(result);
                }
            });

        });
    });
})(jQuery);