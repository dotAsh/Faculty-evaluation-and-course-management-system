<?php

session_start();
$titlee = $_SESSION["f_tit"];
$p = explode("-", $titlee);
$cou_title = $p[0];
$cou_sec = intval($p[1]);
$ssid = $_SESSION["ID"];
$fac_ini = $_SESSION["ini"];
if (isset($_POST["A"]) && isset($_POST["B"]) && isset($_POST["C"]) && isset($_POST["D"]) && isset($_POST["E"])) {
    $A = $_POST["A"];
    $B = $_POST["B"];
    $C = $_POST["C"];
    $D = $_POST["D"];
    $E = $_POST["E"];
    $total = intval($A) + intval($B) + intval($C) + intval($D) + intval($E);
    $conn4 = new mysqli("localhost", "root", "", "project370");
    if ($conn4->connect_error) {
        die("Connection failed: " . $conn4->connect_error);
    }
    $query1 = "SELECT * FROM course_taken WHERE Course_Title ='$cou_title' AND Section=$cou_sec ";
    $result4 = $conn4->query($query1);
    if ($result4->num_rows > 0) {
        while ($row = $result4->fetch_assoc()) {
            $A = intval($A) + intval($row["A"]);
            $B = intval($B) + intval($row["B"]);
            $C = intval($C) + intval($row["C"]);
            $D = intval($D) + intval($row["D"]);
            $E = intval($E) + intval($row["E"]);
            $total = intval($total) + intval($row["Total"]);
            $st_c = 1 + intval($row["Student_Count"]);
        }
    }
    $sql = "UPDATE `course_taken` SET `A`=$A, `B`=$B, `C`=$C, `D`=$D, `E`=$E, `Total`=$total, `Student_Count`=$st_c  WHERE Course_Title ='$cou_title' AND Section=$cou_sec ";
    if ($conn4->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn4->error;
    }
    ///////
    $sql2 = "INSERT INTO `evaluated_course` (`Student_ID`, `Course`, `Section`) VALUES ($ssid, '$cou_title', $cou_sec)";
    if ($conn4->query($sql2) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn4->error;
    }
    /////
    $conn4->close();
}
//studnet account a evaulated faculty add
header('location: Account.php');
?>