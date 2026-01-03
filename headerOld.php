<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right');
    bloginfo('name'); ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header" id="site-header">
        <div class="header-container">

            <div class="header-left">
                <div class="logo-section">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                        <?php if (has_custom_logo()): ?>
                            <?php the_custom_logo(); ?>
                        <?php else: ?>
                            <img src="https://th.bing.com/th/id/OIP.hKL_zFVdLx8dCiYOZ8hrGgHaGL?w=150&h=150&c=6&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1"
                                alt="Toyota Logo" class="site-logo">
                        <?php endif; ?>
                        <span class="site-name">Toyota Đà Lạt</span>
                    </a>
                </div>
                <div class="hotline-section">
                    <i class="fa-solid fa-phone phone-icon"></i>
                    <a href="tel:0943231614" class="hotline-number">033 408 7540</a>
                </div>
            </div>

            <!-- Center Section: Static Navigation Menu -->
            <nav class="header-center">
                <ul class="main-menu">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a></li>
                    <li class="menu-item-has-children">
                        <a href="<?php echo esc_url(home_url('/single')); ?>">Sản phẩm</a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo esc_url(home_url('/san-pham/toyota-wigo')); ?>">Toyota Wigo</a></li>
                            <li><a href="<?php echo esc_url(home_url('/san-pham/toyota-vios')); ?>">Toyota Vios</a></li>
                            <li><a href="<?php echo esc_url(home_url('/san-pham/toyota-corolla-cross')); ?>">Toyota
                                    Corolla Cross</a></li>
                            <li><a href="<?php echo esc_url(home_url('/san-pham/toyota-fortuner')); ?>">Toyota
                                    Fortuner</a></li>
                            <li><a href="<?php echo esc_url(home_url('/san-pham/toyota-innova')); ?>">Toyota Innova</a>
                            </li>
                            <li><a href="<?php echo esc_url(home_url('/san-pham')); ?>">Xem tất cả</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo esc_url(home_url('/price')); ?>">Bảng giá</a></li>
                    <li><a href="<?php echo esc_url(home_url('/blogs')); ?>">Tin tức</a></li>
                    <li><a href="<?php echo esc_url(home_url('/dang-ky-lai-thu')); ?>">Lái thử</a></li>
                    <li><a href="<?php echo esc_url(home_url('/about_us')); ?>">Giới thiệu</a></li>
                    <li><a href="<?php echo esc_url(home_url('/single-blogs')); ?>">Chi tiết</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Liên hệ</a></li>
                </ul>
            </nav>

            <!-- Right Section: Search Form with Dropdown -->
            <div class="header-right">
                <div class="header-search">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" class="search-input" placeholder="Tìm kiếm..." name="s"
                            value="<?php echo get_search_query(); ?>" autocomplete="off">
                        <button type="submit" class="search-button">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                        <!-- Search Dropdown (will be populated by JS) -->
                        <div class="search-dropdown">
                            <div class="search-dropdown-content">
                                <!-- Loading State -->
                                <div class="search-loading">
                                    <i class="fa-solid fa-spinner fa-spin"></i>
                                    <span>Đang tìm kiếm...</span>
                                </div>

                                <!-- Results -->
                                <div class="search-results">
                                    <!-- Products Section -->
                                    <div class="search-section" id="products-section">
                                        <div class="search-section-header">
                                            <i class="fa-solid fa-car"></i>
                                            <span>SẢN PHẨM</span>
                                        </div>
                                        <div class="search-section-results" id="products-results"></div>
                                    </div>

                                    <!-- Posts Section -->
                                    <div class="search-section" id="posts-section">
                                        <div class="search-section-header">
                                            <i class="fa-solid fa-newspaper"></i>
                                            <span>BÀI VIẾT</span>
                                        </div>
                                        <div class="search-section-results" id="posts-results"></div>
                                    </div>
                                </div>

                                <!-- Empty State -->
                                <div class="search-empty">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <p>Không tìm thấy kết quả</p>
                                    <span>Thử với từ khóa khác</span>
                                </div>

                                <!-- Error State -->
                                <div class="search-error">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <p>Có lỗi xảy ra</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-content">
            <div class="mobile-menu-header">
                <span class="site-name">Toyota Đà Lạt</span>
                <button class="mobile-menu-close" id="mobile-menu-close">&times;</button>
            </div>
            <ul class="mobile-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a></li>
                <li><a href="<?php echo esc_url(home_url('/san-pham')); ?>">Sản phẩm</a></li>
                <li><a href="<?php echo esc_url(home_url('/bang-gia')); ?>">Bảng giá</a></li>
                <li><a href="<?php echo esc_url(home_url('/tin-tuc')); ?>">Tin tức - Khuyến mãi</a></li>
                <li><a href="<?php echo esc_url(home_url('/dang-ky-lai-thu')); ?>">Đăng ký lái thử</a></li>
                <li><a href="<?php echo esc_url(home_url('/dich-vu')); ?>">Dịch vụ</a></li>
            </ul>
            <div class="mobile-hotline">
                <a href="tel:0943231614" class="mobile-hotline-link">
                    <i class="fa-solid fa-phone"></i>
                    Gọi ngay: 033 408 7540
                </a>
            </div>
        </div>
    </div>

    <main class="site-content"></main>