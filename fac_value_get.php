<html>
    <head>

    </head>
    <body>
        <?php
        session_start();
        $stid = $_SESSION["ID"];
        $cou = $_POST["fac_value"];
        $p = explode("-", $cou);
        $course_ti = $p[0];
        $course_sec = intval($p[1]);
        if (!empty($_POST["fac_value"])) {
            $cou_name = NULL;
            $cou_title = NULL;
            $cou_fac = NULL;
            $cou_fac_ini = NULL;
            $cou_sec = NULL;
            $cou_seat = NULL;
            $conn1 = new mysqli("localhost", "root", "", "project370");
            if ($conn1->connect_error) {
                die("Connection failed: " . $conn1->connect_error);
            }
            $query = "SELECT * FROM course WHERE Title = '" . $course_ti . "' AND Section=$course_sec";
            $result = $conn1->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cou_name = $row["Name"];
                    $cou_title = $row["Title"];
                    $cou_sec = $row["Section"];
                    $cou_seat = $row["Seat"];
                }
            }
            $query1 = "SELECT * FROM course_taken WHERE Course_Title = '" . $course_ti . "' AND Section =$course_sec ";
            $result1 = $conn1->query($query1);
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    $cou_fac_ini = $row["Initial"];
                }
            }
            $query2 = "SELECT * FROM faculty_info WHERE Initial= '" . $cou_fac_ini . "' ";
            $result2 = $conn1->query($query2);
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $cou_fac = $row["Name"];
                }
            }
            echo "<h3> Course Name  : " . $cou_name . " </h3>";
            echo "<h3> Course Title : " . $cou_title . " </h3>";
            echo "<h3> Section   : " . $cou_sec . " </h3>";
            echo "<h3> Faculty Name : " . $cou_fac . " (" . $cou_fac_ini . ")</h3>";
            echo "<h3> Seat Status  : " . $cou_seat . " </h3>";
            ?>
            <button onclick="test()">add</button>
            <?php
            $conn1->close();
        }
        ?>
        <script>
            function test() {
                var res = " <?php course_add(); ?>";
                alert(res);
            }
        </script>
    </body>
</html>
<?php

function total_seat() {
    $tseat = NULL;
    $cou1 = $_POST["fac_value"];
    $p1 = explode("-", $cou1);
    $course_ti1 = $p1[0];
    $course_sec1 = intval($p1[1]);
    $conn1 = new mysqli("localhost", "root", "", "project370");
    if ($conn1->connect_error) {
        die("Connection failed: " . $conn1->connect_error);
    }
    $query1 = "Select * from course where Title='$course_ti1' AND Section=$course_sec1 ";
    $result1 = $conn1->query($query1);
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            $tseat = $row["Seat"];
        }
    }
    $conn1->close();
    return $tseat;
}

function seat_minus() {
    $tseat = NULL;
    $cou2 = $_POST["fac_value"];
    $p2 = explode("-", $cou2);
    $course_ti2 = $p2[0];
    $course_sec2 = intval($p2[1]);
    $conn2 = new mysqli("localhost", "root", "", "project370");
    if ($conn2->connect_error) {
        die("Connection failed: " . $conn2->connect_error);
    }
    $query2 = "Select * from course where Title='$course_ti2' AND Section=$course_sec2 ";
    $result2 = $conn2->query($query2);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            $tseat = $row["Seat"] - 1;
        }
    }
    $sql2 = "UPDATE course SET Seat=$tseat WHERE Title='$course_ti2' AND Section=$course_sec2 ";
    if ($conn2->query($sql2) === TRUE) {
        echo "";
    } else {
        echo "Error updating record: " . $conn2->error;
    }
    $conn2->close();
}

function num_of_course() {
    $num_c = NULL;
    $stid1 = $_SESSION["ID"];
    $conn3 = new mysqli("localhost", "root", "", "project370");
    if ($conn3->connect_error) {
        die("Connection failed: " . $conn3->connect_error);
    }
    $query3 = "Select * from Student where ID=$stid1";
    $result3 = $conn3->query($query3);
    if ($result3->num_rows > 0) {
        while ($row = $result3->fetch_assoc()) {
            $num_c = $row["Num_of_co"];
        }
    }
    $conn3->close();
    return $num_c;
}

function update_num_c() {
    $num_c = NULL;
    $stid1 = $_SESSION["ID"];
    $conn5 = new mysqli("localhost", "root", "", "project370");
    if ($conn5->connect_error) {
        die("Connection failed: " . $conn5->connect_error);
    }
    $query5 = "Select * from Student where ID=$stid1";
    $result5 = $conn5->query($query5);
    if ($result5->num_rows > 0) {
        while ($row = $result5->fetch_assoc()) {
            $num_c = $row["Num_of_co"] + 1;
        }
    }
    $sql5 = "UPDATE Student SET Num_of_co=$num_c WHERE ID=$stid1";
    if ($conn5->query($sql5) === TRUE) {
        echo "";
    } else {
        echo "Error updating record: " . $conn5->error;
    }
    $conn5->close();
}

function insert_course($std_id, $coun, $sec) {
    $conn6 = new mysqli("localhost", "root", "", "project370");
    if ($conn6->connect_error) {
        die("Connection failed: " . $conn6->connect_error);
    }
    $sql6 = "INSERT INTO `taken_course` (`Student_ID`, `Course`, `Section`) VALUES ($std_id, '$coun', $sec)";
    if ($conn6->query($sql6) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql6 . "<br>" . $conn6->error;
    }
    $conn6->close();
}

function course_match($std_id, $coun) {
    $f = 0;
    $conn7 = new mysqli("localhost", "root", "", "project370");
    if ($conn7->connect_error) {
        die("Connection failed: " . $conn7->connect_error);
    }
    $query7 = "Select * from taken_course where Student_ID=$std_id";
    $result7 = $conn7->query($query7);
    if ($result7->num_rows > 0) {
        while ($row = $result7->fetch_assoc()) {
            $ncou = $row["Course"];
            if ($ncou == $coun) {
                $f = 1;
                break;
            }
        }
    }
    $conn7->close();
    return $f;
}

function course_add() {
    $cou4 = $_POST["fac_value"];
    $p4 = explode("-", $cou4);
    $course_ti4 = $p4[0];
    $course_sec4 = intval($p4[1]);
    $stid4 = $_SESSION["ID"];
    $seat = total_seat();
    $num_c = num_of_course();
    $match = course_match($stid4, $course_ti4);
    if ($match == 0) {
        $conn4 = new mysqli("localhost", "root", "", "project370");
        if ($conn4->connect_error) {
            die("Connection failed: " . $conn4->connect_error);
        }
        if ($seat > 0) {
            if ($num_c < 4) {
                seat_minus();
                update_num_c();
                insert_course($stid4, $course_ti4, $course_sec4);
                echo "$course_ti4 added successfully";
            } else {
                echo 'You already Taken FOUR courses';
            }
        } else {
            echo 'No more Seat available';
        }
        $conn4->close();
    } else {
        echo "You already taken $course_ti4 course";
    }
}
?>
