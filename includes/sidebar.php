<div class="col-md-4">





    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">


            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>


    <div class="well logs" id="login">
        <div class="heads">
            <h4>Login</h4>
            <form action="includes/login.php" method="post" id="login_form" onsubmit="return validate_form()">


                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Enter Username" id="user_name">

                </div>

                <div class="input-group">
                    <input name="password" type="password" class="form-control" placeholder="Enter Password" id="user_pass">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" name="login" type="submit">
                            Login
                        </button>

                    </span>

                </div>
            </form>
            <h4 style="text-align: center;">OR</h4>
            <a href="../registration.php">
                <button class="btn btn-success form-control" name="login" type="submit" value="Register">
                    Register
                </button> </a>

            <!-- /.input-group -->
        </div>
    </div>


    <!-- Blog Categories Well -->
    <?php

    $query = "SELECT * FROM categories ";
    $select_categories_sidebar = mysqli_query($connection, $query);
    ?>

    <div class="well " id="categories">

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php



                    while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<li   class='list-items'
                        data-aos='fade-left'
                        data-aos-delay='100'><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }

                    ?>

                </ul>
            </div>
            <!-- /.col-lg-6 -->

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php" ?>
</div>
<script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1200,
    })
</script>
<script>
    function showError(error, alrt) {

        const card = document.querySelector('.logs');
        const head = document.querySelector('.heads');


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
        const user = document.getElementById('user_name').value;

        const pass = document.getElementById('user_pass').value;



        // generate a five digit number for the contact_number variable
        if (user == "" || pass == "") {
            showError('Fields Cannot be Empty!', 'alert alert-danger');

            return false;
        }
    }
</script>