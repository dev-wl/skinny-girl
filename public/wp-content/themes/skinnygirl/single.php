<?php get_header();?>

<style>
body.fixed-menu #head-wrapper {
	display: block;
}
</style>

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
<?php  //get_post(); ?>
<?php while (have_posts()): the_post();?>
	<div id="blog">
		<div class="main-heading">
		    <h1><?php the_title(); ?></h1>
		</div>
		<div class="content">
			<?php if (has_post_thumbnail()): ?>
				<!-- <div class="content-image" style="width:65%; margin:0 auto;"> -->
					<?php //the_post_thumbnail(); ?>
                    <!--Share This-->
<!-- <span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_fblike_large' displayText='Facebook Like'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>
<span class="orientation-flag"></span> -->
<!--End Share This-->
				<!-- </div> -->
			<?php endif; ?>
<br>
			<?php the_content(); ?>
			<div class="share_social">
				<span class='st_facebook_large' displayText='Facebook'></span>
				<span class='st_fblike_large' displayText='Facebook Like'></span>
				<span class='st_twitter_large' displayText='Tweet'></span>
				<span class='st_pinterest_large' displayText='Pinterest'></span>
				<span class='st_email_large' displayText='Email'></span>
				<span class="orientation-flag"></span>
            </div>
		</div>
	</div>
<?php endwhile; ?>

<script>

		footer_height = $('#s4').height();
		blog_height = $('#blog').height();

		if($('.content').find('p:nth-child(2) a img').length == 1) {
			$('div.main-heading').insertAfter($('.content p')[0]);
			$('div.main-heading').css('width', '100%');
		} else if($('.content').find('p:nth-child(2) a img').length == 0) {
			$('#blog .main-heading').css('-webkit-margin-start', '84px');
		}else if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
			$('#blog .main-heading').css('width', '65%');
		}

		if(!mobile) {
			if(blog_height < 300) {
				res = footer_height;
				$('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) - (-15) + 'px');
				$('body .global-wrapper #s0.section').css('min-height', '100% !important');
				$('body .global-wrapper #s0.section').css('height', '100% !important');
			// } else if(blog_height <= 324) {
			// 	res = blog_height / 1.7;
			// 	$('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) - (-50) + 'px');
			// 	$('body .global-wrapper #s0.section').css('min-height', '100% !important');
			// 	$('body .global-wrapper #s0.section').css('height', '100% !important');
			} else {
				if($(window).height() > 900 && blog_height < 600)
					$('body .global-wrapper #s0.section').css('height', '90%');
				else {
					$('body .global-wrapper #s0.section').css('height', 'auto');
					$('body, html').css('min-height', '100%');
					$('body').css('height', 'auto');
				}
				// res = footer_height / 2;
				// $('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) + (-100) + 'px');
			}
		} else {
			if($(window).height() > $(window).width() && $(window).height() > 500) { //portrait
				if(blog_height < 520) {
					$('body .global-wrapper #s0.section').css('min-height', '100%');
					$('body .global-wrapper #s0.section').css('height', '100%');
					$('body .global-wrapper').css('height', '93%');
					$('body, html').css('height', '98%');
				} else {
					$('body .global-wrapper #s0.section').css('height', 'auto');
					$('body .global-wrapper #s0.section').css('min-height', '100%');
					$('body .global-wrapper').css('height', 'auto');
					$('body .global-wrapper').css('min-height', '100%');
				}
			} else if(blog_height < 400) {
				res = footer_height;
				$('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res)-29 + 'px');
				$('body .global-wrapper #s0.section').css('min-height', '100% !important');
				$('body .global-wrapper #s0.section').css('height', '100% !important');
			} else {
				$('body .global-wrapper #s0.section').css('height', 'auto');
				$('body .global-wrapper #s0.section').css('min-height', '100%');
				$('body .global-wrapper').css('min-height', '100%');
				$('body .global-wrapper').css('height', 'auto');
			}
		}

</script>

<?php get_footer(); ?>