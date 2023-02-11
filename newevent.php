<!DOCTYPE php>

<!-- PHP FORM TO DATABASE CODING -->
<?php
//SMALL SECURITY MEASURE ; SESSION START
include 'security.php';
//CONNECT TO DATABASE
require 'connection.php';

//OBTAINS USER FROM COOKIES ; FROM SESSION
$user = $_SESSION['user'];

//MYSQL CODE TO OBTAIN POSITION OF USER THROUGH SAME USER ID BETWEEN POSITION AND USERS TABLE
$data1 = mysqli_query($con, "SELECT * FROM users AS a INNER JOIN position AS b ON a.id_position = b.id_position WHERE user = '$user'");
$info1 = mysqli_fetch_array($data1);

//POSITION OF USER
$position = $info1['position'];

//tambah_soalan.php
if (isset($_POST['submit'])) {
  //SUBMIT PICTURE
  if ($_FILES['gambar']['name'] == null) {
    $newnamepic = "";
  } else {
    $gambar = $_FILES['gambar']['name'];

    //READ INDEX FILES NAME THEN INDEX FILE TYPE
    $imageArr = explode('.', $gambar);
    $random = rand(10000, 99999);
    $newnamepic = $imageArr[0] . $random . '.' . $imageArr[1];
    $uploadPath = "assets/img/events/" . $newnamepic;
    $isUploaded = move_uploaded_file($_FILES["gambar"]["tmp_name"], $uploadPath);
  }

  //VARIABLE POSTED
  $title = $_POST['title'];
  $description = $_POST['content'];
  $venue = $_POST['venue'];
  $date = $_POST['datepicker'];

  //ADD POST
  $query = "INSERT INTO events(event, date, venue, description, pic) VALUES('$title', '$date', '$venue','$description','$newnamepic')";
  $insert_row = mysqli_query($con, $query);
  $last_id = mysqli_insert_id($con);

  //POP UP MESSAGE
  echo "<script> alert('Your event has been submitted.');
window.location = 'listevent.php' </script>";

}
?>


<!-- https://github.com/basecamp/trix -->

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="KY News is an effort designed, maintained and initiated by students from KYUEM in hopes to further bloom our passion and interest for Journalism and Free Speech.">
  <meta name="author" content="Piqim, Hugo 0.104.2 and Bootstrap">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Event Poster</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/blog/">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom font for this site -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <!-- Custom styles for this site -->
  <link href="blog.css" rel="stylesheet">
  <link href="blog2.css" rel="stylesheet">
  <link href="editor.css" rel="stylesheet">

  <!-- CALLS CKEDITOR JS -->
  <script src="assets/ckeditor/ckeditor.js"></script>

  <!-- SOME CSS FOR LABEL -->
  <style>
    label {
      font-size: 1.5rem;
    }
  </style>

</head>

<body>

  <!--HEADER OF PAGE-->
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

  <!-- FORM FOR NEW EVENT -->
  <div class="container">
    <div class="my-3">
      <form method="POST" enctype="multipart/form-data">

        <!-- TITLE -->
        <div class="form-floating my-3">
        <label for="title" class="form-title">Title</label>
          <input type="text" class="form-control form-control-lg" name="title" placeholder="The Title of this Awesome Event"
            maxlength="100" required>
        </div>

        <!-- COVER IMAGE -->
        <div class="my-3">
          <label for="gambar" class="form-label">Upload your Poster Image here</label>
          <input type="file" class="form-control-file" name="gambar" />
        </div>

        <!-- DESC
        <div class="form-floating my-3">
          <input type="text" class="form-control" name="description" placeholder="The Description of This Post"
            maxlength="200" required>
          <label for="description">Description</label>
        </div>
        -->

        <!-- DESCRIPTION CONTENT ; EDITOR -->
        <label for="content" class="form-label">Description of Event</label>
        <textarea name="content" id="editor" rows="10" cols="80">
        Well then, what's new?
        </textarea>
        <!-- REPLACES THE TEXTAREA WITH AN EDITOR -->
        <script> CKEDITOR.replace('editor'); </script>

        <!-- VENUE -->
        <div class="form-floating my-3">
          <label for="venue">Venue</label>
            <input type="text" class="form-control" name="venue" placeholder="The Venue for this Event"
              maxlength="200" required>
        </div>

        <!-- DATE AND TIME -->
        <div class="form-group">
          <label for="datepicker">Date and Time</label>
            <input type="datetime-local" class="form-control datepicker" id="datepicker" name="datepicker" required>
        </div>

        <!--DISCLAIMER MESSAGE-->
        <p class="text-md-start">As a disclaimer, please do not write your event in this text editor first. Make sure to
          write it in another place in order to ensure your work is not lost.</p>

        <!--SUBMIT Button-->
        <input class="w-25 my-3 btn btn-lg btn-primary" type="submit" name="submit" value="Post" />
      </form>
    </div>
  </div>

  <!--FOOTER-->
  <div class="container text-center">
    <p class="mt-5 mb-3 text-muted">© 2023 Copyright<br>piqim.com</p>
  </div>

</body>

</html>

