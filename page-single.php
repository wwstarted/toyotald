<?php
/**
 * Template Name: Toyota Product Detail
 * Description: Trang chi tiết sản phẩm xe Toyota - Modern & Trending Design
 */
get_header(); ?>

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav class="breadcrumb-nav">
            <a href="/">Trang chủ</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="/xe-toyota">Xe Toyota</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span>Toyota Corolla Cross</span>
        </nav>
    </div>
</section>

<!-- Product Hero Section -->
<section class="product-hero">
    <div class="container">
        <div class="product-hero-grid">
            <!-- Left: Image Gallery -->
            <div class="product-gallery">
                <div class="gallery-badges">
                    <span class="badge badge-hot">
                        <i class="fa-solid fa-fire"></i> Hot
                    </span>
                    <span class="badge badge-promo">
                        <i class="fa-solid fa-gift"></i> -30 triệu
                    </span>
                </div>

                <!-- Main Image -->
                <div class="gallery-main">
                    <div class="main-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=800&h=600&fit=crop"
                            alt="Toyota Corolla Cross" class="main-image active" data-index="0">
                        <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800&h=600&fit=crop"
                            alt="Toyota Corolla Cross" class="main-image" data-index="1">
                        <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=800&h=600&fit=crop"
                            alt="Toyota Corolla Cross" class="main-image" data-index="2">
                        <img src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=800&h=600&fit=crop"
                            alt="Toyota Corolla Cross" class="main-image" data-index="3">
                    </div>

                    <!-- Gallery Navigation -->
                    <button class="gallery-nav gallery-prev">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="gallery-nav gallery-next">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Thumbnails -->
                <div class="gallery-thumbnails">
                    <div class="thumbnail active" data-index="0">
                        <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=150&h=100&fit=crop"
                            alt="Thumb 1">
                    </div>
                    <div class="thumbnail" data-index="1">
                        <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=150&h=100&fit=crop"
                            alt="Thumb 2">
                    </div>
                    <div class="thumbnail" data-index="2">
                        <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=150&h=100&fit=crop"
                            alt="Thumb 3">
                    </div>
                    <div class="thumbnail" data-index="3">
                        <img src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=150&h=100&fit=crop"
                            alt="Thumb 4">
                    </div>
                </div>
            </div>

            <!-- Right: Quick Info Card (NO STICKY) -->
            <div class="product-quick-info">
                <div class="product-info-card">
                    <h1 class="product-name">Toyota Corolla Cross</h1>
                    <div class="product-subtitle">Crossover thông minh, đa dụng</div>

                    <div class="product-price-box">
                        <div class="price-label">Giá từ:</div>
                        <div class="price-value">820 triệu</div>
                        <div class="price-note">* Giá đã bao gồm VAT</div>
                    </div>

                    <!-- Key Specs -->
                    <div class="key-specs">
                        <div class="spec-item">
                            <i class="fa-solid fa-gauge-high"></i>
                            <div class="spec-content">
                                <div class="spec-label">Động cơ</div>
                                <div class="spec-value">1.8L</div>
                            </div>
                        </div>
                        <div class="spec-item">
                            <i class="fa-solid fa-gears"></i>
                            <div class="spec-content">
                                <div class="spec-label">Hộp số</div>
                                <div class="spec-value">CVT</div>
                            </div>
                        </div>
                        <div class="spec-item">
                            <i class="fa-solid fa-gas-pump"></i>
                            <div class="spec-content">
                                <div class="spec-label">Nhiên liệu</div>
                                <div class="spec-value">6.5L/100km</div>
                            </div>
                        </div>
                        <div class="spec-item">
                            <i class="fa-solid fa-users"></i>
                            <div class="spec-content">
                                <div class="spec-label">Số chỗ</div>
                                <div class="spec-value">5 chỗ</div>
                            </div>
                        </div>
                    </div>

                    <!-- Promo Banner -->
                    <div class="promo-banner">
                        <i class="fa-solid fa-gift"></i>
                        <div class="promo-text">
                            <strong>Ưu đãi đặc biệt:</strong> Giảm 30 triệu + Phụ kiện chính hãng
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="cta-buttons">
                        <a href="#contact-form" class="btn btn-primary btn-lg btn-block">
                            <i class="fa-solid fa-paper-plane"></i> Nhận báo giá
                        </a>
                        <a href="#" class="btn btn-secondary btn-lg btn-block">
                            <i class="fa-solid fa-car"></i> Đăng ký lái thử
                        </a>
                    </div>

                    <!-- Quick Contact -->
                    <div class="quick-contact">
                        <div class="contact-item">
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:0943231614">094 323 1614</a>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-comment-dots"></i>
                            <a href="https://zalo.me/0943231614" target="_blank">Chat Zalo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sticky Tabs Navigation -->
