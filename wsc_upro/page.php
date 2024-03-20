<?php get_header(); ?>

<?php if (get_the_content()): ?>
	<section class="block-text-page">
		<div class="container-fluid">
			<div class="text-center lines-wrapper">
				<h1><?php the_title() ?></h1>
			</div>
			<div class="row justify-content-center">
				<div class="col-xxl-10">
					<div class="lines-wrapper">
						<?php the_content() ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>

<?php if ( have_posts() ) :

	get_template_part( 'template-parts/content', 'builder' );

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

<?php get_footer(); ?>