<?php

// Get global args
$cta_title_global    = ( get_field( 'cta_title', 'options' ) ) ? get_field( 'cta_title', 'options' ) : '';
$cta_button_global   = ( get_field( 'cta_button', 'options' ) ) ? get_field( 'cta_button', 'options' ) : '';
$target_global       = ( isset( $cta_button_global['target'] ) && ! empty( $cta_button_global['target'] ) ) ? 'target="' . $cta_button_global['target'] . '"' : '';
$button_link_global  = ( isset( $cta_button_global['url'] ) ) ? $cta_button_global['url'] : '';
$button_title_global = ( isset( $cta_button_global['title'] ) ) ? $cta_button_global['title'] : '';


$args             = wp_parse_args(
	$args,
	array(
		'cta_data' => array(
			'cta_title'         => '',
			'cta_button_link'   => '',
			'cta_button_title'  => '',
			'cta_button_target' => '',
		),
	)
);
$cta_title        = ( isset( $args['cta_data']['cta_title'] ) && ! empty( $args['cta_data']['cta_title'] ) ) ? $args['cta_data']['cta_title'] : $cta_title_global;
$cta_button_title = ( isset( $args['cta_data']['cta_button_title'] ) && ! empty( $args['cta_data']['cta_button_title'] ) ) ? $args['cta_data']['cta_button_title'] : $button_title_global;
$target           = ( isset( $args['cta_data']['cta_button_target'] ) && ! empty( $args['cta_data']['cta_button_target'] ) ) ? $args['cta_data']['cta_button_target'] : $target_global;
$button_link      = ( isset( $args['cta_data']['cta_button_link'] ) && ! empty( $args['cta_data']['cta_button_link'] ) ) ? $args['cta_data']['cta_button_link'] : $button_link_global;
?>
<div class="alignfull bg-[#83E3DE] py-10 md:py-32 relative px-5">
	<div class="container relative z-[1] max-w-[744px]">
	<?php if ( $cta_title ) { ?>
		<h2 class="font-light lg:text-[50px]"><?php echo $cta_title; ?></h2>
	<?php } ?>
	<?php if ( $cta_button_title && $button_link ) { ?>
		<a class="btn btn--tertiary mt-5 md:mt-8 y group/btn transition-all" href="<?php echo esc_url( $button_link ); ?>" <?php echo esc_attr( $target ); ?>>
		<span><?php echo esc_html( $cta_button_title ); ?> </span>
	</a>
	<?php } ?>
	</div>
	<div class="section-bg absolute left-0 bottom-0 z-0 w-[155px] h-full overflow-hidden">
		<svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				viewBox="0 0 155 364" style="enable-background:new 0 0 155 364;" xml:space="preserve">
			<path style="fill:none;stroke:#000000;" d="M-247-130.3L154,84v400.7"/>
			<path style="fill:none;stroke:#000000;" d="M-299-93.3l399,204.5v373.5"/>
			<path style="fill:none;stroke:#000000;" d="M-473-130.3L44,155.9v328.8"/>
		</svg>
	</div>
</div>
