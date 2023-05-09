<?php

session_start();
require "dbcon.php";

if(!isset($_SESSION['user'])){
    echo "YOU DON'T HAVE ACCESS TO THIS PAGE ";
    echo "<br> GO TO MAIN PAGE : <a href='index.php'>Home Page</a>";
    echo "<br>GO TO LOGIN PAGE : <a href='login.html'>Login Page</a>";
}
else{
?>
<!DOCTYPE html>
<html>
<head>
<title> Events</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">
<style>
    .qwe{
        background-image: url("images/party-bg.jpg");
        background-size: cover;
        width: 100%;
        height: 100vh;
    }
    .akg{
    float:left;
    padding: 20px;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    animation-delay: 2s;
    animation-iteration-count: 1;
}
.aa{
    font-size: 25px;
}
.er input[type=button]{
border-radius: 5px;
width: 150px;
background-color: darkgreen;
color: white;
padding: 14px 20px;
margin: 8px 0;
cursor: pointer;

}
.er{
  float:left;
}

table{
  margin:auto;
}
h3{
  margin-left: 35%;
}
.heading{
  margin-left:40%;
}
.tab th,.tab td{
    padding: 10px 13px;
    border:1px solid;
}
.tab tr{
  border-bottom:1px solid #dddddd;
}
.text{
  /* text-align: center; */
  margin-left:45%;
}
</style>
</head>
<body>
    <div class="qwe">

    <div class="er">
                <input type="button" value="BACK" onclick="window.location.href='main2.php' ;" >
                    </div>
                    <div class="tre">
    <h1 class="text text-white">EVENTS</h1>
    <?php
    $d=date('Y-m-d');
    $res=mysqli_query($db,"SELECT * from col_event ");
    echo "<br><br><br>";
    echo '<h3 class="heading text-white">Events by Directorate</h3>';
    if(mysqli_num_rows($res)){
    ?>
                       <table class="tab">
                       <tr>
                        <th class="text-white aa">Event Date</th>
                       <th class="text-white aa">TITLE</th>
                       <th class="text-white aa">DETAIL</th>
                       <th class="text-white aa">FILE NAME</th>
                       </tr>
     <?php

                while($rec=mysqli_fetch_array($res)){

                 if($rec['on_d']>=$d){
                   echo "<tr>";
                   echo "<td class='text-white'>".$rec['on_d']."</td>";
                   echo "<td class='text-white'>".$rec['sub']."</td>";
                   echo "<td class='text-white'>".$rec['detail']."</td>";
                   if( $rec['filename']!=''){?>
                       <td><a href="eventfile/<?php echo "<td class='text-white'>".$rec['filename']; ?>" target="_blank"><input type="button" value="Open File" /></a></td>
                   <?php   }
                   echo "</tr>";
?>

    <?php
                 }
        }?>
        </table>
        <?php
    }
    else{
        echo "NO EVENT FOUND";
    }

}
    ?>
    </div>
</div>
    <script src="js/wow.min.js"></script>
        <script>
        new WOW().init();
        </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
