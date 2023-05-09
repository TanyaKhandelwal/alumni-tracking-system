<?php

session_start();
require "dbcon.php";

if(!isset($_SESSION['user'])){
    echo "YOU DON'T HAVE ACCESS TO THIS PAGE ";
    echo "<br> GO TO MAIN PAGE : <a href='index.php'>Home Page</a>";
    echo "<br>GO TO LOGIN PAGE : <a href='login.html'>Login Page</a>";
}
else{
  $a=$_SESSION['user'];
  $b=$_SESSION['id'];
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>MAIN PAGE</title>
<style>

body{
  overflow: hidden;
}
.bgimage{
    background-image:url("images/dir.jpg");
    height:102vh;

    background-position: center;
    background-size:cover;
    background-repeat: no-repeat;
}
.back{
    width:420px;
    height:500px;
    background:#000;
    color:#fff;
    top:50%;
    left: 50%;
    position:absolute;
    transform: translate(-50%,-50%);
    background: rgba(5, 5, 5, 0.438);
    box-sizing: border-box;
    padding: 70px 30px;
}
.cent{
    text-align: center;
    background: ghostwhite;
    margin:auto;
    margin-top: 3%;
    width:35%;
    /* height: 15%; */
    /* font-size: 1.5rem; */
    border-radius:25px;
    padding: 10px;
 }
 .dash{
    text-align:center;
    font-size:15px;
    width:450px;
    height:auto;
    background:#000;
    color:#fff;
    top:65vh;
    left: 50%;
    position:fixed;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
    border-radius:30px;
    }
    .btn{

        padding: 10px 20px;
        border: none;
        outline: none;
        font-family:"montserrat";
        border-radius: 20px;
        width: 200px;
    }
    .btn:hover{
        cursor: pointer;
        background:burlywood;
    }
    a:hover{
        cursor: pointer;
        background: greenyellow;
    }

</style>

    </head>
    <body class="bgimage">
    <div class="cent">
    <p><b>WELCOME DIRECTORATE</b></p>
    <a href="logout.php" ><img src="https://bit.ly/37TS5eS" height="16%" width="16%" style="border-radius:100%;"></a>
    </div>
    <div class="dash">
      <table align="center" style="width:50%;">
      <tr>
      <td >1.</td><td><button class="btn" onclick="window.location.href='add_college.php'">ADD COLLEGE</button><br></td>
  </tr>
      <tr>
      <td>2.</td><td><button class="btn" onclick="window.location.href='search.php'">SEARCH ALUMNI</button><br></td>
   </tr>
   <tr><td>3.</td><td><button class="btn" onclick="window.location.href='notice.php'">PUBLISH NOTICE</button><br></td></tr>
   <tr><td>4.</td><td><button class="btn" onclick="window.location.href='noticea.php'">VIEW NOTICE</button><br></td></tr>
   <tr><td>5.</td><td><button class="btn" onclick="window.location.href='c_notice.php'">DELETE NOTICE</button><br></td></tr>
   <tr><td>6.</td><td><button class="btn" onclick="window.location.href='event.php'">PUBLISH EVENT</button><br></td></tr>
   <tr><td>7.</td><td><button class="btn" onclick="window.location.href='dir_event.php'">VIEW EVENTS</button><br></td></tr>
   <tr><td>8.</td><td><button class="btn" onclick="window.location.href='c_event2.php'">DELETE EVENTS</button><br></td></tr>
   <tr><td>9.</td><td><button class="btn" onclick="window.location.href='email_alumni.html'">MAIL ALUMNI</button><br></td></tr>

  </div>
  </table>
    </body>
    </html>
<?php
    }

?>
