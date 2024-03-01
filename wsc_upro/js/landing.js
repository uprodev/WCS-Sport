// preloader

lenis.scrollTo(0, {
  duration: 0.1,
  onComplete: () => {
    lenis.stop();
  },
});

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
  if (direction === 1 && !document.querySelector(".block-home-preloader").classList.contains("is-hidden") && homeFirst.getBoundingClientRect().top < window.screen.availHeight) {
    lenis.scrollTo(homeFirst, {
      duration: 0,
      onComplete: () => {
        lenis.stop();
      },
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

// split texts
const headline1 = SplitType.create("#headline1");
const numbers = SplitType.create(".block-home-3 .number");
var duration1 = 1;
var duration2 = 2;
var headline1Length = headline1.chars.length;
headline1.chars.forEach((el, i) => {
  if (i < Math.round(headline1Length / 2)) {
    duration1 += 0.25;
    duration2 -= 0.2;
  } else {
    duration1 -= 0.25;
    duration2 += 0.2;
  }
  el.setAttribute("data-duration1", duration1);
  el.setAttribute("data-duration2", duration2);
});

document.querySelectorAll(".text-line").forEach((text) => {
  const txt = SplitType.create(text);
});

function animateBlock1() {
  gsap.to(".block-home-1 .home-parallax .layer-4 .video", {
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
      lenis.start();
      headline1.chars.forEach((char) => {
        gsap.set(char, { y: 0 });
      });
      ScrollTrigger.create({
        trigger: ".block-home-1",
        start: "top -2%",
        end: "bottom 99%",
        // markers: true,
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

document.querySelectorAll(".parallax-item").forEach((el) => {
  var transition = Math.random() * (0.5 - 0.1) + 0.1;
  el.style.transitionDuration = transition + "s";
  var speed = Math.random() * (0.8 - 0.4) + 0.4;
  gsap.to(el, {
    scrollTrigger: {
      trigger: ".global-wrapper",
      start: "top top",
      scrub: true,
    },
    duration: 0.5,
    ease: "none",
    onUpdate: function () {
      var delta = lenis.scroll * speed * -1;
      if (document.querySelector(".block-home-preloader").classList.contains("is-hidden")) {
        el.style.transform = `translateY(${delta}px)`;
      }
    },
  });
});

let videoW = "14.3vw";
let videoH = "8.6vw";

if (window.screen.width < 1024) {
  videoW = "200px";
  videoH = "130px";
}

const animationHome2 = gsap.timeline({
  scrollTrigger: {
    trigger: ".block-home-2",
    start: "top top",
    end: "bottom bottom",
    scrub: true,
  },
});
animationHome2
  .to(".block-home-2 .video-inner", {
    y: 0,
    duration: 0.2,
    ease: "none",
  })
  .to(".text-line-1 .char", {
    y: 0,
    duration: 0.2,
    stagger: 0.1,
    ease: "none",
  })
  .to(
    ".text-line-2 .char",
    {
      y: 0,
      duration: 0.2,
      stagger: 0.1,
      ease: "none",
    },
    "-=0.4"
  )
  .to(".block-home-2 .video-inner", {
    rotate: 90,
    duration: 0.6,
    ease: "none",
  })
  .to(
    ".block-home-2 .video-inner video",
    {
      rotate: -90,
      duration: 0.6,
      ease: "none",
    },
    "-=0.6"
  )
  .to(
    ".text-line-2 .char",
    {
      y: "-120%",
      duration: 0.2,
      stagger: 0.1,
      ease: "none",
    },
    "-=0.6"
  )
  .to(
    ".text-line-3 .char",
    {
      y: 0,
      duration: 0.2,
      stagger: 0.1,
      ease: "none",
    },
    "-=0.2"
  )
  .to(".block-home-2 .video", {
    width: videoH,
    duration: 0.2,
    ease: "none",
  })
  .to(".block-home-2 .video", {
    height: videoW,
    duration: 0.6,
    ease: "none",
  })
  .to(
    ".text-line-3 .char",
    {
      y: "-120%",
      duration: 0.2,
      stagger: 0.1,
      ease: "none",
    },
    "-=0.6"
  )
  .to(
    ".text-line-4 .char",
    {
      y: 0,
      duration: 0.2,
      stagger: 0.1,
      ease: "none",
    },
    "-=0.2"
  )
  .to(".block-home-2 .video-inner", {
    rotate: 180,
    duration: 0.6,
    ease: "none",
  })
  .to(
    ".block-home-2 .video-inner video",
    {
      rotate: -180,
      duration: 0.6,
      ease: "none",
    },
    "-=0.6"
  )
  .to(
    ".text-line-4 .char",
    {
      y: "-120%",
      duration: 0.2,
      stagger: 0.1,
      ease: "none",
    },
    "-=0.6"
  )
  .to(
    ".text-line-5 .char",
    {
      y: 0,
      duration: 0.2,
      stagger: 0.1,
      ease: "none",
    },
    "-=0.2"
  )
  .to(".text-line-1 .char, .text-line-5 .char", {
    y: "-120%",
    duration: 0.2,
    stagger: 0.1,
    ease: "none",
  })
  .to(".block-home-2 .video", {
    width: "100vw",
    height: "100vh",
    duration: 1,
    ease: "none",
  })
  .to(
    ".block-home-2 .video-inner video",
    {
      left: "0%",
      top: "0%",
      width: "100%",
      height: "100%",
      duration: 0.5,
      ease: "none",
    },
    "-=0.5"
  )
  .to(".text1", {
    zIndex: 2,
    duration: 1,
    ease: "none",
  })
  .to(
    ".text2",
    {
      height: 0,
      duration: 1,
      ease: "none",
    },
    "-=1"
  )
  .to(
    ".text3",
    {
      height: "1.2em",
      duration: 1,
      ease: "none",
    },
    "-=1"
  )
  .to(".text-line-6 .char", {
    y: 0,
    duration: 0.2,
    stagger: 0.1,
    ease: "none",
  })
  .to(
    ".text-line-7 .char",
    {
      y: 0,
      duration: 0.2,
      stagger: 0.1,
      ease: "none",
    },
    "-=0.2"
  )
  .to(
    ".text-line-6 .char",
    {
      y: "-120%",
      duration: 0.2,
      stagger: 0.1,
      ease: "none",
    },
    "+=0.5"
  )
  .to(
    ".text-line-7 .char",
    {
      y: "-120%",
      duration: 0.2,
      stagger: 0.1,
      ease: "none",
    },
    "-=0.6"
  )
  .to(".block-home-2 .video-block", {
    backgroundColor: "#3e3e3e",
    width: 240,
    height: 450,
    borderRadius: "5px",
    padding: "22px",
    duration: 1,
    ease: "none",
  })
  .to(
    ".block-home-2 .video-block .video-text",
    {
      height: 100,
      duration: 1,
      ease: "none",
    },
    "-=1"
  )
  .to(
    ".block-home-2 .video-block .video-wrapper",
    {
      width: 196,
      height: 305,
      duration: 1,
      ease: "none",
    },
    "-=1"
  )
  .to(
    ".block-home-2 .video",
    {
      width: "100%",
      height: "100%",
      duration: 1,
      ease: "none",
    },
    "-=1"
  )
  .to(
    ".block-home-2 .boxes",
    {
      opacity: 0.5,
      duration: 0.2,
      ease: "none",
    },
    "-=1"
  )
  .from(
    ".block-home-2 .box",
    {
      left: "40%",
      top: "40%",
      duration: 0.6,
      ease: "none",
    },
    "-=0.5"
  )
  .to(
    ".block-home-2 .box1",
    {
      y: "-50%",
      opacity: 0,
      duration: 0.5,
      ease: "none",
    },
    "+=1"
  )
  .to(
    ".block-home-2 .box2,.block-home-2 .box3,.block-home-2 .box4,.block-home-2 .box5,.block-home-2 .box6",
    {
      x: "-100%",
      opacity: 0,
      duration: 0.5,
      ease: "none",
    },
    "-=0.5"
  )
  .to(
    ".block-home-2 .box7,.block-home-2 .box8",
    {
      y: "50%",
      opacity: 0,
      duration: 0.5,
      ease: "none",
    },
    "-=0.5"
  )
  .to(
    ".block-home-2 .box9,.block-home-2 .box10,.block-home-2 .box11",
    {
      x: "100%",
      opacity: 0,
      duration: 0.5,
      ease: "none",
    },
    "-=0.5"
  )
  .to(
    ".block-home-2 .video-block",
    {
      top: "0%",
      duration: 0.5,
      ease: "none",
    },
    "-=0.5"
  );

// home video
var homeVideo2 = document.querySelector(".block-home-2 video");

ScrollTrigger.create({
  trigger: ".block-home-2",
  start: "top center",
  onEnter: function () {
    homeVideo2.play();
  },
  // onEnterBack: function () {
  //   homeVideo2.play();
  // },
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
