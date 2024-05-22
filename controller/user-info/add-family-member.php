<?php 
include '../../config/connection.php';


//save data
if(isset($_POST['name'])){
    // get the data and sanitize it
    $name = $conn->real_escape_string($_POST['name']);
    $nickname = $conn->real_escape_string($_POST['nickname']);
    // $repassword = $conn->real_escape_string($_POST['repassword']);

    // encrypt password
    // $encrypt_pword = password_hash($password, PASSWORD_DEFAULT);


    // Initialize the session
    session_start();

    $log_user = $_SESSION['username']; //get username currently logged in

    $log_uname = "SELECT username FROM `user` WHERE username = '$log_user'";
    $session_result = $conn->query($log_uname);

    $row = $session_result->fetch_assoc();

    $username = $row["username"]; // get ID to add as foreign key

    // check if name is existing
    $check = "SELECT * FROM familymember WHERE username = '$log_user' AND name = '$name'";
    $result = $conn->query($check);
    $count = $result->num_rows;



    if ($count == 0){
        //save
        $save = "INSERT INTO familymember (username, name, nickname) VALUES ('$username', '$name', '$nickname')";
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