<?php

session_start();

include "includes/db.php";
include "includes/header.php";
?>

<link href="css/form_style.css" rel="stylesheet">

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="background">
    <div class="container1">
        <div class="screen">
            <div class="screen-header">
                <div class="screen-header-left">
                    <div class="screen-header-button maximize"></div>
                    <div class="screen-header-button minimize"></div>
                    <div class="screen-header-button close1"></div>
                </div>
                <div class="screen-header-right">
                    <div class="screen-header-ellipsis"></div>
                    <div class="screen-header-ellipsis"></div>
                    <div class="screen-header-ellipsis"></div>
                </div>
            </div>
            <div class="screen-body">
                <div class="screen-body-item left">
                    <div class="app-title">
                        <span>REGISTER</span>
                        <span> Blogger</span>
                    </div>
                    <div class="app-contact">Always there to help you</div>
                </div>
                <div class="screen-body-item">
                    <div class="app-form">
                        <div class="head">
                            <form role="form" method="post" id="regis-form" autocomplete="off" onsubmit="validate_form()">
                                <div class="app-form-group">
                                    <label for="fullname" style="color: white;">Full Name</label>
                                    <input type="text" name="fullname" id="fullname" class="app-form-control" placeholder="Enter Your Name ">
                                </div>
                                <div class="app-form-group">
                                    <input type="hidden" name="contact_number">
                                    <label for="name" style="color: white;">Username</label>
                                    <input type="text" name="username" id="username" class="app-form-control" placeholder="Unique username">
                                </div>
                                <div class="app-form-group">
                                    <label for="name" style="color: white;">Email</label>
                                    <input type="email" name="email" id="email" class="app-form-control" placeholder="Email">
                                </div>
                                <div class="app-form-group">
                                    <label for="name" style="color: white;">Password</label>
                                    <input type="password" name="password" id="key" class="app-form-control" placeholder="Password">
                                </div>
                                <div class="app-form-group buttons">
                                    <input class="app-form-button" id="reset" value="Reset" type="button" name="reset" onclick="clearForm()">
                                    <input type="submit" name="submit" id="btn-login" value="Register" class="app-form-button">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js'></script>
<script type='text/javascript'>
    // Initiate Email JS
    (function() {
        emailjs.init('user_ctUkVZSQhl8tJdwn5OV7N');
    })();

    // Reset the form
    function clearForm() {
        document.getElementById('username').value = "";
        document.getElementById('email').value = "";
        document.getElementById('key').value = "";
        document.getElementById('fullname').value = "";
    }

    // display alert message
    function showAlert(alertMsg, alertType) {
        const card = document.querySelector('.app-form');
        const head = document.querySelector('.head');

        const errordiv = document.createElement('div');

        errordiv.className = alertType;
        errordiv.appendChild(document.createTextNode(alertMsg));
        card.insertBefore(errordiv, head);

        setTimeout(clearAlert, 3000);
    }

    function clearAlert() {
        document.querySelector('.alert').remove();
    }

    function validate_form() {
        event.preventDefault();

        // get form values
        const user = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const pass = document.getElementById('key').value;
        const name = document.getElementById('fullname').value;

        // check form values are empty or not
        if (user == "" || email == "" || pass == "" || name == "") {
            showAlert('Fields Cannot be Empty!', 'alert alert-danger');
        } else {
            $.ajax({
                type: 'POST',
                url: 'register_script.php',
                data: {
                    username: user,
                    email: email,
                    password: pass,
                    fullname: name
                },
                success: function(response) {
                    // parse the response message
                    let parsedResponse = JSON.parse(response);
                    let status = parsedResponse.status;
                    let message = parsedResponse.msg;

                    if (status == 'success') {
                        showAlert(message, 'alert alert-success');

                        // clear the form after succesful registration
                        clearForm();
                        sendEmail();
                    } else {
                        showAlert(message, 'alert alert-danger');
                    }
                }
            });
        };
    }

    // send email with formData
    function sendEmail() {
        const form = document.getElementById('regis-form');

        form.contact_number.value = Math.random() * 100000 | 0;
        emailjs.sendForm('service_jqqodmg', 'template_khp9f0v', form)
            .then(function() {
                console.log('SUCCESS!');
            }, function(error) {
                console.log('FAILED...', error);
            });
    }
</script>

<?php include "includes/footer.php"; ?>