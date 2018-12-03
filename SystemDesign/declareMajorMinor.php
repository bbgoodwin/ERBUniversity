<?php
 session_start();
 if (!isset($_SESSION["email"]) || ($_SESSION["userType"]!=4)) {
     include("logout.php");
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Major/Minor Page</title>
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
              <li class="nav-item">
                <a class="nav-link" href="degreeAudit.php">Degree Audit</a>
              </li>
              <li class="nav-item active">
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
            <?php
            $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
            $stuId = $_SESSION["userId"];
             ?>
                <h3>Declare Major and/or Minor</h3>
                <form class="form-inline" method="post" style="display: inline;">
                <p>
                <p id=knowledge> Major </p>
                  <select name="Major">
                    <option value=""></option>
                    <?php
                      $major="SELECT * FROM major";
                      $majorResult=mysqli_query($connect,$major);
                      while($row=mysqli_fetch_array($majorResult)){
                        echo "<option value=\"" . $row['majorcode'] . "\"> " . $row['majorname'] . "</option>";
                      }
                     ?>
                  </select>
                </p>
                <p>
                <p id=knowledge> Minor </p>
                  <select name="Minor">
                    <option value=""></option>
                    <?php
                      $minor="SELECT * FROM minor";
                      $minorResult=mysqli_query($connect,$minor);
                      while($row2=mysqli_fetch_array($minorResult)){
                        echo "<option value=\"" . $row2['minorcode'] . "\"> " . $row2['minorname'] . "</option>";
                      }
                     ?>
                  </select>
                </p>
                 <p>
                   <input type="submit" name="declare" value="Declare"></input>
                 </p>
                 </form>
                 <?php
                    if (isset($_POST['declare'])) {
                      $major=$_POST['Major'];
                      $minor=$_POST['Minor'];

                      $query="SELECT stuId FROM studentmajor WHERE stuId='$stuId'";
                      $result=mysqli_query($connect,$query);
                      $query2="SELECT stuId FROM studentminor WHERE stuId='$stuId'";
                      $result2=mysqli_query($connect,$query2);
                      if($major!=""){
                        if(mysqli_num_rows($result) > 0){
                          echo "You have already declared a major. <br>";
                          return;
                        }
                        else{
                          $changeMajor="INSERT INTO studentmajor(majorcode,stuId) VALUES ('$major','$stuId')";
                          if (mysqli_query($connect, $changeMajor)) {
                            $dep="SELECT deptCode FROM major WHERE majorcode='$major'";
                            $depResult=mysqli_query($connect,$dep);
                            $row=mysqli_fetch_array($depResult);
                            $deptCode=$row['deptCode'];
                            $update="UPDATE student SET deptCode='$deptCode' WHERE stuId='$stuId'";
                            if(mysqli_query($connect, $update)){
                              echo "Major Declared <br>";
                            }
                            else {
                              echo "Major Not Declared <br>";
                            }
                          }
                          else {
                            echo "Major Not Declared <br>";
                          }
                        }
                      }
                      if($minor!=""){
                        if(mysqli_num_rows($result2) > 0){
                          echo "You have already declared a minor. <br>";
                          return;
                        }
                        else{
                          $changeMinor="INSERT INTO studentminor(minorcode,stuId) VALUES ('$minor','$stuId')";
                          if (mysqli_query($connect, $changeMinor)) {
                            echo "Minor Declared <br>";
                          }
                          else {
                            echo "Minor Not Declared <br>";
                          }
                        }
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
