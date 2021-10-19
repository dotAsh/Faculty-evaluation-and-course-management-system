<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$eva_name = $_POST["no_eva_value"];
if (!empty($_POST["no_eva_value"])) {
    $conn = new mysqli("localhost", "root", "", "project370");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM student where ID= $eva_name";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row["Name"];
            echo "$name";
        }
    }
}
