<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'header.php'; ?>
    <title>Submit a Project</title>
  </head>
  <body>
    <?php include 'navbar.php'; ?>
    <?php include 'login.php'; ?>



    <!-- MAIN -->

    <div class="container-fluid">
      <div class="main">
        <h1 class="page-header">Main </h1>
        <div class="jumbotron">
          <div class="container">
            <pre>
              <?php print_r($_SESSION["patroninfo"]); ?>
            </pre>
          </div>
        </div>
      </div>
    </div>



  </body>
</html>
