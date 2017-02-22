<?php
/**
 * Created by PhpStorm.
 * User: chutienphuc
 * Date: 22/04/2015
 * Time: 17:45
 * This template to display header
 */
?>
<?php

$jk_options = get_option('redux_demo');

?>
<!DOCTYPE html>
<!--[if IE 8]>
<html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]>
<html <?php language_attributes(); ?>> <![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="content-language" content="<?php bloginfo('language'); ?>" />
    <meta name="contact" content="<?php bloginfo('admin_email'); ?>" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="keywords" content="" />

    <!-- Global Facebook Open Graph tags -->
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
    <!-- End Global Facebook Open Graph tags -->

    <!-- ======================================================================
    Mobile Specific Meta
    ======================================================================= -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <link rel="profile" href="http://gmgp.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="shortcut icon"
          href="<?php echo $jk_options['fav_img']['url']; ?>"
          type="image/x-icon"/>
    <?php wp_head(); ?>

	<!-- Import google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=vietnamese" rel="stylesheet">
</head>
<body <?php body_class('no-sidebar'); ?> <?php language_attributes(); ?>>
<div id="wrapper">
<header id="header">
    <div class="logo">
        <a href="<?php echo home_url(); ?>" title="Viland"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt=""/></a>
    </div>
    <div class="nav-menu">
        <?php sutunam_menu('top-menu'); ?>
    </div>
    <div class="header-link">
        <ul>
            <li class="phone">
                <i class="vi-icon-phone"></i>
                <span>VN HOTLINE&nbsp;&nbsp;&nbsp;+84 (0) 1633 744 951</span>
                <span>EN HOTLINE&nbsp;&nbsp;&nbsp;+84 (0) 7452 081 173</span>
            </li>
            <li class="basket">
                <a href="#"><i class="vi-icon-basket"></i></a>
            </li>
            <li class="user">
                <a href="/my-account"><i class="vi-icon-user"></i></a>
            </li>
            <li class="menu-toggle">
                <a href="#">Menu<i class="vi-icon-menu"></i></a>
            </li>
        </ul>
    </div>
</header>
<div id="container">

