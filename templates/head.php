<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <!-- Mobile Tags -->
  <meta name="HandheldFriendly" content="True" />
  <meta name="MobileOptimized" content="320" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Apple Tags -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <!-- Create Feedburner RSS  Instead -->
  <link rel="alternate" type="application/rss+xml" title="Eric Thor Feed" href="<?php echo esc_url(get_feed_link()); ?>">
  <link href='http://fonts.googleapis.com/css?family=Vollkorn:400italic,400,700|Raleway:700,300,400' rel='stylesheet' type='text/css'>
  <?php wp_head(); ?>
  <?php if ( is_post_template('single-full.php') ) { ?>
  <!-- Special Styles -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/build/css/full.min.css" />
    <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );?>
    <style>
      @media only screen and (min-width: 40.063em) {
        .entry-header{
          background-image: url('<?php echo $background[0]; ?>');
          background-size: cover;
        }
      }
    </style>
  <?php } ?>
  <?php if ( is_page_template('portfolio.php') ) { ?>
  <!-- Resume Styles -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/bower_components/lightbox2/css/lightbox.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/build/css/portfolio.min.css" />
  <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/bower_components/lightbox2/js/lightbox.min.js"></script>
  <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );?>
    <style>
      .page-header{
        background-image: url('<?php echo $background[0]; ?>');
        background-size: cover;
      }
    </style>
  <?php } ?>
</head>