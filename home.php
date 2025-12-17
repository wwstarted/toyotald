<?php get_header(); ?>

<!-- Hero Slider Section -->
<section class="hero-slider">
    <div class="slider-container">
        <div class="slider-wrapper">
            <!-- Slide 1 -->
            <div class="slide active">
                <img src="https://images.unsplash.com/photo-1619405399517-d7fce0f13302?w=1920&h=800&fit=crop"
                    alt="Toyota Banner 1">
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <div class="container">
                        <h1 class="slide-title fade-in-up">Toyota Innova Cross 2025</h1>
                        <p class="slide-subtitle fade-in-up">Ưu đãi lên đến 50 triệu đồng</p>
                        <a href="#" class="btn btn-primary fade-in-up">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="slide">
                <img src="https://images.unsplash.com/photo-1552519507-cf0d71a1a0b5?w=1920&h=800&fit=crop"
                    alt="Toyota Banner 2">
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <div class="container">
                        <h1 class="slide-title">Toyota Corolla Cross</h1>
                        <p class="slide-subtitle">Trả góp 0% lãi suất trong 12 tháng</p>
                        <a href="#" class="btn btn-primary">Đăng ký ngay</a>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="slide">
                <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=1920&h=800&fit=crop"
                    alt="Toyota Banner 3">
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <div class="container">
                        <h1 class="slide-title">Toyota Fortuner 2025</h1>
                        <p class="slide-subtitle">Mạnh mẽ, sang trọng, đẳng cấp</p>
                        <a href="#" class="btn btn-primary">Khám phá</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Navigation -->
        <button class="slider-nav prev" id="prevSlide">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button class="slider-nav next" id="nextSlide">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

        <!-- Slider Dots -->
        <div class="slider-dots">
            <span class="dot active" data-slide="0"></span>
            <span class="dot" data-slide="1"></span>
            <span class="dot" data-slide="2"></span>
        </div>
    </div>
</section>

<!-- Trust Badges Bar -->
<section class="trust-badges">
    <div class="container">
        <div class="badges-wrapper">
            <div class="badge-item">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Đại lý chính hãng</span>
            </div>
            <div class="badge-item">
                <i class="fa-solid fa-certificate"></i>
                <span>Bảo hành toàn cầu</span>
            </div>
            <div class="badge-item">
                <i class="fa-solid fa-truck-fast"></i>
                <span>Giao xe tận nơi</span>
            </div>
            <div class="badge-item">
                <i class="fa-solid fa-headset"></i>
                <span>Hỗ trợ 24/7</span>
            </div>
        </div>
    </div>
</section>

<!-- Stats Counter Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fa-solid fa-car"></i>
                </div>
                <div class="stat-number" data-target="1500">0</div>
                <div class="stat-label">Xe đã bán</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="stat-number" data-target="5000">0</div>
                <div class="stat-label">Khách hàng hài lòng</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fa-solid fa-award"></i>
                </div>
                <div class="stat-number" data-target="15">0</div>
                <div class="stat-label">Năm kinh nghiệm</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fa-solid fa-handshake"></i>
                </div>
                <div class="stat-number" data-target="98">0</div>
                <div class="stat-label">% Khách quay lại</div>
            </div>
        </div>
    </div>
</section>

