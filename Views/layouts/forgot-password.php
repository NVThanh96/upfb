<style>
.sign-in-blk-register1 {
    max-width: 500px;
    margin: 0 auto;
}

.sign-in-blk1 {
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

#loadingIcon {
    display: none;
    background: rgb(10, 10, 10, 0.5);
    width: 23.6%;
    font-size: 100px;
    border-radius: 10%;
    position: absolute;
    text-align: center;
}
</style>

<div class="container1 text-white" style="margin: 100px auto">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <!-- Add a loading icon element -->

            <div class="sign-in-blk1 sign-in-blk-register1">
                <div id="loadingIcon" class="text-primary">
                    <i class="fas fa-sync fa-spin fa-2x"></i>
                </div>
                <div id="responseMessage1" class="text-danger"></div>

                <div class="">
                    <div class="form-group">
                        <label for="username" class="control-label" style="float: left;">
                            Tên tài khoản
                        </label>
                        <input name="username" placeholder="" id="username-forgot-password" type="text"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label" style="float: left;">
                            Email
                        </label>
                        <input name="email" placeholder="" id="email-forgot-password" type="email" class="form-control">
                    </div>
                </div>
                <div class="inner-form-all">
                    <div class="single-form-blk-register">
                        <button type="button" id="btnForgotPassword" style="padding: 0px 40px;">Gửi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#btnForgotPassword").click(function(e) {
        e.preventDefault(); // Prevent the default form submission

        $("#loadingIcon").show();

        var formData = {
            username: $("#username-forgot-password").val(),
            email: $("#email-forgot-password").val()
        };
        console.log(formData.username);
        console.log(formData.email);
        // Send an AJAX request
        $.ajax({

            type: "POST",
            url: "/upfb/forgot", // Replace with the URL where you want to handle the form submission
            async: false,
            data: formData,

            success: function(response) {
                // console.log(response)
                $("#loadingIcon").hide();

                var parsedResponse = $.parseHTML(response);

                $(parsedResponse).css('display', 'none');

                $("#responseMessage1").html(parsedResponse);

            },
            error: function() {
                $("#loadingIcon").hide();
                $("#responseMessage1").html("An error occurred.");
            }
        });
    });
});
</script>