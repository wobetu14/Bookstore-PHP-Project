<?php
session_start();
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
    <?php include "layouts/top-menu.php"; ?>

    <br/>
    <div class="container">
        <br/><br/><br/>
        <div class="row">
<!--            <div class="col-md-3">-->
<!--                --><?php //include_once ("manage_users_menu.php"); ?>
<!--            </div>-->
<!--            <div class="col-md-9">-->
                <h4 class="text-info">Create New User</h4>

                <form action="create_new_user.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ID Number</label>
                                <input type="number" name="user_id" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="username" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Re-enter password</label>
                                <input type="password" name="re_password" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email_address" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="city" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>State / Region</label>
                                <input type="text" name="state" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Choose user role / group</label>
                                <select name="role_id" class="form-control">
                                    <?php
                                    include ("connection.php");
                                    $roles=mysqli_query($conn,"SELECT * FROM roles");
                                    while($rows=mysqli_fetch_array($roles)){
                                        ?>
                                        <option value="<?php echo $rows['id'] ?>"><?php echo $rows['role_name']?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Profile photo</label>
                                <input type="file" name="user_photo" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btn_create_user" class="btn btn-primary">
                                    Create User
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                    <a href="http://localhost/bookstore3/app/usermanagement.php" class="btn btn-default pull-right">
                        <b><span class="glyphicon glyphicon-backward"></span></b> Back</a>
                </form>

            <br/><br/><br/>

            <?php
            /**
             * Create new user PHP code
             */
            include ("connection.php");
              $user_id=@$_POST['user_id'];
              $username=@$_POST['username'];
              $password=md5(@$_POST['password']);
              $repassword=@$_POST['re_password'];
              $fname=@$_POST['first_name'];
              $lname=@$_POST['last_name'];
              $email=@$_POST['email_address'];
              $mobile=@$_POST['mobile'];
              $city=@$_POST['city'];
              $state=@$_POST['state'];

              $role_id=@$_POST['role_id'];


      if (isset($_POST['btn_create_user'])){

          $filename=$_FILES['user_photo']['name'];
          $filetmpname=$_FILES['user_photo']['tmp_name'];
          $target="images/".$_FILES['user_photo']['name'];
          if(!file_exists("images"))
              mkdir("images");
          if( copy($_FILES['user_photo']['tmp_name'], $target) or  die( "Could not copy file!"))
              echo "file uploded successfully";
          else
              die("unable to upload!");

          $create_user=mysqli_query($conn,"INSERT INTO users(id,username,password,fname,lname,email,mobile,city,state,profile_pic) VALUES (
                  '$user_id','$username','$password','$fname','$lname','$email','$mobile',
                  '$city','$state','$target'
)");
          if ($create_user){
              ?>
              <div class="alert alert-success"><p>
                      <b><span class="glyphicon glyphicon-ok"></span> </b> New user has been created successfully
                  </p></div>
              <?php
          }
          else{
              ?>
              <div class="alert alert-danger">
                  <p>
                      <b>
                          <span class="glyphicon glyphicon-remove"></span>
                          Error in creating new user <?php echo mysqli_error($conn); ?>
                      </b>
                  </p>
              </div>
              <?php
          }


          $create_user_role="INSERT INTO role_users(user_id,role_id,created_at,updated_at) VALUES ('$user_id','$role_id',now(),now())";
          $result=mysqli_query($conn,$create_user_role);

          if ($result){
              ?>
              <div class="alert alert-success h5">
                  <b>
                      <p>
                          <span class="glyphicon glyphicon-ok"></span>
                          User's role has been created successfully.
                      </p>
                  </b>
              </div>
            <?php
          }
          else{
              ?>
              <div class="alert alert-danger h5">
                  <p>
                      <b>
                          <span class="glyphicon glyphicon-remove"></span>
                          Error in creating user's role. <?php echo mysqli_query($conn)?>
                      </b>
                  </p>
              </div>
            <?php
          }
      }
  ?>

<!--            </div>-->
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
    header("Location:".$root_url."login.php");
}
?>