<!-- 3 CTA Boxes -->
<section class="cta-boxes">
    <div class="container">
        <div class="cta-grid">
            <div class="cta-box cta-red">
                <div class="cta-icon">
                    <i class="fa-solid fa-car-side"></i>
                </div>
                <h3>Đăng ký lái thử</h3>
                <p>Trải nghiệm xe miễn phí tại nhà</p>
                <a href="#" class="cta-link">Đăng ký ngay <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="cta-box cta-blue">
                <div class="cta-icon">
                    <i class="fa-solid fa-calculator"></i>
                </div>
                <h3>Nhận phí lăn bánh</h3>
                <p>Tính toán chi phí mua xe chính xác</p>
                <a href="#" class="cta-link">Tính ngay <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="cta-box cta-green">
                <div class="cta-icon">
                    <i class="fa-solid fa-credit-card"></i>
                </div>
                <h3>Mua xe trả góp</h3>
                <p>Hỗ trợ vay 80%, lãi suất ưu đãi</p>
                <a href="#" class="cta-link">Tư vấn ngay <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products section">
    <div class="container">
        <div class="section-header">
            <h2>Xe Hot Tháng Này</h2>
            <div class="section-divider"></div>
            <p>Những dòng xe được ưa chuộng nhất với ưu đãi đặc biệt</p>
        </div>

        <div class="featured-grid">
            <!-- Featured Car 1 -->
            <div class="featured-card">
                <div class="featured-badge">Hot</div>
                <div class="featured-image">
                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=400&h=300&fit=crop"
                        alt="Toyota Corolla Cross">
                </div>
                <div class="featured-content">
                    <h3>Toyota Corolla Cross</h3>
                    <p class="featured-desc">Crossover thông minh, đa dụng</p>
                    <div class="featured-price">
                        <span class="price-label">Giá từ:</span>
                        <span class="price-value">820 triệu</span>
                    </div>
                    <div class="featured-promo">Ưu đãi 30 triệu + Phụ kiện</div>
                    <a href="#" class="btn btn-primary btn-block">Xem chi tiết</a>
                </div>
            </div>

            <!-- Featured Car 2 -->
            <div class="featured-card">
                <div class="featured-badge hot">Hot</div>
                <div class="featured-image">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=400&h=300&fit=crop"
                        alt="Toyota Vios">
                </div>
                <div class="featured-content">
                    <h3>Toyota Vios</h3>
                    <p class="featured-desc">Sedan gia đình số 1 Việt Nam</p>
                    <div class="featured-price">
                        <span class="price-label">Giá từ:</span>
                        <span class="price-value">458 triệu</span>
                    </div>
                    <div class="featured-promo">Trả góp 0% lãi suất</div>
                    <a href="#" class="btn btn-primary btn-block">Xem chi tiết</a>
                </div>
            </div>

            <!-- Featured Car 3 -->
            <div class="featured-card">
                <div class="featured-badge">New</div>
                <div class="featured-image">
                    <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=400&h=300&fit=crop"
                        alt="Toyota Fortuner">
                </div>
                <div class="featured-content">
                    <h3>Toyota Fortuner</h3>
                    <p class="featured-desc">SUV 7 chỗ mạnh mẽ, sang trọng</p>
                    <div class="featured-price">
                        <span class="price-label">Giá từ:</span>
                        <span class="price-value">1,055 tỷ</span>
                    </div>
                    <div class="featured-promo">Tặng bảo hiểm 1 năm</div>
                    <a href="#" class="btn btn-primary btn-block">Xem chi tiết</a>
                </div>
            </div>

            <!-- Featured Car 4 -->
            <div class="featured-card">
                <div class="featured-badge">Best Seller</div>
                <div class="featured-image">
                    <img src="https://images.unsplash.com/photo-1609521263047-f8f205293f24?w=400&h=300&fit=crop"
                        alt="Toyota Innova Cross">
                </div>
                <div class="featured-content">
                    <h3>Toyota Innova Cross</h3>
                    <p class="featured-desc">MPV cao cấp đầu tiên tại VN</p>
                    <div class="featured-price">
                        <span class="price-label">Giá từ:</span>
                        <span class="price-value">825 triệu</span>
                    </div>
                    <div class="featured-promo">Giao xe trong 7 ngày</div>
                    <a href="#" class="btn btn-primary btn-block">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- All Products Grid -->
