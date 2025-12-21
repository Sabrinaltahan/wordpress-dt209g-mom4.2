
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
     <link rel="icon" type="image/x-icon" href= "<?php echo get_template_directory_uri(); ?>/images/favicon.ico ">

 <?php wp_head();?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open();?>


<header>
    <div class="container">
        <div class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Företagslogotyp">
        </div>

        <nav>
            <!-- زر الموبايل -->
            <button class="menu-toggle">☰</button>

            <!-- قائمة الووردبريس -->
            <?php 
                wp_nav_menu( array(
                    'theme_location' => 'header-menu',
                    'container'      => false,
                    'menu_class'     => 'menu'
                ) ); 
            ?>
        </nav>
    </div>
</header>