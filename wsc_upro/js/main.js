const isMobile = window.innerWidth < 1280;

function footer() {
  var fHeight = document.querySelector(".footer").clientHeight;
  document.querySelector(".global-wrapper").style.paddingBottom = fHeight + "px";
}
footer();

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
  lenis.on("scroll", function () {
    if ($(".block-blog-article").length) {
      if (lenis.actualScroll > $(window).height()) {
        $(".scroll-to-top").addClass("active");
      } else {
        $(".scroll-to-top").removeClass("active");
      }
    }
    if ($(".block-featured-article").length && $(window).width() < 768) {
      if (lenis.actualScroll > $(".block-cards-list .col-md-6:nth-child(3)").offset().top - $(window).height() / 2) {
        $(".scroll-to-top").addClass("active");
      } else {
        $(".scroll-to-top").removeClass("active");
      }
    }
  });
  $(".scroll-to-top").on("click", function () {
    lenis.scrollTo(0, { duration: 1 });
  });
  $(window).on("resize", function () {
    if ($(".block-featured-article").length && $(window).width() >= 768) {
      $(".scroll-to-top").removeClass("active");
    }
  });
  $(".block-cards-list .btn-wrapper .btn").on("click", function () {
    $(".scroll-to-top").addClass("active");
  });

  if (document.querySelector(".block-case-video video")) {
    ScrollTrigger.create({
      trigger: ".block-case-video",
      start: "top center",
      onEnter: function () {
        document.querySelector(".block-case-video video").play();
      },
    });
  }

  if (document.querySelector(".lines-wrapper")) {
    var splits1 = document.querySelectorAll(".lines-wrapper h1, .lines-wrapper h2, .lines-wrapper h3, .lines-wrapper h4, .lines-wrapper .h1, .lines-wrapper .h2, .lines-wrapper .h3, .lines-wrapper .h4, .lines-wrapper p, .lines-wrapper ul li, .lines-wrapper ol li");

    function splitLines() {
      splits1.forEach((txt) => {
        const text = SplitType.create(txt);
        var d = 0.4;
        if (txt.tagName === "H1") {
          d = 1;
        }

        var lines = txt.querySelectorAll(".line");

        lines.forEach((line, i) => {
          gsap.to(line.querySelectorAll(".word"), {
            scrollTrigger: {
              trigger: txt,
              start: "top 90%",
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
    var winWidth = $(window).width();
    $(window).on("resize", function () {
      if ($(window).width() !== winWidth) {
        splitLines();
        winWidth = $(window).width();
      }
    });
  }

  if (document.querySelector(".block-banner-article")) {
    var splits2 = document.querySelectorAll(".block-banner-article h1");

    function splitLines() {
      splits2.forEach((txt) => {
        const text = SplitType.create(txt, { types: "words, chars" });
        var d = 0.4;

        var words = txt.querySelectorAll(".words");

        gsap.to(txt.querySelectorAll(".char"), {
          scrollTrigger: {
            trigger: txt,
            start: "top 80%",
          },
          y: 0,
          opacity: 1,
          duration: d,
          // delay: 0.1 * i,
          ease: "power.easeIn",
          onComplete: function () {
            txt.classList.add("animated");
          },
        });
      });
    }

    splitLines();
    var winWidth = $(window).width();
    $(window).on("resize", function () {
      if ($(window).width() !== winWidth) {
        splitLines();
        winWidth = $(window).width();
      }
    });
  }

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
  if (!document.querySelector(".global-wrapper-home") && document.querySelector(".bg-secondary")) {
    document.querySelectorAll(".bg-secondary").forEach((bg) => {
      var className = "theme-light";
      if (document.querySelector(".block-home")) {
        className = "theme-light-home";
      }
      ScrollTrigger.create({
        trigger: bg,
        start: "top 30px",
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
  if ($(".block-scroll-list").length) {
    ScrollTrigger.create({
      trigger: ".block-scroll-list",
      start: "top top",
      end: "bottom bottom",
      pin: ".block-scroll-list .block-image",
    });

    document.querySelectorAll(".block-scroll-list .scroller li").forEach((li) => {
      gsap.to(li.querySelector(".underline"), {
        scrollTrigger: {
          trigger: li,
          start: "bottom 90%",
        },
        duration: 1,
        ease: "none",
        scaleX: 1,
      });
    });
  }

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

    if (navigator.share) {
      navigator
        .share({
          title: $("h1").text(),
          url: window.location.href,
        })
        .then(() => console.log("Successful share"))
        .catch((error) => console.log("Error sharing", error));
    } else {
      navigator.clipboard.writeText(window.location.href);
      $(this).addClass("copied");
      setTimeout(() => {
        $(this).removeClass("copied");
      }, 1000);
    }
  });

  // footer
  $(window).on("resize", function () {
    footer();
  });
  ScrollTrigger.create({
    trigger: "main.content",
    start: "bottom bottom",
    toggleClass: { targets: ".footer", className: "is-active" },
  });
  ScrollTrigger.create({
    trigger: "main.content",
    start: "bottom 82",
    toggleClass: { targets: ".header", className: "hidden" },
  });

  // swiper
  if (document.querySelector(".block-careers-filter")) {
    const swiperVar = new Swiper(".block-careers-filter .swiper", {
      loop: true,
      speed: 1000,
      slidesPerView: 1,
      spaceBetween: 0,
      direction: "vertical",
      allowTouchMove: false,
      effect: "creative",
      creativeEffect: {
        prev: {
          shadow: true,
          translate: [0, "-100%", 0],
        },
        next: {
          translate: [0, "100%", 0],
        },
      },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
        },
      },
    });

    $.jStyling.createSelect($(".block-careers-filter .careers-filter select"));
  }

  if (document.querySelector(".block-slider-content")) {
    const swiperContent = new Swiper(".block-slider-content .swiper", {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 50,
      autoplay: {
        delay: 5000,
      },
      duration: 600,
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

  if (document.querySelector(".block-awards")) {
    const swiperContent = new Swiper(".block-awards .swiper", {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 50,
      autoplay: {
        delay: 5000,
      },
      duration: 600,
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
    document.querySelectorAll(".block-cases-slider .swiper-outer .item .slide-title").forEach((txt) => {
      const headlineSlide = SplitType.create(txt);
      const lines = txt.querySelectorAll(".line");

      lines.forEach((line, i) => {
        gsap.to(line.querySelectorAll(".word"), {
          scrollTrigger: {
            trigger: txt,
            start: "top 30%",
          },
          y: 0,
          opacity: 1,
          duration: 0.5,
          delay: 0.1 * i,
          ease: "power.easeIn",
        });
      });
    });

    gsap.to(".block-cases-slider .swiper-controls", {
      scrollTrigger: {
        trigger: ".block-cases-slider",
        start: "top 30%",
      },
      y: 0,
      opacity: 1,
      duration: 0.5,
      ease: "none",
    });

    var total = $(".block-cases-slider .swiper-outer .swiper-slide").length - 1;

    const swiperCases1 = new Swiper(".block-cases-slider .swiper-inner", {
      loop: true,
      speed: 1000,
      slidesPerView: 1,
      spaceBetween: 0,
      direction: "vertical",
      allowTouchMove: false,
      initialSlide: total,
      effect: "creative",
      creativeEffect: {
        prev: {
          shadow: true,
          translate: [0, "-100%", 0],
        },
        next: {
          translate: [0, "100%", 0],
        },
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
        },
      },
    });

    const swiperCases = new Swiper(".block-cases-slider .swiper-outer", {
      loop: true,
      speed: 1000,
      slidesPerView: 1,
      spaceBetween: 0,
      direction: "vertical",
      allowTouchMove: false,
      effect: "creative",
      creativeEffect: {
        prev: {
          shadow: true,
          translate: [0, "100%", 0],
        },
        next: {
          translate: [0, "-100%", 0],
        },
      },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".block-cases-slider .swiper-pagination",
        clickable: true,
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
          $(".block-cases-slider .swiper-controls li:first-child").addClass("active");
        },
        slideChangeTransitionStart: function (swiper) {
          var currentInner = total - swiper.realIndex;
          // console.log(total, swiper.realIndex, currentInner);
          swiperCases1.slideToLoop(currentInner);

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
        slideChangeTransitionEnd: function () {
          const linesActive = document.querySelectorAll(".block-cases-slider .swiper-outer .swiper-slide-active .line");

          linesActive.forEach((lineActive, i) => {
            gsap.to(lineActive.querySelectorAll(".word"), {
              y: 0,
              opacity: 1,
              duration: 0.5,
              delay: 0.1 * i,
              ease: "power.easeIn",
            });
          });
        },
      },
    });

    $(".block-cases-slider .swiper-controls li").on("click", function () {
      var slide = parseInt($(this).data("slide"));
      console.log(swiperCases.realIndex, total);
      swiperCases.slideToLoop(slide);
    });

    const observer = new IntersectionObserver((entries) => {
      const firstEntry = entries[0];
      if (firstEntry.isIntersecting) {
        swiperCases.autoplay.start();
      } else {
        swiperCases.autoplay.stop();
      }
    });
    const swiperContainer = document.querySelector(".block-cases-slider .swiper-inner-wrapper");
    observer.observe(swiperContainer);
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
          delay: Math.floor(Math.random() * (5200 - 5000 + 1) + 5000),
          disableOnInteraction: false,
        },
      });
    });
  }

  if (document.querySelector(".testimonials-slider")) {
    document.querySelectorAll(".testimonials-slider .item .blockquote p").forEach((txt) => {
      const text = SplitType.create(txt);
      // const resizeObserver = new ResizeObserver((entries) => {
      //   text.split();
      // });
      // resizeObserver.observe(txt);
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

  if (document.querySelector(".block-video-slider")) {
    $(".block-video-slider .swiper-slide").each(function (i) {
      var slideTitle = $(this).data("title");
      $(".block-video-slider .swiper-pagination-list ul").append("<li data-slide=" + i + ">" + slideTitle + "</li>");
    });
    $(".block-video-slider .swiper-pagination-list ul li:first-child").addClass("active");

    const slidesTotal = $(".block-video-slider .swiper-slide").length;

    const swiperVideo = new Swiper(".block-video-slider .swiper", {
      loop: false,
      slidesPerView: 1,
      spaceBetween: 0,
      effect: "fade",
      fadeEffect: {
        crossFade: true,
      },
      speed: 1000,
      pagination: {
        el: ".block-video-slider .swiper-pagination",
        type: "progressbar",
      },
      navigation: {
        prevEl: ".block-video-slider .swiper-button-prev",
        nextEl: ".block-video-slider .swiper-button-next",
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
          var video = document.querySelector(".block-video-slider .swiper .swiper-slide-active video");
          // video.play();
          var playPromise = video.play();

          video.addEventListener("ended", function () {
            swiperVideo.slideNext();
          });

          document.querySelector(".block-video-slider .btn-video-play").addEventListener("click", function () {
            if (!video.paused) {
              this.classList.add("is-paused");
              video.pause();
            } else {
              this.classList.remove("is-paused");
              video.play();
            }
          });
        },
        beforeSlideChangeStart: function () {
          var video = document.querySelector(".block-video-slider .swiper .swiper-slide-active video");
          video.pause();
          video.currentTime = "0";
          document.querySelector(".block-video-slider .btn-video-play").classList.remove("is-paused");
        },
        transitionEnd: function (swiper) {
          var video = document.querySelector(".block-video-slider .swiper .swiper-slide-active video");
          video.play();
          video.addEventListener("ended", function () {
            if (swiper.realIndex === slidesTotal - 1) {
              swiperVideo.slideTo(0);
            } else {
              swiperVideo.slideNext();
            }
          });
          document.querySelector(".block-video-slider .btn-video-play").addEventListener("click", function () {
            if (!video.paused) {
              this.classList.add("is-paused");
              video.pause();
            } else {
              this.classList.remove("is-paused");
              video.play();
            }
          });
        },
        realIndexChange: function (swiper) {
          var i = swiper.realIndex;
          $(".block-video-slider .swiper-pagination-list li.active").removeClass("active");
          $(".block-video-slider .swiper-pagination-list li").each(function () {
            if (parseInt($(this).data("slide")) === i) {
              $(this).addClass("active");
            }
          });
        },
      },
    });

    $(".block-video-slider .swiper-pagination-list li").on("click", function () {
      var slide = parseInt($(this).data("slide"));
      swiperVideo.slideTo(slide);
    });
  }

  if (document.querySelector(".block-cards-slider")) {
    const swiperCards = new Swiper(".block-cards-slider .swiper", {
      loop: true,
      slidesPerView: 1.1,
      spaceBetween: 10,
      speed: 700,
      pagination: {
        el: ".block-cards-slider .swiper-pagination",
        type: "progressbar",
      },
      navigation: {
        prevEl: ".block-cards-slider .swiper-button-prev",
        nextEl: ".block-cards-slider .swiper-button-next",
      },
      breakpoints: {
        768: {
          slidesPerView: 1.6,
          spaceBetween: 16,
        },
        1024: {
          slidesPerView: 1.9,
          spaceBetween: 24,
        },
        1600: {
          slidesPerView: 2.35,
          spaceBetween: 24,
        },
      },
      on: {
        init: function () {
          ScrollTrigger.refresh();
        },
      },
    });
  }

  if (document.querySelector(".block-cards-slider-cases")) {
    const swiperCards = new Swiper(".block-cards-slider-cases .swiper", {
      loop: true,
      slidesPerView: 1.1,
      spaceBetween: 10,
      speed: 700,
      pagination: {
        el: ".block-cards-slider-cases .swiper-pagination",
        type: "progressbar",
      },
      navigation: {
        prevEl: ".block-cards-slider-cases .swiper-button-prev",
        nextEl: ".block-cards-slider-cases .swiper-button-next",
      },
      breakpoints: {
        768: {
          slidesPerView: 1.6,
          spaceBetween: 16,
        },
        1024: {
          slidesPerView: 1.9,
          spaceBetween: 24,
        },
        1600: {
          slidesPerView: 2.35,
          spaceBetween: 24,
        },
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

  // fade up, in
  var animatedEls = document.querySelectorAll(".fade-up, .fade-in , .fade-up-wrapper > *, .fade-up-overflow > *");
  animatedEls.forEach((el) => {
    gsap.to(el, {
      scrollTrigger: {
        trigger: el,
        start: "top 95%",
      },
      duration: 0.4,
      ease: "none",
      y: "0",
      opacity: 1,
    });
  });

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

  if ($(".page-header-case.video-wrapper").length) {
    var video = document.querySelector(".case-video"),
      videoDesktop = video.dataset.desktop,
      videoMobile = video.dataset.mobile;
    if (window.screen.width < 1024) {
      video.setAttribute("src", videoMobile);
    } else {
      video.setAttribute("src", videoDesktop);
    }

    let ste = document.getElementById("scrollToExplore");

    setTimeout(() => {
      video.play();
      ste.play();
      $(".btn-watch").hide();
      $(".page-header-case").find(".video-controls").css("display", "flex");
      $(".page-header-case").find(".video-play").removeClass("is-paused");
    }, 1000);
  }

  $(".block-filter .dropdown .dropdown-toggle, .block-filter .dropdown .dropdown-toggle-inner").on("click", function (e) {
    e.stopPropagation();
    $(".block-filter .dropdown").toggleClass("active");
  });
  $(document).on("click", function () {
    $(".block-filter .dropdown").removeClass("active");
  });

  $("input[name=sort]").on("click", function () {
    var v = $(this).next("label").text();
    $(".sort .dropdown-toggle").text(v);
  });

  let loader = document.getElementById("loader");
  if (loader) {
    loader.play();
  }
});
