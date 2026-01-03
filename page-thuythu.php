<?php
/**
 * Template Name: Thuy Thu - Toyota Lâm Đồng (FINAL VERSION)
 * Description: Hero to About Us Scroll Transition - Image Inside Hero
 */
get_header(); ?>

<!-- Hero Banner Section -->
<section class="pp-hero-section" id="ppHero">
    <!-- Video Background -->
    <video autoplay loop muted playsinline class="pp-hero-video">
        <source src="https://videos.pexels.com/video-files/3129671/3129671-uhd_2560_1440_30fps.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Blue Overlay Gradient -->
    <div class="pp-hero-overlay"></div>

    <!-- Hero Content -->
    <div class="pp-hero-content">
        <div class="pp-hero-container">
            <div class="pp-hero-text">
                <p class="pp-hero-subtitle">Digital Agency Trọn Gói</p>
                <h1 class="pp-hero-title">
                    Pixel Perfect
                    <br>
                    <!-- <span class="pp-hero-title-highlight">CREATIVE SOLUTIONS</span> -->
                </h1>
                <p class="pp-hero-description">
                    Chúng tôi cung cấp giải pháp thiết kế website chuyên nghiệp, SEO tối ưu,
                    marketing truyền thông đa kênh và quản lý thương hiệu toàn diện cho doanh nghiệp.
                </p>

                <!-- CTA Buttons -->
                <div class="pp-hero-actions">
                    <!-- Scroll Indicator -->
                    <button class="pp-scroll-indicator" aria-label="Scroll down">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 5V19M12 19L5 12M12 19L19 12" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                    </button>

                    <!-- CTA Button -->
                    <a href="#contact" class="pp-cta-button">
                        Yêu cầu báo giá
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Partner Logos -->
    <div class="pp-floating-logos">
        <div class="pp-logo-item pp-logo-1">
            <img src="https://thuythu.vn/wp-content/uploads/2023/11/trungnguyen_5.svg" alt="Trung Nguyen">
        </div>
        <div class="pp-logo-item pp-logo-2">
            <img src="https://thuythu.vn/wp-content/uploads/2023/11/Savills_logo-2.svg" alt="Savills">
        </div>
        <div class="pp-logo-item pp-logo-3">
            <img src="https://thuythu.vn/wp-content/uploads/2023/11/DKRS_3.png" alt="DKRS">
        </div>
        <div class="pp-logo-item pp-logo-4">
            <img src="https://thuythu.vn/wp-content/uploads/2023/11/cr-1.svg" alt="CR">
        </div>
    </div>

    <!-- 3D Devices Mockup (MOVED INSIDE HERO) -->
    <div class="pp-devices-container">
        <div class="pp-devices-wrapper">
            <img src="https://thuythu.vn/wp-content/uploads/2023/11/Mask-group-39-1.png"
                alt="Pixel Perfect Devices Showcase" class="pp-devices-image">
        </div>
    </div>
</section>

