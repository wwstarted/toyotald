/**
 * CDA Hero to About Us - Final Version
 * Video transitions from Hero → settles in About section (NOT sticky after)
 */

(function () {
  "use strict";

  // Configuration
  const CONFIG = {
    transitionDistance: 1000, // Scroll distance for full transition
    enableLogging: true,
  };

  // State
  let heroHeight = 0;
  let aboutOffsetTop = 0;
  let videoSettled = false;
  let ticking = false;

  // DOM Elements
  const heroSection = document.getElementById("cdaHero");
  const aboutSection = document.getElementById("cdaAbout");
  const videoIntro = document.getElementById("cdaVideoIntro");
  const videoSettledArea = document.getElementById("cdaVideoSettledArea");
  const patternGreen = document.querySelector(".cda-pattern-green");
  const globePattern = document.querySelector(".cda-globe-pattern");
  const globeCanvas = document.getElementById("cdaGlobeCanvas");
  const locations = document.querySelector(".cda-locations");
  const description = document.querySelector(".cda-description");
  const videoTextOverlay = document.querySelector(".cda-video-text-overlay");

  /**
   * Initialize
   */
  function init() {
    if (!heroSection || !aboutSection || !videoIntro) {
      console.warn("❌ Required sections not found");
      return;
    }

    checkVideoLoad();
    calculatePositions();

    // ✅ Initialize 3D Globe
    if (globeCanvas) {
      init3DGlobe();
    }

    bindEvents();

    log("✅ CDA transition initialized");
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
   * Calculate positions
   */
  function calculatePositions() {
    heroHeight = heroSection.offsetHeight;
    aboutOffsetTop = aboutSection.offsetTop;
    log("Hero height:", heroHeight, "About offset:", aboutOffsetTop);
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
  function onScroll() {
    if (!ticking) {
      ticking = true;
      requestAnimationFrame(updateScrollProgress);
    }
  }

  /**
   * Main scroll update function
   */
  function updateScrollProgress() {
    const scrollY = window.scrollY;

    // Phase 1: Transition animation (0 → transitionDistance)
    if (scrollY < CONFIG.transitionDistance && !videoSettled) {
      const progress = scrollY / CONFIG.transitionDistance;
      const easedProgress = easeInOutCubic(progress);

      updateVideoTransition(easedProgress);
      updatePatternFade(easedProgress);
    }
    // Phase 2: Settle video in About section
    else if (scrollY >= CONFIG.transitionDistance && !videoSettled) {
      settleVideoInAbout();
      revealAboutContent();
      videoSettled = true;
      log("✅ Video settled in About section");
    }

    ticking = false;
  }

  /**
   * Update video during transition phase
   */
  function updateVideoTransition(progress) {
    if (!videoIntro) return;

    // Size: 325x225 → 650x450 (2x scale)
    const width = lerp(325, 650, progress);
    const height = lerp(225, 450, progress);

    // Position: bottom-right → top-right of About section
    // Use fixed positioning during transition
    const translateY = lerp(50, -20, progress); // Start 50% below, move to -20%
    const translateX = lerp(0, 0, progress); // Stay at right: 5%
    const opacity = lerp(0.7, 1, progress);

    videoIntro.style.position = "fixed";
    videoIntro.style.width = width + "px";
    videoIntro.style.height = height + "px";
    videoIntro.style.transform = `translateY(${translateY}%) translateX(${translateX}%)`;
    videoIntro.style.opacity = opacity;
  }

  /**
   * Settle video into About section (stop following scroll)
   * ✅ FIX: Proper alignment in settled area
   */
  function settleVideoInAbout() {
    if (!videoIntro || !videoSettledArea) return;

    // ✅ Move video directly into settled area
    videoIntro.style.position = "absolute";
    videoIntro.style.top = "0";
    videoIntro.style.left = "0";
    videoIntro.style.right = "auto";
    videoIntro.style.bottom = "auto";
    videoIntro.style.width = "100%";
    videoIntro.style.height = "100%";
    videoIntro.style.transform = "none";
    videoIntro.style.opacity = "1";

    // Move video DOM element into settled area
    videoSettledArea.appendChild(videoIntro);

    // Show video text overlay
    if (videoSettledArea) {
      videoSettledArea.classList.add("has-video");
    }

    log("✅ Video settled in area - proper alignment");
  }

  /**
   * Update pattern fade
   */
  function updatePatternFade(progress) {
    if (patternGreen && progress > 0.3) {
      patternGreen.style.opacity = 1 - (progress - 0.3) / 0.7;
    }
  }

  /**
   * Reveal About section content
   */
  function revealAboutContent() {
    // Globe pattern
    if (globePattern) {
      setTimeout(() => {
        globePattern.classList.add("revealed");
      }, 200);
    }

    // Locations
    if (locations) {
      setTimeout(() => {
        locations.classList.add("revealed");
      }, 400);
    }

    // Description
    if (description) {
      setTimeout(() => {
        description.classList.add("revealed");
      }, 600);
    }
  }

  /**
   * Resize handler
   */
  function onResize() {
    calculatePositions();

    // Reset if video already settled
    if (videoSettled) {
      videoSettled = false;
      videoIntro.style.position = "fixed";
      videoIntro.style.bottom = "0";
      videoIntro.style.right = "5%";
      videoIntro.style.top = "auto";

      // Re-trigger update
      if (!ticking) {
        ticking = true;
        requestAnimationFrame(updateScrollProgress);
      }
    }
  }

  /**
   * Linear interpolation
   */
  function lerp(start, end, t) {
    return start * (1 - t) + end * t;
  }

  /**
   * Easing function
   */
  function easeInOutCubic(t) {
    return t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
  }

  /**
   * Debounce helper
   */
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

  /**
   * Logging helper
   */
  function log(...args) {
    if (CONFIG.enableLogging) {
      console.log("[CDA]", ...args);
    }
  }

  /**
   * =============================================
   * 3D GLOBE CANVAS - OPTION B
   * Real 3D sphere rotating around axis
   * =============================================
   */
  let globe3D = null;

  function init3DGlobe() {
    if (!globeCanvas) return;

    const canvas = globeCanvas;
    const ctx = canvas.getContext("2d");

    // Set canvas size
    const size = 400;
    canvas.width = size;
    canvas.height = size;

    const centerX = size / 2;
    const centerY = size / 2;
    const radius = 180;

    // Generate dots on sphere surface
    const dots = [];
    const numDots = 200;

    for (let i = 0; i < numDots; i++) {
      // Fibonacci sphere distribution for even spacing
      const phi = Math.acos(1 - (2 * (i + 0.5)) / numDots);
      const theta = Math.PI * (1 + Math.sqrt(5)) * i;

      dots.push({
        phi: phi,
        theta: theta,
        x: 0,
        y: 0,
        z: 0,
        alpha: 1,
      });
    }

    let rotation = 0;

    // Animation function
    function animate() {
      // Clear canvas
      ctx.clearRect(0, 0, size, size);

      // Update rotation
      rotation += 0.003; // Slow rotation speed

      // Calculate 3D positions and project to 2D
      dots.forEach((dot) => {
        // Convert spherical to Cartesian coordinates
        const x = radius * Math.sin(dot.phi) * Math.cos(dot.theta + rotation);
        const y = radius * Math.cos(dot.phi);
        const z = radius * Math.sin(dot.phi) * Math.sin(dot.theta + rotation);

        // Store 3D coordinates
        dot.x = x;
        dot.y = y;
        dot.z = z;

        // Calculate alpha based on z-depth (dots in back are dimmer)
        dot.alpha = ((z + radius) / (2 * radius)) * 0.7 + 0.3;
      });

      // Sort dots by z-depth (back to front)
      dots.sort((a, b) => a.z - b.z);

      // Draw dots
      dots.forEach((dot) => {
        const screenX = centerX + dot.x;
        const screenY = centerY + dot.y;

        // Dot size based on depth
        const dotSize = 2 + ((dot.z + radius) / (2 * radius)) * 2;

        // Draw dot with gradient
        const gradient = ctx.createRadialGradient(
          screenX,
          screenY,
          0,
          screenX,
          screenY,
          dotSize
        );

        gradient.addColorStop(0, `rgba(135, 206, 235, ${dot.alpha})`);
        gradient.addColorStop(1, `rgba(135, 206, 235, 0)`);

        ctx.fillStyle = gradient;
        ctx.beginPath();
        ctx.arc(screenX, screenY, dotSize, 0, Math.PI * 2);
        ctx.fill();
      });

      // Draw rotating rings
      drawRings(ctx, centerX, centerY, radius, rotation);

      // Continue animation
      requestAnimationFrame(animate);
    }

    // Start animation
    animate();

    globe3D = { canvas, ctx, animate };
    log("✅ 3D Globe initialized");
  }

  /**
   * Draw rotating rings around globe
   */
  function drawRings(ctx, centerX, centerY, radius, rotation) {
    // Ring 1 - Equator
    ctx.strokeStyle = "rgba(135, 206, 235, 0.2)";
    ctx.lineWidth = 1.5;
    ctx.beginPath();

    for (let angle = 0; angle < Math.PI * 2; angle += 0.1) {
      const x = centerX + radius * Math.cos(angle);
      const y = centerY + radius * Math.sin(angle) * Math.cos(rotation);

      if (angle === 0) {
        ctx.moveTo(x, y);
      } else {
        ctx.lineTo(x, y);
      }
    }
    ctx.closePath();
    ctx.stroke();

    // Ring 2 - Meridian
    ctx.beginPath();
    for (let angle = 0; angle < Math.PI * 2; angle += 0.1) {
      const x = centerX + radius * Math.cos(angle) * Math.sin(rotation);
      const y = centerY + radius * Math.sin(angle);

      if (angle === 0) {
        ctx.moveTo(x, y);
      } else {
        ctx.lineTo(x, y);
      }
    }
    ctx.closePath();
    ctx.stroke();

    // Ring 3 - Tilted ring
    ctx.strokeStyle = "rgba(135, 206, 235, 0.15)";
    ctx.lineWidth = 1;
    ctx.beginPath();

    for (let angle = 0; angle < Math.PI * 2; angle += 0.1) {
      const tilt = Math.PI / 6; // 30 degree tilt
      const x = centerX + radius * 0.8 * Math.cos(angle);
      const y =
        centerY +
        radius * 0.8 * Math.sin(angle) * Math.cos(tilt + rotation * 0.5);

      if (angle === 0) {
        ctx.moveTo(x, y);
      } else {
        ctx.lineTo(x, y);
      }
    }
    ctx.closePath();
    ctx.stroke();
  }

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
      videoIntro.style.width = "325px";
      videoIntro.style.height = "225px";
      videoIntro.style.transform = "translateY(50%)";
      videoIntro.style.opacity = "0.7";
    },
  };

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();

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
