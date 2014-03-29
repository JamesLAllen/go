<div class="stream">
	<div id="pagein">
		<div class="stream-list">
			<?php while (have_posts()) : the_post(); ?>
				<article class="article-index" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="entry-meta">
							<a href="<?php the_permalink(); ?>"><time class="entry-date" datetime="<?php echo get_the_time('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></time></a>
						</div>
					</header>
				</article>
			<?php endwhile; ?>
		</div>
	<?php if ($wp_query->max_num_pages > 1) : ?>
		  <nav class="post-nav">
			  <ul id='pagination'>
			  	<li class="button full"><?php previous_posts_link('<span aria-hidden="true" data-icon="&#xe618;" class="icon icon-left icon-arrow-up"></span>Newer') ?></li>
			  	<li class="button full"><?php next_posts_link('<span aria-hidden="true" data-icon="&#xe619;" class="icon icon-right icon-arrow-down"></span>Older') ?></li>
			  </ul>
		  </nav>
	<?php endif; ?>
	</div>
	<li class="button archive full"><a href="<?php echo get_bloginfo ( 'url' ) . '/archive'  ;?>">Full Archive</a></li>
</div>