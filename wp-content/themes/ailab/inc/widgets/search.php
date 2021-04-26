<?php
class Search_For extends WP_Widget {
    var $text_placeholder;
	function __construct() {
		parent::__construct(
			'seach_by', // Base ID
			esc_html__('Search by', 'ailab'), // Name
			array('description' => esc_html__('Search by.', 'ailab'),) // Args
        );
        $this->text_placeholder  = 'Search keyword...';	
	}
    	function form( $instance ) {
             $title        = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : '';
             $search		= isset( $instance['search'] ) ? esc_attr( $instance['search'] ) : '';
             $placeholder		= isset( $instance['placeholder'] ) ? esc_attr( $instance['placeholder'] ) : $this->text_placeholder;
             ?>
			<p>
				<label for="<?php echo ''.$this->get_field_id('title'); ?>">Title:
					<input class="widefat" id="<?php echo ''.$this->get_field_id('title'); ?>"
						name="<?php echo ''.$this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
				</label>
				<label for="<?php echo ''.$this->get_field_id('placeholder'); ?>">Placeholder:
					<input class="widefat" id="<?php echo ''.$this->get_field_id('placeholder'); ?>"
						name="<?php echo ''.$this->get_field_name('placeholder'); ?>" type="text"
						value="<?php echo ''.$placeholder; ?>" />
				</label>
			</p>
			<p>
				<label for="<?php echo ''.$this->get_field_id('text'); ?>">Seach For:
					<select class='widefat' id="<?php echo ''.$this->get_field_id('search'); ?>"
						name="<?php echo ''.$this->get_field_name('search'); ?>" type="text">
						<option value='all' <?php echo ''.($search=='all')?'selected':''; ?>>
							Search all
						</option>
						<option value='blog' <?php echo ''.($search=='blog')?'selected':''; ?>>
							Search Blog
						</option>
						<option value='product' <?php echo ''.($search=='product')?'selected':''; ?>>
							Search Product
						</option>
					</select>
				</label>
			</p>
			<?php 
    	   
    	}	
    function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['search'] = $new_instance['search'];
    $instance['placeholder'] = $new_instance['placeholder'];
    return $instance;
  	}
    function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
        $search = empty($instance['search']) ? '' : $instance['search'];
         $placeholder = empty($instance['placeholder']) ? '' : $instance['placeholder'];
        echo (isset($before_widget)?$before_widget:'');
        if (!empty($title))
          echo ''.$before_title . $title . $after_title;
        ?>
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="input-group">
				<button type="submit" class="search-submit">
					<span class="icon-search"></span>
				</button>
				<input type="text" class="search-field" placeholder="<?php echo esc_attr($placeholder); ?>"
					value="<?php echo get_search_query(); ?>" name="s" required />
				<?php if($search == "product"):?>
				<input type="hidden" name="post_type" value="product">
				<?php elseif($search == "blog"):?>
				<input type="hidden" name="post_type" value="post">
				<?php else:?>
				<input type="hidden" name="post_type" value="">
				<?php endif;?>

			</div>

		</form>
		<?php
        echo (isset($after_widget)?$after_widget:'');
  	}

}
/* Class jwstheme_Post_List_Widget */
function register_search_for_widget() {

    if(function_exists('insert_widgets')) {
        insert_widgets('Search_For');
    }
}
add_action('widgets_init', 'register_search_for_widget');
/**
 * jwsthemes_widget_post_list_default
 *
 * @param [array] $params
 */