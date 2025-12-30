(function () {
  "use strict";

  // UPDATED: serviceCount 3 → 4, patternMapping thêm service 4
  const CONFIG = {
    serviceCount: 4,
    patternMapping: {
      1: [1, 2],
      2: [3, 4],
      3: [5, 6],
      4: [7, 8], // NEW: Service 4
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

  function init() {
    if (!section || serviceSlides.length === 0) {
      console.warn("What We Do section not found");
      return;
    }

    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onScroll, { passive: true });

    updateOnScroll();

    // REMOVED: patterns[0].classList.add("active");
    // Image đầu tiên sẽ chỉ xuất hiện khi service 1 active (vào center viewport)

    initParallax();

    console.log("What We Do section initialized (4 Services)");
  }

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

  function updateOnScroll() {
    const viewportHeight = window.innerHeight;
    const activeZoneTop = viewportHeight * 0.2; // 40% from top
    const activeZoneBottom = viewportHeight * 0.9; // 60% from top

    let closestService = 0;
    let closestDistance = Infinity;

    serviceSlides.forEach((slide, index) => {
      const rect = slide.getBoundingClientRect();
      const slideCenter = rect.top + rect.height / 2;

      // Check if slide center is within active zone (40-60% of viewport)
      const inActiveZone =
        slideCenter >= activeZoneTop && slideCenter <= activeZoneBottom;

      if (inActiveZone) {
        // Calculate distance from viewport center
        const viewportCenter = viewportHeight / 2;
        const distance = Math.abs(slideCenter - viewportCenter);

        if (distance < closestDistance) {
          closestDistance = distance;
          closestService = index + 1;
        }
      }
    });

    // closestService will be 0 if no service is in active zone
    updateServiceStates(closestService);

    if (closestService !== currentService) {
      if (closestService > 0) {
        if (currentService > 0) {
          // Transition from one service to another
          transitionPattern(currentService, closestService);
        } else {
          // First time: Fade in pattern when service enters active zone
          const toPatterns = CONFIG.patternMapping[closestService];
          if (toPatterns && patterns[toPatterns[0] - 1]) {
            patterns[toPatterns[0] - 1].classList.add("active");
          }
        }
      } else if (currentService > 0) {
        // Service left active zone - fade out current pattern
        const currentPatterns = CONFIG.patternMapping[currentService];
        if (currentPatterns && patterns[currentPatterns[0] - 1]) {
          patterns[currentPatterns[0] - 1].classList.remove("active");
        }
      }
      currentService = closestService;
    }
  }

  function updateServiceStates(activeIndex) {
    serviceSlides.forEach((slide, index) => {
      const slideNumber = index + 1;

      slide.classList.remove("active", "before", "after");

      if (slideNumber === activeIndex) {
        slide.classList.add("active");
      } else if (slideNumber < activeIndex) {
        slide.classList.add("before");
      } else {
        slide.classList.add("after");
      }
    });
  }

  function transitionPattern(fromService, toService) {
    if (isTransitioning) return;
    isTransitioning = true;

    const fromPatterns = CONFIG.patternMapping[fromService];
    const toPatterns = CONFIG.patternMapping[toService];

    if (!fromPatterns || !toPatterns) {
      isTransitioning = false;
      return;
    }

    const fromPattern = patterns[fromPatterns[0] - 1];
    const toPattern = patterns[toPatterns[0] - 1];

    if (!fromPattern || !toPattern) {
      isTransitioning = false;
      return;
    }

    fromPattern.classList.add("fading-out");

    setTimeout(() => {
      fromPattern.classList.remove("active", "fading-out");

      toPattern.classList.add("active");

      isTransitioning = false;
    }, CONFIG.transitionDuration * 0.6);
  }

  function initParallax() {
    serviceSlides.forEach((slide) => {
      const card = slide.querySelector(".wwd-card");
      if (card) {
        card.setAttribute("data-parallax", "true");
      }
    });
  }

  function updateParallax() {
    const bgWrapper = document.querySelector(".wwd-bg-wrapper");
    if (!bgWrapper) return;

    const rect = bgWrapper.getBoundingClientRect();
    const scrollProgress = Math.max(0, Math.min(1, -rect.top / rect.height));

    const activePattern = document.querySelector(".wwd-pattern.active");
    if (activePattern) {
      const img = activePattern.querySelector(".wwd-pattern-image");
      if (img) {
        const offset = scrollProgress * 30 * CONFIG.parallaxIntensity;
        img.style.transform = `translateY(${offset}px)`;
      }
    }

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

  function updateTitleOpacity() {
    if (!sectionTitle || !contentWrapper) return;

    const rect = contentWrapper.getBoundingClientRect();
    const scrollThreshold = window.innerHeight * 0.3;

    if (rect.top < scrollThreshold && rect.bottom > 0) {
      sectionTitle.style.opacity = "1";
    } else if (rect.top < 0) {
      const fadeProgress = Math.max(0, 1 + rect.top / 200);
      sectionTitle.style.opacity = fadeProgress.toString();
    }
  }

  function getCurrentService() {
    return currentService;
  }

  function destroy() {
    window.removeEventListener("scroll", onScroll);
    window.removeEventListener("resize", onScroll);
    console.log("What We Do section destroyed");
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  window.WWDSection = {
    getCurrentService,
    destroy,
  };
})();

document.addEventListener("DOMContentLoaded", function () {
  (function () {
    "use strict";

    const CONFIG = {
      visibleCards: 5,
      transitionDuration: 700,
      autoplayDelay: 5000,
      wheelThrottle: 800,
      touchThreshold: 50,
    };

    let currentIndex = 0;
    let totalProjects = 0;
    let isTransitioning = false;
    let autoplayTimer = null;
    let lastWheelTime = 0;

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

    const projects = [];

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

      console.log("Select Projects carousel initialized");
      console.log(`Total projects: ${totalProjects}`);
    }

    function extractProjectData() {
      cards.forEach((card, index) => {
        const link = card;
        const img = card.querySelector(".sp-card-image");

        let category = card.getAttribute("data-category");
        if (!category) {
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

      updateProjectInfo(currentIndex);
    }

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

    function getRelativePosition(cardIndex, activeIndex, total) {
      let diff = cardIndex - activeIndex;

      if (diff > total / 2) {
        diff -= total;
      } else if (diff < -total / 2) {
        diff += total;
      }

      return diff;
    }

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
    function handleWheel(e) {
      const now = Date.now();

      if (now - lastWheelTime < CONFIG.wheelThrottle) {
        e.preventDefault();
        return;
      }

      const rect = section.getBoundingClientRect();
      const inView = rect.top < window.innerHeight && rect.bottom > 0;

      if (!inView) return;

      const isScrollingDown = e.deltaY > 0;
      const isScrollingUp = e.deltaY < 0;
      const isFirstProject = currentIndex === 0;
      const isLastProject = currentIndex === totalProjects - 1;

      if (Math.abs(e.deltaY) < 30) return;

      if (isScrollingDown) {
        if (isLastProject) {
          console.log("Last project - allowing exit down");
          lastWheelTime = now;
          return;
        } else {
          e.preventDefault();
          lastWheelTime = now;
          navigate("next");
          console.log(`Navigating to next project: ${currentIndex + 1}`);
        }
      } else if (isScrollingUp) {
        if (isFirstProject) {
          console.log("First project - allowing exit up");
          lastWheelTime = now;
          return;
        } else {
          e.preventDefault();
          lastWheelTime = now;
          navigate("prev");
          console.log(`Navigating to prev project: ${currentIndex - 1}`);
        }
      }
    }

    function handleTouchStart(e) {
      touchStartX = e.touches[0].clientX;
    }

    function handleTouchEnd(e) {
      touchEndX = e.changedTouches[0].clientX;
      handleSwipe();
    }

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

    function isElementInViewport(el) {
      const rect = el.getBoundingClientRect();
      return rect.top < window.innerHeight && rect.bottom > 0;
    }

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

    function destroy() {
      pauseAutoplay();
      section.removeEventListener("wheel", handleWheel);
      document.removeEventListener("keydown", handleKeyboard);
      console.log("Select Projects carousel destroyed");
    }

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

// ======================================= ad js for hero + about us =======================================

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

// ======================================= Section Blog =======================================

(function () {
  "use strict";

  // Wait for DOM ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  function init() {
    initDarkModeToggle();
    initSpotlightEffect();
  }

  /**
   * 1. DARK MODE TOGGLE - Intersection Observer
   * Logic: Khi scroll XUỐNG vào blog section → Đen (và giữ đen cho tất cả section bên dưới)
   *        Khi scroll LÊN ra khỏi blog section → Trắng (trở lại sections bên trên)
   */
  function initDarkModeToggle() {
    const blogSection = document.getElementById("blogSection");
    const body = document.body;

    if (!blogSection) {
      console.warn("Blog section not found");
      return;
    }

    // Track scroll position to determine direction
    let lastScrollY = window.scrollY;
    let isScrollingDown = true;

    // Update scroll direction
    const updateScrollDirection = () => {
      const currentScrollY = window.scrollY;
      isScrollingDown = currentScrollY > lastScrollY;
      lastScrollY = currentScrollY;
    };

    // Listen to scroll events
    window.addEventListener("scroll", updateScrollDirection, { passive: true });

    // Intersection Observer options
    const observerOptions = {
      root: null,
      threshold: 0.1, // Trigger sớm khi 10% section vào viewport
      rootMargin: "0px",
    };

    // Observer callback
    const observerCallback = (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Section blog đang vào view
          if (isScrollingDown) {
            // Scroll XUỐNG → BẬT dark mode (và giữ mãi)
            body.classList.add("blog-dark-mode");
          }
        } else {
          // Section blog ra khỏi view
          if (!isScrollingDown) {
            // Scroll LÊN (về phía trên) → TẮT dark mode
            body.classList.remove("blog-dark-mode");
          }
          // Nếu scroll XUỐNG (đi xuống dưới) → GIỮ NGUYÊN dark mode (không làm gì)
        }
      });
    };

    // Create observer
    const sectionObserver = new IntersectionObserver(
      observerCallback,
      observerOptions
    );

    // Start observing
    sectionObserver.observe(blogSection);
  }

  /**
   * 2. SPOTLIGHT EFFECT - Mouse Tracking
   */
  function initSpotlightEffect() {
    const blogCards = document.querySelectorAll(".blog-card");

    if (!blogCards.length) {
      console.warn("No blog cards found");
      return;
    }

    blogCards.forEach((card) => {
      const cardLink = card.querySelector(".blog-card-link");

      if (!cardLink) return;

      // Track mouse movement
      card.addEventListener("mousemove", (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        // Update CSS variables for spotlight position
        cardLink.style.setProperty("--mouse-x", `${x}px`);
        cardLink.style.setProperty("--mouse-y", `${y}px`);
      });

      // Reset position on mouse leave
      card.addEventListener("mouseleave", () => {
        cardLink.style.setProperty("--mouse-x", "50%");
        cardLink.style.setProperty("--mouse-y", "50%");
      });
    });
  }

  /**
   * 3. OPTIONAL - Smooth Scroll for View More Link
   */
  const viewMoreLink = document.querySelector(".view-more");
  if (viewMoreLink && viewMoreLink.getAttribute("href").startsWith("#")) {
    viewMoreLink.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href").substring(1);
      const targetSection = document.getElementById(targetId);

      if (targetSection) {
        targetSection.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  }
})();

// ============================================= contact ======================================

(function () {
  "use strict";

  // Wait for DOM ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  function init() {
    initFormHandling();
    initInputAnimations();
    initScrollAnimations();
  }

  /**
   * 1. FORM HANDLING - Validation & Submission
   */
  function initFormHandling() {
    const form = document.getElementById("contactForm");
    const statusDiv = document.getElementById("contactFormStatus");

    if (!form) {
      console.warn("Contact form not found");
      return;
    }

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      // Get form data
      const formData = new FormData(form);
      const data = {
        name: formData.get("name"),
        email: formData.get("email"),
        message: formData.get("message"),
      };

      // Basic validation
      if (!validateForm(data)) {
        showStatus("Please fill in all fields correctly.", "error");
        return;
      }

      // Disable submit button
      const submitBtn = form.querySelector(".contact-form-submit");
      const originalText = submitBtn.querySelector(
        ".contact-submit-text"
      ).textContent;
      submitBtn.disabled = true;
      submitBtn.querySelector(".contact-submit-text").textContent =
        "Sending...";

      try {
        // AJAX submission (replace with your endpoint)
        const response = await fetch(form.action, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(data),
        });

        if (response.ok) {
          showStatus(
            "Thank you! Your message has been sent successfully.",
            "success"
          );
          form.reset();
        } else {
          throw new Error("Submission failed");
        }
      } catch (error) {
        console.error("Form submission error:", error);
        showStatus("Oops! Something went wrong. Please try again.", "error");
      } finally {
        // Re-enable submit button
        submitBtn.disabled = false;
        submitBtn.querySelector(".contact-submit-text").textContent =
          originalText;
      }
    });

    /**
     * Form validation
     */
    function validateForm(data) {
      // Check if all fields are filled
      if (!data.name || !data.email || !data.message) {
        return false;
      }

      // Email validation regex
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(data.email)) {
        return false;
      }

      // Name length
      if (data.name.length < 2) {
        return false;
      }

      // Message length
      if (data.message.length < 10) {
        return false;
      }

      return true;
    }

    /**
     * Show status message
     */
    function showStatus(message, type) {
      if (!statusDiv) return;

      statusDiv.textContent = message;
      statusDiv.className = `contact-form-status ${type}`;

      // Auto hide after 5 seconds
      setTimeout(() => {
        statusDiv.className = "contact-form-status";
      }, 5000);
    }
  }

  /**
   * 2. INPUT ANIMATIONS - Enhanced Focus Effects
   */
  function initInputAnimations() {
    const inputs = document.querySelectorAll(
      ".contact-form-input, .contact-form-textarea"
    );

    inputs.forEach((input) => {
      // Add focus class for additional animations
      input.addEventListener("focus", () => {
        input.parentElement.classList.add("focused");
      });

      input.addEventListener("blur", () => {
        input.parentElement.classList.remove("focused");

        // Add filled class if input has value
        if (input.value.trim() !== "") {
          input.parentElement.classList.add("filled");
        } else {
          input.parentElement.classList.remove("filled");
        }
      });

      // Real-time validation feedback
      input.addEventListener("input", () => {
        if (input.validity.valid) {
          input.parentElement.classList.remove("invalid");
          input.parentElement.classList.add("valid");
        } else {
          input.parentElement.classList.remove("valid");
        }
      });
    });
  }

  /**
   * 3. SCROLL ANIMATIONS - Fade in elements
   */
  function initScrollAnimations() {
    const contactSection = document.getElementById("contactSection");

    if (!contactSection) return;

    // Intersection Observer for fade-in animation
    const observerOptions = {
      root: null,
      threshold: 0.1,
      rootMargin: "0px",
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animated");
        }
      });
    }, observerOptions);

    // Observe contact elements
    const animatedElements = contactSection.querySelectorAll(
      ".contact-left, .contact-right, .contact-info-item, .contact-social"
    );

    animatedElements.forEach((el, index) => {
      el.style.opacity = "0";
      el.style.transform = "translateY(30px)";
      el.style.transition = `opacity 0.6s ease ${
        index * 0.1
      }s, transform 0.6s ease ${index * 0.1}s`;
      observer.observe(el);
    });

    // Add animated class styles via JS
    const style = document.createElement("style");
    style.textContent = `
      .animated {
        opacity: 1 !important;
        transform: translateY(0) !important;
      }
    `;
    document.head.appendChild(style);
  }

  const contactLinks = document.querySelectorAll('a[href^="#contact"]');
  contactLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href").substring(1);
      const targetSection = document.getElementById(targetId);

      if (targetSection) {
        targetSection.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });
})();
