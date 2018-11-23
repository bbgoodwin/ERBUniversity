<?php
 session_start();
 if (!isset($_SESSION["email"]) || ($_SESSION["userType"]!=2)) {
     include("logout.php");
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Research Staff Page</title>
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
              <li class="nav-item active">
                <a class="nav-link" href="viewUniversityGrades.php">View University Grades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewClassData.php">View Class Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewStudentInfo.php">View Student Information</a>
              </li>
            </ul>
            <form class="form-inline" action="logout.php">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
          </div>
        </nav>
        <div class="container">
          <div class="jumbotron">
            <?php
             echo '<h1>Welcome '.$_SESSION["email"].'</h1><br>'; ?>
             <div class="container">
               <div class="row">
                 <div class="col-sm">

                 </div>
                 <div class="col-sm">

                 </div>
                 <div class="col-sm">

                 </div>
               </div>
             </div>
            <table class="table table-striped table-dark">
              <tr>
                <th width="25%" scope="col">Course Name</th>
                <th width="25%" scope="col">CRN#</th>
                <th width="25%" scope="col">Semester</th>
                <th width="25%" scope="col">Grades</th>
              </tr>
            </table>
            <div style="height:450px; overflow-y: scroll;">
            <table class="table table-striped table-dark">
              <tbody>
                <?php
                $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
                $resId = $_SESSION["userId"];
                $query="SELECT courseName, grade, semester, crn FROM history";
                $result=mysqli_query($connect, $query);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                      ?><tr> <td width="25%"><?php echo $row["courseName"] ?></td> <?php
                      ?> <td width="25%"><?php echo $row["crn"] ?></td> <?php
                      ?> <td width="25%"><?php echo $row["semester"] ?></td> <?php
                      ?> <td width="25%"><?php echo $row["grade"] ?></td></tr> <?php
                    }
                }
                $getSem="SELECT DISTINCT semester FROM history";
                $semResult=mysqli_query($connect,$getSem);
                $row2=mysqli_fetch_array($semResult);
                foreach ($row2 as $sem) {
                    $gpaquery = "SELECT grade FROM history WHERE semester = $sem";
                    $gpaResult=mysqli_query($connect,$gpaquery);
                    $gpa=[];
                    if(mysqli_num_rows($gpaResult) > 0){
                      while($row3=mysqli_fetch_array($gpaResult)){
                        if($row3['grade']=='A'){
                          array_push($gpa,4.0);
                        }
                        elseif($row3['grade']=='A-'){
                          array_push($gpa,3.67);
                        }
                        elseif($row3['grade']=='B+'){
                          array_push($gpa,3.33);
                        }
                        elseif($row3['grade']=='B'){
                          array_push($gpa,3.00);
                        }
                        elseif($row3['grade']=='B-'){
                          array_push($gpa,2.67);
                        }
                        elseif($row3['grade']=='C+'){
                          array_push($gpa,2.33);
                        }
                        elseif($row3['grade']=='C'){
                          array_push($gpa,2.00);
                        }
                        elseif($row3['grade']=='D+'){
                          array_push($gpa,1.33);
                        }
                        elseif($row3['grade']=='D'){
                          array_push($gpa,1.00);
                        }
                        elseif($row3['grade']=='D-'){
                          array_push($gpa,0.67);
                        }
                        elseif($row3['grade']=='F'){
                          array_push($gpa,0);
                        }
                      }
                    }
                    if(count($gpa)){
                      $gpa = array_filter($gpa);
                      $gpaAvg = array_sum($gpa)/count($gpa);
                      $gpaAvgF = number_format((float)$gpaAvg, 2, '.', '');
                      echo "<h4>" . $sem . " GPA: " . $gpaAvgF . "</h4>";
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
