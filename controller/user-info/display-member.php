<?php
    include_once '../config/connection.php';

            $family_members = "SELECT * FROM familymember WHERE username = '$log_user'";
            $response = mysqli_query($conn,$family_members);

            

            while($row = mysqli_fetch_array($response))
            {
            
            $name = $row['name'];
            $nickname = $row['nickname'];
            $id = $row['id'];

            echo "
                <th scope='row'>$name</th>
                <td>$nickname</td>
                <td class='align-content-center py-1 text-danger fs-3 text-center'>
                    <button type='submit' id='btn-add' class='no-design-btn' onclick='deleteRecord($id)'>
                        <i class='fas fa-times-circle'></i>
                    </button>
                </td>
            </tr>

            

        
            ";
            }

        // // Query to get the number of records
        // $sql = "SELECT COUNT(*) AS count FROM familymember WHERE username = 'Roger'";
        // $result = mysqli_query($conn, $sql);

        // // Check if query was successful
        // if ($result) {
        //     // Fetch the result
        //     $row = mysqli_fetch_assoc($result);

        //     // Print the count of records
        //     $records = $row['count'];
        // } 

?>