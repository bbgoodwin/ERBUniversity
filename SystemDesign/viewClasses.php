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
                <a class="nav-link" href="unenroll.php">Unenroll</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewGrades.php">View Grades</a>
              </li>
              <li class="nav-item active">
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
        <div class="row">
          <div class="col-2">
            <div class="jumbotron">
              <form class="form-inline" method="post">
              <p id=knowledge> Semester </p>
              <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
              <p><select name="semester">
                <option value="ALL">ALL</option>
                <option value="fall 2018">Fall 2018</option>
                <option value="spring 2018">Spring 2018</option>
                <option value="summer 2018">Summer 2018</option>
                <option value="winter 2018">Winter 2018</option>
                <option value="spring 2019">Spring 2019</option>
                <option value="fall 2019">Fall 2019</option>
                <option value="summer 2019">Summer 2019</option>
                <option value="winter 2019">Winter 2019</option> <br>
              </select> </p>  <br /> <br />
              <p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</p>
              <p id=knowledge> Time-Slot </p>
              <p><select name="timeslot">
                <option value="ALL">ALL</option>
                <option value="01">MW 8:00am-9:50am</option>
                <option value="02">MW 11:00am-12:50pm</option>
                <option value="03">MW 1:00pm-2:50pm</option>
                <option value="04">MW 3:00pm-4:50pm</option>
                <option value="05">MW 5:00pm-6:50pm</option>
                <option value="06">MW 7:00pm-8:50pm</option>
                <option value="07">TR 8:00am-9:50am</option>
                <option value="08">TR 11:00am-12:50pm</option>
                <option value="09">TR 1:00pm-2:50pm</option>
                <option value="10">TR 3:00pm-4:50pm</option>
                <option value="11">TR 5:00pm-6:50pm</option>
                <option value="12">TR 7:00pm-8:50pm</option>
                <option value="13">F 8:00am-9:50am</option>
                <option value="14">F 11:00am-12:50pm</option>
                <option value="15">F 1:00pm-2:50pm</option>
                <option value="16">F 3:00pm-4:50pm</option>
                <option value="17">F 5:00pm-6:50pm</option>
                <option value="18">F 7:00pm-8:50pm</option>
              </select> </p>  <br /> <br />
              <p id=knowledge> Department </p>
              <p> <select name="department">
                <option value="ALL">ALL</option>
                <option value="CS">Computer Science</option>
                <option value="MA">Math</option>
                <option value="BS">Biological Sciences</option>
                <option value="CP">Chemistry and Physics</option>
                <option value="HI">History</option>
                <option value="PY">Pyschology</option>
                <option value="EL">English</option>
                <option value="VA">Visual Arts</option>
              </select> </p>  <br> <br>
              <p>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                <input type="submit" name="search" value="Filter"></input>
              </form> <br> <br>
            </div>
           </div>
          <div class="col-8">
            <div class="jumbotron">
                          <h3>Classes</h3> <br>
                          <table class="table table-striped table-dark">
                            <tr>
                              <th width="75" scope="col">CRN#</th>
                              <th width="85" scope="col">Section</th>
                              <th width="253" scope="col">Course Name</th>
                              <th width="115" scope="col">Teacher</th>
                              <th width="160" scope="col">Building</th>
                              <th width="60" scope="col">Room#</th>
                              <th width="96" scope="col">Time</th>
                              <th scope="col">Semester</th>
                              <th scope="col">Seats</th>
                            </tr>
                          </table>
                          <div style="height:450px; overflow-y: scroll;">
                          <table class="table table-striped table-dark">
                            <tbody>
                          <?php
                          $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
                          if (isset($_POST['search'])) {
                              $selectedSem=$_POST['semester'];
                              $selectedDep=$_POST['department'];
                              $selectedTim=$_POST['timeslot'];
                              if ($selectedSem!='ALL' && $selectedDep!='ALL' && $selectedTim!='ALL') {
                                  $query = "SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName WHERE course.deptCode='$selectedDep' AND semeYear='$selectedSem' AND timeslotid='$selectedTim' ORDER BY semeYear DESC, class.courseName";
                              } elseif ($selectedSem!='ALL' && $selectedDep!='ALL') {
                                  $query = "SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName WHERE course.deptCode='$selectedDep' AND semeYear='$selectedSem' ORDER BY semeYear DESC, class.courseName";
                              } elseif ($selectedSem!='ALL' && $selectedTim!='ALL') {
                                  $query = "SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName WHERE semeYear='$selectedSem' AND timeslotid='$selectedTim' ORDER BY semeYear DESC, class.courseName";
                              } elseif ($selectedDep!='ALL' && $selectedTim!='ALL') {
                                  $query = "SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName WHERE course.deptCode='$selectedDep' AND timeslotid='$selectedTim' ORDER BY semeYear DESC, class.courseName";
                              } elseif ($selectedSem!='ALL') {
                                  $query = "SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName WHERE semeYear='$selectedSem' ORDER BY semeYear DESC, class.courseName";
                              } elseif ($selectedDep!='ALL') {
                                  $query = "SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName WHERE course.deptCode='$selectedDep' ORDER BY semeYear DESC, class.courseName";
                              } elseif ($selectedTim!='ALL') {
                                  $query = "SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName WHERE timeslotid='$selectedTim' ORDER BY semeYear DESC, class.courseName";
                              } else {
                                  $query = "SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName";
                              }

                              $result=filterTable($query);
                          } elseif (isset($_POST['searchD'])) {
                              $selected=$_POST['department'];
                              $query = "SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName WHERE course.deptCode='$selected' ORDER BY semeYear DESC, class.courseName";
                              $result=filterTable($query);
                          } else {
                              $query = "SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName ORDER BY semeYear DESC, class.courseName";
                              $result=filterTable($query);
                          }
                            $stuId = $_SESSION["userId"];
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $crn=$row['crn'];
                                    echo "<tr><td>" . $row['crn'] . "</td>";
                                        $facultyid=$row['facId'];
                                        $getFacName="SELECT * FROM user WHERE userId=$facultyid";
                                        $result4=mysqli_query($connect, $getFacName);
                                        $row4=mysqli_fetch_array($result4);
                                        $timeslotid=$row['timeslotid'];
                                        $getTimeSlot="SELECT * FROM timeslot WHERE timeslotid=$timeslotid";
                                        $result3=mysqli_query($connect, $getTimeSlot);
                                        $row3 = mysqli_fetch_array($result3);
                                        ?> <td width="85"> <?php
                                        echo $row['section'] . "</td><td>" . $row['courseName'] . "</td><td>" . $row4['fname'] . " " . $row4['lname'] . "</td><td>" . $row['buildingname'] . "</td>";
                                        ?> <td width="65"> <?php
                                        echo $row['roomNumber'] . "</td><td>" . $row3['dayId'] . " " . $row3['periodId'] . "</td><td>" . $row['semeYear'] . "</td><td>" . $row['seats'] . "</td></tr>";

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
                   </div> <br>
                   <div align="center">
                   <form method="post" >
                     <h3>Enroll in Class</h3>
                        <label>Enter CRN#</label>
                        <div style="width:100px;">
                        <input type="text" name="CRN#" class="form-control" />
                        </div>
                        <label>Enter Section</label>
                        <div style="width:100px;">
                        <input type="text" name="section" class="form-control" />
                        </div>
                        <br />
                        <input type="submit" name="enroll" value="Enroll" class="btn btn-info" />
                        <br /> <br>
                        <?php
                        error_reporting(0);
                        $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
                        if (isset($_POST["enroll"])) {
                            $stuId = $_SESSION["userId"];
                            $CRN = mysqli_real_escape_string($connect, $_POST["CRN#"]);
                            $section=mysqli_real_escape_string($connect, $_POST["section"]);
                            $check="SELECT * FROM class WHERE crn=\'CS5278\' AND section=\'1\'";
                            $errorCheck="SELECT * FROM enrollment WHERE crn='$CRN' AND stuId=$stuId AND section='$section'";
                            $errorCheck2="SELECT * FROM enrollment WHERE stuId=$stuId";
                            $holdCheck="SELECT * FROM holds WHERE stuId=$stuId";
                            $timeslotCheck="SELECT * FROM enrollment INNER JOIN class ON class.crn = enrollment.crn WHERE enrollment.stuId='$stuId'";
                            $preqCheck="SELECT * FROM course INNER JOIN class ON class.courseName = course.courseName WHERE class.crn='$CRN' AND course.prerequisite!='0'";
                            $preqCheckResult=mysqli_query($connect, $preqCheck);
                            $checkResult=mysqli_query($connect, $check);
                            $timeslotCheckResult=mysqli_query($connect, $timeslotCheck);
                            $errorCheckResult=mysqli_query($connect, $errorCheck);
                            $errorCheck2Result=mysqli_query($connect, $errorCheck2);
                            $holdCheckResult=mysqli_query($connect, $holdCheck);
                            if (mysqli_num_rows($holdCheckResult)>0) {
                                $row=mysqli_fetch_array($holdCheckResult);
                                if ($row['holdType']==1) {
                                    echo 'Financial Hold Placed on Account. Please Check Your Holds.';
                                    return;
                                } elseif ($row['holdType']==2) {
                                    echo 'Academic Hold Placed on Account. Please Check Your Holds.';
                                    return;
                                } elseif ($row['holdType']==3) {
                                    echo 'Diciplinary Hold Placed on Account. Please Check Your Holds.';
                                    return;
                                }
                            }
                            if (mysqli_num_rows($preqCheckResult)>0) {
                                $row=mysqli_fetch_array($preqCheckResult);
                                if ($row['prerequisite']>0) {
                                    $counter=0;
                                    $courseName=$row['courseName'];
                                    $preqCheck2="SELECT * FROM prerequisite WHERE courseName=$courseName";
                                    $history="SELECT * FROM history WHERE stuId=$stuId";
                                    $historyResult=mysqli_query($connect, $history);
                                    $preqCheck2Result=mysqli_query($connect, $preqCheck2);
                                    $row2=mysqli_fetch_all($preqCheck2Result, MYSQLI_ASSOC);
                                    $row3=mysqli_fetch_all($historyResult, MYSQLI_ASSOC);
                                    foreach ($row2 as $item) {
                                        foreach ($row3 as $item2) {
                                            if ($item['preqcourseName']==$item2['courseName']) {
                                                $counter++;
                                            }
                                        }
                                    }
                                } else {
                                    return;
                                }
                                if ($counter==$row['prerequisite']) {
                                } else {
                                    echo "You do not have the prerequisites for this class.";
                                    return;
                                }
                            } elseif (mysqli_num_rows($errorCheckResult) > 0) {
                                echo "Already Enrolled in this class.";
                                return;
                            } elseif (mysqli_num_rows($timeslotCheckResult) > 0) {
                                if (mysqli_num_rows($checkResult) > 0) {
                                    $row=mysqli_fetch_all($timeslotCheckResult, MYSQLI_ASSOC);
                                    $row2=mysqli_fetch_array($checkResult);
                                    foreach ($row as $item) {
                                        if ($item['timeslotid']==$row2['timeslotid']) {
                                            echo 'You are already registered for a class at this time.';
                                            return;
                                        }
                                    }
                                }
                            }
                            if (mysqli_num_rows($errorCheck2Result) > 3) {
                                echo "Max Credits Reached.";
                                return;
                            }
                            if (mysqli_num_rows($checkResult) > 0) {
                                $row=mysqli_fetch_array($checkResult);
                                if ($row['seats']==0) {
                                    echo 'There are no seats available for this class.';
                                    return;
                                }
                            }
                            $getSem = "SELECT * FROM class WHERE crn='$CRN' AND section='$section'";
                            $getSemResult = mysqli_query($connect, $getSem);
                            if (mysqli_num_rows($getSemResult) > 0) {
                                $row = mysqli_fetch_array($getSemResult);
                                $semester=$row['semeYear'];
                            }
                            $query = "INSERT INTO enrollment(stuId, crn, semester, section)
                                  VALUES ('$stuId','$CRN','$semester','$section')";
                            if (mysqli_query($connect, $query)) {
                              $update = "UPDATE class SET seats=seats-1 WHERE crn='$CRN' AND section='$section'";
                              if(mysqli_query($connect, $update)){
                                echo "Class Added to Schedule";
                              }
                              else{
                                echo "Could Not Add Class";
                              }
                            }
                            else {
                                echo "Incorrect CRN#";
                            }
                        }
                        ?>
                   </form>
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