<section class="all-products section bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Dòng Xe Kinh Doanh</h2>
            <div class="section-divider"></div>
            <p>Toyota Lâm Đồng - Đa dạng sản phẩm, đáp ứng mọi nhu cầu</p>
        </div>

        <!-- Filter Tabs -->
        <div class="product-filters">
            <button class="filter-btn active" data-filter="all">Tất cả</button>
            <button class="filter-btn" data-filter="sedan">Sedan</button>
            <button class="filter-btn" data-filter="suv">SUV/Crossover</button>
            <button class="filter-btn" data-filter="mpv">MPV</button>
            <button class="filter-btn" data-filter="pickup">Bán tải</button>
        </div>

        <div class="products-grid">
            <!-- Product Card Template (Repeat 12-16 times) -->
            <div class="product-card" data-category="sedan">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=300&h=200&fit=crop"
                        alt="Toyota Vios">
                </div>
                <div class="product-info">
                    <h3>Toyota Vios</h3>
                    <p class="product-price">Giá từ: <span>458 triệu</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>

            <div class="product-card" data-category="sedan">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=300&h=200&fit=crop"
                        alt="Toyota Camry">
                </div>
                <div class="product-info">
                    <h3>Toyota Camry</h3>
                    <p class="product-price">Giá từ: <span>1,220 tỷ</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>

            <div class="product-card" data-category="suv">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=300&h=200&fit=crop"
                        alt="Toyota Corolla Cross">
                </div>
                <div class="product-info">
                    <h3>Toyota Corolla Cross</h3>
                    <p class="product-price">Giá từ: <span>820 triệu</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>

            <div class="product-card" data-category="suv">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=300&h=200&fit=crop"
                        alt="Toyota Fortuner">
                </div>
                <div class="product-info">
                    <h3>Toyota Fortuner</h3>
                    <p class="product-price">Giá từ: <span>1,055 tỷ</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>

            <div class="product-card" data-category="mpv">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1609521263047-f8f205293f24?w=300&h=200&fit=crop"
                        alt="Toyota Innova Cross">
                </div>
                <div class="product-info">
                    <h3>Toyota Innova Cross</h3>
                    <p class="product-price">Giá từ: <span>825 triệu</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>

            <div class="product-card" data-category="mpv">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=300&h=200&fit=crop"
                        alt="Toyota Veloz Cross">
                </div>
                <div class="product-info">
                    <h3>Toyota Veloz Cross</h3>
                    <p class="product-price">Giá từ: <span>638 triệu</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>

            <div class="product-card" data-category="suv">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=300&h=200&fit=crop"
                        alt="Toyota Yaris Cross">
                </div>
                <div class="product-info">
                    <h3>Toyota Yaris Cross</h3>
                    <p class="product-price">Giá từ: <span>650 triệu</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>

            <div class="product-card" data-category="pickup">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=300&h=200&fit=crop"
                        alt="Toyota Hilux">
                </div>
                <div class="product-info">
                    <h3>Toyota Hilux</h3>
                    <p class="product-price">Giá từ: <span>668 triệu</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>

            <div class="product-card" data-category="sedan">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=300&h=200&fit=crop"
                        alt="Toyota Wigo">
                </div>
                <div class="product-info">
                    <h3>Toyota Wigo</h3>
                    <p class="product-price">Giá từ: <span>405 triệu</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>

            <div class="product-card" data-category="suv">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=300&h=200&fit=crop"
                        alt="Toyota Raize">
                </div>
                <div class="product-info">
                    <h3>Toyota Raize</h3>
                    <p class="product-price">Giá từ: <span>510 triệu</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>

            <div class="product-card" data-category="mpv">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1609521263047-f8f205293f24?w=300&h=200&fit=crop"
                        alt="Toyota Avanza Premio">
                </div>
                <div class="product-info">
                    <h3>Toyota Avanza Premio</h3>
                    <p class="product-price">Giá từ: <span>558 triệu</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>

            <div class="product-card" data-category="sedan">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=300&h=200&fit=crop"
                        alt="Toyota Altis">
                </div>
                <div class="product-info">
                    <h3>Toyota Altis</h3>
                    <p class="product-price">Giá từ: <span>725 triệu</span></p>
                    <a href="#" class="btn btn-outline btn-sm btn-block">Chi tiết</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Financing Banner -->
