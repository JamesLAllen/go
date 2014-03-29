<?php
/*
Template Name: Portfolio
*/
?>
<?php get_template_part('templates/head'); ?>
<?php get_template_part('templates/header'); ?>
	<main class="main <?php echo roots_main_class(); ?>" role="main">
	<div class="page-standard">
		<?php get_template_part('templates/portfolio/header'); ?>
		<div id="page-content" class="page-content">
			<?php get_template_part('templates/portfolio/skills'); ?>
			<?php get_template_part('templates/portfolio/projects'); ?>
			<?php get_template_part('templates/portfolio/jobs'); ?>
			<?php get_template_part('templates/portfolio/other'); ?>
			<?php get_template_part('templates/portfolio/about'); ?>
		</div>
	</div>
	</main><!-- /.main -->
<?php get_template_part('templates/footer'); ?>