<div class="product-tabs-nav" id="productTabsNav">
    <div class="container">
        <div class="tabs-wrapper">
            <a href="#pricing" class="tab-link active">
                <i class="fa-solid fa-tags"></i>
                <span>Bảng giá</span>
            </a>
            <a href="#overview" class="tab-link">
                <i class="fa-solid fa-circle-info"></i>
                <span>Tổng quan</span>
            </a>
            <a href="#exterior" class="tab-link">
                <i class="fa-solid fa-car-side"></i>
                <span>Ngoại thất</span>
            </a>
            <a href="#interior" class="tab-link">
                <i class="fa-solid fa-couch"></i>
                <span>Nội thất</span>
            </a>
            <a href="#performance" class="tab-link">
                <i class="fa-solid fa-gauge"></i>
                <span>Vận hành</span>
            </a>
            <a href="#specs" class="tab-link">
                <i class="fa-solid fa-list-check"></i>
                <span>Thông số</span>
            </a>
            <a href="#gallery" class="tab-link">
                <i class="fa-solid fa-images"></i>
                <span>Hình ảnh</span>
            </a>
        </div>
    </div>
</div>

<!-- Simple Price Table Section -->
<section class="simple-price-section section" id="pricing">
    <div class="container">
        <div class="section-header">
            <h2>Bảng Giá Xe Toyota Corolla Cross</h2>
            <div class="section-divider"></div>
            <p>Giá niêm yết chính thức từ Toyota</p>
        </div>

        <div class="simple-price-table">
            <table>
                <thead>
                    <tr>
                        <th>Phiên Bản</th>
                        <th>Giá Xe</th>
                        <th>Khuyến Mãi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Corolla Cross 1.8G</strong></td>
                        <td class="price">820.000.000 ₫</td>
                        <td><span class="discount-badge">-30 triệu</span></td>
                    </tr>
                    <tr class="featured-row">
                        <td><strong>Corolla Cross 1.8V</strong> <span class="popular-tag">Phổ biến</span></td>
                        <td class="price">890.000.000 ₫</td>
                        <td><span class="discount-badge">-30 triệu</span></td>
                    </tr>
                    <tr>
                        <td><strong>Corolla Cross 1.8 HEV</strong></td>
                        <td class="price">913.000.000 ₫</td>
                        <td><span class="discount-badge">-30 triệu</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Pricing Cards Section -->
