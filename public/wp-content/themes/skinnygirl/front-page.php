<?php get_header(); ?>

		<script type="text/javascript">
			// $('.global-wrapper').css('position', 'fixed');
			$('#s0').css('height', 'auto !important');
			

			var mainPage = true;

			var curH = 0;
			var maxSteps = 5;
			var steps = 0;
			var ignoreScroll = false;

			var windowHeight = 0;
			var curSection = 0;
			var scrollStep;
			var scrollTop = 0;
			var prevScroll = -1;

			var disableParallax = false;
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() <= 1440) {
				disableParallax = true;
			}

			var scrollToHead = function (id) {
				var offset = $('#s' + id).offset().top;

				ignoreScroll = true;
				$('html, body').stop().animate({scrollTop: offset}, '500', 'swing', function() { 
				   ignoreScroll = false;
				});
			}
			var loading = false;

			var linkTo = function()  {
				var sectionNameToId = {
					teas: 			1,
					coffee: 		2,
					indulgence: 	3,
				}

				link = window.location.hash;
				if(link != '') {
					where = link.substring(1);

					var targetSectionId = sectionNameToId[where];

					var position = 0;

					for (var i = targetSectionId - 1; i >= 0; i--) {
						position += $('#s' + i).height()
					}

					if (disableParallax) {
						position = $('#s' + i).offset().top;
					}

					$('html, body').animate({
						scrollTop: position
					}, 1000);
				} else {
					$(window).scrollTop(0);
				}
			}

			$(function() {
				$(window).trigger('scroll');

				$('.items.dropdown.products a').click(function() {
					if ($(this).attr('href').substr(1) == window.location.hash) {
						linkTo();
					}
				});
				$(window).on('hashchange', function() {
					linkTo();
				});

				if (!disableParallax) {
					$(window).on('resize', function() {
						windowHeight = $(window).height();
						$('.global-wrapper').height(windowHeight);
					});

					$('.global-wrapper').css('position', 'fixed');
				} else {
					$('.section').removeClass('section');
				}

				setTimeout(function() {
					$('body').prepend('<style id="own-style" type="text/css">#metaslider_50.flexslider .slides li {width: ' + $(window).width() + 'px !important;}</style>');

					if (!disableParallax) {
						loading = true;
						var sectionsHeight = 0;
						windowHeight = $(window).height();

						$('.global-wrapper').height(windowHeight);

						// Check whether height of the first block is bigger then window height and modify slider height accordnigly
						if ($('#s0').height() > windowHeight) {
							var headHeight = $('#s0 #head-wrapper').height();
							var menuHeight = $('#s0 #menu-wrapper').height();

							$('#s0 .block-wrapper').css('height', windowHeight - headHeight - menuHeight).css('overflow', 'hidden');
						}

						$('.section').each(function() {
							$(this).width($(window).width());

							if ($(this).attr('id') == 's4') {
								// $(this).height($(this).find('#footer-wrapper').height());
								$(this).height($(this).find('#footer-wrapper #footer #info').height() + 180);
								$('#footer-wrapper').height($('#footer-wrapper #footer #info').height() + 190);
							} else {
								$(this).height(windowHeight);
							}

							sectionsHeight += $(this).height();
						});

						// sectionsHeight += $('#footer').height();

						$('body').height(sectionsHeight);

						$('.section').addClass('fixed');

						$('.section:not(:eq(0))').each(function() {
							$(this).css('marginTop', $('#s' + ($(this).attr('id').substr(1) - 1)).height());
						});

						// $('.section:not(:eq(0))').css('marginTop', windowHeight);
						// $('#footer-wrapper').css('marginTop', windowHeight);

						scrollStep = windowHeight / 5;

						linkTo();

 						var $window = $(window);
						var scrollTime = 200;
						var scrollDistance = 200;
						var scrollingNow = false;

						$window.on('mousewheel DOMMouseScroll', function(e) {
							e.preventDefault();

							if (scrollingNow) {
								return false;
							}

							var delta = e.originalEvent.wheelDelta / 120 || -e.originalEvent.detail / 3;
							var scrollTop = $window.scrollTop();
							var finalScroll = scrollTop - parseInt(delta * scrollDistance);

							console.log(finalScroll);

							scrollingNow = true;
							$('html, body').animate({
								scrollTop: finalScroll,
							}, scrollTime, function() {
								scrollingNow = false;
							});
						});
						
						$(window).on('scroll', function(e) {
							var st = $(window).scrollTop();

							var hwHeight = $('#head-wrapper').height();

							if (st > hwHeight) {
								$('body').addClass('fixed-menu');
								$('#s0').css({marginTop: '-' + hwHeight + 'px', marginBottom: hwHeight});

								var sliderVisibleHeight = (st - hwHeight - ($('#s0').height() - $('#s0 #head-wrapper').height() - 60)) * -1;

								var sliderVisibilityLimit = 60;
								if (sliderVisibleHeight < sliderVisibilityLimit && sliderVisibleHeight > 0) {
									$('#s0').removeClass('on-top').find('.block-wrapper').css({
										opacity: (1 / sliderVisibilityLimit * sliderVisibleHeight),
									});
								} else  if (sliderVisibleHeight > sliderVisibilityLimit) {
									$('#s0').removeClass('on-top').find('.block-wrapper').css({
										opacity: 1,
									});
								} else if (sliderVisibleHeight <= 0) {
									$('#s0').addClass('on-top');
								}
							} else {
								$('#s0').css({marginTop: '-' + st + 'px', marginBottom: st});
								$('body').removeClass('fixed-menu');
							}

							var nextSection		= $('#s' + (curSection + 1));
							var originalMargin	= parseInt(nextSection.css('marginTop'));

							var newMargin = 0;
							if (curSection == 0) {
								newMargin = $('#s0').height() - st;
							} else {
								newMargin = windowHeight - (st - windowHeight * (curSection - 1) - $('#s0').height());
							}

							if (newMargin > $(window).height()) {
								curSection--;
							} else if (newMargin < 0) {
								curSection++;
								newMargin = 0;
							}

							$(nextSection).css('marginTop', newMargin);
						});
					} else {
						$(window).on('scroll', function(e) {
							var st = $(window).scrollTop();

							var hwHeight = $('#head-wrapper').height();

							if (st > hwHeight) {
								$('body').addClass('fixed-menu');
							} else {
								$('body').removeClass('fixed-menu');
							}
						});
					}

					$('a.next').css('display', 'none');

					$('.next').on('click', function() {
						var hid = $(this).closest('.section').attr('id').substr(1);
						
						curSection++;
						scrollToHead(curSection);
					});

					loading = false;

					window.jQuery('#metaslider_50').data('flexslider').itemW = $('.slides li').width()
				}, 200);
			});
		</script>
	
		
