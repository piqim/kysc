<!DOCTYPE php>
<html lang="en">

<?php

/* CONNECT TO DATABASE */
require 'connection.php';

/* FETCH DATA FROM PROGRESS TABLE AND ARRANGE BY LATEST DATE**/
$query = "SELECT * FROM progress ORDER BY date DESC LIMIT 0,6";
$data = mysqli_query($con, $query);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KYSC Progress</title>

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
    <link rel="stylesheet" href="assets/css/progress.css">

</head>

<body>

    <!-- HEADER ; NAVIGATION MENU -->
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
                    <li><a href="notice.php">Notices</a></li>
                    <li class="menu-active"><a href="progress.php">Progress</a></li>
                </ul>
            </nav>
        </div>

    </header>

    <!-- PROGRESS -->
    <section id="progress" class="section-bg">
        <div class="container text-center">

            <header class="section-header news wow fadeIn">
                <h3 class="section-title">progress Board</h3>
                <p class="section-intro">
                    The student council is built on the purpose of serving the students. Any progress related to a
                    development will be posted here on a frequent basis by the SC member.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo quasi enim unde fuga dicta? Quae hic
                    impedit omnis nobis minus cum dolorem, assumenda delectus pariatur cupiditate inventore facilis
                    alias illo!
                </p>
            </header>

            <!-- PROGRESS CONTAINER -->
            <div class="row progress-container">

                <?php
                while ($info = mysqli_fetch_array($data)) {
                    $id_poster = $info['id_user'];

                    //OBTAIN NAME AND POSITION OF POSTER THROUGH USER ID
                    $queryuser = "SELECT * FROM users AS a INNER JOIN position AS b ON a.id_position = b.id_position WHERE a.id_user='$id_poster'";
                    $datauser = mysqli_query($con, $queryuser);
                    $infouser = mysqli_fetch_array($datauser);

                    $nameposter = $infouser['name'];
                    $positionposter = $infouser['position'];

                    ?>

                    <!-- PROGRESS MODAL -->
                    <div class="col-lg-6 col-md-6 progress-item filter-app wow fadeInUp">
                        <div class="progress-wrap">

                            <!-- INFO -->
                            <div class="progress-info">
                                <!-- TITLE and LINK TO EXTENDED PROGRESSION LIST-->
                                <h5>
                                    <a href="#inline-content" data-vbtype="inline" data-maxwidth="900px"
                                        title="More Details" class="text-danger venobox">
                                        <?php echo $info['progress']; ?>
                                    </a>
                                </h5>

                                <div id="informationprog" class="row" style="padding: 1rem 0 1rem 0;">
                                    <!-- LATEST UPDATE DATE -->
                                    <div class="col-4 text-center">
                                        <p class="text-info">Latest Update:</p>
                                        <p class="text-primary">
                                            <?php echo $info['date']; ?>
                                        </p>
                                    </div>
                                    <!-- BY WHO -->
                                    <div class="col-4 text-center">
                                        <p class="text-info">By:
                                            <!-- NAME -->
                                        <p class="text-primary">
                                            <?php echo $nameposter; ?>
                                        </p>
                                        <!-- POSITION -->
                                    </div>
                                    <!-- STATUS :- WORKING ON IT (1) / DONE (2) -->
                                    <div class="col-4 text-center">
                                        <p class="text-info">Status:
                                            <!-- CHECK STATUS ; WORKING ON IT -->
                                            <?php
                                            if ($info['status'] = '1') {
                                                ?>
                                            <p class="text-warning">Working on it</p>

                                            <!-- CHECK STATUS ; COMPLETED -->
                                            <?php
                                            } else {
                                                ?>
                                            <p class="text-success">Completed</p>
                                            <?php
                                            }
                                            ?>

                                    </div>
                                </div>

                                <figure style="margin-bottom: 1rem;">
                                    <!-- IMG -->
                                    <img src="assets/img/progress/<?php echo $info['pic'] ?>" class="img-fluid" alt="">

                                    <!-- PREVIEW IMAGE BIG -->
                                    <a href="assets/img/progress/<?php echo $info['pic'] ?>" class="link-preview venobox"
                                        data-gall="eventGal" class="link-preview"><i class="ion ion-eye"></i></a>

                                    <!-- READ MORE DETAIL -->
                                    <a href="#inline-content" data-vbtype="inline" data-maxwidth="900px"
                                        class="link-details venobox" title="More Details">
                                        <i class="ion ion-android-open"></i></a>

                                    <!-- EXTRA DETAIL INLINE VENOBOX -->
                                    <div id="inline-content" style="display:none;">
                                        <div class="container p-5">

                                            <!-- MAIN CONTENT ; WITH TITLE AND BODY -->
                                            <?php echo $info['moredescription']; ?>

                                            <!-- LATEST DATE / WRITEN BY -->
                                            <div class="col text-center pt-4">
                                                <p class="row-6">Written on:
                                                    <?php echo $info['date']; ?>
                                                </p>
                                                <p class="row-6">Written by:
                                                    <?php echo $nameposter; ?>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </figure>

                                <!-- LATEST UPDATE ; SHORT SUMMARY LATEST -->
                                <div class="row">
                                    <p class="text-dark">
                                        <?php echo $info['description'] ?>
                                    </p>
                                </div>

                                <a class="cta-btn wow fadeIn venobox mt-4" href="#inline-content" data-vbtype="inline"
                                    data-maxwidth="900px" title="More Details">Read More</a>

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