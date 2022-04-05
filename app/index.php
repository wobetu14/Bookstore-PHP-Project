<?php
 session_start();
// if ($_SESSION['username']){
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

     <!-- Fixed navbar (top menu) -->
     <?php
     include("layouts/top-menu.php");
     include ("connection.php");
     ?>

     <br/>
     <div class="container-fluid">
         <br/><br/><br/>
         <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="search-book.php" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control"
                        placeholder="Search by ISBN, title, author, company or country"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-info">
                              <span class="glyphicon glyphicon-search"></span> Go
                            </button>
                        </span>
                    </div>
                </form>
            </div>
         </div>

         <br/><br/><br/>
         <h3>Book Categories</h3>

         <div class="row">
             <div class="col-md-12">
                 <?php
                    $book_cats="SELECT * FROM book_categories";

                    $book_cats=mysqli_query($conn,$book_cats);
                    $num_of_book_cats=mysqli_num_rows($book_cats);
                    ?>
                 <div class="row">
                 <?php
                    while ($book_cat=mysqli_fetch_array($book_cats)){
                        ?>
                            <div class="col-sm-5 col-md-3">
                                <div class="thumbnail">
                                    <img src="images/PlaceholderBook.png" alt="<? echo $book_cat['cat_name'] ?>">
                                    <div class="caption">
                                        <h3><?php echo $book_cat['cat_name'] ?></h3>
                                        <p><?php echo $book_cat['cat_description'] ?></p>
                                        <?php if (@$_SESSION['role']=='officer'){

                                            ?>
                                            <p align="right">
                                                <a href="showbooks.php?cat_id=<?php echo $book_cat['id']?>" class="btn btn-info btn-sm" role="button">Show books</a>
                                                <a href="edit-bookcategory.php?cat_id=<?php echo $book_cat['id']?>" class="btn btn-default btn-sm" role="button">
                                                    <span class="glyphicon glyphicon-edit"></span> Edit</a>
                                            </p>

                                            <?php
                                        }
                                        else{
                                            ?>
                                            <p align="right"><a href="showbooks.php?cat_id=<?php echo $book_cat['id']?>" class="btn btn-info btn-sm" role="button">Show books</a></p>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                 <?php
                    }
                 ?>
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
     <?php
// }
// else {
//     header("Location:http://localhost/bookstore3/app/login.php");
// }
   ?>

