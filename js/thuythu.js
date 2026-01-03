(function () {
  "use strict";

  // Wait for DOM ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  /**
   * MAIN INITIALIZATION
   */
  function init() {
    // Hero & About Section
    initScrollIndicator();
    initReadMoreToggle();
    initFloatingLogosParallax();
    initDevicesHoverEffect();
    initVideoOptimization();
    initCTAButton();
    initPartnerLogosAnimation();

    // Services Section
    initServicesSection();

    // Why Choose Us Section
    initWhyChooseUsSection();

    // Smooth Scroll for all anchor links
    initSmoothScroll();

    console.log("✓ Pixel Perfect - All sections initialized successfully");
  }

  // ===================================
  // HERO & ABOUT SECTION
  // ===================================

  /**
   * 1. SCROLL INDICATOR - Smooth scroll to about section
   */
  function initScrollIndicator() {
    const scrollBtn = document.querySelector(".pp-scroll-indicator");
    const aboutSection = document.getElementById("ppAbout");

    // FIX: Sửa logic đúng
    if (scrollBtn && aboutSection) {
      scrollBtn.addEventListener("click", () => {
        aboutSection.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      });
    }
  }

  /**
   * 2. READ MORE TOGGLE - Expand/Collapse content
   */
  function initReadMoreToggle() {
    const readMoreBtn = document.getElementById("ppReadMoreBtn");
    const description = document.querySelector(".pp-about-description");

    if (!readMoreBtn || !description) return;

    readMoreBtn.addEventListener("click", () => {
      const isExpanded = description.classList.contains("expanded");

      if (isExpanded) {
        description.classList.remove("expanded");
        readMoreBtn.textContent = "Khám phá thêm";
        readMoreBtn.classList.remove("active");
      } else {
        description.classList.add("expanded");
        readMoreBtn.innerHTML =
          'Thu gọn <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
        readMoreBtn.classList.add("active");
      }
    });
  }

  /**
   * 3. FLOATING LOGOS PARALLAX - Subtle movement on scroll
   */
  function initFloatingLogosParallax() {
    const logos = document.querySelectorAll(".pp-logo-item");

    if (!logos.length) return;

    let ticking = false;

    window.addEventListener(
      "scroll",
      () => {
        if (!ticking) {
          window.requestAnimationFrame(() => {
            updateLogosPosition();
            ticking = false;
          });
          ticking = true;
        }
      },
      { passive: true }
    );

    function updateLogosPosition() {
      const scrollY = window.scrollY;
      const heroSection = document.querySelector(".pp-hero-section");

      if (!heroSection) return;

      const heroRect = heroSection.getBoundingClientRect();

      // Only apply parallax when hero is visible
      if (heroRect.bottom > 0 && heroRect.top < window.innerHeight) {
        logos.forEach((logo, index) => {
          const speed = 0.3 + index * 0.1;
          const yPos = scrollY * speed;
          logo.style.transform = `translateY(${yPos}px)`;
        });
      }
    }
  }

  /**
   * 4. DEVICES HOVER EFFECT - Enhanced 3D interaction
   */
  function initDevicesHoverEffect() {
    const devicesImage = document.querySelector(".pp-devices-image");
    const devicesWrapper = document.querySelector(".pp-devices-wrapper");

    if (!devicesImage || !devicesWrapper) return;

    devicesWrapper.addEventListener("mousemove", (e) => {
      const rect = devicesWrapper.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      const rotateX = (y - centerY) / 30;
      const rotateY = (centerX - x) / 30;

      devicesImage.style.transform = `
        rotateX(${rotateX}deg) 
        rotateY(${rotateY}deg) 
        translateY(-10px) 
        scale(1.02)
      `;
    });

    devicesWrapper.addEventListener("mouseleave", () => {
      devicesImage.style.transform =
        "rotateX(0) rotateY(0) translateY(0) scale(1)";
    });
  }

  /**
   * 5. VIDEO PERFORMANCE - Pause when out of viewport
   */
  function initVideoOptimization() {
    const video = document.querySelector(".pp-hero-video");

    if (!video) return;

    const observerOptions = {
      root: null,
      threshold: 0.1,
    };

    const videoObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          video.play().catch(() => {
            // Auto-play might be blocked by browser
          });
        } else {
          video.pause();
        }
      });
    }, observerOptions);

    videoObserver.observe(video);
  }

  /**
   * 6. CTA BUTTON - Smooth scroll to contact
   */
  function initCTAButton() {
    const ctaButton = document.querySelector(".pp-cta-button");
    if (ctaButton && ctaButton.getAttribute("href")?.startsWith("#")) {
      ctaButton.addEventListener("click", (e) => {
        e.preventDefault();
        const targetId = ctaButton.getAttribute("href").substring(1);
        const targetSection = document.getElementById(targetId);

        if (targetSection) {
          targetSection.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        }
      });
    }
  }

  /**
   * 7. PARTNER LOGOS - Hover animation enhancement
   */
  function initPartnerLogosAnimation() {
    const partnerLogos = document.querySelectorAll(".pp-about-logo-item");

    partnerLogos.forEach((logo) => {
      logo.addEventListener("mouseenter", function () {
        this.style.transform = "scale(1.1) translateY(-5px)";
      });

      logo.addEventListener("mouseleave", function () {
        this.style.transform = "scale(1) translateY(0)";
      });
    });
  }

  // ===================================
  // SERVICES SECTION
  // ===================================

  /**
   * Initialize Services Section
   */
  function initServicesSection() {
    const serviceItems = document.querySelectorAll(".pp-service-item");
    const serviceImages = document.querySelectorAll(".pp-service-image");

    if (!serviceItems.length || !serviceImages.length) {
      return;
    }

    // Add click event to each service item
    serviceItems.forEach(function (item) {
      item.addEventListener("click", function () {
        handleServiceClick(this, serviceItems, serviceImages);
      });
    });

    console.log("✓ Services section initialized");
  }

  /**
   * Handle Service Item Click
   */
  function handleServiceClick(clickedItem, allItems, allImages) {
    if (clickedItem.classList.contains("active")) {
      return;
    }

    const serviceType = clickedItem.getAttribute("data-service");

    // Deactivate all
    allItems.forEach((item) => item.classList.remove("active"));
    allImages.forEach((img) => img.classList.remove("active"));

    // Activate clicked service
    clickedItem.classList.add("active");

    // Activate corresponding image
    const targetImage = document.querySelector(
      `.pp-service-image[data-service="${serviceType}"]`
    );
    if (targetImage) {
      setTimeout(() => targetImage.classList.add("active"), 100);
    }

    // Smooth scroll on mobile
    if (window.innerWidth <= 968) {
      clickedItem.scrollIntoView({
        behavior: "smooth",
        block: "nearest",
      });
    }
  }

  // ===================================
  // WHY CHOOSE US SECTION
  // ===================================

  /**
   * Initialize Why Choose Us Section
   */
  function initWhyChooseUsSection() {
    // Intersection Observer Options
    const observerOptions = {
      root: null,
      rootMargin: "0px",
      threshold: 0.1,
    };

    // Scroll Animation Observer
    const scrollObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("pp-why-visible");
          scrollObserver.unobserve(entry.target);
        }
      });
    }, observerOptions);

    // Target elements
    const elementsToObserve = document.querySelectorAll(`
      .pp-why-header,
      .pp-stat-card,
      .pp-why-image-wrapper,
      .pp-feature-item
    `);

    elementsToObserve.forEach((el) => scrollObserver.observe(el));

    // Stats Cards Parallax Effect
    initStatsParallax();

    // Stat Numbers Hover Effect
    initStatNumbersHover();

    // Counter Animation
    initCounterAnimation();

    console.log("✓ Why Choose Us section initialized");
  }

  /**
   * Stats Cards Parallax
   */
  function initStatsParallax() {
    const statsSection = document.querySelector(".pp-why-stats-grid");
    if (!statsSection) return;

    let ticking = false;

    window.addEventListener("scroll", function () {
      if (!ticking) {
        window.requestAnimationFrame(function () {
          const scrolled = window.pageYOffset;
          const statCards = document.querySelectorAll(".pp-stat-card");

          statCards.forEach((card, index) => {
            const speed = 0.5 + index * 0.1;
            const yPos = -(scrolled * speed * 0.15);
            // Check if card already has transform from other animations
            const currentTransform = card.style.transform;
            if (!currentTransform.includes("translateY")) {
              card.style.transform = `translateY(${yPos}px)`;
            }
          });

          ticking = false;
        });

        ticking = true;
      }
    });
  }

  /**
   * Stat Numbers Hover Effect
   */
  function initStatNumbersHover() {
    const statNumbers = document.querySelectorAll(".pp-stat-number");
    statNumbers.forEach((num) => {
      num.addEventListener("mouseenter", function () {
        this.style.transform = "scale(1.05)";
      });

      num.addEventListener("mouseleave", function () {
        this.style.transform = "scale(1)";
      });
    });
  }

  /**
   * Counter Animation
   */
  function initCounterAnimation() {
    const animateCounter = (element, target, duration = 1500) => {
      const isNumber = /^\d+$/.test(target);
      if (!isNumber) {
        element.textContent = target;
        return;
      }

      const targetNum = parseInt(target);
      const increment = targetNum / (duration / 16);
      let current = 0;

      const updateCounter = () => {
        current += increment;
        if (current < targetNum) {
          element.textContent = Math.floor(current) + "+";
          requestAnimationFrame(updateCounter);
        } else {
          element.textContent = target + "+";
        }
      };

      updateCounter();
    };

    // Counter Observer
    const counterObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (
            entry.isIntersecting &&
            !entry.target.classList.contains("counted")
          ) {
            const target = entry.target.textContent.trim();
            entry.target.classList.add("counted");
            animateCounter(entry.target, target.replace("+", ""), 1200);
          }
        });
      },
      { threshold: 0.5 }
    );

    // Observe stat numbers
    document.querySelectorAll(".pp-stat-number").forEach((num) => {
      counterObserver.observe(num);
    });
  }

  // ===================================
  // GLOBAL UTILITIES
  // ===================================

  /**
   * Smooth Scroll for All Anchor Links
   */
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        const href = this.getAttribute("href");
        if (href !== "#" && document.querySelector(href)) {
          e.preventDefault();
          document.querySelector(href).scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        }
      });
    });
  }
})();

//====================================== section user reviews =========================================

document.addEventListener("DOMContentLoaded", function () {
  const columns = document.querySelectorAll(".pp-reviews-column-content");

  // Tùy chọn: Nếu bạn muốn clone bằng JS thay vì PHP
  // Logic: Đảm bảo nội dung đủ dài để cuộn mượt
  columns.forEach((column) => {
    // Kiểm tra xem nội dung đã được nhân đôi chưa (dựa trên class hoặc attribute)
    // Nếu dùng PHP nhân đôi rồi thì đoạn này chỉ để đảm bảo an toàn

    const contentHeight = column.offsetHeight;
    const containerHeight = column.parentElement.offsetHeight;

    // Nếu nội dung ngắn hơn khung nhìn, nhân bản thêm lần nữa
    if (contentHeight < containerHeight * 2) {
      const items = column.innerHTML;
      column.insertAdjacentHTML("beforeend", items);
    }
  });

  // Tùy chọn: Thêm hiệu ứng kéo thả (Drag to scroll) nếu cần (Advance)
  // Hiện tại CSS animation hover:pause là đủ tốt cho UX.
});
