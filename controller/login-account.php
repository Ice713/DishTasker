<?php 
//connection to database server
include('../config/connection.php');

if(!empty($_POST)){
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    //check if id number is existing
    $check = "SELECT * FROM `user` WHERE username = '$username'";
    $result = $conn->query($check);
    $count = $result->num_rows;
    

    if ($count == 1){
        // id existing
        while($row = $result->fetch_array()){
            $username = $row['username'];
            $mypassword = $row['password'];
        }

        
        if (password_verify($password, $mypassword)){ // (user input, fetched from db)
            // correct password
            echo 200;
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
        } else {
            // incorrect password
            echo 404;
        }
    } else {
        // no record of such id
        echo 0;
    }
}
?>