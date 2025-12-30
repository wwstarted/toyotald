/**
 * Modern Header JavaScript
 * Features:
 * - Expandable search with dropdown results
 * - Mobile menu toggle
 * - Active menu highlighting
 * - Search with AJAX (Products + Posts)
 * - Keyboard navigation
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
    initSearchToggle();
    initSearch();
    initMobileMenu();
    initActiveMenu();
    initLogoClick();
  }

  /* ==========================================
     SEARCH TOGGLE - Clean Expand Animation
  ========================================== */
  function initSearchToggle() {
    const searchForm = document.getElementById("searchForm");
    const searchInput = document.getElementById("searchInput");
    const searchIconBtn = document.querySelector(".search-icon-btn");
    const searchDropdown = document.getElementById("searchDropdown");

    if (!searchForm || !searchInput) return;

    let isExpanded = false;

    // Click icon to expand/collapse
    searchIconBtn?.addEventListener("click", (e) => {
      e.preventDefault();

      if (!isExpanded) {
        expandSearch();
      } else {
        // If expanded and has text, submit form
        if (searchInput.value.trim().length >= 2) {
          searchForm.submit();
        }
      }
    });

    // Click input to ensure expanded state
    searchInput.addEventListener("click", () => {
      if (!isExpanded) {
        expandSearch();
      }
    });

    // Close on outside click
    document.addEventListener("click", (e) => {
      if (!searchForm.contains(e.target) && isExpanded) {
        collapseSearch();
      }
    });

    // Close on ESC key
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && isExpanded) {
        collapseSearch();
      }
    });

    function expandSearch() {
      isExpanded = true;
      searchForm.classList.add("expanded");
      setTimeout(() => {
        searchInput.focus();
      }, 200);
    }

    function collapseSearch() {
      isExpanded = false;
      searchForm.classList.remove("expanded");
      searchInput.value = "";
      searchInput.blur();

      // Close dropdown
      if (searchDropdown) {
        searchDropdown.classList.remove("active");
      }
    }
  }

  /* ==========================================
     SEARCH FUNCTIONALITY
  ========================================== */
  class ModernSearch {
    constructor() {
      this.API_PRODUCTS = "/wp-json/wp/v2/products";
      this.API_POSTS = "/wp-json/wp/v2/posts";

      this.state = {
        query: "",
        productResults: [],
        postResults: [],
        allProducts: [],
        allPosts: [],
        isLoading: false,
        isOpen: false,
        selectedIndex: -1,
        error: null,
        cache: {},
      };

      this.debounceTimer = null;
      this.MIN_CHARS = 2;
      this.MAX_RESULTS_PER_SECTION = 5;
      this.DEBOUNCE_TIME = 400;

      this.init();
    }

    async init() {
      this.cacheElements();
      if (this.searchInput && this.searchForm) {
        this.attachEvents();
        await this.fetchAllData();
      }
    }

    cacheElements() {
      this.searchInput = document.getElementById("searchInput");
      this.searchForm = document.querySelector(".search-form");
      this.searchButton = document.querySelector(".search-submit");
      this.dropdown = document.getElementById("searchDropdown");
      this.productsContainer = document.querySelector("#products-results");
      this.postsContainer = document.querySelector("#posts-results");
      this.productsSection = document.querySelector("#products-section");
      this.postsSection = document.querySelector("#posts-section");
    }

    async fetchAllData() {
      try {
        const [productsRes, postsRes] = await Promise.all([
          fetch(this.API_PRODUCTS).catch(() => ({ ok: false })),
          fetch(this.API_POSTS).catch(() => ({ ok: false })),
        ]);

        if (productsRes.ok) {
          this.state.allProducts = await productsRes.json();
          console.log("✅ Loaded products:", this.state.allProducts.length);
        }

        if (postsRes.ok) {
          this.state.allPosts = await postsRes.json();
          console.log("✅ Loaded posts:", this.state.allPosts.length);
        }
      } catch (error) {
        console.error("❌ Error fetching data:", error);
        this.state.error = error.message;
      }
    }

    attachEvents() {
      this.searchInput.addEventListener("input", (e) => this.handleInput(e));
      this.searchInput.addEventListener("focus", () => this.handleFocus());
      this.searchForm.addEventListener("submit", (e) => this.handleSubmit(e));
      this.searchInput.addEventListener("keydown", (e) =>
        this.handleKeyboard(e)
      );
    }

    handleInput(e) {
      const query = e.target.value.trim();
      this.state.query = query;
      clearTimeout(this.debounceTimer);
      this.state.selectedIndex = -1;

      if (query.length < this.MIN_CHARS) {
        this.closeDropdown();
        return;
      }

      this.showLoading();
      this.debounceTimer = setTimeout(() => {
        this.performSearch(query);
      }, this.DEBOUNCE_TIME);
    }

    handleFocus() {
      if (this.state.query.length >= this.MIN_CHARS) {
        const hasResults =
          this.state.productResults.length > 0 ||
          this.state.postResults.length > 0;
        if (hasResults) this.openDropdown();
      }
    }

    handleSubmit(e) {
      if (this.state.query.length < this.MIN_CHARS) {
        e.preventDefault();
        this.searchInput.focus();
      }
    }

    handleKeyboard(e) {
      if (!this.state.isOpen) return;

      const totalResults =
        this.state.productResults.length + this.state.postResults.length;
      if (totalResults === 0) return;

      switch (e.key) {
        case "ArrowDown":
          e.preventDefault();
          this.navigateDown(totalResults);
          break;
        case "ArrowUp":
          e.preventDefault();
          this.navigateUp(totalResults);
          break;
        case "Enter":
          e.preventDefault();
          if (this.state.selectedIndex >= 0) {
            this.selectCurrentItem();
          } else {
            this.searchForm.submit();
          }
          break;
        case "Escape":
          this.closeDropdown();
          break;
      }
    }

    navigateDown(total) {
      if (this.state.selectedIndex < total - 1) {
        this.state.selectedIndex++;
        this.updateSelectedItem();
      }
    }

    navigateUp(total) {
      if (this.state.selectedIndex > 0) {
        this.state.selectedIndex--;
        this.updateSelectedItem();
      }
    }

    updateSelectedItem() {
      const allItems = this.dropdown.querySelectorAll(".search-result-item");
      allItems.forEach((item, index) => {
        if (index === this.state.selectedIndex) {
          item.classList.add("selected");
          item.scrollIntoView({ block: "nearest", behavior: "smooth" });
        } else {
          item.classList.remove("selected");
        }
      });
    }

    selectCurrentItem() {
      const allItems = this.dropdown.querySelectorAll(".search-result-item");
      const selectedItem = allItems[this.state.selectedIndex];
      if (selectedItem) {
        const link = selectedItem.dataset.link;
        if (link) window.location.href = link;
      }
    }

    performSearch(query) {
      const cacheKey = query.toLowerCase();

      if (this.state.cache[cacheKey]) {
        console.log("📦 Using cached results");
        const cached = this.state.cache[cacheKey];
        this.state.productResults = cached.products;
        this.state.postResults = cached.posts;
        this.renderResults();
        return;
      }

      const queryLower = query.toLowerCase();

      const filteredProducts = this.state.allProducts
        .filter((product) => {
          const title = product.title?.rendered?.toLowerCase() || "";
          const excerpt = product.excerpt?.rendered?.toLowerCase() || "";
          const content = product.content?.rendered?.toLowerCase() || "";
          return (
            title.includes(queryLower) ||
            excerpt.includes(queryLower) ||
            content.includes(queryLower)
          );
        })
        .slice(0, this.MAX_RESULTS_PER_SECTION);

      const filteredPosts = this.state.allPosts
        .filter((post) => {
          const title = post.title?.rendered?.toLowerCase() || "";
          const excerpt = post.excerpt?.rendered?.toLowerCase() || "";
          const content = post.content?.rendered?.toLowerCase() || "";
          return (
            title.includes(queryLower) ||
            excerpt.includes(queryLower) ||
            content.includes(queryLower)
          );
        })
        .slice(0, this.MAX_RESULTS_PER_SECTION);

      this.state.productResults = filteredProducts;
      this.state.postResults = filteredPosts;

      this.state.cache[cacheKey] = {
        products: filteredProducts,
        posts: filteredPosts,
      };

      this.renderResults();
    }

    renderResults() {
      this.state.isLoading = false;
      const hasProducts = this.state.productResults.length > 0;
      const hasPosts = this.state.postResults.length > 0;

      if (!hasProducts && !hasPosts) {
        this.showEmpty();
        return;
      }

      this.openDropdown();
      this.hideLoading();
      this.hideEmpty();
      this.hideError();

      if (hasProducts) {
        this.productsSection.style.display = "block";
        this.renderProducts();
      } else {
        this.productsSection.style.display = "none";
      }

      if (hasPosts) {
        this.postsSection.style.display = "block";
        this.renderPosts();
      } else {
        this.postsSection.style.display = "none";
      }
    }

    renderProducts() {
      const html = this.state.productResults
        .map((product, index) => {
          const title = product.title?.rendered || "Untitled";
          const excerpt = this.stripHtml(product.excerpt?.rendered || "");
          const link = product.link || "#";
          const image = product.featured_media_url || "";
          const highlightedTitle = this.highlightText(title, this.state.query);

          return `
            <div class="search-result-item" data-index="${index}" data-link="${link}">
              <div class="search-result-image">
                ${
                  image
                    ? `<img src="${image}" alt="${title}">`
                    : `<div class="search-result-placeholder"><i class="fa-solid fa-car"></i></div>`
                }
              </div>
              <div class="search-result-content">
                <h4 class="search-result-title">${highlightedTitle}</h4>
                <p class="search-result-excerpt">${this.truncate(
                  excerpt,
                  60
                )}</p>
              </div>
              <div class="search-result-arrow">
                <i class="fa-solid fa-arrow-right"></i>
              </div>
            </div>
          `;
        })
        .join("");

      this.productsContainer.innerHTML = html;
      this.attachClickEvents(this.productsContainer);
    }

    renderPosts() {
      const html = this.state.postResults
        .map((post, index) => {
          const title = post.title?.rendered || "Untitled";
          const excerpt = this.stripHtml(post.excerpt?.rendered || "");
          const link = post.link || "#";
          const image = post.featured_media_url || "";
          const date = post.date ? this.formatDate(post.date) : "";
          const highlightedTitle = this.highlightText(title, this.state.query);

          return `
            <div class="search-result-item" data-index="${
              this.state.productResults.length + index
            }" data-link="${link}">
              <div class="search-result-image">
                ${
                  image
                    ? `<img src="${image}" alt="${title}">`
                    : `<div class="search-result-placeholder"><i class="fa-solid fa-newspaper"></i></div>`
                }
              </div>
              <div class="search-result-content">
                <h4 class="search-result-title">${highlightedTitle}</h4>
                <p class="search-result-excerpt">${this.truncate(
                  excerpt,
                  60
                )}</p>
                ${
                  date
                    ? `<div class="search-result-meta"><i class="fa-solid fa-calendar"></i> ${date}</div>`
                    : ""
                }
              </div>
              <div class="search-result-arrow">
                <i class="fa-solid fa-arrow-right"></i>
              </div>
            </div>
          `;
        })
        .join("");

      this.postsContainer.innerHTML = html;
      this.attachClickEvents(this.postsContainer);
    }

    attachClickEvents(container) {
      container.querySelectorAll(".search-result-item").forEach((item) => {
        item.addEventListener("click", () => {
          const link = item.dataset.link;
          if (link) window.location.href = link;
        });
      });
    }

    stripHtml(html) {
      const tmp = document.createElement("DIV");
      tmp.innerHTML = html;
      return tmp.textContent || tmp.innerText || "";
    }

    highlightText(text, query) {
      if (!query) return text;
      const regex = new RegExp(`(${this.escapeRegex(query)})`, "gi");
      return text.replace(regex, "<mark>$1</mark>");
    }

    escapeRegex(str) {
      return str.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
    }

    truncate(text, length) {
      return text.length > length ? text.substring(0, length) + "..." : text;
    }

    formatDate(dateString) {
      const date = new Date(dateString);
      return date.toLocaleDateString("vi-VN", {
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
      });
    }

    showLoading() {
      this.state.isLoading = true;
      this.openDropdown();
      this.dropdown.classList.add("loading");
      this.dropdown.classList.remove("empty", "error");
    }

    hideLoading() {
      this.dropdown.classList.remove("loading");
    }

    showEmpty() {
      this.openDropdown();
      this.dropdown.classList.add("empty");
      this.dropdown.classList.remove("loading", "error");
    }

    hideEmpty() {
      this.dropdown.classList.remove("empty");
    }

    showError() {
      this.openDropdown();
      this.dropdown.classList.add("error");
      this.dropdown.classList.remove("loading", "empty");
    }

    hideError() {
      this.dropdown.classList.remove("error");
    }

    openDropdown() {
      this.state.isOpen = true;
      this.dropdown.classList.add("active");
    }

    closeDropdown() {
      this.state.isOpen = false;
      this.state.selectedIndex = -1;
      this.dropdown.classList.remove("active");
    }
  }

  function initSearch() {
    new ModernSearch();
  }

  /* ==========================================
     MOBILE MENU TOGGLE
  ========================================== */
  function initMobileMenu() {
    const mobileToggle = document.getElementById("mobileToggle");
    const mobileOverlay = document.getElementById("mobileMenuOverlay");
    const mobileClose = document.getElementById("mobileClose");

    if (!mobileToggle || !mobileOverlay) return;

    // Open mobile menu
    mobileToggle.addEventListener("click", () => {
      const isOpen = mobileOverlay.classList.contains("active");
      if (isOpen) {
        closeMobileMenu();
      } else {
        openMobileMenu();
      }
    });

    // Close button
    if (mobileClose) {
      mobileClose.addEventListener("click", closeMobileMenu);
    }

    // Close on overlay click
    mobileOverlay.addEventListener("click", (e) => {
      if (e.target === mobileOverlay) {
        closeMobileMenu();
      }
    });

    // Close on menu link click
    const menuLinks = mobileOverlay.querySelectorAll(".mobile-menu-link");
    menuLinks.forEach((link) => {
      link.addEventListener("click", () => {
        closeMobileMenu();
      });
    });

    // Close on ESC key
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && mobileOverlay.classList.contains("active")) {
        closeMobileMenu();
      }
    });

    function openMobileMenu() {
      mobileOverlay.classList.add("active");
      mobileToggle.setAttribute("aria-expanded", "true");
      document.body.style.overflow = "hidden";
    }

    function closeMobileMenu() {
      mobileOverlay.classList.remove("active");
      mobileToggle.setAttribute("aria-expanded", "false");
      document.body.style.overflow = "";
    }
  }

  /* ==========================================
     ACTIVE MENU HIGHLIGHTING
  ========================================== */
  function initActiveMenu() {
    const currentPath = window.location.pathname;
    const menuLinks = document.querySelectorAll(".nav-link, .mobile-menu-link");

    menuLinks.forEach((link) => {
      const linkPath = new URL(link.href).pathname;
      if (linkPath === currentPath) {
        link.parentElement.classList.add("current-menu-item");
      }
    });
  }

  /* ==========================================
     LOGO SMOOTH SCROLL TO TOP
  ========================================== */
  function initLogoClick() {
    const logoLinks = document.querySelectorAll(".logo-link, .mobile-logo");

    logoLinks.forEach((logo) => {
      logo.addEventListener("click", (e) => {
        const href = logo.getAttribute("href");
        if (href === window.location.pathname || href === "/") {
          e.preventDefault();
          window.scrollTo({
            top: 0,
            behavior: "smooth",
          });
        }
      });
    });
  }

  console.log("✅ Modern Header initialized successfully!");
})();
