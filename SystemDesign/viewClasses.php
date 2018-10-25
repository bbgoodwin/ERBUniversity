<?php
 session_start();
 if (!isset($_SESSION["email"]) || ($_SESSION["userType"]!=4)) {
     include("logout.php");
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>View Classes Page</title>
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
              <li class="nav-item">
                <a class="nav-link" href="viewGrades.php">View Grades</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="viewClasses.php">View Classes</a>
              </li>
            </ul>
            <form class="form-inline" action="logout.php">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
          </div>
        </nav>
        <div class="row">
          <div class="col-2">
            <div class="jumbotron">
              <p id=knowledge> Semester </p>
              <form class="form-inline" method="post">
              <select name="semester">
                <option value="Spring 2019">Spring 2019</option>
                <option value="Fall 2019">Fall 2019</option>
              </select> <br /> <br /> 
              <input type="submit" name="searchS" value="Filter"></input>
              </form>
              <p id=knowledge> Department </p>
              <form class="form-inline" method="post">
              <select name="department">
                <option value="CS">Computer Science</option>
                <option value="Math">Math</option>
                <option value="GYM">Fitness</option>
                <option value="SCI">Science</option>
                <option value="HIST">History</option>
                <option value="PSY">Pyschology</option>
                <option value="CHEM">Chemistry</option>
                <option value="ART">Art</option>
                <option value="PHY">Physics</option>
              </select> <br> <br>
                <input type="submit" name="searchD" value="Filter"></input>
              </form> <br> <br>
            </div>
           </div>
          <div class="col-8">
            <div class="jumbotron">
                          <h3>Classes</h3> <br>
                          <div>
                          <table class="table table-striped table-dark">
                            <tr>
                              <th scope="col">CRN#</th>
                              <th scope="col">Section</th>
                              <th scope="col">Course Name</th>
                              <th scope="col">Teacher</th>
                              <th scope="col">Building</th>
                              <th scope="col">Room#</th>
                              <th scope="col">Time</th>
                              <th scope="col">Semester</th>
                            </tr>
                            <tbody>
                          <?php
                          $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
                          if (isset($_POST['searchS'])) {
                              $selected=$_POST['semester'];
                              $query = "SELECT * FROM class WHERE semeYear='$selected'";
                              $result=filterTable($query);
                          }
                          elseif (isset($_POST['searchD'])) {
                              $selected=$_POST['department'];
                              $query = "SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName WHERE course.deptCode='$selected'";
                              $result=filterTable($query);
                          } else {
                              $query = "SELECT * FROM class";
                              $result=filterTable($query);
                          }
                            $stuId = $_SESSION["userId"];
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $crn=$row['crn'];
                                    $query2="SELECT * FROM class WHERE crn=$crn";
                                    echo "<tr><td>" . $row['crn'] . "</td>";
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
                                        echo "<td>" . $row2['section'] . "</td><td>" . $row2['courseName'] . "</td><td>" . $row4['fname'] . " " . $row4['lname'] . "</td><td>" . $row2['buildingname'] . "</td><td>" . $row2['roomNumber'] . "</td><td>" . $row3['dayId'] . " " . $row3['periodId'] . "</td><td>" . $row2['semeYear'] . "</td></tr>";
                                    }
                                }
                            }
                            function filterTable($query)
                            {
                                $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
                                $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                                return $result;
                            }
                          ?>
                        </tbody>
                      </table>
                   </div>
                 </div>
               </div>
               <div class="col-2"></div>
        </div>
      </body>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </html>
