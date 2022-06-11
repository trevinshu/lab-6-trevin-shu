<?php
include("../includes/mysql_connect.php");

$blogID = $_GET["id"];

if (is_numeric($blogID)) {
    mysqli_query($con, "delete from tsh_blog where id = $blogID") or die(mysqli_error($con));
    header("Location:edit.php");
}
