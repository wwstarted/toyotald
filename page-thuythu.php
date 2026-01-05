<?php
/**
 * Template Name: Thuy Thu - Toyota Lâm Đồng (FINAL VERSION)
 * Description: Hero to About Us Scroll Transition - Image Inside Hero
 */
get_header(); ?>

<section class="pp-hero-section">
    <div class="pp-hero-bg">
        <video autoplay loop muted playsinline class="pp-video-bg">
            <source src="https://videos.pexels.com/video-files/3129671/3129671-uhd_2560_1440_30fps.mp4"
                type="video/mp4">
        </video>
        <div class="pp-overlay-gradient"></div>
        <div class="pp-overlay-blur"></div>
    </div>

    <div class="pp-grid-pattern">
        <svg viewBox="0 0 1440 900" preserveAspectRatio="none">
            <defs>
                <pattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse">
                    <path d="M 60 0 L 0 0 0 60" fill="none" stroke="white" stroke-width="0.5" opacity="0.3"></path>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)"></rect>
            <line x1="0" y1="200" x2="600" y2="0" stroke="white" stroke-width="1" opacity="0.2"></line>
            <line x1="100" y1="400" x2="800" y2="0" stroke="white" stroke-width="1" opacity="0.15"></line>
            <line x1="200" y1="600" x2="1000" y2="0" stroke="white" stroke-width="1" opacity="0.1"></line>
            <line x1="800" y1="900" x2="1440" y2="300" stroke="white" stroke-width="1" opacity="0.15"></line>
            <line x1="600" y1="900" x2="1200" y2="400" stroke="white" stroke-width="1" opacity="0.1"></line>
        </svg>
    </div>

    <div class="pp-container">
        <div class="pp-content-wrapper animate-on-scroll">
            <span class="pp-subtitle">Thiết kế website</span>
            <h1 class="pp-title">PixelPerfect</h1>
            <p class="pp-description">
                Thiết kế website doanh nghiệp có thể giúp cho các công ty có thể xây dựng thương hiệu trên kênh Online,
                quảng bá sản phẩm đến với các khách hàng một cách nhanh chóng và dễ dàng.
            </p>

            <div class="pp-actions">
                <button class="pp-btn-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="animate-bounce">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                </button>
                <button class="pp-btn-primary">Yêu cầu báo giá</button>
            </div>
        </div>
    </div>

    <div class="pp-bottom-divider">
        <svg viewBox="0 0 1440 450" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <defs>
                <linearGradient id="blendGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#e8f4f8" stop-opacity="0.3"></stop>
                    <stop offset="30%" stop-color="#f0f8fa" stop-opacity="0.6"></stop>
                    <stop offset="60%" stop-color="#f7fbfc" stop-opacity="0.85"></stop>
                    <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                </linearGradient>
            </defs>
            <path d="M0 450L1440 450L1440 80L0 450Z" fill="url(#blendGradient)"></path>
            <path d="M0 450L1440 450L1440 120L0 450Z" fill="#ffffff" fill-opacity="0.9"></path>
        </svg>
    </div>

    <div class="pp-floating-wrapper animate-on-scroll" style="transition-delay: 0.3s;">
        <div class="pp-float-bg-effect"></div>

        <div class="pp-image-container">
            <img src="https://v0-page-pp.vercel.app/images/image.png" alt="Website Desktop Tablet"
                class="pp-main-image">

            <div class="pp-image-fade-bottom"></div>

            <div class="pp-bubble bubble-1" style="animation-delay:0s">
                <span style="color:#1e4d8c">Savills</span>
            </div>
            <div class="pp-bubble bubble-2" style="animation-delay:0.5s">
                <span style="color:#c41e3a">DKRS</span>
            </div>
            <div class="pp-bubble bubble-3" style="animation-delay:1s">
                <span style="color:#00a651">Cenco</span>
            </div>
            <div class="pp-bubble bubble-4" style="animation-delay:1.5s">
                <span style="color:#2e7d32">Trans</span>
            </div>
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

