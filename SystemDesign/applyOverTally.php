<?php
 session_start();
 if (!isset($_SESSION["email"]) || ($_SESSION["userType"]!=1)) {
     include("logout.php");
 }
$connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Overtally Page</title>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../general.css">
      </head>
      <body background="AdminDefaultPage.jpeg">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="student.php"> <img src="../logo.png" alt="" height="60" width="60"> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin Homepage</a>
              </li>
            </ul>
            <form class="form-inline" action="../logout.php">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
          </div>
        </nav>
          <div class="col-11" style="margin:0 auto;">
            <div class="jumbotron">
              <div class = 'container'>
                <div align="center">
                  <form method="post" >
                    <h3>Overtally Student</h3>
                       <label>Enter CRN#</label>
                       <div style="width:100px;">
                       <input type="text" name="CRN#" class="form-control" />
                       </div>
                       <label>Enter Section</label>
                       <div style="width:100px;">
                       <input type="text" name="section" class="form-control" />
                       </div>
                       <label>Enter Student ID</label>
                       <div style="width:100px;">
                       <input type="text" name="student" class="form-control" />
                       </div>
                       <br />
                       <input type="submit" name="overtally" value="Overtally" class="btn btn-info" />
                       <br /> <br>
                       <?php
                       error_reporting(0);
                       $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
                       if (isset($_POST["overtally"])) {
                         $stuId = mysqli_real_escape_string($connect, $_POST["student"]);
                         $CRN = mysqli_real_escape_string($connect, $_POST["CRN#"]);
                         $section=mysqli_real_escape_string($connect, $_POST["section"]);

                         $holdCheck="SELECT * FROM holds WHERE stuId=$stuId";
                         $holdCheckResult=mysqli_query($connect, $holdCheck);
                         $errorCheck="SELECT * FROM enrollment WHERE crn='$CRN' AND stuId=$stuId AND section='$section'";
                         $errorCheckResult=mysqli_query($connect, $errorCheck);

                         if (mysqli_num_rows($errorCheckResult) > 0) {
                             echo "Already Enrolled in this class.";
                             return;
                         }
                         elseif (mysqli_num_rows($holdCheckResult)>0) {
                             $row=mysqli_fetch_array($holdCheckResult);
                             if ($row['holdType']==1) {
                                 echo 'Financial Hold Placed on Account. Please Check Student\'s Holds.';
                                 return;
                             } elseif ($row['holdType']==2) {
                                 echo 'Academic Hold Placed on Account. Please Check Student\'s Holds.';
                                 return;
                             } elseif ($row['holdType']==3) {
                                 echo 'Diciplinary Hold Placed on Account. Please Check Student\'s Holds.';
                                 return;
                             }
                         }
                         else {
                           $getSem = "SELECT * FROM class WHERE crn='$CRN' AND section='$section'";
                           $getSemResult = mysqli_query($connect, $getSem);
                           if (mysqli_num_rows($getSemResult) > 0) {
                               $row = mysqli_fetch_array($getSemResult);
                               $semester=$row['semeYear'];
                           }
                           $query = "INSERT INTO enrollment(stuId, crn, semester, section)
                                 VALUES ($stuId,'$CRN','$semester',$section)";
                           if (mysqli_query($connect, $query)) {
                             echo "Class Added to Schedule";
                           }
                           else{
                             echo "Incorrect CRN#";
                           }
                         }
                       }
                      ?>
                  </form>
                </div>
            </div>
         </div>
        </div>
      </body>
 </html>