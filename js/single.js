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

        this.prevBtn.addEventListener("click", () => this.prev());
        this.nextBtn.addEventListener("click", () => this.next());

        this.thumbnails.forEach((thumb, index) => {
          thumb.addEventListener("click", () => this.goToSlide(index));
        });
      },

      goToSlide(index) {
        this.mainImages[this.currentIndex].classList.remove("active");
        this.thumbnails[this.currentIndex].classList.remove("active");

        this.currentIndex = index;

        this.mainImages[this.currentIndex].classList.add("active");
        this.thumbnails[this.currentIndex].classList.add("active");
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

    // Sticky tabs on scroll
    let tabsOffsetTop = 0;
    if (tabsNav) {
      tabsOffsetTop = tabsNav.offsetTop;
    }

    window.addEventListener("scroll", function () {
      if (window.pageYOffset >= tabsOffsetTop - 100) {
        tabsNav.style.position = "fixed";
        tabsNav.style.top = "0";
        tabsNav.style.width = "100%";
      } else {
        tabsNav.style.position = "sticky";
      }

      // Update active tab on scroll
      updateActiveTab();
    });

    // Smooth scroll to sections
    tabLinks.forEach((link) => {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        const targetId = this.getAttribute("href");
        const targetSection = document.querySelector(targetId);

        if (targetSection) {
          const offsetTop = targetSection.offsetTop - 150;
          window.scrollTo({
            top: offsetTop,
            behavior: "smooth",
          });
        }
      });
    });

    // Update active tab based on scroll position
    function updateActiveTab() {
      const sections = document.querySelectorAll(".content-section");
      let currentSection = "";

      sections.forEach((section) => {
        const sectionTop = section.offsetTop - 200;
        if (window.pageYOffset >= sectionTop) {
          currentSection = section.getAttribute("id");
        }
      });

      tabLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href") === `#${currentSection}`) {
          link.classList.add("active");
        }
      });
    }

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
        document.getElementById(`calc-${targetCalc}`).classList.add("active");
      });
    });

    // ==========================================
    // REGISTRATION FEE CALCULATOR
    // ==========================================
    window.calculateRegistration = function () {
      const carVersion = document.getElementById("carVersion");
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

      // Update results
      document.getElementById("result-car-price").textContent =
        formatCurrency(carPrice);
      document.getElementById("result-registration-fee").textContent =
        formatCurrency(registrationFee);
      document.getElementById("result-insurance").textContent =
        formatCurrency(insurance);
      document.getElementById("result-total").textContent =
        formatCurrency(total);
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

      // Update results
      document.getElementById("loan-downpayment").textContent =
        formatCurrency(downPayment);
      document.getElementById("loan-monthly").textContent =
        formatCurrency(monthlyPayment);
      document.getElementById("loan-interest").textContent =
        formatCurrency(totalInterest);
      document.getElementById("loan-total").textContent = formatCurrency(
        totalPayment + downPayment
      );
    };

    // Format currency
    function formatCurrency(amount) {
      return (
        Math.round(amount).toLocaleString("vi-VN", {
          style: "currency",
          currency: "VND",
        }) + ""
      );
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

        // Filter items
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

      document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
          closeLightbox();
        }
      });
    }

    // ==========================================
    // FAQ ACCORDION
    // ==========================================
    const faqItems = document.querySelectorAll(".faq-item");

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

    // ==========================================
    // CONTACT FORM
    // ==========================================
    const productContactForm = document.getElementById("productContactForm");

    if (productContactForm) {
      productContactForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const name = this.querySelector('input[name="name"]').value.trim();
        const phone = this.querySelector('input[name="phone"]').value.trim();

        if (!name || !phone) {
          alert("Vui lòng điền đầy đủ thông tin bắt buộc!");
          return;
        }

        // Phone validation
        const phoneRegex = /^[0-9]{10,11}$/;
        if (!phoneRegex.test(phone.replace(/\s/g, ""))) {
          alert("Số điện thoại không hợp lệ!");
          return;
        }

        // Show success
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML =
          '<i class="fa-solid fa-check"></i> Đã gửi thành công!';
        submitBtn.disabled = true;
        submitBtn.style.background = "#28a745";

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
          email: this.querySelector('input[name="email"]').value,
          version: this.querySelector('select[name="version"]').value,
          message: this.querySelector('textarea[name="message"]').value,
        });
      });
    }

    // ==========================================
    // FLOATING BACK TO TOP BUTTON
    // ==========================================
    const backToTopBtn = document.getElementById("backToTop");

    window.addEventListener("scroll", function () {
      if (window.pageYOffset > 300) {
        backToTopBtn.classList.add("visible");
      } else {
        backToTopBtn.classList.remove("visible");
      }
    });

    backToTopBtn.addEventListener("click", function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });

    // ==========================================
    // SMOOTH SCROLL ANIMATIONS
    // ==========================================
    const animateOnScroll = () => {
      const elements = document.querySelectorAll(
        ".pricing-card, .feature-item, .performance-card, .safety-item, .review-card, .product-card"
      );

      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
              setTimeout(() => {
                entry.target.style.opacity = "0";
                entry.target.style.animation = "fadeInUp 0.6s ease forwards";
              }, index * 50);
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.1 }
      );

      elements.forEach((el) => {
        observer.observe(el);
      });
    };

    animateOnScroll();

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

    console.log("✅ Product Detail Page initialized successfully!");
  });
})();
