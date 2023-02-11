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


    <!-- file css link -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/events.css">

    <!-- Custom styles for this site -->
    <link href="blog.css" rel="stylesheet">
    <link href="blog2.css" rel="stylesheet">

</head>

<body>

    <!-- HEADER OF PAGE -->
    <div class="container">
    <header class="blog-header lh-1 py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">

        <!--SUBSCRIBE BUTTON
              <div class="col-4 pt-1">
                <a class="link-light" href="#">Subscribe</a>
              </div>
              -->

        <div class="col-4 pt-1">
          <!--BACK BUTTON-->
          <a class="link-secondary" href="eventmanage.php" aria-label="BackButton">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" stroke="currentColor"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
              viewBox="0 0 512 512">
              <title>Back Button</title>
              <polyline points="328 112 184 256 328 400"
                style="fill:none;stroke:rgb(100, 100, 100);stroke-linecap:square;stroke-miterlimit:10;stroke-width:48px" />
            </svg>
          </a>
        </div>

        <!--TITLE-->
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="dashboard.php">KYSC</a>
        </div>

        <!-- DIVS TO KEEP TITLE CENTERED-->
        <div class="col-4 d-flex justify-content-end align-items-center"></div>

      </div>
    </header>
  </div>


    <!-- EVENTS -->
    <section id="events1" class="section-bg">
        <div class="container text-center">

            <header class="section-header news wow fadeIn">
                <p>
                    A section of the website which shows all the events that has occurred or will occur. The arrangement of events are in order of latest to oldest.
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
                    <th scope="col" class="text-center">Delete</th>
                    <th scope="col" class="text-center">Edit</th>
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
                        <!-- DELETE -->
                        <td>
                            <figure>
                                <center>
                                    <a href="delevent.php?id_event=<?php echo $infoevents['id_event']; ?>"><i class="ion ion-trash-b text-danger" style="font-size: 2rem;"></i></a>
                                </center>
                            </figure>

                            <script>
                                /*
                                function confirmation<?php $infoevents['id_event']; ?>() {
                                    var result = confirm("Are you sure you want to delete?");
                                    if(result){
                                        //alert('Your post has been submitted');
                                    }
                                }
                                */
                            </script>


                        </td>
                        <!-- EDIT -->
                        <td>
                            <figure>
                                <center>
                                    <a href="editevent.php?id_event=<?php echo $infoevents['id_event']; ?>" data-gall="eventGal"><i class="ion ion-edit" style="font-size: 2rem;"></i></a>
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