<?php
/**
 * Template Name: About Page - Modern Layout
 * Description: Trang giới thiệu Toyota Lâm Đồng với layout hiện đại, đơn giản.
 */
if (!defined('ABSPATH'))
    exit;
get_header();
?>

<main id="about-page">

    <section class="about-hero section section-lg bg-gray">
        <div class="container text-center">
            <!-- <span class="about-badge text-uppercase">Toyota Authorized Dealer</span> -->
            <h1 class="mt-10 mb-20 fw-bold">
                Giới thiệu Toyota Lâm Đồng
            </h1>
            <p class="lead fw-light mx-auto w-75 mb-30">
                Đại lý Toyota chính hãng tại khu vực Tây Nguyên –
                đồng hành cùng khách hàng trên mọi hành trình **an toàn và bền vững**
                với tiêu chuẩn dịch vụ toàn cầu.
            </p>
            <a href="#contact" class="btn btn-primary btn-lg zoom-in" data-delay="300">
                Khám phá Showroom
            </a>

            <div class="hero-image-wrapper mt-30 shadow-xl rounded-lg overflow-hidden fade-in-up">

                <img src="https://th.bing.com/th/id/OIP.kND2716EcegzRrBCTNgxiQAAAA?w=257&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1"
                    alt="Toyota Lâm Đồng Showroom" class="w-100 h-100 object-cover">
            </div>
        </div>
    </section>

    <section class="about-values-section section">
        <div class="container">
            <header class="section-header text-center mb-30">
                <h2 class="fw-semibold">Tôn chỉ hoạt động</h2>
            </header>

            <div class="values-grid">
                <div class="value-card fade-in-up" data-delay="100">
                    <div class="value-icon-circle bg-primary text-white mb-20">
                        <i class="icon-mission">🎯</i>
                    </div>
                    <h4>Sứ mệnh: Bền vững</h4>
                    <p class="text-muted">Mang đến giải pháp di chuyển an toàn, chất lượng và bền bỉ cho mọi khách hàng.
                    </p>
                </div>
                <div class="value-card fade-in-up" data-delay="300">
                    <div class="value-icon-circle bg-primary text-white mb-20">
                        <i class="icon-vision">🚀</i>
                    </div>
                    <h4>Tầm nhìn: Dẫn đầu</h4>
                    <p class="text-muted">Trở thành đại lý Toyota uy tín hàng đầu, là biểu tượng dịch vụ tại khu vực Tây
                        Nguyên.</p>
                </div>
                <div class="value-card fade-in-up" data-delay="500">
                    <div class="value-icon-circle bg-primary text-white mb-20">
                        <i class="icon-core-value">🥇</i>
                    </div>
                    <h4>Giá trị cốt lõi: Khách hàng</h4>
                    <p class="text-muted">Đặt Khách hàng là trung tâm, lấy Chất lượng sản phẩm và dịch vụ làm cam kết
                        hàng đầu.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-facilities section bg-light">
        <div class="container">
            <header class="section-header text-center mb-50">
                <h2>Cơ sở vật chất chuẩn toàn cầu</h2>
            </header>

            <div class="info-block mb-3xl">
                <div class="info-media slide-in-left">
                    <img src="https://th.bing.com/th/id/OIP.IXx53yACxcPxGV712Sm48AHaEK?w=328&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1"
                        alt="Xưởng dịch vụ Toyota" class="rounded-lg shadow-md">
                </div>
                <div class="info-content slide-in-right">
                    <span class="text-primary fw-semibold text-uppercase">Phòng trưng bày</span>
                    <h3>Khu vực Showroom 5 sao</h3>
                    <p class="text-muted">
                        Khám phá các dòng xe Toyota mới nhất trong không gian sang trọng và hiện đại.
                        Đội ngũ tư vấn chuyên nghiệp luôn sẵn sàng hỗ trợ bạn chọn lựa chiếc xe hoàn hảo.
                    </p>
                    <ul class="clean-list">
                        <li><span class="text-primary fw-bold">✓</span> Không gian trải nghiệm xe mới.</li>
                        <li><span class="text-primary fw-bold">✓</span> Khu vực tiếp khách VIP.</li>
                        <li><span class="text-primary fw-bold">✓</span> Công nghệ 3D Showroom tương tác.</li>
                    </ul>
                </div>
            </div>

            <div class="info-block reverse">
                <div class="info-media slide-in-right">

                    <img src="https://th.bing.com/th/id/OIP.y4ggsSsXB-06c4FYobijpgHaFj?w=278&h=187&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1"
                        alt="Khu vực Dịch vụ" class="rounded-lg shadow-md">
                </div>
                <div class="info-content slide-in-left">
                    <span class="text-primary fw-semibold text-uppercase">Xưởng Dịch vụ</span>
                    <h3>Hệ thống sửa chữa hiện đại</h3>
                    <p class="text-muted">
                        Với diện tích hơn **7.800 m²** và **28 khoang** sửa chữa, chúng tôi cam kết
                        mang đến dịch vụ bảo dưỡng và sửa chữa nhanh chóng, chính xác theo tiêu chuẩn Toyota toàn cầu.
                    </p>
                    <ul class="clean-list">
                        <li><span class="text-primary fw-bold">✓</span> Trang thiết bị chẩn đoán hiện đại.</li>
                        <li><span class="text-primary fw-bold">✓</span> Phụ tùng chính hãng 100%.</li>
                        <li><span class="text-primary fw-bold">✓</span> Kỹ thuật viên được đào tạo chuyên sâu.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="about-timeline section">
        <div class="container">
            <header class="section-header text-center mb-30">
                <h2>Hành trình 6 năm phát triển</h2>
            </header>

            <div class="timeline-simple">
                <div class="timeline-item-simple fade-in-up" data-year="2018">
                    <p class="fw-semibold">Thành lập đại lý Toyota Lâm Đồng</p>
                </div>
                <div class="timeline-item-simple fade-in-up" data-year="2020">
                    <p class="fw-semibold">Mở rộng quy mô xưởng dịch vụ</p>
                </div>
                <div class="timeline-item-simple fade-in-up" data-year="2022">
                    <p class="fw-semibold">Đạt chuẩn đại lý Toyota toàn cầu</p>
                </div>
                <div class="timeline-item-simple fade-in-up" data-year="2024">
                    <p class="fw-semibold">Phục vụ hơn 10.000 khách hàng</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-cta section bg-primary text-white text-center">
        <div class="container">
            <h2 class="text-white fw-bold">Trải nghiệm dịch vụ khác biệt ngay hôm nay</h2>
            <p class="fw-light mb-40">
                Chúng tôi không chỉ bán xe, chúng tôi đồng hành cùng sự an toàn của bạn.
            </p>
            <div class="d-flex justify-center gap-lg">
                <a href="#contact" class="btn btn-lg" style="background: #fff; color: var(--color-primary);">
                    Nhận tư vấn ngay
                </a>
                <a href="#service-booking" class="btn btn-lg btn-outline" style="color: #fff; border-color: #fff;">
                    Đăng ký dịch vụ
                </a>
            </div>
        </div>
    </section>

</main><?php get_footer(); ?>