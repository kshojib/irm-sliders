<?php 
// irm-slider shortcode, id attribute is required
function irm_slider_shortcode( $atts ) {
    // Attributes
    $atts = shortcode_atts(
        array(
            'id' => '',
        ),
        $atts,
        'irm-slider'
    );
    // Attributes in var
    $id = $atts['id'];
    // Check if ID is set
    if ( ! $id ) {
        return;
    }

    ob_start();

	$logo = get_field('logo', $id);
	$slider = get_field('slider', $id);

	?>

	<?php if( $slider ): ?>
		<div class="sliderTop swiper">
			<div class="swiper-wrapper">
				<?php foreach( $slider as $slide ): ?>

					<?php 
						$media_type = $slide['media'];
						$image = $slide['image'];
						$image_mobile = $slide['mobile_image'];
						$video = $slide['video'];
						$mobile_video = $slide['mobile_video'];
						$content = $slide['content'];


					?>

					<div class="swiper-slide">
						<a href="#" class="sliderTop_link">

							<?php if ($media_type == 'image'): ?>

								<?php if($image): ?>

									<?php 

									$e_class = '';
									if($image_mobile){
										$e_class = 'desktop-only';
									}

									?>		

									<div class="bg-set <?php echo $e_class; ?>" style="background-image: url(<?php echo $image['url']; ?>);"></div>
								<?php endif; ?>

								<?php if($image_mobile): ?>
									<div class="bg-set mobile-only" style="background-image: url(<?php echo $image_mobile['url']; ?>);"></div>
								<?php endif; ?>
							<?php else: ?>
								<?php if($video): ?>
									<video class="w-100 d-none d-lg-block" loop autoplay muted playsinline>
										<source src="<?php echo $video['url']; ?>" type="video/mp4">
									</video>
								<?php endif; ?>

								<?php if($mobile_video): ?>
									<video class="w-100 d-block d-lg-none mobileHomeVid" loop autoplay muted playsinline>
										<source src="<?php echo $mobile_video['url']; ?>" type="video/mp4">
									</video>
								<?php endif; ?>

							<?php endif; ?>

							<div class="sliderTop_item">
								<div class="sliderTop_text">
                                    <?php if ($logo): ?>
                                    <div class="sliderTop_logo">
                                        <?php echo wp_get_attachment_image($logo, 'full'); ?>
                                    </div>
                                    <?php endif; ?>
									<div class="sliderTop_center">
										<div class="icon-button d-inline-flex d-md-none">
											<div class="round-button">
												<div class="circle"></div>
											</div>
										</div>
									</div>
									<div class="sliderTop_description"><?php echo $content; ?></div>
								</div>
								<div class="sliderTop_button">
                                    
                                </div>
							</div>
						</a>
					</div>

				<?php endforeach; ?>
			</div>
			<div class="swiper-pagination"></div>
            <div class="swiper-navigation-container">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
		</div>
	<?php endif; ?>

	<?php
	return ob_get_clean();
}
add_shortcode( 'irm-slider', 'irm_slider_shortcode' );