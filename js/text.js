document.addEventListener("DOMContentLoaded", () => {
  (() => {
    const section = document.getElementById("whatWeDo");
    if (!section) return;

    const services = [...section.querySelectorAll(".wwd-service")];
    const images = [...section.querySelectorAll(".wwd-image")];
    const right = section.querySelector(".wwd-right");

    let currentIndex = 0;
    let isAnimating = false;
    let isHovering = false;
    let scrollLocked = false;

    const maxIndex = services.length - 1;

    /* -----------------------------
       Hover intent
    ------------------------------ */
    right.addEventListener("mouseenter", () => {
      isHovering = true;
    });

    right.addEventListener("mouseleave", () => {
      isHovering = false;
    });

    /* -----------------------------
       Animation helpers
    ------------------------------ */
    function leave(index) {
      services[index].classList.remove("active");
      services[index].classList.add("leaving");

      images[index].classList.remove("active");
      images[index].classList.add("leaving");
    }

    function enter(index) {
      services[index].classList.remove("leaving");
      services[index].classList.add("active");

      images[index].classList.remove("leaving");
      images[index].classList.add("active");
    }

    function goTo(index) {
      if (isAnimating) return;
      if (index < 0 || index > maxIndex) return;
      if (index === currentIndex) return;

      isAnimating = true;
      leave(currentIndex);

      setTimeout(() => {
        enter(index);
        currentIndex = index;
        isAnimating = false;
      }, 350);
    }

    /* -----------------------------
       Scroll lock helpers (QUAN TRỌNG)
    ------------------------------ */
    function lockScroll() {
      if (scrollLocked) return;
      window.addEventListener("wheel", handleScroll, { passive: false });
      scrollLocked = true;
    }

    function unlockScroll() {
      if (!scrollLocked) return;
      window.removeEventListener("wheel", handleScroll);
      scrollLocked = false;
    }

    /* -----------------------------
       Core scroll logic (FIX DỨT ĐIỂM)
    ------------------------------ */
    function handleScroll(e) {
      if (!isHovering) return;
      if (isAnimating) return;

      const direction = e.deltaY > 0 ? 1 : -1;

      // ⬇️ SCROLL DOWN
      if (direction === 1) {
        if (currentIndex < maxIndex) {
          e.preventDefault();
          goTo(currentIndex + 1);
        } else {
          // 🔥 SERVICE CUỐI → THẢ SCROLL, THOÁT SECTION
          unlockScroll();
        }
        return;
      }

      // ⬆️ SCROLL UP
      if (direction === -1) {
        if (currentIndex > 0) {
          e.preventDefault();
          goTo(currentIndex - 1);
        } else {
          // 🔥 SERVICE ĐẦU → THẢ SCROLL, THOÁT SECTION
          unlockScroll();
        }
        return;
      }
    }

    /* -----------------------------
       Re-lock khi section quay lại trung tâm
    ------------------------------ */
    function checkSectionFocus() {
      const rect = section.getBoundingClientRect();
      const center = window.innerHeight / 2;

      const inView = rect.top < center && rect.bottom > center;

      if (inView) {
        lockScroll();
      }
    }

    window.addEventListener("scroll", checkSectionFocus);
    lockScroll(); // lock lần đầu khi load
  })();
});
