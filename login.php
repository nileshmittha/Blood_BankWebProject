<?php
  include('database_connection.php');
  $log=0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM `admin` WHERE email='$email'and password='$pass'";
  //  echo $sql;
    $result = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);
    if ($numrow > 0) {
        $row = mysqli_fetch_row($result);
        echo "loged";
        session_start();
        $_SESSION['log'] = true;
        $_SESSION['name'] = $row[1];
        $_SESSION['email'] = $row[2];
        header('Location: doner.php');
    } else {
      $log=1;
    }
}
  ?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="bootstrap.min.css">


    <title>Hello, world!</title>
  </head>
  <body>
  <?php
include "nav.php";
?>
<div class="container">
<form style="
    width: 350px;
    background: #b1d8ff;
    margin:50px auto;
    border-radius: 32px;
    border: 9px solid #f8f9fa;
    padding: 40px;
" action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" require>
  </div>
 
 <br>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password" require>
  </div>
 <br>
 <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form></div>
<footer class="page-footer font-small blue" style="
    background: #f8f9fa;
">
<?php
  if($log==1){
    echo'<h1 align="center" >Worng User Id or Password</h1>';
  }
?>
<div class="footer-copyright text-center py-3">© 2021 Copyright
</div>
</footer>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
