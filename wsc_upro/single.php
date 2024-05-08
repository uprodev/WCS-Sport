<?php get_header(); ?>

<?php 
if(get_field('content')) :
	foreach(get_field('content') as $index => $row):

		get_template_part('template-parts/builder/section', $row['acf_fc_layout'], ['row' => $row]);

	endforeach; 

else: ?>

	<?php $sections = ['banner_article', 'content_article', 'related_posts'] ?>

	<?php foreach ($sections as $section): ?>
		<?php get_template_part('template-parts/builder/section', $section, ['row' => true]) ?>
	<?php endforeach ?>

<?php endif ?>

<?php get_footer(); ?>