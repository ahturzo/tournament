<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Tournament</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="allmatch.php">Matches</a>
      </li>
    </ul>
    <?php if($log=="Logout"): ?>
      <a class="nav-link float-right" href="logout.php"><?= $log ?></a>
    <?php endif; ?>
    <?php if($log=="Login"): ?>
      <a class="nav-link float-right" href="control.php"><?= $log ?></a>
    <?php endif; ?>
  </div>
</nav>