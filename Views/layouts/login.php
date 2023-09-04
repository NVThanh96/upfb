<style>
    .input-login input {
        padding: 12px 15%;
    }

    .input-login {
        position: relative;
        padding: 15px;

    }

    .input-login .icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 17px;
        border-radius: 50%;
        width: 41px;
        height: 37px;
        background: rgb(131, 64, 187);
        padding: 3px;
    }

    .input-text {
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        padding-left: 65px !important;
    }

    .input-login button {
        width: 100%;
        border: none;
        background: rgb(131, 64, 187);
        color: #fff;
        border-radius: 10px;
        text-transform: uppercase;
        font-size: 18px;
        font-weight: 600;
    }

    .inner-form-all {
        padding: 45px;
    }

    .btn-login .btn-dn {
        width: 100%;
        background: rgb(134, 65, 191);
        height: 50px;
    }

    .padding_70 {
        background: rgb(53, 57, 87);
        border: none;
    }

    .pull-left {
        float: left;
        width: 50%;
        text-align: left;
    }

    @media (max-width: 768px) {
        .pull-left {
            padding: 0;
        }
    }
</style>

<div class="container form-control padding_70"
     style="max-width: 1350px; display: flex; justify-content: center; align-items: center;">
    <div class="sign-in-blk" style="width: 100%;">
        <?php

        // Check if $message_error is not empty before displaying it
        if (!empty($message_error)) {
            echo '<div class="error-message text-white" style="text-align: center">' . $message_error . '</div>';
        }
        ?>
        <form class="js-validation-signup" method="POST" action="login?action=btnLogin" onsubmit="return validateLoginForm();">
            <div class="row justify-content-center"> <!-- Center the content horizontally -->
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-12 col-md-6 input-login">
                            <!-- Use col-12 col-md-6 to make it 100% width on screens < 768px -->
                            <img class="icon" src="Public/img/Untitled.svg" alt="" srcset="">
                            <input name="username" placeholder="Nhập tài khoản" id="username" type="text"
                                   class="form-control input-text">
                        </div>
                        <div class="col-12 col-md-6 input-login">
                            <!-- Use col-12 col-md-6 to make it 100% width on screens < 768px -->
                            <img class="icon" src="Public/img/lock.svg" alt="" srcset="">
                            <input name="password" placeholder="Nhập mật khẩu" id="password" type="password"
                                   class="form-control input-text">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 btn-login" style="margin-top: 15px">
                    <!-- Always 100% width on smaller screens -->
                    <button type="submit" class="btn btn-dn text-white">Đăng nhập</button>
                </div>
            </div>

            <div class="form-bttom-info" style="display: block;">
                <div class="single-btm-blk-info">
                    <div class="form-check-section">
                                <span class="col-10 pull-left text-white">Bạn chưa có tài khoản?
                                    <a href="javascript:void(0);" id="customLink"
                                       style="margin-left: 15px; color: #aa6dff; text-decoration: none"
                                       >Đăng ký</a>
                            </span>
                        <span class="col-2" style="padding-left: 15%">
                                <a style="color: #aa6dff;text-decoration: none" href="/">Quên mật khẩu?</a>
                            </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the customLink element
        var customLink = document.getElementById("customLink");
        var registrationForm = document.getElementById("registrationForm");

        customLink.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default link behavior

            // Define the loadContent function
            function loadContent(url, callback) {
                // Implement your AJAX request or any content loading logic here
                // Once the content is loaded, call the callback function with the responseText
                var responseText = "<p>Loaded content goes here</p>"; // Replace this with your actual content
                callback(responseText);
            }

            // Call the loadContent function here
            loadContent('/upfb/', function (responseText) {
                // Hide the content with class 'new1'
                document.querySelector('.new1').innerHTML = responseText;

                // Show the registrationForm
                registrationForm.style.display = "block";
            });
        });
    });
</script>


<script>
    function validateLoginForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username.trim() === "") {
            alert("Please enter a username.");
            return false;
        }

        if (password.trim() === "") {
            alert("Please enter a password.");
            return false;
        }

        return true;
    }
</script>


