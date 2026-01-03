document.addEventListener("DOMContentLoaded", function () {
  const columns = document.querySelectorAll(".pp-reviews-column-content");

  // Tùy chọn: Nếu bạn muốn clone bằng JS thay vì PHP
  // Logic: Đảm bảo nội dung đủ dài để cuộn mượt
  columns.forEach((column) => {
    // Kiểm tra xem nội dung đã được nhân đôi chưa (dựa trên class hoặc attribute)
    // Nếu dùng PHP nhân đôi rồi thì đoạn này chỉ để đảm bảo an toàn

    const contentHeight = column.offsetHeight;
    const containerHeight = column.parentElement.offsetHeight;

    // Nếu nội dung ngắn hơn khung nhìn, nhân bản thêm lần nữa
    if (contentHeight < containerHeight * 2) {
      const items = column.innerHTML;
      column.insertAdjacentHTML("beforeend", items);
    }
  });

  // Tùy chọn: Thêm hiệu ứng kéo thả (Drag to scroll) nếu cần (Advance)
  // Hiện tại CSS animation hover:pause là đủ tốt cho UX.
});
