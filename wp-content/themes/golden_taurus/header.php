<?
$all_options = get_option('true_options');
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head();
    $image_attributes = wp_get_attachment_image_src( $all_options['favicon'], array(56, 56) );
    if(strlen($image_attributes[0])):?>
    <link rel="shortcut icon" href="<?=$image_attributes[0]?>" type="image/x-icon">
    <?endif;?>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800%7COswald:400,500,600,700%7CPlayfair+Display" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/vendor/animate/animate.min.css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/vendor/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/css/theme.css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/css/theme-elements.css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/css/theme-blog.css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/css/theme-shop.css">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/vendor/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/vendor/rs-plugin/css/layers.css">
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/vendor/rs-plugin/css/navigation.css">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/css/demos/demo-coffee.css">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/css/skins/skin-coffee.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?=get_template_directory_uri()?>/css/custom.css">

    <!-- Head Libs -->
    <script src="<?=get_template_directory_uri()?>/vendor/modernizr/modernizr.min.js"></script>
</head>
<body <?php body_class(); ?>  data-target="#header" data-spy="scroll" data-offset="100">
<div class="body">