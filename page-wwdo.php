<?php
/**
 * Template Name: wwdo - Toyota Lâm Đồng
 * Description: Section What We Do - Modern & Trendy Design
 */
get_header(); ?>

<!-- Hero Section -->
<section class="cda-hero-section" id="cdaHero">
    <div class="cda-hero-container">
        <!-- Hero Text Content -->
        <div class="cda-hero-content">
            <div class="cda-hero-grid">
                <!-- Row 1: Collective (left) + Design (right) -->
                <h1 class="cda-hero-word cda-word-left">
                    <span class="cda-hero-line">Pixel</span>
                </h1>
                <h1 class="cda-hero-word cda-word-right">
                    <span class="cda-hero-line">Perfect</span>
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

        <!-- UPGRADED: 3D Sphere Pattern Background (Canvas) -->
        <div class="cda-pattern-3d" id="cdaPattern3D">
            <canvas id="cdaSphereCanvas" class="cda-sphere-canvas"></canvas>
        </div>

        <!-- Video Intro Container (starts bottom-right at 50% size) -->
        <div class="cda-video-intro" id="cdaVideoIntro">
            <div class="cda-video-wrapper">
                <video autoplay loop muted playsinline class="cda-video">
                    <source src="<?php echo get_template_directory_uri(); ?>/uploads/video/videointro.mp4"
                        type="video/mp4">
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
            <!-- 3D Globe Canvas -->
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

<section class="wwd-section" id="whatWeDo">

    <div class="wwd-scroll-container">

        <div class="wwd-bg-wrapper">
            <div class="wwd-bg-container">

                <?php
                // Define image URLs for each service
                $serviceImages = [
                    1 => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800', // Branding - Creative/Design
                    2 => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800', // Digital - Technology
                    3 => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=800', // Enterprise - Business
                    4 => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800'  // Strategy - Planning/Analytics
                ];

                // Pattern mapping: 1-2 for Service 1, 3-4 for Service 2, 5-6 for Service 3, 7-8 for Service 4
                for ($p = 1; $p <= 8; $p++):
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
                <div class="wwd-service-divider"></div>
            </div>

            <div class="wwd-service-slide" data-service="4">
                <article class="wwd-card">
                    <div class="wwd-card-inner">
                        <span class="wwd-card-number">04</span>
                        <h3 class="wwd-card-title">Strategy & Consulting</h3>
                        <p class="wwd-card-desc">
                            We transform business challenges into strategic opportunities through data-driven insights
                            and
                            collaborative thinking that drives measurable results.
                        </p>
                        <ul class="wwd-card-list">
                            <li>Market Research & Analysis</li>
                            <li>Competitive Intelligence</li>
                            <li>Business Model Innovation</li>
                            <li>Go-to-Market Strategy</li>
                            <li>Customer Journey Mapping</li>
                            <li>Brand Positioning & Differentiation</li>
                            <li>Digital Transformation Roadmap</li>
                            <li>Performance Metrics & KPIs</li>
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

