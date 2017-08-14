<?php
/**
 * edit_this_listing  Widget Class
 * for inventor listings.
 */
class edit_this_listing extends WP_Widget {

  public function __construct() {
    // widget actual processes
    parent::__construct(
      'edit_this_listing', // Base ID
      __('zigs edit this listing widget', 'text_domain'), // Name
      array( 'description' => __( 'Add a link to the edit page for this listing, IF user is logged in and the author.', 'text_domain' ), ) // Args
    );
  }


    /** constructor -- name this the same as the class above */
    /*function edit_this_listin() {
        parent::WP_Widget(false, $name = 'Edit this Listing');
    } */

    /** @see WP_Widget::widget -- do not rename this */
    //
    function widget($args, $instance) {
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];

        global $current_user;
        global $post;
  			if (is_single() && is_user_logged_in() && $current_user->ID == $post->post_author)  {
  				    $editpage = site_url().'/edit/?type='.get_post_type().'&id='.get_the_ID(); ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>

							<ul>
								<li >
        				<?php echo '<a class="edit-this-listing" href="'.$editpage.'" target="_blank">'.$message.'</a>'; ?>
                </li>
							</ul>
              <?php echo $after_widget; ?>

        <?php } // end if
    } // end widget function

    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }

    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {

        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
  	    <p>
          <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Simple Message'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>" type="text" value="<?php echo $message; ?>" />
        </p>
        <?php
    }


} // end class edit_this_listing

?>
