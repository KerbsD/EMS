<?php
include('../includes/sidebar.php');
include('../config/database.php');

if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}

$sql = 'SELECT * FROM users';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS</title>
    <link rel="stylesheet" href="../includes/styles/sidebar.css">
    <link rel="stylesheet" href="../includes/styles/tables.css">
</head>

<body>
    <div class="cont">
        <div class="container">
            <h1>Users</h1>
            <a href="user functions/add_user.php" class="table-button">Add New User</a>
            <a href="users.php" class="table-button">Manage Users</a>
            <!-- kung may kulang pa ilagay na lang -->
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Registration Date</th>
                        <th>Actions</th>
                        <!-- kung may kulang pa ilagay na lang -->
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['user'] ?></td>
                            <td><?php echo $row['reg_date'] ?></td>
                            <td>
                                <a href="user functions/edit_user.php?id=<?php echo $row['id']; ?>" class="table-button">Edit</a>
                                <a href="user functions/delete_user.php?id=<?php echo $row['id']; ?>" class="table-button" onclick="return confirm('Are you sure?')">Delete</a>
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