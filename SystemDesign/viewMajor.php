<?php
 session_start();
 if (!isset($_SESSION["email"]) || ($_SESSION["userType"]!=2)) {
     include("logout.php");
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>View Major/Minor Information Page</title>
           <link rel="stylesheet" href="general.css">
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
           <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
      </head>
      <body background="research.jpg">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="research.php"> <img src="logo.png" alt="" height="60" width="60"> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="research.php">Homepage</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewUniversityGrades.php">View University Grades</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="viewMajor.php">View Major/Minor Info</a>
              </li>
            </ul>
            <form class="form-inline" action="logout.php">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
          </div>
        </nav>
        <div class="container">
          <div class="jumbotron">
            <h1>Major/Minor Information</h1>
             <div class="container">
                   <?php
                   $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
                   $resId = $_SESSION["userId"];?>
                   <div class="row">
                     <div class="col-sm">
                       <h3>Student's Per Major</h3>
                       <?php
                          $major="SELECT DISTINCT majorcode, COUNT(stuId) AS 'count' FROM studentmajor GROUP BY stuId";
                          $majorResult=mysqli_query($connect,$major);
                          if(mysqli_num_rows($majorResult)>0){
                            foreach ($majorResult as $a) {
                              echo "<h5>" . implode(" | Students: ",$a) . "</h5>";
                            }
                          }
                        ?>
                     </div>
                     <div class="col-sm">
                       <h3>Student's Per Minor</h3>
                       <?php
                          $minor="SELECT DISTINCT minorcode, COUNT(stuId) AS 'count' FROM studentminor GROUP BY stuId";
                          $minorResult=mysqli_query($connect,$minor);
                          if(mysqli_num_rows($minorResult)>0){
                            foreach ($minorResult as $a) {
                              echo "<h5>" . implode(" | Students: ",$a) . "</h5>";
                            }
                          }
                        ?>
                     </div>
                     <div class="col-sm">
                       <h3>Graduates vs Non-Graduate Student Counts</h3>
                       <?php
                          $nonGrad="SELECT stuId, COUNT(*) AS 'num' FROM student WHERE stuId NOT IN (SELECT * FROM graduate)";
                          $nonGradResult=mysqli_query($connect,$nonGrad);
                          $grad="SELECT *, COUNT(*) AS 'count' FROM graduate";
                          $gradResult=mysqli_query($connect,$grad);
                          $row=mysqli_fetch_array($gradResult);
                          $row2=mysqli_fetch_array($nonGradResult);
                          $totalStudents=$row['count'] + $row2['num'];
                          echo "<h5> Graduates: ". $row['count'] . "</h5>";
                          echo "<h5> Non-Graduates: ". $row2['num'] . "</h5>";
                          echo "<h5> Total Students: ". $totalStudents . "</h5>";
                        ?>
                     </div>
                   </div>
              </div>
          </div>
        </div>

      </body>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </html>
