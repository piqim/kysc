<!DOCTYPE php>
<html lang="en">

<?php 

/* CONNECT TO DATABASE */
require 'connection.php';

/* FETCH DATA FROM NOTICE TABLE AND ARRANGE BY LATEST DATE AND WILL DISPLAY ALL PROGRESS*/
$queryprogress = "SELECT * FROM progress ORDER BY date DESC";
$dataprogress = mysqli_query($con, $queryprogress);

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
          <a class="link-secondary" href="progressmanage.php" aria-label="BackButton">
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


    <!-- PROGRESS -->
    <section id="events1" class="section-bg">
        <div class="container text-center">

            <header class="section-header news wow fadeIn">
                <p>
                    A section of the website which shows all the progresses that is in the works. The arrangement of progress are in order of latest to oldest.
                </p>
            </header>

            <div class="container">
                <!-- TABLE OF PROGRESS -->
                <table class="table table-striped">

                <!-- TABLE HEADER -->
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Date</th>
                    <th scope="col">By</th>
                    <th scope="col">Status</th>
                    <th scope="col">Short Description</th>
                    <th scope="col" class="text-center">Detailed Description</th>
                    <th scope="col" class="text-center">Picture</th>
                    <th scope="col" class="text-center">Delete</th>
                    <th scope="col" class="text-center">Edit</th>
                </thead>

                <!-- TABLE CONTENT BODY -->
                <tbody>
                    <?php
                    $no = 1;
                    while ($infoprogress = mysqli_fetch_array($dataprogress)) {
                        $id_poster = $infoprogress['id_user'];

                        //OBTAIN NAME AND POSITION OF POSTER THROUGH USER ID
                        $queryuser = "SELECT * FROM users AS a INNER JOIN position AS b ON a.id_position = b.id_position WHERE a.id_user='$id_poster'";
                        $datauser= mysqli_query($con, $queryuser);
                        $infouser = mysqli_fetch_array($datauser);

                        $nameposter = $infouser['name'];                        
                        ?>

                    <tr>
                        <!-- NUMBERS -->
                        <th scope="row">
                            <?php echo $no; ?>
                        </th>
                        <!-- PROGRESS -->
                        <td>
                            <?php echo $infoprogress['progress']; ?>
                        </td>
                        <!-- DATE -->
                        <td>
                            <?php echo $infoprogress['date']; ?>
                        </td>
                        <!-- NAME OF POSTER -->
                        <td>
                            <?php echo $nameposter ?>
                        </td>
                        <!-- STATUS -->
                        <td>
                            <?php
                            //DETERMINE STATUS VALUE
                            $status = $infoprogress['status'];
                            //IF 1; WORKING ON IT
                            if($status == '1') {
                            ?>
                             <p class="text-warning">Working on it</p>
                            <?php
                            //IF 2; COMPLETED
                            } else {
                                ?>
                            <p class="text-success">Completed</p>
                            <?php } ?>
                        </td>
                        <!-- SHORT DESC -->
                        <td>
                            <?php echo $infoprogress['description']; ?>
                        </td>
                        <!-- LONG DESC -->
                        <td>
                            <!-- VENO BOX LINK TO MORE DESCRIPTION -->
                            <figure>
                                <center>
                                <a href="#inline-content<?php echo $infoprogress['id_progress']; ?>" data-vbtype="inline" data-maxwidth="900px" class="link-details venobox" style="font-size: 2rem;" title="More Details">
                                    <i class="ion ion-android-open"></i>
                                </a>                                
                                </center>
                            </figure>

                            <!-- EXTRA DETAIL INLINE VENOBOX -->
                            <div id="inline-content<?php echo $infoprogress['id_progress']; ?>" style="display:none;">
                                        <div class="container p-5">
                                        
                                            <!-- MAIN CONTENT ; WITH TITLE AND BODY -->
                                            <?php echo $infoprogress['moredescription']; ?>

                                        </div>
                            </div>

                        </td>
                        <!-- PICTURE -->
                        <td>
                            <figure>
                                <center>
                                    <a href="assets/img/progress/<?php echo $infoprogress['pic']; ?>"  class="link-preview venobox" data-gall="eventGal"><i class="ion ion-eye" style="font-size: 2rem;"></i></a>
                                </center>
                            </figure>
                        </td>
                        <!-- DELETE -->
                        <td>
                            <figure>
                                <center>
                                    <a href="delprogress.php?id_progress=<?php echo $infoprogress['id_progress']; ?>"><i class="ion ion-trash-b text-danger" style="font-size: 2rem;"></i></a>
                                </center>
                            </figure>

                            <script>
                                /*
                                function confirmation<?php $infoprogress['id_progress']; ?>() {
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
                                    <a href="editprogress.php?id_progress=<?php echo $infoprogress['id_progress']; ?>" data-gall="eventGal"><i class="ion ion-edit" style="font-size: 2rem;"></i></a>
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