<section class="pricing-section section bg-light">
    <div class="container">
        <div class="section-header">
            <h2>So Sánh Các Phiên Bản</h2>
            <div class="section-divider"></div>
            <p>Chọn phiên bản phù hợp với nhu cầu của bạn</p>
        </div>

        <div class="pricing-cards">
            <!-- Pricing Card 1 -->
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>1.8G</h3>
                    <div class="pricing-subtitle">Bản tiêu chuẩn</div>
                </div>
                <div class="pricing-price">
                    <span class="price">820 triệu</span>
                </div>
                <ul class="pricing-features">
                    <li><i class="fa-solid fa-check"></i> Động cơ 1.8L</li>
                    <li><i class="fa-solid fa-check"></i> Hộp số CVT</li>
                    <li><i class="fa-solid fa-check"></i> 7 túi khí</li>
                    <li><i class="fa-solid fa-check"></i> Màn hình 9 inch</li>
                    <li><i class="fa-solid fa-check"></i> Camera lùi</li>
                    <li><i class="fa-solid fa-check"></i> Cảm biến lùi</li>
                </ul>
                <a href="#contact-form" class="btn btn-outline btn-block">Chọn phiên bản này</a>
            </div>

            <!-- Pricing Card 2 - Recommended -->
            <div class="pricing-card recommended">
                <div class="recommended-badge">Phổ biến nhất</div>
                <div class="pricing-header">
                    <h3>1.8V</h3>
                    <div class="pricing-subtitle">Bản cao cấp</div>
                </div>
                <div class="pricing-price">
                    <span class="price">890 triệu</span>
                </div>
                <ul class="pricing-features">
                    <li><i class="fa-solid fa-check"></i> Tất cả tính năng 1.8G</li>
                    <li><i class="fa-solid fa-check"></i> Màn hình 10.1 inch</li>
                    <li><i class="fa-solid fa-check"></i> Camera 360°</li>
                    <li><i class="fa-solid fa-check"></i> Cửa sổ trời</li>
                    <li><i class="fa-solid fa-check"></i> Ghế da cao cấp</li>
                    <li><i class="fa-solid fa-check"></i> Đèn LED full</li>
                    <li><i class="fa-solid fa-check"></i> Cruise control</li>
                </ul>
                <a href="#contact-form" class="btn btn-primary btn-block">Chọn phiên bản này</a>
            </div>

            <!-- Pricing Card 3 -->
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>1.8 HEV</h3>
                    <div class="pricing-subtitle">Bản Hybrid</div>
                </div>
                <div class="pricing-price">
                    <span class="price">913 triệu</span>
                </div>
                <ul class="pricing-features">
                    <li><i class="fa-solid fa-check"></i> Tất cả tính năng 1.8V</li>
                    <li><i class="fa-solid fa-check"></i> Động cơ Hybrid</li>
                    <li><i class="fa-solid fa-check"></i> Tiết kiệm 40% nhiên liệu</li>
                    <li><i class="fa-solid fa-check"></i> Toyota Safety Sense</li>
                    <li><i class="fa-solid fa-check"></i> Tự động giữ làn</li>
                    <li><i class="fa-solid fa-check"></i> Phanh tay điện tử</li>
                </ul>
                <a href="#contact-form" class="btn btn-outline btn-block">Chọn phiên bản này</a>
            </div>
        </div>
    </div>
</section>

