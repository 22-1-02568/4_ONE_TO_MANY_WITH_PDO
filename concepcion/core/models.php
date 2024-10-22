<?php
require_once 'dbconfig.php'; // Ensure dbconfig is included

// Bartender Functions

// Function to get all bartenders
function getBartenders($conn) {
    $sql = "SELECT * FROM bartenders";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to get a bartender by ID
function getBartenderById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM bartenders WHERE bartender_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Function to add a bartender
function addBartender($conn, $name) {
    $stmt = $conn->prepare("INSERT INTO bartenders (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->close();
}

// Function to update a bartender
function updateBartender($conn, $id, $name) {
    $stmt = $conn->prepare("UPDATE bartenders SET name = ? WHERE bartender_id = ?");
    $stmt->bind_param("si", $name, $id);
    $stmt->execute();
    $stmt->close();
}

// Function to delete a bartender
function deleteBartender($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM bartenders WHERE bartender_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Customer Functions

// Function to get all customers
function getCustomers($conn) {
    $sql = "SELECT * FROM customers";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to get a customer by ID
function getCustomerById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM customers WHERE customer_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Function to add a customer
function addCustomer($conn, $name, $contact_info) {
    $stmt = $conn->prepare("INSERT INTO customers (name, contact_info) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $contact_info);
    $stmt->execute();
    $stmt->close();
}

// Function to update a customer
function updateCustomer($conn, $id, $name, $contact_info) {
    $stmt = $conn->prepare("UPDATE customers SET name = ?, contact_info = ? WHERE customer_id = ?");
    $stmt->bind_param("ssi", $name, $contact_info, $id);
    $stmt->execute();
    $stmt->close();
}

// Function to delete a customer
function deleteCustomer($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM customers WHERE customer_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Order Functions

// Function to get all orders
function getOrders($conn) {
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to get an order by ID
function getOrderById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Function to add an order
function addOrder($conn, $customer_id, $bartender_id, $order_date) {
    $stmt = $conn->prepare("INSERT INTO orders (customer_id, bartender_id, order_date) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $customer_id, $bartender_id, $order_date);
    $stmt->execute();
    $stmt->close();
}

// Function to update an order
function updateOrder($conn, $id, $customer_id, $bartender_id, $order_date) {
    $stmt = $conn->prepare("UPDATE orders SET customer_id = ?, bartender_id = ?, order_date = ? WHERE order_id = ?");
    $stmt->bind_param("iisi", $customer_id, $bartender_id, $order_date, $id);
    $stmt->execute();
    $stmt->close();
}

// Function to delete an order
function deleteOrder($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
?>
