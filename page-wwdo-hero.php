<?php
/**
 * Template Name: CDA Hero About - Toyota Lâm Đồng (UPGRADED)
 * Description: Hero to About Us Scroll Transition - Enhanced Version
 */
get_header(); ?>
<section class="pp-reviews-section">
    <div class="pp-reviews-bg-pattern">
        <div class="pp-reviews-gradient-overlay"></div>

        <div class="pp-reviews-container">
            <div class="pp-reviews-header">
                <span class="pp-reviews-subtitle">TESTIMONIALS</span>
                <h2 class="pp-reviews-heading">
                    <span class="pp-text-gradient">KHÁCH HÀNG REVIEW</span>
                </h2>
            </div>

            <div class="pp-reviews-grid-wrapper">
                <div class="pp-reviews-fade-top"></div>
                <div class="pp-reviews-fade-bottom"></div>

                <div class="pp-reviews-grid">
                    <div class="pp-reviews-column pp-scroll-up">
                        <div class="pp-reviews-column-content">
                            <?php render_review_card('E', 'Ethan Collins', '@ethancoatshunter', 'Tech Startup', 'Cheap doesn\'t mean low quality here. Amazing speeds and whenever I have questions, real people answer within minutes. Perfect for my data scraping projects.'); ?>
                            <?php render_review_card('N', 'Nolan Perkins', '@_ra3nolan', 'E-commerce Business', 'The attention to detail and professionalism is outstanding. They transformed our outdated website into a modern, high-performing platform that our customers love.'); ?>
                            <?php render_review_card('J', 'Janus Tiu', '@janustiu', 'Marketing Agency', 'Working with Pixel Perfect was a game-changer for our business. Their expertise in web design and development is unmatched. Highly recommend!'); ?>

                            <?php render_review_card('E', 'Ethan Collins', '@ethancoatshunter', 'Tech Startup', 'Cheap doesn\'t mean low quality here. Amazing speeds and whenever I have questions, real people answer within minutes. Perfect for my data scraping projects.'); ?>
                            <?php render_review_card('N', 'Nolan Perkins', '@_ra3nolan', 'E-commerce Business', 'The attention to detail and professionalism is outstanding. They transformed our outdated website into a modern, high-performing platform that our customers love.'); ?>
                            <?php render_review_card('J', 'Janus Tiu', '@janustiu', 'Marketing Agency', 'Working with Pixel Perfect was a game-changer for our business. Their expertise in web design and development is unmatched. Highly recommend!'); ?>
                        </div>
                    </div>

                    <div class="pp-reviews-column pp-scroll-down">
                        <div class="pp-reviews-column-content">
                            <?php render_review_card('S', 'Sarah Johnson', '@sarahj_design', 'Design Studio', 'Exceptional service from start to finish. The team understood our vision and brought it to life with precision and creativity.'); ?>
                            <?php render_review_card('M', 'Michael Chen', '@mchen_tech', 'SaaS Company', 'Best web development partner we\'ve ever worked with. Fast, reliable, and always delivers beyond expectations.'); ?>
                            <?php render_review_card('E', 'Emma Davis', '@emmadavis', 'Healthcare Tech', 'Their innovative approach and technical skills helped us achieve our digital transformation goals. Couldn\'t be happier!'); ?>

                            <?php render_review_card('S', 'Sarah Johnson', '@sarahj_design', 'Design Studio', 'Exceptional service from start to finish. The team understood our vision and brought it to life with precision and creativity.'); ?>
                            <?php render_review_card('M', 'Michael Chen', '@mchen_tech', 'SaaS Company', 'Best web development partner we\'ve ever worked with. Fast, reliable, and always delivers beyond expectations.'); ?>
                            <?php render_review_card('E', 'Emma Davis', '@emmadavis', 'Healthcare Tech', 'Their innovative approach and technical skills helped us achieve our digital transformation goals. Couldn\'t be happier!'); ?>
                        </div>
                    </div>

                    <div class="pp-reviews-column pp-scroll-up">
                        <div class="pp-reviews-column-content">
                            <?php render_review_card('J', 'Janus Tiu', '@janustiu', 'Marketing Agency', 'Working with Pixel Perfect was a game-changer for our business. Their expertise in web design and development is unmatched. Highly recommend!'); ?>
                            <?php render_review_card('E', 'Ethan Collins', '@ethancoatshunter', 'Tech Startup', 'Cheap doesn\'t mean low quality here. Amazing speeds and whenever I have questions, real people answer within minutes. Perfect for my data scraping projects.'); ?>
                            <?php render_review_card('N', 'Nolan Perkins', '@_ra3nolan', 'E-commerce Business', 'The attention to detail and professionalism is outstanding. They transformed our outdated website into a modern, high-performing platform that our customers love.'); ?>

                            <?php render_review_card('J', 'Janus Tiu', '@janustiu', 'Marketing Agency', 'Working with Pixel Perfect was a game-changer for our business. Their expertise in web design and development is unmatched. Highly recommend!'); ?>
                            <?php render_review_card('E', 'Ethan Collins', '@ethancoatshunter', 'Tech Startup', 'Cheap doesn\'t mean low quality here. Amazing speeds and whenever I have questions, real people answer within minutes. Perfect for my data scraping projects.'); ?>
                            <?php render_review_card('N', 'Nolan Perkins', '@_ra3nolan', 'E-commerce Business', 'The attention to detail and professionalism is outstanding. They transformed our outdated website into a modern, high-performing platform that our customers love.'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Helper Function để render card (Bạn có thể đặt function này trong functions.php hoặc đầu file)
function render_review_card($initial, $name, $handle, $role, $content) {
    ?>
<div class="pp-review-card">
    <div class="pp-card-header">
        <div class="pp-card-avatar">
            <?php echo $initial; ?>
        </div>
        <div class="pp-card-info">
            <h3 class="pp-card-name"><?php echo $name; ?></h3>
            <p class="pp-card-handle"><?php echo $handle; ?></p>
            <p class="pp-card-role"><?php echo $role; ?></p>
        </div>
    </div>
    <div class="pp-card-stars">
        <?php for($i=0; $i<5; $i++): ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="pp-star-icon">
            <path
                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
            </path>
        </svg>
        <?php endfor; ?>
    </div>
    <p class="pp-card-text"><?php echo $content; ?></p>
</div>
<?php
}
?>

<?php get_footer(); ?>