<!DOCTYPE html>
<html>

<head>
    <title>SIGN UP PAGE</title>
    <link rel="stylesheet" href="signup.css">
    <style>
        .submit-btn {
            margin-left: 40%;

        }

        .l {
            color: white;
            margin-left: 25%;

        }

        .left {
            width: 100vw;
            margin-left: 15%;
        }

        .detail {
            text-align: left;
        }

        h1 {
            color: white;
        }

        h4 {
            margin-inline-start: 35%;
            color: white;

        }

        div {
            padding-left: 10px;
        }

        p {
            color: red;
        }

        pre {
            color: red;
            padding-left: 2px;

        }

        .pretag {
            color: white !important;
        }

        .btn {
            float: left;
            padding: 10px 20px;
            border: none;
            outline: none;
            font-family: "montserrat";
            border-radius: 20px;
            width: 200px;
        }

        .btn:hover {
            cursor: pointer;

        }

        a:hover {
            cursor: pointer;
            background: seagreen;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

</head>

<body>
    <a href="index.php" style="font-size:20px; align:center;"><button type="submit" name="back" class="btn">Back</a></button>
        <br><br><br>
        <?php
    require "dbcon.php";
    $temp = 0;
    $nameErr = $emailErr = $genderErr = $contErr = $uidErr = $cErr = $passErr = $rErr = $stat1Err = $stat2Err = $dErr = $aErr = $yErr = $mailErr =
        "";
    $name = $email = $gender = $addr = $dob = $contact = $uid = $pass = $stat1 = $rno = $cname = $year = $stat2 = $about =
        "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $addr = test_input($_POST["addr"]);
        $dob = test_input($_POST["dob"]);
        $email = test_input($_POST["email"]);
        $uid = test_input($_POST["id"]);
        $pass = $_POST["pass"];
        $stat1 = $_POST["status"];
        $rno = test_input($_POST["rno"]);
        $cname = $_POST["college"];
        $year = $_POST["passyear"];
        $stat2 = $_POST["work"];

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $temp = 1;
        }

        if (
            !preg_match("/^[0-9]*$/", $_POST["cont"]) ||
            strlen($_POST["cont"]) != 10
        ) {
            $contErr = "Only 10 digits numbers are required";
            $temp = 1;
        } else {
            $contact = test_input($_POST["cont"]);
        }

        if (!preg_match("/^[0-9A-Z]*$/", $rno)) {
            $rErr = "Only numbers and capital alphabets are required";
            $temp = 1;
        }

        if (!preg_match("/^[a-z@0-9_.]*$/", $uid)) {
            $uidErr = "Only small alphabets,digits,(@,_,.) allowed";
            $temp = 1;
        }

        if (!preg_match("/^[a-zA-Z0-9@#$]*$/", $pass) || strlen($pass) <= 8) {
            $passErr =
                "Only small and capital alphabets, digits,special characters(@,#,$) allowed";
            $temp = 1;
        }

        if ($stat1 == "select") {
            $stat1Err = "Please select it";
            $temp = 1;
        }
        if ($cname == "select") {
            $cErr = "Please select it";
            $temp = 1;
        }
        if ($stat2 == "select") {
            $stat2Err = "Please select it";
            $temp = 1;
        }

        if (DATE("Y-m-d") < $year) {
            $yErr = "Passing date is not valid";
            $temp = 1;
        }

        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $temp = 1;
        }

        if (empty($_POST["about"]) || strlen($_POST["about"]) < 5) {
            $aErr = "Description is required";
            $temp = 1;
        } else {
            $about = test_input($_POST["about"]);
        }

        if (empty($_POST["sex"])) {
            $genderErr = "Gender is required";
            $temp = 1;
        } else {
            $gender = test_input($_POST["sex"]);
        }

        if ($temp == 0) {
            $sql = "SELECT * from alumni where alumni_id='$uid' ";
            $rec = mysqli_query($db, $sql);
            if (mysqli_num_rows($rec)) {
                $uidErr = "User Id must be unique or this id is not available";
            } else {
                $sql1 = "SELECT * from alumni where rno='$rno' ";
                $rec1 = mysqli_query($db, $sql1);
                if (mysqli_num_rows($rec1)) {
                    echo "<script> alert('This roll no exists..Please login!!') </script>";
                    header("Refresh:0.05; url=alumni1.php");
                } else {
                        $cry = md5($pass);
                        $sql2 = "INSERT into alumni values ('$name','$uid','$rno','$cry','$contact','$addr','$dob','$email','$stat1','$gender','$cname','$year','$stat2','$about','0','0')";
                        $rec2 = mysqli_query($db, $sql2);
                        echo "<script> alert('Registered Successfully and mail has been sent.Check now!!')</script>";
                        header("Refresh:0.05; url= alumni1.php");

                }
            }
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
        <div class="box">

            <h1>SIGN UP FORM</h1>
            <!-- <p>Please fill out all details properly and you get a gmail when registered successfully.</p> -->
            <hr><br>
            <form action="<?php echo htmlspecialchars(
            $_SERVER[" PHP_SELF"] ); ?>" method="POST">
               <div class="left detail">
    <fieldset>
        <div class="l">
            <legend>PERSONAL INFORMATION</legend><br>
        </div>
        <div class="reg container ">
            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white">  <b>Full Name:</b></label>
                </div>
                <div class="col">
                    <span id="f"><?php echo $nameErr; ?></span>
                    <input type="text" name="name" placeholder="name" required>
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white"> <b>Permanent Address:</b></b></label>
                </div>
                <div class="col">
                    <input type="text" name="addr" placeholder="full address" required><br>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white"> <b>Date of Birth:</b></b></label>
                </div>
                <div class="col">
                    <input type="date" name="dob" placeholder="dob" max="2004-12-31" required>
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white">   <b>Email Address:</b><span id="f"><?php echo $emailErr; ?></span></label>
                </div>
                <div class="col">
                    <input type="email" name="email" placeholder="abc@xyz" required>
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white">  <b>Telephone or Contact Number:</b><span id="f"><?php echo $contErr; ?></span></label>
                </div>
                <div class="col">
                    <input type="text" name="cont" placeholder="10 digit contact number" required >
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white">   <b>User Id:</b><span id="f"><?php echo $uidErr; ?></span></label>
                </div>
                <div class="col">
                    <input type="text" name="id" placeholder="Unique user id" required>
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white">     <b>Password:</b><span id="f"><?php echo $passErr; ?></span></label>
                </div>
                <div class="col">
                    <input type="password" name="pass" id="pass" placeholder="password" required>



                </div>
            </div>
            <div class="row align-items-start">
                <div class="col">

                    <pre class="pretag">Minimum 8 characters including alphabets, digits,@,#,$</pre>
                </div>
                <div class="col pretag">
                    <input type="checkbox" onclick="myFunction()">Show Password
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



                </div>
            </div>


            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white">   <b>Civil Status:</b></span></label>
                </div>
                <div class="col">
                    <select name="status" required>
                    <option value="select">--SELECT--</option>
                    <option value="Married">Married</option>
                    <option value="Unmarried">Unmarried</option>
                </select>
                    <span id="f"><?php echo $stat1Err; ?></span><br>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white">   <b>Sex:</b></label>
                </div>
                <div class="col pretag">
                    <input type="radio" name="sex" value="Male">Male
                    <input type="radio" name="sex" value="Female">Female
                    <span id="f"><?php echo $genderErr; ?></span><br>
                </div>
            </div>
        </div>



        <div class="l">
            <legend>Educational details</legend><br>
        </div>

        <div class="reg container">
            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white">  <b>Roll Number:</b> <span id="f"><?php echo $rErr; ?></span></label>
                </div>
                <div class="col">

                    <input type="text" name="rno" placeholder="roll no" required>
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white">  <b>College Name:</b><span id="f"><?php echo $cErr; ?></span></label>
                </div>
                <div class="col">

                    <select name="college" required>
                  <option value='select'>---SELECT---</option>
                <?php
                $query = "SELECT college_name FROM collegelogin order by college_name";
                $result = mysqli_query($db, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $coll = $row["college_name"];

                    echo "<option value='" . $coll . "'>" . $coll . "</option>";
                }
                ?>
                </select>
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white">  <b>Passing Date:</b><span id="f"><?php echo $yErr; ?></span></label>
                </div>
                <div class="col">
                    <span id="f"><?php echo $yErr; ?></span>
                    <input type="date" name="passyear" placeholder="passing date"  required>
                </div>
            </div>


            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white">  <b>Present Work Status:</b><span id="f"><?php echo $stat2Err; ?></span></label>
                </div>
                <div class="col">

                    <select name="work">
                    <option value="select">--SELECT--</option>
                    <option value="Studies">Higher Studies</option>
                    <option value="Startup">Start up</option>
                    <option value="Job">Job</option>
                </select>

                </div>
            </div>
            <div class="row align-items-start">
                <div class="col">
                    <label class="text-white"><b>Description of work status:</b> </label>
                </div>
                <div class="col">

                    <textarea name="about" placeholder="Describe your present work status in minimum 50 characters like course name,college name or job description,address"></textarea>

                </div>
            </div>

        </div>







    </fieldset><br>

            </div>
</form>


<div class="submit-btn">
    <input type="submit" name="submit" value="SUBMIT">
</div>
<h4>Have an account? Want to login <a href='alumni1.php'>LOGIN</a></h4>
</div>
</body>

</html>
