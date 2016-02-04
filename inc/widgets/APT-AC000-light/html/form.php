<div class="APT-AC000-light-tabs">
  <a class="APT-AC000-light-tab-item active" data-toggle="APT-AC000-light-tab-general"><?php _e('General', 'panda'); ?></a>
  <a class="APT-AC000-light-tab-item" data-toggle="APT-AC000-light-tab-filter"><?php _e('Filter', 'panda'); ?></a>
  <a class="APT-AC000-light-tab-item" data-toggle="APT-AC000-light-tab-order"><?php _e('Order', 'panda'); ?></a>
</div>

<div class="APT-AC000-light-tab APT-AC000-light-tab-general">

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

<div class="APT-AC000-light-tab APT-AC000-light-hide APT-AC000-light-tab-filter">

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

<div class="APT-AC000-light-tab APT-AC000-light-hide APT-AC000-light-tab-order">

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

	  var order = $("#<?php echo $this->get_field_id('orderby'); ?>");
	  var meta_key_wrap = $("#<?php echo $this->get_field_id( 'meta_key' ); ?>").parents('p');
	  
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