<section class="financing-banner">
    <div class="container">
        <div class="financing-content">
            <div class="financing-icon">
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>
            <div class="financing-text">
                <h2>Hỗ trợ mua xe trả góp đến 85%</h2>
                <p>Lãi suất thấp - Thủ tục nhanh chóng - Duyệt trong 24h</p>
            </div>
            <div class="financing-action">
                <a href="tel:0943231614" class="btn btn-lg">
                    <i class="fa-solid fa-phone"></i> 033 408 7540
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Customer Reviews -->
<section class="reviews-section section">
    <div class="container">
        <div class="section-header">
            <h2>Khách Hàng Nói Gì</h2>
            <div class="section-divider"></div>
            <p>Trải nghiệm thực tế từ khách hàng của Toyota Lâm Đồng</p>
        </div>

        <div class="reviews-slider">
            <div class="review-card">
                <div class="review-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="review-text">"Dịch vụ tư vấn rất chuyên nghiệp, nhiệt tình. Xe giao đúng hẹn, thủ tục nhanh
                    gọn. Rất hài lòng với Toyota Lâm Đồng!"</p>
                <div class="review-author">
                    <img src="https://www.bing.com/th/id/OIP.lsaqXiF1qoA0lNGxssv4dQHaFy?w=211&h=211&c=8&rs=1&qlt=90&o=6&cb=ucfimg1&dpr=1.3&pid=3.1&rm=2&ucfimg=1"
                        alt="Customer">
                    <div>
                        <h4>David Beckham</h4>
                        <span>Mua xe Vios 2024</span>
                    </div>
                </div>
            </div>

            <div class="review-card">
                <div class="review-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="review-text">"Giá cả hợp lý, hỗ trợ trả góp tốt. Nhân viên tư vấn tận tâm, giải đáp mọi thắc
                    mắc. Chắc chắn sẽ giới thiệu bạn bè đến đây."</p>
                <div class="review-author">
                    <img src="https://www.bing.com/th/id/OIP.lsaqXiF1qoA0lNGxssv4dQHaFy?w=211&h=211&c=8&rs=1&qlt=90&o=6&cb=ucfimg1&dpr=1.3&pid=3.1&rm=2&ucfimg=1"
                        alt="Customer">
                    <div>
                        <h4>Ronaldo</h4>
                        <span>Mua xe Corolla Cross 2024</span>
                    </div>
                </div>
            </div>

            <div class="review-card">
                <div class="review-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="review-text">"Showroom đẹp, xe đa dạng. Được lái thử kỹ càng trước khi quyết định. Quá trình
                    mua xe diễn ra thuận lợi. Highly recommended!"</p>
                <div class="review-author">
                    <img src="https://www.bing.com/th/id/OIP.lsaqXiF1qoA0lNGxssv4dQHaFy?w=211&h=211&c=8&rs=1&qlt=90&o=6&cb=ucfimg1&dpr=1.3&pid=3.1&rm=2&ucfimg=1"
                        alt="Customer">
                    <div>
                        <h4>Mesut Ozil</h4>
                        <span>Mua xe Fortuner 2024</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Review Navigation -->
        <div class="review-nav">
            <button class="review-prev"><i class="fa-solid fa-chevron-left"></i></button>
            <button class="review-next"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="news-section section bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Tin Tức & Khuyến Mãi</h2>
            <div class="section-divider"></div>
            <p>Cập nhật tin tức mới nhất về Toyota và các chương trình ưu đãi</p>
        </div>

        <div class="news-grid">
            <!-- News Card 1 -->
            <div class="news-card">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=400&h=250&fit=crop"
                        alt="News 1">
                    <span class="news-date">15/01/2025</span>
                </div>
                <div class="news-content">
                    <h3>Toyota Innova Cross 2025 chính thức ra mắt tại Việt Nam</h3>
                    <p>Mẫu MPV cao cấp đầu tiên của Toyota tại Việt Nam với nhiều trang bị hiện đại...</p>
                    <a href="#" class="news-link">Đọc thêm <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- News Card 2 -->
            <div class="news-card">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=400&h=250&fit=crop"
                        alt="News 2">
                    <span class="news-date">10/01/2025</span>
                </div>
                <div class="news-content">
                    <h3>Bảng giá xe Toyota tháng 1/2025 - Ưu đãi khủng đầu năm</h3>
                    <p>Cập nhật bảng giá mới nhất và các chương trình khuyến mãi hấp dẫn...</p>
                    <a href="#" class="news-link">Đọc thêm <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- News Card 3 -->
            <div class="news-card">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=400&h=250&fit=crop"
                        alt="News 3">
                    <span class="news-date">05/01/2025</span>
                </div>
                <div class="news-content">
                    <h3>5 lý do nên chọn Toyota Corolla Cross trong phân khúc</h3>
                    <p>Phân tích chi tiết về ưu điểm vượt trội của mẫu crossover hot nhất...</p>
                    <a href="#" class="news-link">Đọc thêm <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="text-center mt-30">
            <a href="#" class="btn btn-outline">Xem tất cả tin tức</a>
        </div>
    </div>
