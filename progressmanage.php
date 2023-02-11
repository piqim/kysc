<!doctype php>

<!-- PHP FORM TO DATABASE CODING -->
<?php
//CONNECT TO DATABASE
require 'connection.php';
//SESSION STARTS and SMALL SECURITY MEASURE
include 'security.php';

$user = $_SESSION['user'];

$data1 = mysqli_query($con, "SELECT * FROM users AS a INNER JOIN position AS b ON a.id_position = b.id_position WHERE user = '$user'");
$info1 = mysqli_fetch_array($data1);

$position = $info1['position'];

?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Progress Management</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- SOME CSS -->
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .inputpassword {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>

  <!-- Custom Font for this site -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <!-- Custom styles for this site -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <!-- MAIN -->
    <main class="form-signin w-100 m-auto">

        <!-- LOGO -->
        <div class="col my-3 text-center">
            <a class="logoheader-logo text-dark" href="dashboard.php">KYSC</a>
        </div>

        <!-- DESCRIPTION -->
        <h1 class="h3 mb-3 fw-normal"><?php echo $position; ?> Progress Management</h1>

        <!-- LINKS -->
        <div class="form-floating bg-white border rounded-1 p-2 px-4">
            <!-- WRITE NEW POST -->
            <a class="w-100 btn btn-primary my-2" href="newprogress.php">New Progress</a>
            <!-- LIST OF POSTS // EXPAND MORE -->
            <a class="w-100 btn btn-dark my-2" href="listprogress.php">List of Progress</a>
        </div>

        <!--FOOTER-->
        <p class="mt-5 mb-3 text-muted">© 2023 Copyright<br>piqim.com</p>
  
    </main>

</body>

</html>