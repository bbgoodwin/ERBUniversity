<!DOCTYPE html>
<html>
     <head>
          <title>ERBUniveristy Login Page</title>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="general.css">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
          <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     </head>
     <body background="city.jpg">
       <nav class="navbar navbar-expand-lg navbar-dark">
         <a class="navbar-brand" href="index.html"> <img src="logo.png" alt="" height="60" width="60" > </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

         <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
           <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
             <li class="nav-item">
               <a class="nav-link" href="index.html">Homepage<span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="admissions.html">Admissions</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="academics.html">Academics</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="about.html">About</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="https://www.oldwestbury.edu/sites/default/files/documents/Catalogs/2016-18/undergrad-catalog-16-18.pdf">Catalog</a>
             </li>
           </ul>
           <form class="form-inline" action="login.php">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
           </form>
         </div>
       </nav>
          <br /><br />
          <div class="container" style="width:500px;">
              <div class="jumbotron">
               <h2 align="center">Reset Password</h2>
               <br />
               <br />
               <form method="post">
                    <label>Enter Email:</label>
                    <input type="text" name="email" class="form-control" />
                    <br />
                    <input type="submit" name="reset" value="Reset" class="btn btn-info" />
                    <br /> <br>
                    <?php
                    session_start();
                    if (isset($_POST["reset"])) {
                        if (empty($_POST["email"])) {
                          echo '<script>alert("Enter your email")</script>';
                        }
                        else {
                          $digits = 4;
                          $num = rand(pow(10, $digits-1), pow(10, $digits)-1);
                          $_SESSION["code"]=$num;
                          $_SESSION["email"]=$_POST["email"];
                          header("location:securityCode.php");
                          }
                        }

                    ?>
               </form>
             </div>
          </div>
     </body>
</html>
