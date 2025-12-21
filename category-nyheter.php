<?php get_header(); ?>

<section class="properties">
    <div class="container" style="display: flex; gap: 30px; flex-wrap: wrap;">

        <!-- Main content: المقالات -->
        <div class="main-content" style="flex: 3; min-width: 60%;">
            <h2>
                <?php
                if ( is_category() ) {
                    single_cat_title(); // اسم التصنيف
                } else {
                    echo 'Nyheter';
                }
                ?>
            </h2>

            <?php
            // Minimal loop للتأكد من ظهور المقالات حتى مع ثيمات قديمة
            if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <div class="property-card" style="margin-bottom: 30px; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        <?php endif; ?>

                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                        <p><?php echo wp_trim_words(get_the_content(), 25); ?></p>

                        <a href="<?php the_permalink(); ?>" class="read-more">Läs mer</a>
                    </div>
                <?php endwhile; ?>

                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => '« Föregående',
                        'next_text' => 'Nästa »'
                    ));
                    ?>
                </div>

            <?php else : ?>
                <p>Inga nyheter hittades.</p>
            <?php endif; ?>
        </div>

        <!-- Sidebar: أحدث الأخبار -->
        <aside class="sidebar" style="flex: 1; min-width: 30%;">
            <h3>Senaste nyheter</h3>
            <ul>
                <?php
                $recent_posts = new WP_Query(array(
                    'posts_per_page' => 5,
                    'category_name' => 'nyheter'
                ));
                if ( $recent_posts->have_posts() ) :
                    while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo "<li>Inga nyheter hittades.</li>";
                endif;
                ?>
            </ul>
        </aside>

    </div>
</section>

<?php get_footer(); ?>