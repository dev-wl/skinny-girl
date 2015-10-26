<?php get_header();?>

<style>
	#head-wrapper {
		display: block;
	}
	body.fixed-menu #head-wrapper {
		display: block !important;
	}
</style>

<?php while (have_posts()): the_post();?>
	<div id="blog">
		<div class="content"><?php the_content();?>  <div class="share_social">
	<!--Share This-->
	<span class='st_facebook_large' displayText='Facebook'></span>
	<span class='st_fblike_large' displayText='Facebook Like'></span>
	<span class='st_twitter_large' displayText='Tweet'></span>
	<span class='st_pinterest_large' displayText='Pinterest'></span>
	<span class='st_email_large' displayText='Email'></span>
	<span class="orientation-flag"></span>
	<!--End Share This-->
</div></div>

	
	</div>
<?php endwhile; ?>

</div>
</div>


<script>
	$(window).on('scroll', function(e) {
	var st = $(window).scrollTop();

	var hwHeight = $('#head-wrapper').height();

	if (st > hwHeight) {
		$('body').addClass('fixed-menu');
		
	} else {
		$('body').removeClass('fixed-menu');
	}
});
</script>

<script>

	$('.global-wrapper').css('position', 'static');
	
	if($(window).height() < 700) {
		$('body .global-wrapper #s0').css('margin-bottom', '0px');
		$('body, html').css('min-height', '100%');
		$('body').css('height', 'auto');
	}

	if($('.content').find('.screen-reader-response').contents().get(0) != undefined)
		$('.content').find('.screen-reader-response').contents().get(0).nodeValue = '';

		footer_height = $('#s4').height();
		blog_height = $('#blog').height();


		if(!mobile) {
			if(blog_height < 300) {
				res = footer_height;
				$('body .global-wrapper #s0').css('margin-bottom', '-' + 63 + 'px');
				$('body .global-wrapper #s0.section').css('min-height', '100% !important');
				$('body .global-wrapper #s0.section').css('height', '100% !important');
				$('body .global-wrapper').css('height', '90%');
				if($(window).height() < 700) {
					$('body .global-wrapper #s0').css('margin-bottom', '0px');
					$('body, html').css('min-height', '100%');
					$('body').css('height', 'auto');
				}
			} else if(blog_height <= 324) {
				res = blog_height / 1.7;
				$('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) + 15 + 'px');
				$('body .global-wrapper #s0.section').css('min-height', '100% !important');
				$('body .global-wrapper #s0.section').css('height', '100% !important');
			} else {
				$('body .global-wrapper #s0.section').css('height', 'auto');
				$('body .global-wrapper').css('height', 'auto');
				// res = footer_height / 2;
				// $('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) + (-100) + 'px');
			}
		} else {
			if($(window).height() > $(window).width()) { //portrait
				if(blog_height < 520) {
					$('body .global-wrapper #s0.section').css('min-height', '100%');
					$('body .global-wrapper #s0.section').css('height', '100%');
					$('body .global-wrapper').css('height', '93%');
					$('body, html').css('height', '98%');
				} else {
					$('body .global-wrapper #s0.section').css('height', 'auto');
					$('body .global-wrapper').css('height', 'auto');
					$('body .global-wrapper').css('min-height', '100%');
				}
			} else if(blog_height < 400) {
				res = footer_height;
				$('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res)-29 + 'px');
				$('body .global-wrapper #s0.section').css('min-height', '99% !important');
				$('body .global-wrapper #s0.section').css('height', '99% !important');
				$('body .global-wrapper').css('height', '86%');
			} else {
				$('body .global-wrapper #s0.section').css('height', 'auto');
				$('body .global-wrapper').css('height', 'auto');
			}
		}
		


		
		
		// margin = $('body .global-wrapper #s0').css('margin-bottom');
		// res = parseInt(margin) + (parseInt(b_height));
		// $('body .global-wrapper #s0').css('margin-bottom', res + 'px');
		

</script>

<div class="cl"></div>

<?php get_footer(); ?>