<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPFB.IO</title>
    <link rel="icon" href="https://i.imgur.com/MUmp45c.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body,
        html {
            width: 100%;
            height: 100%;
            margin: 0;

        }

        #snow {
            position: relative;
            width: 100%;
            height: 100%;
        }





        @media only screen and (max-width: 768px) {
            .img-header1 {
                display: none;
            }
            .content{
                width: 100%;
            }
            .btn-start{
                display: none;
            }
            .intro-text{
                padding-top: 100px!important;
                padding-bottom: 0px!important;
            }

        }

        .intro-text {
            padding-bottom: 100px;
            margin: 0 5%;
        }

        body {
            background-image: url(Public/img/bg_full.4a1346ca.svg);
            background-position: center top;
            background-origin: padding-box;
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #292946;
        }

        #snow {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999; /* Ensure snow appears on top */
        }

        /* CSS for the fade-in animation */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .fade-in.active {
            opacity: 1;
            transform: translateY(0);
        }

    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body>
<?php include "layouts/navbar.php"; ?>

<div id="snow"></div>


<div class="new1"
     id="conditionalContent" <?php echo ($_SERVER['REQUEST_URI'] == '/upfb/service') ? 'style="display: none;"' : ''; ?>>
    <?php include "layouts/header.php"; ?>
    <?php include "layouts/login.php"; ?>
    <?php include "layouts/about-us.php"; ?>
    <?php include "layouts/active.php"; ?>
    <?php include "layouts/why.php"; ?>
    <?php include "layouts/service.php"; ?>
    <?php include "layouts/review.php"; ?>
    <?php include "layouts/number-users.php"; ?>
    <?php include "layouts/footer.php"; ?>
</div>


<div id="registrationForm" style="display: none;">
    <?php include "layouts/register.php"; ?>
    <?php include "layouts/footer.php"; ?>
</div>

<div id="scrollTrigger" style="display: none;" >
    <?php include "button/messenger.php"; ?>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<script src="Public/js/snow.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the register link
        var registerLink = document.getElementById("register");

        // Get the registrationForm div
        var registrationForm = document.getElementById("registrationForm");
        /*var service = document.getElementById("service");
        service.style.display = "none";*/

        // Add a click event listener to the register link
        registerLink.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent the default link behavior

            // Call the loadContent function here
            loadContent('/upfb/', function (responseText) {
                // Hide the content with class 'new1'
                document.querySelector('.new1').innerHTML = responseText;

                // Show the registrationForm
                registrationForm.style.display = "block";
            });
        });

        // Define the loadContent function
        function loadContent(url, callback) {
            // Implement your AJAX request or any content loading logic here
            // Once the content is loaded, call the callback function with the responseText
            var responseText = "<p>Loaded content goes here</p>"; // Replace this with your actual content
            callback(responseText);
        }
    });

</script>

<!--scroll down to show button message-->
<script>
    function checkScroll() {
        console.log("Scroll event triggered."); // Check if the event is triggered
        var scrollTrigger = document.getElementById('scrollTrigger');
        var content = document.getElementById('scrollTrigger'); // Make sure the IDs match
        var scrollPosition = window.innerHeight * 0.8;

        if (window.scrollY >= scrollPosition) {
            console.log("Scroll position reached."); // Check if the scroll position condition is met
            content.style.display = 'block';
            window.removeEventListener('scroll', checkScroll);
        }
    }
    window.addEventListener('scroll', checkScroll);
</script>


</body>

</html>