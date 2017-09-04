<?php get_header(); ?>





<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <!-- article -->
    <article id="post-<?php the_ID(); ?>" >


        

        <?php
        $background_image = '';
        if (  has_post_thumbnail()   ):
            $page_image = thumbnail_of_post_url( get_the_ID(), 'large' );
            $background_image = ' style="background-image:url('. $page_image .')" ';
        endif;
        ?>

        <section class="section_welcome_paragraph"  <?php echo $background_image; ?>   >
            <h1><?php the_title(); ?></h1>
            <div class="sheep"></div>
        </section>

        <?php include('section-loop.php'); ?>


        <div class="container">
            <?php the_content(); ?>
        </div>



    </article>
    <!-- /article -->

<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article class="container">

        <h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>

    </article>
    <!-- /article -->

<?php endif; ?>






<?php get_footer(); ?>
