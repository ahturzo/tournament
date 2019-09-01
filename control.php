<?php
session_start();
include 'server.php';
if(isset($_SESSION['login']) && !empty($_SESSION['login']))
{
    $log = "Logout";
  header('Location: index.php');
}
else
{
  $log ='Login';
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/slate/bootstrap.min.css">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container">
	<header class="display-3 text-center mt-4 mb-4">Login From Here</header>
	<form action="control_confirm.php" method="post" class="form mt-4" role="form">

    <div class="row">
        <div class="col-sm-3 col-form-label">
            <label class="h5">Email:</label>
        </div>
        <div class="col-sm-9">
            <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3 col-form-label">
            <label class="h5">Password:</label>
        </div>
        <div class="col-sm-9">
            <input type="password" class="form-control" placeholder="Enter password" name="password" required><br>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                <button class="btn btn-outline-success btn-lg" type="submit">Log In</button>
            </div>
        </div>
    </div>

</form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>