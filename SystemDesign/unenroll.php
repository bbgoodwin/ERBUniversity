<?php
$connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
session_start();
if (!isset($_SESSION["email"])) {
    header("location:login.php?action=login");
}
if (isset($_POST["unenroll"])) {
    $CRN = mysqli_real_escape_string($connect, $_POST["CRN#"]);
    $userid=$_SESSION["userId"];
    $query = "DELETE FROM enrollment WHERE stuId=$userid AND crn=$CRN";
    if (mysqli_query($connect, $query)) {
        echo "Unenrollment successfull";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html>
     <head>
          <title>ERBUniveristy Unenroll Page</title>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     </head>
     <body>
          <br /><br />
          <div class="container" style="width:500px;">
               <h3 align="center">Unenroll From a Class</h3>
               <br />
               <form method="post">
                    <label>Enter CRN#</label>
                    <input type="text" name="CRN#" class="form-control" />
                    <br />
                    <input type="submit" name="unenroll" value="Unenroll" class="btn btn-info" />
                    <br />
               </form>
               <form class="form-inline" action="student.php">
                 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Back</button>
               </form>
          </div>
     </body>
</html>
