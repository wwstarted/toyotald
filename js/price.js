(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    // ... (Các phần Hero Slider, Stats Counter, FAQ, Reviews Slider, Gallery Lightbox, Contact Form, Smooth Scroll, Scroll Animations từ file cũ) ...

    // ==========================================
    // HERO SLIDER (Giữ nguyên)
    // ==========================================
    const slider = {
      currentSlide: 0,
      slides: document.querySelectorAll(".slide"),
      dots: document.querySelectorAll(".dot"),
      prevBtn: document.getElementById("prevSlide"),
      nextBtn: document.getElementById("nextSlide"),
      autoplayInterval: null,
      autoplayDelay: 5000,

      init() {
        if (this.slides.length === 0) return;

        this.prevBtn.addEventListener("click", () => this.prev());
        this.nextBtn.addEventListener("click", () => this.next());

        this.dots.forEach((dot, index) => {
          dot.addEventListener("click", () => this.goToSlide(index));
        });

        this.startAutoplay();

        // Pause on hover
        const sliderContainer = document.querySelector(".slider-container");
        if (sliderContainer) {
          sliderContainer.addEventListener("mouseenter", () =>
            this.stopAutoplay()
          );
          sliderContainer.addEventListener("mouseleave", () =>
            this.startAutoplay()
          );
        }
      },

      goToSlide(index) {
        // ... (Logic goToSlide) ...
      },

      next() {
        // ... (Logic next) ...
      },

      prev() {
        // ... (Logic prev) ...
      },

      startAutoplay() {
        this.autoplayInterval = setInterval(() => {
          this.next();
        }, this.autoplayDelay);
      },

      stopAutoplay() {
        clearInterval(this.autoplayInterval);
      },
    };

    if (document.querySelector(".slide")) {
      slider.init();
    }

    // ==========================================
    // STATS COUNTER ANIMATION (Giữ nguyên)
    // ==========================================
    const counters = document.querySelectorAll(".stat-number");

    if (counters.length > 0) {
      const animateCounter = (counter) => {
        const target = parseInt(counter.dataset.target);
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;

        const updateCounter = () => {
          current += increment;
          if (current < target) {
            counter.textContent = Math.floor(current).toLocaleString("vi-VN");
            requestAnimationFrame(updateCounter);
          } else {
            counter.textContent = target.toLocaleString("vi-VN");
          }
        };

        updateCounter();
      };

      // Intersection Observer for counter animation
      const counterObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (
              entry.isIntersecting &&
              !entry.target.classList.contains("counted")
            ) {
              animateCounter(entry.target);
              entry.target.classList.add("counted");
            }
          });
        },
        { threshold: 0.5 }
      );

      counters.forEach((counter) => {
        counterObserver.observe(counter);
      });
    }

    // ==========================================
    // PRODUCT FILTER & PRICE LIST FILTER (CẬP NHẬT)
    // Sử dụng logic lọc cho cả 2 loại thẻ: .product-card và .price-card
    // ==========================================
    const filterBtns = document.querySelectorAll(".filter-btn");

    if (filterBtns.length > 0) {
      const productCards = document.querySelectorAll(".product-card");
      const priceCards = document.querySelectorAll(".price-card");

      // Hàm xử lý chung việc hiển thị/ẩn thẻ
      const handleFilter = (filter, cards) => {
        cards.forEach((card) => {
          const groupTitle = card.previousElementSibling;

          if (filter === "all" || card.dataset.category === filter) {
            card.style.display = "flex"; // Hiển thị lại thẻ xe
            card.style.animation = "fadeInUp 0.5s ease";

            // Hiển thị tiêu đề nhóm nếu ít nhất một thẻ trong nhóm đó được hiển thị
            if (
              groupTitle &&
              groupTitle.classList.contains("price-group-title")
            ) {
              groupTitle.style.display = "block";
            }
          } else {
            card.style.display = "none"; // Ẩn thẻ xe
          }
        });

        // Sau khi lọc xong các thẻ, kiểm tra lại các tiêu đề nhóm (price-group-title)
        // Nếu không có thẻ nào được hiển thị dưới một tiêu đề nhóm, thì ẩn tiêu đề đó đi.
        document.querySelectorAll(".price-group-title").forEach((title) => {
          let hasVisibleCard = false;
          let nextSibling = title.nextElementSibling;

          while (nextSibling && nextSibling.classList.contains("price-card")) {
            if (nextSibling.style.display !== "none") {
              hasVisibleCard = true;
              break;
            }
            nextSibling = nextSibling.nextElementSibling;
          }

          if (!hasVisibleCard && filter !== "all") {
            title.style.display = "none";
          } else {
            // Đảm bảo tiêu đề luôn hiển thị nếu chọn "all"
            title.style.display = "block";
          }
        });
      };

      filterBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
          // 1. Loại bỏ active từ tất cả các nút
          filterBtns.forEach((b) => b.classList.remove("active"));
          this.classList.add("active");

          const filter = this.dataset.filter;

          // 2. Xử lý lọc cho trang chủ (product-card)
          handleFilter(filter, productCards);

          // 3. Xử lý lọc cho trang bảng giá (price-card)
          handleFilter(filter, priceCards);
        });
      });
    }

    // ==========================================
    // FAQ ACCORDION (Giữ nguyên)
    // ==========================================
    const faqItems = document.querySelectorAll(".faq-item");

    if (faqItems.length > 0) {
      faqItems.forEach((item) => {
        const question = item.querySelector(".faq-question");

        question.addEventListener("click", () => {
          // Close other items
          faqItems.forEach((otherItem) => {
            if (otherItem !== item && otherItem.classList.contains("active")) {
              otherItem.classList.remove("active");
            }
          });

          // Toggle current item
          item.classList.toggle("active");
        });
      });
    }

    // ==========================================
    // REVIEWS SLIDER (Simple) (Giữ nguyên)
    // ==========================================
    const reviewCards = document.querySelectorAll(".review-card");
    const reviewPrev = document.querySelector(".review-prev");
    const reviewNext = document.querySelector(".review-next");
    let currentReview = 0;

    if (reviewCards.length > 0 && window.innerWidth <= 768) {
      // Show one review at a time on mobile
      const showReview = (index) => {
        reviewCards.forEach((card, i) => {
          card.style.display = i === index ? "block" : "none";
        });
      };

      if (reviewPrev) {
        reviewPrev.addEventListener("click", () => {
          currentReview =
            (currentReview - 1 + reviewCards.length) % reviewCards.length;
          showReview(currentReview);
        });
      }

      if (reviewNext) {
        reviewNext.addEventListener("click", () => {
          currentReview = (currentReview + 1) % reviewCards.length;
          showReview(currentReview);
        });
      }

      showReview(0);
    } else {
      // Hide navigation on desktop
      if (reviewPrev) reviewPrev.style.display = "none";
      if (reviewNext) reviewNext.style.display = "none";
    }

    // ==========================================
    // GALLERY LIGHTBOX (Simple) (Giữ nguyên)
    // ==========================================
    const galleryItems = document.querySelectorAll(".gallery-item");

    if (galleryItems.length > 0) {
      galleryItems.forEach((item) => {
        item.addEventListener("click", function () {
          const img = this.querySelector("img");
          if (img) {
            // ... (Logic tạo lightbox) ...
            const lightbox = document.createElement("div");
            lightbox.className = "lightbox";
            lightbox.innerHTML = `
                            <div class="lightbox-content">
                                <span class="lightbox-close">&times;</span>
                                <img src="${img.src}" alt="${img.alt}">
                            </div>
                        `;

            // Add styles
            lightbox.style.cssText = `
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100vh;
                            background: rgba(0,0,0,0.9);
                            z-index: 9999;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            animation: fadeIn 0.3s ease;
                        `;

            const content = lightbox.querySelector(".lightbox-content");
            content.style.cssText = `
                            position: relative;
                            max-width: 90%;
                            max-height: 90%;
                        `;

            const imgElement = lightbox.querySelector("img");
            imgElement.style.cssText = `
                            max-width: 100%;
                            max-height: 90vh;
                            border-radius: 8px;
                        `;

            const closeBtn = lightbox.querySelector(".lightbox-close");
            closeBtn.style.cssText = `
                            position: absolute;
                            top: -40px;
                            right: 0;
                            font-size: 40px;
                            color: white;
                            cursor: pointer;
                            line-height: 1;
                        `;

            document.body.appendChild(lightbox);

            // Close lightbox
            closeBtn.addEventListener("click", () => {
              lightbox.remove();
            });

            lightbox.addEventListener("click", (e) => {
              if (e.target === lightbox) {
                lightbox.remove();
              }
            });

            document.addEventListener("keydown", function (e) {
              if (e.key === "Escape") {
                lightbox.remove();
              }
            });
          }
        });
      });
    }

    // ==========================================
    // CONTACT FORM VALIDATION (Giữ nguyên)
    // ==========================================
    const contactForm = document.getElementById("contactForm");

    if (contactForm) {
      contactForm.addEventListener("submit", function (e) {
        e.preventDefault();

        // Basic validation
        const name = this.querySelector('input[name="name"]').value.trim();
        const phone = this.querySelector('input[name="phone"]').value.trim();

        if (!name || !phone) {
          alert("Vui lòng điền đầy đủ thông tin bắt buộc!");
          return;
        }

        // Phone validation (basic)
        const phoneRegex = /^[0-9]{10,11}$/;
        if (!phoneRegex.test(phone.replace(/\s/g, ""))) {
          alert("Số điện thoại không hợp lệ!");
          return;
        }

        // Show success message
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML =
          '<i class="fa-solid fa-check"></i> Đã gửi thành công!';
        submitBtn.disabled = true;
        submitBtn.style.background = "#28a745";

        // Reset form after 2 seconds
        setTimeout(() => {
          this.reset();
          submitBtn.innerHTML = originalText;
          submitBtn.disabled = false;
          submitBtn.style.background = "";
        }, 2000);

        // Here you would normally send data to server
        console.log("Form submitted:", {
          name,
          phone,
          email: this.querySelector('input[name="email"]').value,
          car: this.querySelector('select[name="car"]').value,
          message: this.querySelector('textarea[name="message"]').value,
        });
      });
    }

    // ==========================================
    // SMOOTH SCROLL FOR ANCHOR LINKS (Giữ nguyên)
    // ==========================================
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        const href = this.getAttribute("href");
        if (href !== "#" && href !== "#0") {
          const target = document.querySelector(href);
          if (target) {
            e.preventDefault();
            target.scrollIntoView({
              behavior: "smooth",
              block: "start",
            });
          }
        }
      });
    });

    // ==========================================
    // SCROLL ANIMATIONS (Fade in on scroll) (Giữ nguyên)
    // ==========================================
    const animateOnScroll = () => {
      // Bao gồm .price-card vào danh sách
      const elements = document.querySelectorAll(
        ".featured-card, .product-card, .news-card, .review-card, .why-item, .price-card"
      );

      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.style.opacity = "0";
              entry.target.style.animation = "fadeInUp 0.6s ease forwards";
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.1 }
      );

      elements.forEach((el, index) => {
        el.style.animationDelay = `${index * 0.05}s`;
        observer.observe(el);
      });
    };

    animateOnScroll();

    // ==========================================
    // BACK TO TOP BUTTON (Optional) (Giữ nguyên)
    // ==========================================
    const createBackToTop = () => {
      const btn = document.createElement("button");
      btn.className = "back-to-top";
      btn.innerHTML = '<i class="fa-solid fa-arrow-up"></i>';
      btn.style.cssText = `
                position: fixed;
                bottom: 30px;
                right: 30px;
                width: 50px;
                height: 50px;
                background: var(--color-primary);
                color: white;
                border: none;
                border-radius: 50%;
                cursor: pointer;
                display: none;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                z-index: 1000;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                transition: all 0.3s ease;
            `;

      btn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });

      btn.addEventListener("mouseenter", () => {
        btn.style.transform = "scale(1.1)";
      });

      btn.addEventListener("mouseleave", () => {
        btn.style.transform = "scale(1)";
      });

      document.body.appendChild(btn);

      window.addEventListener("scroll", () => {
        if (window.pageYOffset > 300) {
          btn.style.display = "flex";
        } else {
          btn.style.display = "none";
        }
      });
    };

    createBackToTop();

    console.log("✅ Toyota Homepage & Price Page initialized successfully!");
  });
})();
