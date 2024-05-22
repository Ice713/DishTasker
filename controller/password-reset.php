<?php 
//connection to database server
include('../config/connection.php');

//save data
if(isset($_POST['username'])){
    // get the data and sanitize it
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $family_member = $conn->real_escape_string($_POST['family_member']);

    // encrypt password
    // $encrypt_pword = password_hash($password, PASSWORD_DEFAULT);

    // check if username is existing
    $check = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($check);
    $count = $result->num_rows;

    // if ($count == 1){
        //save
        $save = "INSERT INTO password_reset (username, email, members) VALUES ('$username', '$email', '$family_member')";
        $result = $conn->query($save);

        if($result == true) {
            //success
            echo 200;
        } else {
            //failed
            echo 0;
        }
    // } else {
    //     //do not save
    //     echo 1;
    // }
}
?>