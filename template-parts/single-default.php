<div id="primary" class="content-area fd">
    <main id="main" class="site-main">

    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', get_post_type() );

        // 囤主题 www.tzhuti.com    If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // 囤主题 www.tzhuti.com    End of the loop.
    ?>
    <?php echo zrz_get_realted_posts(get_the_id()); ?>
    </main><!-- #main -->
    <?php do_action( 'single_footer_7b2' ); ?>
</div><!-- #primary --><?php
get_sidebar();
get_footer();
