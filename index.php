<?PHP
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
	$SQL = "SELECT * FROM teams ORDER BY point DESC, netpoint DESC";
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
	<title>Tournament-2018</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/slate/bootstrap.min.css">
	<style type="text/css">
		.jumbotron
		{
			background-image: url('https://img01.siam2nite.com/r_88ST96taiCAKN82bu1iQ6QtjA=/smart/magazine/articles/775/cover_large_p1c93obh3m1en7t5jh00p78qb25.jpg');
		}
	</style>
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<header class="display-4 text-center mt-4 mb-3">Winter Badminton Tournament 2018</header>
	</div>

	<div class="container">
		<div class="jumbotron">
			<div class="row table-responsive">
				<div class="col-lg-12">
					<header class="display-4 text-center mb-3" style="color: white;">Teams Point Table</header>
					<h3 class="text-center mb-3" style="color: white;">Round 1</h3>
					<table class="table table-striped table-dark table-hover text-center" style="margin-left: 10px;">
						<thead style="color: red;" class="font-weight-bold h6">
							<tr>
								<th scope="col">Team No.</th>
								<th scope="col">Team Member1</th>
								<th scope="col">Team Member2</th>
								<th scope="col">Played</th>
								<th scope="col">Won</th>
								<th scope="col">Lost</th>
								<th scope="col">Point</th>
								<th scope="col">NetPoint</th>
							</tr>
						</thead>
						<tbody>
							<?php if($result->num_rows > 0):
									while($db_field = $result->fetch_assoc()  ): ?>
							<tr>
								<?php $teamno = $db_field['id']; ?>
								<td scope="row"><a href="about.php?team=<?php echo $teamno; ?>"><?= "Team".$teamno ?></a></td>
								<td scope="row"><?= $db_field['member1'] ?></td>
								<td scope="row"><?= $db_field['member2'] ?></td>
								<td scope="row"><?= $db_field['played'] ?></td>
								<td scope="row"><?= $db_field['won'] ?></td>
								<td scope="row"><?= $db_field['lost'] ?></td>
								<td scope="row"><?= $db_field['point'] ?></td>
								<td scope="row"><?= $db_field['netpoint'] ?></td>
							</tr>
							<?php endwhile; ?>
								<?php else: ?>
										<td class="h2" colspan="6">
											No Team found.
										</td>
										<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<?php
		if(isset($_SESSION['login']) && !empty($_SESSION['login'])): ?>
			<form method="post" action="match.php" class="mb-4">
				<h1 class="text-center">Match</h1><hr>
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group">
						    <select class="custom-select" name="first_team" required>
						      <option value="">Select a Team</option>
						      <option value="1">Team 1</option>
						      <option value="2">Team 2</option>
						      <option value="3">Team 3</option>
						      <option value="4">Team 4</option>
						      <option value="5">Team 5</option>
						      <option value="6">Team 6</option>
						      <option value="7">Team 7</option>
						      <option value="8">Team 8</option>
						      <option value="9">Team 9</option>
						    </select>
						</div>
					</div>
					<div class="col-sm-2 text-center">VS</div>
					<div class="col-sm-5">
						<div class="form-group">
						    <select class="custom-select" name="second_team" required>
						      <option value="">Select a Team</option>
						      <option value="1">Team 1</option>
						      <option value="2">Team 2</option>
						      <option value="3">Team 3</option>
						      <option value="4">Team 4</option>
						      <option value="5">Team 5</option>
						      <option value="6">Team 6</option>
						      <option value="7">Team 7</option>
						      <option value="8">Team 8</option>
						      <option value="9">Team 9</option>
						    </select>
						</div>
					</div>
				</div>
				<div class="row">
	              <div class="col-sm-12">
	                <div class="text-center">
	                  <button class="btn btn-outline-info btn-lg" type="submit">Enter</button>
	                </div>
	              </div>
            </div>
			</form>
		<?php endif; ?>
	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>