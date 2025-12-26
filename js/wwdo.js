(function () {
  "use strict";

  const CONFIG = {
    serviceCount: 3,
    patternMapping: {
      1: [1, 2],
      2: [3, 4],
      3: [5, 6],
    },
    transitionDuration: 800,
    parallaxIntensity: 0.3,
    activeThreshold: 0.4,
  };

  // State
  let currentService = 0;
  let isTransitioning = false;
  let ticking = false;
  let scrollY = 0;

  // DOM Elements
  const section = document.querySelector(".wwd-section");
  const serviceSlides = document.querySelectorAll(".wwd-service-slide");
  const patterns = document.querySelectorAll(".wwd-pattern");
  const sectionTitle = document.querySelector(".wwd-section-title");
  const contentWrapper = document.querySelector(".wwd-content-wrapper");

  /**
   * Initialize
   */
  function init() {
    if (!section || serviceSlides.length === 0) {
      console.warn("What We Do section not found");
      return;
    }

    // Bind scroll event
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onScroll, { passive: true });

    // Initial check
    updateOnScroll();

    // Show first pattern
    if (patterns.length > 0) {
      patterns[0].classList.add("active");
    }

    // Add parallax to cards
    initParallax();

    console.log("✅ What We Do section initialized (Modern Version)");
  }

  /**
   * Scroll handler with RAF throttling
   */
  function onScroll() {
    scrollY = window.scrollY;

    if (!ticking) {
      window.requestAnimationFrame(() => {
        updateOnScroll();
        updateParallax();
        updateTitleOpacity();
        ticking = false;
      });
      ticking = true;
    }
  }

  /**
   * Main update function
   */
  function updateOnScroll() {
    const viewportCenter = window.innerHeight / 2 + window.scrollY;
    let closestService = 0;
    let closestDistance = Infinity;

    // Find which service is closest to viewport center
    serviceSlides.forEach((slide, index) => {
      const rect = slide.getBoundingClientRect();
      const slideCenter = rect.top + window.scrollY + rect.height / 2;
      const distance = Math.abs(viewportCenter - slideCenter);

      if (distance < closestDistance) {
        closestDistance = distance;
        closestService = index + 1;
      }
    });

    // Update states
    updateServiceStates(closestService);

    // Update pattern if service changed
    if (closestService !== currentService && closestService > 0) {
      if (currentService > 0) {
        transitionPattern(currentService, closestService);
      }
      currentService = closestService;
    }
  }

  /**
   * Update service slide states
   */
  function updateServiceStates(activeIndex) {
    serviceSlides.forEach((slide, index) => {
      const slideNumber = index + 1;

      // Remove all states
      slide.classList.remove("active", "before", "after");

      // Apply appropriate state
      if (slideNumber === activeIndex) {
        slide.classList.add("active");
      } else if (slideNumber < activeIndex) {
        slide.classList.add("before");
      } else {
        slide.classList.add("after");
      }
    });
  }

  /**
   * Smooth crossfade transition between patterns
   */
  function transitionPattern(fromService, toService) {
    if (isTransitioning) return;
    isTransitioning = true;

    const fromPatterns = CONFIG.patternMapping[fromService];
    const toPatterns = CONFIG.patternMapping[toService];

    if (!fromPatterns || !toPatterns) {
      isTransitioning = false;
      return;
    }

    // Get pattern elements
    const fromPattern = patterns[fromPatterns[0] - 1];
    const toPattern = patterns[toPatterns[0] - 1];

    if (!fromPattern || !toPattern) {
      isTransitioning = false;
      return;
    }

    // Add fading-out class for smooth fade
    fromPattern.classList.add("fading-out");

    // Crossfade timing
    setTimeout(() => {
      // Remove old pattern
      fromPattern.classList.remove("active", "fading-out");

      // Show new pattern with fade in
      toPattern.classList.add("active");

      isTransitioning = false;
    }, CONFIG.transitionDuration * 0.6);
  }

  /**
   * Parallax effect on patterns
   */
  function initParallax() {
    serviceSlides.forEach((slide) => {
      const card = slide.querySelector(".wwd-card");
      if (card) {
        card.setAttribute("data-parallax", "true");
      }
    });
  }

  /**
   * Update parallax on scroll
   */
  function updateParallax() {
    const bgWrapper = document.querySelector(".wwd-bg-wrapper");
    if (!bgWrapper) return;

    const rect = bgWrapper.getBoundingClientRect();
    const scrollProgress = Math.max(0, Math.min(1, -rect.top / rect.height));

    // Apply subtle parallax to active pattern
    const activePattern = document.querySelector(".wwd-pattern.active");
    if (activePattern) {
      const img = activePattern.querySelector(".wwd-pattern-image");
      if (img) {
        const offset = scrollProgress * 30 * CONFIG.parallaxIntensity;
        img.style.transform = `translateY(${offset}px)`;
      }
    }

    // Apply parallax to cards
    serviceSlides.forEach((slide) => {
      const card = slide.querySelector(".wwd-card[data-parallax]");
      if (!card) return;

      const cardRect = card.getBoundingClientRect();
      const cardCenter = cardRect.top + cardRect.height / 2;
      const viewportCenter = window.innerHeight / 2;
      const distance = cardCenter - viewportCenter;
      const parallaxOffset = distance * CONFIG.parallaxIntensity * 0.1;

      if (slide.classList.contains("active")) {
        card.style.transform = `translateY(${parallaxOffset}px)`;
      }
    });
  }

  /**
   * Fade title on scroll
   */
  function updateTitleOpacity() {
    if (!sectionTitle || !contentWrapper) return;

    const rect = contentWrapper.getBoundingClientRect();
    const scrollThreshold = window.innerHeight * 0.3;

    // Keep title visible when content is in view
    if (rect.top < scrollThreshold && rect.bottom > 0) {
      sectionTitle.style.opacity = "1";
    } else if (rect.top < 0) {
      // Fade out when scrolled past
      const fadeProgress = Math.max(0, 1 + rect.top / 200);
      sectionTitle.style.opacity = fadeProgress.toString();
    }
  }

  /**
   * Get current active service (for external access)
   */
  function getCurrentService() {
    return currentService;
  }

  /**
   * Cleanup
   */
  function destroy() {
    window.removeEventListener("scroll", onScroll);
    window.removeEventListener("resize", onScroll);
    console.log("🧹 What We Do section destroyed");
  }

  // Initialize on DOM ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  // Expose API
  window.WWDSection = {
    getCurrentService,
    destroy,
  };
})();

