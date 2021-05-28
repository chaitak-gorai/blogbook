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

<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Contact</h1>
                        <form role="form" action="" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">Subject</label>
                                <input type="Text" name="subject" id="subject" class="form-control" placeholder="Enter a Subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Enter Your message"></textarea>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Send">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php"; ?>