<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

<?php the_content(); ?>

<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>
			<div class="block-wrapper">
					<div class="block" style="width:100% !important; max-width:100% !important; padding-top:0; margin-top: 0px !important;">
						<div class="slider" style="margin-top:0px !important;"></div>
					</div>

					<a href="javascript:void(0);" class="next"></a>
				</div>
</div>

			<div id="s1" class="block-wrapper section">
			<a name="teas"></a>
				<div class="head-wrapper">
					<div id="h1" class="head"></div>
				</div>

				<div class="block teas-1">
					<div class="left">
						
					</div>
					<div class="right">
						
					</div>
					<div class="image"></div>
				</div>

				<div class="b-footer-wrapper">
					<div id="f1" class="b-footer">
						<a href="javascript:void(0);" class="next"></a>
					</div>
				</div>
			</div>

			<div id="s2" class="block-wrapper section">
			<a name="coffee"></a>
				<div class="head-wrapper">
					<div id="h2" class="head"></div>
				</div>

				<div class="block coffee-2">
					<div class="left">
						
					</div>
					<div class="right">
						
					</div>
					<div class="image"></div>
				</div>

				<div class="b-footer-wrapper">
					<div id="f2" class="b-footer">
						<a href="javascript:void(0);" class="next"></a>
					</div>
				</div>
			</div>

			<div id="s3" class="block-wrapper section">
			<a name="indulgence"></a>
				<div class="head-wrapper">
					<div id="h3" class="head"></div>
				</div>

				<div class="block indulgence-3">
					<div class="left">
						
					</div>
					<div class="right">
						
					</div>
					<div class="image"></div>
				</div>

				<div class="b-footer-wrapper">
					<div id="f3" class="b-footer">
						<!-- <a href="javascript:void(0);" class="next"></a> -->
					</div>
				</div>
			</div>

 <?php wp_footer(); ?>
<?php get_footer(); ?>

<script>

$(".section-1").appendTo(".teas-1");
$(".section-2").appendTo(".coffee-2");
$(".section-3").appendTo(".indulgence-3");

$("#pgc-2-1-0 .textwidget").appendTo(".teas-1 .left");
$("#panel-2-1-1-0 .textwidget").appendTo(".teas-1 .right");
$("#panel-2-2-0-0 .textwidget").appendTo(".coffee-2 .left");
$("#pgc-2-2-1 .textwidget").appendTo(".coffee-2 .right");
$("#panel-2-3-0-0 .textwidget").appendTo(".indulgence-3 .left");
$("#pgc-2-3-1 .textwidget").appendTo(".indulgence-3 .right");

$("#pgc-2-1-0").remove(); //removing the rest of page builder form the main page
$("#pgc-2-1-1").remove(); //removing the rest of page builder form the main page
$("#pgc-2-2-0").remove(); //removing the rest of page builder form the main page
$("#pgc-2-2-1").remove(); //removing the rest of page builder form the main page
$("#pgc-2-3-0").remove(); //removing the rest of page builder form the main page
$("#pgc-2-3-1").remove(); //removing the rest of page builder form the main page

$(".teas-1 img").parent().appendTo(".teas-1 div.image");
$(".coffee-2 img").parent().appendTo(".coffee-2 div.image");
$(".indulgence-3 img").parent().appendTo(".indulgence-3 div.image");


$("#pl-2").appendTo(".slider");
$('.slider').css('margin-top', '10px');

$(window).on('load', function() {
	if($(window).width() <= 1280)
		$('#footer-wrapper img').css('marginTop', '-221px');
	if($(window).height() == 721)
		$('#footer-wrapper img').css('marginTop', '-221px');
	// $('a[href="/"]').click(function(e) {
	// 		e.preventDefault();
	// 		e.stopPropagation();
	// 	});
});

// $(window).scrollTop(0);

</script>
