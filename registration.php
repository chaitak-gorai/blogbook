 <?php include "includes/db.php"; ?>
 <?php include "includes/header.php"; ?>








 <!-- Navigation -->

 <?php include "includes/navigation.php"; ?>


 <!-- Page Content -->
 <div class="container">

     <section id="login">
         <div class="container">
             <div class="row">
                 <div class="col-md-10 col-md-offset-1">
                     <div class="form-wrap" style="text-align: center;">
                         <h1 class="head wt">Register</h1>
                         <form role="form" action="registration.php" method="post" id="regis-form" autocomplete="off" onsubmit=" validate_form()">
                             <!-- <?php echo $message; ?> -->
                             <div class="form-group">
                                 <input type="hidden" name="contact_number">
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

                             <input type="submit" name="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Register">

                         </form>

                     </div>
                 </div> <!-- /.col-xs-12 -->
             </div> <!-- /.row -->
         </div> <!-- /.container -->
     </section>

     <hr>
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
         let t = 0;

         function validate_form() {
             event.preventDefault();
             const user = document.getElementById('username').value;
             const email = document.getElementById('email').value;
             const pass = document.getElementById('key').value;
             if (user == "" || email == "" || pass == "") {
                 showError('Fields Cannot be Empty!', 'alert alert-danger');
             } else {



                 console.log('prev');
                 const fo = document.getElementById('regis-form');
                 console.log('123');

                 fo.contact_number.value = Math.random() * 100000 | 0;
                 emailjs.sendForm('service_jqqodmg', 'template_khp9f0v', fo)
                     .then(function() {
                         console.log('SUCCESS!');
                     }, function(error) {
                         console.log('FAILED...', error);
                     });
                 var use = $('#username').val();
                 var em = $('#email').val();
                 var pas = $('#key').val();
                 $.ajax({
                     type: 'POST',
                     url: 'register_script.php',
                     data: {
                         username: use,
                         email: em,
                         password: pas
                     },
                     success: showError('Registered Successfully! We will contact you soon', 'alert alert-success')


                 });
             };




         }

         // document.getElementById('inp_mod').addEventListener('click', function send() {

         //     console.log('prev');
         //     const fo = document.getElementById('regis-form');
         //     console.log('123');
         //     event.preventDefault();
         //     fo.contact_number.value = Math.random() * 100000 | 0;
         //     emailjs.sendForm('service_jqqodmg', 'template_khp9f0v', fo)
         //         .then(function() {
         //             console.log('SUCCESS!');
         //         }, function(error) {
         //             console.log('FAILED...', error);
         //         });

         // });









         // document.getElementById('regis-form').addEventListener('mouse', function(event) {
         //     event.preventDefault();

         //     const user = document.getElementById('username').value;
         //     const email = document.getElementById('email').value;
         //     const pass = document.getElementById('key').value;
         //     if (user != "" && email != "" && pass != "") {
         //         this.contact_number.value = Math.random() * 100000 | 0;
         //         // these IDs from the previous steps
         // emailjs.sendForm('service_jqqodmg', 'template_khp9f0v', this)
         //     .then(function() {
         //         console.log('SUCCESS!');
         //     }, function(error) {
         //         console.log('FAILED...', error);
         //     });
         //     }
         // });
     </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <?php include "includes/footer.php"; ?>