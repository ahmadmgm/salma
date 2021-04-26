<?php ?>
<div class="testimonial-listing <?php echo esc_attr($settings['layout']) ?>" data-slick='{"slidesToShow": <?php echo esc_attr($settings['slidesToShow']) ?> ,
"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll']) ?>  ,"dots":<?php echo esc_attr($dots)?>,"arrows":<?php echo esc_attr($arrows)?>,"centerMode":true,"centerPadding": 0, "vertical": true,
"verticalSwiping": true,"responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": <?php echo esc_attr($settings['slidesToShow_tablet']) ?>,
"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll_tablet']) ?>}},{"breakpoint": 768,"settings":{"slidesToShow": <?php echo esc_attr($settings['slidesToShow_mobile']) ?>,
"vertical":false,"verticalSwiping": false,"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll_mobile']) ?>}}]}'> 

		 
		<?php
        foreach ($settings['slides'] as $slide) {
            echo '<div class="slide-content-testimonial"> ';
                if ( !empty( $slide['image']['id'] ) ) {
                    echo  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $slide );
                }
				echo '<div class="slide-content-testimonial__box-shadow"> ';
                    echo '<div>';
                        if ( $slide['heading'] ) {
                            echo  '<div class="elementor-slide-heading">' . $slide['heading'] . '</div>';
                        }
                        echo '<div class="display-flex">';
                            if ( $slide['your_name'] ) {
                                echo '<div class="elementor-slide-your_name">' . $slide['your_name'] . '</div>';
                            }
                            if ( $slide['icon'] ) {
                                echo '<i class="'. $slide['icon'] .' slide-icon"></i>';
                            }
                        echo '</div>';
                        if ( $slide['description'] ) {
                            echo '<div class="elementor-slide-description">' . wp_trim_words( $slide['description'], $settings['posts_per_words'] , '...' ) . '</div>';
                        }
                        if ( $slide['tag'] ) {
                            echo  '<div class="elementor-slide-tag">' . $slide['tag'] . '</div>';
                        }
                        if ( $slide['show_rating'] ) {
                            echo  '<div class="all-rating"><i class="fas fa-star"> </i><span class="elementor-rating">' . $slide['rating'] . '</span></div>';
                        }
                    echo '</div>';
				echo '</div>';
			echo '</div>';
		}
		?>
		</div>
                        
                                                         