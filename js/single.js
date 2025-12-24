/**
 * Toyota Product Detail Page - Modern JavaScript
 * All interactions and calculations
 */

(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    // ==========================================
    // PRODUCT GALLERY SLIDER
    // ==========================================
    const gallerySlider = {
      currentIndex: 0,
      mainImages: document.querySelectorAll(".main-image"),
      thumbnails: document.querySelectorAll(".thumbnail"),
      prevBtn: document.querySelector(".gallery-prev"),
      nextBtn: document.querySelector(".gallery-next"),

      init() {
        if (this.mainImages.length === 0) return;

        this.prevBtn?.addEventListener("click", () => this.prev());
        this.nextBtn?.addEventListener("click", () => this.next());

        this.thumbnails.forEach((thumb, index) => {
          thumb.addEventListener("click", () => this.goToSlide(index));
        });

        // Auto-play (optional)
        // setInterval(() => this.next(), 5000);
      },

      goToSlide(index) {
        this.mainImages[this.currentIndex]?.classList.remove("active");
        this.thumbnails[this.currentIndex]?.classList.remove("active");

        this.currentIndex = index;

        this.mainImages[this.currentIndex]?.classList.add("active");
        this.thumbnails[this.currentIndex]?.classList.add("active");
      },

      next() {
        const nextIndex = (this.currentIndex + 1) % this.mainImages.length;
        this.goToSlide(nextIndex);
      },

      prev() {
        const prevIndex =
          (this.currentIndex - 1 + this.mainImages.length) %
          this.mainImages.length;
        this.goToSlide(prevIndex);
      },
    };

    gallerySlider.init();

    // ==========================================
    // STICKY TABS NAVIGATION
    // ==========================================
    const tabsNav = document.getElementById("productTabsNav");
    const tabLinks = document.querySelectorAll(".tab-link");
    const sections = document.querySelectorAll(
      ".content-section, .simple-price-section, .pricing-section, .calculator-section"
    );

    // Smooth scroll to sections
    tabLinks.forEach((link) => {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        const targetId = this.getAttribute("href");
        const targetSection = document.querySelector(targetId);

        if (targetSection) {
          const offsetTop = targetSection.offsetTop - 100;
          window.scrollTo({
            top: offsetTop,
            behavior: "smooth",
          });
        }
      });
    });

    // Update active tab on scroll
    function updateActiveTab() {
      let currentSection = "";
      const scrollPos = window.pageYOffset + 200;

      sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        const sectionId = section.getAttribute("id");

        if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
          currentSection = sectionId;
        }
      });

      tabLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href") === `#${currentSection}`) {
          link.classList.add("active");
        }
      });
    }

    window.addEventListener("scroll", updateActiveTab);

    // ==========================================
    // CALCULATOR TABS
    // ==========================================
    const calcTabBtns = document.querySelectorAll(".calc-tab-btn");
    const calcContents = document.querySelectorAll(".calc-content");

    calcTabBtns.forEach((btn) => {
      btn.addEventListener("click", function () {
        const targetCalc = this.getAttribute("data-calc");

        // Remove active from all
        calcTabBtns.forEach((b) => b.classList.remove("active"));
        calcContents.forEach((c) => c.classList.remove("active"));

        // Add active to current
        this.classList.add("active");
        document.getElementById(`calc-${targetCalc}`)?.classList.add("active");
      });
    });

    // ==========================================
    // REGISTRATION FEE CALCULATOR
    // ==========================================
    window.calculateRegistration = function () {
      const carVersion = document.getElementById("carVersion");
      if (!carVersion) return;

      const carPrice = parseInt(carVersion.value);
      const registrationFee = carPrice * 0.1; // 10%
      const insurance = carPrice * 0.015; // 1.5%
      const plateNumber = 20000000;
      const compulsoryInsurance = 480000;
      const roadFee = 1560000;
      const inspection = 140000;

      const total =
        carPrice +
        registrationFee +
        plateNumber +
        insurance +
        compulsoryInsurance +
        roadFee +
        inspection;

      // Update results with animation
      animateValue("result-car-price", 0, carPrice, 500);
      animateValue("result-registration-fee", 0, registrationFee, 500);
      animateValue("result-insurance", 0, insurance, 500);
      animateValue("result-total", 0, total, 800);
    };

    // ==========================================
    // LOAN CALCULATOR
    // ==========================================
    const loanPercentage = document.getElementById("loanPercentage");
    const loanTerm = document.getElementById("loanTerm");
    const interestRate = document.getElementById("interestRate");

    // Update display values
    if (loanPercentage) {
      loanPercentage.addEventListener("input", function () {
        const carPrice = 820000000;
        const loanAmount = (carPrice * this.value) / 100;
        document.getElementById("loanAmountDisplay").textContent =
          formatCurrency(loanAmount);
      });
    }

    if (loanTerm) {
      loanTerm.addEventListener("input", function () {
        document.getElementById(
          "loanTermDisplay"
        ).textContent = `${this.value} năm`;
      });
    }

    if (interestRate) {
      interestRate.addEventListener("input", function () {
        document.getElementById(
          "interestRateDisplay"
        ).textContent = `${this.value}%/năm`;
      });
    }

    window.calculateLoan = function () {
      const carPrice = 820000000;
      const percentage = parseInt(loanPercentage.value);
      const loanAmount = (carPrice * percentage) / 100;
      const downPayment = carPrice - loanAmount;
      const term = parseInt(loanTerm.value);
      const rate = parseFloat(interestRate.value) / 100 / 12; // Monthly rate

      const months = term * 12;
      const monthlyPayment =
        (loanAmount * rate * Math.pow(1 + rate, months)) /
        (Math.pow(1 + rate, months) - 1);

      const totalPayment = monthlyPayment * months;
      const totalInterest = totalPayment - loanAmount;

      // Update results with animation
      animateValue("loan-downpayment", 0, downPayment, 500);
      animateValue("loan-monthly", 0, monthlyPayment, 500);
      animateValue("loan-interest", 0, totalInterest, 500);
      animateValue("loan-total", 0, totalPayment + downPayment, 800);
    };

    // Format currency helper
    function formatCurrency(amount) {
      return Math.round(amount).toLocaleString("vi-VN") + " ₫";
    }

    // Animate value helper
    function animateValue(elementId, start, end, duration) {
      const element = document.getElementById(elementId);
      if (!element) return;

      const range = end - start;
      const increment = range / (duration / 16);
      let current = start;

      const timer = setInterval(() => {
        current += increment;
        if (
          (increment > 0 && current >= end) ||
          (increment < 0 && current <= end)
        ) {
          current = end;
          clearInterval(timer);
        }
        element.textContent = formatCurrency(current);
      }, 16);
    }

    // ==========================================
    // GALLERY FILTER
    // ==========================================
    const galleryFilterBtns = document.querySelectorAll(
      ".gallery-filter .filter-btn"
    );
    const galleryItems = document.querySelectorAll(".gallery-item");

    galleryFilterBtns.forEach((btn) => {
      btn.addEventListener("click", function () {
        const filter = this.getAttribute("data-filter");

        // Update active button
        galleryFilterBtns.forEach((b) => b.classList.remove("active"));
        this.classList.add("active");

        // Filter items with animation
        galleryItems.forEach((item) => {
          if (
            filter === "all" ||
            item.getAttribute("data-category") === filter
          ) {
            item.style.display = "block";
            item.style.animation = "fadeIn 0.5s ease";
          } else {
            item.style.display = "none";
          }
        });
      });
    });

    // ==========================================
    // GALLERY LIGHTBOX
    // ==========================================
    galleryItems.forEach((item) => {
      item.addEventListener("click", function () {
        const img = this.querySelector("img");
        if (img) {
          createLightbox(img.src, img.alt);
        }
      });
    });

    function createLightbox(src, alt) {
      // Create lightbox element
      const lightbox = document.createElement("div");
      lightbox.className = "lightbox-modal";
      lightbox.innerHTML = `
        <div class="lightbox-backdrop"></div>
        <div class="lightbox-content">
          <button class="lightbox-close">&times;</button>
          <img src="${src}" alt="${alt}">
        </div>
      `;

      // Styles
      lightbox.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.3s ease;
      `;

      const backdrop = lightbox.querySelector(".lightbox-backdrop");
      backdrop.style.cssText = `
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
      `;

      const content = lightbox.querySelector(".lightbox-content");
      content.style.cssText = `
        position: relative;
        max-width: 90%;
        max-height: 90%;
        z-index: 1;
      `;

      const imgElement = lightbox.querySelector("img");
      imgElement.style.cssText = `
        max-width: 100%;
        max-height: 90vh;
        border-radius: 8px;
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
      `;

      const closeBtn = lightbox.querySelector(".lightbox-close");
      closeBtn.style.cssText = `
        position: absolute;
        top: -50px;
        right: 0;
        font-size: 50px;
        color: white;
        cursor: pointer;
        background: none;
        border: none;
        line-height: 1;
        transition: transform 0.3s ease;
      `;

      closeBtn.addEventListener("mouseenter", () => {
        closeBtn.style.transform = "scale(1.2) rotate(90deg)";
      });

      closeBtn.addEventListener("mouseleave", () => {
        closeBtn.style.transform = "scale(1) rotate(0deg)";
      });

      document.body.appendChild(lightbox);
      document.body.style.overflow = "hidden";

      // Close lightbox
      const closeLightbox = () => {
        lightbox.style.animation = "fadeOut 0.3s ease";
        setTimeout(() => {
          lightbox.remove();
          document.body.style.overflow = "";
        }, 300);
      };

      closeBtn.addEventListener("click", closeLightbox);
      backdrop.addEventListener("click", closeLightbox);

      document.addEventListener("keydown", function escHandler(e) {
        if (e.key === "Escape") {
          closeLightbox();
          document.removeEventListener("keydown", escHandler);
        }
      });
    }

    // ==========================================
    // FAQ ACCORDION
    // ==========================================
    const faqItems = document.querySelectorAll(".faq-item");

    faqItems.forEach((item) => {
      const question = item.querySelector(".faq-question");

      question?.addEventListener("click", () => {
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

    // ==========================================
    // CONTACT FORM
    // ==========================================
    const productContactForm = document.getElementById("productContactForm");

    if (productContactForm) {
      productContactForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const name = this.querySelector('input[name="name"]')?.value.trim();
        const phone = this.querySelector('input[name="phone"]')?.value.trim();

        if (!name || !phone) {
          showToast("Vui lòng điền đầy đủ thông tin bắt buộc!", "error");
          return;
        }

        // Phone validation
        const phoneRegex = /^[0-9]{10,11}$/;
        if (!phoneRegex.test(phone.replace(/\s/g, ""))) {
          showToast("Số điện thoại không hợp lệ!", "error");
          return;
        }

        // Show success
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML =
          '<i class="fa-solid fa-check"></i> Đã gửi thành công!';
        submitBtn.disabled = true;
        submitBtn.style.background = "#28a745";

        showToast(
          "Đã gửi thông tin thành công! Chúng tôi sẽ liên hệ trong vòng 15 phút.",
          "success"
        );

        // Reset after 2 seconds
        setTimeout(() => {
          this.reset();
          submitBtn.innerHTML = originalText;
          submitBtn.disabled = false;
          submitBtn.style.background = "";
        }, 2000);

        // Here you would send data to server
        console.log("Form submitted:", {
          name,
          phone,
          email: this.querySelector('input[name="email"]')?.value,
          version: this.querySelector('select[name="version"]')?.value,
          message: this.querySelector('textarea[name="message"]')?.value,
        });
      });
    }

    // Toast notification helper
    function showToast(message, type = "info") {
      const toast = document.createElement("div");
      toast.className = `toast toast-${type}`;
      toast.textContent = message;
      toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${
          type === "success"
            ? "#28a745"
            : type === "error"
            ? "#dc3545"
            : "#007bff"
        };
        color: white;
        padding: 16px 24px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        z-index: 10000;
        animation: slideInRight 0.3s ease;
        max-width: 350px;
      `;

      document.body.appendChild(toast);

      setTimeout(() => {
        toast.style.animation = "slideOutRight 0.3s ease";
        setTimeout(() => toast.remove(), 300);
      }, 3000);
    }

    // ==========================================
    // FLOATING BACK TO TOP BUTTON
    // ==========================================
    const backToTopBtn = document.getElementById("backToTop");

    window.addEventListener("scroll", function () {
      if (window.pageYOffset > 300) {
        backToTopBtn?.classList.add("visible");
      } else {
        backToTopBtn?.classList.remove("visible");
      }
    });

    backToTopBtn?.addEventListener("click", function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });

    // ==========================================
    // SCROLL REVEAL ANIMATIONS
    // ==========================================
    const animateOnScroll = () => {
      const elements = document.querySelectorAll(
        ".pricing-card, .feature-item, .performance-card, .safety-item, .product-card, .highlight-item"
      );

      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
              setTimeout(() => {
                entry.target.style.opacity = "1";
                entry.target.style.animation = "fadeInUp 0.6s ease forwards";
              }, index * 50);
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.1 }
      );

      elements.forEach((el) => {
        el.style.opacity = "0";
        observer.observe(el);
      });
    };

    animateOnScroll();

    // ==========================================
    // ADD CSS ANIMATIONS
    // ==========================================
    const style = document.createElement("style");
    style.textContent = `
      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @keyframes slideInRight {
        from {
          transform: translateX(100%);
          opacity: 0;
        }
        to {
          transform: translateX(0);
          opacity: 1;
        }
      }

      @keyframes slideOutRight {
        from {
          transform: translateX(0);
          opacity: 1;
        }
        to {
          transform: translateX(100%);
          opacity: 0;
        }
      }

      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }

      @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
      }
    `;
    document.head.appendChild(style);

    // ==========================================
    // INITIALIZE CALCULATORS WITH DEFAULT VALUES
    // ==========================================
    if (loanPercentage) {
      loanPercentage.dispatchEvent(new Event("input"));
    }
    if (loanTerm) {
      loanTerm.dispatchEvent(new Event("input"));
    }
    if (interestRate) {
      interestRate.dispatchEvent(new Event("input"));
    }

    // ==========================================
    // SMOOTH SCROLL FOR ALL ANCHOR LINKS
    // ==========================================
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        const href = this.getAttribute("href");
        if (href !== "#" && href.length > 1) {
          e.preventDefault();
          const target = document.querySelector(href);
          if (target) {
            const offsetTop = target.offsetTop - 100;
            window.scrollTo({
              top: offsetTop,
              behavior: "smooth",
            });
          }
        }
      });
    });

    console.log("✅ Toyota Product Detail Page initialized successfully!");
  });
})();
