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

    <!-- Modern Minimal Header -->
    <header class="modern-header" id="modernHeader">
        <div class="modern-header-container">

            <!-- Logo Section -->
            <div class="header-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link" aria-label="Trang chủ">
                    <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                    <?php else: ?>
                    <img src="https://th.bing.com/th/id/OIP.hKL_zFVdLx8dCiYOZ8hrGgHaGL?w=150&h=150&c=6&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1"
                        alt="Logo" class="site-logo">
                    <?php endif; ?>
                </a>
            </div>

            <!-- Main Navigation -->
            <nav class="header-nav" role="navigation" aria-label="Main navigation">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo esc_url(home_url('/about_us')); ?>" class="nav-link">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo esc_url(home_url('/dich-vu')); ?>" class="nav-link">Dịch vụ</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="nav-link">Liên hệ</a>
                    </li>
                </ul>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions">

                <!-- Search -->
                <div class="header-search" id="headerSearch">
                    <!-- Search Form Container -->
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>"
                        id="searchForm">
                        <input type="search" class="search-input" placeholder="Search..." name="s"
                            value="<?php echo get_search_query(); ?>" autocomplete="off" id="searchInput">
                        <button type="submit" class="search-icon-btn" aria-label="Tìm kiếm">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                        <!-- Search Dropdown -->
                        <div class="search-dropdown" id="searchDropdown">
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

                <!-- CTA Button -->
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cta-button">
                    Liên hệ
                </a>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-toggle" id="mobileToggle" aria-label="Menu" aria-expanded="false">
                    <span class="mobile-toggle-line"></span>
                    <span class="mobile-toggle-line"></span>
                    <span class="mobile-toggle-line"></span>
                </button>
            </div>

        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobileMenuOverlay">
        <div class="mobile-menu-content">

            <!-- Mobile Header -->
            <div class="mobile-menu-header">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-logo">
                    <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                    <?php else: ?>
                    <img src="https://th.bing.com/th/id/OIP.hKL_zFVdLx8dCiYOZ8hrGgHaGL?w=150&h=150&c=6&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1"
                        alt="Logo" class="site-logo">
                    <?php endif; ?>
                </a>
                <button class="mobile-close" id="mobileClose" aria-label="Đóng menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <nav class="mobile-nav" role="navigation" aria-label="Mobile navigation">
                <ul class="mobile-menu">
                    <li class="mobile-menu-item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-menu-link">Trang chủ</a>
                    </li>
                    <li class="mobile-menu-item">
                        <a href="<?php echo esc_url(home_url('/about_us')); ?>" class="mobile-menu-link">Giới thiệu</a>
                    </li>
                    <li class="mobile-menu-item">
                        <a href="<?php echo esc_url(home_url('/dich-vu')); ?>" class="mobile-menu-link">Dịch vụ</a>
                    </li>
                    <li class="mobile-menu-item">
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="mobile-menu-link">Liên hệ</a>
                    </li>
                </ul>
            </nav>

            <!-- Mobile Search -->
            <div class="mobile-search">
                <form role="search" method="get" class="mobile-search-form"
                    action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" class="mobile-search-input" placeholder="Tìm kiếm..." name="s"
                        autocomplete="off">
                    <button type="submit" class="mobile-search-button" aria-label="Tìm kiếm">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <!-- Mobile CTA -->
            <div class="mobile-cta">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="mobile-cta-button">
                    <i class="fa-solid fa-envelope"></i>
                    Liên hệ ngay
                </a>
            </div>

        </div>
    </div>

    <main class="site-content">