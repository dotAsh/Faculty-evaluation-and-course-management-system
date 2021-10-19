<html>
    <head>

    </head>
    <body>
        <div class="row">
            <div class="col-md-7 fac_info_admin">
                <?php
                $fac_val = $_POST["faculty_value"];
                if (!empty($_POST["faculty_value"])) {
                    $name = NULL;
                    $email = NULL;
                    $fac_ini = NULL;
                    $taken_cou = " ";
                    $img = NULL;
                    $conn2 = new mysqli("localhost", "root", "", "project370");
                    if ($conn2->connect_error) {
                        die("Connection failed: " . $conn2->connect_error);
                    }
                    $sql = "SELECT * FROM faculty_info where Email= '$fac_val'  ";
                    $result = $conn2->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row["Name"];
                            $email = $row["Email"];
                            $fac_ini = $row["Initial"];
                            $img = $row["Img"];
                        }
                    }
                    echo "<h5>Name  : $name</h5>";
                    echo "<h5>Initial  : $fac_ini</h5>";
                    echo "<h5>Email  : $email</h5>";
                    echo " <p>Course Taken  :  </p>";
                    $sql1 = "SELECT * FROM course_taken where Initial= '$fac_ini'  ";
                    $result1 = $conn2->query($sql1);
                    if ($result1->num_rows > 0) {
                        while ($row = $result1->fetch_assoc()) {
                            $cou1 = $row["Course_Title"];
                            $cou2 = $row["Section"];
                            echo " <p>$cou1($cou2)</p> ";
                        }
                    }
                    ?>
                </div>
                <div class="col-md-5">
                    <img src="<?php echo $img; ?>" alt="" style="width: 110px;">
                </div>
                <?php
                $conn2->close();
            }
            ?>
        </div>
    </body>
</html>