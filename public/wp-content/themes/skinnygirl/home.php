<?php get_header(); ?>

<link rel="stylesheet" type="text/css" href="/wp-content/themes/skinnygirl/cool-tag-cloud.css">

<style>
body.fixed-menu #head-wrapper {
	display: block;
}

#blog {
	display: block !important;
}

.blogpost {
	float: left;
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

<div class="aside">
	<?php
		dynamic_sidebar( 'Blog_aside' );
	?>
</div>

<div id="blog">

<?php query_posts($query_string . '&cat=-9, -10, -11, -12, -13, -17' ); ?>


<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<div class="blogpost">
		<?php if (has_post_thumbnail()): ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
        
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	    <div class='shortened'><p><?php the_excerpt(); ?></p></div>
        <!--Share This-->
<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_fblike_large' displayText='Facebook Like'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>
<span class="orientation-flag"></span>
<!--End Share This-->
    </div>
    <?php endwhile;	else:?>
        <p><?php echo __('Sorry,no posts are available', 'whitesquare'); ?></p>
    <?php endif; ?>
    
	<div class="cl"></div>
	
    <div id="pagination">
		<?php echo paginate_links();?>
	</div>
</div>

</div>

</div>

<script>
	$(window).on('load', function() {

		footer_height = $('#s4').height();
		blog_height = $('#blog').height();


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
	});
</script>

 <?php wp_footer(); ?>
 <?php get_footer(); ?>
