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
  $target_path = '/Applications/XAMPP/xamppfiles/htdocs/3248/project/eventfile/';
  $target_path = $target_path.basename($_FILES['fileToUpload']['name']);

$fileName ='';
    $a=$_POST['from'];
    $c=$_POST['id'];
    $d=$_POST['sub'];
    $e=$_POST['details'];
    $x=$_SESSION['user'];

    $res=mysqli_query($db,"select * from col_event where id='$c' ");

    if(mysqli_num_rows($res)){
        $err="<font color='red'>Event Id exists..Please check first</font>";
    }
    else{
     if(DATE('Y-m-d')<$a){
       if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_path)) {
          $fileName = $_FILES['fileToUpload']['name'];
          mysqli_query($db,"insert into col_event values ('$c','$a','$d','$e','$x','$fileName')");
          $err="<font color='green'>Event added Successfully</font>";
       }
        else{
          $err="<font color='red'>File Not Uploaded</font>";
        }

     }
     else{
      $err="<font color='red'>Check Event date...It must held in future.</font>";
     }
     }

}

?>

<!DOCTYPE html>
<html>
<head>
<title>DIRECTORATE EVENT</title>
<style>
body{
	background-image: url("images/eventbg.jpg");
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
    <h2 class="text-white">Add new Event</h2>
    <form method="POST" action="event.php" enctype="multipart/form-data">
      <?php echo $err; ?>
      <div class="reg container">
      <div class="row align-items-start">
      <div class="col">
          <label class="text-white">Select Event Date</label>
  </div>


  <div class="col">
           <input type="date" name="from" placeholder=' Date' required >
  </div>
  </div>
      </div>
      <br>
      <div class="reg container">
      <div class="row align-items-start">
      <div class="col">
          <label class="text-white">Enter Event Id</label>
          </div>
  <div class="col" >
          <input type="text" name="id" placeholder="Event id" required size="16">
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
      <a href="event.php" class="btn btn-success">Reset</a>
      </div>
  </div>
      </div>
      </form>

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
