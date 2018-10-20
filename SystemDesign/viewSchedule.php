<!DOCTYPE html>
<html>

<head>
  <title>ERBUniveristy Schedule Page</title>
  <link rel="stylesheet" href="general.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
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
session_start();
if (!isset($_SESSION["email"])) {
    header("location:login.php?action=login");
}
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
  <form class="form-inline" action="student.php">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Back</button>
  </form>
</body>

</html>
