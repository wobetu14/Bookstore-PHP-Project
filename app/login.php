<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap forms example</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="/bookstore3/bootstrap/css/bootstrap.min.css">
    <![endif]-->
</head>

<body>

<br/>
<div class="container">
    <br/><br/><br/><br/><br/><br/><br/>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>User Login</h4>
                </div>
                <div class="panel panel-body">

                    <?php
//                        authenticate user
                    include ("connection.php");
                    if (isset($_POST['btn_login'])){
                        $username=$_POST['username'];
                        $password=md5($_POST['password']);

                        $user="SELECT * FROM users WHERE username='$username' and password='$password'";
                        $user_result=mysqli_query($conn,$user);

                        if (mysqli_num_rows($user_result)>0){
                            $user=mysqli_fetch_array($user_result);

                            $_SESSION['username']=$user['username'];
                            $_SESSION['password']=$user['password'];
                            $_SESSION['fname']=$user['fname'];
                            $_SESSION['lname']=$user['lname'];
                            $_SESSION['user_id']=$user['id'];

                            header("Location:http://localhost/bookstore3/app/index.php");

                            /**
                             * get user role / user group
                             */

                            $user_roles="SELECT * FROM role_users WHERE role_users.user_id=".$user['id'];

                            $user_roles_result=mysqli_query($conn,$user_roles);
                            $user_roles_result=mysqli_fetch_array($user_roles_result);

                            $get_role_name="SELECT * FROM roles WHERE id=".$user_roles_result['role_id'];
                            $get_role_name=mysqli_query($conn,$get_role_name);
                            $get_role_name=mysqli_fetch_array($get_role_name);

                            $_SESSION['role']=$get_role_name['role'];
                        }
                        else{
                           ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Incorrect user name or password. Please try again.
                            </div>
                        <?php
                        }
                    }

                    ?>
                    <form action="login.php" method="post">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </div>
                            <input type="text" name="username" class="form-control" placeholder="User Name"/>
                        </div>
                        <br/>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                        <br/>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit" name="btn_login">Login</button>
                            <a href="#" class="btn-block btn-link col-md-offset-3">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
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
