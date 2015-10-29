	<!DOCTYPE html>
<html>
	<head>
		<title>Skinnygirl Coffee and Teas</title>
		<link rel="stylesheet" href="/wp-content/themes/skinnygirl/style.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Archer A.css">
		<link rel="shortcut icon" href="../../../../favicon.ico" />
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="/wp-content/themes/skinnygirl/jquery.cookie.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
	
	<!--ShareThis-->
	<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "5eb19ab6-d271-4b96-a7cc-6da9b827c1d2", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    <!--End Share This-->
    </head>
<body>
<script>
	function setCookie(name, value, options) {
	  options = options || {};

	  var expires = options.expires;

	  if (typeof expires == "number" && expires) {
	    var d = new Date();
	    d.setTime(d.getTime() + expires * 1000);
	    expires = options.expires = d;
	  }
	  if (expires && expires.toUTCString) {
	    options.expires = expires.toUTCString();
	  }

	  value = encodeURIComponent(value);

	  var updatedCookie = name + "=" + value;

	  for (var propName in options) {
	    updatedCookie += "; " + propName;
	    var propValue = options[propName];
	    if (propValue !== true) {
	      updatedCookie += "=" + propValue;
	    }
	  }

	  document.cookie = updatedCookie;
	}

	function getCookie(name) {
	  var matches = document.cookie.match(new RegExp(
	    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	  ));
	  return matches ? decodeURIComponent(matches[1]) : undefined;
	}

	var recalcMenuHeight = function() {
		$('#menu-wrapper .sliding-menu').height($(window).height() + 50);
	}

	var mobile = false;
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		mobile = true;
	}

	var oldOrientation = 0;

	$(function() {
		if (typeof window.orientation != 'undefined') {
			oldOrientation = window.orientation;
		}

		$(window).on('resize', function() {
			// recalcMenuHeight();

			setTimeout(function(){
				if (mobile && typeof window.orientation != 'undefined' && oldOrientation != window.orientation) {
					window.location.reload();
				}
			}, 1);
		});

		fb = $('li.facebook a').attr('href');
		tw = $('li.twitter a').attr('href');
		pt = $('li.pinterest a').attr('href');
		bt = $('li.Bethenny a').attr('href');
		ig = $('li.instagram a').attr('href');

		l1 = $('li.sect1 a');
		l2 = $('li.sect2 a');
		l3 = $('li.sect3 a');

		$('li.facebook').remove();
		$('li.twitter').remove();
		$('li.pinterest').remove();
		$('li.Bethenny').remove();
		$('li.instagram').remove();
		$('li.sect1').remove();
		$('li.sect2').remove();
		$('li.sect3').remove();

		$('a#fb').attr('href', fb);
		$('a#fb').attr('target', "_blank");
		$('a#tw').attr('href', tw);
		$('a#tw').attr('target', "_blank");
		$('a#pt').attr('href', pt);
		$('a#pt').attr('target', "_blank");
		$('a#bt').attr('href', bt);
		$('a#bt').attr('target', "_blank");
		$('a#ig').attr('href', ig);
		$('a#ig').attr('target', "_blank");

		usa = $('li.usa a').attr('href');
		canada = $('li.canada a').attr('href');
		$('li.usa').remove();
		$('li.canada').remove();
		$('div.items li a').unwrap();

		$('<div class="clearfix"></div>').appendTo('#menu div.items');

		div = $('<div class="items dropdown stores"></div>');
		$(div).appendTo('div#menu');
		$(div).append('<a href="/redirect/?link=' + usa +'" target="_blank">USA</a>');
		$(div).append('<a href="/redirect/?link=' + canada +'" target="_blank">Canada</a>');
		$(div).append('<a href="/retailer">Find a retailer</a>');

		// div = $('<div class="items dropdown home"></div>');
		// $(div).appendTo('div#menu');
		
		div = $('<div class="items dropdown products"></div>');
		$(div).appendTo('div#menu');
		// if($(window).width() < 1000)
		// 	$(div).append('<a href="/products">Products</a>');
		// $(div).append('<a href="/#teas">Teas</a>');
		// $(div).append('<a href="/#coffee">Coffee</a>');
		// $(div).append('<a href="/#indulgence">Indulgent</a>');
		$(div).append($(l1));
		$(div).append($(l2));
		$(div).append($(l3));

		$(l1).click(function(e) {
			$('html, body').animate({
	            scrollTop: $('#sect1').offset().top + 'px'
	        }, 'fast');
		});
		$(l2).click(function(e) {
			$('html, body').animate({
	            scrollTop: $('#sect2').offset().top + 'px'
	        }, 'fast');
		});
		$(l3).click(function(e) {
			$('html, body').animate({
	            scrollTop: $('#sect3').offset().top + 'px'
	        }, 'fast');
		});

		$('.items a[href="#"]').on('touchstart mouseenter focus', function(e) {
			$('div.dropdown').css('display', 'none');
			e.stopImmediatePropagation();
			e.preventDefault();

			$('div.dropdown.stores').css('display', 'block');
		});
		$('div.dropdown.stores, div.dropdown.stores a').on('mouseenter hover', function(e) {
			$('div.dropdown.stores').css('display', 'block');
		});
		$('div.dropdown.home, div.dropdown.home a').on('mouseenter hover', function(e) {
			$('div.dropdown.home').css('display', 'block');
		});

		$('a[href="/products"]').on('touchstart mouseenter focus', function(e) {
			if (!$(this).data('clicked')) {
				$(this).data('clicked', true);
				e.preventDefault();
			}
			// $('div.dropdown').css('display', 'none');
			// e.stopImmediatePropagation();
			// e.preventDefault();

			$('div.dropdown.products').css('display', 'block');
		});

		$('a[href="/"]').on('touchstart mouseenter focus', function(e) {
			$('div.dropdown').css('display', 'none');
			// e.stopImmediatePropagation();
			// e.preventDefault();

			$('div.dropdown.home').css('display', 'block');
		});

		$('div.dropdown.products, div.dropdown.products a').on('mouseenter hover', function(e) {
			$('div.dropdown.products').css('display', 'block');
		});

		$('a[href="#"], a[href="/products"], a[href="/"], .dropdown').on('mouseout mouseleave blur', function() {
			if(url.indexOf('/newsletter/') > -1 ) {
				 setTimeout(function() {
					$('div.dropdown').css('display', 'none');
				}, 1500);
			}
			else
				$('div.dropdown').css('display', 'none');
		});

		$('.dropdown a').on('touchstart', function(e) {
			e.preventDefault();
			// $(this).trigger('click');
			window.location = $(this).attr('href');
			$(this).siblings().removeClass('active').end().addClass('active');
		});
		url = "<?php echo $_SERVER['REQUEST_URI']; ?>";
		if(url == '/')
			$('div#menu div.items a[href="/"]').addClass('active');
		else if(url == '/contact-us/')
			$('div#menu div.items a[href="/contact-us"]').addClass('active');
		else if(url == '/about-us-page/')
			$('div#menu div.items a[href="/about-us-page"]').addClass('active');
		else if(url.indexOf('blog') != -1)
			$('div#menu div.items a[href="/blog"]').addClass('active');
		else if(url.indexOf('/?f=') != -1)
			$('div#menu div.items a[href="/"]').addClass('active');
		else if(url == '/products/')
			$('div#menu div.items a[href="/products"]').addClass('active');
		else if(url == '/newsletter/')
			$('div#menu div.items a[href="/newsletter"]').addClass('active');
		else if(url == '/contact-us/')
			$('div#menu div.items a[href="/contact-us"]').addClass('active');
		else if(url == '/all-teas/' || url == '/all-coffees/' || url == '/all-indulgence/')
			$('div#menu div.items a[href="/products"]').addClass('active');
		else if(url == '/retailer/')
			$('div#menu div.items a[href="#"]').addClass('active');
		else if(document.referrer.indexOf('/blog') > -1 || document.referrer.indexOf('/tag/') > -1)
		   $('div#menu div.items a[href="/blog"]').addClass('active');
	  	else if(url == '/all-teas/' || url == '/all-coffees/' || 
	  		url == '/all-indulgence/' || document.referrer.indexOf('/all-teas') > -1 || document.referrer.indexOf('/all-coffees') > -1 ||
	  		document.referrer.indexOf('/all-indulgence') > -1 )
		   $('div#menu div.items a[href="/products"]').addClass('active');
		else
			$('div#menu div.items:not(.dropdown) a:first-child').addClass('active');

		$('a[href="/products"]').click(function(e){
			e.preventDefault();
		})

		$('.sliding-menu .close').on('click', function() {
			if($("#menu-wrapper .sliding-menu").hasClass('visible')) {
				$("#menu-wrapper .sliding-menu").removeClass('visible');
			}
		});

		$('body').click(function() {
			if ($(window).width() <= 667) {
				if($("#menu-wrapper .sliding-menu").hasClass('visible')) {
					$("#menu-wrapper .sliding-menu").removeClass('visible');
				}
			}

			if($("#menu .items .items").css('display') != 'none') {
				$("#menu .items .items").css('display', 'none');
			}
		});

		$("#sr-menu").click(function(e) {
			e.preventDefault();
			e.stopPropagation();
			$("#menu-wrapper .sliding-menu").toggleClass('visible');
		});

		if($(window).width() <= 667 || $(window).width() == 768)
		{
			$('#menu-wrapper .items a').on('click', function() {
				$('#menu-wrapper .items a').removeClass('active');
				$(this).addClass('active');
			});

			recalcMenuHeight();

			$('#menu .items:not(.dropdown) a:eq(1), #menu .items:not(.dropdown) a:eq(2)').addClass('shop-parent');

			el = $('.dropdown:eq(0) a');
			$(el).addClass('shop');
			$(el).last().removeClass('shop');
			$(el).insertAfter('.items a[href="#"]');

			el = $('.dropdown:eq(1) a');
			$(el).addClass('products');
			$(el).insertAfter('.items a[href="/products"]');

			// el = $('a[href="/products"]');
			// $(el).insertAfter('.items a[href="/"]');

			$('.dropdown').detach();
		}

		setTimeout(function() {
			$('.items.dropdown').css('left', $('#menu .items:not(.dropdown) a:eq(2)').offset().left + 1);
			$('.items.dropdown.products').css('left', $('#menu .items:not(.dropdown) a:eq(1)').offset().left);
		}, 300);
	});

	$(document).ready(function() {
		$('.items.dropdown').css('display', 'none');

		// setTimeout(function() {
		// 	if( $.cookie("popup") != null)
		// 		return;
		// 	setTimeout(function() {
		// 		$('#darkener, #popup_wrap').css('display', 'block');

		// 		var date = new Date();
		// 		var minutes = 120;
		// 		date.setTime(date.getTime() + (minutes * 60 * 1000));
					
		// 		$.cookie("popup", "skinnygirls", {
		// 	      expires: date
		// 	    });

		// 	}, 1000);
		// }, 2500);
		

		// $('.popup-close').click(function() {
		// 	$('#darkener').css('display', 'none');
		// 	$('#popup').css('display', 'none');
		// });
	});

	$(window).on('resize', function() {
		if(($(window).width() >= 653 && $(window).width() <= 710) || ($(window).width() >= 763 && $(window).width() <= 766)) {
			$('#menu-wrapper #menu #search-buttons').css('display', 'none');
		}
		else {
			$('#menu-wrapper #menu #search-buttons').css('display', 'block');
		}

		if($(window).width() >= 654 && $(window).width() <= 947) {
			$('#search-bar').css('display', 'none');
		}
		else {
			$('#search-bar').css('display', 'block');
		}

		$('.fb-feed').width($('#wff-id').width() + 15);

	});

	$(function() {
		if(getCookie("preloader") == null)
			$('#preloader').css('display', 'block');
		else
			$('#preloader').css('display', 'none');

		var splashDelay = 0,
			splashStep = 300,
			splashTotal = $('.letters-wrapper span').length * splashStep;

		$('#preloader #preload_wrap .letters-wrapper span').each(function(index, elem) {
			setTimeout(function() {
				$(elem).animate({
					opacity: 1,
				}, splashStep);
			}, splashDelay);

			splashDelay += splashStep;
		});

		setTimeout(function() {
			$('#preloader').css('display', 'none');
			setCookie("preloader", "skinnygirls", {
	     	 path: '/',
	    	});
		}, splashTotal);

		if(($(window).width() >= 653 && $(window).width() <= 710) || ($(window).width() >= 763 && $(window).width() <= 766)) {
			$('#menu-wrapper #menu #search-buttons').css('display', 'none');
		}
		else {
			$('#menu-wrapper #menu #search-buttons').css('display', 'block');
		}

		if($(window).width() >= 654 && $(window).width() <= 947) {
			$('#search-bar').css('display', 'none');
		}
		else {
			$('#search-bar').css('display', 'block');
		}
	});

	$(document).ready(function() {
		if($(window).width() >= 238 && $(window).width() < 580 && $(window).height() >= 239 && $(window).height() <= 360) {
			$('.sliding-menu a').css({'font-size': '15px', 'line-height': '22px'});
		}

		if(navigator.userAgent.toLowerCase().indexOf('safari') > -1) {
			$('#preloader div#preload_wrap').css('margin', '15% auto');
		} 
	});

	setTimeout(function() {
		$('#menu-wrapper').animate({opacity:1}, 1000);
	}, 1000);
