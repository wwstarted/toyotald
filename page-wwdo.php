<?php
/**
 * Template Name: wwdo - Toyota Lâm Đồng
 * Description: Section What We Do - Modern & Trendy Design
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

                <p class="cda-hero-tagline">
                    A collective of strategists,<br>
                    storytellers, and makers.
                </p>

                <h1 class="cda-hero-word cda-word-left">
                    <span class="cda-hero-line">Agency</span>
                </h1>
            </div>

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
                    meaningful, purposeful, and intentional.
                </h2>
            </div>
        </div>
    </div>
</section>

<div class="cda-scroll-spacer"></div>

<section class="wwd-section" id="whatWeDo">

    <div class="wwd-scroll-container">

        <div class="wwd-bg-wrapper">
            <div class="wwd-bg-container">

                <?php
                // Define image URLs for each service
                $serviceImages = [
                    1 => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800', // Branding - Creative/Design
                    2 => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800', // Digital - Technology
                    3 => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=800'  // Enterprise - Business
                ];

                // Pattern mapping: 1-2 for Service 1, 3-4 for Service 2, 5-6 for Service 3
                for ($p = 1; $p <= 6; $p++):
                    // Determine which service this pattern belongs to
                    $serviceIndex = ceil($p / 2);
                    $imageUrl = $serviceImages[$serviceIndex];
                    ?>
                <div class="wwd-pattern" data-pattern="<?php echo $p; ?>">
                    <div class="wwd-pattern-image">
                        <img src="<?php echo $imageUrl; ?>"
                            alt="Service <?php echo $serviceIndex; ?> - Pattern <?php echo $p; ?>" loading="lazy">
                    </div>
                </div>
                <?php endfor; ?>

            </div>
        </div>

        <div class="wwd-content-wrapper">

            <!-- Title Inside Content Area -->
            <div class="wwd-content-header">
                <h2 class="wwd-section-title">What We Do</h2>
            </div>

            <div class="wwd-service-slide" data-service="1">
                <article class="wwd-card">
                    <div class="wwd-card-inner">
                        <span class="wwd-card-number">01</span>
                        <h3 class="wwd-card-title">Branding</h3>
                        <p class="wwd-card-desc">
                            We craft distinctive brand identities rooted in strategy and cultural insight — built to
                            spark connection and endure change.
                        </p>
                        <ul class="wwd-card-list">
                            <li>Brand Strategy & Architecture</li>
                            <li>ToV & Messaging Framework</li>
                            <li>Visual Identity</li>
                            <li>Typeface Design</li>
                            <li>Packaging Design</li>
                            <li>Event, Installation & Spatial</li>
                            <li>Motions, Illustrations, and 3D</li>
                            <li>Comprehensive Brand Guideline & System</li>
                        </ul>
                    </div>
                </article>
                <div class="wwd-service-divider"></div>
            </div>

            <div class="wwd-service-slide" data-service="2">
                <article class="wwd-card">
                    <div class="wwd-card-inner">
                        <span class="wwd-card-number">02</span>
                        <h3 class="wwd-card-title">Digital Experience</h3>
                        <p class="wwd-card-desc">
                            From websites to interactive systems, we design digital journeys that are immersive,
                            intuitive, and conversion-driven.
                        </p>
                        <ul class="wwd-card-list">
                            <li>User Experience & Interface</li>
                            <li>Digital Storytelling</li>
                            <li>Concept & Prototype</li>
                            <li>Web Design & Development</li>
                            <li>CMS, Analytics & Optimization</li>
                        </ul>
                    </div>
                </article>
                <div class="wwd-service-divider"></div>
            </div>

            <div class="wwd-service-slide" data-service="3">
                <article class="wwd-card">
                    <div class="wwd-card-inner">
                        <span class="wwd-card-number">03</span>
                        <h3 class="wwd-card-title">Enterprise Solutions</h3>
                        <p class="wwd-card-desc">
                            Our proprietary tools and talent model streamline brand management, scale operations, and
                            unlock long-term creative efficiency.
                        </p>
                        <ul class="wwd-card-list">
                            <li>ODC & Dedicated Personnel</li>
                            <li>Brand Cōmpass™ & CōllectCMS™</li>
                            <li>CMS, API & Data Integrations</li>
                            <li>AI Automation, Solutions & Integrations</li>
                            <li>Collective Care & DevOps</li>
                        </ul>
                    </div>
                </article>
            </div>

        </div>

    </div>

</section>

<!-- Select Projects Section - Horizontal Carousel -->
<section class="sp-section" id="selectProjects">

    <!-- Section Title -->
    <div class="sp-header">
        <h2 class="sp-title">Select <span class="sp-dot">·</span> Projects</h2>
    </div>

    <!-- Carousel Container -->
    <div class="sp-carousel-wrapper">
        <div class="sp-carousel-container">
            <div class="sp-carousel-track" data-active-index="0">

                <?php
                // Sample projects data - Replace with your actual data
                $projects = array(
                    array(
                        'id' => 1,
                        'title' => 'ADB Water Forum 2025',
                        'category' => 'Brand Identity, Event Design',
                        'image' => 'project-1.jpg',
                        'url' => '/work/awuf-2025'
                    ),
                    array(
                        'id' => 2,
                        'title' => 'CIAT Agro-climatic Communications',
                        'category' => 'Brand Identity, User Experience',
                        'image' => 'https://tse3.mm.bing.net/th/id/OIP.2HifpoMcZx7zzbAhtu5gXAHaHa?pid=Api&P=0&h=220',
                        'url' => '/work/ciat'
                    ),
                    array(
                        'id' => 3,
                        'title' => 'Pao Cafe',
                        'category' => 'Branding, Visual Identity',
                        'image' => 'https://tse4.mm.bing.net/th/id/OIP.FHYFvA22rWQlmNlDbCowHAHaLc?pid=Api&P=0&h=220',
                        'url' => '/work/pao-cafe'
                    ),
                    array(
                        'id' => 4,
                        'title' => 'Horos',
                        'category' => 'Digital Experience, Web Design',
                        'image' => 'https://tse2.mm.bing.net/th/id/OIP.WbD7C8-F9V72mUow5CqcMAHaKe?pid=Api&P=0&h=220',
                        'url' => '/work/horos'
                    ),
                    array(
                        'id' => 5,
                        'title' => 'Shleep',
                        'category' => 'Packaging Design, Branding',
                        'image' => 'https://tse3.mm.bing.net/th/id/OIP.IncQOhk6kY3KSEP_XbfG1wHaJl?pid=Api&P=0&h=220',
                        'url' => '/work/shleep'
                    ),
                    array(
                        'id' => 6,
                        'title' => 'Ento',
                        'category' => 'Packaging, Visual Identity',
                        'image' => 'https://tse4.mm.bing.net/th/id/OIP.ILqW6aOrUgFBKZG9Gu-6vwHaJl?pid=Api&P=0&h=220',
                        'url' => '/work/ento'
                    ),
                    array(
                        'id' => 7,
                        'title' => 'We Create Content',
                        'category' => 'Branding, Marketing',
                        'image' => 'https://tse1.mm.bing.net/th/id/OIP.FvPyjGhAioKBFOq2T31AdgHaHa?pid=Api&P=0&h=220',
                        'url' => '/work/wcc'
                    ),
                    array(
                        'id' => 8,
                        'title' => 'The American School',
                        'category' => 'Brand Strategy, Design',
                        'image' => 'https://sp.yimg.com/ib/th/id/OIP.Ct1_luZYjYGJ0vh-njBZAgAAAA?pid=Api&w=148&h=148&c=7&dpr=2&rs=1',
                        'url' => '/work/tas'
                    ),
                    array(
                        'id' => 9,
                        'title' => 'Coeus Collective',
                        'category' => 'Visual Identity, Branding',
                        'image' => 'https://sp.yimg.com/ib/th/id/OIP.gajdA_HGnuciREMof5xG_gAAAA?pid=Api&w=148&h=148&c=7&dpr=2&rs=1',
                        'url' => '/work/coeus'
                    ),
                    array(
                        'id' => 10,
                        'title' => 'Vietnam is Awesome',
                        'category' => 'Campaign Design, Digital',
                        'image' => 'https://sp.yimg.com/ib/th/id/OIP.ToGIP-vRte4wQf8V3bos7gAAAA?pid=Api&w=148&h=148&c=7&dpr=2&rs=1',
                        'url' => '/work/via'
                    )
                );

                foreach ($projects as $index => $project):
                    ?>

                <a href="<?php echo esc_url($project['url']); ?>" class="sp-project-card"
                    data-index="<?php echo $index; ?>">

                    <!-- Image Container -->
                    <div class="sp-card-image-wrapper">
                        <img src="<?php echo esc_url($project['image']); ?>"
                            alt="<?php echo esc_attr($project['title']); ?>" loading="lazy" class="sp-card-image">

                        <!-- Hover Overlay -->
                        <div class="sp-card-overlay">
                            <span class="sp-card-view-text">View Project →</span>
                        </div>
                    </div>

                </a>

                <?php endforeach; ?>

            </div>
        </div>

        <!-- Navigation Controls (Optional) -->
        <div class="sp-nav-controls">
            <button class="sp-nav-btn sp-nav-prev" aria-label="Previous project">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
            <button class="sp-nav-btn sp-nav-next" aria-label="Next project">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Project Info Display -->
    <div class="sp-project-info">
        <h3 class="sp-info-title" id="spInfoTitle">ADB Water Forum 2025</h3>
        <p class="sp-info-category" id="spInfoCategory">Brand Identity, Event Design</p>
    </div>

    <!-- View All Button -->
    <div class="sp-footer">
        <a href="/work" class="sp-view-all-btn">
            View all projects
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M4 10H16M16 10L11 5M16 10L11 15" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" />
            </svg>
        </a>
    </div>

</section>

<?php get_footer(); ?>