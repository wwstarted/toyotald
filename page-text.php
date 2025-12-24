<?php
/**
 * Template Name: text - Toyota Lâm Đồng
 * Description: Trang blog hiện đại cho đại lý xe Toyota với featured posts, mixed grid layout
 */
get_header(); ?>

<section class="what-we-do" id="whatWeDo">
    <div class="wwd-container">

        <!-- LEFT: IMAGE -->
        <div class="wwd-left">
            <div class="wwd-images">
                <div class="wwd-image active" data-index="0">
                    <img src="https://th.bing.com/th?id=OIF.xNA9DKU0O4%2bT1YAeFBdaMA&w=115&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1"
                        alt="">
                </div>
                <div class="wwd-image" data-index="1">
                    <img src="https://th.bing.com/th/id/OIF.dhpOSCPb8M1vZHHOBxmtSw?w=115&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1"
                        alt="">
                </div>
                <div class="wwd-image" data-index="2">
                    <img src="https://th.bing.com/th?id=OIF.dDOQqGC%2bmk5BWKpHO4%2f5hg&w=115&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1"
                        alt="">
                </div>
            </div>
        </div>

        <!-- RIGHT: CONTENT -->
        <div class="wwd-right">
            <div class="wwd-services">

                <div class="wwd-service active" data-index="0">
                    <span class="eyebrow">01</span>
                    <h2>Brand Strategy</h2>
                    <p>We help brands define purpose, positioning and long-term vision.</p>
                </div>

                <div class="wwd-service" data-index="1">
                    <span class="eyebrow">02</span>
                    <h2>Creative Design</h2>
                    <p>Design systems and visual languages that scale across platforms.</p>
                </div>

                <div class="wwd-service" data-index="2">
                    <span class="eyebrow">03</span>
                    <h2>Digital Experience</h2>
                    <p>Web experiences built with clarity, performance and emotion.</p>
                </div>

            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>