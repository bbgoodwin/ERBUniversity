<?php
$connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
session_start();
if (isset($_SESSION["email"])) {
    header("location:student.php");
}
if (isset($_POST["register"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo '<script>alert("Both Fields are required")</script>';
    } else {
        $email = mysqli_real_escape_string($connect, $_POST["email"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);
        $userType = mysqli_real_escape_string($connect, $_POST["userType"]);
        $fname = mysqli_real_escape_string($connect, $_POST["fname"]);
        $mname = mysqli_real_escape_string($connect, $_POST["mname"]);
        $lname = mysqli_real_escape_string($connect, $_POST["lname"]);
        $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
        $dob = mysqli_real_escape_string($connect, $_POST["dob"]);
        $country = mysqli_real_escape_string($connect, $_POST["country"]);
        $state = mysqli_real_escape_string($connect, $_POST["state"]);
        $city = mysqli_real_escape_string($connect, $_POST["city"]);
        $street = mysqli_real_escape_string($connect, $_POST["street"]);
        $zipcode = mysqli_real_escape_string($connect, $_POST["zipcode"]);
        $phone = mysqli_real_escape_string($connect, $_POST["phone"]);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user(userType, email, password, fname, mname, lname, gender, dob, country, state, city, street, zipcode, phone)
          VALUES ('$userType','$email','$password','$fname','$mname','$lname','$gender','$dob','$country','$state','$city','$street','$zipcode','$phone');";
        echo "$query";

        if (mysqli_query($connect, $query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    }
}
?>
<!DOCTYPE html>
<html>
     <head>
          <title>ERBUniveristy Register Page</title>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     </head>
     <body>
          <br /><br />
          <div class="container" style="width:500px;">
               <h3 align="center">Register Users</h3>
               <br />
               <form method="post">
                    <label>Enter email</label>
                    <input type="text" name="email" class="form-control" />
                    <br />
                    <label>Enter User Type</label>
                    <input type="text" name="userType" class="form-control" />
                    <br />
                    <label>Enter First Name</label>
                    <input type="text" name="fname" class="form-control" />
                    <br />
                    <label>Enter Middle Name</label>
                    <input type="text" name="mname" class="form-control" />
                    <br />
                    <label>Enter Last Name</label>
                    <input type="text" name="lname" class="form-control" />
                    <br />
                    <label>Enter Gender</label>
                    <input type="text" name="gender" class="form-control" />
                    <br />
                    <label>Enter Date of Birth</label>
                    <input type="text" name="dob" class="form-control" />
                    <br />
                    <label>Enter Country</label>
                    <input type="text" name="country" class="form-control" />
                    <br />
                    <label>Enter State</label>
                    <input type="text" name="state" class="form-control" />
                    <br />
                    <label>Enter City</label>
                    <input type="text" name="city" class="form-control" />
                    <br />
                    <label>Enter Street</label>
                    <input type="text" name="street" class="form-control" />
                    <br />
                    <label>Enter Zipcode</label>
                    <input type="text" name="zipcode" class="form-control" />
                    <br />
                    <label>Enter Phone Number</label>
                    <input type="text" name="phone" class="form-control" />
                    <br />
                    <label>Enter Password</label>
                    <input type="password" name="password" class="form-control" />
                    <br />
                    <input type="submit" name="register" value="Register" class="btn btn-info" />
                    <br />
               </form>
               <form class="form-inline" action="admin.php">
                 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Back</button>
               </form>
          </div>
     </body>
</html>
