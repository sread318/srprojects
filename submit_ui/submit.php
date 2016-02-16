<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LC Senior Projects</title>
    <!-- Bootstrap CDN imports -->
    <!-- JQuery (required for bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Style for this page -->
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Submit a Project</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"> <span class='glyphicon glyphicon-console'></span> Log Out</a></li>
            <li><a href="#"> <span class='glyphicon glyphicon-info-sign'></span> Help</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- MAIN -->

    <div class="container-fluid">
      <div class="main">
        <h1 class="page-header">Main </h1>

        <?php
        /*
        //enable debug
        ini_set('display_errors', 'On');
        //create PDO, and run a SELECT * FROM query
        try {
          $db = new PDO('mysql:host=localhost;dbname=primo_databases','primodb','primodb');
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e){
          $text = $e->getMessage();
          echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span><span class='sr-only'>Error: </span> ".$text."</div>";
          die();
        }
        try {
          $query = $db->query('SELECT * FROM dbs');
        } catch (Exception $e){
          $text = $e->getMessage();
          echo "<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span><span class='sr-only'>Error: </span> ".$text."</div>";
          die();
        }
        */
        ?>

        <!-- TABLE -->
        <div class="table-responsive">
          <?php
          /*
            $dbs = $query->fetchAll(PDO::FETCH_ASSOC);
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th></th><th></th><th>Database</th><th>URL</th></tr></thead>";
            foreach ($dbs as $db){
              echo "<tr>";
              echo "<td><a href='#'><span class='glyphicon glyphicon-remove' style='color:red' data-toggle='modal' data-target='#delModal' data-id='".$db['id']."' data-name='".$db['db_name']."' data-url='".$db['url']."'></span></a></td>";
              echo "<td><a href='#'><span class='glyphicon glyphicon-pencil' style='color:black' data-toggle='modal' data-target='#editModal' data-id='".$db['id']."' data-name='".$db['db_name']."' data-url='".$db['url']."'></span></a></td>";
              echo "<td>".$db['db_name']."</td>";
              echo "<td>".$db['url']."</td>";
              echo "</tr>";
            }
            echo "</table>";
            */
          ?>
        </div>
      </div>
    </div>

    <!-- MODALS -->

    <!-- Edit -->
    <!--
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Editing Database</h4>
          </div>
          <div class="modal-body">
            <form>
            <div class="form-group">
              <label for="db-name" class="control-label">Name:</label>
              <input type="text" class="form-control" id="db-name-edit">
            </div>
            <div class="db-url">
              <label for="message-text" class="control-label">URL:</label>
              <textarea class="form-control" id="db-url-edit"></textarea>
            </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="editbtn">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    -->

  </body>
</html>
