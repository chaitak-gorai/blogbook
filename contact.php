<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<?php


if (isset($_POST['submit'])) {

    $to = "captcha.c14@gmail.com";
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    mail($to, $subject, $body);
}

?>






<!-- Navigation -->

<link href="css/form_style.css" rel="stylesheet">


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
                        <span>CONTACT </span>
                        <span>US</span>
                    </div>
                    <div class="app-contact">Always there to help you</div>
                </div>
                <div class="screen-body-item">
                    <div class="app-form">
                        <div class="head">
                            <form action="" role="form" method="post" id="login-form">
                                <div class="app-form-group">
                                    <input type="hidden" name="contact_number">
                                    <label for="name" style="color: white;">Name</label>
                                    <input type="text" name="from_name" id="name" class="app-form-control" placeholder="Full Name">
                                </div>
                                <div class="app-form-group">
                                    <label for="name" style="color: white;">Email</label>
                                    <input type="email" name="reply_to" id="email" class="app-form-control" placeholder="Email- for reply">
                                </div>
                                <div class="app-form-group">
                                    <label for="name" style="color: white;">Subject</label>
                                    <input type="Text" name="subject" id="subject" class="app-form-control" placeholder="Subject">
                                </div>
                                <div class="app-form-group message ">
                                    <!-- <input class="app-form-control" placeholder="MESSAGE"> -->
                                    <label for="name" style="color: white;">Message</label>
                                    <textarea name="message" id="message" class="app-form-control" cols="50" rows="5" placeholder="MESSAGE"></textarea>
                                </div>
                                <div class="app-form-group buttons">
                                    <input class="app-form-button" id="reset" value="Reset" type="button" name="reset" onclick="clearForm()">
                                    <input type="submit" name="submit" id="btn-login" value="Send" class="app-form-button">
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
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js'></script>
<script type='text/javascript'>
    (function() {
        // https://dashboard.emailjs.com/admin/integration
        emailjs.init('user_ctUkVZSQhl8tJdwn5OV7N');
    })();
</script>
<script>
    function clearForm() {
        const name = document.getElementById('name').value = "";
        const email = document.getElementById('email').value = "";
        const sub = document.getElementById('subject').value = "";
        const msg = document.getElementById('message').value = "";
    }

    function showError(error, alrt) {

        const card = document.querySelector('.app-form');
        const head = document.querySelector('.head');


        const errordiv = document.createElement('div');

        errordiv.className = alrt;
        errordiv.appendChild(document.createTextNode(error));
        card.insertBefore(errordiv, head);

        setTimeout(clearError, 3000);

    }

    function clearError() {
        document.querySelector('.alert').remove();
    }
</script>
<script type='text/javascript'>
    document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const sub = document.getElementById('subject').value;
        const msg = document.getElementById('message').value;


        // generate a five digit number for the contact_number variable
        if (name != "" && email != "" && sub != "" && msg != "") {
            this.contact_number.value = Math.random() * 100000 | 0;
            // these IDs from the previous steps
            emailjs.sendForm('service_jqqodmg', 'template_3d56csi', this)
                .then(function() {
                    console.log('SUCCESS!');
                }, function(error) {
                    console.log('FAILED...', error);
                });
            showError('Received! Thanks for your message', 'alert alert-success');
            clearForm();

        } else {
            showError('Fields Cannot be Empty!', 'alert alert-danger');

        }

    });
</script>


<?php include "includes/footer.php"; ?>