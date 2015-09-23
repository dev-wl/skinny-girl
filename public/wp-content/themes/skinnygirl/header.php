	<!DOCTYPE html>
<html>
	<head>
		<title>Skinnygirl Coffee and Teas</title>
		<link rel="stylesheet" href="/wp-content/themes/skinnygirl/style.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/Archer A.css">
		<link rel="shortcut icon" href="../../../../favicon.ico" />
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
	</head> 
<body>

<span class="orientation-flag"></span>
<script>
	var recalcMenuHeight = function() {
		$('#menu-wrapper .sliding-menu').height($(window).height());
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
		if($(window).width() < 1000)
			$(div).append('<a href="/products">Products</a>');
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
			$('div.dropdown').css('display', 'none');
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
			$('div.dropdown').css('display', 'none');
		});

		$('.dropdown a').on('touchstart', function(e) {
			e.preventDefault();
			// $(this).trigger('click');
			window.location = $(this).attr('href');
			$(this).siblings().removeClass('active').end().addClass('active');
		});
		url = "<?php echo $_SERVER['REQUEST_URI']; ?>";
		if(url == '/contact-us/')
			$('div#menu div.items a[href="/contact-us"]').addClass('active');
		else if(url == '/about-us-page/')
			$('div#menu div.items a[href="/about-us-page"]').addClass('active');
		else if(url.indexOf('blog') != -1)
			$('div#menu div.items a[href="/blog"]').addClass('active');
		else if(url == '/products/')
			$('div#menu div.items a[href="/products"]').addClass('active');
		else if(url == '/newsletter/')
			$('div#menu div.items a[href="/newsletter"]').addClass('active');
		else if(url == '/contact-us/')
			$('div#menu div.items a[href="/contact-us"]').addClass('active');
		else if(url == '/retailer/')
			$('div#menu div.items a[href="#"]').addClass('active');
			else if(document.referrer == 'http://skinnygirlcoffeeandteas.com/blog/')
   $('div#menu div.items a[href="/blog"]').addClass('active');
  else if(document.referrer == 'http://skinnygirlcoffeeandteas.com/products/')
   $('div#menu div.items a[href="/products"]').addClass('active');
		else
			$('div#menu div.items:not(.dropdown) a:first-child').addClass('active');



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

		if($(window).width() <= 667)
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
</script>

	

	<div class="global-wrapper">
			<div id="h0"></div>
			<div id="s0" class="section">
				<div id="head-wrapper">
					<a id="head" href="/"></a>
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