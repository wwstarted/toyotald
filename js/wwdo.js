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

  function init() {
    if (!section || serviceSlides.length === 0) {
      console.warn("What We Do section not found");
      return;
    }

    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onScroll, { passive: true });

    updateOnScroll();

    if (patterns.length > 0) {
      patterns[0].classList.add("active");
    }

    initParallax();

    console.log("What We Do section initialized (Modern Version)");
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

(function () {
  "use strict";

  const CONFIG = {
    transitionDistance: 1000,
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

  function init() {
    if (!heroSection || !aboutSection || !videoIntro) {
      console.warn("Required sections not found");
      return;
    }

    checkVideoLoad();
    calculatePositions();

    if (globeCanvas) {
      init3DGlobe();
    }

    bindEvents();

    log("CDA transition initialized");
  }

  function checkVideoLoad() {
    const video = videoIntro.querySelector(".cda-video");
    const fallback = videoIntro.querySelector(".cda-video-fallback");

    if (!video) return;

    video.addEventListener("error", () => {
      log("Video failed to load");
      if (fallback) {
        video.style.display = "none";
        fallback.style.display = "flex";
      }
    });

    video.addEventListener("loadeddata", () => {
      log("Video loaded successfully");
    });
  }

  function calculatePositions() {
    heroHeight = heroSection.offsetHeight;
    aboutOffsetTop = aboutSection.offsetTop;
    log("Hero height:", heroHeight, "About offset:", aboutOffsetTop);
  }

  function bindEvents() {
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", debounce(onResize, 250));
  }

  function onScroll() {
    if (!ticking) {
      ticking = true;
      requestAnimationFrame(updateScrollProgress);
    }
  }

  function updateScrollProgress() {
    const scrollY = window.scrollY;

    if (scrollY < CONFIG.transitionDistance && !videoSettled) {
      const progress = scrollY / CONFIG.transitionDistance;
      const easedProgress = easeInOutCubic(progress);

      updateVideoTransition(easedProgress);
      updatePatternFade(easedProgress);
    } else if (scrollY >= CONFIG.transitionDistance && !videoSettled) {
      settleVideoInAbout();
      revealAboutContent();
      videoSettled = true;
      log(" Video settled in About section");
    }

    ticking = false;
  }

  function updateVideoTransition(progress) {
    if (!videoIntro) return;

    const width = lerp(325, 650, progress);
    const height = lerp(225, 450, progress);

    const translateY = lerp(50, -20, progress);
    const translateX = lerp(0, 0, progress);
    const opacity = lerp(0.7, 1, progress);

    videoIntro.style.position = "fixed";
    videoIntro.style.width = width + "px";
    videoIntro.style.height = height + "px";
    videoIntro.style.transform = `translateY(${translateY}%) translateX(${translateX}%)`;
    videoIntro.style.opacity = opacity;
  }

  function settleVideoInAbout() {
    if (!videoIntro || !videoSettledArea) return;
    videoIntro.style.position = "absolute";
    videoIntro.style.top = "0";
    videoIntro.style.left = "0";
    videoIntro.style.right = "auto";
    videoIntro.style.bottom = "auto";
    videoIntro.style.width = "100%";
    videoIntro.style.height = "100%";
    videoIntro.style.transform = "none";
    videoIntro.style.opacity = "1";

    videoSettledArea.appendChild(videoIntro);

    if (videoSettledArea) {
      videoSettledArea.classList.add("has-video");
    }

    log("Video settled in area - proper alignment");
  }

  function updatePatternFade(progress) {
    if (patternGreen && progress > 0.3) {
      patternGreen.style.opacity = 1 - (progress - 0.3) / 0.7;
    }
  }

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

  function onResize() {
    calculatePositions();

    if (videoSettled) {
      videoSettled = false;
      videoIntro.style.position = "fixed";
      videoIntro.style.bottom = "0";
      videoIntro.style.right = "5%";
      videoIntro.style.top = "auto";

      if (!ticking) {
        ticking = true;
        requestAnimationFrame(updateScrollProgress);
      }
    }
  }

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

  function log(...args) {
    if (CONFIG.enableLogging) {
      console.log("[CDA]", ...args);
    }
  }

  let globe3D = null;

  function init3DGlobe() {
    if (!globeCanvas) return;

    const canvas = globeCanvas;
    const ctx = canvas.getContext("2d");

    const size = 400;
    canvas.width = size;
    canvas.height = size;

    const centerX = size / 2;
    const centerY = size / 2;
    const radius = 180;

    const dots = [];
    const numDots = 200;

    for (let i = 0; i < numDots; i++) {
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

    function animate() {
      ctx.clearRect(0, 0, size, size);

      rotation += 0.003;

      dots.forEach((dot) => {
        const x = radius * Math.sin(dot.phi) * Math.cos(dot.theta + rotation);
        const y = radius * Math.cos(dot.phi);
        const z = radius * Math.sin(dot.phi) * Math.sin(dot.theta + rotation);

        dot.x = x;
        dot.y = y;
        dot.z = z;

        dot.alpha = ((z + radius) / (2 * radius)) * 0.7 + 0.3;
      });

      dots.sort((a, b) => a.z - b.z);

      dots.forEach((dot) => {
        const screenX = centerX + dot.x;
        const screenY = centerY + dot.y;

        const dotSize = 2 + ((dot.z + radius) / (2 * radius)) * 2;

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

      drawRings(ctx, centerX, centerY, radius, rotation);

      requestAnimationFrame(animate);
    }

    animate();

    globe3D = { canvas, ctx, animate };
    log("3D Globe initialized");
  }

  function drawRings(ctx, centerX, centerY, radius, rotation) {
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

    ctx.strokeStyle = "rgba(135, 206, 235, 0.15)";
    ctx.lineWidth = 1;
    ctx.beginPath();

    for (let angle = 0; angle < Math.PI * 2; angle += 0.1) {
      const tilt = Math.PI / 6;
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