</section>

<!-- Why Choose Us + Gallery -->
<section class="why-choose-us section">
    <div class="container">
        <div class="section-header">
            <h2>Vì Sao Chọn Toyota Lâm Đồng</h2>
            <div class="section-divider"></div>
            <p>Cam kết mang đến trải nghiệm mua xe tốt nhất</p>
        </div>

        <div class="why-grid">
            <div class="why-item">
                <div class="why-icon">
                    <i class="fa-solid fa-badge-dollar"></i>
                </div>
                <h3>Giá tốt nhất</h3>
                <p>Cam kết giá bán cạnh tranh nhất khu vực với nhiều chương trình ưu đãi hấp dẫn</p>
            </div>

            <div class="why-item">
                <div class="why-icon">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <h3>Tư vấn chuyên nghiệp</h3>
                <p>Đội ngũ tư vấn giàu kinh nghiệm, nhiệt tình, hỗ trợ 24/7</p>
            </div>

            <div class="why-item">
                <div class="why-icon">
                    <i class="fa-solid fa-trophy"></i>
                </div>
                <h3>Đại lý uy tín</h3>
                <p>Top đại lý bán hàng xuất sắc với hàng nghìn khách hàng tin tưởng</p>
            </div>
        </div>

        <!-- Gallery -->
        <div class="gallery-section mt-30">
            <h3 class="text-center mb-20">Hình Ảnh Giao Xe</h3>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=300&h=250&fit=crop"
                        alt="Giao xe 1">
                    <div class="gallery-overlay">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=300&h=250&fit=crop"
                        alt="Giao xe 2">
                    <div class="gallery-overlay">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=300&h=250&fit=crop"
                        alt="Giao xe 3">
                    <div class="gallery-overlay">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=300&h=250&fit=crop"
                        alt="Giao xe 4">
                    <div class="gallery-overlay">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1609521263047-f8f205293f24?w=300&h=250&fit=crop"
                        alt="Giao xe 5">
                    <div class="gallery-overlay">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=300&h=250&fit=crop"
                        alt="Giao xe 6">
                    <div class="gallery-overlay">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section section bg-light">
    <div class="container">
        <div class="section-header">
            <h2>Câu Hỏi Thường Gặp</h2>
            <div class="section-divider"></div>
            <p>Giải đáp các thắc mắc phổ biến về mua xe Toyota</p>
        </div>

        <div class="faq-wrapper">
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Thời gian giao xe trung bình là bao lâu?</h3>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Thời gian giao xe trung bình từ 7-14 ngày làm việc tùy theo dòng xe và màu sắc. Với một số dòng
                        xe hot, thời gian có thể kéo dài hơn. Chúng tôi sẽ thông báo chính xác thời gian giao xe khi quý
                        khách đặt cọc.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Có hỗ trợ trả góp không? Lãi suất như thế nào?</h3>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Chúng tôi hỗ trợ vay trả góp đến 80-85% giá trị xe với lãi suất ưu đãi từ các ngân hàng lớn. Lãi
                        suất dao động từ 6.99%-9.5%/năm tùy thời gian vay. Thủ tục đơn giản, duyệt nhanh trong 24h.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Xe Toyota có được bảo hành toàn cầu không?</h3>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Tất cả xe Toyota chính hãng đều được bảo hành 3 năm hoặc 100,000km (tùy điều kiện nào đến trước).
                        Bảo hành toàn cầu, có thể bảo dưỡng tại bất kỳ đại lý Toyota nào trên toàn quốc.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Chi phí lăn bánh xe Toyota khoảng bao nhiêu?</h3>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Chi phí lăn bánh bao gồm: lệ phí trước bạ (10-12% giá xe), phí đăng ký biển số, bảo hiểm bắt
                        buộc, và các phí khác. Tổng chi phí khoảng 12-15% giá xe. Liên hệ để được tư vấn chi tiết cho
                        từng dòng xe.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Có được lái thử xe trước khi mua không?</h3>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Tất nhiên! Quý khách có thể đăng ký lái thử miễn phí tại showroom hoặc chúng tôi có thể mang xe
                        đến tận nhà. Thời gian lái thử khoảng 30-60 phút để quý khách có trải nghiệm tốt nhất.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="contact-section section">
    <div class="container">
        <div class="section-header">
            <h2>Nhận Tư Vấn Miễn Phí</h2>
            <div class="section-divider"></div>
            <p>Để lại thông tin, chúng tôi sẽ liên hệ tư vấn trong vòng 15 phút</p>
        </div>

        <div class="contact-wrapper">
            <div class="contact-form-container">
                <form class="contact-form" id="contactForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Họ và tên *</label>
                            <input type="text" name="name" placeholder="Nguyễn Văn A" required>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại *</label>
                            <input type="tel" name="phone" placeholder="0912 xxx xxx" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="email@example.com">
                        </div>
                        <div class="form-group">
                            <label>Dòng xe quan tâm</label>
                            <select name="car">
                                <option value="">Chọn dòng xe</option>
                                <option value="vios">Toyota Vios</option>
                                <option value="corolla-cross">Toyota Corolla Cross</option>
                                <option value="fortuner">Toyota Fortuner</option>
                                <option value="innova-cross">Toyota Innova Cross</option>
                                <option value="other">Khác</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="message" rows="4" placeholder="Nhập nội dung cần tư vấn..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        <i class="fa-solid fa-paper-plane"></i> Gửi thông tin
                    </button>
                </form>
            </div>

            <div class="contact-info">
                <div class="info-box">
                    <div class="info-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="info-content">
                        <h4>Địa chỉ showroom</h4>
                        <p>176 Trần Hưng Đạo, xã Đức Mạnh, Lâm Đồng</p>
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="info-content">
                        <h4>Hotline</h4>
                        <p><a href="tel:0943231614">033 408 7540</a></p>
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <h4>Email</h4>
                        <p><a href="mailto:contact@toyota-lamdong.vn">marcander.tvd11@gmail.com</a></p>
                    </div>
                </div>

                <div class="info-box">
                    <div class="info-icon">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div class="info-content">
                        <h4>Giờ làm việc</h4>
                        <p>T2 - CN: 8:00 - 18:00</p>
                    </div>
                </div>

                <div class="social-links">
                    <a href="#" class="social-btn facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-btn zalo">
                        <i class="fa-solid fa-z"></i>
                    </a>
                    <a href="#" class="social-btn youtube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Google Map Embed -->
        <div class="map-container mt-30">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.3!2d108.4!3d11.9!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTHCsDU0JzAwLjAiTiAxMDjCsDI0JzAwLjAiRQ!5e0!3m2!1svi!2s!4v1234567890123!5m2!1svi!2s"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>
</section>

<?php get_footer(); ?>