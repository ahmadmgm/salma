	<div class="testimonial-listing" data-slick='{"slidesToShow": <?php echo esc_attr($settings['slidesToShow']) ?> ,"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll']) ?> ,"dots":<?php echo esc_attr($dots)?>,"arrows":<?php echo esc_attr($arrows)?>,"infinite":<?php echo esc_attr($infinite)?>,  "responsive":[{"breakpoint": 1025,"settings":{"slidesToShow": <?php echo esc_attr($settings['slidesToShow_tablet']) ?>,"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll_tablet']) ?>,"dots":<?php echo esc_attr($dotstablet)?>,"arrows":<?php echo esc_attr($arrowstablet)?>}},{"breakpoint": 768,"settings":{"slidesToShow": <?php echo esc_attr($settings['slidesToShow_mobile']) ?>,"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll_mobile']) ?>,"dots":<?php echo esc_attr($dotsmobile)?>,"arrows":<?php echo esc_attr($arrowsmobile)?>}}]}'> 
		<?php
        foreach ($settings['slides'] as $slide) {
			echo '<div class="slide-content-testimonial"> ';
				echo '<div class="slide-content-testimonial__box-shadow"> ';
					// echo'<div class="slide-content-testimonial__box-shadow1"> ';
						if ( $slide['icon'] ) {
							echo '<i class="'. $slide['icon'] .' slide-icon"></i>';
						}
						if ( $slide['heading'] ) {
							echo  '<div class="elementor-slide-heading">' . $slide['heading'] . '</div>';
						}
						if ( $slide['description'] ) {
							echo '<div class="elementor-slide-description">' . wp_trim_words( $slide['description'], $settings['posts_per_words'] , '...' ) . '</div>';
                        }
                        if ( $slide['tag'] ) {
                            echo  '<div class="elementor-slide-tag">' . $slide['tag'] . '</div>';
                        }
						echo '<div class="display-flex">';
							if ( !empty( $slide['image']['id'] ) ) {
								echo  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $slide );
							}
							echo '<div>';
							if ( $slide['your_name'] ) {
								echo '<div class="elementor-slide-your_name">' . $slide['your_name'] . '</div>';
							}
							if ( $slide['show_rating'] ) {
								echo  '<div class="all-rating"><i class="fas fa-star"> </i><span class="elementor-rating">' . $slide['rating'] . '</span></div>';
							}
							echo '</div>';
						echo '</div>';
					// echo '</div>';
				echo '</div>';
			echo '</div>';
		}
		?>
		</div>