<div class="index-loop">
	<div class="page-header">
	  <h1 class="page-title"><?php echo roots_title(); ?></h1>
	</div>
	<?php while (have_posts()) : the_post(); ?>
		<article class="article-index" <?php post_class(); ?>>
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
				<h2 class="entry-description entry-description-index"><?php the_excerpt(); ?></h2>
			</header>
				<li class="button"><a href="<?php the_permalink(); ?>" rel="bookmark">Read The Full Article</a></li>
		</article>
	<?php endwhile; ?>
	<?php if ($wp_query->max_num_pages > 1) : ?>
		  <nav class="post-nav">
			  <ul id='pagination'>
			  	<li class="button full"><?php previous_posts_link('<span aria-hidden="true" data-icon="&#xe618;" class="icon icon-left icon-arrow-up"></span>Newer') ?></li>
			  	<li class="button full"><?php next_posts_link('<span aria-hidden="true" data-icon="&#xe619;" class="icon icon-right icon-arrow-down"></span>Older') ?></li>
			  </ul>
		  </nav>
	<?php endif; ?>
</div>