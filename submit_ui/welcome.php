<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'header.php'; ?>
    <title>LC Senior Projects</title>
  </head>
  <body>
    <?php // $loggedIn = true; ?>
    <?php include 'navbar.php'; ?>
    <?php include 'login.php'; ?>

    <!-- MAIN -->

    <div class="container-fluid">
      <div class="main">

        <div id="all" class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2 class="role">Students</h2>
            <p>Submit a project for review and publishing.</p>
            <p><a data-role="student" class="btn btn-primary btn-sm" href="#" role="button" data-toggle='modal' data-target='#loginModal'>Log in &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2 class="role">Faculty</h2>
            <p>Review and approve or deny student projects.</p>
            <p><a data-role="faculty" class="btn btn-primary btn-sm" href="#" role="button" data-toggle='modal' data-target='#loginModal'>Log in &raquo;</a></p>
         </div>
          <div class="col-md-4">
            <h2 class="role">Staff</h2>
            <p>Manage the review and publishing process.</p>
            <p><a data-role="staff" class="btn btn-primary btn-sm" href="#" role="button" data-toggle='modal' data-target='#loginModal'>Log in &raquo;</a></p>
          </div>
        </div>
        </div>

          <!-- JUMBOTRON -->

          <!-- Main jumbotron for a primary marketing message or call to action -->
          <div class="jumbotron">
            <div class="container">
              <h1 class="display-3">Senior Projects at Lewis & Clark</h1>
              <p>A digital archive and showcase of senior theses, projects, and presentations by Lewis & Clark students.</p>
              <p><a id="go" class="btn btn-primary btn-lg" href="http://52.89.97.243" role="button">Visit the site &raquo;</a></p>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <a href="#" class="thumbnail"><img src="t1.jpg" /></a>
                </div>
                <div class="col-md-4 col-sm-6">
                  <a href="#" class="thumbnail"><img src="t2.jpg" /></a>
                </div>
                <div class="col-md-4 col-sm-6">
                  <a href="#" class="thumbnail"><img src="t3.jpg" /></a>
                </div>
            </div>
          </div>
          <hr>
          <footer class="footer">
            <p>&copy; LC Digital Initiatives 2016</p>
          </footer>
        </div>


      </div>
    </div>

  </body>
</html>
