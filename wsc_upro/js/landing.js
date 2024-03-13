var video1 = document.querySelector(".part1");
var video2 = document.querySelector(".block-home-2"),
  video2Source = document.querySelector("#scrollyVideo").dataset.video;

new ScrollyVideo({
  scrollyVideoContainer: "scrollyVideo",
  // src: "https://scrollyvideo.js.org/goldengate.mp4",
  src: video2Source,
});

const lenis = new Lenis({
  lerp: 0,
  time: 0,
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

lenis.on("scroll", ScrollTrigger.update);

gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});

lenis.scrollTo(0, {
  duration: 0.5,
  onComplete: () => {
    lenis.stop();
    video1.play();
  },
});

video1.addEventListener("ended", function () {
  lenis.start();
  video2.style.zIndex = 2;
});

// split numbers
const numbers = SplitType.create(".block-home-3 .number");
numbers.chars.forEach((char) => {
  gsap.to(char, {
    scrollTrigger: {
      trigger: ".block-home-3",
      start: "top center ",
    },
    y: 0,
    duration: 0.3,
    ease: "none",
    stagger: 0.15,
  });
});

// home horizontal section
ScrollTrigger.matchMedia({
  "(min-width:768px)": function () {
    var animationContainer = document.querySelector(".block-home-4"),
      animated = document.querySelector(".section-horizontal");
    gsap.to(animated, {
      x: (animated.scrollWidth - animationContainer.offsetWidth) * -1,
      scrollTrigger: {
        trigger: animationContainer,
        start: "top top",
        end: () => "+=" + animated.scrollWidth,
        scrub: true,
        pin: true,
      },
    });
  },
});

gsap.to(".block-home-4 .slide6", {
  scrollTrigger: {
    trigger: ".block-home-4 .slide6",
    start: "top 50%",
  },
  duration: 1,
  ease: "power1.inOut",

  rotation: 0,
  rotationX: 0,
  rotationY: 0,
  rotationZ: 0,
});

if (document.querySelector(".global-wrapper-home")) {
  document.querySelector(".header").classList.add("theme-light-home");
  document.querySelectorAll(".bg-white").forEach((bg) => {
    ScrollTrigger.create({
      trigger: bg,
      start: "top 5px",
      end: "bottom 20px",
      onEnter: function () {
        document.querySelector(".header").classList.remove("theme-light-home");
      },
      onLeave: function () {
        document.querySelector(".header").classList.add("theme-light-home");
      },
      onEnterBack: function () {
        document.querySelector(".header").classList.remove("theme-light-home");
      },
      onLeaveBack: function () {
        document.querySelector(".header").classList.add("theme-light-home");
      },
    });
  });
}
