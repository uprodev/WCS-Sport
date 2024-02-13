<?php 
$fields = ['email', 'url_comeet_hosted_page', 'uid'];
foreach ($fields as $field) {
  update_field($field, $job->$field ?? '', $post_id);
}

$fields = ['description', 'requirements'];
foreach ($fields as $index => $field) {
  update_field($field, $job->details[$index]->value ?? '', $post_id);
}

$taxonomies = ['department', 'employment_type', 'experience_level'];
foreach ($taxonomies as $taxonomy) {
  wp_set_object_terms($post_id, $job->$taxonomy ?? __('Other', 'WSC'), $taxonomy);
}

wp_set_object_terms($post_id, $job->location->name ?? __('Other', 'WSC'), 'location');

$field = 'is_remote';
update_field($field, $job->location->$field ?? false, $post_id);