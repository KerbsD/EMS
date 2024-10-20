<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS</title>
    <link rel="stylesheet" href="includes/styles/login.css?v=<?php echo time(); ?>">
</head>

<body>
    <h1>Employee Management System</h1>
    <?php if (isset($_GET["error"])) { ?>
        <p class="error"><?php echo $_GET["error"] ?></p>
    <?php } ?>
    <div class="login-container">
        <h2>WELCOME</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username: </label><br>
                <input type="text" name="username"><br>
            </div>
            <div class="form-group">
                <label for="password">Password: </label><br>
                <input type="password" name="password"><br>
            </div>
            <button type="submit" name="submit">Log in</button>
        </form>
    </div>
</body>

</html>