<?php     
    $url = urlencode(get_permalink());
    $title = get_the_title();
    $siteName = get_bloginfo('name');

    $facebookUrl = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
    $twitterUrl = 'http://twitter.com/intent/tweet?text=Currently reading &lt;'.$title.'&gt;&amp;url=&lt;'.$url.'?&gt;';
    $linkedInUrl = 'http://www.linkedin.com/shareArticle?mini=true&amp;url=&lt;'.$url.'&gt;&amp;title=&lt;'.$title.'&gt;&amp;summary=&amp;source=&lt;'.$siteName.'?&gt;';

?>

    <div class="share-social block md:flex justify-center items-center text-2xl pb-10 px-10 md:px-20">
    <div class="line hidden md:block"></div>
    <div class="share-social__title text-center font-semibold text-sm text-avenir uppercase font-avenir">Click icon to share</div>
    <div class="share-social_wrapper flex justify-center mt-5 md:mt-0">
        <div class="modalContent_sociaMedia__wrapper mx-3">
            <a href="<?php echo $facebookUrl; ?>" target="_blank">
                <i class="fa-brands fa-square-facebook modalContent_socialShare__icon"></i>
            </a>
        </div>
        <div class="modalContent_sociaMedia__wrapper mx-3">
            <a href="<?php echo $twitterUrl; ?>" target="_blank">
                <i class="fa-brands fa-x-twitter modalContent_socialShare__icon"></i>
            </a>
        </div>
        <div class="modalContent_sociaMedia__wrapper mx-3">
            <a href="<?php echo $linkedInUrl; ?>" target="_blank">
                <i class="fa-brands fa-linkedin modalContent_socialShare__icon"></i>
            </a>
        </div>
    </div>

    <div class="line hidden md:block"></div>
    </div>