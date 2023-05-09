<!DOCTYPE html>
<html>
    <head>
        <title>NOTICES</title>
        <style>
            .abs{
                background: url(images/notice.jpg);
            }
            .aa{
              /* margin-top: 2%; */
                font-size: 50px;
                text-align: center;
            }
            h4{
              margin-left: 1%;
            }
            .btn{
              margin-top:3%;
            }
            .tab{
                margin:auto;
            	/* min-width:500px; */
            }
            .tat{
            	text-align:left;
            	font-weight:bold;
            }
            .tab th,.tab td{
                padding: 12px 15px;
                border:1px solid pink;
            }
            .tab tr{
            	border-bottom:1px solid #dddddd;
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
                <link rel="stylesheet" href="css/animate.css">
    </head>
    <body class="abs">
      <!-- <div>
    <a href="index.php" class="btn btn-success">Back</a>
    </div> -->
    <p class="aa">Important Notices<p>
      <script src="js/wow.min.js"></script>
          <script>
          new WOW().init();
          </script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    </body>
</html>
<?php

 require "dbcon.php";
 $sql="SELECT * FROM notice ";

 $rec=mysqli_query($db,$sql);
 ?>
 <table class="tab" align:"center";>
     <tr class="tat">
         <th>VALID FROM</th>
         <th>UPTO</th>
         <th>NOTICE ID</th>
         <th>TITLE</th>
         <th>SUBJECT</th>
         <th>FILE NAME</th>
     </tr>
     <?php
 if(mysqli_num_rows($rec)){
       while($res=mysqli_fetch_assoc($rec)){
           echo "<tr>";
           echo "<td>".$res['from_date']."</td>";
           echo "<td>".$res['to_date']."</td>";
           echo "<td>".$res['id']."</td>";
           echo "<td>".$res['subject']."</td>";
           echo "<td>".$res['detail']."</td>";

          if( $res['filename']!=''){?>
              <td><a href="uploads/<?php echo $res['filename']; ?>" target="_blank"><input type="button" value="Open File" /></a></td>
          <?php   }
           echo "</tr>";

         }


       }



   else{
       echo "NO NOTICE FOUND";

   }
?>
