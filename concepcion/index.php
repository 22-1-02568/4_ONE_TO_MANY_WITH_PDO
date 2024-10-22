<?php
// Include the necessary files for database interaction and model functions
include 'core/models.php';

// Fetch all bartenders, customers, and orders from the database
$bartenders = getBartenders($conn);
$customers = getCustomers($conn);
$orders = getOrders($conn);
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

    <?php if (isset($_GET['message'])): ?>
        <div class="message"><?= htmlspecialchars($_GET['message']) ?></div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
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
                <form action="core/handleForms.php" method="POST" style="display:inline;">
                    <input type="hidden" name="bartender_id" value="<?= $bartender['bartender_id'] ?>">
                    <button type="submit" name="deleteBartenderBtn">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Add New Bartender</h3>
    <form action="core/handleForms.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <button type="submit" name="add_bartender">Add Bartender</button>
    </form>

    <!-- Section: Customers -->
    <h2>Customers</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact Info</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= $customer['customer_id'] ?></td>
            <td><?= htmlspecialchars($customer['name']) ?></td>
            <td><?= htmlspecialchars($customer['contact_info']) ?></td>
            <td>
                <a href="editcustomer.php?id=<?= $customer['customer_id'] ?>">Edit</a>
                <form action="core/handleForms.php" method="POST" style="display:inline;">
                    <input type="hidden" name="customer_id" value="<?= $customer['customer_id'] ?>">
                    <button type="submit" name="deleteCustomerBtn">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Add New Customer</h3>
    <form action="core/handleForms.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="contact_info">Contact Info:</label>
        <input type="text" name="contact_info" required>
        <button type="submit" name="add_customer">Add Customer</button>
    </form>

    <!-- Section: Orders -->
    <h2>Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Bartender ID</th>
            <th>Order Date</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $order['order_id'] ?></td>
            <td><?= $order['customer_id'] ?></td>
            <td><?= $order['bartender_id'] ?></td>
            <td><?= $order['order_date'] ?></td>
            <td>
                <a href="editorder.php?id=<?= $order['order_id'] ?>">Edit</a>
                <form action="core/handleForms.php" method="POST" style="display:inline;">
                    <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                    <button type="submit" name="deleteOrderBtn">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Add New Order</h3>
    <form action="core/handleForms.php" method="POST">
        <label for="customer_id">Customer ID:</label>
        <input type="number" name="customer_id" required>
        <label for="bartender_id">Bartender ID:</label>
        <input type="number" name="bartender_id" required>
        <button type="submit" name="add_order">Add Order</button>
    </form>

</body>
</html>
