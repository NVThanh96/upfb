<style>
    .sign-in-blk.sign-in-blk-register {
        max-width: 530px;
        margin: 0 auto;
    }
    .sign-in-blk {
        padding: 45px;
        background: #3a3e5cc2;
        border-radius: 35px;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .inner-form-all .single-form-blk-register:last-child button {
        background: #8641bf;
    }
    .inner-form-all .single-form-blk-register:last-child button {
        width: 100%;
        height: 50px;
        border: none;
        background: #8641bf;
        color: #fff;
        border-radius: 10px;
        text-transform: uppercase;
        font-size: 18px;
        font-weight: 600;
    }
</style>
<div class="container text-white" style="margin: 100px auto">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="sign-in-blk sign-in-blk-register">
                <form class="js-validation-signup" action="register" method="POST">
                    <div class="">
                        <div class="form-group">
                            <label for="username" class="control-label" style="float: left;">Tên tài khoản</label>
                            <input name="username" placeholder="" id="username" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label" style="float: left;">Email</label>
                            <input name="email" placeholder="" id="email" type="email" class="form-control"></div>
                        <div class="form-group">
                            <label for="phone" class="control-label" style="float: left;">
                                Số điện thoại
                            </label>
                            <input name="phone" placeholder="" id="phone" type="text" class="form-control">
                        </div>
                        <div class="form-group"><label for="password" class="control-label" style="float: left;">Mật
                                khẩu</label><input name="password" placeholder="" id="password" type="password"
                                                   class="form-control"></div>
                        <div class="form-group"><label for="confirm" class="control-label" style="float: left;">Nhập lại mật
                                khẩu</label><input name="repeatpassword" placeholder="" id="repeatpassword" type="password"
                                                   class="form-control"></div>
                    </div>
                    <div class="inner-form-all">
                        <div class="single-form-blk-register">
                            <button type="submit" class="text-white" style="padding: 0px 40px;">Đăng ký</button>
                        </div>
                    </div>
                    <div class="text-center">Bạn đã có tài khoản?
                        <a href="/upfb/" style="margin-left: 5px; color: #aa6dff">
                            Đăng nhập
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>