<?php
    session_start();
    session_destroy();
    include ("connection.php");
    header("Location: ".$root_url."index.php");
?>