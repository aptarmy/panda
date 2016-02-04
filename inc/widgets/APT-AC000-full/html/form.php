<div class="APT-AC000-full-tabs">
  <a class="APT-AC000-full-tab-item active" data-toggle="APT-AC000-full-tab-general"><?php _e('General', 'panda'); ?></a>
  <a class="APT-AC000-full-tab-item" data-toggle="APT-AC000-full-tab-display"><?php _e('Display', 'panda'); ?></a>
  <a class="APT-AC000-full-tab-item" data-toggle="APT-AC000-full-tab-filter"><?php _e('Filter', 'panda'); ?></a>
  <a class="APT-AC000-full-tab-item" data-toggle="APT-AC000-full-tab-order"><?php _e('Order', 'panda'); ?></a>
</div>

<div class="APT-AC000-full-tab APT-AC000-full-tab-general">

  <p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'panda' ); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
  </p>

  <p>
	<label for="<?php echo $this->get_field_id( 'title_link' ); ?>"><?php _e( 'Title URL', 'panda' ); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'title_link' ); ?>" name="<?php echo $this->get_field_name( 'title_link' ); ?>" type="text" value="<?php echo $title_link; ?>" />
  </p>

  <p>
	<label for="<?php echo $this->get_field_id( 'class' ); ?>"><?php _e( 'CSS class', 'panda' ); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'class' ); ?>" name="<?php echo $this->get_field_name( 'class' ); ?>" type="text" value="<?php echo $class; ?>" />
  </p>

  <p>
	<label for="<?php echo $this->get_field_id('before_posts'); ?>"><?php _e('Before posts', 'panda'); ?>:</label>
	<textarea class="widefat" id="<?php echo $this->get_field_id('before_posts'); ?>" name="<?php echo $this->get_field_name('before_posts'); ?>" rows="5"><?php echo $before_posts; ?></textarea>
  </p>

  <p>
	<label for="<?php echo $this->get_field_id('after_posts'); ?>"><?php _e('After posts', 'panda'); ?>:</label>
	<textarea class="widefat" id="<?php echo $this->get_field_id('after_posts'); ?>" name="<?php echo $this->get_field_name('after_posts'); ?>" rows="5"><?php echo $after_posts; ?></textarea>
  </p>

</div>

