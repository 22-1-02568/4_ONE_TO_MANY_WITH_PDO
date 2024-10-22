<?php
// Include the necessary files for database interaction and model functions
include 'core/models.php';

// Fetch all bartenders, customers, and orders from the database
$bartenders = getBartenders($conn);
$customers = getCustomers($conn);
$orders = getOrders($conn);

// Handle messages
$message = '';
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}
$error = '';
if (isset($_GET['error'])) {
    $error = htmlspecialchars($_GET['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Bar Management</title>
</head>
<body>

    <h1>Bar Management System</h1>

    <!-- Display messages -->
    <?php if ($message): ?>
        <div class="success"><?= $message ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <!-- Section: Bartenders -->
    <h2>Bartenders</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($bartenders as $bartender): ?>
        <tr>
            <td><?= $bartender['bartender_id'] ?></td>
            <td><?= htmlspecialchars($bartender['name']) ?></td>
            <td>
                <a href="editbartender.php?id=<?= $bartender['bartender_id'] ?>">Edit</a>
                <form action="deletebartender.php" method="GET" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $bartender['bartender_id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Add New Bartender</h3>
    <form action="core/handleForms.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <button type="submit" name="insertBartenderBtn">Add Bartender</button>
    </form>

    <!-- Section: Customers -->
    <h2>Customers</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= $customer['customer_id'] ?></td>
            <td><?= htmlspecialchars($customer['name']) ?></td>
            <td>
                <a href="editcustomer.php?id=<?= $customer['customer_id'] ?>">Edit</a>
                <form action="deletecustomer.php" method="GET" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $customer['customer_id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Add New Customer</h3>
    <form action="core/handleForms.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <button type="submit" name="insertCustomerBtn">Add Customer</button>
    </form>

    <!-- Section: Orders -->
    <h2>Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Order Details</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $order['order_id'] ?></td>
            <td><?= $order['customer_id'] ?></td>
            <td><?= htmlspecialchars($order['order_details']) ?></td>
            <td>
                <a href="editorder.php?id=<?= $order['order_id'] ?>">Edit</a>
                <form action="deleteorder.php" method="GET" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $order['order_id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Add New Order</h3>
    <form action="core/handleForms.php" method="POST">
        <label for="customer_id">Customer ID:</label>
        <input type="number" name="customer_id" required>
        <label for="order_details">Order Details:</label>
        <input type="text" name="order_details" required>
        <button type="submit" name="insertOrderBtn">Add Order</button>
    </form>

</body>
</html>
