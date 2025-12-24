<?php
/**
 * Template Name: Single Post Modern - Toyota Lâm Đồng
 * Description: Trang chi tiết bài viết với layout hiện đại, optimize cho car dealership
 */
get_header(); ?>

<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-modern'); ?>>

    <!-- Reading Progress Bar -->
    <div class="reading-progress-bar" id="reading-progress"></div>

    <!-- Breadcrumb & Quick Nav -->
    <section class="post-breadcrumb">
        <div class="container">
            <div class="breadcrumb-wrapper">
                <div class="breadcrumb-links">
                    <a href="<?php echo home_url(); ?>"><i class="fa-solid fa-house"></i> Trang chủ</a>
                    <span class="separator">/</span>
                    <a href="<?php echo get_post_type_archive_link('post'); ?>">Tin tức</a>
                    <span class="separator">/</span>
                    <?php $category = get_the_category();
                            if ($category): ?>
                    <a
                        href="<?php echo get_category_link($category[0]->term_id); ?>"><?php echo $category[0]->name; ?></a>
                    <?php endif; ?>
                </div>
                <button class="back-btn" onclick="history.back()">
                    <i class="fa-solid fa-arrow-left"></i> Quay lại
                </button>
            </div>
        </div>
    </section>

    <!-- Hero Section with Featured Image -->
    <section class="post-hero">
        <div class="hero-image-wrapper">
            <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full', array('class' => 'hero-featured-image')); ?>
            <?php else: ?>
            <img src="https://img.freepik.com/premium-photo/colorful-linear-movements-abstract-graphic-poster-abstract-background-with-colorful-gradient-ai-generated_497837-22403.jpg"
                alt="<?php the_title(); ?>" class="hero-featured-image">
            <?php endif; ?>
            <div class="hero-overlay"></div>

            <div class="container">
                <div class="hero-content">
                    <?php $category = get_the_category();
                            if ($category): ?>
                    <span class="post-category-badge"><?php echo $category[0]->name; ?></span>
                    <?php endif; ?>

                    <h1 class="post-title"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Meta Bar - Sticky -->
    <section class="post-meta-bar" id="meta-bar">
        <div class="container">
            <div class="meta-bar-content">
                <div class="meta-left">
                    <div class="author-info">
                        <?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                        <div class="author-details">
                            <span class="author-name"><?php the_author(); ?></span>
                            <span class="post-date">
                                <i class="fa-regular fa-calendar"></i>
                                <?php echo get_the_date('d/m/Y'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="post-stats">
                        <span class="stat-item">
                            <i class="fa-regular fa-eye"></i>
                            <span class="view-count"><?php echo rand(800, 5000); ?></span> views
                        </span>
                        <span class="stat-item">
                            <i class="fa-regular fa-clock"></i>
                            <span class="read-time"><?php echo reading_time(); ?></span> phút đọc
                        </span>
                    </div>
                </div>

                <div class="meta-right">
                    <div class="social-share-inline">
                        <button class="share-btn facebook" onclick="shareOnFacebook()">
                            <i class="fa-brands fa-facebook-f"></i> Share
                        </button>
                        <button class="share-btn zalo" onclick="shareOnZalo()">
                            <i class="fa-solid fa-z"></i> Zalo
                        </button>
                        <button class="share-btn copy" onclick="copyLink()">
                            <i class="fa-solid fa-link"></i> Copy
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Area -->
    <section class="post-content-section">
        <div class="container">
            <div class="post-layout">

                <!-- Main Content -->
                <div class="post-main-content">

                    <!-- Table of Contents -->
                    <div class="table-of-contents" id="toc">
                        <h3><i class="fa-solid fa-list"></i> Nội dung bài viết</h3>
                        <ul id="toc-list">
                            <!-- Auto-generated by JS -->
                        </ul>
                        <button class="toc-toggle" id="toc-toggle">
                            <i class="fa-solid fa-chevron-up"></i>
                        </button>
                    </div>

                    <!-- Post Content -->
                    <div class="post-content-body">
                        <?php the_content(); ?>

                        <!-- Sample Content Structure -->
                        <h2>1. Chi Tiết Ưu Đãi Đặc Biệt</h2>
                        <p>Chương trình ưu đãi cuối năm 2024 của Toyota Lâm Đồng mang đến cơ hội tuyệt vời cho khách
                            hàng mua xe. Với mức giảm giá lên đến <strong>30 triệu đồng</strong>, đây là thời điểm lý
                            tưởng để sở hữu chiếc Toyota Vios mơ ước.</p>

                        <div class="info-box">
                            <div class="info-box-header">
                                <i class="fa-solid fa-circle-info"></i>
                                <h4>Thông Tin Ưu Đãi</h4>
                            </div>
                            <ul class="info-list">
                                <li><strong>Giảm giá trực tiếp:</strong> 30.000.000đ</li>
                                <li><strong>Quà tặng phụ kiện:</strong> 15.000.000đ</li>
                                <li><strong>Hỗ trợ lãi suất:</strong> 0% trong 12 tháng đầu</li>
                                <li><strong>Bảo hiểm vật chất:</strong> Miễn phí năm đầu</li>
                                <li><strong>Thời hạn:</strong> Đến 31/12/2024</li>
                            </ul>
                        </div>

                        <figure class="post-image">
                            <img src="https://img.freepik.com/premium-photo/colorful-linear-movements-abstract-graphic-poster-abstract-background-with-colorful-gradient-ai-generated_497837-22403.jpg"
                                alt="Toyota Vios" loading="lazy">
                            <figcaption>Toyota Vios - Mẫu xe bán chạy nhất tại Lâm Đồng</figcaption>
                        </figure>

                        <!-- Inline CTA 1 -->
                        <div class="inline-cta">
                            <div class="cta-content">
                                <i class="fa-solid fa-gift"></i>
                                <div>
                                    <h4>Nhận báo giá chi tiết ngay!</h4>
                                    <p>Để lại thông tin, chúng tôi sẽ tư vấn trong 5 phút</p>
                                </div>
                            </div>
                            <button class="cta-btn" onclick="openContactForm()">Đăng ký ngay</button>
                        </div>

                        <h2>2. Điều Kiện Áp Dụng</h2>
                        <p>Chương trình áp dụng cho tất cả khách hàng có nhu cầu mua xe Toyota Vios tại showroom Toyota
                            Lâm Đồng. Đặc biệt ưu tiên cho khách hàng:</p>

                        <ul class="check-list">
                            <li>Khách hàng mua xe lần đầu</li>
                            <li>Khách hàng cũ giới thiệu bạn bè</li>
                            <li>Khách hàng đặt cọc trước ngày 31/12/2024</li>
                            <li>Khách hàng mua kèm gói bảo dưỡng</li>
                        </ul>

                        <blockquote class="pull-quote">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>"Đây là chương trình ưu đãi lớn nhất trong năm. Chúng tôi cam kết mang đến giá trị tốt
                                nhất cho khách hàng Lâm Đồng."</p>
                            <cite>— Nguyễn Văn A, Giám đốc kinh doanh Toyota Lâm Đồng</cite>
                        </blockquote>

                        <h2>3. Quà Tặng Kèm Theo</h2>
                        <p>Ngoài ưu đãi giảm giá, khách hàng còn nhận được nhiều quà tặng giá trị:</p>

                        <div class="gift-grid">
                            <div class="gift-item">
                                <i class="fa-solid fa-shield-halved"></i>
                                <h4>Bảo hiểm vật chất</h4>
                                <p>Trị giá 12 triệu</p>
                            </div>
                            <div class="gift-item">
                                <i class="fa-solid fa-film"></i>
                                <h4>Phim cách nhiệt</h4>
                                <p>3M chính hãng</p>
                            </div>
                            <div class="gift-item">
                                <i class="fa-solid fa-camera"></i>
                                <h4>Camera hành trình</h4>
                                <p>Full HD 1080p</p>
                            </div>
                            <div class="gift-item">
                                <i class="fa-solid fa-car"></i>
                                <h4>Bộ phụ kiện</h4>
                                <p>Chính hãng Toyota</p>
                            </div>
                        </div>

                        <!-- Video Embed Example -->
                        <div class="video-wrapper">
                            <h3>Video Giới Thiệu Chi Tiết</h3>
                            <div class="video-container">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                                    title="Video giới thiệu" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>

                        <h2>4. Cách Đăng Ký Tham Gia</h2>
                        <p>Quá trình đăng ký nhận ưu đãi vô cùng đơn giản:</p>

                        <div class="steps-container">
                            <div class="step-item">
                                <span class="step-number">1</span>
                                <div class="step-content">
                                    <h4>Liên hệ tư vấn</h4>
                                    <p>Gọi hotline hoặc điền form bên dưới</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <span class="step-number">2</span>
                                <div class="step-content">
                                    <h4>Đặt lịch hẹn</h4>
                                    <p>Chọn thời gian phù hợp để xem xe</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <span class="step-number">3</span>
                                <div class="step-content">
                                    <h4>Lái thử & tư vấn</h4>
                                    <p>Trải nghiệm thực tế và nhận tư vấn chi tiết</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <span class="step-number">4</span>
                                <div class="step-content">
                                    <h4>Hoàn tất thủ tục</h4>
                                    <p>Ký hợp đồng và nhận xe ngay</p>
                                </div>
                            </div>
                        </div>

                        <!-- Inline CTA 2 -->
                        <div class="inline-cta highlight">
                            <div class="cta-icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="cta-text">
                                <h4>Hotline: 0123.456.789</h4>
                                <p>Tư vấn miễn phí 24/7 - Hỗ trợ tận tình</p>
                            </div>
                            <button class="cta-btn-large" onclick="callHotline()">
                                <i class="fa-solid fa-phone"></i> Gọi ngay
                            </button>
                        </div>

                        <h2>5. Kết Luận</h2>
                        <p>Chương trình ưu đãi cuối năm 2024 là cơ hội tuyệt vời để sở hữu Toyota Vios với mức giá tốt
                            nhất. Đừng bỏ lỡ cơ hội này, hãy liên hệ với chúng tôi ngay hôm nay!</p>

                    </div>

                    <!-- Tags -->
                    <div class="post-tags">
                        <i class="fa-solid fa-tags"></i>
                        <div class="tags-list">
                            <?php
                                    $tags = get_the_tags();
                                    if ($tags):
                                        foreach ($tags as $tag):
                                            echo '<a href="' . get_tag_link($tag->term_id) . '" class="tag-item">#' . $tag->name . '</a>';
                                        endforeach;
                                    else:
                                        echo '<a href="#" class="tag-item">#Toyota</a>';
                                        echo '<a href="#" class="tag-item">#Vios</a>';
                                        echo '<a href="#" class="tag-item">#KhuyếnMãi</a>';
                                        echo '<a href="#" class="tag-item">#LâmĐồng</a>';
                                    endif;
                                    ?>
                        </div>
                    </div>

                    <!-- Post Navigation -->
                    <div class="post-navigation">
                        <div class="nav-previous">
                            <?php
                                    $prev_post = get_previous_post();
                                    if ($prev_post): ?>
                            <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                <span class="nav-label">
                                    <i class="fa-solid fa-arrow-left"></i> Bài trước
                                </span>
                                <span class="nav-title"><?php echo $prev_post->post_title; ?></span>
                            </a>
                            <?php endif; ?>
                        </div>

                        <div class="nav-next">
                            <?php
                                    $next_post = get_next_post();
                                    if ($next_post): ?>
                            <a href="<?php echo get_permalink($next_post->ID); ?>">
                                <span class="nav-label">
                                    Bài tiếp <i class="fa-solid fa-arrow-right"></i>
                                </span>
                                <span class="nav-title"><?php echo $next_post->post_title; ?></span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Author Bio -->
                    <div class="author-bio-box">
                        <div class="author-avatar">
                            <?php echo get_avatar(get_the_author_meta('ID'), 120); ?>
                        </div>
                        <div class="author-info-box">
                            <h3>Về tác giả</h3>
                            <h4><?php the_author(); ?></h4>
                            <p class="author-role">Chuyên viên tư vấn xe Toyota - 10+ năm kinh nghiệm</p>
                            <p class="author-bio">
                                <?php echo get_the_author_meta('description') ?: 'Với nhiều năm kinh nghiệm trong ngành ô tô, tôi luôn sẵn sàng tư vấn và chia sẻ kiến thức để giúp khách hàng chọn được chiếc xe phù hợp nhất.'; ?>
                            </p>
                            <div class="author-social">
                                <a href="#" class="social-link"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
                                <a href="mailto:<?php echo get_the_author_meta('email'); ?>" class="social-link">
                                    <i class="fa-regular fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    <div class="related-posts-section">
                        <h3><i class="fa-solid fa-book"></i> Bài viết liên quan</h3>
                        <div class="related-posts-slider" id="related-slider">
                            <?php
                                    $related_args = array(
                                        'category__in' => wp_get_post_categories($post->ID),
                                        'post__not_in' => array($post->ID),
                                        'posts_per_page' => 4,
                                        'orderby' => 'rand'
                                    );
                                    $related_posts = new WP_Query($related_args);

                                    if ($related_posts->have_posts()):
                                        while ($related_posts->have_posts()):
                                            $related_posts->the_post(); ?>
                            <div class="related-post-card">
                                <div class="related-post-image">
                                    <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                    <?php else: ?>
                                    <img src="https://img.freepik.com/premium-photo/colorful-linear-movements-abstract-graphic-poster-abstract-background-with-colorful-gradient-ai-generated_497837-22403.jpg"
                                        alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="related-post-content">
                                    <span class="related-category"><?php the_category(', '); ?></span>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <div class="related-meta">
                                        <span><i class="fa-regular fa-calendar"></i>
                                            <?php echo get_the_date('d/m/Y'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile;
                                        wp_reset_postdata();
                                    endif;
                                    ?>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <?php if (comments_open() || get_comments_number()): ?>
                    <div class="comments-section">
                        <h3><i class="fa-regular fa-comments"></i> Bình luận (<?php echo get_comments_number(); ?>)</h3>
                        <?php comments_template(); ?>
                    </div>
                    <?php endif; ?>

                </div>

                <!-- Sidebar -->
                <aside class="post-sidebar">

                    <!-- Contact Widget -->
                    <div class="sidebar-widget contact-widget">
                        <div class="widget-icon">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <h3>Liên Hệ Tư Vấn</h3>
                        <div class="consultant-info">
                            <img src="https://img.freepik.com/premium-photo/colorful-linear-movements-abstract-graphic-poster-abstract-background-with-colorful-gradient-ai-generated_497837-22403.jpg"
                                alt="Tư vấn viên">
                            <div class="consultant-details">
                                <strong>Dang The Vy</strong>
                                <span>IT Department</span>
                            </div>
                        </div>
                        <a href="tel:0123456789" class="contact-btn phone">
                            <i class="fa-solid fa-phone"></i> 033 408 7540
                        </a>
                        <a href="#" class="contact-btn zalo" onclick="openZalo()">
                            <i class="fa-solid fa-z"></i> Chat Zalo
                        </a>
                    </div>

                    <!-- Hot Posts Widget -->
                    <div class="sidebar-widget">
                        <h3><i class="fa-solid fa-fire"></i> Bài Viết Hot</h3>
                        <div class="hot-posts-sidebar">
                            <?php
                                    $hot_posts = new WP_Query(array(
                                        'posts_per_page' => 5,
                                        'orderby' => 'comment_count',
                                        'post__not_in' => array($post->ID)
                                    ));

                                    $rank = 1;
                                    while ($hot_posts->have_posts()):
                                        $hot_posts->the_post(); ?>
                            <div class="hot-post-sidebar-item">
                                <span class="rank-number"><?php echo $rank; ?></span>
                                <div class="hot-post-sidebar-content">
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <span class="views">
                                        <i class="fa-regular fa-eye"></i> <?php echo rand(800, 3000); ?>
                                    </span>
                                </div>
                            </div>
                            <?php
                                        $rank++;
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                        </div>
                    </div>

                    <!-- Price Table Widget -->
                    <div class="sidebar-widget price-widget">
                        <h3><i class="fa-solid fa-tags"></i> Bảng Giá Xe</h3>
                        <div class="price-list">
                            <div class="price-item">
                                <span class="car-name">Toyota Vios</span>
                                <span class="car-price">458tr - 598tr</span>
                            </div>
                            <div class="price-item">
                                <span class="car-name">Toyota Camry</span>
                                <span class="car-price">1.1tỷ - 1.5tỷ</span>
                            </div>
                            <div class="price-item">
                                <span class="car-name">Toyota RAV4</span>
                                <span class="car-price">2.3tỷ</span>
                            </div>
                            <div class="price-item">
                                <span class="car-name">Corolla Cross</span>
                                <span class="car-price">720tr - 920tr</span>
                            </div>
                        </div>
                        <a href="#" class="view-all-prices">Xem bảng giá đầy đủ →</a>
                    </div>

                </aside>

            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="final-cta-section">
        <div class="container">
            <div class="final-cta-box">
                <div class="cta-left">
                    <h2>🎉 Bạn Quan Tâm Mẫu Xe Nào?</h2>
                    <p>Để lại thông tin, chúng tôi sẽ tư vấn chi tiết và báo giá tốt nhất cho bạn!</p>
                </div>
                <div class="cta-form">
                    <form id="final-contact-form">
                        <input type="text" placeholder="Họ và tên *" required>
                        <input type="tel" placeholder="Số điện thoại *" required>
                        <select>
                            <option>Chọn mẫu xe quan tâm</option>
                            <option>Toyota Vios</option>
                            <option>Toyota Camry</option>
                            <option>Toyota RAV4</option>
                            <option>Corolla Cross</option>
                        </select>
                        <button type="submit" class="submit-btn">
                            <i class="fa-solid fa-paper-plane"></i> Đăng ký ngay
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</article>

<!-- Floating Social Share (Desktop) -->
<div class="floating-social-share" id="floating-share">
    <button class="float-share-btn facebook" onclick="shareOnFacebook()">
        <i class="fa-brands fa-facebook-f"></i>
        <span class="share-count">42</span>
    </button>
    <button class="float-share-btn twitter" onclick="shareOnTwitter()">
        <i class="fa-brands fa-twitter"></i>
    </button>
    <button class="float-share-btn zalo" onclick="shareOnZalo()">
        <i class="fa-solid fa-z"></i>
    </button>
    <button class="float-share-btn copy" onclick="copyLink()">
        <i class="fa-solid fa-link"></i>
    </button>
</div>

<!-- Sticky Contact Button (Mobile) -->
<div class="sticky-contact-mobile" id="sticky-mobile">
    <a href="tel:0123456789" class="sticky-btn call">
        <i class="fa-solid fa-phone"></i>
    </a>
    <a href="#" class="sticky-btn zalo" onclick="openZalo()">
        <i class="fa-solid fa-z"></i>
    </a>
</div>

<?php endwhile; endif; ?>

<?php
// Reading time function
function reading_time()
{
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return $reading_time;
}
?>

<?php get_footer(); ?>