<?php require('header.php'); ?>
<?php require('landing-header.php'); ?>

        <h3 class="fw-bolder m-auto mb-3">Password Reset</h3>

        <form method="POST" id="pwreset-form" class="d-flex flex-column align-items-center">
            <div class="form-floating m-auto mb-2 w-100">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating m-auto mb-2 w-100">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <label for="email">Email</label>
            </div>
            <div class="form-floating w-100">
                <textarea class="form-control h-25" rows="10" id="family_member" name="family_member" placeholder="Family Members"></textarea>
                <label for="family_member">Family Members</label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg m-auto mt-3 w-50" id="btn-submit">SUBMIT</button>
            <small class="m-auto mt-2"><a href="login.php" id="small-register-link">Login here.</a></small>
        </form>
    
<?php require('landing-footer.php'); ?>
<?php require('footer.php'); ?>



<script>
    $(document).ready(function() {
        // sumbit the data from the web form using AJAX to server
        $('#pwreset-form').on("submit", function(event) {
            event.preventDefault(); //prevent page refresh after submission

            //get values from form

            var username = $('#username').val();
            var email = $('#email').val();
            var family_member = $('#family_member').val();

            // alert(idno + " " + fname);

            if(username == "" || email == "") {
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
            } else if(family_member.length > 100) { //family members length check
                // alert("Maximum of 100 characters for family members.."); 
                Swal.fire({
                    icon: 'warning',
                    title: 'Maximum of 100 characters for family members..',
                })
            } else { // save to database if all contents are correct
                $.ajax({
                    url:"controller/password-reset.php", 
                    method: "POST", 
                    data: $('#pwreset-form').serialize(),
                    beforeSend: function() {
                        $('#btn-submit').attr('disabled', true);
                    },
                    success: function(data) {
                        // alert(data);

                        if(data == 200){
                            $('#pwreset-form')[0].reset(); // clear the form
                            $('#username').focus(); // focus on username input field
                            // alert("Password reset request submitted! Please wait for the email within the day.");
                            Swal.fire({
                                icon: 'success',
                                title: 'Password reset request submitted! Please wait for the email within the day.',
                                }).then((result) => {
                                window.location = 'index.php';
                            })
                        } else if (data == 0) {
                            // alert("Failed to submit request.");
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to submit request!',
                            })
                        } else {
                            // alert("Something went wrong, please try again later.");
                            Swal.fire({
                                icon: 'warning',
                                title: 'Something went wrong, please try again later.!',
                            })
                        }

                        $("#btn-submit").attr('disabled',false);
                    }
                });

            }
        });

    });
</script>