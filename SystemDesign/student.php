<?php
 session_start();
 if (!isset($_SESSION["email"])) {
     header("location:login.php?action=login");
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
                <a class="nav-link" href="enroll.php">Add Class<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="unenroll.php">Remove Class</a>
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
                <h3>Student Detailed Schedule</h3>
                <table class="table table-striped">
                  <tr>
                    <th scope="col">CRN#</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Faculty ID</th>
                    <th scope="col">Room ID</th>
                    <th scope="col">Period</th>
                    <th scope="col">Day</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Year</th>
                  </tr>
                  <tbody>
                <?php
                  $connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
                  $stuId = $_SESSION["userId"];
                  $query = "SELECT * FROM enrollment WHERE stuId = '$stuId'";
                  $result = mysqli_query($connect, $query);
                  if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result)) {
                          $crn=$row['crn'];
                          $query2="SELECT * FROM class WHERE crn=$crn";
                          echo "<tr><td>" . $row['crn'] . "</td><td>" . $row['semester'] . "</td>";
                          $result2=mysqli_query($connect, $query2);
                          while ($row2 = mysqli_fetch_array($result2)) {
                              echo "<td>" . $row2['facId'] . "</td><td>" . $row2['roomId'] . "</td><td>" . $row2['period'] . "</td><td>" . $row2['day'] . "</td><td>" . $row2['semester'] . "</td><td>" . $row2['year'] . "</td></tr>";
                          }
                      }
                  } else {
                      echo '<script>alert("Wrong User Details")</script>';
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
