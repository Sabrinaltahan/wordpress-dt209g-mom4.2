<?php get_header(); ?>

<section class="properties">
    <div class="container">

        <div class="single-post-wrapper">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <div class="property-card single-post">

                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php endif; ?>

                        <h2><?php the_title(); ?></h2>

                        <div class="post-meta">
                            <span><?php echo get_the_date(); ?></span>
                        </div>

                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>

                    </div>
                    <?php
                endwhile;
            else :
                echo '<p>Inget inlägg hittades.</p>';
            endif;
            ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>