<div class="APT-AC000-full-tab APT-AC000-full-hide APT-AC000-full-tab-display">

  <p>
	<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts', 'panda' ); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" value="<?php echo $number; ?>" min="-1" />
  </p>

  <p>
	<input class="checkbox" id="<?php echo $this->get_field_id( 'show_title' ); ?>" name="<?php echo $this->get_field_name( 'show_title' ); ?>" type="checkbox" <?php checked( (bool) $show_title, true ); ?> />
	<label for="<?php echo $this->get_field_id( 'show_title' ); ?>"><?php _e( 'Show title', 'panda' ); ?></label>
  </p>

  <p>
	<input class="checkbox" id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" type="checkbox" <?php checked( (bool) $show_date, true ); ?> />
	<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Show published date', 'panda' ); ?></label>
  </p>

  <p<?php if (!$show_date) echo ' style="display:none;"'; ?>>
	<label for="<?php echo $this->get_field_id('date_format'); ?>"><?php _e( 'Date format', 'panda' ); ?>:</label>
	<input class="widefat" type="text" id="<?php echo $this->get_field_id('date_format'); ?>" name="<?php echo $this->get_field_name('date_format'); ?>" value="<?php echo $date_format; ?>" />
  </p>

  <p>
	<input class="checkbox" id="<?php echo $this->get_field_id( 'show_author' ); ?>" name="<?php echo $this->get_field_name( 'show_author' ); ?>" type="checkbox" <?php checked( (bool) $show_author, true ); ?> />
	<label for="<?php echo $this->get_field_id( 'show_author' ); ?>"><?php _e( 'Show post author', 'panda' ); ?></label>
  </p>

  <p>
	<input class="checkbox" id="<?php echo $this->get_field_id( 'show_comments' ); ?>" name="<?php echo $this->get_field_name( 'show_comments' ); ?>" type="checkbox" <?php checked( (bool) $show_comments, true ); ?> />
	<label for="<?php echo $this->get_field_id( 'show_comments' ); ?>"><?php _e( 'Show comments count', 'panda' ); ?></label>
  </p>

  <p>
	<input class="checkbox" id="<?php echo $this->get_field_id( 'show_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'show_excerpt' ); ?>" type="checkbox" <?php checked( (bool) $show_excerpt, true ); ?> />
	<label for="<?php echo $this->get_field_id( 'show_excerpt' ); ?>"><?php _e( 'Show excerpt', 'panda' ); ?></label>
  </p>

  <p<?php if (!$show_excerpt) echo ' style="display:none;"'; ?>>
	<label for="<?php echo $this->get_field_id('excerpt_length'); ?>"><?php _e( 'Excerpt length (in words)', 'panda' ); ?>:</label>
	<input class="widefat" type="number" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" value="<?php echo $excerpt_length; ?>" min="-1" />
  </p>

  <p>
	<input class="checkbox" id="<?php echo $this->get_field_id( 'show_content' ); ?>" name="<?php echo $this->get_field_name( 'show_content' ); ?>" type="checkbox" <?php checked( (bool) $show_content, true ); ?> />
	<label for="<?php echo $this->get_field_id( 'show_content' ); ?>"><?php _e( 'Show content', 'panda' ); ?></label>
  </p>

  <p<?php if (!$show_excerpt && !$show_content) echo ' style="display:none;"'; ?>>
	<label for="<?php echo $this->get_field_id('show_readmore'); ?>">
	<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_readmore'); ?>" name="<?php echo $this->get_field_name('show_readmore'); ?>"<?php checked( (bool) $show_readmore, true ); ?> />
	<?php _e( 'Show read more link', 'panda' ); ?>
	</label>
  </p>

  <p<?php if (!$show_readmore  || (!$show_excerpt && !$show_content)) echo ' style="display:none;"'; ?>>
	<input class="widefat" type="text" id="<?php echo $this->get_field_id('excerpt_readmore'); ?>" name="<?php echo $this->get_field_name('excerpt_readmore'); ?>" value="<?php echo $excerpt_readmore; ?>" />
  </p>

  <?php if ( function_exists('the_post_thumbnail') && current_theme_supports( 'post-thumbnails' ) ) : ?>

	<?php $sizes = get_intermediate_image_sizes(); ?>

	<p>
	  <input class="checkbox" id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" type="checkbox" <?php checked( (bool) $show_thumbnail, true ); ?> />

	  <label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php _e( 'Show thumbnail', 'panda' ); ?></label>
	</p>

	<p<?php if (!$show_thumbnail) echo ' style="display:none;"'; ?>>
	  <select id="<?php echo $this->get_field_id('thumb_size'); ?>" name="<?php echo $this->get_field_name('thumb_size'); ?>" class="widefat">
		<?php foreach ($sizes as $size) : ?>
		  <option value="<?php echo $size; ?>"<?php if ($thumb_size == $size) echo ' selected'; ?>><?php echo $size; ?></option>
		<?php endforeach; ?>
		<option value="full"<?php if ($thumb_size == $size) echo ' selected'; ?>><?php _e('full', 'panda'); ?></option>
	  </select>
	</p>

  <?php endif; ?>

  <p>
	<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_cats'); ?>" name="<?php echo $this->get_field_name('show_cats'); ?>" <?php checked( (bool) $show_cats, true ); ?> />
	<label for="<?php echo $this->get_field_id('show_cats'); ?>"> <?php _e('Show post categories', 'panda'); ?></label>
  </p>

  <p>
	<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_tags'); ?>" name="<?php echo $this->get_field_name('show_tags'); ?>" <?php checked( (bool) $show_tags, true ); ?> />
	<label for="<?php echo $this->get_field_id('show_tags'); ?>"> <?php _e('Show post tags', 'panda'); ?></label>
  </p>

  <p>
	<label for="<?php echo $this->get_field_id( 'custom_fields' ); ?>"><?php _e( 'Show custom fields (comma separated)', 'panda' ); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'custom_fields' ); ?>" name="<?php echo $this->get_field_name( 'custom_fields' ); ?>" type="text" value="<?php echo $custom_fields; ?>" />
  </p>

</div>

