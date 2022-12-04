<?php

use Phppot\Member;

if (!empty($_POST["signup-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}
?>
<HTML>

<HEAD>
    <meta charset="utf-8">

    <TITLE>User Registration</TITLE>
    <link href="assets/css/phppot-style.css" type="text/css" rel="stylesheet" />
    <link href="assets/css/user-registration.css" type="text/css" rel="stylesheet" />
    <script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>


    <link rel="stylesheet" href="assets/css/intlTelInput.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</HEAD>

<BODY>
    <div class="phppot-container">
        <div class="sign-up-container">

            <div class="">
                <form name="sign-up" action="" method="post" onsubmit="return signupValidation()" id="myform" onsubmit="process(event)">
                    <div class="signup-heading">Customers Contact Form</div>
                    <?php
                    if (!empty($registrationResponse["status"])) {
                    ?>
                        <?php
                        if ($registrationResponse["status"] == "error") {
                        ?>
                            <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
                        <?php
                        } else if ($registrationResponse["status"] == "success") {
                        ?>
                            <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                    <div class="error-msg" id="error-msg"></div>
                    <div class="row">

                        <div class="inline-block">
                            <div class="form-label">
                                Last Name<span class="required error" id="lastname-info"></span>
                            </div>
                            <input class="input-box-330" type="text" name="lastname" id="lastname" pattern="[a-zA-Z].*[a-zA-Z]" title="Type at least 2 or more characters and name should be start with alphabets like a-A." required>
                        </div>
                        <div class="inline-block">
                            <div class="form-label">
                                First Name<span class="required error" id="firstname-info"></span>
                            </div>
                            <input class="input-box-330" type="text" name="firstname" id="firstname" pattern="[a-zA-Z].*[a-zA-Z]" title="Type at least 2 or more characters and name should be start with alphabets like a-A." required>
                        </div>

                    </div>
                    <div class="row" id="dob">
                        <div class="inline-block">
                            <div class="form-label">
                                Date of Birth<span class="required error" id="dob-info"></span>
                                <input class="input-box-330" type="date" name="dob" id="dob">
                            </div>

                        </div>
                    </div>

                    <div class="row" id="gender">

                        <div class="inline-block">

                            <div class="form-label">
                                <span class="" id="gender-info">Gender</span>
                                <div>
                                    <input type="radio" name="gender" value="male" />
                                    Male<span class="text" id="gender-info"></span>
                                </div>
                                <div>

                                    <input type="radio" name="gender" value="female" />
                                    Female<span class="radio" id="gender-info"></span>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="inline-block 11">



                            <div class="form-label">
                                Customer Phone <span class="required error" id="contact-info"></span>
                            </div>
                            <input class="input-box-330" type="tel" name="contact" id="contact" onkeydown="phoneNumberFormatter()">
                        </div>


                        <div class="inline-block">
                            <div class="form-label">
                                Email Address<span class="required error" id="email-info"></span>
                            </div>
                            <input class="input-box-330" type="email" name="email" id="email">
                        </div>



                    </div>


                    <div class="row">
                        <div class="inline-block">
                            <div class="form-label">
                                Home Address<span class="required error" id="address-info"></span>
                            </div>
                            <input class="input-box-130" type="address" name="address" id="address">
                        </div>
                        <div class="inline-block">
                            <div class="form-label">
                                House Number<span class="required error" id="address-info"></span>
                            </div>
                            <input class="input-box-130" type="address" name="address" id="address">
                        </div>


                        <div class="inline-block">
                            <div class="form-label">
                                State<span class="required error" id="address-info"></span>
                            </div>
                            <select name="address" id="address" class="input-box-130">
                                <option value="">Province</option>
                                <option value="Alberta">Alberta</option>
                                <option value="British Columbia">British Columbia</option>
                                <option value="Manitoba">Manitoba</option>
                                <option value="New Brunswick">New Brunswick</option>
                                <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                                <option value="Northwest Territories">Northwest Territories</option>
                                <option value="Nova Scotia">Nova Scotia</option>
                                <option value="Nunavut">Nunavut</option>
                                <option value="Ontario">Ontario</option>
                                <option value="Prince Edward Island">Prince Edward Island</option>
                                <option value="Quebec">Quebec</option>
                                <option value="Saskatchewan">Saskatchewan</option>
                                <option value="Yukon">Yukon</option>
                            </select>
                        </div>
                    </div>



                    <div class="row">
                        <div class="inline-block">
                            <div class="form-label">
                                Password<span class="required error" id="signup-password-info"></span>
                            </div>
                            <input class="input-box-330" type="password" name="signup-password" id="signup-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" title="Must contain at least one number and one uppercase and lowercase letter,
                             and at least 12 or more characters" required>


                        </div>


                        <div class="inline-block">
                            <div class="form-label">
                                Confirm Password<span class="required error" id="confirm-password-info"></span>
                            </div>
                            <input class="input-box-330" type="password" name="confirm-password" id="confirm-password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,}" title="Both passwords are not matching" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="inline-block">
                            <div class="form-label">
                                <input class="input-box-330" type="checkbox" name="newsletter" id="newsletter">
                                Send me monthly newsletter <span class="" id="">

                                </span>

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="inline-block">
                            <div class="form-label">
                                What is your question ?<span class="required error" id="question-info"></span>
                            </div>
                            <textarea type="question" name="question" id="question" rows="4" cols="50"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <input class="btn" type="submit" name="signup-btn" id="signup-btn" value="Sign up">
                    </div>
                </form>

                <!-- <div class="login-signup" style="margin-left:280px;">
                    <a class="login-signup" href="index.php" style="color:green;">Login</a>
                </div> -->


            </div>
        </div>
    </div>

    <script>
        function signupValidation() {
            var valid = true;

            $("#firstname").removeClass("error-field");
            $("#lastname").removeClass("error-field");
            $("#dob").removeClass("error-field");
            $("#gender").removeClass("error-field");
            $("#contact").removeClass("error-field");
            $("#email").removeClass("error-field");
            $("#address").removeClass("error-field");
            $("#password").removeClass("error-field");
            $("#confirm-password").removeClass("error-field");
            $("#newsletter").removeClass("error-field");
            $("#question").removeClass("error-field");

            var FirstName = $("#firstname").val();
            var LastName = $("#lastname").val();
            var Dob = $("#dob").val();
            var Gender = $("#gender").val();
            var Contact = $("#contact").val();
            var email = $("#email").val();
            var Address = $("#address").val();
            var Password = $('#signup-password').val();
            var ConfirmPassword = $('#confirm-password').val();
            var Newsletter = $("#newsletter").val();
            var Question = $("#question").val();



            var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;


            var passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
            $("#firstname-info").html("").hide();
            $("#email-info").html("").hide();

            if (FirstName.trim() == "") {
                $("#firstname-info").html("required.").css("color", "#ee0000").show();
                $("#firstname").addClass("error-field");
                valid = false;
            }
            if (LastName.trim() == "") {
                $("#lastname-info").html("required.").css("color", "#ee0000").show();
                $("#lastname").addClass("error-field");
                valid = false;
            }
            if (Dob.trim() == "") {
                $("#dob-info").html("required.").css("color", "#ee0000").show();
                $("#dob").addClass("error-field");
                valid = false;
            }
            if (Gender.trim() == "") {
                $("#gender-info")
                $("#gender")
                valid = true;
            }
            if (Contact.trim() == "") {
                $("#contact-info").html("required.").css("color", "#ee0000").show();
                $("#contact").addClass("error-field");
                valid = false;
            }

            if (email == "") {
                $("#email-info").html("required").css("color", "#ee0000").show();
                $("#email").addClass("error-field");
                valid = false;
            } else if (email.trim() == "") {
                $("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
                $("#email").addClass("error-field");
                valid = false;
            } else if (!emailRegex.test(email)) {
                $("#email-info").html("Invalid email address.").css("color", "#ee0000")
                    .show();
                $("#email").addClass("error-field");
                valid = false;
            }


            if (Address.trim() == "") {
                $("#gender-info").html("required.").css("color", "#ee0000").show();
                $("#gender").addClass("error-field");
                valid = false;
            }

            if (Password.trim() == "") {
                $("#signup-password-info").html("required.").css("color", "#ee0000").show();
                $("#signup-password").addClass("error-field");
                valid = false;
            }
            if (ConfirmPassword.trim() == "") {
                $("#confirm-password-info").html("required.").css("color", "#ee0000").show();
                $("#confirm-password").addClass("error-field");
                valid = false;
            }
            if (Password != ConfirmPassword) {
                $("#error-msg").html("Both passwords must be same.").show();
                valid = false;
            }
            if (Question.trim() == "") {
                $("#question-info").html("required.").css("color", "#ee0000").show();
                $("#question").addClass("error-field");
                valid = false;
            }
             if (Newsletter.trim() == "") {
                 $("#newsletter-info").html("required.").css("color", "#ee0000").show();
                 $("#newsletter").addClass("error-field");
                 valid = false;
             }
            if (valid == false) {
                $('.error-field').first().focus();
                valid = false;
            }

            return valid;
        }
    </script>







    <script src="assets/js/intlTelInput.js"></script>
    <script>
        // Vanilla Javascript
        var input = document.querySelector("#contact");
        window.intlTelInput(input, ({
            // options here
        }));

        $(document).ready(function() {
            $('.iti__flag-container').click(function() {
                var countryCode = $('.iti__selected-flag').attr('title');
                var countryCode = countryCode.replace(/[^0-9]/g, '')



                $('#contact').val("");
                $('#contact').val("+" + countryCode + " " + $('#contact').val());

            });
        });
    </script>

    <script>
        function phoneNumberFormatter() {
            // grab the value of what the user is typing into the input
            const inputField = document.getElementById('contact');
            const formattedInputValue = formatPhoneNumber(inputField.value);
            inputField.value = formattedInputValue;


        }
    </script>

    <script>
        function formatPhoneNumber(value) {
            if (!value) return value;

            const phoneNumber = value.replace(/[^\d]/g, '');
            const phoneNumberLength = phoneNumber.length;

            if (phoneNumberLength < 4) return phoneNumber;

            if (phoneNumberLength < 7) {
                return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3)}`;
            }

            return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(
            3,
            6
        )}-${phoneNumber.slice(6, 9)}`;
        }
    </script>








</BODY>

</HTML>