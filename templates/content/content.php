<?php while (have_posts()) : the_post(); ?>
	<article  class="article" <?php post_class(); ?>>
	 <header class="entry-header">
    	<h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
    	<h2 class="entry-description entry-description-single"><?php the_excerpt(); ?></h2>
   </header>
   <div class="entry-content">
   		<?php the_content(); ?>
   </div>
   <footer class="entry-footer">
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
	   <?php related_posts(); ?>
   </footer>
	</article>
<?php endwhile; ?>