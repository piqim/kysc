<!DOCTYPE php>
<html lang="en">

<?php

/* CONNECT TO DATABASE */
require 'connection.php';

/* FETCH DATA FROM EVENTS TABLE AND ARRANGE BY LATEST DATE AND WILL ONLY DISPLAY 6 LATEST*/
$queryevents = "SELECT * FROM events ORDER BY date DESC LIMIT 0,6";
$dataevents = mysqli_query($con, $queryevents);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KYSC Events</title>

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
    <link rel="stylesheet" href="assets/css/events.css">

</head>

<body>

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
                    <li class="menu-active"><a href="events.php">Events</a></li>
                    <li><a href="notice.php">Notices</a></li>
                    <li><a href="progress.php">Progress</a></li>
                </ul>
            </nav>
        </div>

    </header>

    <!-- EVENTS -->
    <section id="events1" class="section-bg">
        <div class="container text-center">

            <header class="section-header news wow fadeIn">
                <h3 class="section-title">Latest Events</h3>
                <p>
                    A section of the website which shows all the latest upcoming events in KYUEM.
                </p>
            </header>

            <!-- EVENT CONTAINER -->
            <div class="row events1-container">

                <?php
                while ($infoevents = mysqli_fetch_array($dataevents)) {

                    ?>
                    <!-- EVENT MODAL -->
                    <div class="col-lg-6 events1-item filter-app wow fadeInUp">
                        <div class="events1-wrap">
                            <figure>
                                <!-- IMG -->
                                <img src="assets/img/events/<?php echo $infoevents['pic']; ?>" class="img" alt="">

                                <!-- PREVIEW IMAGE BIG -->
                                <a href="assets/img/events/<?php echo $infoevents['pic']; ?>" class="link-preview venobox"
                                    data-gall="eventGal"><i class="ion ion-eye"></i></a>

                                <!-- READ MORE DETAIL -->
                                <a href="#inline-content<?php echo $infoevents['id_event']; ?>" data-vbtype="inline"
                                    data-maxwidth="900px" class="link-details venobox" title="More Details">
                                    <i class="ion ion-android-open"></i></a>

                                <!-- EXTRA DETAIL INLINE VENOBOX -->
                                <div id="inline-content<?php echo $infoevents['id_event']; ?>" style="display:none;">
                                    <div class="container p-5">

                                        <!-- MAIN CONTENT ; WITH TITLE AND BODY -->
                                        <?php echo $infoevents['description']; ?>

                                    </div>
                                </div>
                            </figure>

                            <!-- INFO -->
                            <div class="events1-info">
                                <!-- TITLE and LINK-->
                                <a href="#inline-content<?php echo $infoevents['id_event']; ?>" data-vbtype="inline"
                                    data-maxwidth="900px" title="More Details" class="text-danger venobox">

                                    <p>
                                        <a href="#inline-content<?php echo $infoevents['id_event']; ?>" data-vbtype="inline"
                                            data-maxwidth="900px" title="More Details" class="venobox"><?php echo $infoevents['event']; ?></a>
                                    </p>
                                    <div class="row" style="padding-top: 1rem;">
                                        <!-- DATE -->
                                        <div class="col-6 text-left">
                                            <p class="text-info">Date:</p>
                                            <p class="text-danger">
                                                <?php echo $infoevents['date']; ?>
                                            </p>
                                        </div>
                                        <!-- VENUE -->
                                        <div class="col-6 text-left">
                                            <p class="text-info">Venue:
                                            <p class="text-danger">
                                                <?php echo $infoevents['venue']; ?>
                                            </p>
                                            </p>
                                        </div>
                                    </div>
                            </div>

                        </div>
                    </div>

                <?php } ?>

            </div>

            <!-- UNNECESSARY BUTTON TO EVENT LIST FOR PUBLIC
            <a class="cta-btn wow fadeInUp" href="events-list.php" target="_blank">More Events</a>
                    -->

        </div>
        </div>

    </section>

    <!-- CALENDAR -->
    <section id="events" class="section-margin">
        <div class="container">

            <!-- TITLE -->
            <header class="section-header">
                <h3>Events Calendar</h3>
                <p>
                    A calendar that is kept up to date with the latest KYUEM events.
                </p>
            </header>

            <!-- GOOGLE CALENDAR -->
            <div class="row events-cols">
                <div class="col-md-12 wow fadeInUp googleCalendar">
                    <iframe
                        src="https://calendar.google.com/calendar/embed?height=400&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FKuala_Lumpur&showTz=0&showCalendars=0&showTabs=0&showPrint=0&showNav=1&showTitle=0&hl=en_GB&src=cGVlcWltQGdtYWlsLmNvbQ&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=Y2xhc3Nyb29tMTE3NzIwMzA0MTc0MDU4NzI4MTM4QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=Y2xhc3Nyb29tMTA2NjU3MzMzODU1MDM3Njc4MzY3QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=ZW4ubWFsYXlzaWEjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&src=Y2xhc3Nyb29tMTAzMzQxMTI0MjU0OTM4MTg5NDAyQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=Y19jbGFzc3Jvb21hZjFmZmI2MkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%237986CB&color=%2333B679&color=%23174ea6&color=%23137333&color=%230B8043&color=%23202124&color=%23c26401"
                        style="border-width:0" frameborder="0" scrolling="no"></iframe>
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