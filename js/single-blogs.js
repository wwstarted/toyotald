document.addEventListener("DOMContentLoaded", function () {
  const progressBar = document.getElementById("reading-progress");

  function updateReadingProgress() {
    const windowHeight = window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    const scrollPercentage =
      (scrollTop / (documentHeight - windowHeight)) * 100;

    if (progressBar) {
      progressBar.style.width = scrollPercentage + "%";
    }
  }

  window.addEventListener("scroll", updateReadingProgress);
  updateReadingProgress();

  const metaBar = document.getElementById("meta-bar");
  let metaBarOffset = metaBar ? metaBar.offsetTop : 0;

  window.addEventListener("scroll", function () {
    if (window.pageYOffset >= metaBarOffset + 100) {
      metaBar?.classList.add("scrolled");
    } else {
      metaBar?.classList.remove("scrolled");
    }
  });

  const tocList = document.getElementById("toc-list");
  const postContent = document.querySelector(".post-content-body");

  if (tocList && postContent) {
    const headings = postContent.querySelectorAll("h2");

    if (headings.length > 0) {
      headings.forEach((heading, index) => {
        const headingId = `section-${index + 1}`;
        heading.id = headingId;

        const li = document.createElement("li");
        const a = document.createElement("a");
        a.href = `#${headingId}`;
        a.textContent = heading.textContent;
        li.appendChild(a);
        tocList.appendChild(li);

        a.addEventListener("click", function (e) {
          e.preventDefault();
          heading.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });

          // Update active state
          document.querySelectorAll("#toc-list a").forEach((link) => {
            link.classList.remove("active");
          });
          a.classList.add("active");
        });
      });
    }
  }

  function highlightTOC() {
    const headings = document.querySelectorAll(".post-content-body h2");
    const tocLinks = document.querySelectorAll("#toc-list a");

    let current = "";
    const scrollPos = window.pageYOffset + 200;

    headings.forEach((heading) => {
      const sectionTop = heading.offsetTop;
      if (scrollPos >= sectionTop) {
        current = heading.getAttribute("id");
      }
    });

    tocLinks.forEach((link) => {
      link.classList.remove("active");
      if (link.getAttribute("href") === `#${current}`) {
        link.classList.add("active");
      }
    });
  }

  window.addEventListener("scroll", highlightTOC);

  const tocToggle = document.getElementById("toc-toggle");
  const toc = document.querySelector(".table-of-contents");

  if (tocToggle) {
    tocToggle.addEventListener("click", function () {
      this.classList.toggle("collapsed");
      if (tocList) {
        tocList.style.display =
          tocList.style.display === "none" ? "block" : "none";
      }
    });
  }

  window.shareOnFacebook = function () {
    const url = window.location.href;
    const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(
      url
    )}`;
    window.open(facebookUrl, "_blank", "width=600,height=400");

    // Track event
    console.log("Shared on Facebook:", url);
  };

  window.shareOnTwitter = function () {
    const url = window.location.href;
    const title = document.querySelector(".post-title").textContent;
    const twitterUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(
      url
    )}&text=${encodeURIComponent(title)}`;
    window.open(twitterUrl, "_blank", "width=600,height=400");

    console.log("Shared on Twitter:", url);
  };

  window.shareOnZalo = function () {
    const url = window.location.href;
    const zaloUrl = `https://sp.zalo.me/share_inline?url=${encodeURIComponent(
      url
    )}`;
    window.open(zaloUrl, "_blank", "width=600,height=400");

    console.log("Shared on Zalo:", url);
  };

  window.copyLink = function () {
    const url = window.location.href;

    if (navigator.clipboard) {
      navigator.clipboard.writeText(url).then(() => {
        showNotification("Đã copy link bài viết!");
      });
    } else {
      const textarea = document.createElement("textarea");
      textarea.value = url;
      document.body.appendChild(textarea);
      textarea.select();
      document.execCommand("copy");
      document.body.removeChild(textarea);
      showNotification("Đã copy link bài viết!");
    }

    console.log("Link copied:", url);
  };

  function showNotification(message) {
    const toast = document.createElement("div");
    toast.className = "toast-notification";
    toast.innerHTML = `
      <i class="fa-solid fa-check-circle"></i>
      <span>${message}</span>
    `;

    document.body.appendChild(toast);

    setTimeout(() => {
      toast.classList.add("show");
    }, 100);

    setTimeout(() => {
      toast.classList.remove("show");
      setTimeout(() => {
        document.body.removeChild(toast);
      }, 300);
    }, 3000);
  }

  window.openContactForm = function () {
    const form = document.querySelector(".cta-form");
    if (form) {
      form.scrollIntoView({
        behavior: "smooth",
        block: "center",
      });

      setTimeout(() => {
        const firstInput = form.querySelector("input");
        if (firstInput) firstInput.focus();
      }, 500);
    }
  };

  window.callHotline = function () {
    window.location.href = "tel:0123456789";
  };

  window.openZalo = function () {
    window.open("https://zalo.me/0123456789", "_blank");
  };

  const finalForm = document.getElementById("final-contact-form");

  if (finalForm) {
    finalForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(this);
      const name = this.querySelector('input[type="text"]').value;
      const phone = this.querySelector('input[type="tel"]').value;
      const car = this.querySelector("select").value;

      const submitBtn = this.querySelector(".submit-btn");
      const originalText = submitBtn.innerHTML;
      submitBtn.innerHTML =
        '<i class="fa-solid fa-spinner fa-spin"></i> Đang gửi...';
      submitBtn.disabled = true;

      setTimeout(() => {
        showNotification(
          "Đăng ký thành công! Chúng tôi sẽ liên hệ bạn trong 5 phút."
        );

        this.reset();

        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;

        console.log("Form submitted:", { name, phone, car });
      }, 1500);
    });
  }

  const postImages = document.querySelectorAll(".post-content-body img");

  postImages.forEach((img) => {
    img.style.cursor = "zoom-in";

    img.addEventListener("click", function () {
      openLightbox(this.src, this.alt);
    });
  });

  function openLightbox(src, alt) {
    const lightbox = document.createElement("div");
    lightbox.className = "lightbox-overlay";
    lightbox.innerHTML = `
      <div class="lightbox-content">
        <button class="lightbox-close">&times;</button>
        <img src="${src}" alt="${alt}">
        <p class="lightbox-caption">${alt}</p>
      </div>
    `;

    document.body.appendChild(lightbox);
    document.body.style.overflow = "hidden";

    setTimeout(() => {
      lightbox.classList.add("active");
    }, 10);

    const closeBtn = lightbox.querySelector(".lightbox-close");
    closeBtn.addEventListener("click", closeLightbox);
    lightbox.addEventListener("click", function (e) {
      if (e.target === lightbox) {
        closeLightbox();
      }
    });

    function closeLightbox() {
      lightbox.classList.remove("active");
      document.body.style.overflow = "";
      setTimeout(() => {
        document.body.removeChild(lightbox);
      }, 300);
    }
  }

  const lazyImages = document.querySelectorAll("img[loading='lazy']");

  if ("IntersectionObserver" in window) {
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

    lazyImages.forEach((img) => imageObserver.observe(img));
  }

  const relatedSlider = document.getElementById("related-slider");

  if (relatedSlider && window.innerWidth < 768) {
    let isDown = false;
    let startX;
    let scrollLeft;

    relatedSlider.style.display = "flex";
    relatedSlider.style.overflowX = "auto";
    relatedSlider.style.gap = "20px";
    relatedSlider.style.scrollSnapType = "x mandatory";

    const cards = relatedSlider.querySelectorAll(".related-post-card");
    cards.forEach((card) => {
      card.style.minWidth = "280px";
      card.style.scrollSnapAlign = "start";
    });

    // Touch scroll
    relatedSlider.addEventListener("touchstart", (e) => {
      isDown = true;
      startX = e.touches[0].pageX - relatedSlider.offsetLeft;
      scrollLeft = relatedSlider.scrollLeft;
    });

    relatedSlider.addEventListener("touchmove", (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.touches[0].pageX - relatedSlider.offsetLeft;
      const walk = (x - startX) * 2;
      relatedSlider.scrollLeft = scrollLeft - walk;
    });

    relatedSlider.addEventListener("touchend", () => {
      isDown = false;
    });
  }

  window.printPost = function () {
    window.print();
  };

  window.savePost = function () {
    const postId = document.querySelector(".single-post-modern")?.id;
    const postTitle = document.querySelector(".post-title")?.textContent;

    let savedPosts = JSON.parse(localStorage.getItem("savedPosts") || "[]");

    if (!savedPosts.find((p) => p.id === postId)) {
      savedPosts.push({
        id: postId,
        title: postTitle,
        url: window.location.href,
        date: new Date().toISOString(),
      });

      localStorage.setItem("savedPosts", JSON.stringify(savedPosts));
      showNotification("Đã lưu bài viết!");
    } else {
      showNotification("Bài viết đã được lưu trước đó");
    }
  };

  function trackView() {
    const postId = document.querySelector(".single-post-modern")?.id;

    if (postId) {
      console.log("Tracking view for post:", postId);
    }
  }

  setTimeout(trackView, 10000);

  function updateReadingTime() {
    const content = document.querySelector(".post-content-body");
    if (content) {
      const text = content.innerText;
      const wordCount = text.trim().split(/\s+/).length;
      const readingTime = Math.ceil(wordCount / 200);

      const readTimeElement = document.querySelector(".read-time");
      if (readTimeElement) {
        readTimeElement.textContent = readingTime;
      }
    }
  }

  updateReadingTime();

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

  const floatingShare = document.getElementById("floating-share");

  window.addEventListener("scroll", function () {
    if (floatingShare) {
      if (window.pageYOffset > 500) {
        floatingShare.style.opacity = "1";
        floatingShare.style.visibility = "visible";
      } else {
        floatingShare.style.opacity = "0";
        floatingShare.style.visibility = "hidden";
      }
    }
  });

  function trackReadingDepth() {
    const milestones = [25, 50, 75, 100];
    const tracked = [];

    window.addEventListener("scroll", function () {
      const scrollPercentage =
        (window.pageYOffset /
          (document.documentElement.scrollHeight - window.innerHeight)) *
        100;

      milestones.forEach((milestone) => {
        if (scrollPercentage >= milestone && !tracked.includes(milestone)) {
          tracked.push(milestone);
          console.log(`Reading depth: ${milestone}%`);
          // gtag('event', 'scroll_depth', { depth: milestone });
        }
      });
    });
  }

  trackReadingDepth();
  console.log("🚗 Toyota Lâm Đồng - Single Post loaded successfully!");
});

