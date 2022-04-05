<?php
session_start();
if (isset($_SESSION)){
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>New book | Roha bookstore</title>

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
    <div class="container">
        <div class="row">
            <br/><br/><br/>
            <h3 class="text-primary">Enter new book information</h3>

            <form action="newbook.php" method="post" enctype="multipart/form-data">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Book category</label>
                        <select name="cat_id" class="form-control">
                            <option value="">Select book category</option>

                            <?php
                                $categories="SELECT * from book_categories";
                                $categories=mysqli_query($conn,$categories);
                                while ($cat=mysqli_fetch_array($categories)){
                            ?>
                            <option value="<?php echo $cat['id']?>"><?php echo $cat['cat_name'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ISBN Number</label>
                        <input type="text" name="isbn" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Book title</label>
                        <input type="text" name="book_title" class="form-control"/>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" name="book_author" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Publishing Company</label>
                        <input type="text" name="publisher" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Publishing Country</label>
                        <input type="text" name="pub_country" class="form-control"/>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date / Year</label>
                        <input type="date" name="pub_date" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" name="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Upload book</label>
                        <input type="file" name="book_name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Upload cover photo</label>
                        <input type="file" name="cover_photo" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="btn_create_book">
                            <span class="glyphicon glyphicon-floppy-save"></span>
                            Save</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
            if (isset($_POST['btn_create_book'])){
                $cat_id=$_POST['cat_id'];
                $isbn=$_POST['isbn'];
                $book_title=$_POST['book_title'];
                $author=$_POST['book_author'];
                $publisher=$_POST['publisher'];
                $pub_country=$_POST['pub_country'];
                $pub_date=$_POST['pub_date'];
                $description=$_POST['description'];

                $book_name=$_FILES['book_name']['name'];
                $book_temp_name=$_FILES['book_name']['tmp_name'];

                $cover_name=$_FILES['cover_photo']['name'];
                $cover_temp_name=$_FILES['cover_photo']['tmp_name'];

                $target_book="uploads/".$book_name;
                $target_cover="uploads/".$cover_name;


                if(!file_exists("uploads"))
                    mkdir("uploads");
                if( copy($book_temp_name, $target_book) or  die( "Could not copy file!"))
                    echo "Book uploaded successfully";
                else
                    die("unable to upload book!");

                if(!file_exists("uploads"))
                    mkdir("uploads");
                if( copy($cover_temp_name, $target_cover) or  die( "Could not copy file!"))
                    echo "Cover photo uploaded successfully";
                else
                    die("unable to upload cover photo!");

                $create_book="INSERT INTO books (cat_id,ISBN,title,author,publisher,publish_country,file_path, cover_photo,publish_date,long_description,created_at, updated_at)
                              VALUES ('$cat_id','$isbn','$book_title','$author','$publisher','$pub_country'
                              ,'$target_book','$target_cover','$pub_date','$description',now(),now())";
                $create_book=mysqli_query($conn,$create_book);

                if ($create_book){
                    ?>
                    <div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        <strong>New book created successfully.</strong>
                    </div>
        <?php
                }
                else{
                    ?>
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-remove"></span>
                        <strong>Error in book record. <?php echo mysqli_error($conn);?></strong>
                    </div>
        <?php
                }
            }
        ?>

        <div class="row">
            <a href="<?php echo $root_url.'index.php'?>" class="btn btn-success pull-right">
                <span class="glyphicon glyphicon-backward"></span>
                Back</a>
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
?>
