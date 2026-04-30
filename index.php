<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $conn->query("INSERT INTO users (name, email) VALUES ('$name', '$email')");
}

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>User Management</h1>

<form method="POST">
    <input type="text" name="name" placeholder="Enter Name" required>
    <input type="email" name="email" placeholder="Enter Email" required>
    <button type="submit">Add User</button>
</form>

<h2>Users List</h2>

<?php while($row = $result->fetch_assoc()): ?>
    <div class="user">
        <?php echo $row['name']; ?> - <?php echo $row['email']; ?>
    </div>
<?php endwhile; ?>

</body>
</html>