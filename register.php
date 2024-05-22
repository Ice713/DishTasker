<?php require('header.php'); ?>
<?php require('landing-header.php'); ?>

        <h3 class="fw-bolder m-auto mb-3">Register</h3>

        <form method="POST" id="register-form" class="d-flex flex-column align-items-center">
            <div class="form-floating m-auto mb-2">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating m-auto mb-2">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re-type Password">
                <label for="repassword">Re-type Password</label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg m-auto mt-3 w-50" id="btn-register">REGISTER</button>
            <small class="m-auto mt-2">Already have an account? <a href="login.php" id="small-register-link">Login here.</a></small>
        </form>
    
<?php require('landing-footer.php'); ?>
<?php require('footer.php'); ?>



<script>
    $(document).ready(function() {
        // sumbit the data from the web form using AJAX to server
        $('#register-form').on("submit", function(event) {
            event.preventDefault(); //prevent page refresh after submission

            //get values from form

            var username = $('#username').val();
            var pword = $('#password').val();
            var repword = $('#repassword').val();

            // alert(idno + " " + fname);

            if(username == "" || pword == "") {
                // alert("All fields are required.");
                Swal.fire({
                    icon: 'warning',
                    title: 'All fields are required.',
                })
            } else if(username.length > 10) { //username length check
                // alert("Maximum of 10 characters for username."); 
                Swal.fire({
                    icon: 'warning',
                    title: 'Maximum of 10 characters for username.',
                })
            } else if(pword != repword) { // password match check
                // alert("Password does not match."); 
                Swal.fire({
                    icon: 'warning',
                    title: 'Password does not match.',
                })
            } else if(pword.length < 6 || pword.length > 12) { //password length check
                // alert("Password should be atleast 6 to 12 characters."); 
                Swal.fire({
                    icon: 'warning',
                    title: 'Password should be atleast 6 to 12 characters.',
                })
            } else { // save to database if all contents are correct
                $.ajax({
                    url:"controller/save-account.php", 
                    method: "POST", 
                    data: $('#register-form').serialize(),
                    beforeSend: function() {
                        $('#btn-register').attr('disabled', true);
                    },
                    success: function(data) {
                        // alert(data);

                        if(data == 200){
                            $('#register-form')[0].reset(); // clear the form
                            $('#username').focus(); // focus on idnumber input field
                            // alert("Account successsfully created.");
                            Swal.fire({
                                icon: 'success',
                                title: 'Account successsfully created!',
                                }).then((result) => {
                                window.location = 'login.php';
                            })
                        } else if (data == 0) {                            
                            // alert("ID NO already exists");
                            Swal.fire({
                                icon: 'warning',
                                title: 'ID NO already exists!',
                            })
                        } else {
                            // alert("Failed to create.");
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to create!',
                            })
                        }

                        $("#btn-register").attr('disabled',false);
                    }
                });

            }
        });

    });
</script>