<!-- Calculator Section -->
<section class="calculator-section section">
    <div class="container">
        <div class="section-header">
            <h2>Công Cụ Tính Toán</h2>
            <div class="section-divider"></div>
            <p>Tính toán chi phí mua xe và trả góp</p>
        </div>

        <!-- Calculator Tabs -->
        <div class="calculator-tabs">
            <button class="calc-tab-btn active" data-calc="registration">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <span>Phí lăn bánh</span>
            </button>
            <button class="calc-tab-btn" data-calc="loan">
                <i class="fa-solid fa-hand-holding-dollar"></i>
                <span>Trả góp</span>
            </button>
        </div>

        <!-- Registration Fee Calculator -->
        <div class="calc-content active" id="calc-registration">
            <div class="calc-grid">
                <div class="calc-inputs">
                    <div class="form-group">
                        <label>Chọn phiên bản xe</label>
                        <select id="carVersion" class="calc-select">
                            <option value="820000000">Corolla Cross 1.8G - 820 triệu</option>
                            <option value="890000000">Corolla Cross 1.8V - 890 triệu</option>
                            <option value="913000000">Corolla Cross 1.8 HEV - 913 triệu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nơi đăng ký</label>
                        <select id="registrationLocation" class="calc-select">
                            <option value="lamdong">Lâm Đồng</option>
                            <option value="daklak">Đắk Lắk</option>
                            <option value="hcm">TP. Hồ Chí Minh</option>
                        </select>
                    </div>

                    <button class="btn btn-primary btn-block" onclick="calculateRegistration()">
                        <i class="fa-solid fa-calculator"></i> Tính toán
                    </button>
                </div>

                <div class="calc-results">
                    <h3>Chi phí dự toán</h3>
                    <div class="result-table">
                        <div class="result-row">
                            <span>Giá xe:</span>
                            <strong id="result-car-price">820.000.000 ₫</strong>
                        </div>
                        <div class="result-row">
                            <span>Phí trước bạ (10%):</span>
                            <strong id="result-registration-fee">82.000.000 ₫</strong>
                        </div>
                        <div class="result-row">
                            <span>Phí đăng ký biển số:</span>
                            <strong>20.000.000 ₫</strong>
                        </div>
                        <div class="result-row">
                            <span>Bảo hiểm vật chất (1.5%):</span>
                            <strong id="result-insurance">12.300.000 ₫</strong>
                        </div>
                        <div class="result-row">
                            <span>Bảo hiểm bắt buộc:</span>
                            <strong>480.000 ₫</strong>
                        </div>
                        <div class="result-row">
                            <span>Phí đường bộ:</span>
                            <strong>1.560.000 ₫</strong>
                        </div>
                        <div class="result-row">
                            <span>Đăng kiểm:</span>
                            <strong>140.000 ₫</strong>
                        </div>
                        <div class="result-row total">
                            <span>Tổng chi phí:</span>
                            <strong id="result-total">936.480.000 ₫</strong>
                        </div>
                    </div>
                    <div class="result-note">
                        * Chi phí trên là dự toán, có thể thay đổi tùy theo từng tỉnh thành
                    </div>
                </div>
            </div>
        </div>

        <!-- Loan Calculator -->
        <div class="calc-content" id="calc-loan">
            <div class="calc-grid">
                <div class="calc-inputs">
                    <div class="form-group">
                        <label>Giá xe</label>
                        <input type="text" id="loanCarPrice" value="820.000.000" readonly class="calc-input">
                    </div>

                    <div class="form-group">
                        <label>Số tiền vay: <span id="loanAmountDisplay">656.000.000 ₫</span></label>
                        <input type="range" id="loanPercentage" min="0" max="80" value="80" class="calc-slider">
                        <div class="slider-labels">
                            <span>0%</span>
                            <span>80%</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Thời gian vay: <span id="loanTermDisplay">5 năm</span></label>
                        <input type="range" id="loanTerm" min="1" max="7" value="5" class="calc-slider">
                        <div class="slider-labels">
                            <span>1 năm</span>
                            <span>7 năm</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Lãi suất: <span id="interestRateDisplay">7.99%/năm</span></label>
                        <input type="range" id="interestRate" min="6" max="12" value="7.99" step="0.01"
                            class="calc-slider">
                        <div class="slider-labels">
                            <span>6%</span>
                            <span>12%</span>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block" onclick="calculateLoan()">
                        <i class="fa-solid fa-calculator"></i> Tính toán
                    </button>
                </div>

                <div class="calc-results">
                    <h3>Kết quả trả góp</h3>
                    <div class="loan-summary">
                        <div class="loan-item">
                            <div class="loan-label">Trả trước</div>
                            <div class="loan-value" id="loan-downpayment">164.000.000 ₫</div>
                        </div>
                        <div class="loan-item highlight">
                            <div class="loan-label">Trả hàng tháng</div>
                            <div class="loan-value" id="loan-monthly">12.500.000 ₫</div>
                        </div>
                        <div class="loan-item">
                            <div class="loan-label">Tổng lãi phải trả</div>
                            <div class="loan-value" id="loan-interest">94.000.000 ₫</div>
                        </div>
                        <div class="loan-item">
                            <div class="loan-label">Tổng tiền phải trả</div>
                            <div class="loan-value" id="loan-total">750.000.000 ₫</div>
                        </div>
                    </div>
                    <div class="result-note">
                        * Lãi suất có thể thay đổi tùy theo chương trình của ngân hàng
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="content-section section bg-light" id="overview">
    <div class="container">
        <div class="section-header">
            <h2>Tổng Quan Toyota Corolla Cross</h2>
            <div class="section-divider"></div>
        </div>

        <div class="overview-grid">
            <div class="overview-text">
                <p>Toyota Corolla Cross là mẫu crossover cỡ B+ được phát triển trên nền tảng TNGA-C, kết hợp hoàn hảo
                    giữa thiết kế năng động, công nghệ hiện đại và hiệu suất vận hành ấn tượng.</p>

                <p>Với thiết kế ngoại thất mạnh mẽ, nội thất rộng rãi và trang bị công nghệ an toàn tiên tiến Toyota
                    Safety Sense, Corolla Cross đáp ứng mọi nhu cầu của khách hàng Việt Nam.</p>

                <div class="highlight-features">
                    <div class="highlight-item">
                        <i class="fa-solid fa-shield-halved"></i>
                        <div>
                            <h4>An toàn hàng đầu</h4>
                            <p>Toyota Safety Sense với 7 túi khí</p>
                        </div>
                    </div>
                    <div class="highlight-item">
                        <i class="fa-solid fa-leaf"></i>
                        <div>
                            <h4>Tiết kiệm nhiên liệu</h4>
                            <p>Công nghệ Hybrid tiết kiệm 40%</p>
                        </div>
                    </div>
                    <div class="highlight-item">
                        <i class="fa-solid fa-star"></i>
                        <div>
                            <h4>Thiết kế hiện đại</h4>
                            <p>Ngoại thất thể thao, nội thất sang trọng</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overview-image">
                <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=600&h=400&fit=crop"
                    alt="Toyota Corolla Cross Overview">
            </div>
        </div>
    </div>
