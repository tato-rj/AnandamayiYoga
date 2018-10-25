$(document).ready(function() {
  // May need this
});

if ($('#scroll-mark').length > 0) {
  var $whiteLogo = $('.navbar-brand img:first');
  var $blueLogo = $('.navbar-brand img:last');
  var $navbar = $('.navbar');
  var $title = $('#brand-name');
  var $bell = $('.navbar .fa-bell');
  var $navHeight = $navbar.outerHeight();
  var $scrollMark = $('#scroll-mark').offset().top;
  var $limit = $scrollMark - $navHeight;
  var $itemsToShow = $('.show-on-scroll');
  var $cookieAlert = $('#cookie-alert');

  $(window).scroll(function() {
    var $scrollTop = $(this).scrollTop();

    if ($scrollTop > $limit){
      $navbar.addClass('navbar-light bg-light shadow p-2 px-4').removeClass('p-4');
      $title.addClass('text-muted').removeClass('text-white ml-2').css('transform', 'scale(0.9)').find('span').addClass('text-lightgrey');
      $bell.addClass('text-muted').removeClass('text-white');
      $whiteLogo.hide();
      $blueLogo.show();
      $itemsToShow.fadeIn();
      
      if (! getCookie('cookie_consent'))
        $cookieAlert.show();
      
    } else {
      $navbar.removeClass('navbar-light bg-light shadow p-2 px-4').addClass('p-4');
      $title.removeClass('text-muted').addClass('text-white ml-2').css('transform', 'scale(1)').find('span').removeClass('text-lightgrey');
      $bell.removeClass('text-muted').addClass('text-white');
      $whiteLogo.show();
      $blueLogo.hide();
      $itemsToShow.fadeOut();
      $('#help-button .animated').fadeOut();
    }
  });
}
