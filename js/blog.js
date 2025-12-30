/**
 * Contact Section - Form Handling & Animations
 * Features:
 * 1. Form validation
 * 2. AJAX form submission
 * 3. Smooth animations
 * 4. Input glow effects
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

  /**
   * 4. OPTIONAL - Smooth Link Scroll
   */
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
