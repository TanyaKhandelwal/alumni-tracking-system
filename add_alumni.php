<?php
session_start();
require "dbcon.php";

$cErr = $yErr = "";

if(!isset($_SESSION['user'])){
    echo "YOU DON'T HAVE ACCESS TO THIS PAGE ";
    echo "<br> GO TO MAIN PAGE : <a href='index.php'>Home Page</a>";
    echo "<br>GO TO LOGIN PAGE : <a href='login.html'>Login Page</a>";
}
else{
    if(isset($_POST['sub'])){
        $temp=0;
        $id=$_POST['a_id'];
        $name=$_POST['a_name'];
        $year=$_POST['year'];
        $c=$_SESSION['user'];
        $sql="SELECT * from col_alumni where rno='$id' ";
        $rec=mysqli_query($db,$sql);
        if(!mysqli_num_rows($rec)){
            $sql1="INSERT INTO col_alumni VALUES ('$id','$name','$year','$c') ";
            $rec1=mysqli_query($db,$sql1);
            $success= "SUCCESSFULLY ADDED";
        }
        else{
            $cErr="Alumni roll number exists";
        }
    }

?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>ADD ALUMNI</title>
        <style>
              .akg{
    float:left;
    padding: 25px;
    width: 90px;
    height: 100px;
    border-radius: 50%;
    animation-delay: 2s;
    animation-iteration-count: 1;
}

.ww{
    background-image: url("images/addalumni.jpeg");
    background-size:cover;
    width: 100vw;
    height: 100vh;
}
.we{
    /* position: absolute; */
    /* top: 30%; */
    /* left: 40%; */
    text-align: center;
    font-size: 20px;
    padding: 27.5px;
    box-shadow: 2px 2px 2px 2px rgba(23, 36, 36, 0.884);
    background: black;
    opacity: 0.9;
    /* width: 400px; */
    width:500px;
    /* height:350px; */
    border-radius: 30px;
    margin:50px auto;
}
.akg{
    float:left;
    padding: 25px;
    width: 150px;
    height: 120px;
    border-radius: 50%;
    animation-delay: 2s;
    animation-iteration-count: 1;
}
input[type=submit],button{
    border-radius: 5px;;
    width: 150px;
    background-color: darkgreen;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    cursor: pointer;
    opacity: 0.9;
}
input[type=button],button{
    border-radius: 5px;;
    width: 150px;
    font-size: 20px;
    background-color: darkgreen;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    cursor: pointer;
    opacity: 0.9;
}
        </style>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
    </head>
    <body>
        <div class="ww">
    <h1 class="text-center">Add Alumni</h1>
    <div class="we">
    <form action="add_alumni.php" method="POST">
            <fieldset>
            <legend class="text-white">ALUMNI DETAILS</legend><br />

            <div class="reg container">
            <div class="row align-items-start">
            <div class="col">
                <label class="text-white">Enter Alumni Name</label>
                </div>
            <div class="col" >
                <input type="text" name="a_name" placeholder="Alumni Name" required size="16">
                </div>
            </div>
            </div>
            <br>

            <div class="reg container">
            <div class="row align-items-start">
            <div class="col">
                <label class="text-white">Enter Roll No.</label>
                </div>
            <div class="col" >
                <input type="text" name="a_id" placeholder="Unique Roll No." required size="16">
                </div>
            </div>
            </div>
            <br>
            <div class="reg container">
            <div class="row align-items-start">
            <div class="col">
                <label class="text-white">Passing Date</label>
                </div>
            <div class="col" >
                <input type="date" name="year" placeholder="" required>
                </div>
            </div>
            </div>
            <br>

            <input type="submit" name="sub" value="SUBMIT">
            <input type="button" value="BACK" onclick="window.location.href='main3.php' ;" >
            <br />
            <span style="color:red"><?php echo $cErr;?></span>
              <span style="color:green"><?php echo $success;?></span>
            </fieldset>

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
<?php
    }

?>
