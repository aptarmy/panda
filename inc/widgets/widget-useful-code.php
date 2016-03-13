<?php
	/*
		This file is intened to be used in widget class :: WP_Widget

		### Table of content ###
		1) Categories dropdown
		2) Radio
		3) Image upload
	*/
?>

<!-- Categories dropdown -->
	<p>
		<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'textdomain' ); ?>:</label>
		<?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'category' ), 'selected' => $category ) ); ?>
	</p>

<!-- Radio -->
	<p>
		<input type="radio" <?php checked($type, 'latest') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest"/><?php _e( 'Show latest Posts', 'textdomain' );?><br />
		<input type="radio" <?php checked($type,'category') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category"/><?php _e( 'Show posts from a category', 'textdomain' );?><br /></p>
	<p>

<!-- Image upload -->
	<?php
		/**
		* Load media files outside class
		*/
		function load_wp_media_files() {
			wp_enqueue_media();
		}
		add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
		
		/**
		* In form function()
		**/
		$instance = wp_parse_args( (array) $instance, array( 'image_url' => '') ); // define default value equal to ''
		$instance[ $image_url ] = esc_url( $instance[ $image_url ] ); // escape url
	?>
		<p>
			<label for="<?php echo $this->get_field_id('image_url'); ?>"> <?php _e( 'Image Upload', 'textdomain' ); ?></label>
			<?php
			if ( $instance['image_url'] != '' ) {
				echo '<img id="' . $this->get_field_id( $instance['image_url'] . '-preview') . '"src="' . $instance['image_url'] . '"style="max-width:250px;" /><br />';
			}
			?>
			<input type="text" class="widefat custom_media_url" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" value="<?php echo $instance['image_url']; ?>" style="margin-top:5px;"/>
			<input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_url'); ?>" value="<?php _e( 'Upload Image', 'colormag' ); ?>" style="margin-top:5px; margin-right: 30px;" onclick="imageWidget.uploader( '<?php echo $this->get_field_id('image_url'); ?>' ); return false;"/>
		</p>
		<!-- Following javascript should be separated as js file -->
		<script>
			jQuery(document).ready(function ($) {
				imageWidget = {
					uploader: function (widget_id_string) {
						function media_upload(button_class) {
							var _custom_media = true, _orig_send_attachment = wp.media.editor.send.attachment;
							$('body').on('click', button_class, function (e) {
								var button_id = '#' + $(this).attr('id');
								var self = $(button_id);
								var send_attachment_bkp = wp.media.editor.send.attachment;
								var button = $(button_id);
								var id = button.attr('id').replace('_button', '');
								_custom_media = true;
								wp.media.editor.send.attachment = function (props, attachment) {
									if (_custom_media) {
										$("#" + widget_id_string + 'attachment_id').val(attachment.id);
										$("#" + widget_id_string).val(attachment.url);
										$("#" + widget_id_string + 'preview').attr('src', attachment.url).css('display', 'block');
									} else {
										return _orig_send_attachment.apply(button_id, [props, attachment]);
									}
								};
								wp.media.editor.open(button);
								return false;
							});
						}
						media_upload('.custom_media_button.button');
					}
				};
			});
		</script>
<!-- End Upload image -->