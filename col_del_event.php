<?php

session_start();

require "dbcon.php";
$b=$_SESSION['user'];

if(!isset($_SESSION['user'])){
    echo "YOU DON'T HAVE ACCESS TO THIS PAGE ";
    echo "<br> GO TO MAIN PAGE : <a href='index.php'>Home Page</a>";
    echo "<br>GO TO LOGIN PAGE : <a href='login.html'>Login Page</a>";
}
else{
    $a=$_POST['id'];
    $res=mysqli_query($db,"select * from col_event where id='$a' and college='$b' ");
    if(mysqli_num_rows($res)){
        $r = mysqli_fetch_array($res);
        if(date("Y-m-d")<$r['event_date']){
             mysqli_query($db,"DELETE from col_event where id= '$a' ");
            echo "Event DELETED SUCCESSFULLY";
            echo "<br><a href='col_event.php'>BACK</a>";
        }
        else{
            echo "No need to delete this event as it had been done.";
            echo "<br><a href='col_event.php'>BACK</a>";
        }
    }
    else{
        echo "NO SUCH EVENT FOUND BY YOUR COLLEGE";
        echo "<br><a href='col_event.php'>BACK</a>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>DELETE Event</title>
</head>
<body>
    <form action="col_del_event.php" method="POST">
    Event id:
    <input type="text" name="id" placeholder="Event id" required><br>
    <input type="submit" name="delete" value="DELETE">
    </form>
</body>
</html>
