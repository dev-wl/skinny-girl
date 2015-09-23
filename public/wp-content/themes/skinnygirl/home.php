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

<div id="blog">
<?php query_posts($query_string . '&cat=-9, -10, -11, -12' ); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<div class="blogpost">
		<?php if (has_post_thumbnail()): ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	    <div class='shortened'><p><?php the_excerpt(); ?></p></div>
    </div>
    <?php endwhile;	else:?>
        <p><?php echo __('Sorry,no posts are available', 'whitesquare'); ?></p>
    <?php endif; ?>
    
	<div class="cl"></div>
	
    <div id="pagination">
		<?php echo paginate_links();?>
	</div>
</div>

 <?php wp_footer(); ?>
 <?php get_footer(); ?>