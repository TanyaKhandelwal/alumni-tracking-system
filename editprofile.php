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
<title>Edit Alumni Details</title>
<style>
body{

  margin:0;
}
    #c{
        padding: 3%;
        margin-left:10%;
    }

    .er{
    float: left;
}
    input[type=button],button{
    border-radius: 5px;
    width: 150px;
    background-color: darkgreen;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    cursor: pointer;

}
input[type=submit],button{
    border-radius: 5px;
    width: 80px;
    background-color: darkgreen;
    color: white;
    padding: 14px 20px;
    margin: auto;
    cursor: pointer;

}
input[type=text], input[type=email], input[type=date]{
    margin-right:16%;
    float: right;
    width:150px;
}
select{
  margin-right:17%;
  float: right;
  width:150px;
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
.bv{
    background-image: url("images/editprofilebg.jpg");
    background-size: cover;
    width: 100vw;
    height: 100vh;

}
.kk{
  top:50%;
  left: 50%;
  position:absolute;
  transform: translate(-50%,-50%);
    background: aliceblue;
    opacity: 0.8;
    width: 600px;
    height: auto;
    border-radius: 10%;
}

</style>
<link rel="stylesheet" href="css/animate.css">
</head>
<body>
    <div class="bv">
<div class="er">
                <input type="button" value="BACK" onclick="window.location.href='main.php' ;" >
                    </div>
    <div class="kk">
    <?php

    if (DATE("Y-m-d") < $year) {
        $yErr = "Passing date is not valid";
        $temp = 1;
    }

    $a=$_SESSION['user'];
    $res=mysqli_query($db,"SELECT * from alumni where alumni_id='$a' ");
    if(mysqli_num_rows($res)){
        $rec=mysqli_fetch_array($res);
        $_SESSION['x']=$rec['verified'];
        $_SESSION['r']=$rec['rno'];
         echo "<br><br>";
    ?>
        <h2 align='center'> <?php echo $a.'<br /> Edit Profile Here'; ?></h2>
        <div id="c">
         <form action='editprofile1.php' method="POST">
           <b>NAME:</b>
           <input type="text" name="name" value="<?php echo $rec['name']; ?>"><br><br>
        <b>COLLEGE:</b>
        <select name="college">
             <option value='select'>---SELECT---</option>
            <?php
                 $query="SELECT college_name FROM collegelogin order by college_name";
                 $result=mysqli_query($db,$query);
                 while ($row=mysqli_fetch_array($result)){
                 $coll=$row['college_name'];
                 echo "<option value='".$coll."'>".$coll."</option>";
                 }
            ?>
         </select><br><br>
        <b>ROLL NUMBER:</b>
        <input type="text" name='rno' value= "<?php echo $rec['rno']; ?>"><br><br>
        <b>PASSING DATE:</b>
          <input type="date" name="passyear" placeholder="passing date"  required><?php echo $yErr; ?><br><br>



        <b>CONTACT:</b>
        <input type="text" name="mob" value="<?php echo $rec['mobile']; ?>"><br><br>
        <b>EMAIL:</b>
        <input type="email" name="email" value="<?php echo $rec['email']; ?>"><br><br>
        <b>PRESENT WORK STATUS:</b>
            <select name="work">
                <option value='select'>---SELECT---</option>
                <option value="Studies">Higher Studies</option>
                <option value="Startup">Start up</option>
                <option value="Job">Job</option>
            </select><br><br>
        <b>DESCRIPTION OF WORK STATUS:</b>
        <textarea name="about"><?php echo $rec['des']; ?></textarea><br><br>
         <br>
       <div class='c'>
         <input type="submit" value="SAVE" name="subm">
       </div>
        </form>
        </div>
        </div>
    <?php
        }
    }

    ?>
    </div>
<script src="js/wow.min.js"></script>
        <script>
        new WOW().init();
        </script>
</body>
</html>
