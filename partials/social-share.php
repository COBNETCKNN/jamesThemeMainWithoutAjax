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
    <div class="share-social__title text-center font-normal text-sm text-avenir uppercase font-avenir">Click icon to share</div>
    <div class="share-social_wrapper flex justify-center mt-5 md:mt-0">
        <!-- Facebook sharing icon -->
        <a type="button" href="<?php echo $facebookUrl; ?>" target="_blank" class="modalContent_sociaMedia modalContent_sociaMedia__facebook mx-3"></a>
        <!-- Twitter sharing icon -->
        <a href="<?php echo $twitterUrl; ?>" target="_blank" class="modalContent_sociaMedia modalContent_sociaMedia__twitter mx-3"></a>
        <!-- Linkedin sharing icon -->
        <a href="<?php echo $linkedInUrl; ?>" target="_blank" class="modalContent_sociaMedia modalContent_sociaMedia__linkedin mx-3"></a>
    </div>

    <div class="line hidden md:block"></div>
    </div>