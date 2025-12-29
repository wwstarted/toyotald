/**
 * CDA Hero to About Us - FULL INTEGRATED VERSION
 * ✅ Reversible Transition (Scroll Up/Down)
 * ✅ Responsive Dynamic Metrics
 * ✅ Optimized 3D Sphere & Globe (Auto-pause)
 */

(function () {
  "use strict";

  // --- 1. CONFIG & STATE ---
  const CONFIG = {
    sphereParticles: 150,
    sphereRotationSpeed: 0.003,
    globeDots: 200,
  };

  const STATE = {
    heroHeight: 0,
    startRect: { top: 0, left: 0, width: 0, height: 0 },
    endRect: {
      top: 0,
      left: 0,
      width: 0,
      height: 0,
      elementTop: 0,
      elementLeft: 0,
    },
    progress: 0,
    isSettled: false,
    ticking: false,
    sphereActive: false,
    globeActive: false,
  };

  const dom = {
    hero: document.getElementById("cdaHero"),
    about: document.getElementById("cdaAbout"),
    videoContainer: document.getElementById("cdaVideoIntro"),
    targetArea: document.getElementById("cdaVideoSettledArea"),
    sphereCanvas: document.getElementById("cdaSphereCanvas"),
    globeCanvas: document.getElementById("cdaGlobeCanvas"),
    pattern3d: document.querySelector(".cda-pattern-3d"),
    reveals: {
      globe: document.querySelector(".cda-globe-pattern"),
      locations: document.querySelector(".cda-locations"),
      description: document.querySelector(".cda-description"),
    },
  };

  // --- 2. INITIALIZATION ---
  function init() {
    if (!dom.hero || !dom.videoContainer || !dom.targetArea) return;

    updateMetrics();

    // Init 3D Sphere
    if (dom.sphereCanvas) init3DSphere();

    // Init 3D Globe
    if (dom.globeCanvas) init3DGlobe();

    // Event Listeners
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", debounce(updateMetrics, 200));

    // Start Main Render Loop for Video
    requestAnimationFrame(renderLoop);

    console.log("[CDA] Full Logic Initialized");
  }

  // --- 3. POSITION CALCULATIONS ---
  function updateMetrics() {
    STATE.heroHeight = dom.hero.offsetHeight;

    // Start Position (Hero state)
    const isMobile = window.innerWidth < 768;
    const startW = isMobile ? 240 : 325;
    const startH = (startW * 9) / 16;
    const padding = window.innerWidth * 0.05;

    STATE.startRect = {
      width: startW,
      height: startH,
      left: window.innerWidth - startW - padding,
      top: window.innerHeight - startH - (isMobile ? 20 : 0), // Align to bottom
    };

    // End Position (About state)
    const targetRect = dom.targetArea.getBoundingClientRect();
    STATE.endRect = {
      width: targetRect.width,
      height: targetRect.height,
      elementTop: targetRect.top + window.scrollY,
      elementLeft: targetRect.left + window.scrollX,
    };

    // Reset video style immediately if at top
    if (window.scrollY === 0 && !STATE.isSettled) {
      applyVideoStyle(
        STATE.startRect.top,
        STATE.startRect.left,
        STATE.startRect.width,
        STATE.startRect.height
      );
    }
  }

  function onScroll() {
    const scrollY = window.scrollY;

    // Trigger window: Start at 10% Hero, End when target reaches center viewport
    const startTrigger = STATE.heroHeight * 0.1;
    const endTrigger =
      STATE.endRect.elementTop -
      window.innerHeight / 2 +
      STATE.endRect.height / 2;

    let p = (scrollY - startTrigger) / (endTrigger - startTrigger);
    STATE.progress = Math.min(Math.max(p, 0), 1);
  }

  // --- 4. ANIMATION RENDER LOOP ---
  function renderLoop() {
    const p = STATE.progress;
    const eased = p < 0.5 ? 2 * p * p : -1 + (4 - 2 * p) * p;

    if (p < 1) {
      if (STATE.isSettled) unsettleVideo();

      const currentTargetTop = STATE.endRect.elementTop - window.scrollY;

      const currentTop = lerp(STATE.startRect.top, currentTargetTop, eased);
      const currentLeft = lerp(
        STATE.startRect.left,
        STATE.endRect.elementLeft,
        eased
      );
      const currentW = lerp(STATE.startRect.width, STATE.endRect.width, eased);
      const currentH = lerp(
        STATE.startRect.height,
        STATE.endRect.height,
        eased
      );

      applyVideoStyle(currentTop, currentLeft, currentW, currentH);

      // Sphere Fade
      if (dom.pattern3d) {
        dom.pattern3d.style.opacity =
          p > 0.5 ? Math.max(0, 1 - (p - 0.5) * 2) : 1;
      }
    } else {
      if (!STATE.isSettled) settleVideo();
    }

    requestAnimationFrame(renderLoop);
  }

  function applyVideoStyle(t, l, w, h) {
    dom.videoContainer.style.position = "fixed";
    dom.videoContainer.style.top = `${t}px`;
    dom.videoContainer.style.left = `${l}px`;
    dom.videoContainer.style.width = `${w}px`;
    dom.videoContainer.style.height = `${h}px`;
    dom.videoContainer.style.transform = "none";
    dom.videoContainer.style.opacity = lerp(0.7, 1, STATE.progress);
  }

  function settleVideo() {
    STATE.isSettled = true;
    dom.targetArea.appendChild(dom.videoContainer);
    dom.videoContainer.style.cssText =
      "position:absolute; top:0; left:0; width:100%; height:100%; opacity:1;";
    dom.targetArea.classList.add("has-video");

    // Trigger reveals
    Object.values(dom.reveals).forEach((el, i) => {
      if (el) setTimeout(() => el.classList.add("revealed"), i * 200);
    });
  }

  function unsettleVideo() {
    STATE.isSettled = false;
    document.body.appendChild(dom.videoContainer);
    dom.targetArea.classList.remove("has-video");
    Object.values(dom.reveals).forEach(
      (el) => el && el.classList.remove("revealed")
    );
  }

  // --- 5. 3D SPHERE (HERO BACKGROUND) ---
  function init3DSphere() {
    const canvas = dom.sphereCanvas;
    const ctx = canvas.getContext("2d");
    const size = 600;
    canvas.width = size;
    canvas.height = size;
    const radius = 200;
    const particles = [];

    for (let i = 0; i < CONFIG.sphereParticles; i++) {
      const phi = Math.acos(1 - (2 * (i + 0.5)) / CONFIG.sphereParticles);
      const theta = Math.PI * (1 + Math.sqrt(5)) * i;
      particles.push({ phi, theta, size: Math.random() * 1.5 + 1 });
    }

    let rotation = 0;

    // Performance: Only draw when visible
    observeElement(canvas, (isVisible) => (STATE.sphereActive = isVisible));

    function draw() {
      if (!STATE.sphereActive) {
        requestAnimationFrame(draw);
        return;
      }

      ctx.clearRect(0, 0, size, size);
      rotation += CONFIG.sphereRotationSpeed;

      const sorted = particles
        .map((p) => {
          const x = radius * Math.sin(p.phi) * Math.cos(p.theta + rotation);
          const y = radius * Math.cos(p.phi);
          const z = radius * Math.sin(p.phi) * Math.sin(p.theta + rotation);
          return {
            x,
            y,
            z,
            size: p.size,
            alpha: ((z + radius) / (2 * radius)) * 0.7 + 0.3,
          };
        })
        .sort((a, b) => a.z - b.z);

      sorted.forEach((p) => {
        const sX = size / 2 + p.x,
          sY = size / 2 + p.y;
        const pSize = p.size + ((p.z + radius) / (2 * radius)) * 2;
        ctx.fillStyle = `hsla(120, 70%, 60%, ${p.alpha})`;
        ctx.beginPath();
        ctx.arc(sX, sY, pSize, 0, Math.PI * 2);
        ctx.fill();
      });

      requestAnimationFrame(draw);
    }
    draw();
  }

  // --- 6. 3D GLOBE (ABOUT SIDE) ---
  function init3DGlobe() {
    const canvas = dom.globeCanvas;
    const ctx = canvas.getContext("2d");
    const size = 400;
    canvas.width = size;
    canvas.height = size;
    const radius = 180;
    const dots = [];

    for (let i = 0; i < CONFIG.globeDots; i++) {
      const phi = Math.acos(1 - (2 * (i + 0.5)) / CONFIG.globeDots);
      const theta = Math.PI * (1 + Math.sqrt(5)) * i;
      dots.push({ phi, theta });
    }

    let rotation = 0;
    observeElement(canvas, (isVisible) => (STATE.globeActive = isVisible));

    function draw() {
      if (!STATE.globeActive) {
        requestAnimationFrame(draw);
        return;
      }

      ctx.clearRect(0, 0, size, size);
      rotation += 0.003;

      const sorted = dots
        .map((d) => {
          const x = radius * Math.sin(d.phi) * Math.cos(d.theta + rotation);
          const y = radius * Math.cos(d.phi);
          const z = radius * Math.sin(d.phi) * Math.sin(d.theta + rotation);
          return { x, y, z, alpha: ((z + radius) / (2 * radius)) * 0.7 + 0.3 };
        })
        .sort((a, b) => a.z - b.z);

      sorted.forEach((d) => {
        const sX = size / 2 + d.x,
          sY = size / 2 + d.y;
        ctx.fillStyle = `rgba(135, 206, 235, ${d.alpha})`;
        ctx.beginPath();
        ctx.arc(sX, sY, 2, 0, Math.PI * 2);
        ctx.fill();
      });

      requestAnimationFrame(draw);
    }
    draw();
  }

  // --- 7. UTILS ---
  function lerp(start, end, t) {
    return start * (1 - t) + end * t;
  }

  function debounce(func, wait) {
    let timeout;
    return (...args) => {
      clearTimeout(timeout);
      timeout = setTimeout(() => func.apply(this, args), wait);
    };
  }

  function observeElement(el, callback) {
    const observer = new IntersectionObserver(
      (entries) => {
        callback(entries[0].isIntersecting);
      },
      { threshold: 0.1 }
    );
    observer.observe(el);
  }

  // Start
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
