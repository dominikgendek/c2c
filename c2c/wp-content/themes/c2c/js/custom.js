jQuery("#navbar-toggler").click(function () {
    jQuery(".menu-menu-1-container").slideToggle();
});

jQuery(".menu a").click(function () {
    var item = jQuery(jQuery(this).attr("href"));
    jQuery('html, body').animate({
        scrollTop: item.offset().top - 100
    }, 'slow');
    jQuery(".menu-menu-1-container").slideToggle();
});