</section>

<!-- Exterior Section -->
<section class="content-section section" id="exterior">
    <div class="container">
        <div class="section-header">
            <h2>Ngoại Thất Toyota Corolla Cross</h2>
            <div class="section-divider"></div>
            <p>Thiết kế mạnh mẽ, thể thao và hiện đại</p>
        </div>

        <div class="feature-showcase">
            <div class="feature-item">
                <div class="feature-image">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=600&h=400&fit=crop"
                        alt="Lưới tản nhiệt">
                </div>
                <div class="feature-content">
                    <h3>Lưới Tản Nhiệt Sang Trọng</h3>
                    <p>Lưới tản nhiệt dạng tổ ong tràn viền, thiết kế hoàn toàn mới mang đậm dấu ấn Lexus, tạo nên vẻ
                        ngoài sang trọng và đẳng cấp cho xe.</p>
                    <ul class="feature-list">
                        <li><i class="fa-solid fa-check"></i> Thiết kế tổ ong tràn viền</li>
                        <li><i class="fa-solid fa-check"></i> Viền chrome sáng bóng</li>
                        <li><i class="fa-solid fa-check"></i> Logo Toyota nổi bật</li>
                    </ul>
                </div>
            </div>

            <div class="feature-item reverse">
                <div class="feature-image">
                    <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=600&h=400&fit=crop"
                        alt="Đèn LED">
                </div>
                <div class="feature-content">
                    <h3>Hệ Thống Đèn LED Tiên Tiến</h3>
                    <p>Cụm đèn LED Crystallized với thiết kế sắc sảo, đèn báo rẽ dạng dòng chảy tạo hình trẻ trung, hiện
                        đại nhưng không kém phần sang trọng.</p>
                    <ul class="feature-list">
                        <li><i class="fa-solid fa-check"></i> Đèn pha LED Crystallized</li>
                        <li><i class="fa-solid fa-check"></i> Đèn báo rẽ dạng dòng chảy</li>
                        <li><i class="fa-solid fa-check"></i> Đèn hậu LED mềm mỏng</li>
                    </ul>
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-image">
                    <img src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=600&h=400&fit=crop"
                        alt="La-zăng">
                </div>
                <div class="feature-content">
                    <h3>La-Zăng Hợp Kim 18 Inch</h3>
                    <p>Bộ la-zăng 18 inch với thiết kế thể thao, viền đen bóng mang đến vẻ cứng cáp mạnh mẽ cho chiếc
                        xe.</p>
                    <ul class="feature-list">
                        <li><i class="fa-solid fa-check"></i> Kích thước 18 inch</li>
                        <li><i class="fa-solid fa-check"></i> Thiết kế đa chấu thể thao</li>
                        <li><i class="fa-solid fa-check"></i> Ốp viền đen bóng</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Color Options -->
        <div class="color-section">
            <h3 class="text-center">Bảng Màu Ngoại Thất</h3>
            <div class="color-options">
                <div class="color-item">
                    <div class="color-swatch" style="background: #1a1a1a;"></div>
                    <span>Đen</span>
                </div>
                <div class="color-item">
                    <div class="color-swatch" style="background: #f5f5f5;"></div>
                    <span>Trắng Ngọc Trai</span>
                </div>
                <div class="color-item">
                    <div class="color-swatch" style="background: #c0c0c0;"></div>
                    <span>Bạc</span>
                </div>
                <div class="color-item">
                    <div class="color-swatch" style="background: #8b8b8b;"></div>
                    <span>Xám</span>
                </div>
                <div class="color-item">
                    <div class="color-swatch" style="background: #b71c1c;"></div>
                    <span>Đỏ</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interior Section -->
