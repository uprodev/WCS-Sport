lenis.scrollTo(0, { duration: 0 });
lenis.stop();

let p1 = document.getElementById("preloader1");
let p2 = document.getElementById("preloader2");
p1.addEventListener("ready", () => {
  ScrollTrigger.refresh();
  p1.play();
});
p2.addEventListener("ready", () => {
  p2.play();
});
p1.addEventListener("complete", () => {
  p1.style.opacity = 0;
  document.querySelector(".block-home-preloader").classList.add("step2");
  lenis.start();
});

lenis.on("scroll", function ({ direction, scroll }) {
  var homeFirst = document.querySelector(".block-home-1");
  console.log(scroll, homeFirst.getBoundingClientRect().top);
  if (direction === 1 && !document.querySelector(".block-home-preloader").classList.contains("is-hidden") && homeFirst.getBoundingClientRect().top < window.screen.availHeight) {
    lenis.scrollTo(homeFirst, {
      duration: 0,
    });
    gsap.to(".block-home-preloader", {
      y: "-100%",
      ease: "none",
      duration: 0.15,
      onComplete: function () {
        setTimeout(() => {
          document.querySelector(".block-home-preloader").classList.add("is-hidden");
        }, 5000);
        animateBlock1();
      },
    });
  }
});

const headline1 = SplitType.create("#headline1");
var duration1 = 1;
var duration2 = 2;
var headline1Length = headline1.chars.length;
headline1.chars.forEach((el, i) => {
  console.log(i < Math.round(headline1Length / 2));
  if (i < Math.round(headline1Length / 2)) {
    duration1 += 0.2;
    duration2 -= 0.2;
  } else {
    duration1 -= 0.2;
    duration2 += 0.2;
  }
  el.setAttribute("data-duration1", duration1);
  el.setAttribute("data-duration2", duration2);
});

function animateBlock1() {
  gsap.to(".block-home-1 .home-parallax .layer.layer-4 .video", {
    width: "9vw",
    height: "16vw",
    ease: "power4.in",
    duration: 4,
  });
  document.querySelectorAll(".parallax-item").forEach((el) => {
    gsap.to(el, {
      y: 0,
      duration: 4,
      ease: "power4.out",
      delay: 3,
    });
  });
  headline1.chars.forEach((char) => {
    gsap.to(char, {
      y: 0,
      duration: char.dataset.duration2,
      ease: "back.out",
      // ease: CustomEase.create("custom", "M0,0 C0,0 0.086,0.187 0.124,0.261 0.154,0.32 0.199,0.385 0.225,0.45 0.246,0.51 0.372,0.669 0.4,0.716 0.423,0.757 0.581,0.916 0.608,0.943 0.632,0.967 0.774,1.032 0.8,1.044 0.825,1.055 0.876,1.065 0.912,1.064 1.007,1.061 1,1 1,1 "),
      delay: 4,
      onComplete: function () {},
    });
  });
  gsap.to(".block-home-1 .home-parallax .layer.layer-4 .video", {
    y: "-80vh",
    ease: "none",
    duration: 2,
    delay: 4,
  });
  gsap.to(".block-home-1 .text p", {
    y: 0,
    duration: 0.6,
    ease: "none",
    delay: 5,
    onComplete: function () {
      headline1.chars.forEach((char) => {
        gsap.set(char, { y: 0 });
      });
      ScrollTrigger.create({
        trigger: ".block-home-1 .headline-main",
        start: "center 40%",
        end: "center 60%",
        onEnter: () => {
          headline1.chars.forEach((char) => {
            gsap.to(char, {
              y: "-100vh",
              duration: char.dataset.duration1,
              ease: "none",
            });
          });
          gsap.to(".block-home-1 .text p", {
            y: "-100%",
            duration: 0.5,
            ease: "none",
          });
        },
        onEnterBack: () => {
          console.log("back");
          headline1.chars.forEach((char) => {
            gsap.to(char, {
              y: 0,
              duration: char.dataset.duration1,
              ease: "power4.out",
            });
          });
          gsap.to(".block-home-1 .text p", {
            y: 0,
            duration: 0.5,
            ease: "none",
          });
        },
      });
    },
  });
}
// animateBlock1();

const animationHome1 = gsap.timeline({ paused: true });

document.querySelectorAll(".parallax-item").forEach((el) => {
  var transition = Math.random() * (0.5 - 0.1) + 0.1;
  el.style.transitionDuration = transition + "s";
  var speed = Math.random() * (0.8 - 0.4) + 0.4;
  gsap.to(el, {
    scrollTrigger: {
      trigger: ".global-wrapper",
      start: "top top",
      // end: "bottom -100%",
      scrub: true,
    },
    // y: (el.getBoundingClientRect().top - window.innerHeight) / 2,
    // y: window.scrollY * 0.2,
    // y: lenis.scroll * -0.5,
    duration: 0.5,
    ease: "none",
    onUpdate: function () {
      var delta = lenis.scroll * speed * -1;
      console.log(document.querySelector(".block-home-preloader").classList.contains("is-hidden"));
      if (document.querySelector(".block-home-preloader").classList.contains("is-hidden")) {
        el.style.transform = `translateY(${delta}px)`;
      }
    },
  });
});

// home video
var homeVideo = document.querySelector(".block-home-2 video");

ScrollTrigger.create({
  trigger: ".block-home-2",
  start: "top center",
  onEnter: function () {
    homeVideo.play();
  },
  onEnterBack: function () {
    homeVideo.play();
  },
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
