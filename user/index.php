<?php include('../header.php'); ?>
<?php include('user-header.php'); ?>
    <div class="container-fluid d-flex flex-column justify-content-center" id="user-dashboard">
        <div class="container">
            <div>
                <h1 class="fst-italic fw-bold dishwash-title">Dishwash<span id="schedule-title">Schedule</span></h1>
            </div>

            <?php 
                include ('../controller/user-info/display-schedule.php');
            ?>
            

            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Meal</th>
                    <th scope="col">Sun</th>
                    <th scope="col">MWF</th>
                    <th scope="col">TTh</th>
                    <th scope="col">Sat</th>
                </tr>
            </thead>    
            <tbody>
                <tr>
                    <th scope="row"><i class="fas fa-coffee"></i></th>
                    <td><?php echo $reversed[0]; ?></td>
                    <td><?php echo $reversed[3]; ?></td>                 
                    <td><?php echo $reversed[6]; ?></td>                 
                    <td><?php echo $reversed[9]; ?></td>                 
                </tr>
                <tr>
                    <th scope="row"><i class="fas fa-sun"></i></th>
                    <td><?php echo $reversed[1]; ?></td>                 
                    <td><?php echo $reversed[4]; ?></td>                 
                    <td><?php echo $reversed[7]; ?></td>                 
                    <td><?php echo $reversed[10]; ?></td>                 
                </tr>
                <tr>
                    <th scope="row"><i class="fas fa-moon"></i></th>                 
                    <td><?php echo $reversed[2]; ?></td>                 
                    <td><?php echo $reversed[5]; ?></td>                 
                    <td><?php echo $reversed[8]; ?></td>                 
                    <td><?php echo $reversed[11]; ?></td>                 
                </tr>
            </tbody>
            </table>

            <?php 
                
                // $toShow[0] = "0";

                // $counter = count($dishwasher);


                // for ($ll = 0; $ll < 12; $ll++){
                //     $toShow[$ll] = $dishwasher[$counter - 1];
                //     $counter--;
                //     if ($counter == 0) {
                //         $counter = count($dishwasher);                        
                //     }
                // }

                // foreach ($toShow as $show2){
                //     echo $show2;
                // }

                // $counter = count($dishwasher);

                // echo $counter;
            ?>

            <div>
                <h1 class="fst-italic fw-bold dishwash-title mt-5">Family<span id="schedule-title">Members</span></h1>                
            </div>

            <table class="table" id="family-members-table">
             <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Nickname</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>

                <?php 
                    include ('../controller/user-info/display-member.php');
                ?>
                <tr>
                    <form id="add-family" method="POST">
                        <input type="text" class="d-none" name="records" id="records" value="<?php echo $records?>">
                        <th scope="row"><input type="text" name="name" id="name" class="w-100" placeholder="Name"></th>
                        <td><input type="text" name="nickname" id="nickname" class="w-100" placeholder="Nickname"></td>
                        <td class="align-content-center py-1 text-success fs-2 text-center">
                            <button type="submit" id="btn-add" class="no-design-btn">
                                <i class="fas fa-plus-circle"></i>                                
                            </button>
                        </td>
                    </form>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
    

    

<?php include('../footer.php'); ?>

<?php


// Free result set
// $result -> free_result();

// $conn -> close();


?>

<script>
    $(document).ready(function() {
        // sumbit the data from the web form using AJAX to server
        $('#add-family').on("submit", function(event) {
            event.preventDefault(); //prevent page refresh after submission

            //get values from form

            var name = $('#name').val();
            var nickname = $('#nickname').val();
            var records = $('#records').val();
            var records_count = parseInt(records);

            // alert(idno + " " + fname);

            if(name == "" || nickname == "") {
                // alert("All fields are required.");
                Swal.fire({
                    icon: 'warning',
                    title: 'All fields are required.',
                })
            } else if(records_count >= 7) { //records length check
                // alert("Maximum of 7 family members only."); 
                Swal.fire({
                    icon: 'warning',
                    title: 'Maximum of 7 family members only.',
                })
            } else if(nickname.length > 4) { //nickname length check
                // alert("Maximum of 4 characters for nickname."); 
                Swal.fire({
                    icon: 'warning',
                    title: 'Maximum of 4 characters for nickname.',
                })
            } else { // save to database if all contents are correct
                $.ajax({url:"../controller/user-info/add-family-member.php", 
                    method: "POST", 
                    data: $('#add-family').serialize(),
                    beforeSend: function() {
                        $('#btn-add').attr('disabled', true);
                    },
                    success: function(data) {
                        // alert(data);

                        if(data == 200){
                            $('#add-family')[0].reset(); // clear the form
                            $('#name').focus(); // focus on name input field
                            // alert("Account successsfully created.");
                            Swal.fire({
                                icon: 'success',
                                title: 'Member successsfully added!',
                                }).then((result) => {
                                window.location = 'index.php';
                            })
                        } else if (data == 0) {
                            // alert("Failed to create.");
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to add family member!',
                            })
                        } else if (data == 1) {
                            // alert("Name already exist!");
                            Swal.fire({
                                icon: 'warning',
                                title: 'Name already exist!',
                            })
                        } else {
                            // alert("Failed to create.");
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to add family member!',
                            })
                            document.write(data);
                        }

                        $("#btn-add").attr('disabled',false);
                    }
                });

            }
        });

    });



    function deleteRecord(id) {
        $.ajax({
            type: "POST",
            url: "../controller/user-info/delete-family-member.php",
            data: { record_id: id },
            success: function(response) {
                if(response == 200){
                    // $('#msg').html(data);
                    // $('#family-members-table').load('display-member.php');
                    Swal.fire({
                        icon: 'success',
                        title: 'Member successsfully deleted!',
                        }).then((result) => {
                        window.location = 'index.php';
                    })

                } else if (response == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to delete family member!',
                    })

                }
            }
        });
    }

    // var deleteData = function(id){
    //     $.ajax({    
    //         type: "POST",
    //         url: "../controller/user-info/delete-family-member.php", 
    //         data:{deleteId:id},            
    //         dataType: "html",                  
    //         success: function(data){ 
                
    //             if(data == 200){
    //                 $('#msg').html(data);
    //                 $('#family-members-table').load('display-member.php');
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'Member successsfully deleted!',
    //                     // }).then((result) => {
    //                     // window.location = 'index.php';
    //                 })

    //             } else if (data == 0) {
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Failed to delete family member!',
    //                 })

    //             }
            
    //         }
    //     });
    // };

</script>