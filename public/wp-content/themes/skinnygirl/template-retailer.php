<?php 
/**
 * Template Name: Template Retailer
 */
get_header();
?>

<style>
    #head-wrapper {
        display: block;
    }
    body.fixed-menu #head-wrapper {
        display: block !important;
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
        <div class="content">
            
            <?php
            global $post;
            $args = array('category' => 9, 'numberposts' => -1 );
            $myposts = get_posts( $args );
            $i = 0;
            foreach ( $myposts as $post ) : {
                setup_postdata( $post );
                if($i == 0): ?>
                    <div class="product-row">
                <?php endif; ?>
                <?php $i++; ?>
                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                <div class="retailer">
                    <a class="ret-link" href="#"><div class="square" style="background-image: url('<?php echo $url; ?>'); background-position: 50% 52%; background-repeat: no-repeat; background-size: 77% auto;">
                                <div class="img"></div>
                            </div></a>

                            <h2><?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>

                            <script type="text/javascript">
                                $( ".retailer" ).each(function( index ) {
                                  link = $(this).find('a.ret').css('display', 'none').attr('href');
                                  $(this).find('a.ret-link').attr('href', link);
                                });
                            </script>
                        </div>
                    <?php } if($i == 3 || end($myposts) == $post): {
                            $i = 0; ?>
                        </div><div class="clearfix"></div>
                        <?php } endif; ?>
                <?php endforeach;
                wp_reset_postdata(); ?>

        </div>
    </div>
</div>

                
                                
                            

<script>

    $('.global-wrapper').css('position', 'static');
    
    $(window).on('load', function() {

        footer_height = $('#s4').height();
        blog_height = $('#blog').height();


        if(!mobile) {

            if(blog_height < 300) {
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
    });
    
</script>        
<?php get_footer(); ?>