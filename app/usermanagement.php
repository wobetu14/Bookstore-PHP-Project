<?php
session_start();
include ("connection.php");
if ($_SESSION['username']){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>User Management | Roha Bookstore</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="/bookstore3/bootstrap/css/bootstrap.min.css">
        <![endif]-->
    </head>

    <body>

    <!-- Fixed navbar (top menu) -->
    <?php include("layouts/top-menu.php") ?>

    <br/>
    <div class="container-fluid">
        <br/><br/><br/>
            <div class="row">
                <div class="col-md-3">
                    <?php include_once("manage_users_menu.php") ?>
                </div>
                <div class="col-md-9">
                    <?php
//                        List of all users and roles
                        $users=mysqli_query($conn,"SELECT * FROM users");

                        echo "<p>".@$_SESSION['success']."</p>";
                        ?>
                    <table class="table table-condensed table-striped">
                        <tr>
                        <th>User Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
<!--                        <th>Email</th>-->
                        <th>Photo</th>
                        <th>User Group</th>
                        <th>Actions</th>
                        </tr>

                         <?php
                        while ($row=mysqli_fetch_array($users)){
                            ?>
                           <tr>
                               <td><?php echo $row['username']; ?></td>
                               <td><?php echo $row['fname']; ?></td>
                               <td><?php echo $row['lname']; ?></td>

                               <td>
                                   <a href="<?php echo $row['profile_pic']?>"><img src="<?php echo $row['profile_pic']?>" width="50" height="50" class="img-circle img-responsive"/></a>
                               </td>

                               <?php
                                $user_roles="SELECT * FROM role_users WHERE role_users.user_id=".$row['id'];
                                $user_roles_result=mysqli_query($conn,$user_roles);
                                $user_roles_result=mysqli_fetch_array($user_roles_result);

                                $get_role_name="SELECT * FROM roles WHERE id=".$user_roles_result['role_id'];
                                $get_role_name=mysqli_query($conn,$get_role_name);
                                $get_role_name=mysqli_fetch_array($get_role_name);
                                ?>

                               <td><?php echo $get_role_name['role_name'] ?></td>

                               <td>
                                   <a href="#" class="btn btn-primary btn-sm">
                                       <span class="glyphicon glyphicon-eye-open"></span> View</a>
                                   <a href="#" class="btn btn-success btn-sm">
                                       <span class="glyphicon glyphicon-edit"></span> Edit</a>
                                   <a href="#" class="btn btn-danger btn-sm">
                                       <span class="glyphicon glyphicon-remove"></span> Delete</a>
                                   <?php
                                   $get_user_location="SELECT * FROM user_locations WHERE user_id=".$row['id'];
                                   $get_user_location=mysqli_query($conn,$get_user_location);
                                   if (mysqli_num_rows($get_user_location)<=0){
                                       ?>
                                       <a href="<?php echo $root_url.'user-location.php?user_id='.base64_encode($row['id']);?>" class="btn btn-link">
                                           Complete location info
                                       </a>
                                       <?php
                                   }
                                   ?>
                               </td>
                           </tr>
                        <?php
                        }
                        ?>
                    </table>
                        <?php

                    ?>
                </div>
            </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- jQuery library -->
    <script src="/bookstore3/bootstrap/js/jquery3.3.1.min.js"></script>

    <!--    jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="/bookstore3/bootstrap/js/bootstrap.min.js"></script>

    </body>
    </html>
    <?php
}
else {
    header("Location:http://localhost/bookstore3/app/login.php");
}
?>

