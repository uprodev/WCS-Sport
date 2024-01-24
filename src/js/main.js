const isMobile = window.innerWidth < 1280;

// lenis
const lenis = new Lenis({
  lerp: 0.06,
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

jQuery(document).ready(function ($) {
  if (document.querySelector(".block-case-video")) {
    ScrollTrigger.create({
      trigger: ".block-case-video",
      start: "top center",
      onEnter: function () {
        document.querySelector(".block-case-video video").play();
      },
    });
  }

  if (document.querySelector(".block-home")) {
    // home parallax
    ScrollTrigger.create({
      trigger: ".block-home-2",
      start: "bottom top",
      onEnter: function () {
        $(".block-home-parallax").addClass("is-hidden");
      },
      onEnterBack: function () {
        $(".block-home-parallax").removeClass("is-hidden");
      },
    });

    gsap.to(".parallax-wrapper", {
      y: "-100vh",
      duration: 30,
      repeat: -1,
      ease: "none",
    });

    function homeTextSplit() {
      Splitting({
        target: document.querySelectorAll(".home-animated-text"),
        by: "chars",
        key: null,
        whitespace: false,
      });

      document.querySelectorAll(".home-animated-text").forEach((el) => {
        el.style.visibility = "visible";
      });
    }
    homeTextSplit();

    // home block 1 headlines
    var homeHeadline = document.querySelector(".home-headline"),
      homeText = document.querySelector(".home-text");
    var homeHeadlineChars = homeHeadline.querySelectorAll(".char");
    var homeTextChars = homeText.querySelectorAll(".char");
    var homeNumChars = document.querySelectorAll(".block-home-3 .number .char");

    var count = 1;
    homeHeadlineChars.forEach((el) => {
      el.classList.add("char-" + count);
      count++;
    });

    function homeTextAnimate() {
      gsap.to(homeHeadlineChars, {
        scrollTrigger: {
          trigger: homeHeadline,
          start: "top 90%",
        },
        duration: 1,
        // ease: "none",
        // ease: "power1.in",
        // ease: "power1.out",
        // ease: "power1.inOut",
        // ease: "elastic.out",
        ease: "bounce.out",

        x: 0,
        y: 0,
        opacity: 1,
        scaleX: 1,
        scaleY: 1,
        rotation: 0,
        rotationX: 0,
        rotationY: 0,
        rotationZ: 0,
        stagger: 0.1,
      });

      gsap.to(homeTextChars, {
        scrollTrigger: {
          trigger: homeText,
          start: "top 90%",
        },
        duration: 0.2,
        ease: "none",
        delay: 1,
        x: 0,
        y: 0,
        opacity: 1,
        scaleX: 1,
        stagger: 0.02,
      });

      gsap.to(homeNumChars, {
        scrollTrigger: {
          trigger: ".block-home-3",
          start: "top center",
        },
        duration: 0.15,
        ease: "none",
        delay: 1,
        x: 0,
        y: 0,
        opacity: 1,
        scaleX: 1,
        stagger: 0.1,
      });
    }
    homeTextAnimate();

    // home video
    var homeVideo = document.querySelector(".block-home-2 video");
    // function videoProgress(video) {
    //   video.addEventListener("timeupdate", function () {
    //     // if the video is loaded and duration is known
    //     if (!isNaN(this.duration)) {
    //       var percentComplete = this.currentTime / this.duration;
    //       console.log(percentComplete);
    //       gsap.to(".block-home-2 .progress", {
    //         scaleX: percentComplete,
    //         ease: "none",
    //       });
    //     }
    //   });
    // }

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

    // home horizontzl section
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
        // ScrollTrigger.create({
        //   trigger: ".block-home-4",
        //   start: "top top",
        //   end: "bottom top",
        //   pin: true,
        //   end: () => "+=" + (totalSlides - 1) * window.innerHeight, // Scroll end position beyond the last slide
        //   scrub: true,

        // });
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
  }

  function animateHeadlines(splits) {
    splits.forEach((spl) => {
      Splitting({
        target: spl,
        by: "chars",
        key: null,
        whitespace: false,
      });

      var chars = spl.querySelectorAll(".char");
      gsap.to(chars, {
        scrollTrigger: {
          trigger: spl,
          start: "top 90%",
        },
        duration: 0.35,
        ease: "none",
        y: "0",
        opacity: 1,
        stagger: 0.02,
      });
    });
    splits.forEach((spl) => {
      spl.style.visibility = "visible";
    });
  }

  var splits = document.querySelectorAll("h1, h2, h3, h4, .h1");
  animateHeadlines(splits);

  // fade up, in
  var animatedEls = document.querySelectorAll(".fade-up, .fade-in , .fade-up-wrapper > *, .block-text p, .block-text  li");
  animatedEls.forEach((el) => {
    gsap.to(el, {
      scrollTrigger: {
        trigger: el,
        start: "top 95%",
      },
      duration: 1,
      ease: "none",
      y: "0",
      opacity: 1,
    });
  });

  // header theme
  if (document.querySelector(".bg-secondary")) {
    document.querySelectorAll(".bg-secondary").forEach((bg) => {
      var className = "theme-light";
      if (document.querySelector(".block-home")) {
        className = "theme-light-home";
      }
      ScrollTrigger.create({
        trigger: bg,
        start: "top 5px",
        end: "bottom top",
        onEnter: function () {
          document.querySelector(".header").classList.add(className);
        },
        onLeave: function () {
          console.log(className);
          document.querySelector(".header").classList.remove(className);
        },
        onEnterBack: function () {
          document.querySelector(".header").classList.add(className);
        },
        onLeaveBack: function () {
          console.log(className);
          document.querySelector(".header").classList.remove(className);
        },
      });
    });
  }

  // scroller
  ScrollTrigger.create({
    trigger: ".block-scroll-list",
    start: "top top",
    end: "bottom bottom",
    pin: ".block-scroll-list .block-image",
  });

  document.querySelectorAll(".block-scroll-list .scroller li").forEach((li) => {
    gsap.to(li.querySelector(".text"), {
      scrollTrigger: {
        trigger: li.querySelector(".text"),
        start: "top 90%",
      },
      duration: 1,
      ease: "none",
      x: "0",
      opacity: 1,
    });
  });
  document.querySelectorAll(".block-scroll-list .scroller li").forEach((li) => {
    gsap.to(li.querySelector(".line"), {
      scrollTrigger: {
        trigger: li,
        start: "bottom 90%",
      },
      duration: 1,
      ease: "none",
      scaleX: 1,
    });
  });

  document.querySelectorAll(".block-careers-list ul li").forEach((li) => {
    gsap.to(li.querySelector(".line"), {
      scrollTrigger: {
        trigger: li,
        start: "bottom 90%",
      },
      duration: 1,
      ease: "none",
      scaleX: 1,
    });
  });

  document.querySelectorAll(".img-fade").forEach((img) => {
    gsap.to(img, {
      scrollTrigger: {
        trigger: img,
        start: "top 90%",
      },
      duration: 1,
      ease: "none",
      scaleX: 1,
      scaleY: 1,
      opacity: 1,
    });
  });

  $("[data-id=copyUrl]").on("click", function (e) {
    e.preventDefault();
    navigator.clipboard.writeText(window.location.href);
    $(this).addClass("copied");
    setTimeout(() => {
      $(this).removeClass("copied");
    }, 1000);
  });

  // footer
  function footer() {
    var fHeight = $(".footer").outerHeight();
    $(".global-wrapper").css("padding-bottom", fHeight);
  }
  footer();
  $(window).on("resize", function () {
    footer();
  });

  // swiper
  if (document.querySelector(".block-slider-variable-width")) {
    const swiperVar = new Swiper(".block-slider-variable-width .swiper", {
      loop: "true",
      slidesPerView: "auto",
      centeredSlides: true,
      freeMode: true,
      initialSlide: 2,
      spaceBetween: 16,
      breakpoints: {
        768: {
          spaceBetween: 24,
          freeMode: false,
          initialSlide: 3,
        },
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
        },
      },
    });
  }

  if (document.querySelector(".block-slider-content")) {
    const swiperContent = new Swiper(".block-slider-content .swiper", {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 50,
      pagination: {
        el: ".block-slider-content .swiper-pagination",
        clickable: true,
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
        },
      },
    });
  }

  if (document.querySelector(".block-slider-images")) {
    const swiperVar = new Swiper(".block-slider-images .swiper", {
      loop: "true",
      slidesPerView: 3,
      centeredSlides: true,
      spaceBetween: 16,
      loopAdditionalSlides: 4,
      breakpoints: {
        768: {
          slidesPerView: 5,
          spaceBetween: 16,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 32,
        },
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
        },
      },
    });
  }

  if (document.querySelector(".block-cases-slider")) {
    const swiperCases = new Swiper(".block-cases-slider .swiper", {
      loop: true,
      speed: 700,
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: ".block-cases-slider .swiper-pagination",
        clickable: true,
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
        },
        slideChangeTransitionStart: function (swiper) {
          console.log(swiper.realIndex);
          $(".block-cases-slider .swiper-controls li.active").removeClass("active");
          $(".block-cases-slider .swiper-controls li").each(function () {
            if (parseInt($(this).data("slide")) === swiper.realIndex) {
              $(this).addClass("active");
              var bulletPosition = $(this).position().top;
              gsap.to(".active-arrow", {
                duration: 0.3,
                ease: "none",
                y: bulletPosition,
              });
            }
          });
        },
      },
    });
    $(".block-cases-slider .swiper-controls li").on("click", function () {
      var slideNext = parseInt($(this).data("slide"));
      swiperCases.slideTo(slideNext, 700);
    });
  }

  // if (document.querySelector(".logos-slider")) {
  //   var logosSwiper = new Swiper(".logos-slider .swiper", {
  //     loop: true,
  //     speed: 3000,
  //     spaceBetween: 100,
  //     slidesPerView: "auto",
  //     freeMode: true,
  //     allowTouchMove: false,
  //     autoplay: {
  //       delay: 0,
  //       disableOnInteraction: false,
  //     },
  //     breakpoints: {
  //       1024: {
  //         speed: 5000,
  //         spaceBetween: 176,
  //       },
  //     },
  //   });
  // }

  if (document.querySelector(".block-cases-carousel")) {
    var swiperCasesInit = false;
    var swiperCases;
    if ($(window).width() < 768) {
      if (swiperCasesInit) {
        swiperCases.destroy();
        swiperCasesInit = false;
      }
    } else {
      if (!swiperCasesInit) {
        swiperCases = new Swiper(".block-cases-carousel .swiper", {
          loop: false,
          slidesPerView: 3,
          spaceBetween: 16,
          breakpoints: {
            768: {
              slidesPerView: 2,
              spaceBetween: 24,
            },
            1900: {
              slidesPerView: 3,
              spaceBetween: 24,
            },
          },
          on: {
            init: function () {
              ScrollTrigger.refresh();
              swiperCasesInit = true;
            },
          },
        });
      }
    }

    $(window).on("resize", function () {
      if ($(window).width() < 768) {
        if (swiperCasesInit) {
          swiperCases.destroy();
          swiperCasesInit = false;
        }
      } else {
        if (!swiperCasesInit) {
          const swiperCases = new Swiper(".block-cases-carousel .swiper", {
            loop: false,
            slidesPerView: 3,
            spaceBetween: 16,
            breakpoints: {
              768: {
                slidesPerView: 2,
                spaceBetween: 24,
              },
              1900: {
                slidesPerView: 3,
                spaceBetween: 24,
              },
            },
            on: {
              init: function () {
                ScrollTrigger.refresh();
                swiperCasesInit = true;
              },
            },
          });
        }
      }
    });

    ScrollTrigger.matchMedia({
      "(max-width:767px)": function () {
        document.querySelectorAll(".block-cases-carousel .swiper-slide").forEach((slide) => {
          gsap.to(slide.querySelector(".card-case"), {
            scrollTrigger: {
              trigger: slide,
              start: "top center",
              end: "bottom center",
              toggleActions: "play reverse play reverse",
            },
            duration: 0.5,
            ease: "none",
            backgroundColor: "#e5ff00",
          });

          gsap.to(slide.querySelector(".img-fade"), {
            scrollTrigger: {
              trigger: slide,
              start: "top center",
              end: "bottom center",
              toggleActions: "play reverse play reverse",
            },
            duration: 0.5,
            ease: "none",
            paddingTop: "53%",
          });
        });
      },
    });
  }

  if (document.querySelector(".testimonials-slider")) {
    const swiperContent = new Swiper(".testimonials-slider .swiper", {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 200,
      autoHeight: true,
      pagination: {
        el: ".testimonials-slider .swiper-pagination",
        clickable: true,
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
        },
      },
    });
  }

  if ($(".header .navbar-toggler").length) {
    // menu toggle
    $(".header .navbar-toggler").on("click", function () {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(".navigation-main").removeClass("active");
        $(".header").removeClass("nav-opened");
      } else {
        $(this).addClass("active");
        $(".navigation-main").addClass("active");
        $(".header").addClass("nav-opened");
      }
    });
  }

  $("body").imagesLoaded(function () {
    ScrollTrigger.refresh();
  });

  // podcast player

  function secToMin(time) {
    time = parseFloat(time).toFixed(2);
    var minutes = Math.floor(time / 60);
    var seconds = parseInt(time - minutes * 60);
    if (minutes < 10) {
      minutes = "0" + minutes;
    }
    if (seconds < 10) {
      seconds = "0" + seconds;
    }

    return { m: minutes, s: seconds };
  }

  if (document.getElementById("audio")) {
    const wavesurfer = WaveSurfer.create({
      container: "#audio",
      url: "../media/audio.mp3",
      height: 60,
      width: "100%",
      splitChannels: false,
      normalize: false,
      waveColor: "#bacc1f",
      progressColor: "#cbde21",
      cursorWidth: 0,
      barGap: null,
      barRadius: null,
      barHeight: null,
      barAlign: "",
      minPxPerSec: 15,
      fillParent: true,
      mediaControls: false,
      autoplay: false,
      interact: true,
      dragToSeek: false,
      hideScrollbar: true,
      audioRate: 1,
      autoScroll: true,
      autoCenter: true,
      sampleRate: 8000,
    });

    $(".btn-controls-open").on("click", function () {
      $(".audio-controls").css("display", "flex");
    });

    $(".btn-controls-close").on("click", function () {
      $(".audio-controls").css("display", "none");
    });

    $(".audio-speed span").on("click", function () {
      $(".audio-speed ul").slideToggle(100);
    });

    var audioReady = false;
    wavesurfer.on("ready", (duration) => {
      $("#timeTotal").text(secToMin(duration).m + ":" + secToMin(duration).s);
      audioReady = true;
    });

    wavesurfer.on("timeupdate", (currentTime) => {
      console.log(secToMin(currentTime));
      $("#timePassed").text(secToMin(currentTime).m + ":" + secToMin(currentTime).s);
    });

    $(".audio-speed ul li").on("click", function () {
      if (!audioReady) return;
      var speed = parseFloat($(this).data("val"));
      $(".audio-speed span").text(speed + " X");
      $(".audio-speed ul").slideUp(100);
      wavesurfer.setPlaybackRate(speed);
    });

    $(".btn-play").on("click", function () {
      if (!audioReady) return;
      $(this).toggleClass("paused");
      wavesurfer.playPause();
    });
  }

  $(".btn-video-play").on("click", function () {
    if ($(this).hasClass("playing")) {
      $(this).parent().find("video").get(0).pause();
      $(this).removeClass("playing");
    } else {
      $(this).parent().find("video").get(0).play();
      $(this).addClass("playing");
    }
  });
});
