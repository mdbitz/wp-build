<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/assets/img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php  print_external_scripts('header'); ?>
    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700" rel="stylesheet"> 
</head>
<body <?php body_class(); ?>>
    <?php print_external_scripts('body'); ?>

    <header class="site_header">
        <div class="shell">
            <div class="logo_area ">
                <div class="shell">
                    <a class="logo_wrapper" href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_directory');?>/assets/svg/nm-logo.svg" class="logo" /></a>
                </div>
            </div>
            <div class="nav_area">
                <div class="shell">
                    <?php wp_nav_menu( array( 'container'=> 'nav', 'container_class' => 'menu_main', 'theme_location' => 'main') ) ?>
                </div>
            </div>
        </div>
    </header>
    <main class="site_content">
        <div class="cc">
