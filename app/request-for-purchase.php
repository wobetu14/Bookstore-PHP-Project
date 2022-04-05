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
            <h3 class="text-primary">Send a request for purchacing this book <b><?php echo $book['title'] ?></b></h3><br/>
            <form action="request-for-purchase.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>"/>
                </div>
                <div class="form-group">
                    <input type="hidden" name="book_id" value="<?php echo $_GET['book_id']?>"/>
                </div>
                <div class="form-group">
                    <input type="hidden" name="price" value="<?php echo $_GET['price'] ?>" class="form-control" placeholder="Book price"></input>
                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-success" name="btn_send_order">
                        Send request to purchase this book <span class="glyphicon glyphicon-menu-right"></span>
                    </button>
                </div>
            </form>

            <?php
            if (isset($_POST['btn_send_order'])) {
                $user_id=@$_POST['user_id'];
                $book_id=@$_POST['book_id'];
                $price=@$_POST['price'];
                $request_status=0;


                $create_request = "INSERT INTO purchase_orders(user_id,book_id,book_price,status,created_at,updated_at)
                                  VALUES ('$user_id','$book_id',$price,$request_status,now(), now())";
                $create_request=mysqli_query($conn,$create_request);

                if ($create_request) {
                    ?>
                    <div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        Request has been sent successfully. Please wait for approval and check the orders table
                        for confirmation
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-remove"></span>
                        Error in sending request. Something went wrong <?php echo mysqli_error($conn) ?>
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
