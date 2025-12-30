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
    const viewportCenter = window.innerHeight / 2 + window.scrollY;
    let closestService = 0;
    let closestDistance = Infinity;

    serviceSlides.forEach((slide, index) => {
      const rect = slide.getBoundingClientRect();
      const slideCenter = rect.top + window.scrollY + rect.height / 2;
      const distance = Math.abs(viewportCenter - slideCenter);

      if (distance < closestDistance) {
        closestDistance = distance;
        closestService = index + 1;
      }
    });

    updateServiceStates(closestService);

    if (closestService !== currentService && closestService > 0) {
      if (currentService > 0) {
        transitionPattern(currentService, closestService);
      } else {
        // First time: Fade in pattern 1 when service 1 becomes active
        const toPatterns = CONFIG.patternMapping[closestService];
        if (toPatterns && patterns[toPatterns[0] - 1]) {
          patterns[toPatterns[0] - 1].classList.add("active");
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
