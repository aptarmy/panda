<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package panda
 */
if ( !function_exists('panda_post_img') ) :
	/**
	 * Echo image URL from a post in the loop by these priorities.
	 * 1) Featured image.
	 * 2) First image/video attatched to a post.
	 * 3) Fallback image specified this theme.
	 * 
	 * @param string $image_size Echo image url according to $image_size. Accepted parameters are thumbnail, medium, large, or full.
	 */
	function panda_post_img($image_size='thubmnail'){
		if(has_post_thumbnail()) {
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, $image_size, true);
			echo $image_url[0];
		} else {
			global $post;
			$first_img = '';
			ob_start();
			ob_end_clean();
			$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
			if(isset($matches[1][0])) {
				$first_img = $matches[1][0];
			} else {
				$first_img = get_template_directory_uri() . "/img/no-image.png";
			}
			echo $first_img;
		}
	}
endif;

if ( !function_exists( 'panda_post_date' )) :
/**
 * div.meta-date > time.meta-date-published
 */
function panda_post_date() {
	$time_string = '<time class="meta-date-published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="meta-date-published" datetime="%1$s">%2$s</time><time class="meta-date-updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf(
		__( '<span class="meta-date">Post on : %s</span>', 'panda' ), $time_string
	);
}
endif;

if (!function_exists('panda_post_author')) :
	/**
	 * .meta-author > a
	 */
	function panda_post_author() {
		$author_name = '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>';
		printf(
			__( '<span class="meta-author">by %s</span>', 'panda' ),
			$author_name
		);
	}
endif;

if ( ! function_exists( 'panda_post_cats' ) ) :
	/**
	 * span.meta-cats
	 * ul > li > a
	 */
	function panda_post_cats(){
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list();
			if ( $categories_list && panda_categorized_blog() ) {
				printf( '<span class="meta-cats">' . esc_html__( 'Categories : %1$s', 'panda' ) . '</span>', $categories_list );
			}
		}
	}
endif;

if ( ! function_exists( 'panda_post_tags' ) ) :
	/**
	 * span.meta-tags
	 * ul > li > a
	 */
	function panda_post_tags(){
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
			if ( $tags_list ) {
				printf( '<span class="meta-tags">' . esc_html__( 'Tagged %1$s', 'panda' ) . '</span>', $tags_list );
			}
		}
	}
endif;

if ( ! function_exists( 'panda_post_comment_link' ) ) :
	/**
	 * span.comments-link > a
	 */
	function panda_post_comment_link() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'panda' ), esc_html__( '1 Comment', 'panda' ), esc_html__( '% Comments', 'panda' ) );
			echo '</span>';
		}
	}
endif;

if (!function_exists('panda_post_edit')) :
	/**
	 * span.post-edit > a
	 */
	function panda_post_edit(){
		edit_post_link(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit', 'panda' ),
			'<span class="post-edit">',
			'</span>'
		);
	}
endif;

if ( !function_exists('panda_post_views') ) :
	/**
	 * Echo post-views counted by 'APT-meta-views' plug-in.
	 */
	function panda_post_views() {
		if (function_exists('apt_meta_views_get')) {
			apt_meta_views_get();
		}
	}
endif;

if ( !function_exists('panda_post_rating') ) :
	/**
	 * Echo post-views counted by 'APT-meta-views' plug-in.
	 */
	function panda_post_rating() {
		if (function_exists('apt_meta_rating_get')) {
			apt_meta_rating_get();
		}
	}
endif;
/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function panda_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'panda_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'panda_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so panda_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so panda_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in panda_categorized_blog.
 */
function panda_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'panda_categories' );
}
add_action( 'edit_category', 'panda_category_transient_flusher' );
add_action( 'save_post',     'panda_category_transient_flusher' );
