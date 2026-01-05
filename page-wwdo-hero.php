<?php
get_header(); ?>

<!-- FAQ Section -->
<!-- FAQ Section -->
<section class="faq-section">

    <!-- Gradient Overlays -->
    <div class="faq-gradient-top"></div>
    <div class="faq-gradient-bottom"></div>

    <div class="faq-container">
        <div class="faq-grid">

            <!-- Left: Image -->
            <div class="faq-image-wrapper">
                <div class="faq-image-container">
                    <img id="faqImage" src="https://v0-page-pp.vercel.app/faq-mockup.png" alt="FAQ Mockup"
                        class="faq-image">
                </div>
            </div>

            <!-- Right: Content -->
            <div class="faq-content-wrapper">

                <!-- Header -->
                <div class="faq-header">
                    <h2 class="faq-title">
                        GÓC
                        <span class="faq-title-gradient">HỎI ĐÁP</span>
                    </h2>
                    <p class="faq-description">
                        Bạn băn khoăn về quy trình thiết kế website tại Pixel Perfect, chúng tôi luôn sẵn sàng giải đáp.
                    </p>
                </div>

                <!-- Tabs -->
                <div class="faq-tabs">
                    <button class="faq-tab active" data-tab="website">
                        <div class="faq-tab-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                <path d="M2 12h20"></path>
                            </svg>
                        </div>
                        <span>VỀ WEBSITE</span>
                        <div class="faq-tab-underline"></div>
                    </button>

                    <button class="faq-tab" data-tab="company">
                        <div class="faq-tab-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z">
                                </path>
                                <path d="M20 3v4"></path>
                                <path d="M22 5h-4"></path>
                                <path d="M4 17v2"></path>
                                <path d="M5 18H3"></path>
                            </svg>
                        </div>
                        <span>VỀ PIXEL PERFECT</span>
                        <div class="faq-tab-underline"></div>
                    </button>

                    <button class="faq-tab" data-tab="policy">
                        <div class="faq-tab-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z">
                                </path>
                            </svg>
                        </div>
                        <span>CHÍNH SÁCH</span>
                        <div class="faq-tab-underline"></div>
                    </button>
                </div>

                <!-- FAQ Accordion -->
                <div class="faq-accordion">

                    <!-- Tab 1: Về Website -->
                    <div class="faq-tab-content active" data-content="website">
                        <div class="faq-item active">
                            <div class="faq-item-border"></div>
                            <button class="faq-question">
                                <span>Giá trung bình của dịch vụ thiết kế website bán thực phẩm cao cấp tại Pixel
                                    Perfect là bao nhiêu?</span>
                                <div class="faq-chevron">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Tại Pixel Perfect, chi phí thiết kế website bán thực phẩm cao cấp được tính dựa trên
                                    đặc thù và yêu cầu chi tiết của dự án. Bảng giá tiêu chuẩn dao động từ 15 triệu đến
                                    50 triệu VNĐ, tùy thuộc vào các tính năng, thiết kế, và mức độ phức tạp của website.
                                    Chúng tôi luôn sẵn sàng tư vấn chi tiết để bạn có lựa chọn tối ưu nhất.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-item-border"></div>
                            <button class="faq-question">
                                <span>Chúng tôi có thể nhận được website trong bao lâu khi thiết kế web bất động
                                    sản?</span>
                                <div class="faq-chevron">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Khi bắt đầu chính thức dự án, Pixel Perfect sẽ gửi đến bạn Timeline cụ thể dựa trên
                                    khối lượng thực hiện, thời gian mong muốn vận hành, yêu cầu phát sinh… Chúng tôi
                                    tuân thủ tốt nhất deadline thỏa thuận đầu.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-item-border"></div>
                            <button class="faq-question">
                                <span>Website bất động sản của tôi có dùng để quảng cáo Google hoặc SEO được
                                    không?</span>
                                <div class="faq-chevron">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Website bất động sản tại Pixel Perfect được sinh ra với sứ mệnh hỗ trợ tối đa cho
                                    SEO và quảng cáo Google. Vì thế sử dụng đúng cách, website giúp doanh nghiệp Bất
                                    động sản của bạn chiếm vị trí cao ngất ngưỡng trong bảng xếp hạng kết quả tìm kiếm.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-item-border"></div>
                            <button class="faq-question">
                                <span>Tôi khá mù mờ về công nghệ, làm thế nào để tôi có thể nhập liệu khi website hoàn
                                    thành?</span>
                                <div class="faq-chevron">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Trước khi vận hành chính thức, các bạn kỹ thuật viên sẽ có những buổi hướng dẫn và
                                    trao đổi cụ thể cách thức quản trị và những tập tài liệu chi tiết. Ngoài ra, số
                                    Hotline, Live chat của chúng tôi luôn hoạt động để lắng nghe và giải thích điều thắc
                                    mắc của bạn.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 2: Về Pixel Perfect -->
                    <div class="faq-tab-content" data-content="company">
                        <div class="faq-item active">
                            <div class="faq-item-border"></div>
                            <button class="faq-question">
                                <span>Pixel Perfect đã hoạt động trong ngành thiết kế website bao lâu?</span>
                                <div class="faq-chevron">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Pixel Perfect được thành lập từ năm 2015 và đã có hơn 8 năm kinh nghiệm trong lĩnh
                                    vực thiết kế website chuyên nghiệp. Chúng tôi tự hào đã phục vụ hơn 500+ khách hàng
                                    trên toàn quốc với đa dạng ngành nghề.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-item-border"></div>
                            <button class="faq-question">
                                <span>Đội ngũ của Pixel Perfect có những chuyên môn gì?</span>
                                <div class="faq-chevron">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Đội ngũ Pixel Perfect bao gồm các chuyên gia UI/UX Designer, Front-end Developer,
                                    Back-end Developer, SEO Specialist và Project Manager. Tất cả đều có kinh nghiệm 5+
                                    năm và đã thực hiện nhiều dự án lớn nhỏ thành công.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-item-border"></div>
                            <button class="faq-question">
                                <span>Pixel Perfect có cam kết bảo hành và hỗ trợ sau khi bàn giao không?</span>
                                <div class="faq-chevron">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Chúng tôi cam kết bảo hành website trong vòng 12 tháng kể từ ngày bàn giao chính
                                    thức. Ngoài ra, đội ngũ technical support luôn sẵn sàng 24/7 để hỗ trợ bạn giải
                                    quyết mọi vấn đề phát sinh.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 3: Chính sách -->
                    <div class="faq-tab-content" data-content="policy">
                        <div class="faq-item active">
                            <div class="faq-item-border"></div>
                            <button class="faq-question">
                                <span>Chính sách thanh toán của Pixel Perfect như thế nào?</span>
                                <div class="faq-chevron">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Chúng tôi áp dụng chính sách thanh toán linh hoạt: 40% khi ký hợp đồng, 40% khi hoàn
                                    thành thiết kế, và 20% còn lại khi bàn giao website. Chấp nhận thanh toán qua chuyển
                                    khoản ngân hàng, ví điện tử hoặc tiền mặt.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-item-border"></div>
                            <button class="faq-question">
                                <span>Chính sách bảo mật thông tin khách hàng ra sao?</span>
                                <div class="faq-chevron">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Pixel Perfect cam kết bảo mật 100% thông tin khách hàng và dự án. Chúng tôi ký NDA
                                    (Non-Disclosure Agreement) trước khi bắt đầu mọi dự án và không chia sẻ bất kỳ thông
                                    tin nào cho bên thứ ba.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-item-border"></div>
                            <button class="faq-question">
                                <span>Nếu không hài lòng với thiết kế, chính sách sửa đổi như thế nào?</span>
                                <div class="faq-chevron">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Chúng tôi cho phép tối đa 3 lần chỉnh sửa lớn và không giới hạn chỉnh sửa nhỏ trong
                                    quá trình thiết kế. Nếu sau đó bạn vẫn chưa hài lòng, chúng tôi sẽ hoàn lại 100% số
                                    tiền đã thanh toán theo hợp đồng.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</section>

<?php get_footer(); ?>