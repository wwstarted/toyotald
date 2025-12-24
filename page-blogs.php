<?php
/**
 * Template Name: Modern Blog Page - Toyota Lâm Đồng
 * Description: Trang blog hiện đại cho đại lý xe Toyota với featured posts, mixed grid layout
 */
get_header(); ?>

<main id="main-content" class="modern-blog-page">

    <!-- HERO SECTION với Background -->
    <section class="blog-hero-modern">
        <div class="hero-overlay"></div>
        <div class="hero-background"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Cập Nhật Mọi Điều Về Toyota</h1>
                <p class="hero-subtitle">Tin tức • Khuyến mãi • Bảo dưỡng • Kinh nghiệm lái xe</p>

                <!-- Search Bar Nổi Bật -->
                <div class="hero-search-box">
                    <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                        <div class="search-wrapper">
                            <i class="fa-solid fa-magnifying-glass search-icon"></i>
                            <input type="search" class="hero-search-input"
                                placeholder="Tìm kiếm bài viết, khuyến mãi, mẹo lái xe..."
                                value="<?php echo get_search_query(); ?>" name="s" id="main-search">
                            <button type="submit" class="search-btn">Tìm kiếm</button>
                        </div>
                    </form>
                    <div class="search-suggestions" id="search-suggestions"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURED POSTS SECTION -->
    <section class="featured-posts-section">
        <div class="container">
            <div class="section-header-inline">
                <h2><i class="fa-solid fa-star"></i> Bài Viết Nổi Bật</h2>
                <span class="view-all-link">Xem tất cả <i class="fa-solid fa-arrow-right"></i></span>
            </div>

            <div class="featured-grid">
                <!-- Featured Post 1 - Large -->
                <article class="featured-main">
                    <div class="featured-image">
                        <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                            alt="Ưu đãi Toyota Vios">
                        <span class="badge-new">MỚI</span>
                        <span class="badge-category red">Khuyến Mãi</span>
                    </div>
                    <div class="featured-content">
                        <div class="post-meta">
                            <span><i class="fa-regular fa-calendar"></i> 18/12/2024</span>
                            <span><i class="fa-regular fa-eye"></i> 2.3k views</span>
                            <span><i class="fa-regular fa-clock"></i> 5 phút đọc</span>
                        </div>
                        <h3 class="featured-title">
                            <a href="#">Ưu Đãi Cuối Năm 2024: Toyota Vios Giảm Đến 30 Triệu + Quà Tặng Hấp Dẫn</a>
                        </h3>
                        <p class="featured-excerpt">
                            Chương trình ưu đãi đặc biệt tháng 12 dành riêng cho khách hàng Lâm Đồng. Mua Toyota Vios
                            nhận ngay ưu đãi lên đến 30 triệu đồng cùng bộ phụ kiện chính hãng trị giá 15 triệu. Số
                            lượng có hạn, nhanh tay đăng ký...
                        </p>
                        <a href="#" class="btn-read-more">
                            Xem chi tiết <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- Featured Post 2 - Small -->
                <article class="featured-side">
                    <div class="featured-side-image">
                        <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                            alt="Bảo dưỡng phanh">
                        <span class="badge-category blue">Bảo Dưỡng</span>
                    </div>
                    <div class="featured-side-content">
                        <div class="post-meta-small">
                            <span><i class="fa-regular fa-calendar"></i> 17/12/2024</span>
                            <span><i class="fa-regular fa-eye"></i> 1.8k</span>
                        </div>
                        <h4><a href="#">5 Dấu Hiệu Cần Thay Phanh Xe Toyota Ngay Lập Tức</a></h4>
                        <p>Hệ thống phanh là yếu tố sống còn cho an toàn. Nhận biết sớm các dấu hiệu hư hỏng...</p>
                    </div>
                </article>

                <!-- Featured Post 3 - Small -->
                <article class="featured-side">
                    <div class="featured-side-image">
                        <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                            alt="So sánh xe">
                        <span class="badge-category orange">So Sánh</span>
                    </div>
                    <div class="featured-side-content">
                        <div class="post-meta-small">
                            <span><i class="fa-regular fa-calendar"></i> 16/12/2024</span>
                            <span><i class="fa-regular fa-eye"></i> 3.1k</span>
                        </div>
                        <h4><a href="#">Toyota Corolla Cross vs Honda HR-V: Chọn Xe Nào Phù Hợp?</a></h4>
                        <p>Phân tích chi tiết 2 mẫu SUV đô thị hot nhất 2024 về giá, tính năng, vận hành...</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- FILTER BAR - Sticky -->
    <section class="filter-bar-section" id="filter-bar">
        <div class="container">
            <div class="filter-controls">
                <!-- Quick Filters -->
                <div class="quick-filters">
                    <button class="quick-filter-btn active" data-filter="all">
                        <i class="fa-solid fa-border-all"></i> Tất cả
                    </button>
                    <button class="quick-filter-btn" data-filter="today">
                        <i class="fa-solid fa-calendar-day"></i> Hôm nay
                    </button>
                    <button class="quick-filter-btn" data-filter="week">
                        <i class="fa-solid fa-calendar-week"></i> Tuần này
                    </button>
                    <button class="quick-filter-btn" data-filter="hot">
                        <i class="fa-solid fa-fire"></i> Hot nhất
                    </button>
                </div>

                <!-- Categories với Count -->
                <div class="category-filters">
                    <button class="cat-filter-btn active" data-cat="all">
                        Tất cả <span class="count">(24)</span>
                    </button>
                    <button class="cat-filter-btn" data-cat="khuyen-mai">
                        <span class="cat-dot red"></span> Khuyến mãi <span class="count">(8)</span>
                    </button>
                    <button class="cat-filter-btn" data-cat="bao-duong">
                        <span class="cat-dot blue"></span> Bảo dưỡng <span class="count">(6)</span>
                    </button>
                    <button class="cat-filter-btn" data-cat="tin-tuc">
                        <span class="cat-dot green"></span> Tin tức <span class="count">(5)</span>
                    </button>
                    <button class="cat-filter-btn" data-cat="meo-lai-xe">
                        <span class="cat-dot orange"></span> Mẹo lái xe <span class="count">(5)</span>
                    </button>
                </div>

                <!-- Sort Options -->
                <div class="sort-options">
                    <select id="sort-select" class="sort-select">
                        <option value="latest">Mới nhất</option>
                        <option value="popular">Xem nhiều nhất</option>
                        <option value="az">A → Z</option>
                    </select>
                </div>
            </div>

            <!-- Active Filters Display -->
            <div class="active-filters" id="active-filters"></div>
        </div>
    </section>

    <!-- MAIN CONTENT: Grid + Sidebar -->
    <section class="blog-content-section">
        <div class="container">
            <div class="blog-layout">

                <!-- BLOG GRID - Mixed Layout -->
                <div class="blog-grid-mixed" id="blog-grid">

                    <!-- Blog Post 1 -->
                    <article class="blog-card" data-category="meo-lai-xe" data-date="2024-12-15" data-views="1200">
                        <div class="card-image">
                            <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                                alt="Lái xe đèo Prenn">
                            <div class="image-overlay">
                                <button class="quick-view-btn"><i class="fa-regular fa-eye"></i> Xem nhanh</button>
                            </div>
                        </div>
                        <div class="card-content">
                            <span class="category-badge orange">Mẹo Lái Xe</span>
                            <h3 class="card-title">
                                <a href="#">Lái Xe An Toàn Trên Đèo Prenn - Kinh Nghiệm Từ Tài Xế Lâm Đồng</a>
                            </h3>
                            <p class="card-excerpt">
                                Đèo Prenn nổi tiếng với những khúc cua gấp và độ dốc cao. Chia sẻ kinh nghiệm thực tế từ
                                các tài xế địa phương...
                            </p>
                            <div class="card-footer">
                                <div class="post-meta">
                                    <span><i class="fa-regular fa-calendar"></i> 15/12/2024</span>
                                    <span><i class="fa-regular fa-eye"></i> 1.2k</span>
                                    <span><i class="fa-regular fa-clock"></i> 4 phút</span>
                                </div>
                                <a href="#" class="read-link">Đọc thêm →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Post 2 -->
                    <article class="blog-card" data-category="tin-tuc" data-date="2024-12-14" data-views="2500">
                        <div class="card-image">
                            <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                                alt="Toyota Hybrid">
                            <span class="badge-trending">🔥 TRENDING</span>
                        </div>
                        <div class="card-content">
                            <span class="category-badge green">Tin Tức</span>
                            <h3 class="card-title">
                                <a href="#">Toyota Ra Mắt Công Nghệ Hybrid Mới 2025: Tiết Kiệm Hơn 40% Nhiên Liệu</a>
                            </h3>
                            <p class="card-excerpt">
                                Hệ thống hybrid thế hệ mới hứa hẹn mang đến cuộc cách mạng về hiệu suất và khả năng tiết
                                kiệm nhiên liệu...
                            </p>
                            <div class="card-footer">
                                <div class="post-meta">
                                    <span><i class="fa-regular fa-calendar"></i> 14/12/2024</span>
                                    <span><i class="fa-regular fa-eye"></i> 2.5k</span>
                                    <span><i class="fa-regular fa-clock"></i> 6 phút</span>
                                </div>
                                <a href="#" class="read-link">Đọc thêm →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Post 3 - Large (2x width) -->
                    <article class="blog-card large-card" data-category="khuyen-mai" data-date="2024-12-13"
                        data-views="3200">
                        <div class="large-card-layout">
                            <div class="card-image">
                                <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                                    alt="Khuyến mãi Camry">
                                <span class="badge-hot">🎁 ƯU ĐÃI HOT</span>
                            </div>
                            <div class="card-content">
                                <span class="category-badge red">Khuyến Mãi</span>
                                <h3 class="card-title">
                                    <a href="#">Mua Toyota Camry Tháng 12: Tặng Gói Bảo Hiểm + Phụ Kiện Cao Cấp</a>
                                </h3>
                                <p class="card-excerpt">
                                    Ưu đãi đặc biệt cho khách hàng đặt mua Toyota Camry trong tháng 12. Nhận ngay gói
                                    bảo hiểm vật chất trị giá 20 triệu + bộ phụ kiện nội thất cao cấp. Đặc biệt hỗ trợ
                                    lãi suất 0% trong 12 tháng đầu...
                                </p>
                                <div class="card-footer">
                                    <div class="post-meta">
                                        <span><i class="fa-regular fa-calendar"></i> 13/12/2024</span>
                                        <span><i class="fa-regular fa-eye"></i> 3.2k</span>
                                        <span><i class="fa-regular fa-clock"></i> 7 phút</span>
                                    </div>
                                    <a href="#" class="read-link">Xem chi tiết ưu đãi →</a>
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Post 4 -->
                    <article class="blog-card" data-category="bao-duong" data-date="2024-12-12" data-views="980">
                        <div class="card-image">
                            <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                                alt="Bảo dưỡng">
                        </div>
                        <div class="card-content">
                            <span class="category-badge blue">Bảo Dưỡng</span>
                            <h3 class="card-title">
                                <a href="#">Lịch Bảo Dưỡng Toyota: Những Mốc Quan Trọng Bạn Cần Nhớ</a>
                            </h3>
                            <p class="card-excerpt">
                                Hướng dẫn chi tiết lịch bảo dưỡng định kỳ cho các dòng xe Toyota. Từ 5.000km đến
                                100.000km...
                            </p>
                            <div class="card-footer">
                                <div class="post-meta">
                                    <span><i class="fa-regular fa-calendar"></i> 12/12/2024</span>
                                    <span><i class="fa-regular fa-eye"></i> 980</span>
                                    <span><i class="fa-regular fa-clock"></i> 5 phút</span>
                                </div>
                                <a href="#" class="read-link">Đọc thêm →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Post 5 -->
                    <article class="blog-card" data-category="meo-lai-xe" data-date="2024-12-11" data-views="1450">
                        <div class="card-image">
                            <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                                alt="Lái xe mưa">
                        </div>
                        <div class="card-content">
                            <span class="category-badge orange">Mẹo Lái Xe</span>
                            <h3 class="card-title">
                                <a href="#">7 Mẹo Lái Xe An Toàn Trong Mùa Mưa Đà Lạt</a>
                            </h3>
                            <p class="card-excerpt">
                                Mùa mưa Đà Lạt với sương mù dày đặc và đường trơn trượt. Những điều cần lưu ý để đảm bảo
                                an toàn...
                            </p>
                            <div class="card-footer">
                                <div class="post-meta">
                                    <span><i class="fa-regular fa-calendar"></i> 11/12/2024</span>
                                    <span><i class="fa-regular fa-eye"></i> 1.4k</span>
                                    <span><i class="fa-regular fa-clock"></i> 3 phút</span>
                                </div>
                                <a href="#" class="read-link">Đọc thêm →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Post 6 -->
                    <article class="blog-card" data-category="tin-tuc" data-date="2024-12-10" data-views="1820">
                        <div class="card-image">
                            <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                                alt="RAV4 2025">
                        </div>
                        <div class="card-content">
                            <span class="category-badge green">Tin Tức</span>
                            <h3 class="card-title">
                                <a href="#">Toyota RAV4 2025 Về Việt Nam: Giá Dự Kiến & Những Nâng Cấp Đáng Chú Ý</a>
                            </h3>
                            <p class="card-excerpt">
                                Toyota RAV4 thế hệ mới sắp ra mắt thị trường Việt Nam với nhiều cải tiến về ngoại thất
                                và công nghệ...
                            </p>
                            <div class="card-footer">
                                <div class="post-meta">
                                    <span><i class="fa-regular fa-calendar"></i> 10/12/2024</span>
                                    <span><i class="fa-regular fa-eye"></i> 1.8k</span>
                                    <span><i class="fa-regular fa-clock"></i> 5 phút</span>
                                </div>
                                <a href="#" class="read-link">Đọc thêm →</a>
                            </div>
                        </div>
                    </article>

                </div>

                <!-- SIDEBAR -->
                <aside class="blog-sidebar">

                    <!-- Hot Posts Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">
                            <i class="fa-solid fa-fire"></i> Bài Viết Hot
                        </h3>
                        <ul class="hot-posts-list">
                            <li class="hot-post-item">
                                <div class="hot-post-thumb">
                                    <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                                        alt="">
                                    <span class="rank">1</span>
                                </div>
                                <div class="hot-post-info">
                                    <h4><a href="#">Ưu Đãi Cuối Năm Toyota Vios</a></h4>
                                    <span class="views"><i class="fa-regular fa-eye"></i> 2.3k</span>
                                </div>
                            </li>
                            <li class="hot-post-item">
                                <div class="hot-post-thumb">
                                    <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                                        alt="">
                                    <span class="rank">2</span>
                                </div>
                                <div class="hot-post-info">
                                    <h4><a href="#">Corolla Cross vs HR-V</a></h4>
                                    <span class="views"><i class="fa-regular fa-eye"></i> 3.1k</span>
                                </div>
                            </li>
                            <li class="hot-post-item">
                                <div class="hot-post-thumb">
                                    <img src="https://www.creativefabrica.com/wp-content/uploads/2024/07/19/Red-Movement-Creative-Graphic-Graphics-102230992-1.jpg"
                                        alt="">
                                    <span class="rank">3</span>
                                </div>
                                <div class="hot-post-info">
                                    <h4><a href="#">Hybrid 2025 Tiết Kiệm 40%</a></h4>
                                    <span class="views"><i class="fa-regular fa-eye"></i> 2.5k</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Tags Widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">
                            <i class="fa-solid fa-tags"></i> Tags Phổ Biến
                        </h3>
                        <div class="tags-cloud">
                            <a href="#" class="tag">#Vios</a>
                            <a href="#" class="tag">#Camry</a>
                            <a href="#" class="tag">#RAV4</a>
                            <a href="#" class="tag">#CorollaCross</a>
                            <a href="#" class="tag">#Hybrid</a>
                            <a href="#" class="tag">#BảoDưỡng</a>
                            <a href="#" class="tag">#ĐàLạt</a>
                            <a href="#" class="tag">#LámĐồng</a>
                        </div>
                    </div>

                    <!-- Newsletter Widget -->
                    <div class="sidebar-widget newsletter-widget">
                        <h3 class="widget-title">
                            <i class="fa-regular fa-envelope"></i> Đăng Ký Nhận Tin
                        </h3>
                        <p>Nhận thông báo về khuyến mãi và tin tức mới nhất từ Toyota Lâm Đồng</p>
                        <form class="newsletter-form">
                            <input type="email" placeholder="Email của bạn" required>
                            <button type="submit">Đăng ký</button>
                        </form>
                    </div>

                </aside>

            </div>

            <!-- Load More / Pagination -->
            <div class="blog-load-more text-center">
                <button class="btn-load-more" id="load-more-btn">
                    <span class="btn-text">Xem thêm bài viết</span>
                    <span class="btn-loader" style="display:none;">
                        <i class="fa-solid fa-spinner fa-spin"></i> Đang tải...
                    </span>
                </button>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>