<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package panda
 */

get_header(); ?>

	<main class="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="taxonomy-header">
				<?php
					// display taxonomy title
					the_archive_title( '<h2 class="taxonomy-title">', '</h1>' );
					// display taxonomy description
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/archive/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</main>

<?php
get_sidebar();
get_footer();
