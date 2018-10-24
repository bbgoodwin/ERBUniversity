<?php
 session_start();
 if (!isset($_SESSION["email"]) || ($_SESSION["userType"]!=4)) {
     include("logout.php");
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Grade Page</title>
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
              <li class="nav-item">
                <a class="nav-link" href="enroll.php">Add Class<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="unenroll.php">Remove Class</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="viewGrades.php">View Grades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewClasses.php">View Classes</a>
              </li>
            </ul>
            <form class="form-inline" action="logout.php">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
          </div>
        </nav>
        <div class="container">
          <div class="jumbotron">
                <h3>Your Grades</h3> <br>
                <div>
                <table class="table table-striped table-dark">
                  <tr>
                    <th scope="col">CRN#</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Grade</th>
                  </tr>
                  <tbody>
                <?php
                  $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
                  $stuId = $_SESSION["userId"];
                  $query = "SELECT * FROM history WHERE stuId = '$stuId'";
                  $result = mysqli_query($connect, $query);
                  $gpa=[];
                  if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result)) {
                          echo "<tr><td>" . $row['crn'] . "</td><td>" . $row['courseName'] . "</td><td>" . $row['semester'] . "</td><td>" . $row['grade'] . "</td></tr>";
                          if($row['grade']=='A'){
                            array_push($gpa,4.0);
                          }
                          elseif($row['grade']=='A-'){
                            array_push($gpa,3.67);
                          }
                          elseif($row['grade']=='B+'){
                            array_push($gpa,3.33);
                          }
                          elseif($row['grade']=='B'){
                            array_push($gpa,3.00);
                          }
                          elseif($row['grade']=='B-'){
                            array_push($gpa,2.67);
                          }
                          elseif($row['grade']=='C+'){
                            array_push($gpa,2.33);
                          }
                          elseif($row['grade']=='C'){
                            array_push($gpa,2.00);
                          }
                          elseif($row['grade']=='D+'){
                            array_push($gpa,1.33);
                          }
                          elseif($row['grade']=='D'){
                            array_push($gpa,1.00);
                          }
                          elseif($row['grade']=='D-'){
                            array_push($gpa,0.67);
                          }
                          elseif($row['grade']=='F'){
                            array_push($gpa,0);
                          }
                      }
                  }
                  if(count($gpa)){
                    $gpa = array_filter($gpa);
                    $gpaAvg = array_sum($gpa)/count($gpa);
                    $gpaAvgF = number_format((float)$gpaAvg, 2, '.', '');
                    echo "<h4> GPA: " . $gpaAvgF . "</h4>";
                  }
                ?>
              </tbody>
            </table>
            </div>
         </div>
       </div>
      </body>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </html>
