<!DOCTYPE php>
<html lang="en">

<?php 

/* CONNECT TO DATABASE */
require 'connection.php';

/* FETCH DATA FROM NOTICE TABLE AND ARRANGE BY LATEST DATE AND WILL DISPLAY ALL EVENTS*/
$queryevents = "SELECT * FROM events ORDER BY date DESC";
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
                <h1><a href="#intro" class="scrollto">KY STUDENT COUNCIL</a></h1>
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
                <h3 class="section-title">List of Events</h3>
                <p>
                    A section of the website which shows all the events that has occurred or will occur. The arrangement of events are in order of latest to
                </p>
            </header>

            <div class="container">
                <!-- TABLE OF EVENTS -->
                <table class="table table-striped">

                <!-- TABLE HEADER -->
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Event</th>
                    <th scope="col">Date</th>
                    <th scope="col">Venue</th>
                    <th scope="col" class="text-center">Description</th>
                    <th scope="col" class="text-center">Poster</th>
                </thead>

                <!-- TABLE CONTENT BODY -->
                <tbody>
                    <?php
                    $no = 1;
                    while ($infoevents = mysqli_fetch_array($dataevents)) { 
                        ?>

                    <tr>
                        <!-- NUMBERS -->
                        <th scope="row">
                            <?php echo $no; ?>
                        </th>
                        <!-- EVENT -->
                        <td>
                            <?php echo $infoevents['event']; ?>
                        </td>
                        <!-- DATE -->
                        <td>
                            <?php echo $infoevents['date']; ?>
                        </td>
                        <!-- VENUE -->
                        <td>
                            <?php echo $infoevents['venue']; ?>
                        </td>
                        <!-- DESCRIPTION -->
                        <td>
                            <!-- VENO BOX LINK TO MORE DESCRIPTION -->
                            <figure>
                                <center>
                                <a href="#inline-content<?php echo $infoevents['id_event']; ?>" data-vbtype="inline" data-maxwidth="900px" class="link-details venobox" style="font-size: 2rem;" title="More Details">
                                    <i class="ion ion-android-open"></i>
                                </a>                                
                                </center>
                            </figure>

                            <!-- EXTRA DETAIL INLINE VENOBOX -->
                            <div id="inline-content<?php echo $infoevents['id_event']; ?>" style="display:none;">
                                        <div class="container p-5">
                                        
                                            <!-- MAIN CONTENT ; WITH TITLE AND BODY -->
                                            <?php echo $infoevents['description']; ?>

                                        </div>
                            </div>

                        </td>
                        <!-- POSTER -->
                        <td>
                            <figure>
                                <center>
                                    <a href="assets/img/events/<?php echo $infoevents['pic']; ?>"  class="link-preview venobox" data-gall="eventGal"><i class="ion ion-eye" style="font-size: 2rem;"></i></a>
                                </center>
                            </figure>
                        </td>
                    </tr>
                    <?php $no++; } ?>

                </tbody>
            
            </table>
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
                            <li><i class="ion-ios-arrow-right"></i> <a href="#header">Home</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="http://sms.kyuem.edu.my/qs-kyuem/js/"
                                    target="_blank">QIAB</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#" target="_blank">Events
                                </a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#" target="_blank">Notices</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#" target="_blank">Progress</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <a href="https://github.com/piqim/">
                            <h4> © piqim 2023 </h4>
                        </a>
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