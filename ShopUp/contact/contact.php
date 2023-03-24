<!DOCTYPE html>
<html lang="en">

<?php

include_once("connection.php");

?>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopUp</title>
    <link rel="stylesheet" href="contact.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&family=Montserrat:wght@200&display=swap" rel="stylesheet">
</head>

<body>

    <section class="contact contact-section">
        <div class="contact-container">
            <h1 class="text-center">Contact Us</h1>

            <div class="contact-form">
                <form action="contactform.php" method="post">
                    <label style="font-size: 20px;">Name: </label>
                    <input type="text" id="name" name="name" placeholder="Your name.....">

                    <label style="font-size: 20px;">Email: </label>
                    <input type="text" id="email" name="email" placeholder="Your email.....">

                    <label style="font-size: 20px;">Message: </label>
                    <!-- <input type="text" name="email" placeholder="your email....."> -->
                    <textarea rows="2" cols="25" id="message" placeholder="Type your message here..."></textarea>


                    <input type="submit" value="Submit" onclick="return validateContactForm()">
                </form>
            </div>

            <div class="contact-form">
                <iframe src="https://www.google.com/maps/place/Aspley,+Huddersfield,+UK/@53.6438433,-1.7768662,16z/data=!3m1!4b1!4m13!1m7!3m6!1s0x48795f7ae9c21919:0x8fe0edd83227194f!2sBradford,+UK!3b1!8m2!3d53.7937996!4d-1.7563583!3m4!1s0x487bdc0b87e2f5e9:0x5069de48684a8bec!8m2!3d53.6431975!4d-1.7722945?hl=en"
                     height="420" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <!-- <script src="main.js"></script> -->
    <script>
        var menu = document.querySelector('.toggler');

        menu.addEventListener('click', () => {
            var m = document.querySelector('.m-navigation');
            // m.classList.toggle('m-nav-show');
            if (m.style.display == "block") {


                m.style.display = "none";
            } else {
                m.style.display = "block";


            }
        });

         //form validation
         function validateContactForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var message = document.getElementById("message").value;

            if (name == null || name == "") {
                alert("Please enter the name");
                return false;
            }

            if (email == null || email == "") {
                alert("Please enter the email");
                return false;
            }

            if (message == null || message == "") {
                alert("Please type some message");
                return false;
            }

            var exp = /^([a-z 0-9\.-]+)@([a-z0-9]+).([a-zA-Z.]+[a-zA-Z])$/g;
            if (!exp.test(email)) {
                alert("Email format doesn't match");
                return false;
            }
        }
    </script>
</body>
</html>
