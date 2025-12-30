<?php
/**
 * Template Name: section blogs - Modern Layout
 * Description: Trang giới thiệu Toyota Lâm Đồng với layout hiện đại, đơn giản.
 */
get_header();
?>
<!-- Contact Section - Minimalist Split Layout -->
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

<?php get_footer(); ?>