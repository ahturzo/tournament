<?php
include 'server.php';

	$email = $pword = "";

	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		$email = $_POST['email'];
		$email = test_input($email);
		$pword = $_POST['password'];
		$pword = test_input($pword);
	}

	if ($db_found) 
	{
		$email = quote_smart($email, $db_handle);
		$pword = quote_smart($pword, $db_handle);

		$SQL = "SELECT * FROM admin WHERE (email = $email && password = $pword)";
		$result = mysqli_query($db_handle, $SQL);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows > 0) 
		{
			session_start();
			$_SESSION['login'] = $email;
			header('Location: testDB.php');
		}
		else
		{
			session_start();
			echo "<H1>Wrong Email Or Password.</H1>";
		}	
	}
	else 
	{
		echo "Error logging on";
	}



function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
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