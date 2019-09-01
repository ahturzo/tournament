<?php
if ($db_found) 
    {
    $SQL = "SELECT * FROM teams";
    $result = mysqli_query($db_handle, $SQL);

    while($row = $result->fetch_assoc()) {
        echo $row['id']."->";
        echo $row['member1']."->".$row['member2']."<BR>";
        /*echo $row['email']."<BR>";
        echo $row['password']."<BR>";
        echo $row['phone_number']."<BR>";
        echo $row['birthday']."<BR>";
        echo $row['join_date']."<BR>";
        echo $row['gender']."<BR>";
        echo $row['profession']."<BR>";*/
      }
    }
    else 
    {
        print "Database NOT Found ";
    }
?>