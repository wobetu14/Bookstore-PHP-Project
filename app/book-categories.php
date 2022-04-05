<?php
    session_start();
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Book categories | Roha Bookstore</title>

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
        <div class="container">
            <br/><br/><br/>
            <?php
            if (isset($_SESSION['username']) && $_SESSION['role']=='officer'){
                ?>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="text-primary">Create new book category</h3><br/>
                    <form action="book-categories.php" method="post">
                        <div class="form-group">
                            <input type="text" name="book_category" placeholder="Category Name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <textarea name="cat_description" class="form-control" placeholder="Category Description"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" name="btn_create_category">
                                <span class="glyphicon glyphicon-floppy-save"></span>
                                Save
                            </button>
                        </div>
                    </form>

                    <?php
                        if (isset($_POST['btn_create_category'])){
                            $book_category=@$_POST['book_category'];
                            $cat_description=@$_POST['cat_description'];
                            $create_category="INSERT INTO book_categories (cat_name, cat_description, created_at, updated_at)
                          VALUES ('$book_category','$cat_description',now(),now())";

                            if (mysqli_query($conn, $create_category)){
                                ?>
                                <div class="alert alert-success">
                                    <b>
                                        <span class="glyphicon glyphicon-ok"></span>
                                        New book category has been created successfully.
                                    </b>
                                </div>
                    <?php
                            }
                            else{
                                ?>
                                <div class="alert alert-danger">
                                    <b>
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Errot in createing this book category <?php echo mysqli_error($conn); ?>
                                    </b>
                                </div>
                    <?php

                            }
                        }
                    ?>


                </div>
            </div>

            <br/><br/><br/>
            <h3 class="text-info">Book Categories</h3>

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
                                        <?php if ($_SESSION['role']=='officer'){

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

            <?php
            }
            else{
            ?>
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
                                            <p align="right"><a href="showbooks.php?cat_id=<?php echo $book_cat['id']?>" class="btn btn-info btn-sm" role="button">Show books</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
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

        <!-- New comment content here -->

        <!-- Another comment content here also -->

        </body>
        </html>

