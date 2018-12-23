(function ($) {

    $(document).ready(function () {

    /* окрыть/закрыть меню в шапке */
    $(document).on('click touchend', '.header-burger .burger',  function () {
        var $t = $(this);
        var $hd = $('.header-content');
        var $im = $('.header-logo img');
        if (!$t.hasClass('close')) {
            $t.addClass('close');
            $hd.addClass('show').parent().addClass('show').parent().addClass('show');
            $('.menu-black').addClass('active');
			$img = $im.attr('src').replace('logo', 'logo-w');
			$im.attr('src', $img);
            $('.header-menu').show();
        } else {
            $t.removeClass('close');
            $hd.removeClass('show').parent().removeClass('show').parent().removeClass('show');
            $img = $im.attr('src').replace('logo-w', 'logo');
			$im.attr('src', $img);
            $('.menu-black').removeClass('active');
            $('.header-menu').hide();
        }
        return false;
    });

    /* фиксация шапки при скорлле на главной */
    $(function () {
    	if ($(window).width() > 767) { /*  если экран более 767  */
            if ($("body").is(".main")) {/* если у body есть класс main */
                $nav = $('header');
                $body = $('body');
                $window = $(window);
                $h = $nav.offset().top;
                $window.on('scroll', function() {
                    if ($window.scrollTop() > $h) {
                        $nav.addClass('fixed');
                        $body.removeClass('main');
                    } else {
                        $nav.removeClass('fixed');
                        $body.addClass('main');
                    }
                });
            }
        }
    });

    /* фиксация заголовка страниц */
    if ($('section').is('.manifest, .about, .lyceum')){
        function animate_title() {
                $nav = $('.title-page');
                $page = $('.page');
                $window = $(window);
                $page_menu = $('.page-menu');
                if ($('div').is('.related')){
                    $v1 = $('.related').offset().top - 400;
                } else {
                    $v1 = $('footer').offset().top - 200;
                    console.log(2)
                }
                $h = $nav.offset().top - 107 ;

                $window.on('scroll', function() {
                    if ($window.scrollTop() > $h) {
                        $nav.addClass('fixed-title');
                        $page.removeClass('for-title-fixed');
                        $page_menu.addClass('in-title');
                    } else {
                        $nav.removeClass('fixed-title');
                        $page.addClass('for-title-fixed');
                    }
                    if ($window.scrollTop()  > $v1 ) {
                        $nav.addClass('opt');
                    } else{
                        $nav.removeClass('opt');
                    }

                });
        }

        if ($(window).width() > 767) { /*  если экран более 767  */
            $(window).on(animate_title());
        } else{
            $(window).off(animate_title());
        }
		
    }

    /* фиксация левого блока при скорлле */
        if($("section").is(".manifest") || $("section").is(".about") || $("section").is(".lyceum")  ) {
            if ($(window).width() > 1200) {
                var $top = 240;
            } else {
                var $top = 240;
            }
        } else {
            var $top = 150;
        }

    /* положение при изменеии размеров */
        window.addEventListener("resize", function() { /* отслеживание изменения размера экрана */
            if($("section").is(".manifest") || $("section").is(".about") || $("section").is(".lyceum") ) {
                if ($(window).width() > 1200) {
                    var $top = 240;
                } else {
                    var $top = 240;
                }
            } else {
                var $top = 240;
            }
            /*console.log($top); */
            if($("div").is(".page-menu")) {
                if ($(window).width() > 767) { /*  если экран более 767  */
                    $(document.body).trigger("sticky_kit:recalc");
                    $('.page-menu').stick_in_parent({
                      parent: $(".page"), offset_top: $top,  recalc_every: 1
                    }).on("sticky_kit:stick", function(e) {
                      // Do something on stick
                    });
                }  else {
                    $('.page-menu').trigger("sticky_kit:detach");
                    $(document.body).trigger("sticky_kit:recalc");
                }
            }
        });


        if($("div").is(".page-menu")) {
            if ($(window).width() > 767) { /*  если экран более 767  true */
                $('.page-menu').stick_in_parent({
                    parent: $(".page"), offset_top: $top,  recalc_every: 1
                }).on("sticky_kit:stick", function(e) {
                    // Do something on stick
                    //console.log("has stuck!", e.target);
                }).on('sticky_kit:bottom', function(e) {
    				 $('.title-page').addClass('opt');
  				});
            } else {
                $('.page-menu').trigger("sticky_kit:detach");
            }
        }




        // as of 1.4.2 the mobile safari reports wrong values on offset()
        // http://dev.jquery.com/ticket/6446
        // remove once it's fixed
        if (/webkit.*mobile/i.test(navigator.userAgent)) {
          (function($) {
            $.fn.offsetOld = $.fn.offset;
            $.fn.offset = function() {
              var result = this.offsetOld();
              result.top -= window.scrollY;
              result.left -= window.scrollX;
              return result;
            };
          })(jQuery);
        }


    /* страница манифеста смена цвета при скролле */
    $(function () {
        if ($("div").is("#counterpoint")) {
            $window = $(window);
            var targetOffset = $('#counterpoint').offset().top - 107;
            $window.on('scroll', function() {
                if ($window.scrollTop() <= targetOffset) {
                    $('body').addClass('red');
                } else{
                    $('body').removeClass('red');
                }
            });
        }
    });

    /* страница об институте смена цвета при скролле */
    $(function () {
        if ($("div").is("#specifics")) {
            $window = $(window);
            var targetOffset2 = $('#specifics').offset().top - 107;
            $window.on('scroll', function() {
                if ($window.scrollTop() <= targetOffset2) {
                    $('body').addClass('blue');
                } else{
                    $('body').removeClass('blue');
                }
            });
        }
    });

    /* страница об лицея смена цвета при скролле */
    $(function () {
        if ($("div").is("#postup")) {
            var $window = $(window);
            $window.on('scroll', function() {
                var $wndwTop = $(this).scrollTop();
                var $targetOffset2 = $('#purpure-none').offset().top - 107;

                if ($wndwTop <= $targetOffset2) {
                    $('body').addClass('purple');
                } else{
                    $('body').removeClass('purple');
                }
            });
        }
    });


    /* навигация в манифесте */
    $('.map-r').on('click touchend', function() {
        $('.page-menu ul li a').removeClass('active')
        $(this).addClass('active');
         var targetOffset = $('#map').offset().top - 125;
        $($("html,body").animate({scrollTop: targetOffset}, 900));
        return false;
	});

    $('.postup-r').on('click touchend', function() {
        $('.page-menu ul li a').removeClass('active')
        $(this).addClass('active');
         var targetOffset = $('#postup').offset().top - 125;
        $($("html,body").animate({scrollTop: targetOffset}, 900));
        return false;
	});

    $('.counterpoint-r').on('click touchend', function() {
        $('.page-menu ul li a').removeClass('active')
        $(this).addClass('active');
        if ($(window).width() > 767) {  /*  если экран более 767  true */
            var targetOffset = $('#counterpoint').offset().top - 107;
        } else {
            var targetOffset = $('#counterpoint').offset().top - 10;
        }

        $($("html,body").animate({scrollTop: targetOffset}, 900));
        return false;
	});

    $('.skill-r').on('click touchend', function() {
        $('.page-menu ul li a').removeClass('active')
        $(this).addClass('active');
        if ($(window).width() > 767) {  /*  если экран более 767  true */
            var targetOffset = $('#skill').offset().top - 107;
        } else {
             var targetOffset = $('#skill').offset().top - 10;
        }
        $($("html,body").animate({scrollTop: targetOffset}, 900));
        return false;
	});

    $('.idea-r').on('click touchend', function() {
        $('.page-menu ul li a').removeClass('active')
        $(this).addClass('active');
        if ($(window).width() > 767) {  /*  если экран более 767  true */
            var targetOffset = $('#idea').offset().top - 107;
        } else {
            var targetOffset = $('#idea').offset().top - 10;
        }
        $($("html,body").animate({scrollTop: targetOffset}, 900));
        return false;
	});

    $('.sight-r').on('click touchend', function() {
        $('.page-menu ul li a').removeClass('active')
        $(this).addClass('active');
        if ($(window).width() > 767) {  /*  если экран более 767  true */
            var targetOffset = $('#sight').offset().top - 107;
        } else {
            var targetOffset = $('#sight').offset().top - 10;
        }
        $($("html,body").animate({scrollTop: targetOffset}, 900));
        return false;
	});


    /* навигация в об институте */
    $('.target-r').on('click touchend', function() {
        $('.page-menu ul li a').removeClass('active')
        $(this).addClass('active');
        if ($(window).width() > 767) {  /*  если экран более 767  true */
            var targetOffset = $('#target').offset().top - 125;
        } else {
            var targetOffset = $('#target').offset().top - 10;
        }
        $($("html,body").animate({scrollTop: targetOffset}, 900));
        return false;
	});

    $('.specifics-r').on('click touchend', function() {
        $('.page-menu ul li a').removeClass('active')
        $(this).addClass('active');
        if ($(window).width() > 767) {  /*  если экран более 767  true */
            var targetOffset = $('#specifics').offset().top - 125;
        } else {
            var targetOffset = $('#specifics').offset().top - 10;
        }
        $($("html,body").animate({scrollTop: targetOffset}, 900));
        return false;
	});

    $('.projekt-r').on('click touchend', function() {
        $('.page-menu ul li a').removeClass('active')
        $(this).addClass('active');
        if ($(window).width() > 767) {  /*  если экран более 767  true */
            var targetOffset = $('#projekt').offset().top - 125;
        } else {
            var targetOffset = $('#projekt').offset().top - 10;
        }
        $($("html,body").animate({scrollTop: targetOffset}, 900));
        return false;
	});

    $('.class-r').on('click touchend', function() {
        $('.page-menu ul li a').removeClass('active')
        $(this).addClass('active');
        if ($(window).width() > 767) {  /*  если экран более 767  true */
            var targetOffset = $('#class').offset().top - 125;
        } else {
            var targetOffset = $('#class').offset().top - 10;
        }
        $($("html,body").animate({scrollTop: targetOffset}, 900));
        return false;
	});





    /* модальное окно */
    $(document).on('click touchend', '.masters-name, .masters-photo', function() {
        var target_id = $(this).attr('data-id');
        $('.modal[data-modal=' + target_id + ']').show();
        $('body, html').addClass('hidden');
        return false;
    });

    $(document).on('click touchend', function(e) {
        //console.log(e.target);
        if (!($(e.target).parents('.masters-details').length) || !($(e.target).hasClass('masters-details')) && (($(e.target).hasClass('close'))) )   {
            $('.modal').hide();
            $('body, html').removeClass('hidden');

        }
    });


    /* модальное окно  соц сети */
    $(document).on('click touchend', '.header-social a', function() {
        $('.social-modal').show();
        $('body, html').addClass('hidden');
        return false;
    });

    $(document).on('click touchend', '.social-con .close', function() {
        $('.social-modal').hide();
        $('body, html').removeClass('hidden');
        return false;
    });






    if ($('section').is('.manifest, .about, .lyceum')){
        window.addEventListener("resize", function() { /* отслеживание изменения размера экрана */
            if ($(window).width() > 767) { /*  если экран более 767  */
                $(window).on(animate_title());
            } else{
                $(window).off(animate_title());
            }
        });
    }

		
		
		
});	
})(jQuery);
