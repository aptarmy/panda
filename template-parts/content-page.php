<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package panda
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<?php the_title( '<h2 class="post-title">', '</h1>' ); ?>
	</header>

	<div class="post-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="subpage-links">' . esc_html__( 'Pages:', 'panda' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="post-footer">
		<?php
			edit_post_link(
				__( 'Edit', 'panda' ),				
				'<span class="post-edit">',
				'</span>'
			);
		?>
	</footer>
</article>
