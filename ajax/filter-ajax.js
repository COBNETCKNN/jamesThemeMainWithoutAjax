(function($){

    $(document).ready(function(){
        $(document).on('click', '.js-filter-item', function(event){
            (event).preventDefault();
            
            var category = $(this).data('category');
            var taxonomy = $(this).data('posttype');
            var categorySlug = $(this).data('slug');

            $.ajax({
                url: wpAjax.ajaxUrl,
                data: { 
	                action: 'filterterm', 
	                category: category, 
	                taxonomy:  $(this).data('taxonomy'),
	                posttype:  $(this).data('posttype')
	                },
                type: 'post',
                success: function(result){
                    $('#response').html(result);
                    // changing URL based on the category slug
                    window.history.pushState(null, null, '/' + taxonomy + '/' + categorySlug + '/');

                },
                error: function(result){
                    console.warn(result);
                }
            });
        });
    });
})(jQuery);