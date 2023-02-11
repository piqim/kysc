<?php
require 'connection.php';
require 'security.php';

$del_notice = $_GET['id_notice'];

//SELECT FROM OTHER TABLES TO DELETE
$delete1 = mysqli_query(
    $con,
    "SELECT * FROM notice
    WHERE id_notice = $del_notice"
);

//DELETE FROM MAIN TABLE
$infoDel = mysqli_fetch_array($delete1);
$delete1 = $del_notice;

//DELETE CURRENT users RECORD
$del1 = mysqli_query($con, "DELETE FROM notice WHERE id_notice='$delete1'");

//DISPLAYS MESSAGE IF SUCCESSFUL
echo "<script>alert('Notice is deleted successfully');
window.location='listnotice.php'</script>";
?>