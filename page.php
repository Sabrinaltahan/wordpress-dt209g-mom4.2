<?php
/**
 * The template for displaying all pages
 *
 * @package YourThemeName
 */

get_header(); // استدعاء الهيدر
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
    ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    <?php 
                        the_content(); // محتوى الصفحة
                    ?>
                </div>

                <?php
                    // عرض الـ pagination إذا كان هناك صفحات فرعية
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yourthemename' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </article>

    <?php
        endwhile;
    else :
    ?>
        <p><?php esc_html_e( 'Sorry, no pages found.', 'yourthemename' ); ?></p>
    <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar(); // استدعاء السايدبار إذا موجود
get_footer();  // استدعاء الفوتر
?>