<!-- PROCESS SECTION -->
<section class="pp-process-section">
    <!-- Background Gradient Blobs -->
    <div class="pp-process-bg-effects">
        <div class="pp-process-blob-1"></div>
        <div class="pp-process-blob-2"></div>
    </div>

    <div class="pp-process-container">
        <!-- Header -->
        <div class="pp-process-header">
            <div class="pp-process-badge">
                <span>OUR PROCESS</span>
            </div>
            <h2 class="pp-process-heading-line1">QUY TRÌNH LÀM VIỆC</h2>
            <h2 class="pp-process-heading-line2">TẠI PIXEL PERFECT</h2>
            <p class="pp-process-description">
                Từ ý tưởng đến hiện thực - mỗi bước được thực hiện với sự tỉ mỉ và chuyên môn cao nhất
            </p>
        </div>

        <!-- Process Steps Container -->
        <div class="pp-process-steps-wrapper">
            <!-- Progress Line (Desktop only) -->
            <div class="pp-process-progress-line">
                <div class="pp-process-progress-fill"></div>
            </div>

            <!-- Steps Grid -->
            <div class="pp-process-steps-grid">
                <!-- Step 1 -->
                <button class="pp-process-step" data-step="0">
                    <div class="pp-step-card">
                        <div class="pp-step-icon-wrapper">
                            <div class="pp-step-icon">
                                <span class="pp-step-emoji">🔍</span>
                                <svg class="pp-step-check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="m9 12 2 2 4-4"></path>
                                </svg>
                            </div>
                            <div class="pp-step-badge">01</div>
                        </div>
                        <h3 class="pp-step-title">Tìm Hiểu & Phân Tích</h3>
                        <p class="pp-step-subtitle">Discovery & Analysis</p>
                    </div>
                    <div class="pp-step-connector"></div>
                </button>

                <!-- Step 2 -->
                <button class="pp-process-step" data-step="1">
                    <div class="pp-step-card">
                        <div class="pp-step-icon-wrapper">
                            <div class="pp-step-icon">
                                <span class="pp-step-emoji">📋</span>
                                <svg class="pp-step-check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="m9 12 2 2 4-4"></path>
                                </svg>
                            </div>
                            <div class="pp-step-badge">02</div>
                        </div>
                        <h3 class="pp-step-title">Chiến Lược</h3>
                        <p class="pp-step-subtitle">Strategy</p>
                    </div>
                    <div class="pp-step-connector"></div>
                </button>

                <!-- Step 3 -->
                <button class="pp-process-step" data-step="2">
                    <div class="pp-step-card">
                        <div class="pp-step-icon-wrapper">
                            <div class="pp-step-icon">
                                <span class="pp-step-emoji">🎨</span>
                                <svg class="pp-step-check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="m9 12 2 2 4-4"></path>
                                </svg>
                            </div>
                            <div class="pp-step-badge">03</div>
                        </div>
                        <h3 class="pp-step-title">Thiết Kế UI/UX</h3>
                        <p class="pp-step-subtitle">UI/UX Design</p>
                    </div>
                    <div class="pp-step-active-label">Active Step</div>
                    <div class="pp-step-connector"></div>
                </button>

                <!-- Step 4 -->
                <button class="pp-process-step" data-step="3">
                    <div class="pp-step-card">
                        <div class="pp-step-icon-wrapper">
                            <div class="pp-step-icon">
                                <span class="pp-step-emoji">⚡</span>
                                <svg class="pp-step-check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="m9 12 2 2 4-4"></path>
                                </svg>
                            </div>
                            <div class="pp-step-badge">04</div>
                        </div>
                        <h3 class="pp-step-title">Phát Triển</h3>
                        <p class="pp-step-subtitle">Development</p>
                    </div>
                    <div class="pp-step-active-label">Active Step</div>
                    <div class="pp-step-connector"></div>
                </button>

                <!-- Step 5 -->
                <button class="pp-process-step" data-step="4">
                    <div class="pp-step-card">
                        <div class="pp-step-icon-wrapper">
                            <div class="pp-step-icon">
                                <span class="pp-step-emoji">🔬</span>
                                <svg class="pp-step-check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="m9 12 2 2 4-4"></path>
                                </svg>
                            </div>
                            <div class="pp-step-badge">05</div>
                        </div>
                        <h3 class="pp-step-title">Kiểm Tra</h3>
                        <p class="pp-step-subtitle">Testing</p>
                    </div>
                    <div class="pp-step-active-label">Active Step</div>
                    <div class="pp-step-connector"></div>
                </button>

                <!-- Step 6 -->
                <button class="pp-process-step" data-step="5">
                    <div class="pp-step-card">
                        <div class="pp-step-icon-wrapper">
                            <div class="pp-step-icon">
                                <span class="pp-step-emoji">🚀</span>
                                <svg class="pp-step-check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="m9 12 2 2 4-4"></path>
                                </svg>
                            </div>
                            <div class="pp-step-badge">06</div>
                        </div>
                        <h3 class="pp-step-title">Ra Mắt & Tối Ưu</h3>
                        <p class="pp-step-subtitle">Launch & Optimize</p>
                    </div>
                    <div class="pp-step-active-label">Active Step</div>
                </button>
            </div>
        </div>

        <!-- Detail Panel -->
        <div class="pp-process-detail-panel">
            <div class="pp-detail-content">
                <!-- Left Column -->
                <div class="pp-detail-left">
                    <div class="pp-detail-header">
                        <div class="pp-detail-icon">
                            <span class="pp-detail-emoji">🎨</span>
                        </div>
                        <div>
                            <h3 class="pp-detail-title">Thiết Kế UI/UX</h3>
                            <p class="pp-detail-subtitle">UI/UX Design</p>
                        </div>
                    </div>
                    <p class="pp-detail-description">
                        Thiết kế theo hệ thống: component, typography, spacing, prototype để review nhanh, chuẩn và
                        sáng.
                    </p>
                    <div class="pp-detail-meta">
                        <div class="pp-detail-time">⏱️ <span>3-4 tuần</span></div>
                        <div class="pp-detail-step">Bước <span class="pp-detail-step-current">03</span> / 06</div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="pp-detail-right">
                    <h4 class="pp-detail-deliverables-title">
                        <span class="pp-detail-bullet">•</span> DELIVERABLES
                    </h4>
                    <div class="pp-deliverables-list">
                        <div class="pp-deliverable-item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                            <span>Moodboard & visual direction</span>
                        </div>
                        <div class="pp-deliverable-item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                            <span>Design system / UI kit</span>
                        </div>
                        <div class="pp-deliverable-item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                            <span>Prototype tương tác</span>
                        </div>
                        <div class="pp-deliverable-item">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                            <span>Handoff chuẩn dev</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Navigation -->
            <div class="pp-detail-footer">
                <button class="pp-nav-btn pp-nav-prev">
                    ← Bước Trước
                </button>

                <div class="pp-progress-dots">
                    <button class="pp-dot" data-dot="0"></button>
                    <button class="pp-dot" data-dot="1"></button>
                    <button class="pp-dot" data-dot="2"></button>
                    <button class="pp-dot" data-dot="3"></button>
                    <button class="pp-dot" data-dot="4"></button>
                    <button class="pp-dot" data-dot="5"></button>
                </div>

                <button class="pp-nav-btn pp-nav-next">
                    Bước Tiếp Theo →
                </button>
            </div>
        </div>

        <!-- CTA Bottom -->
        <div class="pp-process-cta">
            <p class="pp-cta-text">Sẵn sàng biến ý tưởng của bạn thành hiện thực với quy trình chuyên nghiệp?</p>
            <button class="pp-cta-button-main">
                Bắt Đầu Dự Án Ngay
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </button>
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