const style = document.createElement("style");
style.textContent = `
  /* Toast Notification */
  .toast-notification {
    position: fixed;
    bottom: -100px;
    right: 30px;
    background: #10b981;
    color: white;
    padding: 15px 25px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 600;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    z-index: 10000;
    transition: all 0.3s ease;
  }
  
  .toast-notification.show {
    bottom: 30px;
  }
  
  .toast-notification i {
    font-size: 1.3rem;
  }
  
  /* Lightbox Overlay */
  .lightbox-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  
  .lightbox-overlay.active {
    opacity: 1;
  }
  
  .lightbox-content {
    position: relative;
    max-width: 90%;
    max-height: 90%;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .lightbox-content img {
    max-width: 100%;
    max-height: 80vh;
    border-radius: 10px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
  }
  
  .lightbox-caption {
    color: white;
    margin-top: 20px;
    text-align: center;
    font-size: 1rem;
  }
  
  .lightbox-close {
    position: absolute;
    top: -50px;
    right: 0;
    background: white;
    color: #000;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    font-size: 2rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
  }
  
  .lightbox-close:hover {
    background: var(--color-primary);
    color: white;
    transform: rotate(90deg);
  }
  
  /* Floating Social Share Initial State */
  .floating-social-share {
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
  }
  
  /* Mobile Responsive */
  @media (max-width: 768px) {
    .toast-notification {
      right: 15px;
      left: 15px;
      bottom: -100px;
    }
    
    .toast-notification.show {
      bottom: 80px;
    }
    
    .lightbox-content {
      max-width: 95%;
    }
    
    .lightbox-close {
      top: -40px;
      width: 35px;
      height: 35px;
      font-size: 1.5rem;
    }
  }
`;
document.head.appendChild(style);
