<?php
include 'core/models.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteCustomer($conn, $id);
    header("Location: index.php");
}
?>
