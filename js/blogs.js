document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("main-search");
  const searchSuggestions = document.getElementById("search-suggestions");

  const searchData = [
    { title: "Ưu đãi Toyota Vios cuối năm", category: "Khuyến mãi" },
    { title: "Bảo dưỡng định kỳ", category: "Bảo dưỡng" },
    { title: "Corolla Cross 2024", category: "Tin tức" },
    { title: "Lái xe an toàn mùa mưa", category: "Mẹo lái xe" },
    { title: "So sánh RAV4 và CR-V", category: "So sánh" },
  ];

  if (searchInput) {
    searchInput.addEventListener("input", function (e) {
      const query = e.target.value.toLowerCase().trim();

      if (query.length > 2) {
        const filtered = searchData.filter((item) =>
          item.title.toLowerCase().includes(query)
        );

        if (filtered.length > 0) {
          let html = '<div class="suggestions-list">';
          filtered.forEach((item) => {
            html += `
              <div class="suggestion-item">
                <i class="fa-solid fa-magnifying-glass"></i>
                <div>
                  <div class="suggestion-title">${item.title}</div>
                  <div class="suggestion-cat">${item.category}</div>
                </div>
              </div>
            `;
          });
          html += "</div>";

          searchSuggestions.innerHTML = html;
          searchSuggestions.classList.add("active");
        } else {
          searchSuggestions.classList.remove("active");
        }
      } else {
        searchSuggestions.classList.remove("active");
      }
    });

    document.addEventListener("click", function (e) {
      if (!searchInput.contains(e.target)) {
        searchSuggestions.classList.remove("active");
      }
    });
  }

  const quickFilterBtns = document.querySelectorAll(".quick-filter-btn");
  const catFilterBtns = document.querySelectorAll(".cat-filter-btn");
  const sortSelect = document.getElementById("sort-select");
  const blogCards = document.querySelectorAll(".blog-card");
  const activeFiltersContainer = document.getElementById("active-filters");

  let activeFilters = {
    quickFilter: "all",
    category: "all",
    sort: "latest",
  };

  quickFilterBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      quickFilterBtns.forEach((b) => b.classList.remove("active"));
      this.classList.add("active");

      activeFilters.quickFilter = this.dataset.filter;
      applyFilters();
      updateActiveFiltersDisplay();
    });
  });

  catFilterBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      catFilterBtns.forEach((b) => b.classList.remove("active"));
      this.classList.add("active");

      activeFilters.category = this.dataset.cat;
      applyFilters();
      updateActiveFiltersDisplay();
    });
  });

  if (sortSelect) {
    sortSelect.addEventListener("change", function () {
      activeFilters.sort = this.value;
      applyFilters();
    });
  }

  function applyFilters() {
    const today = new Date();
    const weekAgo = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000);

    let visibleCards = Array.from(blogCards);

    if (activeFilters.quickFilter === "today") {
      visibleCards = visibleCards.filter((card) => {
        const cardDate = new Date(card.dataset.date);
        return cardDate.toDateString() === today.toDateString();
      });
    } else if (activeFilters.quickFilter === "week") {
      visibleCards = visibleCards.filter((card) => {
        const cardDate = new Date(card.dataset.date);
        return cardDate >= weekAgo;
      });
    } else if (activeFilters.quickFilter === "hot") {
      visibleCards = visibleCards.filter((card) => {
        const views = parseInt(card.dataset.views);
        return views > 1500;
      });
    }

    if (activeFilters.category !== "all") {
      visibleCards = visibleCards.filter(
        (card) => card.dataset.category === activeFilters.category
      );
    }

    if (activeFilters.sort === "popular") {
      visibleCards.sort((a, b) => {
        return parseInt(b.dataset.views) - parseInt(a.dataset.views);
      });
    } else if (activeFilters.sort === "az") {
      visibleCards.sort((a, b) => {
        const titleA = a.querySelector(".card-title").textContent;
        const titleB = b.querySelector(".card-title").textContent;
        return titleA.localeCompare(titleB);
      });
    }

    blogCards.forEach((card) => {
      card.style.display = "none";
      card.classList.remove("visible");
    });

    visibleCards.forEach((card, index) => {
      card.style.display = "block";
      setTimeout(() => {
        card.classList.add("visible");
      }, index * 100);
    });

    if (visibleCards.length === 0) {
      showNoResults();
    } else {
      hideNoResults();
    }
  }

  function updateActiveFiltersDisplay() {
    let filtersHTML = "";

    if (activeFilters.quickFilter !== "all") {
      const filterText = {
        today: "Hôm nay",
        week: "Tuần này",
        hot: "Hot nhất",
      };
      filtersHTML += `
        <span class="filter-tag">
          ${filterText[activeFilters.quickFilter]}
          <button onclick="clearQuickFilter()">×</button>
        </span>
      `;
    }

    if (activeFilters.category !== "all") {
      const catText = {
        "khuyen-mai": "Khuyến mãi",
        "bao-duong": "Bảo dưỡng",
        "tin-tuc": "Tin tức",
        "meo-lai-xe": "Mẹo lái xe",
      };
      filtersHTML += `
        <span class="filter-tag">
          ${catText[activeFilters.category]}
          <button onclick="clearCategoryFilter()">×</button>
        </span>
      `;
    }

    if (filtersHTML) {
      filtersHTML =
        '<button class="clear-all-btn" onclick="clearAllFilters()">Xóa tất cả</button>' +
        filtersHTML;
    }

    activeFiltersContainer.innerHTML = filtersHTML;
  }

  window.clearQuickFilter = function () {
    activeFilters.quickFilter = "all";
    document
      .querySelector('.quick-filter-btn[data-filter="all"]')
      .classList.add("active");
    quickFilterBtns.forEach((btn) => {
      if (btn.dataset.filter !== "all") btn.classList.remove("active");
    });
    applyFilters();
    updateActiveFiltersDisplay();
  };

  window.clearCategoryFilter = function () {
    activeFilters.category = "all";
    document
      .querySelector('.cat-filter-btn[data-cat="all"]')
      .classList.add("active");
    catFilterBtns.forEach((btn) => {
      if (btn.dataset.cat !== "all") btn.classList.remove("active");
    });
    applyFilters();
    updateActiveFiltersDisplay();
  };

  window.clearAllFilters = function () {
    clearQuickFilter();
    clearCategoryFilter();
  };

  function showNoResults() {
    const grid = document.querySelector(".blog-grid-mixed");
    if (!document.querySelector(".no-results-message")) {
      const noResultsMsg = document.createElement("div");
      noResultsMsg.className = "no-results-message";
      noResultsMsg.innerHTML = `
        <i class="fa-solid fa-search" style="font-size: 3rem; color: #ccc;"></i>
        <h3>Không tìm thấy bài viết nào</h3>
        <p>Thử thay đổi bộ lọc hoặc tìm kiếm với từ khóa khác</p>
      `;
      grid.appendChild(noResultsMsg);
    }
  }

  function hideNoResults() {
    const noResultsMsg = document.querySelector(".no-results-message");
    if (noResultsMsg) noResultsMsg.remove();
  }

  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -100px 0px",
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add("visible");
        }, index * 100);
      }
    });
  }, observerOptions);

  // Observe blog cards
  blogCards.forEach((card) => {
    card.style.opacity = "0";
    card.style.transform = "translateY(30px)";
    card.style.transition = "all 0.6s cubic-bezier(0.4, 0, 0.2, 1)";
    observer.observe(card);
  });

  const filterBar = document.getElementById("filter-bar");
  let filterBarOffset = filterBar ? filterBar.offsetTop : 0;

  window.addEventListener("scroll", function () {
    if (filterBar) {
      if (window.pageYOffset >= filterBarOffset + 100) {
        filterBar.classList.add("scrolled");
      } else {
        filterBar.classList.remove("scrolled");
      }
    }
  });

  const loadMoreBtn = document.getElementById("load-more-btn");
  let currentPage = 1;
  const postsPerPage = 6;

  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", function () {
      const btnText = this.querySelector(".btn-text");
      const btnLoader = this.querySelector(".btn-loader");

      // Show loading
      btnText.style.display = "none";
      btnLoader.style.display = "inline-block";
      this.disabled = true;

      setTimeout(() => {
        currentPage++;

        btnText.style.display = "inline-block";
        btnLoader.style.display = "none";
        this.disabled = false;

        console.log("Loading page:", currentPage);
        if (currentPage >= 3) {
          this.style.display = "none";
        }
      }, 1500);
    });
  }

  const backToTopBtn = document.createElement("button");
  backToTopBtn.className = "back-to-top";
  backToTopBtn.innerHTML = '<i class="fa-solid fa-arrow-up"></i>';
  document.body.appendChild(backToTopBtn);

  window.addEventListener("scroll", function () {
    if (window.pageYOffset > 500) {
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

  const newsletterForm = document.querySelector(".newsletter-form");

  if (newsletterForm) {
    newsletterForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const email = this.querySelector('input[type="email"]').value;

      if (email) {
        alert(
          "Cảm ơn bạn đã đăng ký! Chúng tôi sẽ gửi tin tức mới nhất đến: " +
            email
        );
        this.reset();
      }
    });
  }

  const images = document.querySelectorAll("img");

  const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const img = entry.target;
        if (img.dataset.src) {
          img.src = img.dataset.src;
          img.removeAttribute("data-src");
        }
        imageObserver.unobserve(img);
      }
    });
  });

  images.forEach((img) => {
    imageObserver.observe(img);
  });

  const quickViewBtns = document.querySelectorAll(".quick-view-btn");

  quickViewBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      const card = this.closest(".blog-card");
      const title = card.querySelector(".card-title").textContent;
      const excerpt = card.querySelector(".card-excerpt").textContent;

      console.log("Quick view:", title);
      alert("Quick view feature: " + title);
    });
  });

  const readMoreLinks = document.querySelectorAll(".read-link, .btn-read-more");

  readMoreLinks.forEach((link) => {
    link.addEventListener("click", function () {
      const postTitle = this.closest("article").querySelector(
        ".card-title, .featured-title"
      ).textContent;

      console.log("Post clicked:", postTitle);
    });
  });

  console.log("🚗 Toyota Lâm Đồng Blog - Loaded successfully!");

  setTimeout(() => {
    blogCards.forEach((card, index) => {
      setTimeout(() => {
        card.classList.add("visible");
      }, index * 100);
    });
  }, 300);
});

