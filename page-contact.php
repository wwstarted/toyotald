<?php
/**
 * Template Name: Contact Page
 * Description: Trang liên hệ Toyota Lâm Đồng
 */

get_header();
?>

<main class="contact-page">

    <section class="hero-contact">
        <div class="container">
            <h1>Liên Hệ Toyota Lâm Đồng</h1>
            <p>Chúng tôi luôn sẵn sàng tư vấn và hỗ trợ bạn 24/7</p>
        </div>
    </section>

    <section class="contact-info-section">
        <div class="container">
            <div class="contact-cards">
                <div class="contact-card">
                    <div class="contact-card-icon">📍</div>
                    <h3>Địa Chỉ Showroom</h3>
                    <p>176 Trần Hưng Đạo<br>Xã Đức Mạnh, Lâm Đồng</p>
                    <p style="margin-top: 10px; font-size: 13px; color: #999;">
                        Trụ sở: 29 Trường Chinh,<br>Buôn Ma Thuột, Đắk Lắk
                    </p>
                </div>

                <div class="contact-card">
                    <div class="contact-card-icon">📞</div>
                    <h3>Hotline</h3>
                    <p><a href="tel:0912216994">0912 216 994</a></p>
                    <p style="margin-top: 8px; font-size: 14px; color: #EB0A1E; font-weight: 600;">
                        Gọi ngay để được tư vấn
                    </p>
                </div>

                <div class="contact-card">
                    <div class="contact-card-icon">✉️</div>
                    <h3>Email</h3>
                    <p><a href="mailto:trannhanviet@gmail.com">trannhanviet@gmail.com</a></p>
                    <p style="margin-top: 8px; font-size: 13px; color: #999;">
                        Phản hồi trong 24h
                    </p>
                </div>

                <div class="contact-card">
                    <div class="contact-card-icon">🕐</div>
                    <h3>Giờ Làm Việc</h3>
                    <p><strong>8:00 - 18:00</strong></p>
                    <p style="margin-top: 8px; font-size: 13px;">Thứ 2 - Chủ Nhật</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="form-section">
        <div class="container">
            <div class="section-title">
                <h2>Gửi Thông Tin Liên Hệ</h2>
                <p>Điền thông tin bên dưới, chúng tôi sẽ liên hệ tư vấn cho bạn ngay</p>
            </div>

            <form id="contactForm" class="contact-form">
                <div class="form-row">
                    <div class="form-group">
                        <label>Họ Tên <span>*</span></label>
                        <input type="text" name="fullname" placeholder="Nguyễn Văn A" required>
                        <div class="error-message">Vui lòng nhập họ tên</div>
                    </div>

                    <div class="form-group">
                        <label>Số Điện Thoại <span>*</span></label>
                        <input type="tel" name="phone" placeholder="0912 216 994" required>
                        <div class="error-message">Vui lòng nhập số điện thoại hợp lệ</div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="email@example.com">
                    <div class="error-message">Email không hợp lệ</div>
                </div>

                <div class="form-group">
                    <label>Dòng Xe Quan Tâm <span>*</span></label>
                    <select name="car_model" required>
                        <option value="">-- Chọn dòng xe --</option>
                        <option value="Yaris Cross">Toyota Yaris Cross</option>
                        <option value="Corolla Cross">Toyota Corolla Cross</option>
                        <option value="Veloz Cross">Toyota Veloz Cross</option>
                        <option value="Innova Cross">Toyota Innova Cross</option>
                        <option value="Vios">Toyota Vios</option>
                        <option value="Wigo">Toyota Wigo</option>
                        <option value="Raize">Toyota Raize</option>
                        <option value="Hilux">Toyota Hilux</option>
                        <option value="Altis">Toyota Altis</option>
                        <option value="Camry">Toyota Camry</option>
                        <option value="Fortuner">Toyota Fortuner</option>
                        <option value="Avanza Premio">Toyota Avanza Premio</option>
                        <option value="Innova">Toyota Innova</option>
                        <option value="Prado">Toyota Prado</option>
                        <option value="Land Cruiser">Toyota Land Cruiser</option>
                        <option value="Alphard">Toyota Alphard</option>
                    </select>
                    <div class="error-message">Vui lòng chọn dòng xe</div>
                </div>

                <div class="form-group">
                    <label>Nội Dung</label>
                    <textarea name="message" placeholder="Tôi muốn được tư vấn về..."></textarea>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="agree" name="agree" required>
                    <label for="agree">Tôi đồng ý với <a href="#" style="color: #EB0A1E;">điều khoản</a> và cho phép
                        Toyota Lâm Đồng liên hệ tư vấn</label>
                </div>

                <button type="submit" class="submit-btn">
                    <span>Gửi Thông Tin</span>
                </button>
            </form>
        </div>
    </section>

    <!-- Google Maps -->
    <section class="map-section">
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.0!2d108.4!3d11.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTHCsDU0JzAwLjAiTiAxMDjCsDI0JzAwLjAiRQ!5e0!3m2!1sen!2s!4v1234567890"
                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>

    <!-- Why Choose Us -->
    <!-- <section class="why-choose-section">
        <div class="container">
            <div class="section-title">
                <h2>Vì Sao Chọn Toyota Lâm Đồng?</h2>
                <p>Chúng tôi cam kết mang đến trải nghiệm tốt nhất cho khách hàng</p>
            </div>

            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🏆</div>
                    <h3>Uy Tín Hàng Đầu</h3>
                    <p>Đại lý chính hãng Toyota với nhiều năm kinh nghiệm phục vụ khách hàng tại Lâm Đồng</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">💰</div>
                    <h3>Giá Tốt Nhất</h3>
                    <p>Cam kết giá xe cạnh tranh, nhiều ưu đãi và chính sách hỗ trợ trả góp linh hoạt</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">🚗</div>
                    <h3>Giao Xe Nhanh</h3>
                    <p>Đầy đủ màu sắc, phiên bản. Giao xe tận nơi, hỗ trợ đăng ký biển số miễn phí</p>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">⚙️</div>
                    <h3>Bảo Hành Chính Hãng</h3>
                    <p>Dịch vụ bảo hành, bảo dưỡng chính hãng Toyota với đội ngũ kỹ thuật viên chuyên nghiệp</p>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Quick Contact Buttons với Logo chính thức -->
    <div class="quick-contact-buttons">
        <a href="https://zalo.me/0912216994" target="_blank" class="quick-btn zalo" title="Chat Zalo">
            <svg viewBox="0 0 48 48" width="32" height="32" fill="white">
                <path
                    d="M24 4C12.972 4 4 12.972 4 24s8.972 20 20 20 20-8.972 20-20S35.028 4 24 4zm0 2c9.941 0 18 8.059 18 18s-8.059 18-18 18S6 33.941 6 24 14.059 6 24 6zm-6 11v14h3v-6h2.5l2.5 6h3l-2.8-6.6c1.4-.7 2.3-2.2 2.3-3.9 0-2.5-2-4.5-4.5-4.5H18zm3 3h3c.8 0 1.5.7 1.5 1.5s-.7 1.5-1.5 1.5h-3v-3z" />
            </svg>
        </a>

        <a href="tel:0912216994" class="quick-btn phone" title="Gọi ngay">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="white">
                <path
                    d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z" />
            </svg>
        </a>

        <a href="https://m.me/toyotalamdong" target="_blank" class="quick-btn messenger" title="Messenger">
            <svg viewBox="0 0 24 24" width="28" height="28" fill="white">
                <path
                    d="M12 2C6.477 2 2 6.145 2 11.243c0 2.912 1.446 5.511 3.71 7.225V22l3.397-1.87c.906.252 1.87.387 2.893.387 5.523 0 10-4.145 10-9.243S17.523 2 12 2zm.993 12.454l-2.543-2.71-4.958 2.71 5.453-5.786 2.606 2.71 4.895-2.71-5.453 5.786z" />
            </svg>
        </a>
    </div>

</main>

<script>
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>

<?php get_footer(); ?>