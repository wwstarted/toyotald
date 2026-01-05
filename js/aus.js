/**
 * FAQ Section JavaScript
 * Features:
 * 1. Tab switching with image change
 * 2. Accordion with only one item expanded
 * 3. First FAQ item expanded by default
 * 4. Smooth animations
 */

(function () {
  "use strict";

  // Initialize when DOM is ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  function init() {
    initTabs();
    initAccordion();
    console.log("✅ FAQ Section initialized successfully!");
  }

  /* ==========================================
     TAB SWITCHING
  ========================================== */
  function initTabs() {
    const tabs = document.querySelectorAll(".faq-tab");
    const tabContents = document.querySelectorAll(".faq-tab-content");
    const faqImage = document.getElementById("faqImage");
    const imageContainer = document.querySelector(".faq-image-container");

    if (!tabs.length || !tabContents.length) return;

    // Image sources for each tab
    const tabImages = {
      website: "/faq-mockup.png",
      company: "/faq-mockup-company.png",
      policy: "/faq-mockup-policy.png",
    };

    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        const targetTab = tab.dataset.tab;

        // Remove active from all tabs
        tabs.forEach((t) => t.classList.remove("active"));

        // Add active to clicked tab
        tab.classList.add("active");

        // Fade out image
        if (imageContainer) {
          imageContainer.classList.add("fade-out");
        }

        // Change content after fade
        setTimeout(() => {
          // Hide all tab contents
          tabContents.forEach((content) => {
            content.classList.remove("active");
          });

          // Show target content
          const targetContent = document.querySelector(
            `.faq-tab-content[data-content="${targetTab}"]`
          );
          if (targetContent) {
            targetContent.classList.add("active");

            // Reset accordion: close all, open first
            resetAccordion(targetContent);
          }

          // Change image
          if (faqImage && tabImages[targetTab]) {
            faqImage.src = tabImages[targetTab];
          }

          // Fade in image
          if (imageContainer) {
            setTimeout(() => {
              imageContainer.classList.remove("fade-out");
            }, 50);
          }
        }, 150);
      });
    });

    console.log("✅ Tabs initialized");
  }

  /* ==========================================
     ACCORDION
  ========================================== */
  function initAccordion() {
    const allTabContents = document.querySelectorAll(".faq-tab-content");

    allTabContents.forEach((tabContent) => {
      const faqItems = tabContent.querySelectorAll(".faq-item");

      faqItems.forEach((item) => {
        const question = item.querySelector(".faq-question");

        if (question) {
          question.addEventListener("click", () => {
            toggleAccordion(item, faqItems);
          });
        }
      });

      // Ensure first item is expanded by default
      if (faqItems.length > 0) {
        const firstItem = faqItems[0];
        openFAQ(firstItem);
      }
    });

    console.log("✅ Accordion initialized");
  }

  /* ==========================================
     TOGGLE ACCORDION
  ========================================== */
  function toggleAccordion(clickedItem, allItems) {
    const isActive = clickedItem.classList.contains("active");

    // If clicked item is already active, just close it
    if (isActive) {
      closeFAQ(clickedItem);
      return;
    }

    // Otherwise, close all items first
    allItems.forEach((item) => {
      closeFAQ(item);
    });

    // Then open clicked item with small delay for smooth animation
    setTimeout(() => {
      openFAQ(clickedItem);
    }, 50);
  }

  /* ==========================================
     OPEN FAQ
  ========================================== */
  function openFAQ(item) {
    item.classList.add("active");
    const answer = item.querySelector(".faq-answer");
    if (answer) {
      // Force reflow to ensure scrollHeight is calculated correctly
      answer.style.display = "block";
      const height = answer.scrollHeight;
      answer.style.maxHeight = height + "px";

      console.log(
        "✅ Opened FAQ:",
        item.querySelector("span").textContent.substring(0, 50),
        "Height:",
        height
      );
    }
  }

  /* ==========================================
     CLOSE FAQ
  ========================================== */
  function closeFAQ(item) {
    item.classList.remove("active");
    const answer = item.querySelector(".faq-answer");
    if (answer) {
      answer.style.maxHeight = null;

      console.log(
        "❌ Closed FAQ:",
        item.querySelector("span").textContent.substring(0, 50)
      );
    }
  }

  /* ==========================================
     RESET ACCORDION (for tab switching)
  ========================================== */
  function resetAccordion(tabContent) {
    const faqItems = tabContent.querySelectorAll(".faq-item");

    // Close all items first
    faqItems.forEach((item) => {
      closeFAQ(item);
    });

    // Open first item with delay
    if (faqItems.length > 0) {
      setTimeout(() => {
        openFAQ(faqItems[0]);
      }, 100);
    }
  }

  /* ==========================================
     RECALCULATE HEIGHT ON RESIZE
  ========================================== */
  let resizeTimer;
  window.addEventListener("resize", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      const activeItems = document.querySelectorAll(".faq-item.active");
      activeItems.forEach((item) => {
        const answer = item.querySelector(".faq-answer");
        if (answer) {
          answer.style.maxHeight = answer.scrollHeight + "px";
        }
      });
    }, 250);
  });
})();
