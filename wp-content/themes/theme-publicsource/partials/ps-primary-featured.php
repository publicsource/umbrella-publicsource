<?php
/**
 * Template for primary featured post, used on homepage and category headers
 */
?>
<div <?php post_class( 'story' ); ?> >
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<h5 class="byline"><?php largo_byline( true, true ); ?></h5>
</div>
