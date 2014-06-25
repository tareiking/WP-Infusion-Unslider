<?php
$defaults  = array(
	'post_type'       => 'slider',
	'posts_per_page'  => -1,
	'call_to_actions' => false,
	'has_video'       => false,
	'secondary_nav'   => true,
	'alignment'      => false,
);

$args = wp_parse_args( $args, $defaults );
$slider_items = new WP_Query( $args );

if ( $slider_items->have_posts() ): ?>

	<div class="infusion-unslider">
		<ul>
			<?php while ( $slider_items->have_posts() ) : $slider_items->the_post(); ?>
			<?php
				$button_1_title	= get_post_meta( $slider_items->post->ID, 'button_1_title', true );
				$button_1_link	= get_post_meta( $slider_items->post->ID, 'button_1_link', true );

				if ( has_post_thumbnail() ) {
					$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
					$large_image = $large_image_url[0];
				}
 			?>
				<li class="hello" style="width: 50%; background-image: url('<?php echo $large_image; ?>') " >

					<h4 class="slider-title">
							<?php the_title(); ?>
					</h4>
					<div class="slider-text">
						<?php the_content(); ?>
					</div>

					<?php if ( ( ! null == $button_1_link ) || ( ! null == $button_1_title ) ) { ?>

					<span class="slider-button">
						<a href="<?php echo $button_1_link ?>" class="button"><?php echo $button_1_title; ?></a>
					</span>

					<?php } ?>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
<?php else: ?>
	<p>There aren't any sliders.</p>
<?php endif; ?>
<?php wp_reset_query(); ?>