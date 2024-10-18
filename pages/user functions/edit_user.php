<?php
include('../../config/database.php');
include('../../config/validate.php');
include('../../includes/sidebar.php');

if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}

$id = $_GET['id'];

$fetchSql = "SELECT * FROM users WHERE id = $id";
$fetchResult = mysqli_query($conn, $fetchSql);
$row = mysqli_fetch_assoc($fetchResult);


if (isset($_POST['edit_user'])) {
    $username = validate($_POST['user']);
    $password = validate($_POST['password']);
    $reg_date = validate($_POST['reg_date']);

    if ($username === $row['user'] && $password === $row['password'] && $reg_date === $row['reg_date']) 
    {
        echo "<p class='warning'>Provide Updated Details<p>";
    } 
    else 
    {
        $sql = "UPDATE users
            SET user = '$username', password = '$password', reg_date = '$reg_date'
            WHERE id = $id";

        try {
            mysqli_query($conn, $sql);
            echo "<script>alert('User updated successfully!');</script>";
            header("Location: ../users.php");
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
    <title>EMS</title>
    <link rel="stylesheet" href="../../includes/styles/tables.css">
    <link rel="stylesheet" href="../../includes/styles/sidebar.css">
</head>

<body>
    <div class="cont">
        <div class="container">
            <h1>Edit User</h1>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="text" name="user" value="<?php echo $row['user'] ?>" required>
                <input type="password" name="password" value="<?php echo $row['password'] ?>" required>
                <input type="date" name="reg_date" value="<?php echo $row['reg_date'] ?>" required>
                <button type="submit" name="edit_user">Update User</button>
            </form>
        </div>
    </div>
</body>

</html>