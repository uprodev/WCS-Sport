<?php

$actions = [
	'filter_posts',
	'filter_jobs',

];
foreach ($actions as $action) {
	add_action("wp_ajax_{$action}", $action);
	add_action("wp_ajax_nopriv_{$action}", $action);
}


function filter_posts(){

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'suppress_filters' => false,
	);

	if(isset($_POST)){
		foreach ($_POST as $key => $value) {
			$args[$key] = $value;
		}
	}

	$query = new WP_Query( $args );

	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post(); ?>
			
			<div class="col-md-6 col-lg-4 fade-up">

				<?php get_template_part('parts/content', 'post') ?>

			</div>

			<?php 
		endwhile;
		wp_reset_postdata();
	else :
		_e('Sorry, nothing found', 'WSC');
	endif;

	die();
}

function filter_jobs(){

	$args = array(
		'post_type' => 'career',
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'suppress_filters' => false,
	);

	if(isset($_POST)){

		foreach ($_POST as $key => $value) {
			$$key = $value ? 
				array(
					'taxonomy' => $key,
					'field'    => 'id',
					'terms'    => $value
				) :
				'';
		}

		$args['tax_query'] = array(
			'relation' => 'AND',
			$location,
			$department
		);

	}

	$query = new WP_Query( $args );

	if( $query->have_posts() ) : ?>

		<ul>

			<?php 
			while( $query->have_posts() ): $query->the_post(); ?>

				<?php get_template_part('parts/content', 'job') ?>

				<?php 
			endwhile;
			wp_reset_postdata(); 
			?>

		</ul>

		<?php 
	else :
		_e('Sorry, nothing found', 'WSC');
	endif;

	die();
}