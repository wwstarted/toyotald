/**
 * Pixel Perfect - Hero & About Section
 * Interactive features and animations
 */

(function () {
  "use strict";

  // Wait for DOM ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  function init() {
    initScrollIndicator();
    initReadMoreToggle();
    initFloatingLogosParallax();
    initDevicesHoverEffect();
  }

  /**
   * 1. SCROLL INDICATOR - Smooth scroll to about section
   */
  function initScrollIndicator() {
    const scrollBtn = document.querySelector(".pp-scroll-indicator");
    const aboutSection = document.getElementById("ppAbout");

    if (!scrollBtn || !aboutSection) return;

    scrollBtn.addEventListener("click", () => {
      aboutSection.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    });
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
          const speed = 0.3 + index * 0.1; // Different speeds for each logo
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

      const rotateX = (y - centerY) / 30; // Reduced intensity
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

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          video.play();
        } else {
          video.pause();
        }
      });
    }, observerOptions);

    observer.observe(video);
  }

  // Initialize video optimization
  initVideoOptimization();

  /**
   * 6. CTA BUTTON - Smooth scroll to contact
   */
  const ctaButton = document.querySelector(".pp-cta-button");
  if (ctaButton && ctaButton.getAttribute("href").startsWith("#")) {
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

  initPartnerLogosAnimation();

  console.log("Pixel Perfect Hero & About sections initialized ✓");
})();
