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
				<div class="content-image" style="width:30%; margin:0 auto;">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>

			<?php the_content(); ?>
		</div>
	</div>
<?php endwhile; ?>

<?php get_footer(); ?>