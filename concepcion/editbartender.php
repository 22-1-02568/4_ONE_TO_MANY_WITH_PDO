<?php
include 'core/models.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $bartender = getBartenderById($conn, $id);
}

if (isset($_POST['updateBartenderBtn'])) {
    $id = $_POST['bartender_id'];
    $name = $_POST['name'];
    updateBartender($conn, $id, $name);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bartender</title>
</head>
<body>
    <h1>Edit Bartender</h1>
    <form action="editbartender.php?id=<?= $id ?>" method="POST">
        <input type="hidden" name="bartender_id" value="<?= $bartender['bartender_id'] ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $bartender['name'] ?>" required>
        <button type="submit" name="updateBartenderBtn">Update Bartender</button>
    </form>
</body>
</html>
