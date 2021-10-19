<?php

if (isset($_POST["eva"])) {
    $value = $_POST["eva"];
    $conn = new mysqli("localhost", "root", "", "project370");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "UPDATE `settings` SET `Evaluation`=$value WHERE Name='Admin'";
    if ($conn->query($query) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn4->error;
    }
    $conn->close();
}
header('location: admin.php');
?>