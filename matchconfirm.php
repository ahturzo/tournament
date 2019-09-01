<?php

include 'server.php';
$point = 2;
$netpoint = 0;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		$first_team_no = $_POST['first_team_no'];
		$second_team_no = $_POST['second_team_no'];

		$first_team_point = $_POST['first_team_point'];
		$second_team_point = $_POST['second_team_point'];

		$query1 = "SELECT * FROM teams WHERE (id = $first_team_no)";
		$query1Result = mysqli_query($db_handle, $query1);
		$membersTEAM1 = mysqli_fetch_assoc($query1Result);
		$first_team = $membersTEAM1['member1']." , ".$membersTEAM1['member2'];
		$first_team_name = quote_smart($first_team, $db_handle);
		//echo $first_team."<br>";

		$query2 = "SELECT * FROM teams WHERE (id = $second_team_no)";
		$query2Result = mysqli_query($db_handle, $query2);
		$membersTEAM2 = mysqli_fetch_assoc($query2Result);
		$second_team = $membersTEAM2['member1']." , ".$membersTEAM2['member2'];
		$second_team_name = quote_smart($second_team, $db_handle);
		//echo $second_team."<br>";

		
		if($first_team_point > $second_team_point)
		{
			$matchResult = $first_team." Win by ".$first_team_point." - ".$second_team_point;
			$matchResult = quote_smart($matchResult, $db_handle);
			echo $matchResult;

			$SQL = "INSERT INTO matches (first_team, second_team,result) VALUES ($first_team_name, $second_team_name, $matchResult)";
			$result = mysqli_query($db_handle, $SQL);
			//echo (boolval($result) ? 'true' : 'false');
			
			if($second_team_point<3)
			{
				$netpoint =$first_team_point - $second_team_point;
				$netpoint = ($netpoint/10)+0.5;
				//echo $netpoint;
			}
			else
			{
				$netpoint =$first_team_point - $second_team_point;
				$netpoint = $netpoint/10;
				//echo $netpoint;
			}
			$calculate = calculate_result($first_team_no,$second_team_no,$point,$netpoint);
		}
		else
		{
			$matchResult = $second_team." Win by ".$second_team_point." - ".$first_team_point;
			$matchResult = quote_smart($matchResult, $db_handle);
			echo $matchResult."<br>";
			$SQL = "INSERT INTO matches (first_team, second_team,result) VALUES ($second_team_name, $first_team_name, $matchResult)";
			$result = mysqli_query($db_handle, $SQL);
			//echo (boolval($result) ? 'true' : 'false');

			if($first_team_point<3)
			{
				$netpoint =$second_team_point - $first_team_point;
				$netpoint = ($netpoint/10)+0.5;
				//echo $netpoint;
			}
			else
			{
				$netpoint =$second_team_point - $first_team_point;
				$netpoint = $netpoint/10;
				//echo $netpoint;
			}

			$calculate = calculate_result($second_team_no,$first_team_no,$point,$netpoint);
		}
		echo "<br>".$first_team." -> ".$first_team_point."<br>".$second_team." -> ".$second_team_point;
	}

function calculate_result($wonTEAM,$loseTEAM,$point,$netPoint)
{
	include 'server.php';
	$winSQLPULL = "SELECT * FROM teams WHERE (id = $wonTEAM)";
	$wonpull = mysqli_query($db_handle, $winSQLPULL);
	//echo (boolval($wonpull) ? 'true' : 'false');
	$wonpullPoint = mysqli_fetch_assoc($wonpull);

	//$wonTotalPoint = $wonpullPoint['point'];
	$wonTotalPoint = $wonpullPoint['point']+2;
	echo "<br>totalpoint".$wonTotalPoint."<br>";

	//$wonNetPoint = $wonpullPoint['netpoint'];
	$wonNetPoint = $wonpullPoint['netpoint']+$netPoint;
	echo "netpoint".$wonNetPoint."<br>";

	$wonPlayed = $wonpullPoint['played']+1;
	echo "played".$wonPlayed."<br>";

	$wonWon = $wonpullPoint['won']+1;
	echo "won".$wonWon."<br>";

	$wonPush = "UPDATE teams SET played=$wonPlayed, won=$wonWon, point=$wonTotalPoint, netpoint=$wonNetPoint WHERE id=$wonTEAM";
	$wonPushResult = mysqli_query($db_handle, $wonPush);
	echo (boolval($wonPushResult) ? 'true' : 'false');

	echo $wonTEAM."<br><br><br>";


	$loseSQLPULL = "SELECT * FROM teams WHERE (id = $loseTEAM)";
	$losepull = mysqli_query($db_handle, $loseSQLPULL);
	//echo (boolval($wonpull) ? 'true' : 'false');
	$losepullPoint = mysqli_fetch_assoc($losepull);

	//$wonNetPoint = $wonpullPoint['netpoint'];
	$loseNetPoint = $losepullPoint['netpoint']-$netPoint;
	echo "netPoint".$loseNetPoint."<br>";

	$losePlayed = $losepullPoint['played']+1;
	echo "played".$losePlayed."<br>";

	$loseLose = $losepullPoint['lost']+1;
	echo "lost".$loseLose."<br>";

	$losePush = "UPDATE teams SET played=$losePlayed, lost=$loseLose, netpoint=$loseNetPoint WHERE id=$loseTEAM";
	$losePushResult = mysqli_query($db_handle, $losePush);
	echo (boolval($losePushResult) ? 'true' : 'false');

	echo $loseTEAM."<br><br><br>";

	header('Location: index.php');
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