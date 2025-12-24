document.addEventListener("DOMContentLoaded", () => {
  const scrollAnimatedItems = document.querySelectorAll(
    ".info-block, .value-card, .timeline-item-simple, .about-hero h1, .about-hero p"
  );

  const animateOnScroll = () => {
    const trigger = window.innerHeight * 0.9;

    scrollAnimatedItems.forEach((item) => {
      const rect = item.getBoundingClientRect();
      const delay = parseInt(item.getAttribute("data-delay")) || 0;

      if (rect.top < trigger && !item.classList.contains("animated")) {
        item.classList.add("animated");

        setTimeout(() => {}, delay);
      }
    });
  };

  window.addEventListener("scroll", animateOnScroll);
  animateOnScroll();
});
