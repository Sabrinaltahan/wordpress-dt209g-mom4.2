<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero">
    <img 
        src="<?php echo get_template_directory_uri(); ?>/images/hero.jpg" 
        alt="Hero image" 
        class="hero-img"
    >

    <div class="container">
        <h2>Hitta ditt drömhem hos oss</h2>
        <p>Vi erbjuder moderna och bekväma bostäder över hela Sverige.</p>
        <a href="<?php echo get_permalink( get_page_by_path('kontakt') ); ?>" class="btn">
             kontakta oss
        </a>
    </div>
</section>

<!-- Main Page Content -->
<section class="home-content">
    <div class="container">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="page-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="page-text">
                    <?php the_content(); ?>
                </div>
            <?php endwhile;
        endif;
        ?>
    </div>
</section>

<!-- Properties Section -->
<section class="properties">
    <div class="container">
        <h2>Våra fastigheter</h2>
        <div class="grid">
            <div class="property-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/property1.jpg" alt="Modern Villa">
                <h3>Modern Villa</h3>
                <p>Pris: 4.500.000 kr</p>
            </div>

            <div class="property-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/property2.jpg" alt="Lägenhet i Centrum">
                <h3>Lägenhet i Centrum</h3>
                <p>Pris: 2.100.000 kr</p>
            </div>

            <div class="property-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/property3.jpg" alt="Familjehus">
                <h3>Familjehus</h3>
                <p>Pris: 3.200.000 kr</p>
            </div>

            <div class="property-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/property4.jpg" alt="Lyxig bostadsrätt">
                <h3>Lyxig bostadsrätt</h3>
                <p>Pris: 5.750.000 kr</p>
            </div>
        </div>
    </div>
</section>




<!-- News Section -->
<section class="news">
    <div class="container">
        <h2>Nyheter</h2>

        <div class="news-grid">
            <?php
            $news_query = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 3
            ));

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post(); ?>
                    
                    <div class="news-card">

                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        <?php endif; ?>

                        <h3><?php the_title(); ?></h3>

                        <a href="<?php the_permalink(); ?>" class="btn">
                            Läs mer
                        </a>

                    </div>

                <?php endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Inga nyheter hittades.</p>';
            endif;
            ?>
        </div>

        <div class="view-more">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn">
                Visa fler nyheter
            </a>
        </div>
    </div>
</section>



<?php get_footer(); ?>