<section class="pp-contact-section">
    <!-- Top Gradient Fade -->
    <div class="pp-contact-gradient-top"></div>

    <!-- Bottom Gradient Fade -->
    <div class="pp-contact-gradient-bottom"></div>

    <!-- Background Effects -->
    <div class="pp-contact-bg-effects">
        <div class="pp-contact-blob-1"></div>
        <div class="pp-contact-blob-2"></div>
        <div class="pp-contact-grid-pattern"></div>
    </div>

    <div class="pp-contact-container">
        <!-- Header -->
        <div class="pp-contact-header">
            <div class="pp-contact-badge">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <path
                        d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z">
                    </path>
                    <path d="M20 3v4"></path>
                    <path d="M22 5h-4"></path>
                    <path d="M4 17v2"></path>
                    <path d="M5 18H3"></path>
                </svg>
                <span>Liên Hệ Ngay</span>
            </div>
            <h2 class="pp-contact-heading-line1">Khởi Đầu</h2>
            <h2 class="pp-contact-heading-line2">Dự Án Của Bạn</h2>
            <p class="pp-contact-description">
                Để lại thông tin và chúng tôi sẽ liên hệ trong vòng 24 giờ để tư vấn giải pháp phù hợp nhất cho doanh
                nghiệp của bạn.
            </p>
        </div>

        <!-- Content Grid -->
        <div class="pp-contact-grid">
            <!-- Left Column - Contact Info -->
            <div class="pp-contact-info">
                <div class="pp-contact-info-header">
                    <h3 class="pp-contact-info-title">Thông Tin Liên Hệ</h3>
                    <p class="pp-contact-info-subtitle">Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn.</p>
                </div>

                <div class="pp-contact-cards">
                    <!-- Email Card -->
                    <a href="mailto:hello@pixelperfect.vn" class="pp-contact-card">
                        <div class="pp-contact-card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                        </div>
                        <div class="pp-contact-card-content">
                            <div class="pp-contact-card-label">Email</div>
                            <div class="pp-contact-card-value">hello@pixelperfect.vn</div>
                        </div>
                        <svg class="pp-contact-card-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>

                    <!-- Phone Card -->
                    <a href="tel:+84123456789" class="pp-contact-card">
                        <div class="pp-contact-card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                        </div>
                        <div class="pp-contact-card-content">
                            <div class="pp-contact-card-label">Điện Thoại</div>
                            <div class="pp-contact-card-value">+84 (0) 123 456 789</div>
                        </div>
                        <svg class="pp-contact-card-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>

                    <!-- Address Card -->
                    <a href="#" class="pp-contact-card">
                        <div class="pp-contact-card-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                </path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="pp-contact-card-content">
                            <div class="pp-contact-card-label">Địa Chỉ</div>
                            <div class="pp-contact-card-value">Hồ Chí Minh, Việt Nam</div>
                        </div>
                        <svg class="pp-contact-card-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Response Time Box -->
                <div class="pp-contact-response-box">
                    <div class="pp-contact-response-header">
                        <div class="pp-contact-pulse-dot"></div>
                        <span class="pp-contact-response-label">Phản Hồi Nhanh</span>
                    </div>
                    <p class="pp-contact-response-text">
                        Chúng tôi cam kết phản hồi mọi yêu cầu trong vòng <span class="pp-contact-response-highlight">24
                            giờ</span> làm việc
                    </p>
                </div>
            </div>

            <!-- Right Column - Contact Form -->
            <div class="pp-contact-form-wrapper">
                <div class="pp-contact-form-container">
                    <div class="pp-contact-form-top-border"></div>

                    <form id="ppContactForm" class="pp-contact-form">
                        <!-- Row 1: Name & Email -->
                        <div class="pp-form-row">
                            <div class="pp-form-field">
                                <label for="pp-name" class="pp-form-label">Họ và Tên *</label>
                                <input type="text" id="pp-name" name="name" required class="pp-form-input">
                            </div>
                            <div class="pp-form-field">
                                <label for="pp-email" class="pp-form-label">Email *</label>
                                <input type="email" id="pp-email" name="email" required class="pp-form-input">
                            </div>
                        </div>

                        <!-- Row 2: Organization & Phone -->
                        <div class="pp-form-row">
                            <div class="pp-form-field">
                                <label for="pp-organization" class="pp-form-label">Tổ Chức / Công Ty</label>
                                <input type="text" id="pp-organization" name="organization" class="pp-form-input">
                            </div>
                            <div class="pp-form-field">
                                <label for="pp-phone" class="pp-form-label">Số Điện Thoại</label>
                                <input type="tel" id="pp-phone" name="phone" class="pp-form-input">
                            </div>
                        </div>

                        <!-- Row 3: Message -->
                        <div class="pp-form-field pp-form-field-full">
                            <label for="pp-message" class="pp-form-label">Nội Dung Tin Nhắn *</label>
                            <textarea id="pp-message" name="message" rows="5" required
                                class="pp-form-input pp-form-textarea"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="pp-form-submit">
                            <div class="pp-form-submit-gradient"></div>
                            <span class="pp-form-submit-content">
                                <span>Gửi Thông Tin</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z">
                                    </path>
                                    <path d="m21.854 2.147-10.94 10.939"></path>
                                </svg>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= section blog ==================== -->
