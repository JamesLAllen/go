<?php get_template_part('templates/head'); ?>
<?php get_template_part('templates/header'); ?>
	<main class="main <?php echo roots_main_class(); ?>" role="main">
	<?php get_template_part('templates/loops/feature-loop'); ?>
	<?php get_template_part('templates/loops/stream-loop'); ?>
	</main><!-- /.main -->
	<?php get_template_part('templates/sidebar'); ?>
<?php get_template_part('templates/footer'); ?>
