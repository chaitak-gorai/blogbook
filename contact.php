<?php include "includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php





if (isset($_POST['submit'])) {


    $username = $_POST['from_name'];
    $email = $_POST['reply_to'];
    $sub = $_POST['subject'];
    $message = $_POST['message'];

    if (!empty($username) && !empty($email) && !empty($sub) && !empty($message)) {

        $t = "send";
    } else {
        $t = "error";
    };
};








?>






<!-- Navigation -->

<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">

                    <div class="form-wrap">
                        <h1 class="head">Contact Us</h1>
                        <form role="form" action="" method="post" id="login-form" autocomplete="off">
                            <input type="hidden" name="contact_number">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="from_name" id="name" class="form-control" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="reply_to" id="email" class="form-control" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="Text" name="subject" id="subject" class="form-control" placeholder="Enter a Subject">
                            </div>
                            <div class="form-group">
                                <label for="subject">Message</label>
                                <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Enter Your message"></textarea>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Send">
                        </form>

                    </div>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
</div> <!-- /.container -->
</section>


<hr>



<div class="row">
    <div class="col-lg-12">
        <p>Copyright &copy; Blogbook 2020</p>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->

<script src="js/script2.js"></script>

<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js'></script>
<script type='text/javascript'>
    (function() {
        // https://dashboard.emailjs.com/admin/integration
        emailjs.init('user_ctUkVZSQhl8tJdwn5OV7N');
    })();
</script>
<script>
    function showError(error, alrt) {

        const card = document.querySelector('.form-wrap');
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

        } else {
            showError('Fields Cannot be Empty!', 'alert alert-danger');

        }
    });
</script>

</body>

</html>