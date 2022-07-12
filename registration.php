<?php

  // Include database connection file

  require_once('config.php');

  if (isset($_POST['submit'])) {
    
    $nationality = $con->real_escape_string($_POST['nationality']);
    $password = $con->real_escape_string(md5($_POST['password']));
    $name     = $con->real_escape_string($_POST['name']);
    $ic       = $con->real_escape_string($_POST['ic']);
    $email    = $con->real_escape_string($_POST['email']);
    $age      = $con->real_escape_string($_POST['age']);
    $gender   = $con->real_escape_string($_POST['gender']);

    $query  = "INSERT INTO user (name,nationality,password,gender,ic,email,age) VALUES ('$name','$age','$nationality','$password','$gender','$ic','$email')";
    $result = $con->query($query);

    if ($result==true) {
      header("Location:index.html");
      die();
    }else{
      $errorMsg  = "You are not Registred..Please Try again";
    }   

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>JOMRUN Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<div class="card text-center" style="padding:20px;">
  <h3>JOMRUN Registration</h3>
</div><br>

<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">      
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <form action="" method="POST">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
          </div>
          <div class="form-group">  
            <label for="nationality">Nationality:</label>
            <input type="text" class="form-control" name="nationality" placeholder="Enter Nationality" required="">
          </div>
          <div class="form-group">
            <label for="ic">IC Number:</label>
            <input type="text" class="form-control" name="ic" placeholder="Enter IC" required="">
          </div>
          <div class="form-group">  
            <label for="email">Email Address:</label>
            <input type="text" class="form-control" name="email" placeholder="Enter Email" required="">
          </div>
          <div class="form-group">  
            <label for="age">Age:</label>
            <input type="text" class="form-control" name="age" placeholder="Enter age" required="">
          </div>
          <div class="form-group">  
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
          </div>
          <div class="form-group">  
            <label for="gender">Gender:</label>
            <select class="form-control" name="gender" required="">
              <option value="">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <p>Already have account ?<a href="index.html"> Homepage</a></p>
            <input type="submit" name="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
  </div>
</div>
</body>
</html>