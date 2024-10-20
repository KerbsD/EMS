<?php
include('../config/database.php');
include('../includes/sidebar.php');
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add_employee'])) {
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "INSERT INTO employees (fullname, email, contact, address) VALUES ('$fullname', '$email', '$number', '$address')";

    try {
        mysqli_query($conn, $sql);

        echo "<script>alert('Employee added successfully!')</script>";
        header("Location: employees.php");
        exit();
    } catch (mysqli_sql_exception) {
        echo "<p class='warning'>Employee creation failed.<p>";
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="../includes/styles/tables.css">
    <link rel="stylesheet" href="../includes/styles/sidebar.css">
</head>

<body>
    <div class="cont">
        <div class="container">
            <h1>Add Employee</h1>
            <form method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="number" name="contact" placeholder="Contact" required>
                <input type="text" name="address" placeholder="Address" required>
                <!-- kung may kulang pa ilagay na lang -->
                <button type="submit" name="add_employee">Add Employee</button>
            </form>
        </div>
    </div>

</body>

</html>