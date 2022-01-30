<?php

include "include/init.php";
include "include/header.php";
include "include/nav.php";
include "models/user.php";
?>

<?php


$users = User::find_all();

?>

    <div class="main-container">
        <div class="wrapper">

            <div class="card-body px-0 pt-0 pb-2 card-bg">
                <div class="table-responsive ">
                        <table class="table table-striped table-responsive">
                                <thead class="table-dark">
                                    <tr class="head-table">
                                    <th scope="col">#</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">first_name</th>
                                    <th scope="col">last_name</th>
                                    <th scope="col">username</th>
                                    <th scope="col">password</th>
                                    <th scope="col">Skills</th>
                                    <th scope="col">about_me</th>
                                    <th scope="col">phone_number</th>
                                    <th scope="col">birthDate</th>
                                    <th scope="col">email</th>
                                    <th scope="col">linkedin</th>
                                    <th scope="col">github</th>
                                    <th scope="col">type_user</th>
                                    <th scope="col">status</th>
                                    <th scope="col">commuinty_id</th>
                                    <!-- <th scope="col">image</th> -->
                                    <th class="action" scope="col">Action</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <?php foreach($users as $user): ?>
                                            <tr>
                                                <th scope="row"></th>
                                                <td><?php echo $user->id; ?></td>
                                                <td><?php echo $user->first_name; ?></td>
                                                <td><?php echo $user->last_name; ?></td>
                                                <td><?php echo $user->username; ?></td>
                                                <td><?php echo $user->password; ?></td>
                                                <td><?php echo $user->Skills; ?></td>
                                                <td></<?php echo $user->about_me; ?>td>
                                                <td><?php echo $user->phone_number; ?></td>
                                                <td><?php echo $user->birth_date; ?></td>
                                                <td><?php echo $user->email; ?></td>
                                                <td><?php echo $user->linkedin; ?></td>
                                                <td><?php echo $user->github; ?></td>
                                                <td><?php echo $user->type_user; ?></td>
                                                <td><?php echo $user->status; ?></td>
                                                <td><?php echo $user->commuinty_id; ?></td>

                                                <td class="action"><button type="button" class="btn btn-success">
                                                <a href="manager/update_user.php?id=<?php echo $user->id?>" style="text-decoration: none;color: white;">Update</a>

                                                </button>
                                                <button type="button" class="btn btn-danger">
                                                <a href="manager/delete_user.php?id=<?php echo $user->id?>" style="text-decoration: none;color: white;">Delet</a>
                                                </button>
                                            </td>
                                            

                                            </tr>
                                            <?php endforeach ;?>

                                </tbody>
                    </table>
                </div>  
        
            </div>
        </div>    

    </div> 




















<?php include "include/footer.php"; ?>