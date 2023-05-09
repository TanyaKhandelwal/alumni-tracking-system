<?php
session_start();
require "dbcon.php";

$cErr = "";

if(!isset($_SESSION['user'])){
    echo "YOU DON'T HAVE ACCESS TO THIS PAGE ";
    echo "<br> GO TO MAIN PAGE : <a href='index.php'>Home Page</a>";
    echo "<br>GO TO LOGIN PAGE : <a href='login.html'>Login Page</a>";
}
else{
    if(isset($_POST['sub'])){
        $id=$_POST['c_id'];
        $name=$_POST['c_name'];
        $pass=$_POST['pass'];
        $cry=md5($pass);
        $sql="SELECT * from collegelogin where id='$id' ";
        $rec=mysqli_query($db,$sql);
        if(!mysqli_num_rows($rec)){
            $sql1="INSERT INTO collegelogin VALUES ('$id','$name','$cry','C') ";
            $rec1=mysqli_query($db,$sql1);
            $err="<font color='green'>College added Successfully</font>";
        }
        else{
            $cErr="College id exists";
        }
    }

?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>ADD COLLEGE</title>
        <style>

        body{
          overflow: hidden;
        }
        .bgimage{
            background-image:url("images/addCollege.jpg");
            /* margin-top:3%;
            margin-left:-0.5%; */
            height:102vh;
            width:100vw;
            background-position: center;
            background-size:cover;
            background-repeat: no-repeat;
        }
        .back{
            width:420px;
            /* height:500px; */
            background:#000;
            color:#fff;
            top:50%;
            left: 50%;
            position:absolute;
            transform: translate(-50%,-50%);
            background: rgba(5, 5, 5, 0.670);
            box-sizing: border-box;
            padding: 70px 30px;
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
            font-size: 16px;
            color: white;
        }
        .back input[type="submit"]{
            border: none;
            outline:none;
            height:40px;
            background: #fb2525;
            color:#fff;
            font-size: 18px;
            border-radius: 20px;
        }
        .back input[type="submit"]:hover{
            cursor: pointer;
            background: burlywood;
            color: #000;
        }
        .back input[type=checkbox]+ label:before{
            margin-right:10px;
            border:0.1cm solid #000;
            border-radius:1cm;
        }

            .btn{
              margin:3.5%;
                padding: 10px 20px;
                border: none;
                outline: none;
                font-family:"montserrat";
                border-radius: 20px;
                width: 200px;
                background: black;
            }
            .btn:hover{
                cursor: pointer;
                background:burlywood;
            }
            ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: rgb(189, 176, 176);

  }

        </style>
    </head>
    <body class="bgimage">
         <a href="main2.php" style=" color:white; font-size:20px; align:center;"><button type="submit" name="back" class="btn">Back</a></button>
        <div class="back">
            <p style="margin-bottom:30px;"><legend>COLLEGE DETAILS</legend></p>
        <form action="add_college.php" method="POST">
          <?php echo $err; ?>
            <fieldset>

            <input type="text" name="c_name" placeholder="College Name" required><br>
            <input type="text" name="c_id" placeholder=" Unique College Id" required>
            <span color="red"><?php echo $cErr; ?></span><br>
            <input type="text" name="pass" placeholder="Password" required><br>
            <input type="submit" name="sub" value="SUBMIT"><br>

            </fieldset>
        </form>
</div>
    </body>
    </html>
<?php
    }

?>
