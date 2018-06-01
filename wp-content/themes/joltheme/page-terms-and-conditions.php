<?php
/* Template Name: team */

get_header(); ?>
<?php wp_head();?>
<div style="position:relative; width: 100%;   top: 90px;" >
    <h1 style=" color:white; text-align: center; margin: 0px auto;">Terms and Conditions</h1>
</div>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        if (have_posts()):
            while ( have_posts() ) : the_post(); ?>
                <p><?php the_content(); ?> </p>


            <?php endwhile;

        endif;

        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
