<?php

session_start();
require "dbcon.php";

$err='';
if(!isset($_SESSION['user'])){
    echo "YOU DON'T HAVE ACCESS TO THIS PAGE ";
    echo "<br> GO TO MAIN PAGE : <a href='index.php'>Home Page</a>";
    echo "<br>GO TO LOGIN PAGE : <a href='login.html'>Login Page</a>";
}

else{

if(isset($_POST['add']))
{
  $target_path = '/Applications/XAMPP/xamppfiles/htdocs/3248/project/uploads/';
  $target_path = $target_path.basename($_FILES['fileToUpload']['name']);

$fileName ='';


    $a=$_POST['from'];
    $b=$_POST['to'];
    $c=$_POST['id'];
    $d=$_POST['sub'];
    $e=$_POST['details'];


    $res=mysqli_query($db,"select * from notice where id='$c' ");

    if(mysqli_num_rows($res)){
        $err="<font color='red'>Notice Id exists..Please check first</font>";
    }
   else{
     if(DATE('Y-m-d')<$a){
       if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_path)) {
          $fileName = $_FILES['fileToUpload']['name'];
          // echo $_FILES['fileToUpload']['name'];
          mysqli_query($db,"insert into notice values ('$a','$b','$c','$d','$e',now(),'$fileName')");
          $err="<font color='green'>Notice added Successfully</font>";
       }
        else{
          echo "File not uploaded";
        }
     }
     else{
      $err="<font color='red'>Check Event date...It must held in future.</font>";
     }
    }

}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Notice</title>
<style>
body{
	background-image: url("images/noticebg.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 100vw 130vh;
overflow-y: hidden;
}
.reg label{
        display: block;
        margin: 4px;
        text-align: left;

	}
	.h2{
		text-align:center;
	}
	.fm{
		width:500px;
		box-shadow:0 0 3px rgba(0,0,0,0.3);
		background:black;
        padding:20px;
		margin:10% auto ;
		text-align:center;
        border-radius: 4%;
	}
    .akg{
    float:left;
    padding: 10px;
    width: 130px;
    height: 120px;
    border-radius: 50%;
    animation-delay: 2s;
    animation-iteration-count: 1;
}
.btn{
  margin-top:3%;
}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
</head>
<body>
  <div>
    <a href="main2.php" class="btn btn-success">Back</a>
  </div>
	<div class="fm">
    <h2 class="text-white">Add New Notice</h2>
     <!-- <button onclick="window.location.href='notice.php'"  style="float:right; margin-right:30px; margin-top:-30px; border-radius:20px; background:lightgrey; align:center;">RESET</button><br><br> -->
    <form method="POST" action="notice.php" enctype="multipart/form-data">
    <?php echo $err; ?>
    <div class="reg container">
    <div class="row align-items-start">
    <div class="col">
        <label class="text-white">Select Event Date</label>
      </div>
      <div class="col">
         <input type="date" name="from" placeholder=' From this date' required  />
       </div>
     </div>
   </div>
    <br>

    <div class="reg container">
    <div class="row align-items-start">
    <div class="col">
        <label class="text-white">Till this date</label>
      </div>
      <div class="col">
         <input type="date" name="to" placeholder=' To this date' required  />
       </div>
     </div>
    </div>
    <br>

    <div class="reg container">
    <div class="row align-items-start">
    <div class="col">
        <label class="text-white">Enter Notice Id</label>
        </div>
    <div class="col" >
        <input type="text" name="id" placeholder="Notice id" required size="16">
        </div>
    </div>
    </div>
    <br>


    <div class="reg container">
    <div class="row align-items-start">
    <div class="col">
        <label class="text-white">Enter Subject</label>
        </div>
  <div class="col">
        <input type="text" name="sub" placeholder="Title" required size="16">
        </div>
  </div>
    </div>
    <br>
    <div class="reg container">
    <div class="row align-items-start">
    <div class="col">
        <label class="text-white">Enter Details</label>
        </div>
  </div>
    </div>
    <div class="reg container">
    <div class="row align-items-start">
    <div class="col">
    <textarea name="details"  placeholder="Detailed information of event" required cols="48"></textarea>
        </div>
  </div>
    </div>
    <div class="reg container">
    <div class="row align-items-start">
    <div class="col">
      <label class="text-white">Select File</label>
    </div>

       <input class="text-white" type="file" name="fileToUpload" id="fileToUpload">

  </div>
    </div>
    <br> <br>

    <div class="reg container">
    <div class="row align-items-start">
    <div class="col">

        <input type="submit" value="Add New Event" name="add" class="btn btn-success"/>

    </div>
    <div class="col">
    <a href="notice.php" class="btn btn-success">Reset</a>
    </div>
    </div>
    </div>
    </form>

    </div>
</body>
</html>
<?php

?>
