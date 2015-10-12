<?php get_header(); ?>

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

<div id="blog" class='seacrh'>


<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<div class="blogpost">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class='shortened'><p><?php the_excerpt(); ?></p></div>
        </div>
    <?php endwhile;	else:?>
        <p><?php echo __('Sorry, no results found', 'whitesquare'); ?></p>
    <?php endif; ?>
	
	<div id="pagination">
		<?php echo paginate_links();?>
	</div>
	<div class="clearfix"></div>
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
			} else if(blog_height <= 324) {
				res = blog_height / 1.7;
				$('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) + 'px');
				$('body .global-wrapper #s0.section').css('min-height', '100% !important');
				$('body .global-wrapper #s0.section').css('height', '100% !important');
			} else if (blog_height <= 452) {
				$('body .global-wrapper #s0.section').css('height', '88%');
			} else {
				$('body .global-wrapper #s0.section').css('height', 'auto');
				// res = footer_height / 2;
				// $('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) + (-100) + 'px');
			}
		} else {
			if($(window).height() == 1024 && $(window).width() == 768) {
				res = footer_height;
				$('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) - (-20) + 'px');
				$('body .global-wrapper #s0.section').css('min-height', '100% !important');
				$('body .global-wrapper #s0.section').css('height', '100% !important');
			} else if(blog_height < 400) {
				res = footer_height;
				$('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res)-29 + 'px');
				$('body .global-wrapper #s0.section').css('min-height', '100% !important');
				$('body .global-wrapper #s0.section').css('height', '100% !important');
			} else {
				$('body .global-wrapper #s0.section').css('height', 'auto');
			}
		}
	});
</script>

 <?php wp_footer(); ?>
 <?php get_footer(); ?>
