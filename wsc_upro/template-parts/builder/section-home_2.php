<?php

//use Detection\MobileDetect;

//$detect = new MobileDetect;

//if($args['row']):
foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

<?php
$is_video_desktop = ($video || $url_video) ? ($video ? $video['url'] : $url_video) : ($video_mobile ? $video_mobile['url'] : $url_video_mobile);
$is_video_mobile = ($video_mobile || $url_video_mobile) ? ($video_mobile ? $video_mobile['url'] : $url_video_mobile) : ($video ? $video['url'] : $url_video);


// print_r($_SERVER['HTTP_USER_AGENT']);


?>

<?php if ($height): ?>
    <style type="text/css">
        .block-home-20 {
            height: <?= $height ?>vh;
        }

        @media (max-width: 999px) {
            .video-mobile {
                display: block;
            }
            .video-desktop {
                display: none;
            }
        }

        @media (min-width: 1000px) {
            .video-mobile {
                display: none;
            }
            .video-desktop {
                display: block;
            }
        }

    </style>
<?php endif ?>

<section id="videoContainer" class="block-home block-home-2 bg-secondary">
    <div class="video-mobile">
        <?php

        //if ($detect->isMobile())

        echo do_shortcode('[rev_slider alias="slider-4"][/rev_slider]');
        ?>
    </div>
    <div class="video-desktop">
        <?php
        echo do_shortcode('[rev_slider alias="slider-1"][/rev_slider]');

        ?>
    </div>

</section>

<?php // endif; ?>
