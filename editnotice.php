<!DOCTYPE php>

<!-- PHP FORM TO DATABASE CODING -->
<?php
//SMALL SECURITY MEASURE ; SESSION START
include 'security.php';
//CONNECT TO DATABASE
require 'connection.php';

//OBTAINS USER FROM COOKIES ; FROM SESSION
$user = $_SESSION['user'];
//OBTAINS EVENT ID FROM GET METHOD
$noticeid = $_GET['id_notice'];

//OBTAINS ORIGINAL UNEDITED VALUES
$query = "SELECT * FROM notice WHERE id_notice='$noticeid'";
$data = mysqli_query($con, $query);
$info = mysqli_fetch_array($data);

$userid = $info['id_user'];

//ADD EDITED VALUES
if (isset($_POST['submit'])) {

  //ORIGINAL PICTURE
  $pdfori = $info['pdf'];

  //tambah_soalan.php
  if (isset($_POST['submit'])) {

    //SUBMIT PDF
    if ($_FILES['gambar']['name'] == null) {
      $newnamepdf = $pdfori;
    } else {
      $gambar = $_FILES['gambar']['name'];

      //READ INDEX FILES NAME THEN INDEX FILE TYPE
      $imageArr = explode('.', $gambar);
      $random = rand(10000, 99999);
      $newnamepdf = $imageArr[0] . $random . '.' . $imageArr[1];
      $uploadPath = "assets/web/pdf/" . $newnamepdf;
      $isUploaded = move_uploaded_file($_FILES["gambar"]["tmp_name"], $uploadPath);
    }

    //VARIABLE POSTED
    $notice = $_POST['notice'];
    $description = $_POST['description'];
    $date = $_POST['datepicker'];


    /*UPDATED POST*/
    $update = mysqli_query($con, "UPDATE notice SET notice = '$notice', 
    description = '$description', date = '$date', pdf = '$newnamepdf', id_user = '$userid'
    WHERE id_notice = '$noticeid'");

    //POP UP MESSAGE
    echo "<script> alert('Your notice has been edited.');
    window.location = 'listnotice.php' </script>";
  }
}
?>

<!-- https://github.com/basecamp/trix -->

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="KY News is an effort designed, maintained and initiated by students from KYUEM in hopes to further bloom our passion and interest for Journalism and Free Speech.">
  <meta name="author" content="Piqim, Hugo 0.104.2 and Bootstrap">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Notice Editor</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/blog/">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom font for this site -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <!-- Custom styles for this site -->
  <link href="blog.css" rel="stylesheet">
  <link href="blog2.css" rel="stylesheet">
  <link href="editor.css" rel="stylesheet">

  <!-- SOME CSS FOR LABEL -->
  <style>
    label {
      font-size: 1.5rem;
    }
  </style>

  <!-- CALLS CKEDITOR JS -->
  <script src="assets/ckeditor/ckeditor.js"></script>
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
          <a class="link-secondary" href="listnotice.php" aria-label="BackButton">
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

  <!-- FORM OF EVENT -->
  <div class="container">
    <div class="my-3">
      <form method="POST" enctype="multipart/form-data">

        <!-- NOTICE -->
        <div class="form-floating my-3">
        <label for="title" class="form-title">Notice</label>
          <input type="text" class="form-control form-control-lg" name="notice" placeholder="The Notice of this Awesome Thing"
            maxlength="100" value="<?php echo $info['notice']; ?>" required>
        </div>

        <!-- DESC -->
        <div class="form-floating my-3">
          <label for="description">Description</label>
            <textarea rows="10" class="form-control" name="description" maxlength="200" placeholder="The description of this notice." required><?php echo $info['description']; ?></textarea>
        </div>

        <!-- PDF FILE -->
        <div class="my-3">
          <label for="gambar" class="form-label">Upload your PDF File here *If not, just leave it empty</label>
          <input type="file" class="form-control-file" name="gambar" />
        </div>

        <!-- DATE AND TIME -->
        <div class="form-group">
          <label for="datepicker">Date and Time</label>
            <input type="datetime-local" class="form-control datepicker" id="datepicker" name="datepicker" value="<?php echo $info['date']; ?>">
        </div>

        <!--DISCLAIMER MESSAGE-->
        <p class="text-md-start">As a disclaimer, please do not write your event in this text editor first. Make sure to
          write it in another place in order to ensure your work is not lost.</p>

        <!--SUBMIT Button-->
        <input class="w-25 my-3 btn btn-lg btn-primary" type="submit" name="submit" value="Save Changes" />
      </form>
    </div>
  </div>


  <!--FOOTER-->
  <div class="container text-center">
    <p class="mt-5 mb-3 text-muted">© 2022 Copyright<br>piqim.com</p>
  </div>

</body>

</html>