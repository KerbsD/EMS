<?php
include('../../config/database.php');
include('../../config/validate.php');
include('../../includes/sidebar.php');

if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}

if (isset($_POST['add_user'])) {
    $username = validate($_POST['user']);
    $password = validate($_POST['password']);
    $reg_date = validate($_POST['reg_date']);

    $sql = "INSERT INTO users (user, password, reg_date) VALUES ('$username', '$password', '$reg_date')";

    try {
        mysqli_query($conn, $sql);

        echo "<script>alert('User added successfully!')</script>";
        header("Location: users.php");
        exit();
    } catch (mysqli_sql_exception) {
        echo "<p class='warning'>User creation failed.<p>";
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
    <link rel="stylesheet" href="../../includes/styles/tables.css">
    <link rel="stylesheet" href="../../includes/styles/sidebar.css">
</head>

<body>
    <div class="cont">
        <div class="container">
            <h1>Add User</h1>
            <form method="POST">
                <input type="text" name="user" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="date" name="reg_date" placeholder="Registration Date" required>
                <!-- kung may kulang pa ilagay na lang -->
                <button type="submit" name="add_user">Add User</button>
            </form>
        </div>
    </div>

</body>

</html>