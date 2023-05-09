<?php
session_start();
require "dbcon.php";

if(isset($_POST['login'])){

    $a=$_POST['user'];
    $b=$_POST['password'];
    $c=md5($b);

    $sql=" SELECT * FROM collegelogin where id = '$a' and pass = '$c' and flag='C'";
    $r=mysqli_query($db,$sql);

    if(mysqli_num_rows($r)){
        $res=mysqli_fetch_array($r);

        $_SESSION['user']=$res['college_name'];
        $_SESSION['id']=$a;
        header("location: main3.php");
    }
    else{
        echo"<script> alert('INCORRECT CREDENTIALS') </script>";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN PAGE</title>

<style>
body{
  overflow: hidden;
}
.bgimage{
    background-image:url("images/college-bg.jpg");
    margin-top:-0.7%;
    margin-left:-0.5%;
    height:102vh;
    width:100vw;
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

h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}
.back p{
    margin:0;
    padding: 0;
    font-weight:bold;
}
.back input{
    width:100%;
    margin-bottom: 20px;
}
.back input[type="text"], input[type="password"]{
    border:none;
    border-bottom:1px solid rgb(189, 176, 176);
    background:transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.back input[type="submit"]{
    border: none;
    outline:none;
    height:40px;
    background: #fb2525;
    color:#fff;
    font-size: 18px;
    border-radius: 20px;
    width: 150px;
    margin: 3% 2%;
}
.back input[type="submit"]:hover{
    cursor: pointer;
    background: burlywood;
    color: #000;
}

.back input[type="button"]{
    border: none;
    outline:none;
    height:40px;
    background: #fb2525;
    color:#fff;
    font-size: 18px;
    border-radius: 20px;
    width: 150px;
    margin: 3% 2%;
}
.back input[type="button"]:hover{
    cursor: pointer;
    background: burlywood;
    color: #000;
}


.back input[type=checkbox]+ label:before{
    /* margin-right:10px; */
    border:0.1cm solid #000;
    border-radius:1cm;
}
.cent{
    text-align: center;
    background: ghostwhite;
    border:4 px solid;
    margin-top:45px;
    margin-left: 480px;
    width:35%;
    height: 15%;
    font-size: 20px;
    border-radius:25px;
    padding: 20px 20px;
 }
 .dash{
    text-align:center;
    font-size:15px;
    width:490px;
    height:350px;
    background:#000;
    color:#fff;
    top:60%;
    left: 50%;
    position:absolute;
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
        <link rel="stylesheet" href="css/animate.css">
        <script>
            function myFunction() {
              var x = document.getElementById("pass");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
            </script>
    </head>
    <body>
      <div class="bgimage">
        <div class="back">
               <h1>Login Here</h1>
                <form action="college1.php" method="POST">
                    <p><b>REGISTERED ID</b></p><br>
                    <input type="text" name="user" required><br><br>
                    <p></p><b>PASSWORD</b></p>  <br>
                    <input type="password" name="password" id="pass" required><br />
                    <table>
                    <tr>
                    <td><input type="checkbox" onclick="myFunction()"></td>
                    <td>Show password</td>
                  </tr></table><br><br>
                    <input type="submit" name="login" value="LOGIN">
                    <input type="button" name="login"value="BACK" onclick="window.location.href='login.html' ;" />
                </form>
        </div>
        </div>

        <script src="js/wow.min.js"></script>
        <script>
        new WOW().init();
        </script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
