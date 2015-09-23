<?php get_header();?>

<?php while (have_posts()): the_post();?>
	<div id="blog">
		<div class="content"><?php the_content();?> </div>
	</div>
<?php endwhile; ?>
</div>

<script>

	$('.global-wrapper').css('position', 'static');
	
	$(window).on('load', function() {

		footer_height = $('#s4').height();
		blog_height = $('#blog').height();


		if(!mobile) {
			if($(window).height() < 900) {
				$('#s0').css('height', '');
				$('#s0').css('margin-bottom', '0');
				$('.section').css('height', 'auto');
			} else if(blog_height < 300) {
				res = footer_height;
				$('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) + 'px');
				$('body .global-wrapper #s0.section').css('min-height', '100% !important');
				$('body .global-wrapper #s0.section').css('height', '100% !important');
			}else if(blog_height <= 324) {
				res = blog_height / 1.7;
				$('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) + 'px');
				$('body .global-wrapper #s0.section').css('min-height', '100% !important');
				$('body .global-wrapper #s0.section').css('height', '100% !important');
			} else {
				$('body .global-wrapper #s0.section').css('height', 'auto');
				// res = footer_height / 2;
				// $('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) + (-100) + 'px');
			}
		} else {
			if(blog_height < 100) {
				res = footer_height;
				$('body .global-wrapper #s0').css('margin-bottom', '-' + parseInt(res) + 'px');
				$('body .global-wrapper #s0.section').css('min-height', '100% !important');
				$('body .global-wrapper #s0.section').css('height', '100% !important');
			} else {
				$('body .global-wrapper #s0.section').css('height', 'auto');
			}
		}
		


		
		
		// margin = $('body .global-wrapper #s0').css('margin-bottom');
		// res = parseInt(margin) + (parseInt(b_height));
		// $('body .global-wrapper #s0').css('margin-bottom', res + 'px');
		
	});
	
</script>
<div class="cl"></div>
<?php get_footer(); ?>
