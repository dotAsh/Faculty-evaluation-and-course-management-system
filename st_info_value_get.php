<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$st_val = $_POST["student_value"];
if (!empty($_POST["student_value"])) {
    $name = NULL;
    $Id = NULL;
    $email = NULL;
    $pass = NULL;
    $taken_cou = NULL;
    $conn1 = new mysqli("localhost", "root", "", "project370");
    if ($conn1->connect_error) {
        die("Connection failed: " . $conn1->connect_error);
    }
    $sql = "SELECT * FROM student where ID = $st_val";
    $result = $conn1->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row["Name"];
            $Id = $row["ID"];
            $email = $row["Email"];
            $pass = $row["Password"];
        }
    }
    echo "Name  : $name<br>";
    echo "ID  : $Id<br>";
    echo "Email  : $email<br>";
    echo "Password  : $pass<br>";
    echo "Taken course  :";
//    mmm
    $sql1 = "SELECT * FROM taken_course where Student_ID = $st_val order by Course asc";
    $result1 = $conn1->query($sql1);
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            $kk = $row["Course"];
            $sec = $row["Section"];
            echo " $kk($sec)";
        }
    }
    $conn1->close();
}
