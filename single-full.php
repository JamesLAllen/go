<?php
/*
Template Name Posts: Single Full
Description: A template for posts with that are full sized special posts. Usually Features.
*/
?>
<?php get_template_part('templates/head'); ?>
<?php get_template_part('templates/header'); ?>
<main class="main <?php echo roots_main_class(); ?>" role="main">
	<?php get_template_part('templates/content/content'); ?>
</main><!-- /.main -->
<div class="sidebar-wrap">
<?php get_template_part('templates/sidebar'); ?>
</div>
<?php get_template_part('templates/footer'); ?>