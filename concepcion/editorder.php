<?php
include 'core/models.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $order = getOrderById($conn, $id);
}

if (isset($_POST['updateOrderBtn'])) {
    $id = $_POST['order_id'];
    $customer_id = $_POST['customer_id'];
    $order_details = $_POST['order_details'];
    updateOrder($conn, $id, $customer_id, $order_details);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
</head>
<body>
    <h1>Edit Order</h1>
    <form action="editorder.php?id=<?= $id ?>" method="POST">
        <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
        <label for="customer_id">Customer ID:</label>
        <input type="number" name="customer_id" value="<?= $order['customer_id'] ?>" required>
        <label for="order_details">Order Details:</label>
        <input type="text" name="order_details" value="<?= $order['order_details'] ?>" required>
        <button type="submit" name="updateOrderBtn">Update Order</button>
    </form>
</body>
</html>
