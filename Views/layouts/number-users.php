<style>
    .top-text-plashka {
        margin-top: 32px;
        font-size: 20px;
        line-height: 1.25;
    }

    .text_cases {
        text-align: center;
        color: white;
        margin: 0 auto; /* Center align text */
        max-width: 60%; /* Adjust as needed */
    }

    .screen {
        display: block;
        width: 30%;
        margin-right: 24px;
        text-align: center;
        color: white;
    }

    img {
        max-width: 100%; /* Ensure images don't exceed their container */
    }
    /* Add this CSS to your existing stylesheet or style section */
    .inline-screen {
        display: inline-block;
        vertical-align: top;
        margin-right: 2%; /* Adjust as needed for spacing */
        text-align: center;
        text-align: center;
        color: white;
        box-sizing: border-box;
    }

    .inline-screen img {
        max-width: 100%;
    }

    /* Clearfix for proper alignment */
    .screens-container::after {
        content: "";
        display: table;
        clear: both;
    }
    .screens-wrapper {
        text-align: center; /* Center the content horizontally */
    }
</style>

<div class="container-flex-just-cont padding_0">
    <div class="text_cases">
        <p class="top-text-plashka many_people ng-binding">Rất nhiều người đã sử dụng
            dịch vụ của chúng tôi.
        </p>
        <p class="earn-money-top-text">1 110 239</p>
        <p class="top-text-plashka top_64 ng-binding">Các trường hợp khách hàng của chúng tôi:</p>
    </div>
</div>

<div class="screens-container text-white">
    <div class="screens-wrapper">
        <div class="screen inline-screen">
            <p class="before_text ng-binding">Trước</p>
            <img class="width_100" src="Public/img/screenshot_before.cf8edb11.jpg" alt="">
        </div>
        <div class="screen inline-screen">
            <p class="after_text ng-binding">Sau khi sử dụng dịch vụ</p>
            <img class="width_100" src="Public/img/screenshot_after.40ae8259.jpg" title="After wrapping up via AutoSm service, 66400 subscribers" alt="After the cheat, there were 66400 subscribers">
        </div>
    </div>
</div>
