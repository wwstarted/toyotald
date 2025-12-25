/**
 * What We Do Section - Modern Controller
 * Features: Smooth crossfade, parallax, hover effects
 */

(function () {
  "use strict";

  // Configuration
  const CONFIG = {
    serviceCount: 3,
    patternMapping: {
      1: [1, 2], // Service 1 → Pattern 1 or 2
      2: [3, 4], // Service 2 → Pattern 3 or 4
      3: [5, 6], // Service 3 → Pattern 5 or 6
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
      visibleCards: 5, // Total visible cards (-2, -1, 0, 1, 2)
      transitionDuration: 700, // ms
      autoplayDelay: 5000, // ms (set to 0 to disable)
      wheelThrottle: 800, // ms between wheel events
      touchThreshold: 50, // px minimum swipe distance
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

      // Extract project data
      extractProjectData();

      // Set initial positions
      updateCardPositions();

      // Bind events
      bindEvents();

      // Start autoplay if enabled
      if (CONFIG.autoplayDelay > 0) {
        startAutoplay();
      }

      // Intersection Observer for entrance animation
      setupIntersectionObserver();

      console.log("✅ Select Projects carousel initialized");
    }

    /**
     * Extract project data from DOM cards
     */
    function extractProjectData() {
      cards.forEach((card, index) => {
        const link = card;
        const img = card.querySelector(".sp-card-image");

        projects.push({
          index: index,
          title: img ? img.alt : `Project ${index + 1}`,
          category: "Project Category", // Add data attribute if needed
          url: link.href,
          element: card,
        });
      });

      totalProjects = projects.length;
      currentIndex = 0;
    }

    /**
     * Bind all event listeners
     */
    function bindEvents() {
      // Navigation buttons
      if (prevBtn) prevBtn.addEventListener("click", () => navigate("prev"));
      if (nextBtn) nextBtn.addEventListener("click", () => navigate("next"));

      // Mouse wheel
      section.addEventListener("wheel", handleWheel, { passive: false });

      // Touch events for swipe
      track.addEventListener("touchstart", handleTouchStart, { passive: true });
      track.addEventListener("touchend", handleTouchEnd, { passive: true });

      // Keyboard navigation
      document.addEventListener("keydown", handleKeyboard);

      // Hover pause autoplay
      section.addEventListener("mouseenter", pauseAutoplay);
      section.addEventListener("mouseleave", resumeAutoplay);

      // Card clicks update info immediately
      cards.forEach((card, index) => {
        card.addEventListener("mouseenter", () => {
          if (Math.abs(index - currentIndex) <= 1) {
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

      const oldIndex = currentIndex;

      if (direction === "next") {
        currentIndex = (currentIndex + 1) % totalProjects;
      } else {
        currentIndex = (currentIndex - 1 + totalProjects) % totalProjects;
      }

      // Update positions with transition
      updateCardPositions();
      updateProjectInfo(currentIndex);

      // Reset autoplay
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

        // Remove all position attributes
        card.removeAttribute("data-position");

        // Set position if within visible range (-2 to +2)
        if (Math.abs(relativePosition) <= 2) {
          card.setAttribute("data-position", relativePosition);
        }
      });

      // Update track data attribute
      if (track) {
        track.setAttribute("data-active-index", currentIndex);
      }

      // Transition finished after duration
      setTimeout(() => {
        isTransitioning = false;
      }, CONFIG.transitionDuration);
    }

    /**
     * Calculate relative position with wrap-around
     */
    function getRelativePosition(cardIndex, activeIndex, total) {
      let diff = cardIndex - activeIndex;

      // Wrap around for shortest path
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
     * Handle mouse wheel for navigation
     */
    function handleWheel(e) {
      const now = Date.now();

      // Throttle wheel events
      if (now - lastWheelTime < CONFIG.wheelThrottle) {
        e.preventDefault();
        return;
      }

      // Check if scrolling within section area
      const rect = section.getBoundingClientRect();
      const inView = rect.top < window.innerHeight && rect.bottom > 0;

      if (!inView) return;

      // Prevent default only if we're handling the scroll
      if (Math.abs(e.deltaX) > Math.abs(e.deltaY)) {
        // Horizontal scroll
        e.preventDefault();
        lastWheelTime = now;

        if (e.deltaX > 0) {
          navigate("next");
        } else {
          navigate("prev");
        }
      } else if (Math.abs(e.deltaY) > 50) {
        // Vertical scroll - check exit conditions
        e.preventDefault();
        lastWheelTime = now;

        if (e.deltaY > 0) {
          // Scroll down
          if (currentIndex === totalProjects - 1) {
            // Last project - allow exit
            section.style.pointerEvents = "none";
            setTimeout(() => {
              section.style.pointerEvents = "auto";
            }, 500);
          } else {
            navigate("next");
          }
        } else {
          // Scroll up
          if (currentIndex === 0) {
            // First project - allow exit
            section.style.pointerEvents = "none";
            setTimeout(() => {
              section.style.pointerEvents = "auto";
            }, 500);
          } else {
            navigate("prev");
          }
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

    // Initialize on DOM ready
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", init);
    } else {
      init();
    }

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
      destroy,
    };
  })();
});
