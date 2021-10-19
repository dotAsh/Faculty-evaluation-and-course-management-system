<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$cti = $_SESSION["ID"];
$stid1 = $_GET["ID"];
?>
<html>
    <head>
        <title>Eva</title>
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
                    <div class="col-md-7 a_top_img">
                        <img src="images/login_logo.png" alt="">
                    </div>
                    <div class="col-md-5 text-right a_top_txt">
                        <marquee behavior="alternate" scrollamount="1">
                            <h2><?php echo "Welcome " . $_SESSION["Name"] . " "; ?></h2>
                        </marquee>

                    </div>

                </div>
            </div>
        </section>
        <section class="f_faculty">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 faculty text-right">
                        <h2>Name : </h2>
                        <h2>Course : </h2>
                        <h2>Section  :</h2>
                        <h2>Semester :</h2>
                    </div>
                    <div class="col-md-3 faculty">
                        <?php
                        $p = explode("-", $stid1);
                        $cou_title = $p[0];
                        $cou_sec = intval($p[1]);
                        $fac_ini = NULL;
                        $fac_name = NULL;
                        $img = NULL;
                        $conn5 = new mysqli("localhost", "root", "", "project370");
                        if ($conn5->connect_error) {
                            die("Connection failed: " . $conn5->connect_error);
                        }
                        $query = "SELECT * FROM course_taken WHERE Course_Title ='$cou_title' AND Section=$cou_sec ";
                        $result = $conn5->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $fac_ini = $row["Initial"];
                            }
                        }
                        $query2 = "SELECT * FROM `faculty_info` WHERE Initial='$fac_ini'";
                        $result2 = $conn5->query($query2);
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                $fac_name = $row["Name"];
                                $img = $row["Img"];
                            }
                        }
                        ?>
                        <h2><?php echo $fac_name; ?></h2>
                        <h2><?php echo $cou_title; ?></h2>
                        <h2><?php echo $cou_sec; ?></h2>
                        <h2><?php echo "Spring-2019"; ?></h2>
                    </div>
                    <div class="col-md-3 text-right faculty_pic">
                        <img src="<?php echo $img; ?>" alt="" style="">
                        <?php
                        $_SESSION["f_tit"] = $stid1;
                        $_SESSION["ini"] = $fac_ini;
                        $conn5->close();
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="f_radio">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 m-auto">
                        <form  method="POST" action="value_add.php">
                            <!--A-->
                            <div class="f_ques">
                                <h2>1. A?</h2>
                                <p><input type="radio" name="A" value="1" required=""><span>Fair</span</p>
                                <p><input type="radio" name="A" value="2" required=""><span>Good</span</p>
                                <p><input type="radio" name="A" value="3" required=""><span>Average</span></p>
                                <p><input type="radio" name="A" value="4" required=""><span>Best</span></p>
                            </div>
                            <!--B-->
                            <div class="f_ques">
                                <h2>2. B?</h2>
                                <p><input type="radio" name="B" value="1" required=""><span>Fair</span</p>
                                <p><input type="radio" name="B" value="2" required=""><span>Good</span</p>
                                <p><input type="radio" name="B" value="3" required=""><span>Average</span></p>
                                <p><input type="radio" name="B" value="4" required=""><span>Best</span></p>
                            </div>    
                            <!--C-->
                            <div class="f_ques">
                                <h2>3. C?</h2>
                                <p><input type="radio" name="C" value="1" required=""><span>Fair</span</p>
                                <p><input type="radio" name="C" value="2" required=""><span>Good</span</p>
                                <p><input type="radio" name="C" value="3" required=""><span>Average</span></p>
                                <p><input type="radio" name="C" value="4" required=""><span>Best</span></p>
                            </div>
                            <!--D-->
                            <div class="f_ques">
                                <h2>4. D?</h2>
                                <p><input type="radio" name="D" value="1" required=""><span>Fair</span</p>
                                <p><input type="radio" name="D" value="2" required=""><span>Good</span</p>
                                <p><input type="radio" name="D" value="3" required=""><span>Average</span></p>
                                <p><input type="radio" name="D" value="4" required=""><span>Best</span></p>
                            </div>    
                            <!--E-->
                            <div class="f_ques">
                                <h2>5. E?</h2>
                                <p><input type="radio" name="E" value="1" required=""><span>Fair</span</p>
                                <p><input type="radio" name="E" value="2" required=""><span>Good</span</p>
                                <p><input type="radio" name="E" value="3" required=""><span>Average</span></p>
                                <p><input type="radio" name="E" value="4" required=""><span>Best</span></p>
                            </div>    
                            <div class="text-right e_sub">
                                <input type="submit" value="submit" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--script-->
        <script src = "js/jquery-1.12.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>

