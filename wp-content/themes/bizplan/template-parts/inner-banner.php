<?php
/**
* Template for Inner Banner Section for all the inner pages
*
* @since Bizplan 0.1
*/
?>
<section class="wrapper wrap-inner-banner">
	<div class="page-header">
		<header class="inner-header-wrap">
			<h1 class="page-title"><?php echo wp_kses_post( $args[ 'title' ] ); ?></h1>
			<?php if( $args[ 'description' ] ): ?>
					<div class="page-description">
						<?php echo wp_kses_post( $args[ 'description' ] ); ?>
					</div>
			<?php endif; ?>
		</header>
		<?php
			if(!is_front_page() ){
				bizplan_breadcrumb();
			}
		?>
	</div>
</section>