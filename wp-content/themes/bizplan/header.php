<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since Bizplan 0.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content">
			<?php echo esc_html__( 'Skip to content', 'bizplan' ); ?>
		</a>
		<?php get_template_part( 'template-parts/header/offcanvas', 'menu' ); ?>
		<?php
			if( !bizplan_get_option( 'disable_top_header' ) ):
		?>
		<header class="wrapper top-header">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="top-header-left">
				    		<?php
				    		$topheader_ids = bizplan_get_ids( 'top_header' );
				    		if( !empty( $topheader_ids ) && is_array( $topheader_ids ) && count( $topheader_ids ) > 0 ):

				    			$query = new WP_Query( apply_filters( 'bizplan_top_header_args',  array( 
				    				'post_type'      => 'page',
				    				'post__in'       => $topheader_ids, 
				    				'posts_per_page' => 3,
				    				'orderby'        => 'post__in'
				    			)));

				    		if( $query->have_posts() ):

				    			$count = $query->post_count;
					    		while( $query->have_posts() ): 
					    			$query->the_post();
					    			$title = bizplan_get_piped_title();
					    	?>
							<div class="list">
								<?php 
									$icon = $title[ 'sub_title' ] ;
									if( !empty( $icon ) ):
								?>
									<span class="kfi <?php echo esc_attr( $icon ); ?>"></span>
								<?php endif; ?>
								<?php 
									echo wp_kses_post( get_the_content() );
									 if( get_edit_post_link()){
										bizplan_edit_link();
									}
								?>
							</div>
							<?php  
								endwhile;
								wp_reset_postdata();

									endif;
								endif;
							?>

							<!-- left top header content from customizer -->
							<?php if( bizplan_get_option( 'top_header_contact_detail' ) ): ?>
								<?php if ( bizplan_get_option( 'top_header_address') ): ?>
									<div class="list">
										<span class="kfi kfi-pin-alt"></span>
										<?php echo wp_kses_post( bizplan_get_option( 'top_header_address' ) ); ?>
									</div>
								<?php endif; ?>
								<?php if ( bizplan_get_option( 'top_header_email') ): ?>
									<div class="list">
										<span class="kfi kfi-mail-alt"></span>
										<a href="mailto:<?php echo wp_kses_post( bizplan_get_option( 'top_header_email' ) ); ?>">
											<?php echo wp_kses_post(  bizplan_get_option( 'top_header_email' ) ); ?>
										</a>
									</div>
								<?php endif; ?>
								<?php if ( bizplan_get_option( 'top_header_phone') ): ?>
									<div class="list">
										<span class="kfi kfi-phone"></span>
										<a href="tel:<?php echo wp_kses_post( bizplan_get_option( 'top_header_phone' ) ); ?>">
											<?php echo wp_kses_post(  bizplan_get_option( 'top_header_phone' ) ); ?>
										</a>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="top-header-right">
							<div class="socialgroup">
								<?php bizplan_get_menu( 'social' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php

		endif;
		?>
		<header id="masthead" class="wrapper site-header" role="banner">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-9 col-md-4">
						<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
					</div>
					<div class="col-xs-6 col-sm-3 col-md-8" id="primary-nav-container">
						<div class="header-bottom-right">
							<?php if( !bizplan_get_option( 'disable_search_icon' ) ): ?>
							<span class="search-icon">
								<a href="#">
									<span class="kfi kfi-search" aria-hidden="true"></span>
								</a>
								<div id="search-form">
									<?php get_search_form(); ?>
								</div><!-- /#search-form -->
							</span>
							<?php endif; ?>
							<?php if( class_exists( 'WooCommerce' ) ): ?>
								<span class="cart-icon">
									<a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
										<span class="kfi kfi-cart-alt"></span>
										<span class="count">
											<?php echo absint( WC()->cart->get_cart_contents_count() ); ?>
										</span>
									</a>
								</span>
							<?php endif; ?>
							<span class="alt-menu-icon visible-sm">
								<a class="offcanvas-menu-toggler" href="#">
									<span class="kfi kfi-menu"></span>
								</a>
							</span>
						</div>
						<div class="wrap-nav main-navigation">
							<div id="navigation" class="hidden-xs hidden-sm">
							    <nav class="nav">
									<?php bizplan_get_menu( 'primary' ); ?>
							    </nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->
