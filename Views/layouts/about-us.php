<style>
    .img-plashka {
        width: 100%;
        max-width: 100px; /* Limit the maximum width of the image */
    }

    .about-us {
        margin: 0% 5%;
        display: flex;
        flex-wrap: wrap; /* Allow items to wrap to the next line */
        justify-content: space-between;
    }

    .about-us-plashka {
        width: 30%;
        border-radius: 16px;
        background: #404365;
        background: linear-gradient(135deg, rgba(70, 75, 110, 0), rgba(55, 59, 87, 1));
        color: white;
        padding: 32px;
        text-align: left;
        font-size: 20px;
        margin: 4% 0;
        box-sizing: border-box; /* Include padding and border in the width calculation */
    }

    @media (max-width: 768px) {
        .about-us-plashka {
            width: 100%;
            margin: 4% 0.5%; /* Add spacing between elements */
        }
    }
</style>

<div class="about-us">
    <div class="about-us-plashka col-md-12">
        <img class="img-plashka" src="Public/img/main_features_gift.4905bcf7.svg" alt="">
        <p class="top-text-plashka">Giá không thể tin được</p>
        <p class="regular-text-plashka">Giá của chúng tôi rẻ nhất trên thị trường, bắt đầu từ 1 VNĐ</p>
    </div>

    <div class="about-us-plashka col-md-12">
        <img class="img-plashka" src="Public/img/main_features_person.d9a3df96.svg" alt="">
        <p class="top-text-plashka">HỖ TRỢ 24/7</p>
        <p class="regular-text-plashka">Chúng tôi tự hào có sự hỗ trợ tốt nhất, trả lời bạn 24/7.</p>
    </div>

    <div class="about-us-plashka col-md-12">
        <img class="img-plashka" src="Public/img/main_features_lock.3ff6587a.svg" alt="">
        <p class="top-text-plashka">Tốc độ xử lý trong vài phút</p>
        <p class="regular-text-plashka">Việc xử lý của chúng tôi được tự động hóa và thường mất vài phút nếu
            không phải vài giây để giao đơn hàng của bạn.</p>
    </div>
</div>


<style>
    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
    }

    .rounded-plashka {
        flex: 1;
        min-width: 30%; /* Use min-width to ensure they don't stack on zoom out */
        max-width: 30%; /* Limit maximum width for consistency */
        border-radius: 16px;
        color: white;
        margin: 0 10px 20px;
        text-align: center;
    }

    .img-circle-plashka {
        width: 100%;
        max-width: 300px;
        display: block;
        margin: 0 auto 16px;
    }

    .rounded-plashka-top-text {
        font-size: 1.25em;
        padding: 20px 0;
    }

    .rounded-plashka-text {
        font-size: 16px;
        padding: 0 20px 20px;
        color: #d3cece;
    }

    @media (max-width: 768px) {
        .rounded-plashka {
            min-width: 100%; /* Make them full width on smaller screens */
            max-width: 100%;
            margin: 0 0 20px;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 10px; /* Adjust padding for smaller screens */
        }

        .rounded-plashka {
            min-width: 100%; /* Make them full width on smaller screens */
            max-width: 100%;
            margin: 0 0 10px; /* Adjust margin for smaller screens */
        }
    }
</style>


<div class="container">
    <div class="rounded-plashka">
        <img class="img-circle-plashka" src="Public/img/features_accaunts.38cb8e03.svg" alt="">
        <h2 class="rounded-plashka-top-text">TRANG WEB THÂN THIỆN</h2>
        <p class="rounded-plashka-text">
            Chúng tôi có bảng điều khiển thân thiện! Được cập nhật thường xuyên với các tính năng thân thiện với người dùng tốt nhất. Chúng tôi đã thực hiện chuyển đổi giữa chúng dễ dàng.
        </p>
    </div>

    <div class="rounded-plashka">
        <img class="img-circle-plashka" src="Public/img/features_target.cd66b792.svg" alt="">
        <h2 class="rounded-plashka-top-text">MỤC TIÊU CỦA CHÚNG TÔI</h2>
        <p class="rounded-plashka-text">
            Chúng tôi luôn hướng đến mục tiêu cao nhất! Đội ngũ chúng tôi không ngừng nỗ lực để mang đến sự hài lòng và chất lượng dịch vụ tốt nhất cho bạn.
        </p>
    </div>

    <div class="rounded-plashka">
        <img  class="img-circle-plashka" src="Public/img/features_bag.3de1a6d0.svg" alt="">
        <h2 class="rounded-plashka-top-text">TIỆN ÍCH VƯỢT TRỘI</h2>
        <p class="rounded-plashka-text">
            Là một công ty cung cấp dịch vụ đáng tin cậy, chúng tôi cung cấp các dịch vụ có trách nhiệm và đáng tin cậy để đáp ứng nhu cầu thay đổi của bạn của một số lượng lớn khách hàng. Bạn có thể mong đợi các giải pháp tiết kiệm chi phí từ chúng tôi. đó là lý do tại sao upfb.io tốt nhất thế giới
        </p>
    </div>
</div>


