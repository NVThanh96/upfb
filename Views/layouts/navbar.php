<style>
    .no-underline {
        text-decoration: none
    }

    .no-underline:hover {
        text-decoration: underline;
    }

    .nav-link:hover {
        color: #fed136;
    }

    .title-menu {
        font-size: 24px;
    }

    .nav-item {
        margin-top: 8px;
        margin-right: 32px;
    }

    .nav-link {
        padding: 1.1em 1em !important;
    }

    /* Define the class for the double underline effect */
    .underline-hover {
        cursor: pointer;
        position: relative;
        display: inline-block;
    }

    .underline-hover::before,
    .underline-hover::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -5px; /* Adjust this value to control the distance between the underlines */
        height: 4px;
        background-color: #fcfcfc; /* Adjust this color to your preference */
        transition: width 0.2s ease;
        width: 0;
    }

    /* Apply the double underline effect on hover */
    .underline-hover:hover::before,
    .underline-hover:hover::after {
        width: 100%;
    }

    .landingcus3 {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        line-height: 1.5;
        text-align: left;
    }

    #mainNav {
        padding: 0.5% 6.5%;
        background: rgb(38, 40, 70)
    }
    @media (min-width: 768px) {
        #mobile1 {
            display: none;
        }
    }
    @media only screen and (max-width: 960px) {
        .navbar-nav {
            display: none;
        }

    }
</style>
<div class="landingcus3">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <a class="text-white font-w700 no-underline" href="/upfb/">
            <span class="text-white text-uppercase title-menu fw-bold">upfb.io</span>
        </a>

        <ul class="navbar-nav text-uppercase" style="margin-left: auto">
            <li class="nav-item">
                <a id="dichVuLink" class="nav-link js-scroll-trigger navbar-text ng-binding" href="/upfb/service"
                   onclick="loadContent('/upfb/service')">Dịch vụ</a>
            </li>
            <li class="nav-item">
                <a href="/upfb/" class="nav-link js-scroll-trigger navbar-text ng-binding"
                   onclick="loadContent('/upfb/')">Đăng nhập</a>
            </li>
            <li class="nav-item">
                <a id="register" class="btn nav-link js-scroll-trigger my-button-wrap ng-binding" href="/upfb/"
                   onclick="loadContent('/upfb/')"
                   style="background: rgb(131, 64, 187); margin: 0">Đăng ký</a>
            </li>
        </ul>
        <div class="col-12" style="margin-left: auto" id="mobile1">
            <div class="row">
                <div class="col-4">
                    <a class="btn btn-pill sign-up registercus text-white" href="/upfb/services"
                       style="background: rgb(134, 65, 191);">Dịch vụ</a>
                </div>
                <div class="col-4"></div>
                <div class="col-4">
                    <a id="register" href="/upfb/" onclick="loadContent('/upfb/')" class="btn nav-link js-scroll-trigger my-button-wrap ng-binding"
                       style="background: rgb(131, 64, 187); margin: 0">Đăng ký</a>
                </div>
            </div>
        </div>
    </nav>

</div>