<section class="content-section section bg-light" id="interior">
    <div class="container">
        <div class="section-header">
            <h2>Nội Thất Toyota Corolla Cross</h2>
            <div class="section-divider"></div>
            <p>Không gian rộng rãi, sang trọng và tiện nghi</p>
        </div>

        <div class="interior-grid">
            <div class="interior-main-image">
                <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=800&h=500&fit=crop"
                    alt="Nội thất Corolla Cross">
            </div>

            <div class="interior-features">
                <div class="interior-feature-item">
                    <div class="feature-icon">
                        <i class="fa-solid fa-tv"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Màn Hình Cảm Ứng</h4>
                        <p>Màn hình 10.1 inch hiển thị sắc nét, hỗ trợ Apple CarPlay & Android Auto</p>
                    </div>
                </div>

                <div class="interior-feature-item">
                    <div class="feature-icon">
                        <i class="fa-solid fa-wind"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Điều Hòa 2 Vùng</h4>
                        <p>Hệ thống điều hòa tự động 2 vùng độc lập với cửa gió hàng ghế sau</p>
                    </div>
                </div>

                <div class="interior-feature-item">
                    <div class="feature-icon">
                        <i class="fa-solid fa-couch"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Ghế Da Cao Cấp</h4>
                        <p>Ghế bọc da cao cấp, ghế lái chỉnh điện 8 hướng với nhớ vị trí</p>
                    </div>
                </div>

                <div class="interior-feature-item">
                    <div class="feature-icon">
                        <i class="fa-solid fa-sun"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Cửa Sổ Trời Toàn Cảnh</h4>
                        <p>Cửa sổ trời panorama mang lại không gian thoáng đãng</p>
                    </div>
                </div>

                <div class="interior-feature-item">
                    <div class="feature-icon">
                        <i class="fa-solid fa-volume-high"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Âm Thanh Cao Cấp</h4>
                        <p>Hệ thống âm thanh 9 loa JBL mang đến trải nghiệm giải trí đỉnh cao</p>
                    </div>
                </div>

                <div class="interior-feature-item">
                    <div class="feature-icon">
                        <i class="fa-solid fa-suitcase"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Khoang Hành Lý 487L</h4>
                        <p>Khoang hành lý rộng rãi, ghế sau gập linh hoạt 60:40</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Performance Section -->
