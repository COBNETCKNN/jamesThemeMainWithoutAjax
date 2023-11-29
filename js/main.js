jQuery(document).ready(function (jQuery) {
  jQuery('#modal').modal().on('shown', function () {
    jQuery('body').css('overflow', 'hidden');
    jQuery('.modalRedirect').addClass('visible');
  }).on('hidden', function () {
    jQuery('body').css('overflow', 'auto');
    jQuery('.modalRedirect').removeClass('visible');
  });
  jQuery('.examplePosts_grid').masonry({
    // options
    itemSelector: '.imageContent',
    columnWidth: 50,
    isResizable: true
  });
  jQuery('.modal_wrapper').click(function () {
    jQuery('#modal').removeClass('modal');
    jQuery('body').css('overflow', 'auto');
    jQuery('.modal_wrapper').addClass('modal_wrapper__hide');
  });
  jQuery(document).click(function (event) {
    var url = '<?php echo home_url(); ?>';
    //if you click on anything except the modal itself or the "open modal" link, close the modal
    if (!jQuery(event.target).closest(".singleModal").length) {
      jQuery("body").find(".singleModal").removeClass("visible");
      jQuery(".modalRedirect_close__button").find(".singleModal").removeClass("visible");
    }
  });

  /* Newsletter modal */
  jQuery(".newsletterModal_open").click(function () {
    jQuery(".newsletterModal").addClass("visible");
    jQuery(".categoriesSidebar_filter__popup").addClass("nonvisible");
    jQuery(".categoriesSidebar_conversion__popup").addClass("nonvisible");
    jQuery('body').css('overflow', 'hidden');
  });
  jQuery(".newsletterModal_close").click(function () {
    jQuery(".newsletterModal").removeClass("visible");
    jQuery('body').css('overflow', 'auto');
  });

  // hamburger menu for mobile
  (function (event) {
    jQuery('.hamburger-wrapper').on('click', function () {
      jQuery('.hamburger-menu').toggleClass('animate');
      jQuery('.mobile-menu-overlay').toggleClass('visible');
      jQuery('.blogPostsWrapper').addClass('nonvisible');
      jQuery('.hamburger-wrapper').addClass('nonvisible');
      jQuery('.copywritingExamplesAjax-posts').addClass('nonvisible');
    });
    jQuery('.mobile-menu-overlay > ul > li > a').on('click', function () {
      jQuery('.hamburger-menu').removeClass('animate');
      jQuery('.mobile-menu-overlay').removeClass('visible');
      jQuery('.blogPostsWrapper').removeClass('nonvisible');
      jQuery('.hamburger-wrapper').removeClass('nonvisible');
    });
    jQuery('.closeHamburger').on('click', function () {
      jQuery('.hamburger-menu').removeClass('animate');
      jQuery('.mobile-menu-overlay').removeClass('visible');
      jQuery('.blogPostsWrapper').removeClass('nonvisible');
      jQuery('.hamburger-wrapper').removeClass('nonvisible');
      jQuery('.copywritingExamplesAjax-posts').removeClass('nonvisible');
    });
    jQuery('.categories_icon').on('click', function () {
      jQuery('.mobileCategories_wrapper').toggleClass('visible');
      jQuery('.examplesMobileCategories_wrapper').toggleClass('visible');
      jQuery('body').css('overflow', 'hidden');
    });
    jQuery('.close_mobileCategories__wrapper').on('click', function () {
      jQuery('.mobileCategories_wrapper').removeClass('visible');
      jQuery('.examplesMobileCategories_wrapper').removeClass('visible');
      jQuery('body').css('overflow', 'auto');
    });
    jQuery('.modalPost_close').on('click', function () {
      jQuery('#modal').hide();
      jQuery('body').css('overflow', 'auto');
      jQuery('.modalRedirect').removeClass('visible');
    });
    jQuery('.js-filter-item').on('click', function () {
      jQuery('.mobileCategories_wrapper').removeClass('visible');
      jQuery('body').css('overflow', 'auto');
    });
    jQuery('.cat-list_item').on('click', function () {
      jQuery('.examplesMobileCategories_wrapper').removeClass('visible');
      jQuery('body').css('overflow', 'auto');
    });
    jQuery('.view-post').on('click', function () {
      jQuery('.modalRedirect_close__button').addClass('visible');
    });
    jQuery('.modalRedirect').on('click', function () {
      jQuery('.modalRedirect_close__button').removeClass('visible');
    });
    jQuery('.modalRedirect_close__button').on('click', function () {
      jQuery('.modalRedirect_close__button').removeClass('visible');
    });
  })();

  // new sidebar
  jQuery(".categoriesSidebar_filter__button").click(function () {
    jQuery(".categoriesSidebar_filter__popup").removeClass("nonvisible");
    jQuery(".categoriesSidebar_conversion__popup").addClass("nonvisible");
    jQuery(".newsletterModal").removeClass("visible");
    jQuery(".categoriesSidebar_overlay").removeClass("nonvisible");
    jQuery('body').css('overflow', 'hidden');
  });
  jQuery(".categoriesSidebar_overlay").click(function () {
    jQuery(".categoriesSidebar_filter__popup").addClass("nonvisible");
    jQuery(".categoriesSidebar_overlay").addClass("nonvisible");
    jQuery('body').css('overflow', 'auto');
  });
  jQuery(".categoriesSidebar_conversion__button").click(function () {
    jQuery(".categoriesSidebar_conversion__popup").removeClass("nonvisible");
    jQuery(".newsletterModal").removeClass("visible");
    jQuery(".categoriesSidebar_filter__popup").addClass("nonvisible");
    jQuery(".categoriesSidebar_overlay").removeClass("nonvisible");
    jQuery('body').css('overflow', 'hidden');
  });
  jQuery(".categoriesSidebar_overlay").click(function () {
    jQuery(".categoriesSidebar_conversion__popup").addClass("nonvisible");
    jQuery(".categoriesSidebar_overlay").addClass("nonvisible");
    jQuery('body').css('overflow', 'auto');
  });
  jQuery(".categories_icon").click(function () {
    jQuery(".modalRedirect").addClass("nonvisible");
    jQuery('body').css('overflow', 'auto');
  });
});
function goBack() {
  window.history.back();
}
