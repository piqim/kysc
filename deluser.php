<?php
require 'connection.php';
require 'security.php';

$del_user = $_GET['id_user'];

//SELECT FROM OTHER TABLES TO DELETE ; USERS W/ PROGRESS W/ NOTICE
$delete1 = mysqli_query($con, 
"SELECT * FROM users AS a
INNER JOIN progress AS b 
ON a.id_user = b.id_user
INNER JOIN notice AS c
ON b.id_user = c.id_user
WHERE a.id_user = $del_user"
);

//DELETE FROM MAIN TABLE
$infoDel = mysqli_fetch_array($delete1);
$delete1 = $del_user;

//DELETE CURRENT users RECORD
$del1 = mysqli_query($con, "DELETE FROM users WHERE id_user='$delete1'");
//DELETE CURRENT news RECORD
$del2 = mysqli_query($con, "DELETE FROM progress WHERE id_user='$delete1'");
//DELETE CURRENT featured RECORD
$del3 = mysqli_query($con, "DELETE FROM notice WHERE id_user='$delete1'");

//DISPLAYS MESSAGE IF SUCCESSFUL
echo "<script>alert('User is deleted successfully');
window.location='dashboard.php'</script>";
?>