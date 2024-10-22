<?php
include 'core/models.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteBartender($conn, $id);
    header("Location: index.php");
}
?>