</script>
	
	<div id="darkener"></div>

		<div id="popup_wrap">

		<div id="popup">
				<div class="popup-close"></div>
			<div style="display: none;"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script src="https://www.dm-mailinglist.com/subscribe_forms/localized.js" charset="UTF-8"></script>
<script src="https://www.dm-mailinglist.com/subscribe_forms/subscribe_embed.js" charset="UTF-8"></script>
<script src="/wp-content/themes/skinnygirl/form-popup.js" charset="UTF-8"></script>
			</div>

			<div>
				<form class="directmail-subscribe-form contact-form" accept-charset="UTF-8" action="https://www.dm-mailinglist.com/subscribe" method="post" data-directmail-use-ajax="1" data-form-id="80d85489">
					<input name="email" type="hidden" /><input name="form_id" type="hidden" value="80d85489" />
					<div>
						<p class="info"><span style="color:#000 !important; font-size:36px;">Skinny</span><span style="color:red;font-size:36px;">girl&trade;</span></p>
						<p class="info">Sign up for news and promotions on your new favorite coffee and teas. You may unsubscribe at anytime.</p>
						<p class="sent-ok">Your message has been sent successfully!</p>
						<label for="directmail-80d85489-first_name">First Name:</label>
						<input id="directmail-80d85489-first_name" name="first_name" type="text" value="" placeholder="First Name" />

						<label for="directmail-80d85489-last_name">Last Name:</label>
						<input id="directmail-80d85489-last_name" name="last_name" type="text" value="" placeholder="Last Name" />

						<label for="directmail-80d85489-custom_1">Country:</label>
						<input id="directmail-80d85489-custom_1" name="custom_1" type="text" value="" placeholder="Country" />
						<br />
						<label for="directmail-80d85489-subscriber_email">Email*:</label>
						<input id="directmail-80d85489-subscriber_email" class="directmail-required-field" name="subscriber_email" required="required" type="email" value="" placeholder="Email*" />

						<input type="submit" value="Subscribe" />

					</div>
				</form>
			</div>
		</div>
		</div>
	

	<div id="preloader">
		<div id="preload_wrap">
			<img src = "/wp-content/themes/skinnygirl/logo.png" />

			<div class="letters-wrapper">
				<span class="l1">S</span><span class="l2">k</span><span class="l3">i</span><span class="l4">n</span><span class="l5">n</span><span class="l6">y</span><span class="l7">g</span><span class="l8">i</span><span class="l9">r</span><span class="l10">l</span>
			</div>
		</div>
	</div>

	<div class="global-wrapper">
			<div id="h0"></div>
			<div id="s0" class="section">
				<div id="head-wrapper">
					<div id="head-container">
						<a id="head" href="/"></a>
						<div id="cups">
							<a href="/#teas" class="teas"><p>Teas</p></a>
							<a class="coffee" href="/#coffee"><p>Coffee</p></a>
							<a class="indulgence" href="/#indulgence"><p>Indulgence</p></a>
						</div>
					</div>
				</div>


		<div id="menu-wrapper">
			<div id="menu">
				<div id="sr-menu"></div>
				<div class="sliding-menu">
					<a href="javascript:void(0);" class="close">x</a>

					<?php wp_nav_menu(array('menu' => 'General Menu', 'items_wrap' => '<div class="items">%3$s</div>', 'container' => false)); ?>

					<div id="search-buttons">
						<a href="#" id="fb" class="share"></a>
						<a href="#" id="tw" class="share"></a>
						<a href="#" id="pt" class="share"></a>
						<a href="#" id="ig" class="share"></a>
						<a href="#" id="bt" class="share"></a>
					</div>
				</div>

				<div id="search-bar">
					<?php get_search_form(); ?>
				</div>

				<div class="clearfix"></div>
			
			</div>
		</div>

	
		
