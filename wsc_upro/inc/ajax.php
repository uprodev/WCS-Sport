<?php

$actions = [
	'filter_posts',
	'filter_jobs',
	'more_posts',

];
foreach ($actions as $action) {
	add_action("wp_ajax_{$action}", $action);
	add_action("wp_ajax_nopriv_{$action}", $action);
}


function filter_posts(){

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 6,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'suppress_filters' => false,
	);

	if(isset($_POST['category'])) $args['cat'] = explode(',', $_POST['category']);
	if(isset($_POST['sort'])) $args['order'] = $_POST['sort'];

	$wp_query = new WP_Query( $args );

	if( $wp_query->have_posts() ) : ?>

		<div class="row posts">

			<?php while( $wp_query->have_posts() ): $wp_query->the_post(); ?>

				<div class="col-md-6 col-lg-4">

					<?php get_template_part('parts/content', 'post') ?>

				</div>

			<?php endwhile; ?>

		</div>

		<?php if ( $wp_query->max_num_pages > 1 ) { ?>
			<script> var this_page = 1; </script>

			<div class="lds-dual-ring"></div>
			<div class="row more_posts">
				<a href="#" class="btn btn-primary btn-sm" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'>
					<span class="btn-label-wrap">
						<span class="btn-label" data-text="<?php _e('More Posts', 'WSC') ?>"><?php _e('More Posts', 'WSC') ?></span>
					</span>
				</a>
			</div>
		<?php } ?>

		<?php wp_reset_postdata();
	else :
		_e('Sorry, nothing found', 'WSC');
	endif;

	die();
}


function more_posts() {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';

	

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="col-md-6 col-lg-4">

				<?php get_template_part('parts/content', 'post') ?>

			</div>

			<?php 
		}

	}
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