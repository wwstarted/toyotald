<?php
/**
 * Template Name: CDA Hero About - Toyota Lâm Đồng
 * Description: Hero to About Us Scroll Transition - Final Version
 */
get_header(); ?>

<!-- Hero Section -->
<section class="cda-hero-section" id="cdaHero">
    <div class="cda-hero-container">
        <!-- Hero Text Content - New Grid Layout -->
        <div class="cda-hero-content">
            <!-- Hero Grid: Split layout -->
            <div class="cda-hero-grid">
                <!-- Row 1: Collective (left) + Design (right) -->
                <h1 class="cda-hero-word cda-word-left">
                    <span class="cda-hero-line">Collective</span>
                </h1>
                <h1 class="cda-hero-word cda-word-right">
                    <span class="cda-hero-line">Design</span>
                </h1>

                <!-- Row 2: Tagline (center, spans both columns) -->
                <p class="cda-hero-tagline">
                    A collective of strategists,<br>
                    storytellers, and makers.
                </p>

                <!-- Row 3: Agency (left) -->
                <h1 class="cda-hero-word cda-word-left">
                    <span class="cda-hero-line">Agency</span>
                </h1>
            </div>

            <!-- Description below grid -->
            <p class="cda-hero-subtitle">
                Designing intentional experiences<br>
                across brand and digital.
            </p>
        </div>

        <!-- Decorative Pattern Background - Green/Lime (More Visible) -->
        <div class="cda-pattern cda-pattern-green"></div>

        <!-- Video Intro Container (starts bottom-right at 50% size) -->
        <div class="cda-video-intro" id="cdaVideoIntro">
            <div class="cda-video-wrapper">
                <video autoplay loop muted playsinline class="cda-video">
                    <source src="<?php echo get_template_directory_uri(); ?>/uploads/video/intro.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <!-- Fallback -->
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

<!-- About Us Section -->
<section class="cda-about-section" id="cdaAbout">
    <div class="cda-about-container">

        <!-- Left Side: 3D Globe + Locations -->
        <div class="cda-about-left">
            <!-- 3D Globe Canvas (Option B - Canvas + Math) -->
            <div class="cda-globe-pattern">
                <canvas id="cdaGlobeCanvas" class="cda-globe-canvas"></canvas>
            </div>

            <!-- Locations (Bottom-left corner) -->
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

        <!-- Right Side: Video Box (settled) + Description -->
        <div class="cda-about-right">
            <!-- Video Box Placeholder (video will settle here) -->
            <div class="cda-video-settled-area" id="cdaVideoSettledArea">
                <!-- Video text overlay -->
                <div class="cda-video-text-overlay">
                    <span class="cda-overlay-text">Stories</span>
                    <span class="cda-overlay-text">Systems</span>
                    <span class="cda-overlay-text">Solutions</span>
                </div>
            </div>

            <!-- Company Description -->
            <div class="cda-description">
                <h2 class="cda-description-text">
                    CDA is a vision-driven, human-centered creative consultancy that helps brands become more
                    meaningful, purposeful, and intentional.
                </h2>
            </div>
        </div>
    </div>
</section>

<div class="cda-scroll-spacer"></div>

<?php get_footer(); ?>