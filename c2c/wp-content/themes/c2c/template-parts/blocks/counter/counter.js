jQuery(document).ready(function () {
  jQuery(document).on('scroll', function () {
    if (jQuery(this).scrollTop() >= jQuery('.counter').position().top - 700) {
      jQuery(document).unbind('scroll');
        jQuery('.value').each(function () {
          var $valueString = jQuery(this).text();
          var $value = parseFloat($valueString);
          jQuery(this).prop('Counter', 0).animate({
            Counter: jQuery(this).data('value')
          }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
              if(Number.isInteger($value)){
                jQuery(this).text(Math.ceil(now));
              }else{
                jQuery(this).text(this.Counter.toFixed(1));
              }
            }
          });
        });
    }
  });
});