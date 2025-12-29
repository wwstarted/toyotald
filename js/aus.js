/**
 * CDA Hero to About Us - FIXED VERSION
 * ✅ Video follows scroll like collectivedesign.agency
 * ✅ 3D Sphere pattern visible and rotating
 */

(function () {
  "use strict";

  // Configuration
  const CONFIG = {
    enableLogging: true,
    videoStartSize: { width: 325, height: 225 },
    videoEndSize: { width: 650, height: 450 },
    // sphereParticles: 150,
    // sphereRotationSpeed: 0.003,
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

  // State
  let heroHeight = 0;
  let aboutOffsetTop = 0;
  let videoSettledAreaRect = null;
  let transitionStartScroll = 0;
  let transitionEndScroll = 0;
  let videoSettled = false;
  let ticking = false;

  // DOM Elements
  const heroSection = document.getElementById("cdaHero");
  const aboutSection = document.getElementById("cdaAbout");
  const videoIntro = document.getElementById("cdaVideoIntro");
  const videoSettledArea = document.getElementById("cdaVideoSettledArea");
  const sphereCanvas = document.getElementById("cdaSphereCanvas");
  const globePattern = document.querySelector(".cda-globe-pattern");
  const globeCanvas = document.getElementById("cdaGlobeCanvas");
  const locations = document.querySelector(".cda-locations");
  const description = document.querySelector(".cda-description");

  /**
   * =============================================
   * INITIALIZATION
   * =============================================
   */
  // function init() {
  //   if (!heroSection || !aboutSection || !videoIntro) {
  //     console.warn("❌ Required sections not found");
  //     return;
  //   }

  //   checkVideoLoad();
  //   calculatePositions();

  //   // Initialize 3D Sphere Pattern Background
  //   if (sphereCanvas) {
  //     init3DSpherePattern();
  //   }

  //   // Initialize 3D Globe
  //   if (globeCanvas) {
  //     init3DGlobe();
  //   }

  //   bindEvents();
  //   updateScrollProgress(); // Initial update

  //   log("✅ CDA transition initialized");
  // }
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

  function applyVideoStyle(t, l, w, h) {
    dom.videoContainer.style.position = "fixed";
    dom.videoContainer.style.top = `${t}px`;
    dom.videoContainer.style.left = `${l}px`;
    dom.videoContainer.style.width = `${w}px`;
    dom.videoContainer.style.height = `${h}px`;
    dom.videoContainer.style.transform = "none";
    dom.videoContainer.style.opacity = lerp(0.7, 1, STATE.progress);
  }

  /**
   * Check video load
   */
  function checkVideoLoad() {
    const video = videoIntro.querySelector(".cda-video");
    const fallback = videoIntro.querySelector(".cda-video-fallback");

    if (!video) return;

    video.addEventListener("error", () => {
      log("❌ Video failed to load");
      if (fallback) {
        video.style.display = "none";
        fallback.style.display = "flex";
      }
    });

    video.addEventListener("loadeddata", () => {
      log("✅ Video loaded successfully");
    });
  }

  /**
   * =============================================
   * CALCULATE POSITIONS
   * =============================================
   */
  function calculatePositions() {
    heroHeight = heroSection.offsetHeight;
    aboutOffsetTop = aboutSection.offsetTop;

    // Get settled area position
    const settledRect = videoSettledArea.getBoundingClientRect();
    const settledAbsoluteTop =
      aboutOffsetTop +
      videoSettledArea.offsetTop +
      parseInt(getComputedStyle(aboutSection).paddingTop);

    // Transition starts when leaving hero, ends when video reaches settled position
    transitionStartScroll = heroHeight * 0.3; // Start earlier for smoother transition
    transitionEndScroll = settledAbsoluteTop - window.innerHeight * 0.3; // Account for viewport

    log("📊 Positions calculated:", {
      heroHeight,
      aboutOffsetTop,
      settledAbsoluteTop,
      transitionStartScroll,
      transitionEndScroll,
      transitionDistance: transitionEndScroll - transitionStartScroll,
    });
  }

  /**
   * Bind events
   */
  function bindEvents() {
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", debounce(onResize, 250));
  }

  /**
   * Scroll handler
   */
  // function onScroll() {
  //   if (!ticking) {
  //     ticking = true;
  //     requestAnimationFrame(updateScrollProgress);
  //   }
  // }

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

  /**
   * =============================================
   * MAIN SCROLL UPDATE - FIXED LOGIC
   * =============================================
   */
  function updateScrollProgress() {
    const scrollY = window.scrollY;

    // Calculate progress (0 to 1)
    let progress = 0;
    if (scrollY <= transitionStartScroll) {
      progress = 0;
    } else if (scrollY >= transitionEndScroll) {
      progress = 1;
    } else {
      progress =
        (scrollY - transitionStartScroll) /
        (transitionEndScroll - transitionStartScroll);
    }

    const easedProgress = easeInOutCubic(progress);

    // Phase 1: Video is transitioning (following scroll)
    if (progress < 1 && !videoSettled) {
      updateVideoPosition(easedProgress, scrollY);
      updateSphereFade(easedProgress);
    }
    // Phase 2: Video has reached settled position
    else if (progress >= 1 && !videoSettled) {
      settleVideoInAbout();
      revealAboutContent();
      videoSettled = true;
      log("✅ Video settled in About section");
    }
    // Phase 3: Video is settled, keep it in place
    else if (videoSettled) {
      // Video stays in settled area, no longer follows scroll
    }

    ticking = false;
  }

  /**
   * =============================================
   * UPDATE VIDEO POSITION - FOLLOWS SCROLL
   * =============================================
   */
  function updateVideoPosition(progress, scrollY) {
    if (!videoIntro || !videoSettledArea) return;

    // Calculate size transition (325x225 → 650x450)
    const currentWidth = lerp(
      CONFIG.videoStartSize.width,
      CONFIG.videoEndSize.width,
      progress
    );
    const currentHeight = lerp(
      CONFIG.videoStartSize.height,
      CONFIG.videoEndSize.height,
      progress
    );

    // Calculate position
    // Start: Fixed at bottom-right of viewport
    // End: Absolute position at settled area
    const aboutRect = aboutSection.getBoundingClientRect();
    const settledRect = videoSettledArea.getBoundingClientRect();

    // Start position (in viewport coordinates)
    const startBottom = 0;
    const startRight = window.innerWidth * 0.05;

    // End position (where settled area is in viewport)
    const endTop = settledRect.top + window.scrollY - scrollY;
    const endLeft = settledRect.left;

    // Calculate current position
    let currentTop, currentRight, currentLeft;

    if (progress < 0.5) {
      // First half: Stay fixed, just grow
      videoIntro.style.position = "fixed";
      videoIntro.style.bottom = startBottom + "px";
      videoIntro.style.right = startRight + "px";
      videoIntro.style.top = "auto";
      videoIntro.style.left = "auto";
    } else {
      // Second half: Start moving towards settled position
      const moveProgress = (progress - 0.5) / 0.5; // 0 to 1 in second half

      // Calculate target position relative to viewport
      const settledOffsetTop =
        aboutOffsetTop + videoSettledArea.offsetTop - scrollY;
      const settledOffsetLeft =
        aboutSection.offsetLeft +
        (aboutSection.offsetWidth - videoSettledArea.offsetWidth) / 2 +
        videoSettledArea.offsetLeft;

      currentTop = lerp(
        window.innerHeight - currentHeight,
        settledOffsetTop,
        moveProgress
      );
      currentLeft = lerp(
        window.innerWidth - startRight - currentWidth,
        settledOffsetLeft,
        moveProgress
      );

      videoIntro.style.position = "fixed";
      videoIntro.style.top = currentTop + "px";
      videoIntro.style.left = currentLeft + "px";
      videoIntro.style.right = "auto";
      videoIntro.style.bottom = "auto";
    }

    // Apply size and opacity
    videoIntro.style.width = currentWidth + "px";
    videoIntro.style.height = currentHeight + "px";
    videoIntro.style.opacity = lerp(0.7, 1, progress);
    videoIntro.style.transform = "none";

    log("📍 Video position:", {
      progress: progress.toFixed(2),
      width: currentWidth.toFixed(0),
      height: currentHeight.toFixed(0),
    });
  }

  /**
   * =============================================
   * SETTLE VIDEO IN ABOUT SECTION
   * =============================================
   */
  function settleVideoInAbout() {
    if (!videoIntro || !videoSettledArea) return;

    // Move video into settled area container
    videoSettledArea.appendChild(videoIntro);

    // Change to absolute positioning within settled area
    videoIntro.style.position = "absolute";
    videoIntro.style.top = "0";
    videoIntro.style.left = "0";
    videoIntro.style.right = "auto";
    videoIntro.style.bottom = "auto";
    videoIntro.style.width = "100%";
    videoIntro.style.height = "100%";
    videoIntro.style.transform = "none";
    videoIntro.style.opacity = "1";

    // Show video text overlay
    videoSettledArea.classList.add("has-video");

    log("✅ Video settled");
  }

  /**
   * Update sphere fade during transition
   */
  function updateSphereFade(progress) {
    const pattern3d = document.querySelector(".cda-pattern-3d");
    if (pattern3d && progress > 0.3) {
      const opacity = 1 - (progress - 0.3) / 0.7;
      pattern3d.style.opacity = Math.max(0, opacity);
    }
  }

  /**
   * Reveal About section content
   */
  function revealAboutContent() {
    if (globePattern) {
      setTimeout(() => {
        globePattern.classList.add("revealed");
      }, 200);
    }

    if (locations) {
      setTimeout(() => {
        locations.classList.add("revealed");
      }, 400);
    }

    if (description) {
      setTimeout(() => {
        description.classList.add("revealed");
      }, 600);
    }
  }

  /**
   * =============================================
   * 3D SPHERE PATTERN BACKGROUND
   * =============================================
   */
  let sphereAnimation = null;

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

  function observeElement(el, callback) {
    const observer = new IntersectionObserver(
      (entries) => {
        callback(entries[0].isIntersecting);
      },
      { threshold: 0.1 }
    );
    observer.observe(el);
  }

  function init3DSpherePattern() {
    if (!sphereCanvas) {
      log("❌ Sphere canvas not found");
      return;
    }

    const canvas = sphereCanvas;
    const ctx = canvas.getContext("2d");

    // Set canvas size
    const size = 600;
    canvas.width = size;
    canvas.height = size;

    const centerX = size / 2;
    const centerY = size / 2;
    const radius = 200;

    // Generate particles on sphere surface
    const particles = [];
    const numParticles = CONFIG.sphereParticles;

    for (let i = 0; i < numParticles; i++) {
      // Fibonacci sphere distribution
      const phi = Math.acos(1 - (2 * (i + 0.5)) / numParticles);
      const theta = Math.PI * (1 + Math.sqrt(5)) * i;

      particles.push({
        phi: phi,
        theta: theta,
        x: 0,
        y: 0,
        z: 0,
        alpha: 1,
        size: Math.random() * 1.5 + 1,
      });
    }

    let rotation = 0;

    // Animation function
    function animate() {
      // Clear canvas with transparency
      ctx.clearRect(0, 0, size, size);

      // Update rotation
      rotation += CONFIG.sphereRotationSpeed;

      // Calculate 3D positions
      particles.forEach((particle) => {
        const x =
          radius * Math.sin(particle.phi) * Math.cos(particle.theta + rotation);
        const y = radius * Math.cos(particle.phi);
        const z =
          radius * Math.sin(particle.phi) * Math.sin(particle.theta + rotation);

        particle.x = x;
        particle.y = y;
        particle.z = z;

        // Calculate alpha based on z-depth (front particles brighter)
        particle.alpha = ((z + radius) / (2 * radius)) * 0.7 + 0.3;
      });

      // Sort by z-depth (back to front)
      particles.sort((a, b) => a.z - b.z);

      // Draw particles
      particles.forEach((particle) => {
        const screenX = centerX + particle.x;
        const screenY = centerY + particle.y;

        // Size based on depth
        const particleSize =
          particle.size + ((particle.z + radius) / (2 * radius)) * 2;

        // Green/lime gradient colors
        const gradient = ctx.createRadialGradient(
          screenX,
          screenY,
          0,
          screenX,
          screenY,
          particleSize * 2
        );

        // Vibrant green colors
        const hue = 110 + Math.random() * 30; // Green to lime range
        gradient.addColorStop(0, `hsla(${hue}, 80%, 65%, ${particle.alpha})`);
        gradient.addColorStop(
          0.5,
          `hsla(${hue}, 70%, 60%, ${particle.alpha * 0.5})`
        );
        gradient.addColorStop(1, `hsla(${hue}, 60%, 55%, 0)`);

        ctx.fillStyle = gradient;
        ctx.beginPath();
        ctx.arc(screenX, screenY, particleSize * 2, 0, Math.PI * 2);
        ctx.fill();
      });

      // Draw rotating rings
      drawSphereRings(ctx, centerX, centerY, radius, rotation);

      sphereAnimation = requestAnimationFrame(animate);
    }

    // Start animation
    animate();
    log("✅ 3D Sphere Pattern initialized");
  }

  /**
   * Draw sphere rings
   */
  function drawSphereRings(ctx, centerX, centerY, radius, rotation) {
    // Equator ring
    ctx.strokeStyle = "rgba(144, 238, 144, 0.2)";
    ctx.lineWidth = 2;
    ctx.beginPath();

    for (let angle = 0; angle < Math.PI * 2; angle += 0.05) {
      const x = centerX + radius * Math.cos(angle);
      const y = centerY + radius * Math.sin(angle) * Math.cos(rotation);

      if (angle === 0) ctx.moveTo(x, y);
      else ctx.lineTo(x, y);
    }
    ctx.closePath();
    ctx.stroke();

    // Meridian ring
    ctx.strokeStyle = "rgba(173, 255, 47, 0.15)";
    ctx.lineWidth = 1.5;
    ctx.beginPath();

    for (let angle = 0; angle < Math.PI * 2; angle += 0.05) {
      const x = centerX + radius * Math.cos(angle) * Math.sin(rotation);
      const y = centerY + radius * Math.sin(angle);

      if (angle === 0) ctx.moveTo(x, y);
      else ctx.lineTo(x, y);
    }
    ctx.closePath();
    ctx.stroke();

    // Tilted ring
    ctx.strokeStyle = "rgba(50, 205, 50, 0.12)";
    ctx.lineWidth = 1;
    ctx.beginPath();

    const tilt = Math.PI / 6;
    for (let angle = 0; angle < Math.PI * 2; angle += 0.05) {
      const x = centerX + radius * 0.85 * Math.cos(angle);
      const y =
        centerY +
        radius * 0.85 * Math.sin(angle) * Math.cos(tilt + rotation * 0.7);

      if (angle === 0) ctx.moveTo(x, y);
      else ctx.lineTo(x, y);
    }
    ctx.closePath();
    ctx.stroke();
  }

  /**
   * =============================================
   * 3D GLOBE CANVAS
   * =============================================
   */
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

  function drawGlobeRings(ctx, centerX, centerY, radius, rotation) {
    ctx.strokeStyle = "rgba(135, 206, 235, 0.2)";
    ctx.lineWidth = 1.5;
    ctx.beginPath();

    for (let angle = 0; angle < Math.PI * 2; angle += 0.1) {
      const x = centerX + radius * Math.cos(angle);
      const y = centerY + radius * Math.sin(angle) * Math.cos(rotation);

      if (angle === 0) ctx.moveTo(x, y);
      else ctx.lineTo(x, y);
    }
    ctx.closePath();
    ctx.stroke();

    ctx.beginPath();
    for (let angle = 0; angle < Math.PI * 2; angle += 0.1) {
      const x = centerX + radius * Math.cos(angle) * Math.sin(rotation);
      const y = centerY + radius * Math.sin(angle);

      if (angle === 0) ctx.moveTo(x, y);
      else ctx.lineTo(x, y);
    }
    ctx.closePath();
    ctx.stroke();
  }

  /**
   * =============================================
   * RESIZE HANDLER
   * =============================================
   */
  function onResize() {
    calculatePositions();

    if (videoSettled) {
      videoSettled = false;
      videoIntro.style.position = "fixed";
      videoIntro.style.bottom = "0";
      videoIntro.style.right = "5%";
      videoIntro.style.width = CONFIG.videoStartSize.width + "px";
      videoIntro.style.height = CONFIG.videoStartSize.height + "px";

      if (!ticking) {
        ticking = true;
        requestAnimationFrame(updateScrollProgress);
      }
    }
  }

  /**
   * =============================================
   * UTILITY FUNCTIONS
   * =============================================
   */
  function lerp(start, end, t) {
    return start * (1 - t) + end * t;
  }

  function easeInOutCubic(t) {
    return t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
  }

  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  //   function debounce(func, wait) {
  //   let timeout;
  //   return (...args) => {
  //     clearTimeout(timeout);
  //     timeout = setTimeout(() => func.apply(this, args), wait);
  //   };
  // }
  function log(...args) {
    if (CONFIG.enableLogging) {
      console.log("[CDA]", ...args);
    }
  }

  /**
   * =============================================
   * PUBLIC API
   * =============================================
   */
  window.CDATransition = {
    enableLogging: () => {
      CONFIG.enableLogging = true;
    },
    disableLogging: () => {
      CONFIG.enableLogging = false;
    },
    reset: () => {
      videoSettled = false;
      videoIntro.style.position = "fixed";
      videoIntro.style.bottom = "0";
      videoIntro.style.right = "5%";
      videoIntro.style.width = CONFIG.videoStartSize.width + "px";
      videoIntro.style.height = CONFIG.videoStartSize.height + "px";
      window.scrollTo(0, 0);
    },
  };

  /**
   * Smooth scroll indicator
   */
  (function initSmoothScroll() {
    const scrollIndicator = document.querySelector(".cda-scroll-indicator");
    if (scrollIndicator) {
      scrollIndicator.addEventListener("click", () => {
        window.scrollTo({
          top: window.innerHeight,
          behavior: "smooth",
        });
      });
    }
  })();

  /**
   * Initialize
   */
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
