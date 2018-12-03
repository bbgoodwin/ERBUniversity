<?php
$connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
session_start();
if (!isset($_SESSION["email"]) || ($_SESSION["userType"]!=4)) {
    include("logout.php");
}
?>
<!DOCTYPE html>
<html>
     <head>
          <title>ERBUniveristy Unenroll Page</title>
          <link rel="stylesheet" href="general.css">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
          <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
     </head>
     <body background="studentHomepage.jpg">
       <nav class="navbar navbar-expand-lg navbar-dark">
         <a class="navbar-brand" href="student.php"> <img src="logo.png" alt="" height="60" width="60"> </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
           <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
             <li class="nav-item">
               <a class="nav-link" href="student.php">Student Homepage</a>
             </li>
             <li class="nav-item active">
               <a class="nav-link" href="unenroll.php">Unenroll</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="viewGrades.php">View Grades</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="viewClasses.php">View Classes/Enroll in Class</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="viewHolds.php">View Holds</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="degreeAudit.phpp">Degree Audit</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="declareMajorMinor.php">Declare Major/Minor</a>
             </li>
           </ul>
           <form class="form-inline" action="logout.php">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
           </form>
         </div>
       </nav>
       <div class="container">
         <div class="jumbotron">
           <div align="center">
               <h3 align="center">Unenroll From a Class</h3>
               <br />
               <form method="post">
                    <label>Enter CRN#</label>
                    <div style="width:100px;">
                    <input type="text" name="CRN#" class="form-control" />
                  </div>
                    <br />
                    <input type="submit" name="unenroll" value="Unenroll" class="btn btn-info" />
                    <br />
               </form> <br>
               <?php
               if (isset($_POST["unenroll"])) {
                   $CRN = mysqli_real_escape_string($connect, $_POST["CRN#"]);
                   $userid=$_SESSION["userId"];
                   $check= "SELECT * FROM enrollment WHERE stuId=$userid AND crn='$CRN'";
                   $result=mysqli_query($connect, $check);
                   $query = "DELETE FROM enrollment WHERE stuId=$userid AND crn='$CRN'";
                   if (mysqli_num_rows($result) > 0) {
                       if (mysqli_query($connect, $query)) {
                           $update = "UPDATE class SET seats=seats+1 WHERE crn='$CRN'";
                           mysqli_query($connect, $update);
                           echo "Unenrollment successfull";
                       } else {
                           echo "Incorrect CRN#";
                       }
                   } else {
                       echo "Incorrect CRN#";
                   }
               }
               ?>
             </div>
           </div>
         </div>
     </body>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
