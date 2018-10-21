<?php
$connect = mysqli_connect("localhost", "u224344528_rchiu", "ERBUniversity1", "u224344528_erbu");
session_start();
if (isset($_POST["login"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo '<script>alert("Both Fields are required")</script>';
    } else {
        $email = mysqli_real_escape_string($connect, $_POST["email"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $_SESSION["userId"] = $row["userId"];
                $_SESSION["userType"] = $row["usertype"];
                if (password_verify($password, $row["password"]) && $row["usertype"]=='4') {
                    $_SESSION["email"] = $email;
                    header("location:student.php");
                } elseif (password_verify($password, $row["password"]) && $row["usertype"]=='3') {
                    $_SESSION["email"] = $email;
                    header("location:faculty.php");
                } elseif (password_verify($password, $row["password"]) && $row["usertype"]=='2') {
                    $_SESSION["email"] = $email;
                    header("location:research.php");
                } elseif (password_verify($password, $row["password"]) && $row["usertype"]=='1') {
                    $_SESSION["email"] = $email;
                    header("location:admin.php");
                } else {
                    echo '<script>alert("Wrong User Details")</script>';
                }
            }
        } else {
            echo '<script>alert("Wrong User Details")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
     <head>
          <title>ERBUniveristy Login Page</title>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="general.css">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
          <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     </head>
     <body background="city.jpg">
       <nav class="navbar navbar-expand-lg navbar-dark">
         <a class="navbar-brand" href="index.html"> <img src="logo.png" alt="" height="60" width="60" > </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

         <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
           <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
             <li class="nav-item active">
               <a class="nav-link" href="index.html">Homepage<span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="admissions.html">Admissions</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="academics.html">Academics</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="about.html">About</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="https://www.oldwestbury.edu/sites/default/files/documents/Catalogs/2016-18/undergrad-catalog-16-18.pdf">Catalog</a>
             </li>
           </ul>
           <form class="form-inline" action="login.php">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
           </form>
           <form class="form-inline" action="register.php">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Register</button>
           </form>
         </div>
       </nav>
          <br /><br />
          <div class="container" style="width:500px;">
              <div class="jumbotron">
               <h2 align="center">ERBUniveristy Login Page</h2>
               <br />
               <br />
               <form method="post">
                    <label>Enter Email:</label>
                    <input type="text" name="email" class="form-control" />
                    <br />
                    <label>Enter Password:</label>
                    <input type="password" name="password" class="form-control" />
                    <br />
                    <input type="submit" name="login" value="Login" class="btn btn-info" />
                    <br />
               </form>
             </div>
          </div>
     </body>
</html>