document.addEventListener("DOMContentLoaded", function () {
  (function () {
    "use strict";

    // Configuration
    const CONFIG = {
      visibleCards: 5,
      transitionDuration: 700,
      autoplayDelay: 5000,
      wheelThrottle: 800,
      touchThreshold: 50,
    };

    // State
    let currentIndex = 0;
    let totalProjects = 0;
    let isTransitioning = false;
    let autoplayTimer = null;
    let lastWheelTime = 0;

    // Touch tracking
    let touchStartX = 0;
    let touchEndX = 0;

    // DOM Elements
    const section = document.querySelector(".sp-section");
    const track = document.querySelector(".sp-carousel-track");
    const cards = document.querySelectorAll(".sp-project-card");
    const prevBtn = document.querySelector(".sp-nav-prev");
    const nextBtn = document.querySelector(".sp-nav-next");
    const infoTitle = document.getElementById("spInfoTitle");
    const infoCategory = document.getElementById("spInfoCategory");

    // Project data extracted from DOM
    const projects = [];

    /**
     * Initialize
     */
    function init() {
      if (!section || cards.length === 0) {
        console.warn("Select Projects section not found");
        return;
      }

      extractProjectData();
      updateCardPositions();
      bindEvents();

      if (CONFIG.autoplayDelay > 0) {
        startAutoplay();
      }

      setupIntersectionObserver();

      console.log("✅ Select Projects carousel initialized");
      console.log(`📊 Total projects: ${totalProjects}`);
    }

    function extractProjectData() {
      cards.forEach((card, index) => {
        const link = card;
        const img = card.querySelector(".sp-card-image");

        let category = card.getAttribute("data-category");
        if (!category) {
          // Fallback: Try to find category in card HTML
          const categoryEl = card.querySelector(".sp-card-category");
          category = categoryEl ? categoryEl.textContent : "Project Category";
        }

        projects.push({
          index: index,
          title: img ? img.alt : `Project ${index + 1}`,
          category: category,
          url: link.href,
          element: card,
        });
      });

      totalProjects = projects.length;
      currentIndex = 0;

      // Update initial info
      updateProjectInfo(currentIndex);
    }

    /**
     * Bind all event listeners
     */
    function bindEvents() {
      if (prevBtn) prevBtn.addEventListener("click", () => navigate("prev"));
      if (nextBtn) nextBtn.addEventListener("click", () => navigate("next"));

      section.addEventListener("wheel", handleWheel, { passive: false });

      track.addEventListener("touchstart", handleTouchStart, { passive: true });
      track.addEventListener("touchend", handleTouchEnd, { passive: true });

      document.addEventListener("keydown", handleKeyboard);

      section.addEventListener("mouseenter", pauseAutoplay);
      section.addEventListener("mouseleave", resumeAutoplay);

      cards.forEach((card, index) => {
        card.addEventListener("mouseenter", () => {
          if (Math.abs(index - currentIndex) <= 2) {
            updateProjectInfo(index);
          }
        });
      });
    }

    /**
     * Navigate to next or previous project
     */
    function navigate(direction) {
      if (isTransitioning) return;

      if (direction === "next") {
        currentIndex = (currentIndex + 1) % totalProjects;
      } else {
        currentIndex = (currentIndex - 1 + totalProjects) % totalProjects;
      }

      updateCardPositions();
      updateProjectInfo(currentIndex);
      resetAutoplay();
    }

    /**
     * Update card positions based on current index
     */
    function updateCardPositions() {
      isTransitioning = true;

      cards.forEach((card, index) => {
        const relativePosition = getRelativePosition(
          index,
          currentIndex,
          totalProjects
        );

        card.removeAttribute("data-position");

        if (Math.abs(relativePosition) <= 2) {
          card.setAttribute("data-position", relativePosition);
        }
      });

      if (track) {
        track.setAttribute("data-active-index", currentIndex);
      }

      setTimeout(() => {
        isTransitioning = false;
      }, CONFIG.transitionDuration);
    }

    /**
     * Calculate relative position with wrap-around
     */
    function getRelativePosition(cardIndex, activeIndex, total) {
      let diff = cardIndex - activeIndex;

      if (diff > total / 2) {
        diff -= total;
      } else if (diff < -total / 2) {
        diff += total;
      }

      return diff;
    }

    /**
     * Update project info display
     */
    function updateProjectInfo(index) {
      const project = projects[index];
      if (!project) return;

      if (infoTitle) {
        infoTitle.style.opacity = "0";
        setTimeout(() => {
          infoTitle.textContent = project.title;
          infoTitle.style.opacity = "1";
        }, 200);
      }

      if (infoCategory) {
        infoCategory.style.opacity = "0";
        setTimeout(() => {
          infoCategory.textContent = project.category;
          infoCategory.style.opacity = "1";
        }, 200);
      }
    }

    /**
     * ✅ FIXED: Handle mouse wheel - CORRECT LOGIC
     *
     * Logic mới:
     * - Ở project ĐẦU (0): Scroll UP → Exit | Scroll DOWN → Next
     * - Ở project GIỮA: Scroll UP → Prev | Scroll DOWN → Next
     * - Ở project CUỐI: Scroll UP → Prev | Scroll DOWN → Exit
     */
    function handleWheel(e) {
      const now = Date.now();

      // Throttle wheel events
      if (now - lastWheelTime < CONFIG.wheelThrottle) {
        e.preventDefault();
        return;
      }

      // Check if section is in view
      const rect = section.getBoundingClientRect();
      const inView = rect.top < window.innerHeight && rect.bottom > 0;

      if (!inView) return;

      const isScrollingDown = e.deltaY > 0;
      const isScrollingUp = e.deltaY < 0;
      const isFirstProject = currentIndex === 0;
      const isLastProject = currentIndex === totalProjects - 1;

      // Check if scroll is significant enough
      if (Math.abs(e.deltaY) < 30) return;

      // ✅ NEW LOGIC
      if (isScrollingDown) {
        // SCROLL DOWN ⬇️
        if (isLastProject) {
          // Ở project CUỐI → Allow exit xuống
          console.log("🔽 Last project - allowing exit down");
          // Don't prevent default - let page scroll
          lastWheelTime = now;
          return;
        } else {
          // Chưa phải project cuối → Navigate next
          e.preventDefault();
          lastWheelTime = now;
          navigate("next");
          console.log(`🔽 Navigating to next project: ${currentIndex + 1}`);
        }
      } else if (isScrollingUp) {
        // SCROLL UP ⬆️
        if (isFirstProject) {
          // Ở project ĐẦU → Allow exit lên
          console.log("🔼 First project - allowing exit up");
          // Don't prevent default - let page scroll
          lastWheelTime = now;
          return;
        } else {
          // Chưa phải project đầu → Navigate prev
          e.preventDefault();
          lastWheelTime = now;
          navigate("prev");
          console.log(`🔼 Navigating to prev project: ${currentIndex - 1}`);
        }
      }
    }

    /**
     * Handle touch start for swipe
     */
    function handleTouchStart(e) {
      touchStartX = e.touches[0].clientX;
    }

    /**
     * Handle touch end for swipe
     */
    function handleTouchEnd(e) {
      touchEndX = e.changedTouches[0].clientX;
      handleSwipe();
    }

    /**
     * Process swipe gesture
     */
    function handleSwipe() {
      const diff = touchStartX - touchEndX;

      if (Math.abs(diff) > CONFIG.touchThreshold) {
        if (diff > 0) {
          navigate("next");
        } else {
          navigate("prev");
        }
      }
    }

    /**
     * Handle keyboard navigation
     */
    function handleKeyboard(e) {
      if (!isElementInViewport(section)) return;

      if (e.key === "ArrowLeft") {
        e.preventDefault();
        navigate("prev");
      } else if (e.key === "ArrowRight") {
        e.preventDefault();
        navigate("next");
      }
    }

    /**
     * Check if element is in viewport
     */
    function isElementInViewport(el) {
      const rect = el.getBoundingClientRect();
      return rect.top < window.innerHeight && rect.bottom > 0;
    }

    /**
     * Autoplay functions
     */
    function startAutoplay() {
      if (CONFIG.autoplayDelay <= 0) return;
      autoplayTimer = setInterval(() => {
        navigate("next");
      }, CONFIG.autoplayDelay);
    }

    function pauseAutoplay() {
      if (autoplayTimer) {
        clearInterval(autoplayTimer);
        autoplayTimer = null;
      }
    }

    function resumeAutoplay() {
      if (CONFIG.autoplayDelay > 0 && !autoplayTimer) {
        startAutoplay();
      }
    }

    function resetAutoplay() {
      pauseAutoplay();
      resumeAutoplay();
    }

    /**
     * Setup Intersection Observer for entrance animation
     */
    function setupIntersectionObserver() {
      const options = {
        root: null,
        threshold: 0.2,
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("animate-in");
            observer.unobserve(entry.target);
          }
        });
      }, options);

      if (section) {
        observer.observe(section);
      }
    }

    /**
     * Cleanup function
     */
    function destroy() {
      pauseAutoplay();
      section.removeEventListener("wheel", handleWheel);
      document.removeEventListener("keydown", handleKeyboard);
      console.log("🧹 Select Projects carousel destroyed");
    }

    // Initialize
    init();

    // Expose API
    window.SelectProjectsCarousel = {
      navigate,
      goTo: (index) => {
        if (index >= 0 && index < totalProjects) {
          currentIndex = index;
          updateCardPositions();
          updateProjectInfo(currentIndex);
        }
      },
      getCurrentIndex: () => currentIndex,
      getTotalProjects: () => totalProjects,
      destroy,
    };
  })();
});

// ====================================================================
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

  /**
   * Public API
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
      videoIntro.style.width = "325px";
      videoIntro.style.height = "225px";
      videoIntro.style.transform = "translateY(50%)";
      videoIntro.style.opacity = "0.7";
    },
  };

  // Auto-initialize
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();

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
