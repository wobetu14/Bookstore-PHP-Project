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

        <div class="row">
            <?php
                $book=mysqli_query($conn,"SELECT * FROM books WHERE id=".$_GET['book_id']);
                $book=mysqli_fetch_array($book);
            ?>
            <div class="col-md-6 col-md-offset-3">
                <h3 class="text-primary">Set price of this book <b><?php echo $book['title'] ?></b></h3><br/>
                <form action="set-price.php" method="post">
                    <div class="form-group">
                        <input type="hidden" name="book_id" value="<?php echo $_GET['book_id']?>"/>
                    </div>
                    <div class="form-group">
                        <input type="number" name="price" class="form-control" placeholder="Book price"></input>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" name="btn_set_price">
                            <span class="glyphicon glyphicon-floppy-save"></span>
                            Save
                        </button>
                    </div>
                </form>

                <?php
                    $book_id=@$_POST['book_id'];
                    $price=@$_POST['price'];
                    $effective=1;

                    if (isset($_POST['btn_set_price'])) {
                        $bookId=$_POST['book_id'];
                        $update_price="UPDATE prices SET effective=0 WHERE book_id='$bookId'";
                        $update_price=mysqli_query($conn,$update_price);
                        if (!$update_price){
                            echo "<b>Error updating book price info. ".mysqli_error($conn)."</b>";
                            die();
                        }

                        $create_price = mysqli_query($conn, "INSERT INTO prices (book_id,price,effective,created_at,updated_at)
                        VALUES ('$book_id','$price','$effective',now(),now())");

                        if ($create_price) {
                            ?>
                            <div class="alert alert-success">
                                <span class="glyphicon glyphicon-ok"></span>
                                Price has been set successfully
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger">
                                <span class="glyphicon glyphicon-remove"></span>
                                Error in setting price. <?php echo mysqli_error($conn) ?>
                            </div>
                            <?php
                        }
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
