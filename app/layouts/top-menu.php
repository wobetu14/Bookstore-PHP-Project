<?php
    if (isset($_SESSION['username'])){
      ?>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- The mobile navbar-toggle button can be safely removed since you do not need it in a non-responsive implementation -->
                    <a class="navbar-brand text-info" href="#"><strong><span class="text-primary">Roha Bookstore</span></strong></a>
                </div>
                <!-- Note that the .navbar-collapse and .collapse classes have been removed from the #navbar -->
                <div id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Dashboard</a></li>
                        <li><a href="#">Buy Now</a></li>
                        <li><a href="book-categories.php">Book Categories</a></li>
                        <li><a href="#">All Books</a></li>

                        <?php
                            if ($_SESSION['role']=='admin'){
                                ?>
                                <li><a href="usermanagement.php">User Management</a></li>
                        <?php
                            }
                            else if ($_SESSION['role']=='officer') {
                        ?>
                                <li><a href="newbook.php">New Book Entry </a></li>
                                <li><a href="setup_pricing.php">Setup pricing </a></li>
                                <li><a href="purchase_orders.php">Purchase Orders </a></li>
                                <li><a href="sales.php">Sales</a></li>
                        <?php
                                    }
                                else if ($_SESSION['role']='customer') {
                        ?>
                                <li><a href="buy_now.php">But Now</a></li>
                        <?php
                        }
                        ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php
                                echo $_SESSION['fname']." ".$_SESSION['lname'];
                                ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Account Settings</a></li>
                                <li><a href="http://localhost/bookstore3/app/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>

                </div><!--/.nav-collapse -->
            </div>
        </nav>
<?php
    }
else{
    ?>

<!--    Guest menu items-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <!-- The mobile navbar-toggle button can be safely removed since you do not need it in a non-responsive implementation -->
                <a class="navbar-brand text-info" href="#"><strong><span class="text-primary">Roha Bookstore</span></strong></a>
            </div>
            <!-- Note that the .navbar-collapse and .collapse classes have been removed from the #navbar -->
            <div id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="#">Books</a></li>
                    <li><a href="book-categories.php">Book Categories</a></li>
                    <li><a href="#">Buy Now</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Sign up</a></li>
                </ul>

            </div><!--/.nav-collapse -->
        </div>
    </nav>
<?php
    }
?>
