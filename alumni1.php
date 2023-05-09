<?php
session_start();
require "dbcon.php";
if(isset($_POST['login'])){
    $a=$_POST['user'];
    $b=$_POST['password'];
    $c=md5($b);
    $sql="SELECT * FROM alumni where alumni_id='$a'";
    $rec=mysqli_query($db,$sql);
    if(mysqli_num_rows($rec)){
        $sql1="SELECT * FROM alumni where alumni_id='$a'and password='$c' and verified=1";
        $rec1=mysqli_query($db,$sql1);

        if(mysqli_num_rows($rec1)){
        $_SESSION['user']=$a;
        header("location: main.php");
        }
        else{
        echo"<script> alert('Login Failed..') </script>";
        header("Refresh:0.5; url=alumni1.php");
        }
    }
    else{
        echo"<script> alert('User id not exists') </script>";
        header("Refresh:0.5; url=alumni1.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN PAGE</title>
        <link rel="stylesheet"  type="text/css" href="design_alumni.css">
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
                <form action="alumni1.php" method="POST">
                    <p><b>USER ID</b></p><br>
                    <input type="text" name="user" required><br><br>
                    <p></p><b>PASSWORD</b></p>  <br>
                    <input type="password" name="password" id="pass" required>
                    <table>
                    <tr>
                    <td><input type="checkbox" onclick="myFunction()"></td>
                    <td>Show password</td></tr></table>
                    <h4>Don't have an account? Want to signup <a href='signup.php'>Sign Up</a></h4>
                    <input type="submit" name="login" value="LOGIN">
                    <input type="button" name="login"value="BACK" onclick="window.location.href='login.html' ;" />

                </form>
        </div>
        </div>
    </body>
</html>
