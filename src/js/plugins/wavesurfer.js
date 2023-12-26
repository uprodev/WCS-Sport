
!(function (t, e) {
  "object" == typeof exports && "undefined" != typeof module ? (module.exports = e()) : "function" == typeof define && define.amd ? define(e) : ((t = "undefined" != typeof globalThis ? globalThis : t || self).WaveSurfer = e());
})(this, function () {
  "use strict";
  function t(t, e, i, s) {
    return new (i || (i = Promise))(function (n, r) {
      function o(t) {
        try {
          h(s.next(t));
        } catch (t) {
          r(t);
        }
      }
      function a(t) {
        try {
          h(s.throw(t));
        } catch (t) {
          r(t);
        }
      }
      function h(t) {
        var e;
        t.done
          ? n(t.value)
          : ((e = t.value),
            e instanceof i
              ? e
              : new i(function (t) {
                  t(e);
                })).then(o, a);
      }
      h((s = s.apply(t, e || [])).next());
    });
  }
  "function" == typeof SuppressedError && SuppressedError;
  const e = {
    decode: function (e, i) {
      return t(this, void 0, void 0, function* () {
        const t = new AudioContext({ sampleRate: i });
        return t.decodeAudioData(e).finally(() => t.close());
      });
    },
    createBuffer: function (t, e) {
      return (
        "number" == typeof t[0] && (t = [t]),
        (function (t) {
          const e = t[0];
          if (e.some((t) => t > 1 || t < -1)) {
            const i = e.length;
            let s = 0;
            for (let t = 0; t < i; t++) {
              const i = Math.abs(e[t]);
              i > s && (s = i);
            }
            for (const e of t) for (let t = 0; t < i; t++) e[t] /= s;
          }
        })(t),
        { duration: e, length: t[0].length, sampleRate: t[0].length / e, numberOfChannels: t.length, getChannelData: (e) => (null == t ? void 0 : t[e]), copyFromChannel: AudioBuffer.prototype.copyFromChannel, copyToChannel: AudioBuffer.prototype.copyToChannel }
      );
    },
  };
  const i = {
    fetchBlob: function (e, i, s) {
      return t(this, void 0, void 0, function* () {
        const n = yield fetch(e, s);
        if (!n.ok) throw new Error(`Failed to fetch ${e}: ${n.status} (${n.statusText})`);
        return (
          (function (e, i) {
            t(this, void 0, void 0, function* () {
              if (!e.body || !e.headers) return;
              const s = e.body.getReader(),
                n = Number(e.headers.get("Content-Length")) || 0;
              let r = 0;
              const o = (e) =>
                  t(this, void 0, void 0, function* () {
                    r += (null == e ? void 0 : e.length) || 0;
                    const t = Math.round((r / n) * 100);
                    i(t);
                  }),
                a = () =>
                  t(this, void 0, void 0, function* () {
                    let t;
                    try {
                      t = yield s.read();
                    } catch (t) {
                      return;
                    }
                    t.done || (o(t.value), yield a());
                  });
              a();
            });
          })(n.clone(), i),
          n.blob()
        );
      });
    },
  };
  class s {
    constructor() {
      (this.listeners = {}), (this.on = this.addEventListener), (this.un = this.removeEventListener);
    }
    addEventListener(t, e, i) {
      if ((this.listeners[t] || (this.listeners[t] = new Set()), this.listeners[t].add(e), null == i ? void 0 : i.once)) {
        const i = () => {
          this.removeEventListener(t, i), this.removeEventListener(t, e);
        };
        return this.addEventListener(t, i), i;
      }
      return () => this.removeEventListener(t, e);
    }
    removeEventListener(t, e) {
      var i;
      null === (i = this.listeners[t]) || void 0 === i || i.delete(e);
    }
    once(t, e) {
      return this.on(t, e, { once: !0 });
    }
    unAll() {
      this.listeners = {};
    }
    emit(t, ...e) {
      this.listeners[t] && this.listeners[t].forEach((t) => t(...e));
    }
  }
  class n extends s {
    constructor(t) {
      super(),
        (this.isExternalMedia = !1),
        t.media ? ((this.media = t.media), (this.isExternalMedia = !0)) : (this.media = document.createElement("audio")),
        t.mediaControls && (this.media.controls = !0),
        t.autoplay && (this.media.autoplay = !0),
        null != t.playbackRate &&
          this.onceMediaEvent("canplay", () => {
            null != t.playbackRate && (this.media.playbackRate = t.playbackRate);
          });
    }
    onMediaEvent(t, e, i) {
      return this.media.addEventListener(t, e, i), () => this.media.removeEventListener(t, e);
    }
    onceMediaEvent(t, e) {
      return this.onMediaEvent(t, e, { once: !0 });
    }
    getSrc() {
      return this.media.currentSrc || this.media.src || "";
    }
    revokeSrc() {
      const t = this.getSrc();
      t.startsWith("blob:") && URL.revokeObjectURL(t);
    }
    setSrc(t, e) {
      if (this.getSrc() === t) return;
      this.revokeSrc();
      const i = e instanceof Blob ? URL.createObjectURL(e) : t;
      (this.media.src = i), this.media.load();
    }
    destroy() {
      this.media.pause(), this.isExternalMedia || (this.media.remove(), this.revokeSrc(), (this.media.src = ""), this.media.load());
    }
    setMediaElement(t) {
      this.media = t;
    }
    play() {
      return this.media.play();
    }
    pause() {
      this.media.pause();
    }
    isPlaying() {
      return !this.media.paused && !this.media.ended;
    }
    setTime(t) {
      this.media.currentTime = t;
    }
    getDuration() {
      return this.media.duration;
    }
    getCurrentTime() {
      return this.media.currentTime;
    }
    getVolume() {
      return this.media.volume;
    }
    setVolume(t) {
      this.media.volume = t;
    }
    getMuted() {
      return this.media.muted;
    }
    setMuted(t) {
      this.media.muted = t;
    }
    getPlaybackRate() {
      return this.media.playbackRate;
    }
    setPlaybackRate(t, e) {
      null != e && (this.media.preservesPitch = e), (this.media.playbackRate = t);
    }
    getMediaElement() {
      return this.media;
    }
    setSinkId(t) {
      return this.media.setSinkId(t);
    }
  }
  class r extends s {
    constructor(t, e) {
      super(), (this.timeouts = []), (this.isScrollable = !1), (this.audioData = null), (this.resizeObserver = null), (this.isDragging = !1), (this.options = t);
      const i = this.parentFromOptionsContainer(t.container);
      this.parent = i;
      const [s, n] = this.initHtml();
      i.appendChild(s), (this.container = s), (this.scrollContainer = n.querySelector(".scroll")), (this.wrapper = n.querySelector(".wrapper")), (this.canvasWrapper = n.querySelector(".canvases")), (this.progressWrapper = n.querySelector(".progress")), (this.cursor = n.querySelector(".cursor")), e && n.appendChild(e), this.initEvents();
    }
    parentFromOptionsContainer(t) {
      let e;
      if (("string" == typeof t ? (e = document.querySelector(t)) : t instanceof HTMLElement && (e = t), !e)) throw new Error("Container not found");
      return e;
    }
    initEvents() {
      const t = (t) => {
        const e = this.wrapper.getBoundingClientRect(),
          i = t.clientX - e.left,
          s = t.clientX - e.left;
        return [i / e.width, s / e.height];
      };
      this.wrapper.addEventListener("click", (e) => {
        const [i, s] = t(e);
        this.emit("click", i, s);
      }),
        this.wrapper.addEventListener("dblclick", (e) => {
          const [i, s] = t(e);
          this.emit("dblclick", i, s);
        }),
        this.options.dragToSeek && this.initDrag(),
        this.scrollContainer.addEventListener("scroll", () => {
          const { scrollLeft: t, scrollWidth: e, clientWidth: i } = this.scrollContainer,
            s = t / e,
            n = (t + i) / e;
          this.emit("scroll", s, n);
        });
      const e = this.createDelay(100);
      (this.resizeObserver = new ResizeObserver(() => {
        e(() => this.reRender());
      })),
        this.resizeObserver.observe(this.scrollContainer);
    }
    initDrag() {
      !(function (t, e, i, s, n = 3, r = 0) {
        if (!t) return () => {};
        let o = () => {};
        const a = (a) => {
          if (a.button !== r) return;
          a.preventDefault(), a.stopPropagation();
          let h = a.clientX,
            l = a.clientY,
            d = !1;
          const c = (s) => {
              s.preventDefault(), s.stopPropagation();
              const r = s.clientX,
                o = s.clientY,
                a = r - h,
                c = o - l;
              if (((h = r), (l = o), d || Math.abs(a) > n || Math.abs(c) > n)) {
                const s = t.getBoundingClientRect(),
                  { left: n, top: u } = s;
                d || (null == i || i(h - n, l - u), (d = !0)), e(a, c, r - n, o - u);
              }
            },
            u = () => {
              d && (null == s || s()), o();
            },
            p = (t) => {
              d && (t.stopPropagation(), t.preventDefault());
            },
            m = (t) => {
              d && t.preventDefault();
            };
          document.addEventListener("pointermove", c),
            document.addEventListener("pointerup", u),
            document.addEventListener("pointerout", u),
            document.addEventListener("pointercancel", u),
            document.addEventListener("touchmove", m, { passive: !1 }),
            document.addEventListener("click", p, { capture: !0 }),
            (o = () => {
              document.removeEventListener("pointermove", c),
                document.removeEventListener("pointerup", u),
                document.removeEventListener("pointerout", u),
                document.removeEventListener("pointercancel", u),
                document.removeEventListener("touchmove", m),
                setTimeout(() => {
                  document.removeEventListener("click", p, { capture: !0 });
                }, 10);
            });
        };
        t.addEventListener("pointerdown", a);
      })(
        this.wrapper,
        (t, e, i) => {
          this.emit("drag", Math.max(0, Math.min(1, i / this.wrapper.getBoundingClientRect().width)));
        },
        () => (this.isDragging = !0),
        () => (this.isDragging = !1)
      );
    }
    getHeight(t) {
      return null == t ? 128 : isNaN(Number(t)) ? ("auto" === t && this.parent.clientHeight) || 128 : Number(t);
    }
    initHtml() {
      const t = document.createElement("div"),
        e = t.attachShadow({ mode: "open" });
      return (
        (e.innerHTML = `\n      <style>\n        :host {\n          user-select: none;\n          min-width: 1px;\n        }\n        :host audio {\n          display: block;\n          width: 100%;\n        }\n        :host .scroll {\n          overflow-x: auto;\n          overflow-y: hidden;\n          width: 100%;\n          position: relative;\n        }\n        :host .noScrollbar {\n          scrollbar-color: transparent;\n          scrollbar-width: none;\n        }\n        :host .noScrollbar::-webkit-scrollbar {\n          display: none;\n          -webkit-appearance: none;\n        }\n        :host .wrapper {\n          position: relative;\n          overflow: visible;\n          z-index: 2;\n        }\n        :host .canvases {\n          min-height: ${this.getHeight(
          this.options.height
        )}px;\n        }\n        :host .canvases > div {\n          position: relative;\n        }\n        :host canvas {\n          display: block;\n          position: absolute;\n          top: 0;\n          image-rendering: pixelated;\n        }\n        :host .progress {\n          pointer-events: none;\n          position: absolute;\n          z-index: 2;\n          top: 0;\n          left: 0;\n          width: 0;\n          height: 100%;\n          overflow: hidden;\n        }\n        :host .progress > div {\n          position: relative;\n        }\n        :host .cursor {\n          pointer-events: none;\n          position: absolute;\n          z-index: 5;\n          top: 0;\n          left: 0;\n          height: 100%;\n          border-radius: 2px;\n        }\n      </style>\n\n      <div class="scroll" part="scroll">\n        <div class="wrapper" part="wrapper">\n          <div class="canvases"></div>\n          <div class="progress" part="progress"></div>\n          <div class="cursor" part="cursor"></div>\n        </div>\n      </div>\n    `),
        [t, e]
      );
    }
    setOptions(t) {
      if (this.options.container !== t.container) {
        const e = this.parentFromOptionsContainer(t.container);
        e.appendChild(this.container), (this.parent = e);
      }
      t.dragToSeek && !this.options.dragToSeek && this.initDrag(), (this.options = t), this.reRender();
    }
    getWrapper() {
      return this.wrapper;
    }
    getScroll() {
      return this.scrollContainer.scrollLeft;
    }
    destroy() {
      var t;
      this.container.remove(), null === (t = this.resizeObserver) || void 0 === t || t.disconnect();
    }
    createDelay(t = 10) {
      const e = {};
      return (
        this.timeouts.push(e),
        (i) => {
          e.timeout && clearTimeout(e.timeout), (e.timeout = setTimeout(i, t));
        }
      );
    }
    convertColorValues(t) {
      if (!Array.isArray(t)) return t || "";
      if (t.length < 2) return t[0] || "";
      const e = document.createElement("canvas"),
        i = e.getContext("2d"),
        s = e.height * (window.devicePixelRatio || 1),
        n = i.createLinearGradient(0, 0, 0, s),
        r = 1 / (t.length - 1);
      return (
        t.forEach((t, e) => {
          const i = e * r;
          n.addColorStop(i, t);
        }),
        n
      );
    }
    renderBarWaveform(t, e, i, s) {
      const n = t[0],
        r = t[1] || t[0],
        o = n.length,
        { width: a, height: h } = i.canvas,
        l = h / 2,
        d = window.devicePixelRatio || 1,
        c = e.barWidth ? e.barWidth * d : 1,
        u = e.barGap ? e.barGap * d : e.barWidth ? c / 2 : 0,
        p = e.barRadius || 0,
        m = a / (c + u) / o,
        v = p && "roundRect" in i ? "roundRect" : "rect";
      i.beginPath();
      let g = 0,
        f = 0,
        b = 0;
      for (let t = 0; t <= o; t++) {
        const o = Math.round(t * m);
        if (o > g) {
          const t = Math.round(f * l * s),
            n = t + Math.round(b * l * s) || 1;
          let r = l - t;
          "top" === e.barAlign ? (r = 0) : "bottom" === e.barAlign && (r = h - n), i[v](g * (c + u), r, c, n, p), (g = o), (f = 0), (b = 0);
        }
        const a = Math.abs(n[t] || 0),
          d = Math.abs(r[t] || 0);
        a > f && (f = a), d > b && (b = d);
      }
      i.fill(), i.closePath();
    }
    renderLineWaveform(t, e, i, s) {
      const n = (e) => {
        const n = t[e] || t[0],
          r = n.length,
          { height: o } = i.canvas,
          a = o / 2,
          h = i.canvas.width / r;
        i.moveTo(0, a);
        let l = 0,
          d = 0;
        for (let t = 0; t <= r; t++) {
          const r = Math.round(t * h);
          if (r > l) {
            const t = a + (Math.round(d * a * s) || 1) * (0 === e ? -1 : 1);
            i.lineTo(l, t), (l = r), (d = 0);
          }
          const o = Math.abs(n[t] || 0);
          o > d && (d = o);
        }
        i.lineTo(l, a);
      };
      i.beginPath(), n(0), n(1), i.fill(), i.closePath();
    }
    renderWaveform(t, e, i) {
      if (((i.fillStyle = this.convertColorValues(e.waveColor)), e.renderFunction)) return void e.renderFunction(t, i);
      let s = e.barHeight || 1;
      if (e.normalize) {
        const e = Array.from(t[0]).reduce((t, e) => Math.max(t, Math.abs(e)), 0);
        s = e ? 1 / e : 1;
      }
      e.barWidth || e.barGap || e.barAlign ? this.renderBarWaveform(t, e, i, s) : this.renderLineWaveform(t, e, i, s);
    }
    renderSingleCanvas(t, e, i, s, n, r, o, a) {
      const h = window.devicePixelRatio || 1,
        l = document.createElement("canvas"),
        d = t[0].length;
      (l.width = Math.round((i * (r - n)) / d)), (l.height = s * h), (l.style.width = `${Math.floor(l.width / h)}px`), (l.style.height = `${s}px`), (l.style.left = `${Math.floor((n * i) / h / d)}px`), o.appendChild(l);
      const c = l.getContext("2d");
      if (
        (this.renderWaveform(
          t.map((t) => t.slice(n, r)),
          e,
          c
        ),
        l.width > 0 && l.height > 0)
      ) {
        const t = l.cloneNode(),
          i = t.getContext("2d");
        i.drawImage(l, 0, 0), (i.globalCompositeOperation = "source-in"), (i.fillStyle = this.convertColorValues(e.progressColor)), i.fillRect(0, 0, l.width, l.height), a.appendChild(t);
      }
    }
    renderChannel(t, e, i) {
      const s = document.createElement("div"),
        n = this.getHeight(e.height);
      (s.style.height = `${n}px`), (this.canvasWrapper.style.minHeight = `${n}px`), this.canvasWrapper.appendChild(s);
      const o = s.cloneNode();
      this.progressWrapper.appendChild(o);
      const { scrollLeft: a, scrollWidth: h, clientWidth: l } = this.scrollContainer,
        d = t[0].length,
        c = d / h;
      let u = Math.min(r.MAX_CANVAS_WIDTH, l);
      if (e.barWidth || e.barGap) {
        const t = e.barWidth || 0.5,
          i = t + (e.barGap || t / 2);
        u % i != 0 && (u = Math.floor(u / i) * i);
      }
      const p = Math.floor(Math.abs(a) * c),
        m = Math.floor(p + u * c),
        v = m - p,
        g = (r, a) => {
          this.renderSingleCanvas(t, e, i, n, Math.max(0, r), Math.min(a, d), s, o);
        },
        f = this.createDelay(),
        b = this.createDelay(),
        y = (t, e) => {
          g(t, e),
            t > 0 &&
              f(() => {
                y(t - v, e - v);
              });
        },
        C = (t, e) => {
          g(t, e),
            e < d &&
              b(() => {
                C(t + v, e + v);
              });
        };
      y(p, m), m < d && C(m, m + v);
    }
    render(t) {
      this.timeouts.forEach((t) => t.timeout && clearTimeout(t.timeout)), (this.timeouts = []), (this.canvasWrapper.innerHTML = ""), (this.progressWrapper.innerHTML = ""), null != this.options.width && (this.scrollContainer.style.width = "number" == typeof this.options.width ? `${this.options.width}px` : this.options.width);
      const e = window.devicePixelRatio || 1,
        i = this.scrollContainer.clientWidth,
        s = Math.ceil(t.duration * (this.options.minPxPerSec || 0));
      this.isScrollable = s > i;
      const n = this.options.fillParent && !this.isScrollable,
        r = (n ? i : s) * e;
      if (((this.wrapper.style.width = n ? "100%" : `${s}px`), (this.scrollContainer.style.overflowX = this.isScrollable ? "auto" : "hidden"), this.scrollContainer.classList.toggle("noScrollbar", !!this.options.hideScrollbar), (this.cursor.style.backgroundColor = `${this.options.cursorColor || this.options.progressColor}`), (this.cursor.style.width = `${this.options.cursorWidth}px`), this.options.splitChannels))
        for (let e = 0; e < t.numberOfChannels; e++) {
          const i = Object.assign(Object.assign({}, this.options), this.options.splitChannels[e]);
          this.renderChannel([t.getChannelData(e)], i, r);
        }
      else {
        const e = [t.getChannelData(0)];
        t.numberOfChannels > 1 && e.push(t.getChannelData(1)), this.renderChannel(e, this.options, r);
      }
      (this.audioData = t), this.emit("render");
    }
    reRender() {
      if (!this.audioData) return;
      const { scrollWidth: t } = this.scrollContainer,
        e = this.progressWrapper.clientWidth;
      if ((this.render(this.audioData), this.isScrollable && t !== this.scrollContainer.scrollWidth)) {
        const t = this.progressWrapper.clientWidth;
        this.scrollContainer.scrollLeft += t - e;
      }
    }
    zoom(t) {
      (this.options.minPxPerSec = t), this.reRender();
    }
    scrollIntoView(t, e = !1) {
      const { scrollLeft: i, scrollWidth: s, clientWidth: n } = this.scrollContainer,
        r = t * s,
        o = i,
        a = i + n,
        h = n / 2;
      if (this.isDragging) {
        const t = 30;
        r + t > a ? (this.scrollContainer.scrollLeft += t) : r - t < o && (this.scrollContainer.scrollLeft -= t);
      } else {
        (r < o || r > a) && (this.scrollContainer.scrollLeft = r - (this.options.autoCenter ? h : 0));
        const t = r - i - h;
        e && this.options.autoCenter && t > 0 && (this.scrollContainer.scrollLeft += Math.min(t, 10));
      }
      {
        const t = this.scrollContainer.scrollLeft,
          e = t / s,
          i = (t + n) / s;
        this.emit("scroll", e, i);
      }
    }
    renderProgress(t, e) {
      if (isNaN(t)) return;
      const i = 100 * t;
      (this.canvasWrapper.style.clipPath = `polygon(${i}% 0, 100% 0, 100% 100%, ${i}% 100%)`), (this.progressWrapper.style.width = `${i}%`), (this.cursor.style.left = `${i}%`), (this.cursor.style.marginLeft = 100 === Math.round(i) ? `-${this.options.cursorWidth}px` : ""), this.isScrollable && this.options.autoScroll && this.scrollIntoView(t, e);
    }
    exportImage(e, i, s) {
      return t(this, void 0, void 0, function* () {
        const t = this.canvasWrapper.querySelectorAll("canvas");
        if (!t.length) throw new Error("No waveform data");
        if ("dataURL" === s) {
          const s = Array.from(t).map((t) => t.toDataURL(e, i));
          return Promise.resolve(s);
        }
        return Promise.all(
          Array.from(t).map(
            (t) =>
              new Promise((s, n) => {
                t.toBlob(
                  (t) => {
                    t ? s(t) : n(new Error("Could not export image"));
                  },
                  e,
                  i
                );
              })
          )
        );
      });
    }
  }
  r.MAX_CANVAS_WIDTH = 4e3;
  class o extends s {
    constructor() {
      super(...arguments), (this.unsubscribe = () => {});
    }
    start() {
      (this.unsubscribe = this.on("tick", () => {
        requestAnimationFrame(() => {
          this.emit("tick");
        });
      })),
        this.emit("tick");
    }
    stop() {
      this.unsubscribe();
    }
    destroy() {
      this.unsubscribe();
    }
  }
  class a extends s {
    constructor(t = new AudioContext()) {
      super(), (this.bufferNode = null), (this.autoplay = !1), (this.playStartTime = 0), (this.playedDuration = 0), (this._muted = !1), (this.buffer = null), (this.currentSrc = ""), (this.paused = !0), (this.crossOrigin = null), (this.audioContext = t), (this.gainNode = this.audioContext.createGain()), this.gainNode.connect(this.audioContext.destination);
    }
    load() {
      return t(this, void 0, void 0, function* () {});
    }
    get src() {
      return this.currentSrc;
    }
    set src(t) {
      (this.currentSrc = t),
        fetch(t)
          .then((t) => t.arrayBuffer())
          .then((t) => this.audioContext.decodeAudioData(t))
          .then((t) => {
            (this.buffer = t), this.emit("loadedmetadata"), this.emit("canplay"), this.autoplay && this.play();
          });
    }
    _play() {
      var t;
      this.paused &&
        ((this.paused = !1),
        null === (t = this.bufferNode) || void 0 === t || t.disconnect(),
        (this.bufferNode = this.audioContext.createBufferSource()),
        (this.bufferNode.buffer = this.buffer),
        this.bufferNode.connect(this.gainNode),
        this.playedDuration >= this.duration && (this.playedDuration = 0),
        this.bufferNode.start(this.audioContext.currentTime, this.playedDuration),
        (this.playStartTime = this.audioContext.currentTime),
        (this.bufferNode.onended = () => {
          this.currentTime >= this.duration && (this.pause(), this.emit("ended"));
        }));
    }
    _pause() {
      var t;
      this.paused || ((this.paused = !0), null === (t = this.bufferNode) || void 0 === t || t.stop(), (this.playedDuration += this.audioContext.currentTime - this.playStartTime));
    }
    play() {
      return t(this, void 0, void 0, function* () {
        this._play(), this.emit("play");
      });
    }
    pause() {
      this._pause(), this.emit("pause");
    }
    stopAt(t) {
      var e, i;
      const s = t - this.currentTime;
      null === (e = this.bufferNode) || void 0 === e || e.stop(this.audioContext.currentTime + s),
        null === (i = this.bufferNode) ||
          void 0 === i ||
          i.addEventListener(
            "ended",
            () => {
              (this.bufferNode = null), this.pause();
            },
            { once: !0 }
          );
    }
    setSinkId(e) {
      return t(this, void 0, void 0, function* () {
        return this.audioContext.setSinkId(e);
      });
    }
    get playbackRate() {
      var t, e;
      return null !== (e = null === (t = this.bufferNode) || void 0 === t ? void 0 : t.playbackRate.value) && void 0 !== e ? e : 1;
    }
    set playbackRate(t) {
      this.bufferNode && (this.bufferNode.playbackRate.value = t);
    }
    get currentTime() {
      return this.paused ? this.playedDuration : this.playedDuration + this.audioContext.currentTime - this.playStartTime;
    }
    set currentTime(t) {
      this.emit("seeking"), this.paused ? (this.playedDuration = t) : (this._pause(), (this.playedDuration = t), this._play()), this.emit("timeupdate");
    }
    get duration() {
      var t;
      return (null === (t = this.buffer) || void 0 === t ? void 0 : t.duration) || 0;
    }
    get volume() {
      return this.gainNode.gain.value;
    }
    set volume(t) {
      (this.gainNode.gain.value = t), this.emit("volumechange");
    }
    get muted() {
      return this._muted;
    }
    set muted(t) {
      this._muted !== t && ((this._muted = t), this._muted ? this.gainNode.disconnect() : this.gainNode.connect(this.audioContext.destination));
    }
    getGainNode() {
      return this.gainNode;
    }
  }
  const h = { waveColor: "#999", progressColor: "#555", cursorWidth: 1, minPxPerSec: 0, fillParent: !0, interact: !0, dragToSeek: !1, autoScroll: !0, autoCenter: !0, sampleRate: 8e3 };
  class l extends n {
    static create(t) {
      return new l(t);
    }
    constructor(t) {
      const e = t.media || ("WebAudio" === t.backend ? new a() : void 0);
      super({ media: e, mediaControls: t.mediaControls, autoplay: t.autoplay, playbackRate: t.audioRate }), (this.plugins = []), (this.decodedData = null), (this.subscriptions = []), (this.mediaSubscriptions = []), (this.options = Object.assign({}, h, t)), (this.timer = new o());
      const i = e ? void 0 : this.getMediaElement();
      (this.renderer = new r(this.options, i)), this.initPlayerEvents(), this.initRendererEvents(), this.initTimerEvents(), this.initPlugins();
      const s = this.options.url || this.getSrc() || "";
      (s || (this.options.peaks && this.options.duration)) && this.load(s, this.options.peaks, this.options.duration);
    }
    initTimerEvents() {
      this.subscriptions.push(
        this.timer.on("tick", () => {
          const t = this.getCurrentTime();
          this.renderer.renderProgress(t / this.getDuration(), !0), this.emit("timeupdate", t), this.emit("audioprocess", t);
        })
      );
    }
    initPlayerEvents() {
      this.isPlaying() && (this.emit("play"), this.timer.start()),
        this.mediaSubscriptions.push(
          this.onMediaEvent("timeupdate", () => {
            const t = this.getCurrentTime();
            this.renderer.renderProgress(t / this.getDuration(), this.isPlaying()), this.emit("timeupdate", t);
          }),
          this.onMediaEvent("play", () => {
            this.emit("play"), this.timer.start();
          }),
          this.onMediaEvent("pause", () => {
            this.emit("pause"), this.timer.stop();
          }),
          this.onMediaEvent("emptied", () => {
            this.timer.stop();
          }),
          this.onMediaEvent("ended", () => {
            this.emit("finish");
          }),
          this.onMediaEvent("seeking", () => {
            this.emit("seeking", this.getCurrentTime());
          })
        );
    }
    initRendererEvents() {
      this.subscriptions.push(
        this.renderer.on("click", (t, e) => {
          this.options.interact && (this.seekTo(t), this.emit("interaction", t * this.getDuration()), this.emit("click", t, e));
        }),
        this.renderer.on("dblclick", (t, e) => {
          this.emit("dblclick", t, e);
        }),
        this.renderer.on("scroll", (t, e) => {
          const i = this.getDuration();
          this.emit("scroll", t * i, e * i);
        }),
        this.renderer.on("render", () => {
          this.emit("redraw");
        })
      );
      {
        let t;
        this.subscriptions.push(
          this.renderer.on("drag", (e) => {
            this.options.interact &&
              (this.renderer.renderProgress(e),
              clearTimeout(t),
              (t = setTimeout(
                () => {
                  this.seekTo(e);
                },
                this.isPlaying() ? 0 : 200
              )),
              this.emit("interaction", e * this.getDuration()),
              this.emit("drag", e));
          })
        );
      }
    }
    initPlugins() {
      var t;
      (null === (t = this.options.plugins) || void 0 === t ? void 0 : t.length) &&
        this.options.plugins.forEach((t) => {
          this.registerPlugin(t);
        });
    }
    unsubscribePlayerEvents() {
      this.mediaSubscriptions.forEach((t) => t()), (this.mediaSubscriptions = []);
    }
    setOptions(t) {
      (this.options = Object.assign({}, this.options, t)), this.renderer.setOptions(this.options), t.audioRate && this.setPlaybackRate(t.audioRate), null != t.mediaControls && (this.getMediaElement().controls = t.mediaControls);
    }
    registerPlugin(t) {
      return (
        t.init(this),
        this.plugins.push(t),
        this.subscriptions.push(
          t.once("destroy", () => {
            this.plugins = this.plugins.filter((e) => e !== t);
          })
        ),
        t
      );
    }
    getWrapper() {
      return this.renderer.getWrapper();
    }
    getScroll() {
      return this.renderer.getScroll();
    }
    getActivePlugins() {
      return this.plugins;
    }
    loadAudio(s, n, r, o) {
      return t(this, void 0, void 0, function* () {
        if ((this.emit("load", s), !this.options.media && this.isPlaying() && this.pause(), (this.decodedData = null), !n && !r)) {
          const t = (t) => this.emit("loading", t);
          n = yield i.fetchBlob(s, t, this.options.fetchParams);
        }
        this.setSrc(s, n);
        const t =
          (yield Promise.resolve(o || this.getDuration())) ||
          (yield new Promise((t) => {
            this.onceMediaEvent("loadedmetadata", () => t(this.getDuration()));
          }));
        if (r) this.decodedData = e.createBuffer(r, t || 0);
        else if (n) {
          const t = yield n.arrayBuffer();
          this.decodedData = yield e.decode(t, this.options.sampleRate);
        }
        this.decodedData && (this.emit("decode", this.getDuration()), this.renderer.render(this.decodedData)), this.emit("ready", this.getDuration());
      });
    }
    load(e, i, s) {
      return t(this, void 0, void 0, function* () {
        yield this.loadAudio(e, void 0, i, s);
      });
    }
    loadBlob(e, i, s) {
      return t(this, void 0, void 0, function* () {
        yield this.loadAudio("blob", e, i, s);
      });
    }
    zoom(t) {
      if (!this.decodedData) throw new Error("No audio loaded");
      this.renderer.zoom(t), this.emit("zoom", t);
    }
    getDecodedData() {
      return this.decodedData;
    }
    exportPeaks({ channels: t = 2, maxLength: e = 8e3, precision: i = 1e4 } = {}) {
      if (!this.decodedData) throw new Error("The audio has not been decoded yet");
      const s = Math.min(t, this.decodedData.numberOfChannels),
        n = [];
      for (let t = 0; t < s; t++) {
        const s = this.decodedData.getChannelData(t),
          r = [],
          o = Math.round(s.length / e);
        for (let t = 0; t < e; t++) {
          const e = s.slice(t * o, (t + 1) * o);
          let n = 0;
          for (let t = 0; t < e.length; t++) {
            const i = e[t];
            Math.abs(i) > Math.abs(n) && (n = i);
          }
          r.push(Math.round(n * i) / i);
        }
        n.push(r);
      }
      return n;
    }
    getDuration() {
      let t = super.getDuration() || 0;
      return (0 !== t && t !== 1 / 0) || !this.decodedData || (t = this.decodedData.duration), t;
    }
    toggleInteraction(t) {
      this.options.interact = t;
    }
    seekTo(t) {
      const e = this.getDuration() * t;
      this.setTime(e);
    }
    playPause() {
      return t(this, void 0, void 0, function* () {
        return this.isPlaying() ? this.pause() : this.play();
      });
    }
    stop() {
      this.pause(), this.setTime(0);
    }
    skip(t) {
      this.setTime(this.getCurrentTime() + t);
    }
    empty() {
      this.load("", [[0]], 0.001);
    }
    setMediaElement(t) {
      this.unsubscribePlayerEvents(), super.setMediaElement(t), this.initPlayerEvents();
    }
    exportImage(e = "image/png", i = 1, s = "dataURL") {
      return t(this, void 0, void 0, function* () {
        return this.renderer.exportImage(e, i, s);
      });
    }
    destroy() {
      this.emit("destroy"), this.plugins.forEach((t) => t.destroy()), this.subscriptions.forEach((t) => t()), this.unsubscribePlayerEvents(), this.timer.destroy(), this.renderer.destroy(), super.destroy();
    }
  }
  return l;
});