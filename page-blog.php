<?php
/**
 * Template Name: section blogs - Modern Layout
 * Description: Trang giới thiệu Toyota Lâm Đồng với layout hiện đại, đơn giản.
 */
get_header();
?>

<section id="hero-section" class="hero-section">

    <!-- Video Background Layer -->
    <div class="hero-video-wrapper">
        <video class="hero-video-bg" autoplay muted loop playsinline
            poster="<?php echo $theme_uri; ?>/assets/images/video-poster.jpg">
            <source src="https://videos.pexels.com/video-files/3129671/3129671-uhd_2560_1440_30fps.mp4"
                type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Overlay -->
        <div class="hero-overlay"></div>
    </div>

    <!-- Content Container -->
    <div class="hero-content-wrapper">
        <div class="container">
            <div class="hero-content">

                <!-- Label -->
                <div class="hero-label" data-aos="fade-up" data-aos-delay="100">
                    <span>Thiết kế website</span>
                </div>

                <!-- Main Heading -->
                <h1 class="hero-heading" data-aos="fade-up" data-aos-delay="200">
                    PixelPerfect
                </h1>

                <!-- Description -->
                <p class="hero-description" data-aos="fade-up" data-aos-delay="300">
                    Thiết kế website doanh nghiệp có thể giúp cho các công ty có thể xây dựng thương hiệu trên kênh
                    Online, quảng bá sản phẩm đến với các khách hàng một cách nhanh chóng và dễ dàng.
                </p>

                <!-- CTA Button -->
                <div class="hero-cta" data-aos="fade-up" data-aos-delay="400">
                    <a href="#contact" class="btn-primary hero-btn">
                        Yêu cầu báo giá
                        <svg class="btn-icon" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>

                <!-- Brand Logos -->
                <div class="hero-brands" data-aos="fade-up" data-aos-delay="500">
                    <div class="brand-item">
                        <span>Savills</span>
                    </div>
                    <div class="brand-item">
                        <span>DKRS</span>
                    </div>
                    <div class="brand-item">
                        <span>Cenco</span>
                    </div>
                    <div class="brand-item">
                        <span>Trans</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Device Mockup Image (No Background) -->
    <div class="hero-mockup" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
        <img src="https://thuythu.vn/wp-content/uploads/2023/11/Mask-group-39-1.png"
            alt="Website hiển thị trên các thiết bị" class="mockup-image" loading="eager">
    </div>

</section>



<?php get_footer(); ?>