<div class="APT-AC000-full-tab APT-AC000-full-hide APT-AC000-full-tab-filter">

  <p>
	<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('atcat'); ?>" name="<?php echo $this->get_field_name('atcat'); ?>" <?php checked( (bool) $atcat, true ); ?> />
	<label for="<?php echo $this->get_field_id('atcat'); ?>"> <?php _e('Show posts only from current category', 'panda');?></label>
  </p>

  <p>
	<label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e( 'Categories', 'panda' ); ?>:</label>
	<select name="<?php echo $this->get_field_name('cats'); ?>[]" id="<?php echo $this->get_field_id('cats'); ?>" class="widefat" style="height: auto;" size="<?php echo $c ?>" multiple>
	  <option value="" <?php if (empty($cats)) echo 'selected="selected"'; ?>><?php _e('&ndash; Show All &ndash;', 'panda') ?></option>
	  <?php
	  $categories = get_categories( 'hide_empty=0' );
	  foreach ($categories as $category ) { ?>
		<option value="<?php echo $category->term_id; ?>" <?php if(is_array($cats) && in_array($category->term_id, $cats)) echo 'selected="selected"'; ?>><?php echo $category->cat_name;?></option>
	  <?php } ?>
	</select>
  </p>

  <?php if ($tag_list) : ?>
	<p>
	  <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('attag'); ?>" name="<?php echo $this->get_field_name('attag'); ?>" <?php checked( (bool) $attag, true ); ?> />
	  <label for="<?php echo $this->get_field_id('attag'); ?>"> <?php _e('Show posts only from current tag', 'panda');?></label>
	</p>

	<p>
	  <label for="<?php echo $this->get_field_id('tags'); ?>"><?php _e( 'Tags', 'panda' ); ?>:</label>
	  <select name="<?php echo $this->get_field_name('tags'); ?>[]" id="<?php echo $this->get_field_id('tags'); ?>" class="widefat" style="height: auto;" size="<?php echo $t ?>" multiple>
		<option value="" <?php if (empty($tags)) echo 'selected="selected"'; ?>><?php _e('&ndash; Show All &ndash;', 'panda') ?></option>
		<?php
		foreach ($tag_list as $tag) { ?>
		  <option value="<?php echo $tag->term_id; ?>" <?php if (is_array($tags) && in_array($tag->term_id, $tags)) echo 'selected="selected"'; ?>><?php echo $tag->name;?></option>
		<?php } ?>
	  </select>
	</p>
  <?php endif; ?>

  <p>
	<label for="<?php echo $this->get_field_id('types'); ?>"><?php _e( 'Post types', 'panda' ); ?>:</label>
	<select name="<?php echo $this->get_field_name('types'); ?>[]" id="<?php echo $this->get_field_id('types'); ?>" class="widefat" style="height: auto;" size="<?php echo $n ?>" multiple>
	  <option value="" <?php if (empty($types)) echo 'selected="selected"'; ?>><?php _e('&ndash; Show All &ndash;', 'panda') ?></option>
	  <?php
	  $args = array( 'public' => true );
	  $post_types = get_post_types( $args, 'names' );
	  foreach ($post_types as $post_type ) { ?>
		<option value="<?php echo $post_type; ?>" <?php if(is_array($types) && in_array($post_type, $types)) { echo 'selected="selected"'; } ?>><?php echo $post_type;?></option>
	  <?php } ?>
	</select>
  </p>

  <p>
	<label for="<?php echo $this->get_field_id('sticky'); ?>"><?php _e( 'Sticky posts', 'panda' ); ?>:</label>
	<select name="<?php echo $this->get_field_name('sticky'); ?>" id="<?php echo $this->get_field_id('sticky'); ?>" class="widefat">
	  <option value="show"<?php if( $sticky === 'show') echo ' selected'; ?>><?php _e('Show All Posts', 'panda'); ?></option>
	  <option value="hide"<?php if( $sticky == 'hide') echo ' selected'; ?>><?php _e('Hide Sticky Posts', 'panda'); ?></option>
	  <option value="only"<?php if( $sticky == 'only') echo ' selected'; ?>><?php _e('Show Only Sticky Posts', 'panda'); ?></option>
	</select>
  </p>

</div>

