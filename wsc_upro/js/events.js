document.addEventListener('DOMContentLoaded', function () {
  var videos = document.querySelectorAll('video');
  videos.forEach(function (video, index) {
    let counter = index + 1;
    video.setAttribute("id", data_events.queried_object_id + '-' + counter);
    video.addEventListener('play', function () {
      dataLayer.push({
        event: 'video_start',
        video_title: video.currentSrc,
        video_id: video.id
      });
    });

    video.addEventListener('pause', function () {
      dataLayer.push({
        event: 'video_paused',
        video_title: video.currentSrc,
        video_id: video.id
      });
    });

    video.addEventListener('ended', function () {
      dataLayer.push({
        event: 'video_replayed',
        video_title: video.currentSrc,
        video_id: video.id
      });
    });

    video.addEventListener('volumechange', function () {
      if (video.muted) {
        dataLayer.push({
          event: 'video_mute',
          video_title: video.currentSrc,
          video_id: video.id
        });
      }
    });
  });
});

const block_home_1 = document.querySelector('html body .block-home-1');
if (block_home_1) {
  setTimeout(function() {
    block_home_1.classList.add('change_bg');
  }, 6800);
}