<section class="blog-section">
    <!-- Gradient Overlays -->
    <div class="gradient-overlay-top"></div>
    <div class="gradient-overlay-bottom"></div>

    <!-- Background Blur Orbs -->
    <div class="blur-orbs">
        <div class="blur-orb blur-orb-1"></div>
        <div class="blur-orb blur-orb-2"></div>
    </div>

    <div class="container">
        <!-- Header -->
        <div class="blog-header">
            <div class="badge-wrapper">
                <span class="section-badge">Blog Kiến Thức</span>
            </div>
            <h2 class="section-title">
                KIẾN THỨC
                <span class="gradient-text">& XU HƯỚNG</span>
            </h2>
            <p class="section-description">
                Cập nhật thông tin, kiến thức, xu hướng mới nhất về thiết kế website và digital marketing
            </p>
        </div>

        <!-- Blog Cards Grid -->
        <div class="blog-grid">
            <!-- Card 1 -->
            <article class="blog-card" data-page="1">
                <div class="card-inner">
                    <div class="card-image">
                        <img src="https://v0-page-pp.vercel.app/modern-website-design-trends-2025-creative.jpg"
                            alt="Phong Trần Từ Đời Thực Vào Web Với Lee.H Leather">
                        <span class="category-badge">Case Study</span>
                    </div>

                    <div class="card-content">
                        <div class="author-info">
                            <img src="/avatar-1.png" alt="Phạm Văn Hải" class="author-avatar">
                            <div class="author-details">
                                <p class="author-name">Phạm Văn Hải</p>
                                <div class="meta-info">
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <path d="M8 2v4M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        10 Tháng 11, 2021
                                    </span>
                                    <span class="separator">•</span>
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        7 phút đọc
                                    </span>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title">Phong Trần Từ Đời Thực Vào Web Với Lee.H Leather</h4>
                        <p class="card-excerpt">Câu chuyện thành công về việc chuyển hóa thương hiệu leather thủ công
                            sang digital.</p>

                        <a href="#" class="read-more">
                            <span>Đọc Ngay</span>
                            <svg class="arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Card 2 -->
            <article class="blog-card" data-page="1">
                <div class="card-inner">
                    <div class="card-image">
                        <img src="https://v0-page-pp.vercel.app/business-team-discussing-website-on-computer-scree.jpg"
                            alt="Website CELEB ACADEMY - Câu Chuyện Thành Công">
                        <span class="category-badge">Case Study</span>
                    </div>

                    <div class="card-content">
                        <div class="author-info">
                            <img src="/avatar-2.png" alt="Võ Thị Mai" class="author-avatar">
                            <div class="author-details">
                                <p class="author-name">Võ Thị Mai</p>
                                <div class="meta-info">
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <path d="M8 2v4M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        18 Tháng 5, 2019
                                    </span>
                                    <span class="separator">•</span>
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        5 phút đọc
                                    </span>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title">Website CELEB ACADEMY - Câu Chuyện Thành Công</h4>
                        <p class="card-excerpt">Xây dựng nền tảng giáo dục online với thiết kế website hiện đại và trải
                            nghiệm tối ưu.</p>

                        <a href="#" class="read-more">
                            <span>Đọc Ngay</span>
                            <svg class="arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Card 3 -->
            <article class="blog-card" data-page="1">
                <div class="card-inner">
                    <div class="card-image">
                        <img src="https://v0-page-pp.vercel.app/construction-company-website-mockup-on-desktop-scr.jpg"
                            alt="Xu Hướng Thiết Kế Web 2025: Minimalism & AI">
                        <span class="category-badge">Xu Hướng</span>
                    </div>

                    <div class="card-content">
                        <div class="author-info">
                            <img src="/avatar-3.png" alt="Đặng Quốc Bảo" class="author-avatar">
                            <div class="author-details">
                                <p class="author-name">Đặng Quốc Bảo</p>
                                <div class="meta-info">
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <path d="M8 2v4M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        05 Tháng 1, 2025
                                    </span>
                                    <span class="separator">•</span>
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        9 phút đọc
                                    </span>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title">Xu Hướng Thiết Kế Web 2025: Minimalism & AI</h4>
                        <p class="card-excerpt">Khám phá những xu hướng thiết kế web mới nhất và cách áp dụng vào dự án
                            của bạn.</p>

                        <a href="#" class="read-more">
                            <span>Đọc Ngay</span>
                            <svg class="arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Card 4 - Page 2 -->
            <article class="blog-card" data-page="2" style="display: none;">
                <div class="card-inner">
                    <div class="card-image">
                        <img src="https://v0-page-pp.vercel.app/modern-website-design-trends-2025-creative.jpg"
                            alt="Điểm Danh Top 8 Công Ty Thiết Kế Website Hàng Đầu">
                        <span class="category-badge">Xu Hướng</span>
                    </div>

                    <div class="card-content">
                        <div class="author-info">
                            <img src="/avatar-1.png" alt="Nguyễn Minh Tuấn" class="author-avatar">
                            <div class="author-details">
                                <p class="author-name">Nguyễn Minh Tuấn</p>
                                <div class="meta-info">
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <path d="M8 2v4M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        03 Tháng 3, 2021
                                    </span>
                                    <span class="separator">•</span>
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        8 phút đọc
                                    </span>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title">Điểm Danh Top 8 Công Ty Thiết Kế Website Hàng Đầu Hiện Nay Tại Việt Nam
                        </h4>
                        <p class="card-excerpt">Website được xem là công cụ hàng đầu cực kỳ quan trọng để khách hàng tìm
                            kiếm và biết thông tin về sản phẩm.</p>

                        <a href="#" class="read-more">
                            <span>Đọc Ngay</span>
                            <svg class="arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Card 5 - Page 2 -->
            <article class="blog-card" data-page="2" style="display: none;">
                <div class="card-inner">
                    <div class="card-image">
                        <img src="https://v0-page-pp.vercel.app/responsive-website-design-shown-on-multiple-device.jpg"
                            alt="Bí Quyết Thiết Kế Website Bán Thực Phẩm Cao Cấp">
                        <span class="category-badge">Hướng Dẫn</span>
                    </div>

                    <div class="card-content">
                        <div class="author-info">
                            <img src="/avatar-2.png" alt="Trần Thị Lan" class="author-avatar">
                            <div class="author-details">
                                <p class="author-name">Trần Thị Lan</p>
                                <div class="meta-info">
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <path d="M8 2v4M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        15 Tháng 2, 2021
                                    </span>
                                    <span class="separator">•</span>
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        5 phút đọc
                                    </span>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title">Bí Quyết Thiết Kế Website Bán Thực Phẩm Cao Cấp</h4>
                        <p class="card-excerpt">Khám phá những chiến lược thiết kế website chuyên nghiệp cho ngành thực
                            phẩm cao cấp.</p>

                        <a href="#" class="read-more">
                            <span>Đọc Ngay</span>
                            <svg class="arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Card 6 - Page 2 -->
            <article class="blog-card" data-page="2" style="display: none;">
                <div class="card-inner">
                    <div class="card-image">
                        <img src="https://v0-page-pp.vercel.app/modern-tech-company-website-mockup-on-laptop-scree.jpg"
                            alt="5 Khóa Học Thiết Kế Website Online Đỉnh Chóp">
                        <span class="category-badge">Giáo Dục</span>
                    </div>

                    <div class="card-content">
                        <div class="author-info">
                            <img src="/avatar-3.png" alt="Lê Hoàng Nam" class="author-avatar">
                            <div class="author-details">
                                <p class="author-name">Lê Hoàng Nam</p>
                                <div class="meta-info">
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <path d="M8 2v4M16 2v4"></path>
                                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                            <path d="M3 10h18"></path>
                                        </svg>
                                        22 Tháng 9, 2021
                                    </span>
                                    <span class="separator">•</span>
                                    <span class="meta-item">
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        6 phút đọc
                                    </span>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title">5 Khóa Học Thiết Kế Website Online Đỉnh Chóp</h4>
                        <p class="card-excerpt">Tổng hợp các khóa học thiết kế website online chất lượng cao, phù hợp
                            cho mọi trình độ.</p>

                        <a href="#" class="read-more">
                            <span>Đọc Ngay</span>
                            <svg class="arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <button class="pagination-btn prev-btn" disabled>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m15 18-6-6 6-6"></path>
                </svg>
            </button>

            <div class="pagination-dots">
                <button class="dot"></button>
                <button class="dot active"></button>
            </div>

            <button class="pagination-btn next-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </button>
        </div>

        <!-- View All Button -->
        <div class="view-all-wrapper">
            <button class="view-all-btn">
                <span>Xem Tất Cả Bài Viết</span>
                <svg class="arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
                <div class="btn-overlay"></div>
            </button>
        </div>
    </div>
