<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

        <link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
        <link rel="stylesheet" type="text/css" href="MyFontsWebfontsKit.css">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster+Two:700i" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">

        <?php wp_head(); ?>


    </head>
    <body <?php body_class(); ?>>


        <header class="header" id="header">
            <nav>


                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 col-sm-push-0 col-xs-10 col-xs-push-1">
                            <ul>
                                <li> <a href="<?php echo home_url(); ?>" class="branding"><?php bloginfo('name'); ?></a></li>
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <div id="navigation_menu">
                                <?php chilly_nav('primary-navigation'); ?>
                            </div>
                        </div>

                    </div>
                    <a href="#" id="menu_button" >Menu</a>
                </div>

            </nav>
        </header>

        <main id="main">
