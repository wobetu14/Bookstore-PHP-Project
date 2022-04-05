<?php
session_start();
// if ($_SESSION['username']){

/**
 * List all books under a specified category
 */
include ("connection.php");
$cat="SELECT * FROM book_categories WHERE id=".$_GET['cat_id'];
$cat=mysqli_query($conn,$cat);
$cat=mysqli_fetch_array($cat);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Books under category "<?php echo $cat['cat_name']?>"</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="/bookstore3/bootstrap/css/bootstrap.min.css">
    <![endif]-->
</head>

<body>

<!-- Fixed navbar (top menu) -->
<?php
include("layouts/top-menu.php");
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
    <h3 class="text-info">List of books under category <strong><?php echo $cat['cat_name']?></strong></h3>

    <div class="row">
        <div class="col-md-12">
            <?php
            $books="SELECT * FROM books WHERE cat_id=".$_GET['cat_id'];
            $books=mysqli_query($conn,$books);
            $num_of_book_cats=mysqli_num_rows($books);
            if ($num_of_book_cats>0){
            ?>
            <div class="row">
                <?php
                while ($book=mysqli_fetch_array($books)){
                    ?>
                    <div class="col-sm-4 col-md-2">
                        <div class="thumbnail">
                            <?php
                              if (!$book['cover_photo']){
                                  ?>
                                  <img src="images/PlaceholderBook.png" class="img-responsive img-thumbnail" alt="<?php echo $book['title'] ?>">
                            <?php
                              }
                              else{
                            ?>
                            <img src="<?php echo $book['cover_photo'] ?>" class="img-responsive img-thumbnail" alt="<?php echo $book['title'] ?>">
                            <?php
                              }
                            ?>

                            <?php
                              $prices="SELECT * FROM prices WHERE effective=1 and book_id=".$book['id'];
                              $prices=mysqli_query($conn,$prices);

                              $num=mysqli_num_rows($prices);

                              $price=mysqli_fetch_array($prices);
                            ?>
                            <div class="caption">
                                <h3><?php echo $book['title'] ?></h3>
                                <p><?php echo $book['long_description'] ?></p>
                                <p>Written by: <b><?php echo $book['author'] ?></b></p>

                                        <?php
                                          if ($num>0){
                                              if ($price['price']==0) {
                                                  ?>
                                                  <p>Price:
                                                      <b>
                                                          <span class="badge"> Free </span>
                                                  </p>
                                                  <?php
                                              }
                                              else{
                                                  ?>
                                          <p>Price:
                                              <b>
                                                  <span class="badge success"> ETB <?php echo $price['price'] ?> </span>
                                          </p>
                                <?php

                                              }
                                            }
                                        ?>
                                    </b>

                                <?php
                                  if ($num>0 && $price['price']==0){

                                ?>
                                <p align="right"><a href="<?php echo $book['file_path'] ?>" class="btn btn-success btn-sm" role="button">Download</a>

                                    <?php
                                      }
                                      else{
                                      ?>
                                <p align="right"><a href="request-for-purchase.php?book_id=<?php echo $book['id'] ?>&price=<?php echo $price['price'] ?>"
                                                    class="btn btn-info btn-sm" role="button">Buy Now</a>
                                    <?php
                                      }
                                      ?>
                                <a href="set-price.php?book_id=<?php echo $book['id']?>" class="btn btn-default btn-sm">Set price</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
                }
            else{
                ?>
                <div class="alert alert-warning">
                    <b>
                        <span class="glyphicon glyphicon-warning-sign"></span>
                    </b>
                    No books are available in this category
                </div>
            <?php
            }
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
// }
// else {
//     header("Location:http://localhost/bookstore3/app/login.php");
// }
?>

