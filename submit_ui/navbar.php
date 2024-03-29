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
      <a class="navbar-brand"><script>document.write(document.title);</script></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION["patroninfo"])) { ?>
        <li class="active"><a href="#"><span class='glyphicon glyphicon-user'></span> <?=$_SESSION["patroninfo"]["firstname"]?> <?=$_SESSION["patroninfo"]["lastname"]?></a></li>
        <li><a href="#" id="logoutbtn"><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
        <li><a href="#"><span class='glyphicon glyphicon-info-sign'></span> Help</a></li>
        <?php } else { ?>
        <li><a href="http://library.lclark.edu/"><span class='glyphicon glyphicon-home'></span> Watzek Home</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
