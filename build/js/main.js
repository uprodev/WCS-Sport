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
    // gsap.to(".block-home-parallax", {
    //   scrollTrigger: {
    //     trigger: ".block-home-1",
    //     start: "top top",
    //     end: "bottom top",
    //     scrub: true,
    //   },
    //   y: "-100%",
    // });

    lenis.on("scroll", function () {});

    document.querySelectorAll(".parallax-item").forEach((el) => {
      var transition = Math.random() * (0.5 - 0.1) + 0.1;
      // el.style.transitionDuration = transition + "s";
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
          el.style.transform = `translateY(${delta}px)`;
        },
      });
    });

    // gsap.to(".parallax-item", {
    //   y: "-100vh",
    //   duration: 30,
    //   repeat: -1,
    //   ease: "none",
    // });

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
      if (!spl.parentNode.classList.contains("lines-wrapper")) {
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
      }
    });
    splits.forEach((spl) => {
      spl.style.visibility = "visible";
    });
  }

  var splits = document.querySelectorAll("h1:not(.not-animated), h2, h3, h4, .h1");
  animateHeadlines(splits);

  if (document.querySelector(".lines-wrapper")) {
    var splits1 = document.querySelectorAll(".lines-wrapper > *");

    function splitLines() {
      splits1.forEach((txt) => {
        const text = SplitType.create(txt);
        var d = 0.5;
        if (txt.tagName === "H1") {
          d = 1;
        }

        var lines = txt.querySelectorAll(".line");

        lines.forEach((line, i) => {
          gsap.to(line.querySelectorAll(".word"), {
            scrollTrigger: {
              trigger: txt,
              start: "top 80%",
            },
            y: 0,
            opacity: 1,
            duration: d,
            delay: 0.1 * i,
            ease: "power.easeIn",
            onComplete: function () {
              txt.classList.add("animated");
            },
          });
        });
      });
    }

    splitLines();
    $(window).on("resize", function () {
      splitLines();
    });
  }

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

  var animatedEls = document.querySelectorAll(".fade-up-overflow > *");
  animatedEls.forEach((el) => {
    gsap.to(el, {
      scrollTrigger: {
        trigger: el,
        start: "top 95%",
      },
      duration: 0.4,
      ease: "none",
      y: "0",
    });
  });

  // header theme
  if (document.querySelector(".block-banner-article")) {
    ScrollTrigger.create({
      trigger: ".block-banner-article",
      start: "top 5px",
      end: "bottom top",
      onEnter: function () {
        document.querySelector(".header").classList.add("theme-light-half");
      },
      onLeave: function () {
        document.querySelector(".header").classList.remove("theme-light-half");
      },
      onEnterBack: function () {
        document.querySelector(".header").classList.add("theme-light-half");
      },
      onLeaveBack: function () {
        document.querySelector(".header").classList.remove("theme-light-half");
      },
    });
  }
  if (document.querySelector(".bg-secondary")) {
    document.querySelectorAll(".bg-secondary").forEach((bg) => {
      var className = "theme-light";
      if (document.querySelector(".block-home")) {
        className = "theme-light-home";
      }
      ScrollTrigger.create({
        trigger: bg,
        start: "top 5px",
        end: "bottom 20px",
        onEnter: function () {
          document.querySelector(".header").classList.add(className);
        },
        onLeave: function () {
          document.querySelector(".header").classList.remove(className);
        },
        onEnterBack: function () {
          document.querySelector(".header").classList.add(className);
        },
        onLeaveBack: function () {
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
    const swiperCases1 = new Swiper(".block-cases-slider .swiper-inner", {
      loop: true,
      speed: 1500,
      slidesPerView: 1,
      spaceBetween: 0,
      direction: "vertical",
      allowTouchMove: false,
      initialSlide: 4,
      on: {
        init: function () {
          ScrollTrigger.refresh();
        },
      },
    });

    const swiperCases = new Swiper(".block-cases-slider .swiper-outer", {
      loop: true,
      speed: 1500,
      slidesPerView: 1,
      spaceBetween: 0,
      direction: "vertical",
      allowTouchMove: false,
      // allowSlidePrev: false,
      autoplay: {
        delay: 4500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".block-cases-slider .swiper-pagination",
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
          $(".block-cases-slider .swiper-controls li:first-child").addClass("active");
        },
        slideChangeTransitionStart: function (swiper) {
          var total = $(".block-cases-slider .swiper-outer .swiper-slide").length - 1;
          var currentInner = total - swiper.realIndex;
          swiperCases1.slideToLoop(currentInner, 1500);

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
      var slide = parseInt($(this).data("slide"));
      swiperCases.slideTo(slide);
    });
  }

  if (document.querySelector(".block-logos")) {
    $(".logos-list ul li").each(function () {
      $(this).addClass("swiper").find(".logo-inner").addClass("swiper-wrapper").find("span").addClass("swiper-slide");
    });
    document.querySelectorAll(".logos-list ul li").forEach((li) => {
      var logosSwiper = new Swiper(li, {
        loop: true,
        direction: "vertical",
        speed: 1000,
        spaceBetween: 0,
        slidesPerView: 1,
        allowTouchMove: false,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
      });
    });
  }

  if (document.querySelector(".block-cases-carousel")) {
    ScrollTrigger.matchMedia({
      "(max-width:767px)": function () {
        document.querySelectorAll(".block-cases-carousel .slide").forEach((slide) => {
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
      "(min-width:768px)": function () {
        var casesContainer = document.querySelector(".block-cases-carousel"),
          animatedCases = document.querySelector(".block-cases-carousel .wrapper");
        gsap.to(animatedCases, {
          x: (animatedCases.scrollWidth - casesContainer.offsetWidth) * -1,
          scrollTrigger: {
            trigger: casesContainer,
            start: "top top",
            end: () => "+=" + animatedCases.scrollWidth,
            scrub: true,
            pin: true,
          },
        });
      },
    });
  }

  if (document.querySelector(".testimonials-slider")) {
    document.querySelectorAll(".testimonials-slider .item .blockquote p").forEach((txt) => {
      const text = SplitType.create(txt);
      const resizeObserver = new ResizeObserver((entries) => {
        text.split();
      });
      resizeObserver.observe(txt);
    });

    const swiperContent = new Swiper(".testimonials-slider .swiper", {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 200,
      autoHeight: true,
      autoplay: {
        delay: 15000,
      },
      pagination: {
        el: ".testimonials-slider .swiper-pagination",
        clickable: true,
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
        },
        click: function (swiper) {
          swiper.slideNext();
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
      url: "http://ru.novikova.upro.space/wsc/media/audio.mp3",
      // url: "http://localhost:3333/media/audio.mp3",
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
      $(this).toggleClass("is-playing");
      wavesurfer.playPause();
    });
  }

  $(".btn-watch").on("click", function () {
    var video = $(this).closest(".video-wrapper").find("video").get(0);
    video.play();
    $(this).hide();
    $(this).closest(".video-wrapper").find(".video-controls").css("display", "flex");
    $(this).closest(".video-wrapper").find(".video-play").removeClass("is-paused");
  });

  $(".video-replay").on("click", function () {
    var video = $(this).closest(".video-wrapper").find("video").get(0);
    video.pause();
    video.currentTime = "0";
    video.play();
    $(this).closest(".video-wrapper").find(".video-play").removeClass("is-paused");
  });
  $(".video-play").on("click", function () {
    var video = $(this).closest(".video-wrapper").find("video").get(0);
    if ($(this).hasClass("is-paused")) {
      video.play();
      $(this).removeClass("is-paused");
    } else {
      video.pause();
      $(this).addClass("is-paused");
    }
  });
  $(".video-sound").on("click", function () {
    var video = $(this).closest(".video-wrapper").find("video").get(0);
    if ($(this).hasClass("is-active")) {
      video.muted = true;
      $(this).removeClass("is-active");
    } else {
      video.muted = false;
      $(this).addClass("is-active");
    }
  });

  $(".video-wrapper video").on("ended", function () {
    $(this).closest(".video-wrapper").find(".video-play").addClass("is-paused");
  });

  if ($(".page-header-case").length) {
    setTimeout(() => {
      var video = $(".page-header-case").find("video").get(0);
      video.play();
      $(".btn-watch").hide();
      $(".page-header-case").find(".video-controls").css("display", "flex");
      $(".page-header-case").find(".video-play").removeClass("is-paused");
    }, 1000);
  }
});
