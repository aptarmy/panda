<?php

/**
 * To remove Display tab use this Regex => number|excerpt_readmore|thumb_size|excerpt_length|date_format|show_|custom_fields
 */
if ( !class_exists( 'APT_AC000_light' ) ) {

  class APT_AC000_light extends WP_Widget {

    function __construct() {

      $widget_options = array(
        'description' => __( 'Displays list of posts with an array of options', 'panda' )
      );

      $control_options = array(
        'width' => 450
      );

      parent::__construct(
        'APT-AC000-light',
        __( 'APT-AC000-light', 'panda' ),
        $widget_options,
        $control_options
      );

      $this->alt_option_name = 'widget_ultimate_posts';

      add_action('save_post', array(&$this, 'clear_widget_cache'));
      add_action('deleted_post', array(&$this, 'clear_widget_cache'));
      add_action('switch_theme', array(&$this, 'clear_widget_cache'));
      add_action('admin_enqueue_scripts', array(&$this, 'enqueue_admin_scripts'));

      if (apply_filters('APT_AC000_light_enqueue_styles', true) && !is_admin()) {
        add_action('wp_enqueue_scripts', array(&$this, 'enqueue_theme_scripts'));
      }
    }

    function enqueue_admin_scripts() {
      wp_enqueue_style('APT_AC000_light_admin_styles', get_template_directory_uri() . '/inc/widgets/APT-AC000-light/css/form.css');
      wp_enqueue_script('APT_AC000_light_admin_scripts', get_template_directory_uri() . '/inc/widgets/APT-AC000-light/js/form.js', array('jquery'), null, true);
    }

    function enqueue_theme_scripts() {
      wp_enqueue_style('APT_AC000_light_theme_standard', get_template_directory_uri() . '/inc/widgets/APT-AC000-light/css/widget.css');
    }

    function widget( $args, $instance ) {
		
		// Set default value
		// Set default arguments
      $instance = wp_parse_args( (array) $instance, array(
        'title' => __('Ultimate Posts', 'panda'),
        'class' => '',
        'title_link' => '' ,
        'number' => '5',
        'types' => 'post',
        'cats' => '',
        'tags' => '',
        'atcat' => false,
        'attag' => false,
        'order' => 'DESC',
        'orderby' => 'date',
        'meta_key' => '',
        'sticky' => 'show',
        'before_posts' => '',
        'after_posts' => ''
      ) );

      global $post;
      $current_post_id =  $post->ID;

      $cache = wp_cache_get( 'widget_ultimate_posts', 'widget' );

      if ( !is_array( $cache ) )
        $cache = array();

      if ( isset( $cache[$args['widget_id']] ) ) {
        echo $cache[$args['widget_id']];
        return;
      }

      ob_start();
      extract( $args );

      $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
      $title_link = $instance['title_link'];
      $class = $instance['class'];
      $number = empty($instance['number']) ? -1 : $instance['number'];
      $types = empty($instance['types']) ? 'any' : explode(',', $instance['types']);
      $cats = empty($instance['cats']) ? '' : explode(',', $instance['cats']);
      $tags = empty($instance['tags']) ? '' : explode(',', $instance['tags']);
      $atcat = $instance['atcat'] ? true : false;
      $attag = $instance['attag'] ? true : false;
      $sticky = $instance['sticky'];
      $order = $instance['order'];
      $orderby = $instance['orderby'];
      $meta_key = $instance['meta_key'];

      // Sticky posts
      if ($sticky == 'only') {
        $sticky_query = array( 'post__in' => get_option( 'sticky_posts' ) );
      } elseif ($sticky == 'hide') {
        $sticky_query = array( 'post__not_in' => get_option( 'sticky_posts' ) );
      } else {
        $sticky_query = null;
      }

      // If $atcat true and in category
      if ($atcat && is_category()) {
        $cats = get_query_var('cat');
      }

      // If $atcat true and is single post
      if ($atcat && is_single()) {
        $cats = '';
        foreach (get_the_category() as $catt) {
          $cats .= $catt->term_id.' ';
        }
        $cats = str_replace(' ', ',', trim($cats));
      }

      // If $attag true and in tag
      if ($attag && is_tag()) {
        $tags = get_query_var('tag_id');
      }

      // If $attag true and is single post
      if ($attag && is_single()) {
        $tags = '';
        $thetags = get_the_tags();
        if ($thetags) {
            foreach ($thetags as $tagg) {
                $tags .= $tagg->term_id . ' ';
            }
        }
        $tags = str_replace(' ', ',', trim($tags));
      }

      // Excerpt more filter
      $new_excerpt_more = create_function('$more', 'return "...";');
      add_filter('excerpt_more', $new_excerpt_more);

      if( $class ) {
        $before_widget = str_replace('class="', 'class="'. $class . ' ', $before_widget);
      }

      echo $before_widget;

      if ( $title ) {
        echo $before_title;
        if ( $title_link ) echo "<a href='$title_link'>";
        echo $title;
        if ( $title_link ) echo '</a>';
        echo $after_title;
      }

      $args = array(
        'posts_per_page' => $instance['number'],
        'order' => $order,
        'orderby' => $orderby,
        'category__in' => $cats,
        'tag__in' => $tags,
        'post_type' => $types
      );

      if ($orderby === 'meta_value') {
        $args['meta_key'] = $meta_key;
      }

      if (!empty($sticky_query)) {
        $args[key($sticky_query)] = reset($sticky_query);
      }

      $args = apply_filters('APT_AC000_light_wp_query_args', $args, $instance, $this->id_base);

      $APT_AC000_light_query = new WP_Query($args);

	  // HTML to show widget on front-end
      require get_template_directory() . '/inc/widgets/APT-AC000-light/html/widget.php';

      // Reset the global $the_post as this query will have stomped on it
      wp_reset_postdata();

      echo $after_widget;

      if ($cache) {
        $cache[$args['widget_id']] = ob_get_flush();
      }
      wp_cache_set( 'widget_ultimate_posts', $cache, 'widget' );
    }

    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;

      $instance['title'] = strip_tags( $new_instance['title'] );
      $instance['class'] = strip_tags( $new_instance['class']);
      $instance['title_link'] = strip_tags( $new_instance['title_link'] );
      $instance['types'] = (isset( $new_instance['types'] )) ? implode(',', (array) $new_instance['types']) : '';
      $instance['cats'] = (isset( $new_instance['cats'] )) ? implode(',', (array) $new_instance['cats']) : '';
      $instance['tags'] = (isset( $new_instance['tags'] )) ? implode(',', (array) $new_instance['tags']) : '';
      $instance['atcat'] = isset( $new_instance['atcat'] );
      $instance['attag'] = isset( $new_instance['attag'] );
      $instance['sticky'] = $new_instance['sticky'];
      $instance['order'] = $new_instance['order'];
      $instance['orderby'] = $new_instance['orderby'];
      $instance['meta_key'] = $new_instance['meta_key'];

      if (current_user_can('unfiltered_html')) {
        $instance['before_posts'] =  $new_instance['before_posts'];
        $instance['after_posts'] =  $new_instance['after_posts'];
      } else {
        $instance['before_posts'] = wp_filter_post_kses($new_instance['before_posts']);
        $instance['after_posts'] = wp_filter_post_kses($new_instance['after_posts']);
      }

      $this->clear_widget_cache();

      $alloptions = wp_cache_get( 'alloptions', 'options' );
      if ( isset( $alloptions['widget_ultimate_posts'] ) )
        delete_option( 'widget_ultimate_posts' );

      return $instance;

    }

    function clear_widget_cache() {

      wp_cache_delete( 'widget_ultimate_posts', 'widget' );

    }

    function form( $instance ) {

      // Set default arguments
      $instance = wp_parse_args( (array) $instance, array(
        'title' => __('Ultimate Posts', 'panda'), // General
        'class' => '',// General
        'title_link' => '' , // General
        'types' => 'post', // Filter
        'cats' => '', // Filter
        'tags' => '', // Filter
        'atcat' => false, // Filter : Show noly current Category
        'attag' => false,  // Filter : Show noly current Tag
        'order' => 'DESC', // Order
        'orderby' => 'date', // Order
        'meta_key' => '', // Order
        'sticky' => 'show', // Filter
        'before_posts' => '', // General
        'after_posts' => '' // General
      ) );

      // Or use the instance
      $title  = strip_tags($instance['title']);
      $class  = strip_tags($instance['class']);
      $title_link  = strip_tags($instance['title_link']);
      $types  = $instance['types'];
      $cats = $instance['cats'];
      $tags = $instance['tags'];
      $atcat = $instance['atcat'];
      $attag = $instance['attag'];
      $order = $instance['order'];
      $orderby = $instance['orderby'];
      $meta_key = $instance['meta_key'];
      $sticky = $instance['sticky'];
      $before_posts = format_to_edit($instance['before_posts']);
      $after_posts = format_to_edit($instance['after_posts']);

      // Let's turn $types, $cats, and $tags into an array if they are set
      if (!empty($types)) $types = explode(',', $types);
      if (!empty($cats)) $cats = explode(',', $cats);
      if (!empty($tags)) $tags = explode(',', $tags);

      // Count number of post types for select box sizing
      $cpt_types = get_post_types( array( 'public' => true ), 'names' );
      if ($cpt_types) {
        foreach ($cpt_types as $cpt ) {
          $cpt_ar[] = $cpt;
        }
        $n = count($cpt_ar);
        if($n > 6) { $n = 6; }
      } else {
        $n = 3;
      }

      // Count number of categories for select box sizing
      $cat_list = get_categories( 'hide_empty=0' );
      if ($cat_list) {
        foreach ($cat_list as $cat) {
          $cat_ar[] = $cat;
        }
        $c = count($cat_ar);
        if($c > 6) { $c = 6; }
      } else {
        $c = 3;
      }

      // Count number of tags for select box sizing
      $tag_list = get_tags( 'hide_empty=0' );
      if ($tag_list) {
        foreach ($tag_list as $tag) {
          $tag_ar[] = $tag;
        }
        $t = count($tag_ar);
        if($t > 6) { $t = 6; }
      } else {
        $t = 3;
      }
	  
	  // include form HTML
	  require get_template_directory() . '/inc/widgets/APT-AC000-light/html/form.php';
    }

  }

  function APT_AC000_light_register() {
    register_widget( 'APT_AC000_light' );
  }

  add_action( 'widgets_init', 'APT_AC000_light_register' );
}