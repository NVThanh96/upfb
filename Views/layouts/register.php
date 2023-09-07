<style>
.sign-in-blk.sign-in-blk-register {
    width: 530px;
    margin: 0 auto;
    text-align: center;
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

                <div id="loadingIcon" class="text-primary">
                    <i class="fas fa-sync fa-spin fa-2x"></i>
                </div>
                <div id="responseMessage" class="text-danger"></div>

                <form id="registerForm">
                    <div class="">
                        <div class="form-group">
                            <label for="username" class="control-label" style="float: left;">Tên tài khoản</label>
                            <input name="username" placeholder="" id="username" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label" style="float: left;">Email</label>
                            <input name="email" placeholder="" id="email" type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="control-label" style="float: left;">
                                Số điện thoại
                            </label>
                            <input name="phone" placeholder="" id="phone" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label" style="float: left;">
                                Mật khẩu
                            </label>
                            <input name="password" placeholder="" id="password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="confirm" class="control-label" style="float: left;">
                                Nhập lại mật khẩu
                            </label>
                            <input name="repeatpassword" placeholder="" id="repeatpassword" type="password"
                                class="form-control">
                        </div>
                    </div>
                    <div class="inner-form-all">
                        <div class="single-form-blk-register">
                            <button type="submit" id="btnDangKy" class="text-white" style="padding: 0px 40px;">Đăng
                                ký</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#btnDangKy").click(function(e) {

        e.preventDefault();

        $(".sign-in-blk.sign-in-blk-register").css("margin-left", "40%");

        $("#loadingIcon").css("display", "block");

        var formData = $('form#registerForm').serialize();

        console.log(formData);
        $.ajax({
            type: "POST",
            url: "/upfb/register", // Replace with the URL where you want to handle the form submission
            data: formData,
            success: function(response) {
                $("#loadingIcon").hide();

                var parsedResponse = $.parseHTML(response);

                $(parsedResponse).css('display', 'none');

                $("#responseMessage").html(parsedResponse);
                reload();
            },
            error: function() {
                $("#loadingIcon").hide();
                $("#responseMessage").html("An error occurred.");
            }
        });
    });
});
</script>