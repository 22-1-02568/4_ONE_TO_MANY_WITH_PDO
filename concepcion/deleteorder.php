<?php
include 'core/models.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteOrder($conn, $id);
    header("Location: index.php");
}
?>
