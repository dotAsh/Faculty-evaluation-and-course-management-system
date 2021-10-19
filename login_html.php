<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Anton|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!--css-->
        <link rel="stylesheet" href="css/all.min.css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/style_login.css"/>
    </head>
    <body>
        <section class="f_menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 menu_img">
                        <img src="images/login_logo.png" alt="">
                    </div>
                    <div class="col-md-6 text-right menu_txt">
                        <h2>BRAC University</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="f_login">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 m_l_c">
                        <div class="row">
                            <div class="col-md-6 m-auto p-0 m_login">
                                <div class="label p-0 m-0">
                                    <h2>Login</h2>
                                </div>
                                <div>
                                    <form action="login.php" method="POST">
                                        <div class="l_form">
                                            <h2>username: </h2>
                                            <input type="email" placeholder="username" name="username" class="form_box" required>
                                            <br>
                                            <h2>password: </h2>
                                            <input type="password" placeholder="password" name="password" class="form_box l_pass" required>
                                            <br>
                                            <input type="submit" class="l_login" value="Login">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="f_down"></section>
        <!--script-->
        <script src="js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="js/venobox.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/main.js"></script>
        <!--/script-->
    </body>
</html>