</section>

<!-- SECTION FAQ: GÓC HỎI ĐÁP - HTML -->
<section class="faq-section">
    <!-- Top Gradient Overlay -->
    <div class="gradient-overlay-top"></div>

    <!-- Bottom Gradient Overlay -->
    <div class="gradient-overlay-bottom"></div>

    <div class="faq-container">
        <div class="faq-grid">

            <!-- Left Column: Images -->
            <div class="faq-image-wrapper">
                <div class="faq-images">
                    <!-- Image 1 - VỀ WEBSITE -->
                    <div class="faq-image" data-tab="website">
                        <img src="https://v0-page-pp.vercel.app/faq-mockup.png" alt="FAQ Website">
                    </div>

                    <!-- Image 2 - VỀ PIXEL PERFECT -->
                    <div class="faq-image" data-tab="pixelperfect">
                        <img src="https://v0-page-pp.vercel.app/office-lobby.webp" alt="FAQ Pixel Perfect">
                    </div>

                    <!-- Image 3 - CHÍNH SÁCH (Active by default) -->
                    <div class="faq-image active" data-tab="policy">
                        <img src="https://v0-page-pp.vercel.app/modern-website-design-trends-2025-creative.jpg"
                            alt="FAQ Chính Sách">
                    </div>
                </div>
            </div>

            <!-- Right Column: Content -->
            <div class="faq-content">

                <!-- Header -->
                <div class="faq-header">
                    <h2 class="faq-title">
                        GÓC <span class="gradient-text">HỎI ĐÁP</span>
                    </h2>
                    <p class="faq-description">
                        Bạn băn khoăn về quy trình thiết kế website tại Pixel Perfect, chúng tôi luôn sẵn sàng giải đáp.
                    </p>
                </div>

                <!-- Tabs Navigation -->
                <div class="faq-tabs">
                    <button class="tab-btn" data-tab="website">
                        <div class="tab-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                <path d="M2 12h20"></path>
                            </svg>
                        </div>
                        <span>VỀ WEBSITE</span>
                    </button>

                    <button class="tab-btn" data-tab="pixelperfect">
                        <div class="tab-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z">
                                </path>
                                <path d="M20 3v4"></path>
                                <path d="M22 5h-4"></path>
                                <path d="M4 17v2"></path>
                                <path d="M5 18H3"></path>
                            </svg>
                        </div>
                        <span>VỀ PIXEL PERFECT</span>
                    </button>

                    <button class="tab-btn active" data-tab="policy">
                        <div class="tab-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z">
                                </path>
                            </svg>
                        </div>
                        <span>CHÍNH SÁCH</span>
                        <div class="tab-underline"></div>
                    </button>
                </div>

                <!-- FAQ Accordions Container -->
                <div class="faq-accordions">

                    <!-- FAQs - VỀ WEBSITE -->
                    <div class="faq-group" data-tab="website">
                        <div class="faq-item">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Thời gian thiết kế website mất bao lâu?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Thời gian thiết kế website thường dao động từ 2-8 tuần tùy vào độ phức tạp của
                                        dự án. Website cơ bản có thể hoàn thành trong 2-3 tuần, trong khi các dự án phức
                                        tạp có thể mất 6-8 tuần.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Website có responsive trên mobile không?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Tất cả website của chúng tôi đều được thiết kế responsive 100%, tối ưu hoàn hảo
                                        trên mọi thiết bị từ desktop, tablet đến smartphone. Giao diện tự động điều
                                        chỉnh để mang lại trải nghiệm tốt nhất.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Chi phí thiết kế website là bao nhiêu?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Chi phí thiết kế website dao động từ 15-50 triệu VNĐ tùy thuộc vào quy mô và
                                        tính năng. Website giới thiệu cơ bản từ 15-25 triệu, website bán hàng từ 30-50
                                        triệu. Chúng tôi luôn báo giá minh bạch và chi tiết.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Có được tự quản trị nội dung sau khi bàn giao?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Hoàn toàn có thể! Chúng tôi sử dụng CMS WordPress giúp bạn dễ dàng tự cập nhật
                                        nội dung, hình ảnh, sản phẩm. Đội ngũ sẽ hướng dẫn chi tiết và cung cấp tài liệu
                                        sử dụng đầy đủ.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQs - VỀ PIXEL PERFECT -->
                    <div class="faq-group" data-tab="pixelperfect">
                        <div class="faq-item">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Pixel Perfect đã hoạt động được bao lâu?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Pixel Perfect Agency đã có hơn 10 năm kinh nghiệm trong lĩnh vực thiết kế và
                                        phát triển website. Chúng tôi tự hào đã đồng hành cùng hơn 500+ doanh nghiệp
                                        trong và ngoài nước.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Đội ngũ của Pixel Perfect gồm những ai?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Đội ngũ của chúng tôi bao gồm các chuyên gia UI/UX Designer, Front-end/Back-end
                                        Developer, Project Manager, và Content Strategist. Tất cả đều có kinh nghiệm từ
                                        5-10 năm trong ngành.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Pixel Perfect đã làm việc với những ngành nghề nào?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Chúng tôi đã có kinh nghiệm làm việc với hơn 25+ ngành nghề khác nhau bao gồm:
                                        Bất động sản, E-commerce, Giáo dục, Y tế, F&B, Du lịch, Tài chính, và nhiều lĩnh
                                        vực khác.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Làm sao để liên hệ với Pixel Perfect?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Bạn có thể liên hệ với chúng tôi qua hotline 1900 xxxx, email
                                        contact@pixelperfect.vn, hoặc ghé thăm văn phòng tại 123 Nguyễn Huệ, Q.1,
                                        TP.HCM. Đội ngũ luôn sẵn sàng tư vấn 24/7.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQs - CHÍNH SÁCH (Active by default) -->
                    <div class="faq-group active" data-tab="policy">
                        <div class="faq-item active">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Chính sách bảo hành website như thế nào?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Pixel Perfect cung cấp chính sách bảo hành 12 tháng cho tất cả các dự án. Trong
                                        thời gian này, mọi lỗi kỹ thuật sẽ được khắc phục miễn phí.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Chính sách thanh toán ra sao?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Chúng tôi áp dụng chính sách thanh toán linh hoạt: 40% khi ký hợp đồng, 30% khi
                                        hoàn thành giao diện, 30% khi bàn giao website.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Có hỗ trợ sau khi bàn giao website không?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Có, chúng tôi cung cấp hỗ trợ kỹ thuật miễn phí trong thời gian bảo hành. Sau
                                        đó, bạn có thể đăng ký gói bảo trì theo tháng hoặc năm.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question-wrapper">
                                <div class="hover-line"></div>
                                <button class="faq-question" type="button">
                                    <span>Quyền sở hữu website thuộc về ai?</span>
                                    <div class="faq-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </div>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        Sau khi thanh toán đầy đủ, quyền sở hữu hoàn toàn thuộc về khách hàng. Chúng tôi
                                        sẽ bàn giao toàn bộ source code và tài liệu liên quan.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>