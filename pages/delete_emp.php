<?php
include('../config/database.php');

$id = $_GET['id'];

$sql = "DELETE FROM employees WHERE id = $id";

try {
    mysqli_query($conn, $sql);
    echo "<script>alert('Employee deleted successfully!</script>";
    header("Location: employees.php");
    exit();
} catch (mysqli_sql_exception) {
    echo "<p>Cannot Delete Record</p>";
}

mysqli_close($conn);