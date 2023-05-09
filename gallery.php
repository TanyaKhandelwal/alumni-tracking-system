<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="css/animate.css">
            <style>
            .cenimg{
                height:90% !important;
                width :100% !important;
            }
            body{
                height : 100vh;


            }


</style>
              </head>
              <body>
            <?php include 'menu.php' ?>
          <br>
         <h1 class="text-center bg-dark text-white wow zoomIn">GALLERY</h1>
            <section class="sec my-5 ">
                    <div class="jumbotron">
                    <div class='container-fluid'>
                    <div class='row'>
                        <div class='col-lg-4 col-md-4 col-12 wow rotateInDownLeft'>
                            <img src="images/cap.jpg" class='img-fluid pb-4'>
                        </div>
                        <div class='col-lg-4 col-md-4 col-12 wow slideInDown'>
                            <img src="images/class.jpg" class='cenimg img-fluid pb-4' >
                        </div>
                        <div class='col-lg-4 col-md-4 col-12 wow rotateInDownRight'>
                            <img src="images/lib.jpg" class='img-fluid pb-4'>
                        </div>
                        </div>
                </div>
                </div>
                </section>

                    <script src="js/wow.min.js"></script>
                            <script>
                            new WOW().init();
                            </script>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
