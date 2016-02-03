<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package panda
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
	<?php

		the_title( '<h3 class="post-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );

	?>
		<div class="post-meta">
			<?php panda_post_date(); panda_post_author(); ?>
		</div>
	</header>

	<div class="post-content">
		<img src="<?php panda_post_img('thumbnail') ?>">
		<?php
			$content = get_the_excerpt() ? get_the_excerpt() : get_the_content();
			$excerpt = wp_trim_words($content, 50, '');
			echo $excerpt;
			printf(__( '<span class="post-readmore"><a href="%s">Read more</a></span>', 'panda' ), get_the_permalink());
		?>
	</div>

	<footer class="post-footer">
		<?php
			panda_post_cats();
			panda_post_tags();
			panda_post_comment_link();
		?>
	</footer>
</article>
