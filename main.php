
<!DOCTYPE html>
<html>
    <head>
        <title>MAIN PAGE</title>
        <style>
        body{
          margin-top: 0;
          margin-left:0;
        }
        .image{
          background: url(images/alumni.jpeg);
          /* overflow: hidden;  */
          overflow-y: hidden;
          background-repeat: no-repeat;
          background-size: cover;
          width:100vw;
          height:100vh;
        }
        a{
          color: white;
          text-decoration: none;
        }
        a:hover{
          color: cornsilk;
        }
        #l{
            float:right;
            margin-right:2%;
        }
        #s1{
        	height: 30px;
        	width: 40px;
        	border-radius: 50%;
        }
        #s2{
          width: 50px;
        	height: 38px;
        	border-radius:50%;
        	margin-left: 20px;
        }
        #s3{
        	background-color: rgb(0,0,0,0.456);
        	width: 700px;
        	/* height: 400px; */
        	margin: 13% auto;
        	border-radius: 50px;
        	border-color: gray;
        }
        #s4{
          height: 200px;
        	width: 200px;
        	border-radius: 25%;
        	margin-left: 15px;
        	margin-top: 20px;
        }
        #s5{
        	border-radius: 25%;
          height: 200px;
        	width: 200px;
        	margin-top: 20px;
        }
        #s6{
        	border-radius: 50%;
          height: 200px;
        	width: 200px;
        	margin-top: 20px;
        }
        #s7{
        	width: 50px;
        	height: 35px;
        	border-radius: 50%;
        }
        </style>

     </head>
    <body>
      <div class="image">
    <hr>
    <h1 style="margin-left: 15px; color:white;"><a href="profile.php"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjVXybwwswQWwuHWko_d8yyrqqLOYBqlGWkkKNs-yDqqrb2YuQ&s" id="s1"></a> &nbsp&nbsp HI!
     <?php
    session_start();
    require "dbcon.php";
    if(!isset($_SESSION['user'])){
    echo"<script> alert('Log in properly..') </script>";
    header("Refresh=0.5; url:'alumni1.php'");
    }
    else{
        $a=$_SESSION['user'];
        $sql="SELECT * FROM alumni where alumni_id='$a'";
        $rec=mysqli_query($db,$sql);
        $res=mysqli_fetch_array($rec);
        $_SESSION['col']=$res['college'];
        $_SESSION['v']=$res['verified'];
        echo $a.' ( '.$_SESSION['col'].' )';
    }
    ?>
    <div id="l">
    <a href="alu_event.php"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4D5CapdQe7oQoAiQ1yp2mKKtdUrD_btJgGR0I9rvgvIjtduZg&s" alt="Notice" id="s7"></a>
    <a href="logout.php"><img src="https://bit.ly/37TS5eS" id="s2" alt="Logout"></a>
  </div></h1>
    <hr>
    <fieldset id="s3">
        <table>
            <tr>
                <td>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png" alt="User Profile" id="s4">
                    <a href="profile.php"><h4 align="center">User Profile</a></h4>
                </td>
                <td style="padding-left: 15px;">
                    <img src="https://cdn4.iconfinder.com/data/icons/documents-15/144/edit-modify-document-account-profile-details-user-512.png" id="s5">
                    <a href="editprofile.php"><h4 align="center">Edit Profile</a></h4>
                </td>
                <td style="padding-left: 30px;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQx8rQOWv2i1cvLN1wef-k4dNt8njLDE9nEO1rgNew9UFPsHy-g&s" id="s6">
                    <a href="home.php"><h4 align="center">Group Chat</a></h4>
                </td>
            </tr>
        </table>
    </fieldset>
      </div>
    </body>
</html>
