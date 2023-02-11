<!DOCTYPE php>
<html lang="en">

<?php

/* CONNECT TO DATABASE */
require 'connection.php';

/* FETCH DATA FROM NOTICE TABLE AND ARRANGE BY LATEST DATE*/
$querynotice = "SELECT * FROM notice ORDER BY date DESC";
$datanotice = mysqli_query($con, $querynotice);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KYSC Notice</title>

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- main css link -->
    <link rel="stylesheet" href="style.css">
    <!-- file css link -->
    <link rel="stylesheet" href="assets/css/notice.css">

</head>

<body>

    <!-- HEADER BAR -->
    <header id="header">
        <div class="container-fluid">

            <!-- LOGO -->
            <div id="logo" class="pull-left">
                <h1><a href="index.html#intro" class="scrollto">KY STUDENT COUNCIL</a></h1>
            </div>

            <!-- NAVIGATION MENU -->
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="index.html#intro">Home</a></li>
                    <li class="menu-has-children"><a>About</a>
                        <ul>
                            <li><a href="index.html#about">Vision and Mission</a></li>
                            <li><a href="index.html#services">Objectives</a></li>
                            <li><a href="index.html#commitee">Commitee Members</a></li>
                        </ul>
                    </li>
                    <li><a href="index.html#contact">Contact Us</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li class="menu-active"><a href="notice.php">Notices</a></li>
                    <li><a href="progress.php">Progress</a></li>
                </ul>
            </nav>
        </div>

    </header>

    <!-- NOTICE -->
    <section id="notice" class="section-bg">
        <div class="container text-center">

            <header class="section-header news wow fadeIn">
                <h3 class="section-title">Notice Board</h3>
                <p class="section-intro">Important notices by the student council will be posted here in advance.</p>
            </header>

            <!-- NOTICE CONTAINER -->
            <div class="row notice-container">

                <?php
                // CODE TO LOOP AND DISPLAY ALL NOTICE INFOW
                while ($infonotice = mysqli_fetch_array($datanotice)) {
                    $id_poster = $infonotice['id_user'];

                    //OBTAIN NAME AND POSITION OF POSTER THROUGH USER ID
                    $queryuser = "SELECT * FROM users AS a INNER JOIN position AS b ON a.id_position = b.id_position WHERE a.id_user='$id_poster'";
                    $datauser = mysqli_query($con, $queryuser);
                    $infouser = mysqli_fetch_array($datauser);

                    $nameposter = $infouser['name'];
                    $positionposter = $infouser['position'];

                    ?>

                    <!-- NOTICE MODAL -->
                    <div class="col-lg-4 col-md-6 notice-item filter-app wow fadeInUp">
                        <div class="notice-wrap">

                            <!-- INFO -->
                            <div class="notice-info">

                                <!-- TITLE and LINK TO PDF-->
                                <h5>
                                    <a href="notice-pdf.php?pdf=<?php echo $infonotice['pdf']; ?>" target="_blank">
                                        <?php echo $infonotice['notice']; ?>
                                    </a>
                                </h5>

                                <!-- SHORT DESCRIPTION -->
                                <p class="text-dark">
                                    <?php echo $infonotice['description']; ?>
                                </p>

                                <div class="row" style="padding-top: 1rem;">
                                    <!-- DATE -->
                                    <div class="col-6 text-left">
                                        <p class="text-info">Date:</p>
                                        <p class="text-danger">
                                            <?php echo $infonotice['date']; ?>
                                        </p>
                                    </div>
                                    <!-- POSTER -->
                                    <div class="col-6 text-left">
                                        <p class="text-info">By:
                                        <p class="text-danger">
                                            <?php echo $positionposter ?>
                                        </p>
                                        </p>
                                    </div>
                                </div>

                                <!-- READ MORE -->
                                <br><a class="btn btn-danger" href="notice-pdf.php?pdf=<?php echo $infonotice['pdf']; ?>"
                                    target="_blank">Read More</a>

                            </div>
                        </div>

                    </div>

                <?php } ?>

            </div>


        </div>
        </div>

    </section>

    <!-- FOOTER -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-info">
                        <h3>Student Council</h3>
                        <p>
                            Vox populi, vox dei.
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#intro">Home</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="http://sms.kyuem.edu.my/qs-kyuem/js/"
                                    target="_blank">QIAB</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="events.php" target="_blank">Events
                                </a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="notice.php" target="_blank">Notices</a>
                            </li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="progress.php" target="_blank">Progress</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <a href="https://github.com/piqim/">
                            <h4> © piqim 2023 </h4>
                        </a>
                        <div class="footer-links">
                            <ul>
                                <li><i class="ion-log-in"></i> <a href="signin.php" target="_blank">Sign In</a></li>
                            </ul>
                        </div>

                        <!-- SOCIALS
            <div class="social-links">
              <ul style="list-style: none;">
                <li><a href="signin.php"
                  target="_blank"><i class="ion-log-in"></i> </a></li>
                <li><a href="signin.php"
                  target="_blank"><i class="ion-log-in"></i> </a></li>
              </ul>
            -->

                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/superfish/superfish.min.js"></script>
    <script src="assets/vendor/hoverIntent/hoverIntent.js"></script>
    <script src="assets/vendor/jquery-touchswipe/jquery.touchSwipe.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>