const style = document.createElement("style");
style.textContent = `
  /* Search Suggestions Styling */
  .suggestions-list {
    padding: 10px 0;
  }
  
  .suggestion-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 12px 20px;
    cursor: pointer;
    transition: background 0.3s;
  }
  
  .suggestion-item:hover {
    background: #f5f7fa;
  }
  
  .suggestion-item i {
    color: #999;
    font-size: 1rem;
  }
  
  .suggestion-title {
    font-weight: 600;
    color: var(--color-text-dark);
  }
  
  .suggestion-cat {
    font-size: 0.85rem;
    color: #999;
  }
  
  /* No Results Message */
  .no-results-message {
    grid-column: 1 / -1;
    text-align: center;
    padding: 80px 20px;
  }
  
  .no-results-message h3 {
    margin: 20px 0 10px;
    color: var(--color-text-dark);
  }
  
  .no-results-message p {
    color: #999;
  }
  
  /* Back to Top Button */
  .back-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    background: var(--color-primary);
    color: white;
    border: none;
    border-radius: 50%;
    font-size: 1.2rem;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1000;
    box-shadow: 0 5px 20px rgba(234, 0, 41, 0.3);
  }
  
  .back-to-top.visible {
    opacity: 1;
    visibility: visible;
  }
  
  .back-to-top:hover {
    background: #c0001e;
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(234, 0, 41, 0.5);
  }
  
  /* Clear All Button */
  .clear-all-btn {
    background: #ef4444;
    color: white;
    border: none;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
  }
  
  .clear-all-btn:hover {
    background: #dc2626;
    transform: scale(1.05);
  }
`;
document.head.appendChild(style);
