<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right');
    bloginfo('name'); ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Header New CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/header-new.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Modern Header with Transparent Effect -->
    <header class="header-new" id="headerNew">
        <div class="header-new-container">

            <!-- Logo Section -->
            <div class="header-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link" aria-label="Trang chủ">
                    <img src="https://v0-page-pp.vercel.app/images/logo.png" alt="PixelPerfect Logo" class="site-logo">
                </a>
            </div>

            <!-- Main Navigation -->
            <nav class="header-nav" role="navigation" aria-label="Main navigation">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo esc_url(home_url('/dich-vu')); ?>" class="nav-link">
                            DỊCH VỤ
                            <i class="fa-solid fa-chevron-down"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo esc_url(home_url('/quy-trinh')); ?>" class="nav-link">QUY TRÌNH</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo esc_url(home_url('/bang-gia')); ?>" class="nav-link">BẢNG GIÁ</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo esc_url(home_url('/kien-thuc')); ?>" class="nav-link">KIẾN THỨC</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="nav-link">LIÊN HỆ</a>
                    </li>
                </ul>
            </nav>

            <!-- Header Actions (Search + CTA) -->
            <div class="header-actions">

                <!-- Search with Expand Animation -->
                <div class="header-search" id="headerSearch">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>"
                        id="searchForm">
                        <input type="search" class="search-input" placeholder="Tìm kiếm..." name="s"
                            value="<?php echo get_search_query(); ?>" autocomplete="off" id="searchInput">

                        <button type="button" class="search-icon-btn" aria-label="Tìm kiếm" id="searchIconBtn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                        <!-- Search Dropdown -->
                        <div class="search-dropdown" id="searchDropdown">
                            <div class="search-dropdown-content">

                                <!-- Loading State -->
                                <div class="search-state search-loading">
                                    <i class="fa-solid fa-spinner fa-spin"></i>
                                    <span>Đang tìm kiếm...</span>
                                </div>

                                <!-- Results Container -->
                                <div class="search-results">
                                    <!-- Products Section -->
                                    <div class="search-section" id="productsSection">
                                        <div class="search-section-header">
                                            <i class="fa-solid fa-box"></i>
                                            <span>SẢN PHẨM</span>
                                        </div>
                                        <div class="search-section-results" id="productsResults"></div>
                                    </div>

                                    <!-- Posts Section -->
                                    <div class="search-section" id="postsSection">
                                        <div class="search-section-header">
                                            <i class="fa-solid fa-newspaper"></i>
                                            <span>BÀI VIẾT</span>
                                        </div>
                                        <div class="search-section-results" id="postsResults"></div>
                                    </div>
                                </div>

                                <!-- Empty State -->
                                <div class="search-state search-empty">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <p>Không tìm thấy kết quả</p>
                                    <span>Thử với từ khóa khác</span>
                                </div>

                                <!-- Error State -->
                                <div class="search-state search-error">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <p>Có lỗi xảy ra</p>
                                    <span>Vui lòng thử lại</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- CTA Button -->
                <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="cta-button">
                    Liên hệ ngay
                </a>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-toggle" id="mobileToggle" aria-label="Menu" aria-expanded="false">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
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
                    <img src="https://v0-page-pp.vercel.app/images/logo.png" alt="PixelPerfect Logo"
                        class="mobile-logo-img">
                </a>
                <button class="mobile-close" id="mobileClose" aria-label="Đóng menu">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <nav class="mobile-nav" role="navigation" aria-label="Mobile navigation">
                <ul class="mobile-menu">
                    <li class="mobile-menu-item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-menu-link">TRANG CHỦ</a>
                    </li>
                    <li class="mobile-menu-item">
                        <a href="<?php echo esc_url(home_url('/dich-vu')); ?>" class="mobile-menu-link">DỊCH VỤ</a>
                    </li>
                    <li class="mobile-menu-item">
                        <a href="<?php echo esc_url(home_url('/quy-trinh')); ?>" class="mobile-menu-link">QUY TRÌNH</a>
                    </li>
                    <li class="mobile-menu-item">
                        <a href="<?php echo esc_url(home_url('/bang-gia')); ?>" class="mobile-menu-link">BẢNG GIÁ</a>
                    </li>
                    <li class="mobile-menu-item">
                        <a href="<?php echo esc_url(home_url('/kien-thuc')); ?>" class="mobile-menu-link">KIẾN THỨC</a>
                    </li>
                    <li class="mobile-menu-item">
                        <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="mobile-menu-link">LIÊN HỆ</a>
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
                <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="mobile-cta-button">
                    <i class="fa-solid fa-envelope"></i>
                    Liên hệ ngay
                </a>
            </div>

        </div>
    </div>

    <!-- Header New JS -->
    <script src="<?php echo get_template_directory_uri(); ?>/header-new.js"></script>

    <main class="site-content">
        <!-- Page content goes here -->
    </main>

    <?php wp_footer(); ?>
</body>

</html>