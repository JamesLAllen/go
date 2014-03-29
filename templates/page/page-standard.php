<div class="page-standard">
	<div class="page-header">
	  <h1 class="page-title page-title-single"><?php echo roots_title(); ?></h1>
	</div>
	<div class="page-content">
	<?php while (have_posts()) : the_post(); ?>
	  <?php the_content(); ?>
	<?php endwhile; ?>
	</div>
</div>