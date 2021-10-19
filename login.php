<?php

session_start();

$name = $_POST['username'];
$pass = $_POST['password'];
if ($name == "admin@gmail.com" && $pass == "1234") {
    header('location: admin.php');
} else {
    $conn = new mysqli("localhost", "root", "", "project370");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $uname = $row["Name"];
            $us = $row["Email"];
            $p = $row["Password"];
            if ($us == $name && $p == $pass) {
                $_SESSION["Name"] = $uname;
                $_SESSION["ID"] = $row["ID"];
                header('location: Account.php');
                exit();
            }
        }
    }
    if (isset($_GET['logout'])) {
        unset($_SESSION["Name"]);
        unset($_SESSION["ID"]);
        session_destroy();
        redirect_to('location: login_html.php');
    }
    header('location: login_html.php');
    $conn->close();
}
?>