<section class="blog-section" id="blogSection">
    <div class="blog-container">
        <div class="blog-header">
            <div class="blog-section-label">Insights</div>
            <h2>See what's on <em>our mind.</em></h2>
        </div>
        <a href="/insights" class="view-more">View more</a>

        <div class="blog-grid">
            <!-- Blog Card 1 -->
            <article class="blog-card">
                <a href="/insights/branding-is-not-your-logo" class="blog-card-link">
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1634942537034-2531766767d1?w=800&h=600&fit=crop"
                            alt="Logo Design">
                    </div>
                    <div class="blog-content">
                        <div class="blog-category">Opinion</div>
                        <h3 class="blog-title">Branding is Not Your Logo. It Never Was.</h3>
                        <div class="blog-meta">06/01/2025 — by Minh Nguyen</div>
                    </div>
                </a>
            </article>

            <!-- Blog Card 2 -->
            <article class="blog-card">
                <a href="/insights/agile-for-creativity" class="blog-card-link">
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&h=600&fit=crop"
                            alt="Agile Creativity">
                    </div>
                    <div class="blog-content">
                        <div class="blog-category">Opinion</div>
                        <h3 class="blog-title">Agile for Creativity? Let's Be Honest</h3>
                        <div class="blog-meta">06/01/2025 — by Minh Nguyen</div>
                    </div>
                </a>
            </article>

            <!-- Blog Card 3 -->
            <article class="blog-card">
                <a href="/insights/vietnam-uae-relations" class="blog-card-link">
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800&h=600&fit=crop"
                            alt="Vietnam UAE Relations">
                    </div>
                    <div class="blog-content">
                        <div class="blog-category">Press</div>
                        <h3 class="blog-title">Marking a Milestone: 30 Years of Vietnam–UAE Relations</h3>
                        <div class="blog-meta">06/02/2025 — by Minh Nguyen</div>
                    </div>
                </a>
            </article>

            <!-- Blog Card 4 -->
            <article class="blog-card">
                <a href="/insights/ai-branding-agencies" class="blog-card-link">
                    <div class="blog-image">
                        <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&h=600&fit=crop"
                            alt="AI and Branding">
                    </div>
                    <div class="blog-content">
                        <div class="blog-category">Opinion</div>
                        <h3 class="blog-title">Do brands still need branding agencies in the age of AI?</h3>
                        <div class="blog-meta">06/02/2025 — by Minh Do</div>
                    </div>
                </a>
            </article>
        </div>
    </div>
</section>

<section class="contact-section" id="contactSection">
    <div class="contact-container">

        <!-- Left Side: Heading + Info -->
        <div class="contact-left">
            <div class="contact-header">
                <span class="contact-label">Contact</span>
                <h2 class="contact-title">
                    Let's work<br>
                    <em>together</em>
                </h2>
                <p class="contact-subtitle">
                    The best things in life start with a conversation.<br>
                    Let's have ours.
                </p>
            </div>

            <!-- Contact Info -->
            <div class="contact-info">
                <div class="contact-info-item">
                    <span class="contact-info-label">Email</span>
                    <a href="mailto:hello@collectivedesign.agency" class="contact-info-link">
                        hello@collectivedesign.agency
                    </a>
                </div>

                <div class="contact-info-item">
                    <span class="contact-info-label">Phone</span>
                    <a href="tel:+84123456789" class="contact-info-link">
                        +(84) 123 456 789
                    </a>
                </div>

                <div class="contact-info-item">
                    <span class="contact-info-label">Location</span>
                    <p class="contact-info-text">
                        Ho Chi Minh City, Vietnam
                    </p>
                </div>
            </div>

            <!-- Social Links -->
            <div class="contact-social">
                <span class="contact-social-label">Follow us</span>
                <div class="contact-social-links">
                    <a href="https://www.facebook.com/" target="_blank" rel="noopener" class="contact-social-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener" class="contact-social-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/" target="_blank" rel="noopener" class="contact-social-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>
                    <a href="https://twitter.com/" target="_blank" rel="noopener" class="contact-social-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Side: Contact Form -->
        <div class="contact-right">
            <form class="contact-form" id="contactForm" action="/submit-contact" method="POST">

                <!-- Name Input -->
                <div class="contact-form-group">
                    <label for="contactName" class="contact-form-label">Your name</label>
                    <input type="text" id="contactName" name="name" class="contact-form-input" placeholder="John Doe"
                        required>
                </div>

                <!-- Email Input -->
                <div class="contact-form-group">
                    <label for="contactEmail" class="contact-form-label">Your email</label>
                    <input type="email" id="contactEmail" name="email" class="contact-form-input"
                        placeholder="john@example.com" required>
                </div>

                <!-- Message Textarea -->
                <div class="contact-form-group">
                    <label for="contactMessage" class="contact-form-label">Your message</label>
                    <textarea id="contactMessage" name="message" class="contact-form-textarea"
                        placeholder="Tell us about your project..." rows="6" required></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="contact-form-submit">
                    <span class="contact-submit-text">Send message</span>
                    <svg class="contact-submit-arrow" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M4 10H16M16 10L11 5M16 10L11 15" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                </button>

                <!-- Form Status Message -->
                <div class="contact-form-status" id="contactFormStatus"></div>
            </form>
        </div>

    </div>
</section>

<?php get_footer(); ?>