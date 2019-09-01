<?php
include 'server.php';

session_start();
if(isset($_SESSION['login']) && !empty($_SESSION['login']))
{
  	$log = "Logout";
}
else
{
	$log= "Login";
}

if ($db_found) 
{
	$SQL = "SELECT * FROM matches";
	$result = mysqli_query($db_handle, $SQL);
}
else 
{
	print "Database NOT Found ";
}

mysqli_close($db_handle);

?>


<!DOCTYPE html>
<html>
<head>
	<title>All Matches</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/slate/bootstrap.min.css">
</head>
<body>
<?php include 'nav.php'; ?>
	<div class="container">
		<header class="display-4 text-center mt-4 mb-3">Winter Badminton Tournament 2018</header>
	</div>

	<div class="container">
		<div class="row table-responsive">
				<div class="col-lg-12">
					<h1 class="text-center mb-3" style="color: white;">All Matches-Round 1</h1>
					<table class="table table-striped table-dark table-hover text-center" style="margin-left: 10px;">
						<thead style="color: red;" class="font-weight-bold h6">
							<tr>
								<th scope="col">Match No.</th>
								<th scope="col">Team1</th>
								<th scope="col">Team2</th>
								<th scope="col">Result</th>
							</tr>
						</thead>
						<tbody>
							<?php if($result->num_rows > 0):
								$count = 1;
								while($db_field = $result->fetch_assoc()): ?>
							<tr>
								
								<td scope="row">Match<?= $count++ ?></td>
								<td scope="row"><?= $db_field['first_team'] ?></td>
								<td scope="row"><?= $db_field['second_team'] ?></td>
								<td scope="row"><?= $db_field['result'] ?></td>
							</tr>
							<?php endwhile; ?>
								<?php else: ?>
										<td class="h2" colspan="6">
											No Match found.
										</td>
										<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
	</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>