<section class="content-section section" id="performance">
    <div class="container">
        <div class="section-header">
            <h2>Vận Hành & Động Cơ</h2>
            <div class="section-divider"></div>
            <p>Hiệu suất mạnh mẽ, tiết kiệm nhiên liệu</p>
        </div>

        <div class="performance-grid">
            <div class="performance-card">
                <div class="performance-icon">
                    <i class="fa-solid fa-engine"></i>
                </div>
                <h3>Động Cơ 1.8L</h3>
                <div class="performance-stats">
                    <div class="stat">
                        <span class="stat-value">138</span>
                        <span class="stat-unit">mã lực</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value">172</span>
                        <span class="stat-unit">Nm</span>
                    </div>
                </div>
                <p>Động cơ xăng 1.8L Dual VVT-i kết hợp hộp số CVT mang lại khả năng vận hành mượt mà và tiết kiệm nhiên
                    liệu.</p>
            </div>

            <div class="performance-card highlight">
                <div class="performance-icon">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <h3>Hybrid 1.8L</h3>
                <div class="performance-stats">
                    <div class="stat">
                        <span class="stat-value">170</span>
                        <span class="stat-unit">mã lực</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value">305</span>
                        <span class="stat-unit">Nm</span>
                    </div>
                </div>
                <p>Hệ thống Hybrid kết hợp động cơ xăng và mô-tơ điện, tiết kiệm nhiên liệu lên đến 40%, chỉ
                    3.01L/100km.</p>
            </div>

            <div class="performance-card">
                <div class="performance-icon">
                    <i class="fa-solid fa-gas-pump"></i>
                </div>
                <h3>Tiết Kiệm Nhiên Liệu</h3>
                <div class="performance-stats">
                    <div class="stat">
                        <span class="stat-value">6.5</span>
                        <span class="stat-unit">L/100km</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value">3.01</span>
                        <span class="stat-unit">L/100km (HEV)</span>
                    </div>
                </div>
                <p>Mức tiêu thụ nhiên liệu ấn tượng giúp tiết kiệm chi phí vận hành hàng ngày.</p>
            </div>
        </div>

        <div class="safety-features">
            <h3>Toyota Safety Sense</h3>
            <div class="safety-grid">
                <div class="safety-item">
                    <i class="fa-solid fa-car-burst"></i>
                    <h4>Cảnh Báo Va Chạm</h4>
                    <p>Hệ thống phanh khẩn cấp tự động PCS</p>
                </div>
                <div class="safety-item">
                    <i class="fa-solid fa-road"></i>
                    <h4>Hỗ Trợ Giữ Làn</h4>
                    <p>Cảnh báo và hỗ trợ giữ làn đường LDA/LTA</p>
                </div>
                <div class="safety-item">
                    <i class="fa-solid fa-gauge-high"></i>
                    <h4>Kiểm Soát Hành Trình</h4>
                    <p>Cruise control chủ động thích ứng DRCC</p>
                </div>
                <div class="safety-item">
                    <i class="fa-solid fa-lightbulb"></i>
                    <h4>Đèn Pha Thông Minh</h4>
                    <p>Tự động chuyển đổi đèn pha xa/gần AHB</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Specifications Section -->
