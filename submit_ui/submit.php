<?php session_start(); ?>
<?php if (!isset($_SESSION["patroninfo"])) header('Location: welcome.php'); ?>
<?php $_SESSION["patroninfo"]["stage"]["submit-1"]; ?>
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
        <!--<h1 class="page-header">Main </h1>-->
        <ol class="breadcrumb page-header" id="progress-crumbs">
          <li class="active">Personal Info</li>
          <li><a href="#">Item Metadata</a></li>
          <li><a href="#">Upload Item</a></li>
          <li><a href="#">File Metadata</a></li>
          <li><a href="#">Upload File</a></li>
          <li><a href="#">Review & Submit</a></li>
        </ol>

        <div class="container" id="progress-bar">
          <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
              <span class="sr-only">40% Complete (success)</span>
            </div>
          </div>
        </div>

        <div class="container form-container">
          <form>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="firstname">First name</label>
                  <input type="text" class="form-control" id="firstname" value="<?=$_SESSION["patroninfo"]["firstname"]?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="lastname">Last name</label>
                  <input type="text" class="form-control" id="lastname" value="<?=$_SESSION["patroninfo"]["lastname"]?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" value="<?=$_SESSION["patroninfo"]["email"]?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="byear">Email</label>
                  <input type="year" class="form-control" id="byear" value="<?=$_SESSION["patroninfo"]["email"]?>">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="major" class="control-label">Major</label>
              <select class="form-control" id="major">
                <option value="" selected>Select Department</option>
                <option value="AES" >AES</option>
                <option value="Art" >Art</option>
                <option value="Biochemistry" >Biochemistry</option>
                <option value="Biology" >Biology</option>
                <option value="Chemistry" >Chemistry</option>
                <option value="Chinese" >Chinese</option>
                <option value="Classics" >Classics</option>
                <option value="Communications" >Communications</option>
                <option value="Computer Science" >Computer Science</option>
                <option value="East Asian Studies" >East Asian Studies</option>
                <option value="Economics" >Economics</option>
                <option value="Education" >Education</option>
                <option value="English" >English</option>
                <option value="Environmental Studies" >Environmental Studies</option>
                <option value="Foreign Languages" >Foreign Languages</option>
                <option value="French" >French</option>
                <option value="Gender Studies" >Gender Studies</option>
                <option value="Geology" >Geology</option>
                <option value="German" >German</option>
                <option value="Greek" >Greek</option>
                <option value="History" >History</option>
                <option value="International Affairs" >International Affairs</option>
                <option value="Japanese" >Japanese</option>
                <option value="Latin" >Latin</option>
                <option value="Math" >Math</option>
                <option value="Music" >Music</option>
                <option value="Philosophy" >Philosophy</option>
                <option value="Physics" >Physics</option>
                <option value="Political Science" >Political Science</option>
                <option value="Psychology" >Psychology</option>
                <option value="Religious Studies" >Religious Studies</option>
                <option value="Russian" >Russian</option>
                <option value="Sociology / Anthropology" >Sociology / Anthropology</option>
                <option value="Spanish" >Spanish</option>
                <option value="Theatre" >Theatre</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <input type="file" id="exampleInputFile">
              <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Check me out
              </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
    </div>



  </body>
</html>
