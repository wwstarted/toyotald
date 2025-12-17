document.addEventListener("DOMContentLoaded", () => {
  // 1. Khai báo các items cần kích hoạt animation khi scroll
  const scrollAnimatedItems = document.querySelectorAll(
    ".info-block, .value-card, .timeline-item-simple, .about-hero h1, .about-hero p"
  );

  const animateOnScroll = () => {
    const trigger = window.innerHeight * 0.9;

    scrollAnimatedItems.forEach((item) => {
      const rect = item.getBoundingClientRect();
      const delay = parseInt(item.getAttribute("data-delay")) || 0;

      // Nếu phần tử nằm trong vùng nhìn và chưa được animate
      if (rect.top < trigger && !item.classList.contains("animated")) {
        item.classList.add("animated");

        setTimeout(() => {
          // Nếu item có sẵn animation class trong HTML (như fade-in-up, zoom-in)
          // Không cần làm gì thêm, chỉ cần đảm bảo class đó được kích hoạt
          // Nếu item không có animation class, bạn có thể thêm class ở đây:
          // item.classList.add('fade-in-up');
        }, delay);
      }
    });
  };

  // Khởi chạy lần đầu và lắng nghe sự kiện scroll
  window.addEventListener("scroll", animateOnScroll);
  animateOnScroll();
});
