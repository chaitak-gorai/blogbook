<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<?php


if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {

        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);



        $password = base64_encode($password);

        //    $password=base64_encode($password);
        // 

        $query = "INSERT INTO users(username,user_email,user_password,user_role) ";
        $query .= "VALUES('{$username}','{$email}','{$password}','new')";
        $register_user_query = mysqli_query($connection, $query);

        $message = "    <h6 class='text-center alert alert-success'>Registration has been submitted</h6>";
    } else {
        $message = "";
    };
} else {
    global $message;
    $message = "";
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
                        <h1 class="head">Register</h1>
                        <form role="form" action="registration.php" method="post" id="regis-form" autocomplete="off" onsubmit="return validate_form()">
                            <?php echo $message; ?>
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>

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
        function validate_form() {
            // document.getElementById('regis-form').addEventListener('submit', function(event) {
            //     event.preventDefault();
            const user = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const pass = document.getElementById('key').value;



            // generate a five digit number for the contact_number variable
            if (user == "" || email == "" || pass == "") {
                showError('Fields Cannot be Empty!', 'alert alert-danger');

                return false;
            }





        }
    </script>

    <?php include "includes/footer.php"; ?>