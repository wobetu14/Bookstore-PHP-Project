<?php

$conn=mysqli_connect("localhost","root","") or die("Unable to connect server");

mysqli_select_db($conn,"bookstore") or die("Unable to contact the database.");

$root_url="http://localhost/bookstore3/app/";