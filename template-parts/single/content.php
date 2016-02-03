<?php
/**
 * Template part for displaying posts on single page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package panda
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
	<?php

		the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

	?>
		<div class="post-meta">
			<?php panda_post_date(); panda_post_author(); ?>
		</div>
	</header>

	<div class="post-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before'		=> '<div class="post-subpage">' . esc_html__( 'Pages:', 'panda' ),
				'after'			=> '</div>',
				'link_before'   => '<span>',
				'link_after'    => '</span>',
			) );
		?>
	</div>

	<footer class="post-footer">
		<?php
			panda_post_cats();
			panda_post_tags();
			panda_post_comment_link();
			panda_post_views();
			panda_post_rating();
			panda_post_edit();
		?>
	</footer>
</article>
