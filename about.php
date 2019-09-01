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

    if (isset($_GET['team'])) 
    {
        $teamno =  $_GET['team'];
    }
    $sql = "SELECT * FROM teams WHERE (id = $teamno)";
    $result = mysqli_query($db_handle, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Team <?php echo $teamno; ?></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/slate/bootstrap.min.css">
	<style type="text/css">
		.jumbotron
		{
			background-image: url('https://img01.siam2nite.com/r_88ST96taiCAKN82bu1iQ6QtjA=/smart/magazine/articles/775/cover_large_p1c93obh3m1en7t5jh00p78qb25.jpg');
			color:white;
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
			<header class="display-4 text-center mb-3">Winter Badminton Tournament 2018</header>
			<?php
				if($result->num_rows > 0):
					while($db_field = $result->fetch_assoc()): ?>
						<h1 class="text-center"><?php echo "Team".$db_field['id'];?></h1>
						<?php 
							$member1 = $db_field['member1']; 
							$member2 = $db_field['member2']; 
							$team_member = "'".$member1." , ".$member2."'"; ?>
						<h2 class="text-center"><?php echo "Member 1: ".$member1." | "." Member 2: ".$member2;?></h2>
						<h2 class="text-center"><?php echo "Played: ".$db_field['played']." | "." Won: ".$db_field['won']." | "." Lost: ".$db_field['lost'];?></h2>
						
						
						<h2 class="text-center"><?php echo "Point: ".$db_field['point']." | "." Netpoint: ".$db_field['netpoint'];?></h2>
						
					<?php endwhile; ?>
				<?php else: ?>
					<p class="h2">No Question found.</p>
				<?php endif; ?>	
				<?php 
					$SQL = "SELECT * FROM matches WHERE (first_team = $team_member || second_team = $team_member)";
					$result = mysqli_query($db_handle, $SQL);
					//$r = mysqli_num_rows($result);
					//echo $r;
					//echo (boolval($result) ? 'true' : 'false');
				?>
		</div>
	</div>

	<div class="container">
		<div class="row table-responsive">
				<div class="col-lg-12">
					<h1 class="text-center mb-3" style="color: white;">All Matches of Team - <?= $teamno ?></h1>
					<table class="table table-striped table-dark table-hover text-center mb-4" style="margin-left: 10px;">
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
	<br><br><br>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>