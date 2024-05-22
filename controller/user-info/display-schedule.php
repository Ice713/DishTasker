<?php
    // include_once '../../config/connection.php';


    // Get names from database
    $sql = "SELECT nickname FROM familymember WHERE username = '$log_user'";
    $result = mysqli_query($conn, $sql);

    $dishwasher = array();
    $output = array();


    // Check if there are any rows
    if (mysqli_num_rows($result) > 0) {

        // Fetch all rows into an array
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Repeat 12 times
        for ($i = 0; $i <= 12; $i++) {

            // Shuffle the array of names
            // shuffle($rows);

            // Print the first 4 or 5 names
            for ($j = 0; $j < count($rows) && $j < 12; $j++) {
                $dishwasher[$j] = $rows[$j]['nickname'] . " ";
            }

        }   
    } else {
        $dishwasher[0] = "-";
    }

    $toShow[0] = "0";

    $counter = count($dishwasher);


    for ($ll = 0; $ll < 12; $ll++){
        $toShow[$ll] = $dishwasher[$counter - 1];
        $counter--;
        if ($counter == 0) {
            $counter = count($dishwasher);                        
        }
    }

    foreach ($toShow as $show2){
        // echo $show2;
    }

    $reversed = array_reverse($toShow);


    // $dishwasher = array();
    // // Query to get the number of records
    // $sql = "SELECT COUNT(*) AS count FROM familymember WHERE username = 'Roger'";
    // $result = mysqli_query($conn, $sql);

    // // Check if query was successful
    // if ($result) {
    //     // Fetch the result
    //     $row = mysqli_fetch_assoc($result);

    //     $records = $row['count'];
    //     // Print the count of records
    //     // echo "Number of records: " . $records;
        
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }


    //         // $family_members = "SELECT * FROM familymember WHERE username = '$log_user'";
    //         $family_members = "SELECT * FROM familymember WHERE username = 'Roger'";
    //         $response = mysqli_query($conn, $family_members);


    //         $i = 0;
          

    //         while($members = mysqli_fetch_array($response))
    //         {
            
    //         // $name = $members['name'];
    //         $nickname = $members['nickname'];
    //         // $id = $members['id'];

    //         while( $i < 12){
    //             $dishwasher[$i] = $nickname;
    //             if ($i < $records){
    //                 $i = 0;
    //             }
    //         }
    //         $i++;
                

    //         // echo $nickname.'<br>';

            

    //         // echo "
    //         //     <th scope='row'>$name</th>
    //         //     <td>$nickname</td>
    //         //     <td class='align-content-center py-1 text-danger fs-3 text-center'>
    //         //         <button type='submit' id='btn-add' class='no-design-btn' onclick='deleteRecord($id)'>
    //         //             <i class='fas fa-times-circle'></i>
    //         //         </button>
    //         //     </td>
    //         // </tr>        
    //         // ";
    //         }
            


    //         foreach ($dishwasher as $display) {
    //             echo $display.'<br>';
    //         }

            

?>