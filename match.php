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

$Invalid = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		$first_team = $_POST['first_team'];
		$second_team = $_POST['second_team'];
	}

	if($first_team == $second_team)
	{
		$Invalid = "Invalid Team Selection.";
	}
	else
	{
		$sql1 = "SELECT * FROM teams WHERE (id = $first_team)";
		$result1 = mysqli_query($db_handle, $sql1);
		$db_field1 = mysqli_fetch_assoc($result1);
		$team1 = $db_field1['member1']." , ".$db_field1['member2'];
		$team1 = quote_smart($team1, $db_handle);

		$sql2 = "SELECT * FROM teams WHERE (id = $second_team)";
		$result2 = mysqli_query($db_handle, $sql2);
		$db_field2 = mysqli_fetch_assoc($result2);
		$team2 = $db_field2['member1']." , ".$db_field2['member2'];
		$team2 = quote_smart($team2, $db_handle);

		$SQL1 = "SELECT * FROM matches WHERE ((first_team=$team1 && second_team=$team2) || (first_team=$team2 && second_team=$team1))";
		$result1 = $result = mysqli_query($db_handle, $SQL1);
		//echo (boolval($result1) ? 'true' : 'false');
		$num_rows = mysqli_num_rows($result1);
		//echo $num_rows;
		/*if($num_rows>0)
		{
			echo "<h1>This Two team already played once.</h1>";
		}
		else
		{

		}*/
	}

function quote_smart($value, $handle) 
{
   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }
   if (!is_numeric($value)) {
       $value = "'" . mysqli_real_escape_string($handle,$value) . "'";
   }
   return $value;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Match point</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/slate/bootstrap.min.css">
</head>
<body>
	<?php include 'nav.php';?>
	<div class="container">
		<h1 class="display-4 text-center mt-4 mb-4" style="color: white;">Input match point</h1><hr>
		

		<?php if ($Invalid != ""): ?>
			<?php echo '<h1 class="display-4 text-center" style="color: red;"><?= $Invalid ?></h1>';?>
			<h1 class="display-4 text-center" style="color: red;"><?= $Invalid ?></h1>
		<?php else: ?>
			<?php if ($num_rows>0): ?>
				<?php echo '<h1 class="display-4 text-center" style="color: red;">This Two team already played once.</h1>'; ?>
			<?php else: ?>
				<form action="matchconfirm.php" method="post">

					<div class="row mt-4">

						<div class="col-sm-12 col-md-5 h5">
							<?php echo "Team".$first_team." ( ". $team1." )"; ?>
							<input class="float-right" type="number" name="first_team_point" max="15" min="0">
							
						</div>

						<div class="col-sm-12 col-md-2 text-center">
							<h4 style="color: red;">VS</h4>
						</div>

						<div class="col-sm-12 col-md-5 h5">
							<?php echo "Team".$second_team." ( ". $team2." )"; ?>
							<input class="float-right" type="number" name="second_team_point" max="15" min="0">
							
						</div>

					</div><br>

					<div class="row">
					    <div class="col-sm-12">
					        <div class="text-center">
					            <button class="btn btn-outline-success btn-lg" type="submit">Update</button>
					        </div>
					    </div>
					</div>
					<input type="hidden" name="first_team_no" value="<?= $first_team ?>">
					<input type="hidden" name="second_team_no" value="<?= $second_team ?>">
				</form>
			<?php endif; ?>
		<?php endif; ?>

	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>