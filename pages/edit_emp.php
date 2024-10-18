<?php
include('../config/database.php');
include('../includes/sidebar.php');

if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}

$id = $_GET['id'];

$fetchSql = "SELECT * FROM employees WHERE id = $id";
$fetchResult = mysqli_query($conn, $fetchSql);
$row = mysqli_fetch_assoc($fetchResult);


if (isset($_POST['edit_employee'])) {
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['contact'];
    $address = $_POST['address'];

    if ($fullname === $row['fullname'] && $email === $row['email'] && $number === $row['contact'] && $address === $row['address']) {
        echo "<p class='warning'>Provide Updated Details<p>";
    } else {
        $sql = "UPDATE employees
            SET fullname = '$fullname', email = '$email', contact    = '$number', address = '$address'
            WHERE id = $id";

        try {
            mysqli_query($conn, $sql);
            echo "<script>alert('Employee updated successfully!');</script>";
            header("Location: employees.php");
            exit();

        } catch (mysqli_sql_exception) {
            echo "<p class='warning'>Couldn't update the user. </p>";
        }
    } 
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="../includes/styles/tables.css">
    <link rel="stylesheet" href="../includes/styles/sidebar.css">
</head>

<body>
    <div class="cont">
        <div class="container">
            <h1>Edit Employee</h1>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="text" name="name" value="<?php echo $row['fullname'] ?>" required>
                <input type="email" name="email" value="<?php echo $row['email'] ?>" required>
                <input type="number" name="contact" value="<?php echo $row['contact'] ?>" required>
                <input type="text" name="address" value="<?php echo $row['address'] ?>" required>
                <button type="submit" name="edit_employee">Update Employee</button>
            </form>
        </div>
    </div>
</body>

</html>