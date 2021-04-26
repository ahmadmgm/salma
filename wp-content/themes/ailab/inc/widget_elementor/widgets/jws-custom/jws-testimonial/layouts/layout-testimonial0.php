<?php 
		?>
		<div class="slider-for" data-slick='{"slidesToShow": <?php echo esc_attr($settings['slidesToShow']) ?> ,"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll']) ?> ,"dots":<?php echo esc_attr($dots)?>,"arrows":<?php echo esc_attr($arrows)?>,"infinite":<?php echo esc_attr($infinite)?>,  "responsive":[{"breakpoint": 1023,"settings":{"slidesToShow": <?php echo esc_attr($settings['slidesToShow_tablet']) ?>,"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll_tablet']) ?>,"dots":<?php echo esc_attr($dotstablet)?>,"arrows":<?php echo esc_attr($arrowstablet)?>}},{"breakpoint": 768,"settings":{"slidesToShow": <?php echo esc_attr($settings['slidesToShow_mobile']) ?>,"slidesToScroll": <?php echo esc_attr($settings['slidesToScroll_mobile']) ?>,"dots":<?php echo esc_attr($dotsmobile)?>,"arrows":<?php echo esc_attr($arrowsmobile)?>}}]}'>
		<?php
        foreach ($settings['slides'] as $slide) {
            if ($slide['icon']) {
                echo '<i class="'. $slide['icon'] .' slide-icon"></i>';
            }

            if ($slide['heading']) {
                echo  '<div class="elementor-slide-heading">' . $slide['heading'] . '</div>';
            }

            if ($slide['description']) {
                echo '<div class="elementor-slide-description">' . wp_trim_words($slide['description'], $settings['posts_per_words'], '...') . '</div>';
            }
		}
		echo '</div>';
		?>
		<div class="slider-nav" data-slick='{"slidesToShow": <?php echo esc_attr($settings['slidesNavToShow']) ?> ,"slidesToScroll": <?php echo esc_attr($settings['slidesNavToScroll']) ?>,  "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": <?php echo esc_attr($settings['slidesNavToShow_tablet']) ?>,"slidesToScroll": <?php echo esc_attr($settings['slidesNavToScroll_tablet']) ?>}},{"breakpoint": 768,"settings":{"slidesToShow": <?php echo esc_attr($settings['slidesNavToShow_mobile']) ?>,"slidesToScroll": <?php echo esc_attr($settings['slidesNavToScroll_mobile']) ?>}}]}'> 
		<?php
		foreach ($settings['slides'] as $slide) {
			echo '<div class="author">';
				if ( !empty( $slide['image']['id'] ) ) {
				    echo '<div class="avatar">';
					echo  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $slide );
				    echo '</div>';
                }
				echo '<div class="name">';
				if ( $slide['your_name'] ) {
					echo '<div class="elementor-slide-your_name">' . $slide['your_name'] . '</div>';
				}
				if ( $slide['tag'] ) {
					echo  '<div class="elementor-slide-tag">' . $slide['tag'] . '</div>';
				}
				echo '</div>';
			echo '</div>';
		}
		echo '</div>';
		?>