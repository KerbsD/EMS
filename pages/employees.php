<?php
include('../includes/sidebar.php');
include('../config/database.php');

if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}

$sql = 'SELECT * FROM employees';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS</title>
    <link rel="stylesheet" href="../includes/styles/sidebar.css">
    <link rel="stylesheet" href="../includes/styles/tables.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="cont">
        <div class="container">
            <h1>Employees</h1>
            <a href="add_emp.php" class="table-button">Add Employee</a>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['fullname'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['contact'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td class="actions">
                                <a href="edit_emp.php?id=<?php echo $row['id']; ?>" class="table-button">Edit</a>
                                <a href="delete_emp.php?id=<?php echo $row['id']; ?>" class="table-button" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php } 
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>