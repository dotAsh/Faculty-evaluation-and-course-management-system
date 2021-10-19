<html>
    <head>

    </head>
    <body>

        <?php
        $cou_val = $_POST["course_value"];
        $p = explode("-", $cou_val);
        $course_ti = $p[0];
        $course_sec = intval($p[1]);
        if (!empty($_POST["course_value"])) {
            $fac_name = NULL;
            $fac_ini = NULL;
            $a = NULL;
            $b = NULL;
            $c = NULL;
            $d = NULL;
            $e = NULL;
            $st = NULL;
            $as = 0;
            $bs = 0;
            $cs = 0;
            $ds = 0;
            $es = 0;
            $conn = new mysqli("localhost", "root", "", "project370");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM course_taken where Course_Title='$course_ti' AND Section=$course_sec";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $fac_ini = $row["Initial"];
                    $a = $row["A"];
                    $b = $row["B"];
                    $c = $row["C"];
                    $d = $row["D"];
                    $e = $row["E"];
                    $st = $row["Student_Count"];
                }
            }
            $sql1 = "SELECT * FROM faculty_info where Initial='$fac_ini'";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    $fac_name = $row["Name"];
                }
            }
            if ($st != 0) {
                $as = ($a / (4 * $st)) * 100;
                $bs = ($b / (4 * $st)) * 100;
                $cs = ($c / (4 * $st)) * 100;
                $ds = ($d / (4 * $st)) * 100;
                $es = ($e / (4 * $st)) * 100;
            }
        }
        ?>
        <div class="row">
            <div class="col-md-8 text-center bar">
                <h3><?php echo $fac_name; ?></h3>
                <div class="progress">
                    <div class="progress-bar bg-secondary" role="progressbar" style="width:<?php echo $as ?>%" aria-valuenow=" <?php echo $as ?>" aria-valuemin="0" aria-valuemax="100">
                        <?php echo "$as%" ?>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $bs ?>%" aria-valuenow=" <?php echo $bs ?>" aria-valuemin="0" aria-valuemax="100">
                        <?php echo "$bs%" ?>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $cs ?>%" aria-valuenow="<?php echo $cs ?>%" aria-valuemin="0" aria-valuemax="100">
                        <?php echo "$cs%" ?>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $ds ?>%" aria-valuenow="<?php echo $ds ?>%" aria-valuemin="0" aria-valuemax="100">
                        <?php echo "$ds%" ?>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: <?php echo $es ?>%" aria-valuenow="<?php echo $es ?>%" aria-valuemin="0" aria-valuemax="100">
                        <?php echo "$es%" ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center course_select  bar_not_eva">
                <h4>who havent Evaluate yet!</h4>
                <form action="" method="POST">  
                    <select name="title" size='5' id="eva_not_value" onchange="no_eva_value(this.value)">
                        <!--                                                <option class="first" value="select">Select</option>";   -->
                        <?php
                        $sql2 = "SELECT taken_course.Student_ID FROM (taken_course LEFT JOIN evaluated_course on taken_course.Student_ID=evaluated_course.Student_ID and taken_course.Course=evaluated_course.Course) WHERE taken_course.Course='$course_ti' AND taken_course.Section=$course_sec AND evaluated_course.Course is NULL";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                $id = $row["Student_ID"];
                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $id; ?></option>
                                <?php
                            }
                        }
                        $conn->close();
                        ?>
                    </select>
                </form>
                <h2 id="here_eva_name"></h2>
            </div>
        </div>
        <script>
            function no_eva_value(val) {
                $.ajax({
                    type: "POST",
                    url: "no_eva_name.php",
                    data: "no_eva_value=" + val,
                    success: function (data) {
                        $("#here_eva_name").html(data);
                    }
                });
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    </body>
</html>
