<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .sidebar {
            width: 200px;
            display: flex;
            flex-direction: column;
            border-right: 1px solid indigo;
            height: 100vh;
            background-color: rgb(22, 16, 15);
            position: fixed;
        }

        .title {
            padding: 10px;
            text-align: center;
            color: white;
            border-bottom: 2px solid white;
        }

        .pages {
            display: flex;
            flex-direction: column;
            position: relative;
            top: 5%;

        }

        .pages ul {
            display: flex;
            align-content: space-evenly;
            flex-direction: column;
        }

        .pages ul li {
            transition: background-color 0.3s ease;
            /* background-color: rgb(221, 217, 217); */
            border-bottom: 2px solid rgb(118, 112, 112);
            padding: 10px;
            border-radius: 5px;
            margin: 18px 5px;
            text-decoration: none;
            color: black;
            font-weight: 700;
        }

        .pages ul li:hover {
            border-bottom: 2px solid indigo;
        }

        .pages ul li a {
            color: whitesmoke;
            padding: 8px;
            text-decoration: none;
        }

        .pages ul li a:hover{
            color: indigo;
        }

        .curUser {
            position: fixed;
            bottom: 0;
            border-top: 1px solid rgb(233, 229, 229);
            width: 200px;
            padding: 10px;
            color: white;
        }

        .curUser p {
            font-weight: 700;
        }

        h1 {
            padding: 10px;
        }

        .active {
            font-weight: bold;
        }

        .logout{
            color: black;
            text-align: center;
            background-color: lightslategrey;
            width: 200px;
            padding: 4px 60px;
            border-radius: 4px;
        }
        .username{
            padding: 0 0 15px 10px;
        }
    </style>
    <div class="sidebar">
        <h2 class="title">EMS</h2>
        <div class="pages">
            <ul>
                <li><a href="../pages/dashboard.php">Dashboard</a></li>
                <li><a href="../pages/employees.php">Employees</a></li>
                <li><a href="../pages/users.php">Users</a></li>
            </ul>
        </div>

        <div class="curUser">
            <p class="username"><?php echo $_SESSION["username"] ?></p>
            <a class="logout" href="../logout.php">Logout</a>
        </div>
    </div>

<?php
} else {
    header("Location: index.php");
    exit;
}
?>