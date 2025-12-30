<?php
/**
 * Template Name: section blogs - Modern Layout
 * Description: Trang giới thiệu Toyota Lâm Đồng với layout hiện đại, đơn giản.
 */
get_header();
?>

<section class="cda-hero-section" id="cdaHero">
    <div class="cda-hero-container">
        <!-- NEW: Enhanced Background - Grid + Floating Dots with Parallax -->
        <div class="cda-hero-bg">
            <div class="cda-grid-lines"></div>
            <div class="cda-floating-dots" id="cdaFloatingDots"></div>
        </div>

        <!-- Hero Text Content - Centered Vertically -->
        <div class="cda-hero-content">
            <div class="cda-hero-grid">
                <!-- Pixel (left top) -->
                <h1 class="cda-hero-word cda-word-left">
                    <span class="cda-hero-line">Pixel</span>
                </h1>
                <!-- Perfect (right top) -->
                <h1 class="cda-hero-word cda-word-right">
                    <span class="cda-hero-line">Perfect</span>
                </h1>
                <!-- Agency (center bottom) -->
                <h1 class="cda-hero-word cda-word-center">
                    <span class="cda-hero-line">Agency</span>
                </h1>
            </div>

            <!-- Auto Sliding Subtitles - Centered -->
            <div class="cda-hero-subtitles" id="cdaHeroSubtitles">
                <div class="cda-subtitle-item active">CDA Creative Agency</div>
                <div class="cda-subtitle-item">We partner with ambitious brands</div>
                <div class="cda-subtitle-item">Crafting meaningful digital experiences</div>
            </div>
        </div>

        <!-- Video Intro - Keep unchanged -->
        <div class="cda-video-intro" id="cdaVideoIntro">
            <div class="cda-video-wrapper">
                <video autoplay loop muted playsinline class="cda-video">
                    <source src="<?php echo get_template_directory_uri(); ?>/uploads/video/videointro.mp4"
                        type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="cda-video-fallback">
                    <div class="cda-logo-animated">
                        <svg width="80" height="80" viewBox="0 0 120 120">
                            <circle cx="60" cy="60" r="50" fill="none" stroke="#fff" stroke-width="2" />
                            <path d="M60 20 L60 100 M20 60 L100 60" stroke="#fff" stroke-width="2" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="cda-scroll-indicator">
            <span>SCROLL</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 5V19M12 19L5 12M12 19L19 12" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" />
            </svg>
        </div>
    </div>
</section>

<!-- ================= ABOUT SECTION (GIỮ NGUYÊN) ================= -->
<section class="cda-about-section" id="cdaAbout">
    <div class="cda-about-container">

        <div class="cda-about-left">
            <div class="cda-globe-pattern">
                <canvas id="cdaGlobeCanvas"></canvas>
            </div>

            <div class="cda-locations">
                <p class="cda-locations-title">Our team are<br>located in:</p>
                <ul class="cda-locations-list">
                    <li class="cda-location-item">New York</li>
                    <li class="cda-location-item">Hanoi</li>
                    <li class="cda-location-item">Ho Chi Minh City</li>
                    <li class="cda-location-item">Singapore</li>
                </ul>
            </div>
        </div>

        <div class="cda-about-right">
            <div class="cda-video-settled-area" id="cdaVideoSettledArea">
                <div class="cda-video-text-overlay">
                    <span class="cda-overlay-text">Stories</span>
                    <span class="cda-overlay-text">Systems</span>
                    <span class="cda-overlay-text">Solutions</span>
                </div>
            </div>

            <div class="cda-description">
                <h2 class="cda-description-text">
                    CDA is a vision-driven, human-centered creative consultancy that helps brands become more
                    meaningful,
                    purposeful, and intentional.
                </h2>
            </div>
        </div>

    </div>
</section>



<?php get_footer(); ?>