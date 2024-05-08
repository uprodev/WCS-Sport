<?php 
$jobs = json_decode(wp_remote_get('https://www.comeet.co/careers-api/2.0/company/68.007/positions?token=867326A326A3AD119354B9F326A3AD13AD1867&details=true')['body']);

$post_type = 'career';
$posts = get_posts(['post_type' => $post_type, 'posts_per_page' => -1]);
$posts_ids = [];
$jobs_ids = [];
if ($posts) {
  foreach ($posts as $post) {
    $posts_ids[] = get_field('uid', $post->ID);
  }
}

foreach ($jobs as $job) {

  $jobs_ids[] = $job->uid;

  if (!in_array($job->uid, $posts_ids)) {
    $post_data = array(
      'post_title'    => $job->name,
      'post_type'  => $post_type,
      'post_status'   => 'publish',
    );

    $post_id = wp_insert_post($post_data);

    require 'api_include.php';

  }
  else {
    foreach ($posts as $post) {

      if(get_field('uid', $post->ID) == $job->uid){
        $post_data = array(
          'ID' => $post->ID,
          'post_title'    => $job->name,
          'post_status'   => 'publish',
        );

        $post_id = wp_update_post($post_data);

        require 'api_include.php';

      }
    }
  }

}

// Check and delete closed vacancies
foreach ($posts as $post) {
  if (!in_array(get_field('uid', $post->ID), $jobs_ids)) wp_delete_post($post->ID);
}

wp_reset_postdata();