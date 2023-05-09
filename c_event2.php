

<?php


session_start();
require "dbcon.php";


if(!isset($_SESSION['user'])){
    echo "YOU DON'T HAVE ACCESS TO THIS PAGE ";
    echo "<br> GO TO MAIN PAGE : <a href='index.php'>Home Page</a>";
    echo "<br>GO TO LOGIN PAGE : <a href='login.html'>Login Page</a>";
}
else{


if(isset($_POST['delete'])){
    $a=$_POST['id'];
    $res=mysqli_query($db,"select * from col_event where id='$a' ");
    if(mysqli_num_rows($res)){
        mysqli_query($db,"DELETE from col_event where id= '$a' ");
        echo "<script> alert('EVENT DELETED SUCCESSFULLY')</script>";
        header("Refresh:0.05; url= main2.php");
        // echo "<br><a href='notice.php'>BACK</a>";
    }
    else{
        echo "<script> alert('No such event found!')</script>";
        header("Refresh:0.05; url= c_event2.php");
    }
}
}
?>


<!DOCTYPE html>
<html>
<head>

    <style>
    body{
    	background-image: url("images/event-del.jpg");
    height:100%;
    width:100%;
    margin:0;
    padding:0;
    overflow:hidden;


}
p{
    font-size:20px;
}


.reg label{
        display: block;
        text-align: left;
        margin:0;
        padding: 0;
        font-weight:bold;
}
.reg input{
    width:100%;
    margin-bottom: 20px;

}
.reg input[type="text"]{
    border:none;
    border-bottom:1px solid #fff;
    background:transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.reg input{
    width:100%;
    margin-bottom: 20px;
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

    .reg{
    width:420px;
    height:300px;
    background:#000;
    color:#fff;
    top:48%;
    left:48%;
    position:absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
    border-radius:25px;
}
.reg p{
    margin:0;
    padding: 0;
    font-weight:bold;
}
.reg input[type="submit"]{
    border: none;
    outline:none;
    height:40px;
    margin-top:80px;
    background: #fb2525;
    color:#fff;
    font-size: 14px;
    border-radius: 20px;
}
.reg input[type="submit"]:hover{
    cursor: pointer;
    background: lightgreen;
    color: #000;
}


.regr{
    text-align:center;
    margin-left:50px;
    margin-right:50px;
}
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
</style>


<title>DELETE Event</title>
</head>
<body>
<a href="main2.php" style=" color:white; font-size:20px; align:center;"><button type="submit" name="back" class="btn">Back</a></button>


    <section>
    <div class="reg">

    <form action="c_event2.php" method="POST">
        <p>Event id:</p>
    <input type="text" name="id" placeholder="Event Id" required><br>
    <input type="submit" name="delete" value="DELETE">
</div>
    </form>
</section>
</body>
</html>
