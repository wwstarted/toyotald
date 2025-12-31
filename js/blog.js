/**
 * Hero Section JavaScript
 * Handles animations, video, and interactions
 *
 * @package PixelPerfect
 * @version 1.0.0
 */

(function ($) {
  "use strict";

  // Wait for DOM ready
  $(document).ready(function () {
    initHeroSection();
  });

  /**
   * Initialize Hero Section
   */
  function initHeroSection() {
    handleVideoBackground();
    handleParallaxEffect();
    handleScrollAnimations();
    handleButtonHover();
    optimizePerformance();
  }

  /**
   * Video Background Handler
   */
  function handleVideoBackground() {
    const video = document.querySelector(".hero-video-bg");
    const isMobile = window.innerWidth < 768;

    if (video) {
      // On mobile, pause video to save bandwidth
      if (isMobile) {
        video.pause();
        video.style.display = "none";
      } else {
        // Ensure video plays on desktop
        video.play().catch(function (error) {
          console.log("Video autoplay failed:", error);
        });

        // Restart video when ended (backup for loop)
        video.addEventListener("ended", function () {
          video.currentTime = 0;
          video.play();
        });
      }

      // Handle visibility change
      document.addEventListener("visibilitychange", function () {
        if (document.hidden) {
          video.pause();
        } else if (!isMobile) {
          video.play();
        }
      });
    }
  }

  /**
   * Parallax Scroll Effect (Desktop only)
   */
  function handleParallaxEffect() {
    if (window.innerWidth > 1024) {
      const heroSection = document.querySelector(".hero-section");
      const videoWrapper = document.querySelector(".hero-video-wrapper");
      const mockupImage = document.querySelector(".hero-mockup");

      window.addEventListener("scroll", function () {
        const scrolled = window.pageYOffset;
        const heroBottom = heroSection.offsetHeight;

        if (scrolled < heroBottom) {
          // Parallax video background (slower)
          if (videoWrapper) {
            videoWrapper.style.transform = `translateY(${scrolled * 0.5}px)`;
          }

          // Parallax mockup image (slightly faster)
          if (mockupImage) {
            mockupImage.style.transform = `translateY(${scrolled * 0.3}px)`;
          }
        }
      });
    }
  }

  /**
   * Scroll Reveal Animations (Using AOS library)
   */
  function handleScrollAnimations() {
    // Check if AOS library is loaded
    if (typeof AOS !== "undefined") {
      AOS.init({
        duration: 800,
        easing: "ease-out-cubic",
        once: true,
        offset: 50,
        delay: 0,
      });
    } else {
      // Fallback: Simple fade-in on scroll
      const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -100px 0px",
      };

      const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
          }
        });
      }, observerOptions);

      // Observe all animated elements
      document.querySelectorAll("[data-aos]").forEach(function (el) {
        observer.observe(el);
      });
    }
  }

  /**
   * Button Hover Effects
   */
  function handleButtonHover() {
    const heroBtn = document.querySelector(".hero-btn");

    if (heroBtn) {
      // Add ripple effect on click
      heroBtn.addEventListener("click", function (e) {
        const ripple = document.createElement("span");
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;

        ripple.style.width = ripple.style.height = size + "px";
        ripple.style.left = x + "px";
        ripple.style.top = y + "px";
        ripple.classList.add("ripple");

        this.appendChild(ripple);

        setTimeout(function () {
          ripple.remove();
        }, 600);
      });

      // Magnetic effect on desktop
      if (window.innerWidth > 1024) {
        heroBtn.addEventListener("mousemove", function (e) {
          const rect = this.getBoundingClientRect();
          const x = e.clientX - rect.left - rect.width / 2;
          const y = e.clientY - rect.top - rect.height / 2;

          this.style.transform = `translate(${x * 0.2}px, ${y * 0.2}px)`;
        });

        heroBtn.addEventListener("mouseleave", function () {
          this.style.transform = "translate(0, 0)";
        });
      }
    }
  }

  /**
   * Performance Optimization
   */
  function optimizePerformance() {
    // Throttle scroll events
    let ticking = false;
    window.addEventListener("scroll", function () {
      if (!ticking) {
        window.requestAnimationFrame(function () {
          ticking = false;
        });
        ticking = true;
      }
    });

    // Lazy load mockup image if not in viewport
    if ("IntersectionObserver" in window) {
      const mockupImage = document.querySelector(".mockup-image");
      if (mockupImage && mockupImage.dataset.src) {
        const imageObserver = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              const img = entry.target;
              img.src = img.dataset.src;
              imageObserver.unobserve(img);
            }
          });
        });
        imageObserver.observe(mockupImage);
      }
    }

    // Reduce motion for users who prefer it
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
      document.querySelectorAll("[data-aos]").forEach(function (el) {
        el.removeAttribute("data-aos");
      });
    }
  }

  /**
   * Smooth Scroll to Contact Section
   */
  $('.hero-btn[href^="#"]').on("click", function (e) {
    const target = $(this.getAttribute("href"));
    if (target.length) {
      e.preventDefault();
      $("html, body")
        .stop()
        .animate(
          {
            scrollTop: target.offset().top - 80,
          },
          1000,
          "easeInOutCubic"
        );
    }
  });
})(jQuery);
