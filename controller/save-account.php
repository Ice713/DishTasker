<?php 
//connection to database server
include('../config/connection.php');

//save data
if(isset($_POST['username'])){
    // get the data and sanitize it
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $repassword = $conn->real_escape_string($_POST['repassword']);

    // encrypt password
    $encrypt_pword = password_hash($password, PASSWORD_DEFAULT);

    // check if username is existing
    $check = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($check);
    $count = $result->num_rows;

    if ($count == 0){
        //save
        $save = "INSERT INTO `user` (username, password) VALUES ('$username', '$encrypt_pword')";
        $result = $conn->query($save);

        if($result == true) {
            //success
            echo 200;
        } else {
            //failed
            echo 0;
        }
    } else {
        //do not save
        echo 1;
    }
}
?>