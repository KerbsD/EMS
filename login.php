<?php
session_start();
include("config/database.php");

if(isset($_POST['username']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$username = validate($_POST['username']);
$password = validate($_POST['password']);

if(empty($username)){
    header("Location: index.php?error=Username is required!");
    exit();
}

else if(empty($password)){
    header("Location: index.php?error=Password is required!");
    exit();
}

$sql = "SELECT * FROM users WHERE user='$username' AND password='$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['user'] === $username && $row['password'] === $password){
        echo "Logged In!";
        $_SESSION['username'] = $row['user'];
        $_SESSION['id'] = $row['id'];
        header("Location: pages/dashboard.php");
    }

    else{
        header("Location: index.php?error=Incorrect Username or Password");
        exit();
    }
}

else{
    header("Location: index.php");
    exit();
}

mysqli_close($conn)
?>