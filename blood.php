<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>!</title>
</head>

<body style="background: #000000;">
<?php
include "nav.php";
?>
    <div class="container my-4" id="ques">
        <div class="row my-4" style="
    margin: auto;
    width: 950px;
">
<h2 style="margin: 22px 19px; color: aliceblue;" align="center">Check Blood Status</h2>

<?php
include('database_connection.php');
              $q1 = "SELECT * FROM `blood`";
              $query1 = mysqli_query($conn, $q1);
              while ($result = mysqli_fetch_array($query1))
               {
                   $bg=$result['blood_group'];
                   $bv=$result['volume'];
                   $bs=$result['status'];
               echo '<div class="col-md-4 my-2"style="width: 230px;">
               <div class="card" style="width: 166px;">
                   <img src="blood.jpg" class="card-img-top" alt="image" style="border-bottom: 1px solid red;width: 161px;">
                   <div class="card-body text-center">
                       <h5 class="card-title">' .$bg. '</h5>
                       <p class="card-text"> ' .$bs*$bv. ' ml</p>
                   </div>
               </div>
           </div>';
               
                }
   ?>
              
           
        </div>
    </div>
  
    <footer class="page-footer font-small blue" style="
    background: #f8f9fa;
">
<div class="footer-copyright text-center py-3">© 2021 Copyright
</div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>