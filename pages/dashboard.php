<?php
include('../config/database.php');
include('../includes/sidebar.php');

function getCount($tableName){
    global $conn;
    $table = $tableName;
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($conn, $sql);
    $totalCount = mysqli_num_rows($result);
    return $totalCount;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS</title>
    <link rel="stylesheet" href="../includes/styles/dashboard.css?v=<?php echo time(); ?>">
</head>

<body>
<h1 class="label">DASHBOARD</h1>
    <div class="cont">
        <div class="card">
            <p>Total Number of Employees: </p>
            <h2 class="count"><?= getCount('employees') ?></h2>
        </div>
    </div>

</body>

</html>