<section class="content-section section bg-light" id="specs">
    <div class="container">
        <div class="section-header">
            <h2>Thông Số Kỹ Thuật</h2>
            <div class="section-divider"></div>
        </div>

        <div class="specs-table-wrapper">
            <table class="specs-table">
                <thead>
                    <tr>
                        <th>Thông số</th>
                        <th>1.8G</th>
                        <th>1.8V</th>
                        <th>1.8 HEV</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Kích thước</strong></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td>Dài x Rộng x Cao (mm)</td>
                        <td colspan="3">4,460 x 1,825 x 1,620</td>
                    </tr>
                    <tr>
                        <td>Chiều dài cơ sở (mm)</td>
                        <td colspan="3">2,640</td>
                    </tr>
                    <tr>
                        <td>Khoảng sáng gầm (mm)</td>
                        <td colspan="3">161</td>
                    </tr>
                    <tr>
                        <td><strong>Động cơ</strong></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td>Loại động cơ</td>
                        <td colspan="2">1.8L VVT-i</td>
                        <td>1.8L Hybrid</td>
                    </tr>
                    <tr>
                        <td>Công suất (HP)</td>
                        <td colspan="2">138</td>
                        <td>170</td>
                    </tr>
                    <tr>
                        <td>Mô-men xoắn (Nm)</td>
                        <td colspan="2">172</td>
                        <td>305</td>
                    </tr>
                    <tr>
                        <td>Hộp số</td>
                        <td colspan="3">CVT</td>
                    </tr>
                    <tr>
                        <td>Nhiên liệu tiêu thụ (L/100km)</td>
                        <td colspan="2">6.5</td>
                        <td>3.01</td>
                    </tr>
                    <tr>
                        <td><strong>Trang bị</strong></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td>Màn hình</td>
                        <td>9 inch</td>
                        <td colspan="2">10.1 inch</td>
                    </tr>
                    <tr>
                        <td>Camera</td>
                        <td>Camera lùi</td>
                        <td colspan="2">Camera 360°</td>
                    </tr>
                    <tr>
                        <td>Cửa sổ trời</td>
                        <td>-</td>
                        <td colspan="2">✓</td>
                    </tr>
                    <tr>
                        <td>Số túi khí</td>
                        <td colspan="3">7 túi khí</td>
                    </tr>
                    <tr>
                        <td>Toyota Safety Sense</td>
                        <td>✓</td>
                        <td>✓</td>
                        <td>✓ (Nâng cao)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<!-- <section class="content-section section" id="gallery">
    <div class="container">
        <div class="section-header">
            <h2>Hình Ảnh Toyota Corolla Cross</h2>
            <div class="section-divider"></div>
        </div>

        <div class="gallery-filter">
            <button class="filter-btn active" data-filter="all">Tất cả</button>
            <button class="filter-btn" data-filter="exterior">Ngoại thất</button>
            <button class="filter-btn" data-filter="interior">Nội thất</button>
            <button class="filter-btn" data-filter="detail">Chi tiết</button>
        </div>

        <div class="product-gallery-grid">
            <div class="gallery-item" data-category="exterior">
                <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=400&h=300&fit=crop"
                    alt="Gallery 1">
                <div class="gallery-overlay">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div>
            </div>
            <div class="gallery-item" data-category="exterior">
                <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=400&h=300&fit=crop"
                    alt="Gallery 2">
                <div class="gallery-overlay">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div>
            </div>
            <div class="gallery-item" data-category="interior">
                <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=400&h=300&fit=crop"
                    alt="Gallery 3">
                <div class="gallery-overlay">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div>
            </div>
            <div class="gallery-item" data-category="detail">
                <img src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=400&h=300&fit=crop"
                    alt="Gallery 4">
                <div class="gallery-overlay">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div>
            </div>
            <div class="gallery-item" data-category="exterior">
                <img src="https://images.unsplash.com/photo-1609521263047-f8f205293f24?w=400&h=300&fit=crop"
                    alt="Gallery 5">
                <div class="gallery-overlay">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div>
            </div>
            <div class="gallery-item" data-category="interior">
                <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=400&h=300&fit=crop"
                    alt="Gallery 6">
                <div class="gallery-overlay">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div>
            </div> -->
<!-- <div class="gallery-item" data-category="detail">
                <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=400&h=300&fit=crop"
                    alt="Gallery 7">
                <div class="gallery-overlay">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </div> -->

<?php get_footer(); ?>