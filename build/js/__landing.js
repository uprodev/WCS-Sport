// lenis.scrollTo(0, {
//   duration: 0.1,
//   onComplete: () => {
//     lenis.start();
//     video1.play();
//   },
// });

// video1.addEventListener("ended", function () {
//   video2.style.zIndex = 2;
// });

var video1 = document.querySelector(".part1");
var video2 = document.querySelector(".part2");
var videoStartTime0, videoStartTime1, videoStartTime2, videoStartTime3, videoStartTime4, videoStartTime5;

console.log(video2);
video2.addEventListener(
  "loadedmetadata",
  function () {
    videoStartTime0 = 0;
    videoStartTime1 = 1.85;
    videoStartTime2 = 3.27;
    videoStartTime3 = 4.85;
    videoStartTime4 = 6.0;
    videoStartTime5 = 10.7;
  },
  false
);

function t1() {
  if (video2.currentTime > videoStartTime1) {
    video2.pause();
    isPlaying = false;
    video2.removeEventListener("timeupdate", t1);
  }
}
function t2() {
  if (video2.currentTime > videoStartTime2) {
    video2.pause();
    isPlaying = false;
    video2.removeEventListener("timeupdate", t2);
  }
}
function t3() {
  if (video2.currentTime > videoStartTime3) {
    video2.pause();
    isPlaying = false;
    video2.removeEventListener("timeupdate", t3);
  }
}
function t4() {
  if (video2.currentTime > videoStartTime4) {
    video2.pause();
    isPlaying = false;
    video2.removeEventListener("timeupdate", t4);
  }
}
function t5() {
  if (video2.currentTime > videoStartTime5) {
    video2.pause();
    isPlaying = false;
    video2.removeEventListener("timeupdate", t5);
  }
}

var isPlaying = false;

ScrollTrigger.create({
  trigger: ".block-home-1",
  start: "top -10",
  end: () => `+=${window.screen.height}`,
  onEnter: function () {
    video2.play();
    video2.addEventListener("timeupdate", t1);
  },
  onEnterBack: function () {
    video2.currentTime = videoStartTime0;
  },
});
ScrollTrigger.create({
  trigger: ".block-home-1",
  start: "top -101%",
  end: () => `+=${window.screen.height}`,
  // markers: true,
  onEnter: function () {
    // lenis.scrollTo(window.screen.height * 1.5, { immediate: true });
    video2.play();
    video2.addEventListener("timeupdate", t2);
  },
  onEnterBack: function () {
    video2.currentTime = videoStartTime1;
  },
});
ScrollTrigger.create({
  trigger: ".block-home-1",
  start: "top -201%",
  end: () => `+=${window.screen.height}`,
  markers: true,
  onEnter: function () {
    // lenis.scrollTo(window.screen.height * 2.5, { immediate: true });
    video2.play();
    video2.addEventListener("timeupdate", t3);
  },
  onEnterBack: function () {
    video2.currentTime = videoStartTime1;
  },
});
ScrollTrigger.create({
  trigger: ".block-home-1",
  start: "top -301%",
  end: () => `+=${window.screen.height}`,
  // markers: true,
  onEnter: function () {
    // lenis.scrollTo(window.screen.height * 3.5, { immediate: true });
    video2.play();
    video2.addEventListener("timeupdate", t4);
  },
  onEnterBack: function () {
    video2.currentTime = videoStartTime3;
  },
});
ScrollTrigger.create({
  trigger: ".block-home-1",
  start: "top -401%",
  end: () => `+=${window.screen.height}`,
  // markers: true,
  onEnter: function () {
    // lenis.scrollTo(window.screen.height * 4.5, { immediate: true });
    video2.play();
    video2.addEventListener("timeupdate", t5);
  },
  onEnterBack: function () {
    video2.currentTime = videoStartTime4;
  },
});
ScrollTrigger.create({
  trigger: ".block-home-1",
  start: "top -501%",
  end: () => `+=${window.screen.height}`,

  // markers: true,
  onEnter: function () {
    video2.play();
  },
  onEnterBack: function () {
    video2.currentTime = videoStartTime5;
  },
});
