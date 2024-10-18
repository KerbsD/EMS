<?php
    include("config/database.php");

    $password = "kerbs123";

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (user, password)
            VALUES ('Kerbs', '$hash')";
            
    try{
        mysqli_query($conn, $sql);
        echo "User successfully created!";
    }
    catch(mysqli_sql_exception){
        echo "User creation unsuccessful. :(";
    }

    mysqli_close($conn);
?>