<?PHP
session_start();
include 'server.php';
if(isset($_SESSION['login']) && !empty($_SESSION['login']))
{
  header('Location: index.php');
}
else
{
  $log =NULL;
  echo "string";
}




mysqli_close($db_handle);

?>