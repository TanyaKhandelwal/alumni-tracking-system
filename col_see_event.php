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
    $res=mysqli_query($db,"select * from col_event where college='$b' ");
    if(mysqli_num_rows($res)){
        ?>
                       <table style="width:100%">
                       <tr>
                        <th>Event Date</th>
                       <th>Id</th>
                       <th>TITLE</th>
                       <th>DETAIL</th>
                       </tr>
           <?php
                       while($rec=mysqli_fetch_array($res)){
                        echo "<br>";
            ?>
                       <tr>
                       <td><?php echo $rec['on_d']; ?></td>
                       <td><?php echo $rec['id']; ?>  </td>
                       <td><?php echo $rec['sub'];  ?></td>
                       <td><?php echo $rec['detail']; ?></td>
                   </tr>
                      </table>
    <?php
         echo "<br><a href='col_event.php'>BACK</a>";
    }
    else{
        echo "NO EVENT FOUND";
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
    <form action="c_event2.php" method="POST">
    Event id:
    <input type="text" name="id" placeholder="Event id" required><br>
    <input type="submit" name="delete" value="DELETE">
    </form>
</body>
</html>

<?php
}
}
?>