<section class="pp-services-section" id="ppServices">
    <div class="pp-services-container">
        <!-- Services Grid -->
        <div class="pp-services-grid">
            <!-- Left: Header + Services List -->
            <div class="pp-services-left">
                <!-- Section Header -->
                <div class="pp-services-header">
                    <p class="pp-services-label">Giải Pháp</p>
                    <h2 class="pp-services-heading-line1">DỊCH VỤ TẠI</h2>
                    <h2 class="pp-services-heading-line2">PIXEL PERFECT</h2>
                </div>

                <!-- Services List -->
                <div class="pp-services-list">
                    <!-- Service Item 1: Marketing Tổng Thể -->
                    <div class="pp-service-item active" data-service="marketing">
                        <div class="pp-service-header">
                            <h3 class="pp-service-title">Marketing Tổng Thể</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="pp-service-icon">
                                <path d="M7 7h10v10"></path>
                                <path d="M7 17 17 7"></path>
                            </svg>
                        </div>
                        <div class="pp-service-content">
                            <p class="pp-service-subtitle">
                                Chiến lược tiếp thị toàn diện, kết hợp đa kênh để tối ưu hóa sự hiện diện thương hiệu và
                                tăng trưởng doanh thu bền vững.
                            </p>
                            <ul class="pp-service-features">
                                <li>Chiến lược thương hiệu</li>
                                <li>Quản trị mạng xã hội</li>
                                <li>Content Marketing</li>
                                <li>Performance Marketing</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Service Item 2: Dịch Vụ SEO -->
                    <div class="pp-service-item" data-service="seo">
                        <div class="pp-service-header">
                            <h3 class="pp-service-title">Dịch Vụ SEO</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="pp-service-icon">
                                <path d="M7 7h10v10"></path>
                                <path d="M7 17 17 7"></path>
                            </svg>
                        </div>
                        <div class="pp-service-content">
                            <p class="pp-service-subtitle">
                                Tối ưu hóa công cụ tìm kiếm chuyên nghiệp, giúp website của bạn đạt vị trí cao trên
                                Google và thu hút khách hàng tiềm năng.
                            </p>
                            <ul class="pp-service-features">
                                <li>SEO On-page & Off-page</li>
                                <li>Nghiên cứu từ khóa</li>
                                <li>Link Building chiến lược</li>
                                <li>Báo cáo & phân tích định kỳ</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Service Item 3: Thiết Kế Website -->
                    <div class="pp-service-item" data-service="website">
                        <div class="pp-service-header">
                            <h3 class="pp-service-title">Thiết Kế Website</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="pp-service-icon">
                                <path d="M7 7h10v10"></path>
                                <path d="M7 17 17 7"></path>
                            </svg>
                        </div>
                        <div class="pp-service-content">
                            <p class="pp-service-subtitle">
                                Thiết kế website chuyên nghiệp, responsive trên mọi thiết bị, tối ưu trải nghiệm người
                                dùng và conversion rate.
                            </p>
                            <ul class="pp-service-features">
                                <li>UI/UX Design hiện đại</li>
                                <li>Responsive & Mobile-First</li>
                                <li>Tốc độ tải trang tối ưu</li>
                                <li>Tích hợp CMS WordPress</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Service Item 4: Dịch Vụ IMC -->
                    <div class="pp-service-item" data-service="imc">
                        <div class="pp-service-header">
                            <h3 class="pp-service-title">Dịch Vụ IMC</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="pp-service-icon">
                                <path d="M7 7h10v10"></path>
                                <path d="M7 17 17 7"></path>
                            </svg>
                        </div>
                        <div class="pp-service-content">
                            <p class="pp-service-subtitle">
                                Truyền thông marketing tích hợp, kết nối mọi kênh giao tiếp để tạo ra thông điệp nhất
                                quán và hiệu quả cao.
                            </p>
                            <ul class="pp-service-features">
                                <li>Chiến lược truyền thông tích hợp</li>
                                <li>Quản lý đa kênh</li>
                                <li>Sản xuất nội dung sáng tạo</li>
                                <li>Đo lường & tối ưu hiệu quả</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Service Image -->
            <div class="pp-services-image-container">
                <div class="pp-service-image-wrapper">
                    <!-- Marketing Image -->
                    <img src="https://v0-page-pp.vercel.app/digital-marketing-luxury-strategy.jpg"
                        alt="Marketing Tổng Thể" class="pp-service-image active" data-service="marketing">

                    <!-- SEO Image -->
                    <img src="https://v0-page-pp.vercel.app/seo-optimization-analytics-data.jpg" alt="Dịch Vụ SEO"
                        class="pp-service-image" data-service="seo">

                    <!-- Website Image -->
                    <img src="https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=800&auto=format&fit=crop"
                        alt="Thiết Kế Website" class="pp-service-image" data-service="website">

                    <!-- IMC Image -->
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&auto=format&fit=crop"
                        alt="Dịch Vụ IMC" class="pp-service-image" data-service="imc">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pp-why-choose-section">
    <!-- Background Pattern với Gradient Overlay -->
    <div class="pp-why-bg-pattern">
        <div class="pp-why-gradient-overlay"></div>

        <div class="pp-why-container">
            <!-- Header -->
            <div class="pp-why-header">
                <h2 class="pp-why-heading-line1">TẠI SAO NÊN</h2>
                <h2 class="pp-why-heading-line2">CHỌN PIXEL PERFECT</h2>
                <p class="pp-why-description">
                    Pixel Perfect Agency tự hào đứng vai trò là một chuyên gia với nhiều năm kinh nghiệm thực chiến
                    trong lĩnh vực thiết kế website, 500+ website đã ra đời và vận hành ổn định.
                </p>
            </div>
        </div>
    </div>

    <!-- Stats Cards - Zigzag Layout -->
    <div class="pp-why-container">
        <div class="pp-why-stats-grid">
            <!-- Card 1 -->
            <div class="pp-stat-card" data-margin="top-1">
                <div class="pp-stat-hover-effect"></div>
                <div class="pp-stat-content">
                    <div class="pp-stat-line-wrapper">
                        <div class="pp-stat-dot" style="background: #95d3c5;">
                            <span class="pp-stat-line"
                                style="background: linear-gradient(180deg, #95d3c5 0%, rgba(149, 211, 197, 0) 100%);"></span>
                        </div>
                        <div class="pp-stat-number">10+</div>
                        <h3 class="pp-stat-badge">Năm kinh nghiệm 'ra khơi'</h3>
                        <div class="pp-stat-desc">
                            Chúng tôi có 10 năm kinh nghiệm trong thiết kế website giới thiệu công ty
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="pp-stat-card" data-margin="top-2">
                <div class="pp-stat-hover-effect"></div>
                <div class="pp-stat-content">
                    <div class="pp-stat-line-wrapper">
                        <div class="pp-stat-dot" style="background: #55b1ec;">
                            <span class="pp-stat-line"
                                style="background: linear-gradient(180deg, #55b1ec 0%, rgba(85, 177, 236, 0) 100%);"></span>
                        </div>
                        <div class="pp-stat-number">500+</div>
                        <h3 class="pp-stat-badge">Sản phẩm thiết kế</h3>
                        <div class="pp-stat-desc">
                            Sản phẩm thiết kế được vận hành ổn định tại Pixel Perfect
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="pp-stat-card" data-margin="top-3">
                <div class="pp-stat-hover-effect"></div>
                <div class="pp-stat-content">
                    <div class="pp-stat-line-wrapper">
                        <div class="pp-stat-dot" style="background: #2351d6;">
                            <span class="pp-stat-line"
                                style="background: linear-gradient(180deg, #2351d6 0%, rgba(35, 81, 214, 0) 100%);"></span>
                        </div>
                        <div class="pp-stat-number">25+</div>
                        <h3 class="pp-stat-badge">Ngành nghề thấu hiểu</h3>
                        <div class="pp-stat-desc">
                            Ngành nghề thấu hiểu, song hành và chinh phục thành công
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="pp-stat-card" data-margin="top-4">
                <div class="pp-stat-hover-effect"></div>
                <div class="pp-stat-content">
                    <div class="pp-stat-line-wrapper">
                        <div class="pp-stat-dot" style="background: #009fd3;">
                            <span class="pp-stat-line"
                                style="background: linear-gradient(180deg, #009fd3 0%, rgba(0, 159, 211, 0) 100%);"></span>
                        </div>
                        <div class="pp-stat-number">WP</div>
                        <h3 class="pp-stat-badge">Nền tảng Wordpress</h3>
                        <div class="pp-stat-desc">
                            Số lượng lĩnh vực ngành nghề mà chúng tôi đã chinh phục cùng KH
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Office Image với Gradient Overlays -->
    <div class="pp-why-image-wrapper">
        <div class="pp-why-image-container">
            <img src="https://v0-page-pp.vercel.app/office-lobby.webp" alt="Modern office workspace"
                class="pp-why-office-image">
            <div class="pp-why-img-gradient-top"></div>
            <div class="pp-why-img-gradient-bottom"></div>
            <div class="pp-why-img-gradient-sides"></div>
        </div>
    </div>

    <!-- Bottom Features - 3 Columns với Line ngang -->
    <div class="pp-why-container">
        <div class="pp-why-features-grid">
            <!-- Feature 1 -->
            <div class="pp-feature-item">
                <div class="pp-feature-icon-wrapper">
                    <div class="pp-feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            <path d="M9 12l2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="pp-feature-connecting-line"></div>
                </div>
                <h3 class="pp-feature-title">Cam kết đối với khách hàng</h3>
                <p class="pp-feature-desc">Cam kết về bảo mật thông tin và quyền riêng tư khách hàng</p>
            </div>

            <!-- Feature 2 -->
            <div class="pp-feature-item">
                <div class="pp-feature-icon-wrapper">
                    <div class="pp-feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="pp-feature-connecting-line pp-feature-connecting-line-both"></div>
                </div>
                <h3 class="pp-feature-title">Dịch vụ chăm sóc khách hàng</h3>
                <p class="pp-feature-desc">Dịch vụ chăm sóc khách hàng chuyên nghiệp, tư vấn nhiệt thành</p>
            </div>

            <!-- Feature 3 -->
            <div class="pp-feature-item">
                <div class="pp-feature-icon-wrapper">
                    <div class="pp-feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M3 3c0 0 2 8 9 11s15 -2 15 -2"></path>
                        </svg>
                    </div>
                    <div class="pp-feature-connecting-line pp-feature-connecting-line-left"></div>
                </div>
                <h3 class="pp-feature-title">Cập nhật xu hướng thiết kế mới</h3>
                <p class="pp-feature-desc">Cập nhật và áp dụng những xu hướng thiết kế website bất động sản mới nhất.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="pp-reviews-section">
    <div class="pp-reviews-bg-pattern">
        <div class="pp-reviews-gradient-overlay"></div>

        <div class="pp-reviews-container">
            <div class="pp-reviews-header">
                <span class="pp-reviews-subtitle">TESTIMONIALS</span>
                <h2 class="pp-reviews-heading">
                    <span class="pp-text-gradient">KHÁCH HÀNG REVIEW</span>
                </h2>
            </div>

            <div class="pp-reviews-grid-wrapper">
                <div class="pp-reviews-fade-top"></div>
                <div class="pp-reviews-fade-bottom"></div>

                <div class="pp-reviews-grid">
                    <div class="pp-reviews-column pp-scroll-up">
                        <div class="pp-reviews-column-content">
                            <?php render_review_card('E', 'Ethan Collins', '@ethancoatshunter', 'Tech Startup', 'Cheap doesn\'t mean low quality here. Amazing speeds and whenever I have questions, real people answer within minutes. Perfect for my data scraping projects.'); ?>
                            <?php render_review_card('N', 'Nolan Perkins', '@_ra3nolan', 'E-commerce Business', 'The attention to detail and professionalism is outstanding. They transformed our outdated website into a modern, high-performing platform that our customers love.'); ?>
                            <?php render_review_card('J', 'Janus Tiu', '@janustiu', 'Marketing Agency', 'Working with Pixel Perfect was a game-changer for our business. Their expertise in web design and development is unmatched. Highly recommend!'); ?>

                            <?php render_review_card('E', 'Ethan Collins', '@ethancoatshunter', 'Tech Startup', 'Cheap doesn\'t mean low quality here. Amazing speeds and whenever I have questions, real people answer within minutes. Perfect for my data scraping projects.'); ?>
                            <?php render_review_card('N', 'Nolan Perkins', '@_ra3nolan', 'E-commerce Business', 'The attention to detail and professionalism is outstanding. They transformed our outdated website into a modern, high-performing platform that our customers love.'); ?>
                            <?php render_review_card('J', 'Janus Tiu', '@janustiu', 'Marketing Agency', 'Working with Pixel Perfect was a game-changer for our business. Their expertise in web design and development is unmatched. Highly recommend!'); ?>
                        </div>
                    </div>

                    <div class="pp-reviews-column pp-scroll-down">
                        <div class="pp-reviews-column-content">
                            <?php render_review_card('S', 'Sarah Johnson', '@sarahj_design', 'Design Studio', 'Exceptional service from start to finish. The team understood our vision and brought it to life with precision and creativity.'); ?>
                            <?php render_review_card('M', 'Michael Chen', '@mchen_tech', 'SaaS Company', 'Best web development partner we\'ve ever worked with. Fast, reliable, and always delivers beyond expectations.'); ?>
                            <?php render_review_card('E', 'Emma Davis', '@emmadavis', 'Healthcare Tech', 'Their innovative approach and technical skills helped us achieve our digital transformation goals. Couldn\'t be happier!'); ?>

                            <?php render_review_card('S', 'Sarah Johnson', '@sarahj_design', 'Design Studio', 'Exceptional service from start to finish. The team understood our vision and brought it to life with precision and creativity.'); ?>
                            <?php render_review_card('M', 'Michael Chen', '@mchen_tech', 'SaaS Company', 'Best web development partner we\'ve ever worked with. Fast, reliable, and always delivers beyond expectations.'); ?>
                            <?php render_review_card('E', 'Emma Davis', '@emmadavis', 'Healthcare Tech', 'Their innovative approach and technical skills helped us achieve our digital transformation goals. Couldn\'t be happier!'); ?>
                        </div>
                    </div>

                    <div class="pp-reviews-column pp-scroll-up">
                        <div class="pp-reviews-column-content">
                            <?php render_review_card('J', 'Janus Tiu', '@janustiu', 'Marketing Agency', 'Working with Pixel Perfect was a game-changer for our business. Their expertise in web design and development is unmatched. Highly recommend!'); ?>
                            <?php render_review_card('E', 'Ethan Collins', '@ethancoatshunter', 'Tech Startup', 'Cheap doesn\'t mean low quality here. Amazing speeds and whenever I have questions, real people answer within minutes. Perfect for my data scraping projects.'); ?>
                            <?php render_review_card('N', 'Nolan Perkins', '@_ra3nolan', 'E-commerce Business', 'The attention to detail and professionalism is outstanding. They transformed our outdated website into a modern, high-performing platform that our customers love.'); ?>

                            <?php render_review_card('J', 'Janus Tiu', '@janustiu', 'Marketing Agency', 'Working with Pixel Perfect was a game-changer for our business. Their expertise in web design and development is unmatched. Highly recommend!'); ?>
                            <?php render_review_card('E', 'Ethan Collins', '@ethancoatshunter', 'Tech Startup', 'Cheap doesn\'t mean low quality here. Amazing speeds and whenever I have questions, real people answer within minutes. Perfect for my data scraping projects.'); ?>
                            <?php render_review_card('N', 'Nolan Perkins', '@_ra3nolan', 'E-commerce Business', 'The attention to detail and professionalism is outstanding. They transformed our outdated website into a modern, high-performing platform that our customers love.'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Helper Function để render card (Bạn có thể đặt function này trong functions.php hoặc đầu file)
function render_review_card($initial, $name, $handle, $role, $content)
{
    ?>
    <div class="pp-review-card">
        <div class="pp-card-header">
            <div class="pp-card-avatar">
                <?php echo $initial; ?>
            </div>
            <div class="pp-card-info">
                <h3 class="pp-card-name"><?php echo $name; ?></h3>
                <p class="pp-card-handle"><?php echo $handle; ?></p>
                <p class="pp-card-role"><?php echo $role; ?></p>
            </div>
        </div>
        <div class="pp-card-stars">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="pp-star-icon">
                    <path
                        d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                    </path>
                </svg>
            <?php endfor; ?>
        </div>
        <p class="pp-card-text"><?php echo $content; ?></p>
    </div>
    <?php
}
?>


<?php get_footer(); ?>