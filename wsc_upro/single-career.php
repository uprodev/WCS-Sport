<?php get_header(); ?>

<section class="page-header-career">
	<div class="container-fluid">
		<a href="#" class="link-back" onclick="history.back();">&lsaquo;BACK</a>
		<h1><?php the_title() ?></h1>

		<?php $taxonomies = ['location', 'department', 'employment_type', 'experience_level'] ?>

		<?php if ($taxonomies): ?>
			<div class="tags">

				<?php foreach ($taxonomies as $taxonomy): ?>
					<span><?php echo wp_get_object_terms(get_the_ID(), $taxonomy)[0]->name ?></span>
				<?php endforeach ?>

				<span><?php echo get_field('is_remote') ? __('Remote') : __('Office') ?></span>

			</div>
		<?php endif ?>

	</div>
</section>

<?php if (get_field('description') || get_field('requirements')): ?>
<section class="block-text">
	<div class="container-fluid">
		<?php the_field('description') ?>
		<?php the_field('requirements') ?>
	</div>
</section>
<?php endif ?>

<section class="block-contact-form block-contact-form--type1">
	<div class="container-fluid">
		<div class="row justify-content-between">
			<div class="col-md-6 col-lg-4">
				<div class="form-description">
					
					<?php if ($field = get_field('form_2', 'option')['title']): ?>
						<h3><?php echo $field ?></h3>
					<?php endif ?>

					<?php if ($field = get_field('form_2', 'option')['icon']): ?>
						<figure>
							<?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
								<img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
							<?php else: ?>
								<?= wp_get_attachment_image($field['ID'], 'full') ?>
							<?php endif ?>
						</figure>
					<?php endif ?>

					<?php if ($field = get_field('form_2', 'option')['text']): ?>
						<?php echo $field ?>
					<?php endif ?>

				</div>
			</div>
			<div class="col-md-6 col-lg-8 col-xxl-7">

				<!-- Comeet Careers API -->
				<script>
					window.comeetInit = function() {
						COMEET.init({
							"token":       "39711F3AC5AC539701CB81CB8204FE5C",
							"company-uid": "93.007",
							"company-name": "WSC Sandbox",
							"candidate-source-storage": false,
							"color":       "278fe6",
							"font-size":   "13px",
							"thankyou-url": "<?php the_permalink(23376) ?>",
							"css-url": "<?= get_stylesheet_directory_uri() . '/css/comeet.css' ?>",
							"css-cache": false,
						});
					};
					
					(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) {return; } js = d.createElement(s); js.id = id;
						js.src = "//www.comeet.co/careers-api/api.js"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'comeet-jsapi'));
					</script>
					<!-- Comeet source attribution -->
					<script>(function(){var a=function(){window.COMEET.set("candidate-source-storage",!0)};window.COMEET?a():window.comeetUpdate=a})();</script>

					<script type="comeet-applyform" data-position-uid="<?php the_field('uid') ?>"></script>

				</div>

			</div>
		</div>
	</section>

	<section class="block-share">
		<div class="container-fluid">

				<?php if ($field = get_field('share_2', 'option')['title']): ?>
					<h3><?php echo $field ?></h3>
				<?php endif ?>

				<?php if ($field = get_field('share_2', 'option')['text']): ?>
					<div class="fade-up"><?php echo $field ?></div>
				<?php endif ?>

				<script type="comeet-social" data-position-uid="<?php the_field('uid') ?>"></script>

		</div>
	</section>

	<?php if ( have_posts() ) :

		get_template_part( 'template-parts/content', 'builder' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

	<script type="application/ld+json">
		{
			"@context" : "https://schema.org/",
			"@type" : "JobPosting",
			"title" : "<?php the_title() ?>",
			"description" : "<?php html_entity_decode(the_field('description')) ?>",
			"identifier": {
				"@type": "PropertyValue",
				"name": "<?php the_field('company_name') ?>",
				"value": "<?php the_field('uid') ?>"
			},
			"datePosted" : "<?php the_field('time_updated') ?>",
			"validThrough" : "",
			"employmentType" : "[<?php echo implode(', ', wp_list_pluck(wp_get_object_terms(get_the_ID(), 'employment_type'), 'name')) ?>]",
			"hiringOrganization" : {
				"@type" : "Organization",
				"name" : "<?php the_field('company_name') ?>",
				"sameAs" : "https://wsc-sports.com/",
				"logo" : "https://wsc-sports.com/logo.png"
			},
			"jobLocation": {
				"@type": "Place",
				"address": {
					"@type": "PostalAddress",
					"streetAddress": "<?php echo get_field('location')['street_number'] . ' ' . get_field('location')['street_name']  ?>",
					"addressLocality": "<?php echo get_field('location')['city'] ?>",
					"addressRegion": "<?php echo get_field('location')['name'] ?>",
					"postalCode": "<?php echo get_field('location')['postal_code'] ?>",
					"addressCountry": "<?php echo get_field('location')['country'] ?: 'US' ?>"
				}
			},
			"baseSalary": {
				"@type": "MonetaryAmount",
				"currency": "USD",
				"value": {
					"@type": "QuantitativeValue",
					"value": "",
					"unitText": ""
				}
			}
		}
	</script>

	<?php get_footer(); ?>