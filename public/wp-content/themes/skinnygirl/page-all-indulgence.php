<?php get_header(); ?>

<style>
body.fixed-menu #head-wrapper {
	display: block;
}

#menu-wrapper {
	position: relative;
	box-shadow: 0 5px 14px 0 rgba(0, 0, 0, 0.5);
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
	$(window).on('load', function() {
		$('a[href="/products"]').click(function(e) {
			e.preventDefault();
			e.stopPropagation();
		});

	});
</script>

	<a name="section3" id="sect3"></a>
    <div class="head-wrapper products-header" style='height: 304px;background-image: url("/wp-content/themes/skinnygirl/head-wrapper-bg.png");background-repeat: repeat-x;background-position: left top;background-clip: content-box;background-size: 100% 25%;'>
					<div id="h1" class="head" style='height:310px;background-image: url("/wp-content/themes/skinnygirl/set_3.png");max-width: 1024px;margin: 0px auto;background-position: center top;background-repeat: no-repeat;background-size: 100% auto;'></div>
				</div>

<div id="blog" style="max-width: 936px;">
	
	<p class="desc">
		<?php 
		  $cat_desc = get_page_by_title( 'Indulgence description', 'ARRAY_A', 'post' );
		  echo $cat_desc['post_content'];
		?>
	</p>

<?php
                global $post;
                $args = array('category' => 12, 'numberposts' => -1, 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ) );
                $myposts = get_posts( $args );
                $i = 0;
                foreach ( $myposts as $post ) : {
                    setup_postdata( $post ); ?>
					<?php if ($i == 0): ?>
							<div class="product-row">
					<?php endif; ?>
					<?php $i++; ?>
                    <div class="product">
                    	<?php if (has_post_thumbnail()): ?>
                    		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                    		<a href="<?php the_permalink(); ?>">
							<img src='<?php echo $url; ?>' /></a>
						<?php endif; ?>
						<div class="prod-description">
	                    	<h4><?php the_title(); ?></h4>
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
					</div>

					<?php if($i == 2 || end($myposts) == $post) : ?>
						</div>
					<?php $i = 0; endif; ?>
                <?php } endforeach;
                wp_reset_postdata(); ?>
</div>

 <?php wp_footer(); ?>
 <?php get_footer(); ?>