<?php
session_start();
?>
<html>
    <head>
        <title>admin</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Anton|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!--css-->
        <link rel="stylesheet" href="css/all.min.css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/style_admin.css"/>
    </head>
    <body>
        <section class="a_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 a_top_img">
                        <img src="images/login_logo.png" alt="">
                    </div>
                    <div class="col-md-6 text-right a_top_txt">
                        <h2>Welcome Admin</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="admin_body">
            <div class="container">
                <!--mmm-->
                <div class="row">
                    <div class="col-3 text-center p-4">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Student Information</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Faculty Information</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Courses</a>
                            <a class="nav-link" id="v-pills-settings-tab2" data-toggle="pill" href="#v-pills-settings2" role="tab" aria-controls="v-pills-settings2" aria-selected="false">Settings</a>
                            <a class="nav-link" id="v-pills-settings-tab1" data-toggle="pill" href="#v-pills-settings1" role="tab" aria-controls="v-pills-settings1" aria-selected="false">Log out</a>
                        </div>
                    </div>
                    <div class="col-9 admin_content">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade admin_home show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div>
                                    <h3>Number of Students</h3>
                                    <h4>
                                        <?php
                                        $st_count = 0;
                                        $conn = new mysqli("localhost", "root", "", "project370");
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $sql = "SELECT * FROM Student";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $st_count = $st_count + 1;
                                            }
                                        }
                                        echo $st_count;
                                        ?>
                                    </h4>
                                </div>
                                <div style="padding: 10px 0;">
                                    <h3>Number of Faculty</h3>
                                    <h4>
                                        <?php
                                        $fac_count = 0;
                                        $sql1 = "SELECT * FROM Faculty_info";
                                        $result1 = $conn->query($sql1);
                                        if ($result1->num_rows > 0) {
                                            while ($row = $result1->fetch_assoc()) {
                                                $fac_count = $fac_count + 1;
                                            }
                                        }
                                        echo $fac_count;
                                        ?>
                                    </h4>
                                </div>
                                <div>
                                    <h3>Number of Courses</h3>
                                    <h4>
                                        <?php
                                        $cou_count = 0;
                                        $sql2 = "SELECt DISTINCT Title from course";
                                        $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            while ($row = $result2->fetch_assoc()) {
                                                $cou_count = $cou_count + 1;
                                            }
                                        }
                                        echo $cou_count;
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="row st_info">
                                    <div class="col-md-4 text-center">
                                        <form action="" method="POST">  
                                            <select name="title" size='8' id="fac_value" onchange="student_value(this.value)">
                                                <!--                                                <option class="first" value="select">Select</option>";   -->
                                                <?php
                                                $sql3 = "SELECT * FROM `student` ORDER by ID ASC";
                                                $result3 = $conn->query($sql3);
                                                if ($result3->num_rows > 0) {
                                                    while ($row = $result3->fetch_assoc()) {
                                                        echo "<option value = " . $row["ID"] . ">" . $row["ID"] . "</option> ";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="col-md-8">
                                        <h2 id="here_st_info"></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <div class="row fac_info">
                                    <div class="col-md-4 text-center">
                                        <form action="" method="POST">  
                                            <select name="title" size='8' id="fac_value" onchange="faculty_value(this.value)">
                                                <!--                                                <option class="first" value="select">Select</option>";   -->
                                                <?php
                                                $sql4 = "SELECT * FROM `faculty_info` ORDER by Name ASC";
                                                $result4 = $conn->query($sql4);
                                                if ($result4->num_rows > 0) {
                                                    while ($row = $result4->fetch_assoc()) {
                                                        echo "<option value = " . $row["Email"] . ">" . $row["Name"] . "</option> ";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="col-md-8" style="padding: 0 0px;">
                                        <h2 id="here_fac_info">

                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade admin_course" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="row">
                                    <div class="col-md-2 course_select">
                                        <form action="" method="POST">  
                                            <select name="title" size='8' id="cou_value" onchange="course_value(this.value)">
                                                <!--                                                <option class="first" value="select">Select</option>";   -->
                                                <?php
                                                $sql5 = "SELECT * FROM `course` ORDER by Title ASC";
                                                $result5 = $conn->query($sql5);
                                                if ($result5->num_rows > 0) {
                                                    while ($row = $result5->fetch_assoc()) {
                                                        $c_ti = $row["Title"];
                                                        $sc = $row["Section"];
                                                        $op = $c_ti . " [" . $sc . "]";
                                                        $val = $c_ti . "-" . $sc;
                                                        ?>
                                                        <option value="<?php echo $val; ?>"><?php echo $op; ?></option>
                                                        <?php
                                                    }
                                                }
                                                $conn->close();
                                                ?>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="col-md-10" style="padding: 0 0px;">
                                        <h2 id="here_cou_info">

                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings2" role="tabpane2" aria-labelledby="v-pills-settings-tab2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST" action="start_addcourse.php">
                                            <div class="admin_f_ques">
                                                <h2>1. Start Adding Course?</h2>
                                                <p><input type="radio" name="Add" value="1" required=""><span>Yes</span</p>
                                                <p><input type="radio" name="Add" value="0" required=""><span>NO</span</p>
                                            </div>
                                            <div class="text-right admin_e_sub">
                                                <input type="submit" value="submit" name="submit">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-12">
                                        <form method="POST" action="start_evaluation.php">
                                            <div class="admin_f_ques">
                                                <h2>1. Start Evaluation?</h2>
                                                <p><input type="radio" name="eva" value="1" required=""><span>Yes</span</p>
                                                <p><input type="radio" name="eva" value="0" required=""><span>NO</span</p>
                                            </div>
                                            <div class="text-right admin_e_sub">
                                                <input type="submit" value="submit" name="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade text-center a_log_out" id="v-pills-settings1" role="tabpanel" aria-labelledby="v-pills-settings-tab1">
                                <h2>are u sure to log out?</h2>
                                <a href = "login_html.php?logout = '1'">yes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--mmmm-->
            </div>
        </section>
        <!--script-->
        <script>
            function course_value(val) {
                $.ajax({
                    type: "POST",
                    url: "cou_info_value_get.php",
                    data: "course_value=" + val,
                    success: function (data) {
                        $("#here_cou_info").html(data);
                    }
                });
            }
            function student_value(val) {
                $.ajax({
                    type: "POST",
                    url: "st_info_value_get.php",
                    data: "student_value=" + val,
                    success: function (data) {
                        $("#here_st_info").html(data);
                    }
                });
            }
            function faculty_value(val) {
                $.ajax({
                    type: "POST",
                    url: "faculty_info_value_get.php",
                    data: "faculty_value=" + val,
                    success: function (data) {
                        $("#here_fac_info").html(data);
                    }
                });
            }
        </script>
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
