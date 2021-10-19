<?php
session_start();
//include('login.php');
?>
<html>
    <head>
        <title>st account</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Anton|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!--css-->
        <link rel="stylesheet" href="css/all.min.css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/style_account.css"/>
    </head>
    <body>
        <section class="a_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 a_top_img">
                        <img src="images/login_logo.png" alt="">
                    </div>
                    <div class="col-md-6 text-right a_top_txt">
                        <h2><?php echo "Welcome " . $_SESSION["Name"] . " "; ?></h2>
                    </div>

                </div>
            </div>
        </section>
        <section class="a_body">
            <div class="container">
                <div class="row">
                    <div class="col-3 text-center p-4">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Add Course</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Evaluation</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Log out</a>
                        </div>
                    </div>
                    <div class="col-9 st_content">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade a_home show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div>
                                    <h3>Number of courses  </h3>
                                    <h4>
                                        <?php
                                        $aid = $_SESSION["ID"];
                                        $conn = new mysqli("localhost", "root", "", "project370");
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql_c2 = "SELECT * FROM student where ID=$aid";
                                        $result2 = $conn->query($sql_c2);
                                        if ($result2->num_rows > 0) {
                                            while ($row = $result2->fetch_assoc()) {
                                                echo $row["Num_of_co"];
                                            }
                                        }
                                        ?>
                                    </h4>
                                </div>
                                <div>
                                    <h3>Courses </h3>
                                    <h4>
                                        <?php
                                        $aidi = $_SESSION["ID"];
                                        $sql_c3 = "SELECT * FROM taken_course where Student_ID = $aidi ";
                                        $result3 = $conn->query($sql_c3);
                                        if ($result3->num_rows > 0) {
                                            while ($row = $result3->fetch_assoc()) {
                                                $cp = $row["Course"];
                                                echo "  $cp";
                                            }
                                        }
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="tab-pane fade add_course" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="row">
                                    <!--mmmm-->

                                    <!--mmmm-->
                                    <?php
                                    $add = NULL;
                                    $sql12 = "SELECT * FROM settings where Name='Admin' ";
                                    $result12 = $conn->query($sql12);
                                    if ($result12->num_rows > 0) {
                                        while ($row = $result12->fetch_assoc()) {
                                            $add = $row["Add_Course"];
                                        }
                                    }
                                    if ($add == 0) {
                                        ?>
                                        <div class="col-md-12 no_add text-center">
                                            <h2>no adding now</h2>

                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-md-4 text-center">
                                            <form action="" method="POST">  
                                                <select name="title" size='8' id="fac_value" onchange="fac_Value(this.value)">
                                                    <!--                                                <option class="first" value="select">Select</option>";   -->
                                                    <?php
                                                    $sql_c = "SELECT * FROM course";
                                                    $result1 = $conn->query($sql_c);
                                                    if ($result1->num_rows > 0) {
                                                        while ($row = $result1->fetch_assoc()) {
                                                            $c_ti = $row["Title"];
                                                            $sc = $row["Section"];
                                                            $op = $c_ti . " [" . $sc . "]";
                                                            $val = $c_ti . "-" . $sc;
                                                            ?>
                                                            <option value="<?php echo $val; ?>"><?php echo $op; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </form>
                                        </div>
                                        <div class="col-md-8 text-left course_details">
                                            <h2 id="here"></h2>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class = "tab-pane fade evluate" id = "v-pills-messages" role = "tabpanel" aria-labelledby = "v-pills-messages-tab">
                                <?php
                                $eva = NULL;
                                $sql13 = "SELECT * FROM settings where Name='Admin'";
                                $result13 = $conn->query($sql13);
                                if ($result13->num_rows > 0) {
                                    while ($row = $result13->fetch_assoc()) {
                                        $eva = $row["Evaluation"];
                                    }
                                }
                                if ($eva == 0) {
                                    ?>
                                    <div class="col-md-12 no_add text-center">
                                        <h2>no Evaluation</h2>
                                    </div>
                                    <?php
                                } else {
                                    $toc = NULL;
                                    $aid1 = $_SESSION["ID"];
                                    $sql = "SELECT * FROM Student WHERE ID =$aid1";
                                    $result6 = $conn->query($sql);
                                    if ($result6->num_rows > 0) {
                                        while ($row = $result6->fetch_assoc()) {
                                            $toc = $row["Num_of_co"];
                                        }
                                    }
                                    if ($toc == 0) {
                                        echo '
                                    <div class = "no_cou">
                                        <h2>no course added</h2>
                                    </div>
                                          ';
                                    } else {
                                        $cou_name = NULL;
                                        $cou_title = NULL;
                                        $cou_sec = NULL;
                                        $fac_name = NULL;
                                        $fac_in = NULL;
                                        $eva_value = 0;
                                        $sql7 = "SELECT * FROM taken_course WHERE Student_ID = $aid1";
                                        $result7 = $conn->query($sql7);
                                        if ($result7->num_rows > 0) {
                                            while ($row = $result7->fetch_assoc()) {
                                                $eva_value = 0;
                                                $cou_na = $row["Course"];
                                                $cou_sec = $row["Section"];
                                                $sql8 = "SELECT * FROM course WHERE Title='$cou_na' AND Section=$cou_sec ";
                                                $result8 = $conn->query($sql8);
                                                if ($result8->num_rows > 0) {
                                                    while ($row = $result8->fetch_assoc()) {
                                                        $cou_name = $row["Name"];
                                                        $cou_title = $row["Title"];
                                                        $cou_sec = $row["Section"];
                                                    }
                                                }
                                                $sql9 = "SELECT * FROM evaluated_course WHERE Student_ID = $aid";
                                                $result9 = $conn->query($sql9);
                                                if ($result9->num_rows > 0) {
                                                    while ($row = $result9->fetch_assoc()) {
                                                        $eva_cou = $row["Course"];
                                                        if ($eva_cou == $cou_title) {
                                                            $eva_value = 1;
                                                            break;
                                                        }
                                                    }
                                                }
                                                $sql10 = "SELECT * FROM course_taken WHERE Course_Title='$cou_na' AND Section=$cou_sec ";
                                                $result10 = $conn->query($sql10);
                                                if ($result10->num_rows > 0) {
                                                    while ($row = $result10->fetch_assoc()) {
                                                        $fac_in = $row["Initial"];
                                                    }
                                                }
                                                $sql11 = "SELECT * FROM faculty_info WHERE Initial='$fac_in'";
                                                $result11 = $conn->query($sql11);
                                                if ($result11->num_rows > 0) {
                                                    while ($row = $result11->fetch_assoc()) {
                                                        $fac_name = $row["Name"];
                                                    }
                                                }
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-4 eva">
                                                        <p><?php echo $cou_name; ?></p>
                                                    </div>
                                                    <div class="col-md-2 eva">
                                                        <p><?php echo "$cou_title [" . $cou_sec . "]"; ?></p>
                                                    </div>
                                                    <div class="col-md-4 eva">
                                                        <p><?php echo "$fac_name($fac_in)"; ?></p>
                                                    </div>
                                                    <div class="col-md-2 eva">
                                                        <form action="" method="GET">
                                                            <?php
                                                            $cou_val = $cou_title . "-" . $cou_sec;
                                                            if ($eva_value == 0) {
                                                                echo " <a href = 'Euvalation.php?ID=" . $cou_val . "' > Evaluation</a>";
                                                            } else {
                                                                echo " <a href = 'Euvalation.php?ID=" . $cou_val . "' class = 'disabled'>Evaluation</a>";
                                                            }
                                                            ?>
                                                        </form>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                }
                                $conn->close();
                                ?>
                            </div>
                            <div class = "tab-pane fade text-center a_log_out" id = "v-pills-settings" role = "tabpanel" aria-labelledby = "v-pills-settings-tab">
                                <h2>are u sure to log out?</h2>
                                <a href = "login_html.php?logout = '1'">yes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--script-->
        <script>
            function fac_Value(val) {
                $.ajax({
                    type: "POST",
                    url: "fac_value_get.php",
                    data: "fac_value=" + val,
                    success: function (data) {
                        $("#here").html(data);
                    }
                });
            }
        </script>
        <script src = "js/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/main.js"></script>
        <!--/script-->
    </body>
</html>
