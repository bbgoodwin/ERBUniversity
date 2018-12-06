<?php
 session_start();
 if (!isset($_SESSION["email"]) || ($_SESSION["userType"]!=4)) {
     include("logout.php");
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Degree Audit Page</title>
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
              <li class="nav-item">
                <a class="nav-link" href="viewClasses.php">View Classes/Enroll in Class</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewHolds.php">View Holds</a>
              </li>
              <li class="nav-item active">
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
            <div class="row">
              <div class="col-sm">
              Current Credits:
              <?php
              $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
              $stuId = $_SESSION["userId"];
              $query="SELECT numberOfCredits FROM student WHERE stuId='$stuId'";
              $major="SELECT major.majorname FROM studentmajor INNER JOIN major ON major.majorcode = studentmajor.majorcode WHERE stuId='$stuId'";
              $majorResult=mysqli_query($connect,$major);
              $queryResult=mysqli_query($connect, $query);
              if(mysqli_num_rows($queryResult)>0){
                $row=mysqli_fetch_array($queryResult);
                $credits = $row['numberOfCredits'];
                echo $credits;
              }
              ?>
            </div>
            <div class="col-sm">
              Total Credits Needed: 120
            </div>
            <div class="col-sm">
              Credits Remaining: <?php echo (120-intval($credits)); ?>
            </div>
          </div> <br>
          <?php
          if(mysqli_num_rows($majorResult)){
            $majorRow=mysqli_fetch_array($majorResult);
            echo "Major: " . $majorRow['majorname'];
          }
          else{
            echo "No Major Declared";
          }
          ?>
          <table class="table table-striped table-dark">
            <tr>
              <th width="50%" scope="col">Course Name</th>
              <th width="50%" scope="col">Taken?</th>
            </tr>
          </table>
              <div style="height:450px; overflow-y: scroll;">
              <table class="table table-striped table-dark">
              <tbody>
            <?php
            $getCourseHistory =  "SELECT DISTINCT class.courseName FROM history INNER JOIN class ON class.crn = history.crn AND class.section = history.section WHERE stuId='$stuId' ORDER BY courseName ASC";
            $getCourseHistoryResult=mysqli_query($connect,$getCourseHistory);
            if(mysqli_num_rows($getCourseHistoryResult)){
                while ($row=mysqli_fetch_array($getCourseHistoryResult)) {
                  ?><tr> <td width="50%"><?php echo $row["courseName"] ?></td><td>&#10004;</td> <?php
                }
            }
            $major="SELECT majorcode FROM studentmajor WHERE stuId=$stuId";
            $majorResult=mysqli_query($connect,$major);
            $majorRow=mysqli_fetch_array($majorResult);
            $majorcode=$majorRow["majorcode"];
            $getCoursesNotTaken = "SELECT courseName FROM majorcurriculum WHERE majorcode='$majorcode' AND courseName NOT IN (SELECT class.courseName FROM history INNER JOIN class ON class.crn = history.crn AND class.section = history.section WHERE stuId='$stuId')";
            $result = mysqli_query($connect,$getCoursesNotTaken);
            if(mysqli_num_rows($result)){
              while($row2=mysqli_fetch_array($result)){
                ?><tr> <td width="50%"><?php echo $row2["courseName"] ?></td><td></td> <?php
              }
            }
            ?>
          </tbody>
        </table>
         </div>
       </div>
      </body>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </html>
