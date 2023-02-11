<?php
require 'connection.php';
require 'security.php';

$del_event = $_GET['id_event'];

//SELECT FROM OTHER TABLES TO DELETE ; USERS W/ PROGRESS W/ NOTICE
$delete1 = mysqli_query(
    $con,
    "SELECT * FROM events
    WHERE id_event = $del_event"
);

//DELETE FROM MAIN TABLE
$infoDel = mysqli_fetch_array($delete1);
$delete1 = $del_event;

//DELETE CURRENT users RECORD
$del1 = mysqli_query($con, "DELETE FROM events WHERE id_event='$delete1'");

//DISPLAYS MESSAGE IF SUCCESSFUL
echo "<script>alert('Event is deleted successfully');
window.location='listevent.php'</script>";
?>