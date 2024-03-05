<?php
session_start();
$user1=false;
if(isset($_SESSION["log"])&& $_SESSION["log"]=true)
{
  $user1=true;
  $username=$_SESSION['name'];
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Blood Bank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="blood.php">Blood Status</a>
        </li>
        <?php
          if ($user1==true) {
          echo'  <li class="nav-item">
          <a class="nav-link" href="doner.php">Manage Doner</a>
        </li>';
          }
        ?>
      
      </ul>
      <?php
      
        
      
      if ($user1==true) {
       echo '<span style="
       font-family: cursive;
       font-size: 22px;
       padding-right: 9px;">'.$username.'</span><a href="logout.php" class="btn btn-outline-warning" style="margin-left: 10px;" >Log Out</a>';
       # code...
      }else {
        echo'<a href="login.php" class="btn btn-outline-primary" style="margin-left: 10px;">LogIn</a>';
      }
        ?>
    </div>
  </div>
</nav>