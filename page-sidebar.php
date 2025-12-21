<?php
/*
Template Name: Page with Sidebar
*/
get_header(); ?>

<div class="container" style="display:flex; gap:20px;">
    <main style="width:70%;">
        <?php
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        ?>
    </main>

    <aside style="width:30%;">
        <?php dynamic_sidebar('main-sidebar'); ?>
    </aside>
</div>

<?php get_footer(); ?>