<div class="APT-AC000-full-tab APT-AC000-full-hide APT-AC000-full-tab-order">

  <p>
	<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Order by', 'panda'); ?>:</label>
	<select name="<?php echo $this->get_field_name('orderby'); ?>" id="<?php echo $this->get_field_id('orderby'); ?>" class="widefat">
	  <option value="date"<?php if( $orderby == 'date') echo ' selected'; ?>><?php _e('Published Date', 'panda'); ?></option>
	  <option value="title"<?php if( $orderby == 'title') echo ' selected'; ?>><?php _e('Title', 'panda'); ?></option>
	  <option value="comment_count"<?php if( $orderby == 'comment_count') echo ' selected'; ?>><?php _e('Comment Count', 'panda'); ?></option>
	  <option value="rand"<?php if( $orderby == 'rand') echo ' selected'; ?>><?php _e('Random', 'panda'); ?></option>
	  <option value="meta_value"<?php if( $orderby == 'meta_value') echo ' selected'; ?>><?php _e('Custom Field', 'panda'); ?></option>
	  <option value="menu_order"<?php if( $orderby == 'menu_order') echo ' selected'; ?>><?php _e('Menu Order', 'panda'); ?></option>
	</select>
  </p>

  <p<?php if ($orderby !== 'meta_value') echo ' style="display:none;"'; ?>>
	<label for="<?php echo $this->get_field_id( 'meta_key' ); ?>"><?php _e('Custom field', 'panda'); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id('meta_key'); ?>" name="<?php echo $this->get_field_name('meta_key'); ?>" type="text" value="<?php echo $meta_key; ?>" />
  </p>

  <p>
	<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order', 'panda'); ?>:</label>
	<select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order'); ?>" class="widefat">
		<option value="DESC"<?php if( $order == 'DESC') echo ' selected'; ?>><?php _e('Descending', 'panda'); ?></option>
		<option value="ASC"<?php if( $order == 'ASC') echo ' selected'; ?>><?php _e('Ascending', 'panda'); ?></option>
	</select>
  </p>

</div>

<?php if ( $instance ) { ?>

  <script>

	jQuery(document).ready(function($){

	  var show_excerpt = $("#<?php echo $this->get_field_id( 'show_excerpt' ); ?>");
	  var show_content = $("#<?php echo $this->get_field_id( 'show_content' ); ?>");
	  var show_readmore = $("#<?php echo $this->get_field_id( 'show_readmore' ); ?>");
	  var show_readmore_wrap = $("#<?php echo $this->get_field_id( 'show_readmore' ); ?>").parents('p');
	  var show_thumbnail = $("#<?php echo $this->get_field_id( 'show_thumbnail' ); ?>");
	  var show_date = $("#<?php echo $this->get_field_id( 'show_date' ); ?>");
	  var date_format = $("#<?php echo $this->get_field_id( 'date_format' ); ?>").parents('p');
	  var excerpt_length = $("#<?php echo $this->get_field_id( 'excerpt_length' ); ?>").parents('p');
	  var excerpt_readmore_wrap = $("#<?php echo $this->get_field_id( 'excerpt_readmore' ); ?>").parents('p');
	  var thumb_size_wrap = $("#<?php echo $this->get_field_id( 'thumb_size' ); ?>").parents('p');
	  var order = $("#<?php echo $this->get_field_id('orderby'); ?>");
	  var meta_key_wrap = $("#<?php echo $this->get_field_id( 'meta_key' ); ?>").parents('p');
	  
	  var toggleReadmore = function() {
		if (show_excerpt.is(':checked') || show_content.is(':checked')) {
		  show_readmore_wrap.show('fast');
		} else {
		  show_readmore_wrap.hide('fast');
		}
		toggleExcerptReadmore();
	  }

	  var toggleExcerptReadmore = function() {
		if ((show_excerpt.is(':checked') || show_content.is(':checked')) && show_readmore.is(':checked')) {
		  excerpt_readmore_wrap.show('fast');
		} else {
		  excerpt_readmore_wrap.hide('fast');
		}
	  }

	  // Toggle read more option
	  show_excerpt.click(function() {
		toggleReadmore();
	  });

	  // Toggle read more option
	  show_content.click(function() {
		toggleReadmore();
	  });

	  // Toggle excerpt length on click
	  show_excerpt.click(function(){
		excerpt_length.toggle('fast');
	  });

	  // Toggle excerpt length on click
	  show_readmore.click(function(){
		toggleExcerptReadmore();
	  });

	  // Toggle date format on click
	  show_date.click(function(){
		date_format.toggle('fast');
	  });

	  // Toggle excerpt length on click
	  show_thumbnail.click(function(){
		thumb_size_wrap.toggle('fast');
	  });

	  // Show or hide custom field meta_key value on order change
	  order.change(function(){
		if ($(this).val() === 'meta_value') {
		  meta_key_wrap.show('fast');
		} else {
		  meta_key_wrap.hide('fast');
		}
	  });
	});

  </script>

<?php

}