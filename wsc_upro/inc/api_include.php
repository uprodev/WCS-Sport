<?php 
$fields = ['email', 'url_comeet_hosted_page', 'uid', 'company_name', 'time_updated'];
foreach ($fields as $field) {
  update_field($field, $job->$field ?? '', $post_id);
}

$fields = ['description', 'requirements'];
foreach ($fields as $index => $field) {
  update_field($field, $job->details[$index]->value ?? '', $post_id);
}

$fields = ['name', 'country', 'city', 'state', 'postal_code', 'street_name', 'street_number'];
$values = [];
foreach ($fields as $field) $values[$field] = $job->location->$field ?? '';
update_field('location', $values, $post_id);

$taxonomies = ['department', 'employment_type', 'experience_level'];
foreach ($taxonomies as $taxonomy) {
  wp_set_object_terms($post_id, $job->$taxonomy ?? __('Other', 'WSC'), $taxonomy);
}

wp_set_object_terms($post_id, $job->location->name ?? __('Other', 'WSC'), 'location');

$field = 'is_remote';
update_field($field, $job->location->$field ?? false, $post_id);



// Add Featured Image to Post
if ($job->picture_url && $job->picture_url != get_field('picture_url', $post_id)) {
update_field('picture_url', $job->$picture_url, $post_id);
$image_url        = $job->picture_url; // Define the image URL here
$image_name       = basename($image_url) . '.png';
$upload_dir       = wp_upload_dir(); // Set upload folder
$image_data       = file_get_contents($image_url); // Get image data
$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
$filename         = basename( $unique_file_name ); // Create image file name

// Check folder permission and define file location
if( wp_mkdir_p( $upload_dir['path'] ) ) {
  $file = $upload_dir['path'] . '/' . $filename;
} else {
  $file = $upload_dir['basedir'] . '/' . $filename;
}

// Create the image  file on the server
file_put_contents( $file, $image_data );

// Check image file type
$wp_filetype = wp_check_filetype( $filename, null );

// Set attachment data
$attachment = array(
  'post_mime_type' => $wp_filetype['type'],
  'post_title'     => sanitize_file_name( $filename ),
  'post_content'   => '',
  'post_status'    => 'inherit'
);

// Create the attachment
$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

// Include image.php
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

// Define attachment metadata
$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

// Assign metadata to attachment
wp_update_attachment_metadata( $attach_id, $attach_data );

// And finally assign featured image to post
set_post_thumbnail( $post_id, $attach_id );
}
if(!$job->picture_url && has_post_thumbnail($post_id)) wp_delete_attachment($post_id);