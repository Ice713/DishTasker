<?php
include '../../config/connection.php';
// if(isset($_GET['deleteId'])){
//     $id= $_GET['deleteId'];

   
//     $query="DELETE from familymember WHERE id=$id";
//     $exec= mysqli_query($conn,$query);
//     if($exec){
//       echo 200;
//     }else{
        
//       echo 0;
//     }
// }

if(isset($_POST['record_id'])){
    // Get record id to delete
    $record_id = $_POST['record_id'];

 

    // SQL query to delete record from the database
    $sql = "DELETE FROM familymember WHERE id = $record_id";

    if (mysqli_query($conn, $sql)) {
        echo 200;
    } else {
        echo 0;
    }

    mysqli_close($conn);
}

 
// echo $record_id;

?>