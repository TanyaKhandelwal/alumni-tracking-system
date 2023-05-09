<?php


session_start();
require "dbcon.php";


$rec="";
$temp=0;


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
        <title>SEARCH USER</title>
        <style>
            .btn{
   padding: 10px 20px;
   margin-top:10px;
   font-size:18px;
   text-decoration:underline;
   border: none;
   outline: none;
   color:white;
   border-radius: 20px;
   width: 90px;
   background:#fb2525;
   }
  .btn:hover{
   cursor: pointer;
   background:green;
  }

  .bg-image{
    background-image:url("images/colbg.jpg");
    background-size:200vw 200vh;
    background-position: center;
    background-repeat: no-repeat;}



  .reg{
      text-align: center;
      background: ghostwhite;
      border:4 px solid;
      margin:0px auto;
      margin-top: 5px;
      width:700px;
      font-size: 20px;
      border-radius:30px;
   }

   form{
      width: 30%;
      margin: 0px auto;
      padding: 30px;
      background-color: transparent;
  }
  .lab{
          display: block;
          text-align: left;
          margin:0;
          padding: 0;
          font-weight:bold;
  }
   input{
      width:100%;
      margin-bottom: 15px;
  }
   input[type="text"]{
      border:none;
      border-bottom:1px solid gray;
      background:transparent;
      outline:none ;
      height: 27px;
      color:gray;
      font-size: 14px;
  }
   input[type="submit"]{
      border: none;
      outline:none;
      height:35px;
      background: #fb2525;
      color:#fff;
      font-size: 16px;
      border-radius: 20px;
  }
  input[type="submit"]:hover{
      cursor: pointer;
      background: #a69c97;
      color: #000;
  }
  	.h2{
  		text-align:center;
  	}
  	.fm{
  		width:600px;
  		box-shadow:0 0 3px rgba(0,0,0,0.3);
          background:#fff;
          padding:20px;

  		text-align:center;
      }
      .btn{
     padding: 10px 20px;
     border: none;
     outline: none;
     font-family:"montserrat";
     border-radius: 20px;
     width: 150px;
     background:gray;
     }
    .btn:hover{
     cursor: pointer;
     background: #fb2525;
     color:white;
    }
   .tale{
     margin-top:2%;
     margin-left: 20%;
     width:200px;
       box-shadow: 0 10px 100px rgba(0,0,0,0.3);

   }


    .tab{
  	border-collapse:collapse;

      margin-right:200px;
      margin-top: 5px;
  	font-size:0.5cm;
      max-width:400px;
      top:70%;
      left:50%;
      background-color: white;border:1px solid lightgray;
  }
  .tat{
  	background-color:#009879;
  	color:#ffffff;
  	text-align:left;
  	font-weight:bold;
  }
  .tab th,.tab td{
      padding: 12px 15px;
      border:1px solid lightgray;

  }
  .tab tr{
  	border-bottom:1px solid #dddddd;
  }


            </style>
    </head>
    <body class="bg-image">
    <a href="main2.php" style=" color:white; font-size:20px; align:center;"><button type="submit" name="back" class="btn">Back</a></button>
        <button onclick="header("Refresh:0.05; url= search.php"); "class="btn">Reset </button>
        <div class="reg" style="margin-top:0px;">
        <form action="search.php" method="POST">
          <div class="k">
          <div class="lab">Enter College name</div>
          <input type="text"  name="colname" placeholder="College Name">
          <input type="submit" name="sub0" value="SEARCH"><br><br>
        </div>
            <div class="k">
            <div class="lab">Enter Roll number</div>
            <input type="text"  name="rno" placeholder="Roll Number">
            <input type="submit" name="sub1" value="SEARCH"><br><br>
          </div>
            <div class="kl">
            <div class="lab">Enter Name</div>
            <input type="text"  name="name" placeholder="Name or some alphabets of name">
            <input type="submit" name="sub2" value="SEARCH"><br><br>
            </div>
            <div class="km">
            <div class="lab">Enter Year</div>
            <input type="text"  name="year" placeholder="Passing Year">
            <input type="submit" name="sub3" value="SEARCH">
            </div>

        </form>
        </div>
    </body>
    </html>
<?php
if(isset($_POST['sub0'])){
    $r=$_POST['colname'];
    $sql="SELECT * from alumni where college LIKE '%$r%' and verified=1";
    $rec=mysqli_query($db,$sql);
    $temp=1;
}

    if(isset($_POST['sub1'])){
        $r=$_POST['rno'];
        $sql="SELECT * from alumni where rno LIKE '%$r%' and verified=1";
        $rec=mysqli_query($db,$sql);
        $temp=1;
    }
    if(isset($_POST['sub2'])){
        $r=$_POST['name'];
        $sql="SELECT * from alumni where name LIKE '%$r%' and verified=1";
        $rec=mysqli_query($db,$sql);
        $temp=1;
    }
    if(isset($_POST['sub3'])){
        $r=$_POST['year'];
        $sql="SELECT * from alumni where Year(year) = $r and verified=1";
        $rec=mysqli_query($db,$sql);
        $temp=1;
    }
        if($rec){
            ?>
            <div class="tale" align="center;">
            <table class="tab" align:"center";>
                <Tr class="tat">
                    <th>NAME</th>
                    <th>ROLL NO</th>
                    <th>USER ID</th>
                    <th>CONTACT</th>
                    <th>EMAIL</th>
                    <th>COLLEGE</th>
                    <th>YEAR</th>
                </Tr>

                    <?php

            while($row=mysqli_fetch_assoc($rec))
            {

            echo "<Tr>";

            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['rno']."</td>";
             echo "<td>".$row['alumni_id']."</td>";
            echo "<td>".$row['mobile']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['college']."</td>";
            echo "<td>".$row['year']."</td>";
            echo "</Tr>";


            }
                    ?>

            </table>
        </div>
      <?php
           }

        }


?>
<?php


?>
