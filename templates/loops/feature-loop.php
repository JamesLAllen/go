<div class="feature">
	<div class="feature-wrap">
		<?php $args=array(
		 'category_name' => 'featured',
		 'posts_per_page' => 3
		);  ?>
		<?php $the_query = new WP_Query($args); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<article class="article-index" <?php post_class(); ?>>
					<div class="entry-thumbnail">
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<?php
						if(has_post_thumbnail()) :?>
						<?php 
						   the_post_thumbnail('large');
						?>
						<?php else :?>
						<?php endif;?>
						</a>
					</div>
					<header class="entry-header">
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
						<div class="entry-meta">
							<time class="entry-date" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
							<p class="entry-author byline author vcard"><?php echo __('By', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
							<p class="entry-topics">
									<?php
										$categories = get_the_category();
										$separator = ' ';
										$output = '';
										if($categories){
											foreach($categories as $category) {
												$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
											}
										echo trim($output, $separator);
										}
									?>
								</p>
						</div>
						<h2 class="entry-description entry-description-index"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_excerpt(); ?></a></h2>
					</header>
				</article>
			<?php endwhile; ?>
	  <?php wp_reset_postdata(); ?>
		<?php else : ?>
	  	<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>
</div>