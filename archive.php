<?php
/*
Template Name: Archive
*/
?>
<?php get_template_part('templates/head'); ?>
<?php get_template_part('templates/header'); ?>
	<main class="main <?php echo roots_main_class(); ?>" role="main">
	<div class="page-standard">
		<div class="page-header">
		  <h1 class="page-title page-title-single"><?php echo roots_title(); ?></h1>
		</div>
		<div class="page-content stream">
			<?php $args=array(
			 'posts_per_page' => -1
			);  ?>
			<?php $the_query = new WP_Query($args); ?>
			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<article class="article-index" <?php post_class(); ?>>
						<header class="entry-header">
							<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<div class="entry-meta">
							<a href="<?php the_permalink(); ?>"><time class="entry-date" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time></a>
							</div>
						</header>
					</article>
					</a>
				<?php endwhile; ?>
		  <?php wp_reset_postdata(); ?>
			<?php else : ?>
		  	<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</div>
	</div>
	</main><!-- /.main -->
	<?php get_template_part('templates/sidebar'); ?>
<?php get_template_part('templates/footer'); ?>