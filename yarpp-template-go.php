<?php 
/*
YARPP Template: Go
Author: Eric Thor
Description: Template Made for Go.
*/
?>
<div class="related">
<h3>Related Posts</h3>
<?php if (have_posts()):?>
<ul>
	<?php while (have_posts()) : the_post(); ?>
	<li><h5><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h5><?php the_excerpt(); ?></li>
	<?php endwhile; ?>
</ul>
<?php else: ?>
<p>No related posts.</p>
<?php endif; ?>
</div>
