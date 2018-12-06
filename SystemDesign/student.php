<?php
 session_start();
 if (!isset($_SESSION["email"]) || ($_SESSION["userType"]!=4)) {
     include("logout.php");
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Student Page</title>
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
              <li class="nav-item active">
                <a class="nav-link" href="student.php">Student Homepage</a>
              </li>
              <li class="nav-item">
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
                <a class="nav-link" href="degreeAudit.php">Degree Audit</a>
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
                <?php echo '<h1>Welcome '.$_SESSION["email"].'</h1><br>'; ?>
                <h3>Student Detailed Schedule</h3> <br>
                <div>
                  <div class="row">
                    <div class="col-sm">
                      <form method="post">
                      <select class="" name="semester">
                        <option value="fall 2018">Fall 2018</option>
                        <option value="winter 2018">Winter 2018</option>
                      </select>
                      <input type="submit" name="submit" value="Choose"></input>
                      </form>
                    </div>
                    <div class="col-sm">

                    </div>
                    <div class="col-sm">

                    </div>
                  </div>
                <table class="table table-striped table-dark">
                  <tr>
                    <th width="10%" scope="col">CRN#</th>
                    <th width="10%" scope="col">Section</th>
                    <th width="20%" scope="col">Course Name</th>
                    <th width="20%" scope="col">Teacher</th>
                    <th width="20%" scope="col">Building</th>
                    <th width="10%" scope="col">Room#</th>
                    <th width="10%" scope="col">Time</th>
                    <th width="10%" scope="col">Semester</th>
                  </tr>
                </table>
                  <div style="height:450px; overflow-y: scroll;">
                  <table class="table table-striped table-dark">
                  <tbody>
                <?php
                  $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
                  $stuId = $_SESSION["userId"];
                  $query = "SELECT * FROM enrollment WHERE stuId = '$stuId' AND semester = 'fall 2018'";
                  $result = mysqli_query($connect, $query);
                  if(isset($_POST['semester'])){
                    $selectedSem=$_POST['semester'];
                    $difSem = "SELECT * FROM enrollment WHERE stuId = '$stuId' AND semester = '$selectedSem'";
                    $newResult = mysqli_query($connect, $difSem);
                    if (mysqli_num_rows($newResult) > 0) {
                      while ($row = mysqli_fetch_array($newResult)) {
                          $crn=$row['crn'];
                          $section=$row['section'];
                          $query2="SELECT * FROM class WHERE crn='$crn' AND section='$section'";
                          $result2=mysqli_query($connect, $query2);
                          while ($row2 = mysqli_fetch_array($result2)) {
                              $facultyid=$row2['facId'];
                              $getFacName="SELECT * FROM user WHERE userId=$facultyid";
                              $result4=mysqli_query($connect, $getFacName);
                              $row4=mysqli_fetch_array($result4);
                              $timeslotid=$row2['timeslotid'];
                              $getTimeSlot="SELECT * FROM timeslot WHERE timeslotid=$timeslotid";
                              $result3=mysqli_query($connect, $getTimeSlot);
                              $row3 = mysqli_fetch_array($result3);
                              ?><tr> <td width="10%"><?php echo $row["crn"]; ?></td> <?php
                              ?> <td width="10%"><?php echo $row2["section"]; ?></td> <?php
                              ?> <td width="20%"><?php echo $row2["courseName"]; ?></td> <?php
                              ?> <td width="20%"><?php echo $row4["fname"] . " " . $row4["lname"]; ?></td> <?php
                              ?> <td width="20%"><?php echo $row2["buildingname"]; ?></td> <?php
                              ?> <td width="10%"><?php echo $row2["roomNumber"]; ?></td> <?php
                              ?> <td width="10%"><?php echo $row3["dayId"] . " " . $row3['periodId']; ?></td> <?php
                              ?> <td width="10%"><?php echo $row2["semeYear"]; ?></td></tr> <?php
                          }
                      }
                  }
                  }
                  else{
                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result)) {
                          $crn=$row['crn'];
                          $section=$row['section'];
                          $query2="SELECT * FROM class WHERE crn='$crn' AND section='$section'";
                          $result2=mysqli_query($connect, $query2);
                          while ($row2 = mysqli_fetch_array($result2)) {
                              $facultyid=$row2['facId'];
                              $getFacName="SELECT * FROM user WHERE userId=$facultyid";
                              $result4=mysqli_query($connect, $getFacName);
                              $row4=mysqli_fetch_array($result4);
                              $timeslotid=$row2['timeslotid'];
                              $getTimeSlot="SELECT * FROM timeslot WHERE timeslotid=$timeslotid";
                              $result3=mysqli_query($connect, $getTimeSlot);
                              $row3 = mysqli_fetch_array($result3);
                              ?><tr> <td width="10%"><?php echo $row["crn"]; ?></td> <?php
                              ?> <td width="10%"><?php echo $row2["section"]; ?></td> <?php
                              ?> <td width="20%"><?php echo $row2["courseName"]; ?></td> <?php
                              ?> <td width="20%"><?php echo $row4["fname"] . " " . $row4["lname"]; ?></td> <?php
                              ?> <td width="20%"><?php echo $row2["buildingname"]; ?></td> <?php
                              ?> <td width="10%"><?php echo $row2["roomNumber"]; ?></td> <?php
                              ?> <td width="10%"><?php echo $row3["dayId"] . " " . $row3['periodId']; ?></td> <?php
                              ?> <td width="10%"><?php echo $row2["semeYear"]; ?></td></tr> <?php
                          }
                      }
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
            </div>
         </div>
       </div>
      </body>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </html>
