<?php require('header.php'); ?>
<?php require('landing-header.php'); ?>

    
        <h3 class="fw-bolder m-auto mb-3">Sign in</h3>
        <form method="POST" id="login-form" class="d-flex flex-column align-items-center">
            <div class="form-floating m-auto mb-2">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <button type="submit" class="btn btn-primary btn-lg m-auto mt-3 w-50" id="login-button">SIGN IN</button>
            <a type="button" class="btn btn-primary btn-lg m-auto mt-3 w-50 text-center" id="sign-up-button" href="register.php">REGISTER</a>

            <small class="m-auto mt-2"><a href="password_reset.php" id="small-forgot-pw" class="link-underline-opacity-0 mt-3">Forgot password?</a></small>
        </form>
    
<?php require('landing-footer.php'); ?>
<?php require('footer.php'); ?>

<script>
    $(document).ready(function() {
        // sumbit the data from the web form using AJAX to server
        $('#login-form').on("submit", function(event) {
            event.preventDefault(); //prevent page refresh after submission

            //get values from form

            var username = $('#username').val();
            var pword = $('#password').val();

            // alert(username + " " + fname);

            if(username == "" || pword == "") {
                // alert("All fields are required.");
                Swal.fire({
                    icon: 'warning',
                    title: 'All fields are required.',
                })
            } else { // save to database if all contents are correct
                $.ajax({
                    url:"controller/login-account.php", 
                    method: "POST", 
                    data: $('#login-form').serialize(),
                    beforeSend: function() {
                        $('#login-button').attr('disabled', true);
                    },
                    success: function(data) {
                        // alert(data);
                        
                        if(data == 200){
                            // alert("Access Granted \n \n Welcome back user.");
                            Swal.fire({
                                icon: 'success',
                                title: 'Access Granted',
                                text: 'Welcome back '+username+'!',
                                }).then((result) => {
                                window.location = 'user/index.php';
                            })
                        } else if (data == 404) {
                            // alert("Access Denied! Incorrect id number or password.");
                            Swal.fire({
                                icon: 'error',
                                title: 'Access Denied',
                                text: 'Incorrect id number or password.'
                            })
                        } else {
                            // alert("No record found. Please register your account.");
                            Swal.fire({
                                icon: 'warning',
                                title: 'No record found!',
                                text: 'Please register your account.',
                                // }).then((result) => {
                                // window.location = 'index.php';
                            })
                        }

                        $("#login-button").attr('disabled',false);
                    }
                });

            }
        });

    });
</script>