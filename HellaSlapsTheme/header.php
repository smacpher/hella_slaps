<!DOCTYPE html>

<html <?php language_attributes(); ?>>
    <head>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meat name="viewport" content="width=devide-width">
        <title>
            <?php bloginfo('name'); ?></title>
        </title>
        <?php wp_head(); ?>
    </head>
    
<body <?php body_class(); ?>>

    <div class="container">
    <!-- site header -->

        <header class="site-header">
            <div class="header-content">
                <h1>
                    <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                </h1>
                <h2>
                    <?php bloginfo('description'); ?>
                </h2>
            </div>
            <div class="header-background container">
                <div class="color1"></div><div class="color2"></div><div class="color3"></div><div class="color4"></div><div class="color5"></div>
            </div>
            <div class="genre-nav">

                <?php 
                    $args = array(
                        'theme_location' => 'genres',
                        );
                ?>
                <?php wp_nav_menu( $args )?>
            </div>
        </header>
