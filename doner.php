<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="bootstrap.min.css">

  <script>
    var std_d = 0;
  </script>
  <style>
    .form-check {
      display: block;
      min-height: 1.5rem;
      padding-left: 3.3em;
      margin-bottom: .125rem;
    }
  </style>
</head>

<body>
<?php
  include ('nav.php');
?>
  <h1 align ="center">Manage Doner</h1>

  <?php
  include('database_connection.php');
  $uid = 0;
  $did = 0;
  if (isset($_GET["insert"])) {
    if ($_GET["insert"] == 1) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success!</strong> New Doner Added Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Doner Not Added.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
  }

  if (isset($_GET["update"])) {
    if ($_GET["update"] == 1) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success!</strong> Doner Updated Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Doner Not Updated.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
  }
  if (isset($_GET["delete"])) {
    if ($_GET["delete"] == 1) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success!</strong> Doner Deleted Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Doner Not Deleted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
  }
  ?>
  <div class="container" style="margin-top:30px">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-9">Doner List</div>
          <div class="col-md-3" align="right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_button">Add</button>
          </div>
        </div>
      </div>
    </div>
      
        <div class="table-responsive">
          <span id="message_operation"></span>
          <table class="table table-striped table-bordered" id="student_table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Blood Group</th>
                <th>Gender</th>
                <th>Date</th>
                <th>Email</th>
                <th>Image</th>
                <th>Edit</th>

              </tr>
            </thead>
            <tbody>
            	<!-- d_name	d_gender	d_bgroup	d_mobile	d_email	d_image d_add d_date -->


              <?php
              $q1 = "SELECT * FROM doner";
              $query1 = mysqli_query($conn, $q1);
              while ($result = mysqli_fetch_array($query1)) {
                echo '
                <tr>
                <td>' . $result["d_name"] . '</td>
                <td>' . $result["d_add"] . '</td>';
                $c_group=$result["d_bgroup"];
                $q2 = "SELECT * FROM blood WHERE id ='$c_group'";
                $query2 = mysqli_query($conn, $q2);
                while ($result1 = mysqli_fetch_array($query2)) {

                  echo '<td>' . $result1["blood_group"] . '</td>';
                }

                echo '<td>' . $result["d_gender"] . '</td>
                <td>' . $result["d_date"] . '</td>
                <td>' . $result["d_email"] . '</td>
                <td><img src="' . $result["d_image"] . '" width="100px"></td>
                <td>
                <button type="button" onclick="fun_edit(' . $result["d_id"] . ')" class="btn btn-primary mx-1" id="std' . $result["d_id"] . '">Edit</button>
                <button type="button" onclick="fun_delete(' . $result["d_id"] . ')" class="btn btn-primary mx-1" id="std' . $result["d_id"] . '">Delete</button>
                </td>
                </tr>';
              }
              ?>

            </tbody>
          </table>

        </div>
  </div>


  <!-- delete-->
  <div class="modal fade" id="dp_button" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="doner_action.php" method="post">
            <h2 align="center"> delete</h2>
            <h2 align="center" id="d_name">Hello, world!</h2>
            <input type="hidden" id="dd_id" name="doner_id">
            <input type="hidden" id="action" name="action" value="delete">
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Delete Doner</button>
              </div>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal For update -->
  <div class="modal fade" id="up_button" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Doner</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="doner_action.php" method="post" id="d_form" enctype="multipart/form-data">
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Name <span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <input type="text" name="doner_name" id="dd_name" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Address <span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <input type="text" name="doner_add" id="d_add" class="form-control" required>     
                 
                </div>
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Doner Gender</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="d_male" value="male">
                      <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="d_female" value="female">
                      <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                  </div>
                </div>
            </fieldset>
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Mobile No.<span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <input type="text" id="d_mobo" name="doner_mobo" required>
                </div>
              </div>
            </div>
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">DOD<span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <input type="date" id="d_dod" name="doner_dod" required>
                </div>
              </div>
            </div>
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Blood Group<span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <select name="doner_bg" id="d_bg" class="form-control">
                    <option value="">Select Blood Group</option>
                    <?php
              $q1 = "SELECT * FROM blood";
              $query1 = mysqli_query($conn, $q1);
              while ($result = mysqli_fetch_array($query1)) {
                echo '
                <option value="' . $result["id"] . '">' . $result["blood_group"] . '</option>';
              }

            ?>
                    </select>
                 
                </div>
              </div>
            </div>

            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Email <span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <input type="email" name="doner_email" id="d_email" class="form-control" required>
                </div>
              </div>
            </div> 
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Photo <span class="text-danger"><span>*</label>
                <div class="col-md-8">
                <img id="d_image" src="" width="100px">
                  <input type="file" class="form-control-file" name="doner_image" >
                </div>
              </div>
            </div>
            <input type="hidden" id="action" name="action" value="Update">
            <input type="hidden" id="doner_id" name="doner_id">
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update Doner</button>
              </div>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Modal For Add -->
  <div class="modal fade" id="add_button" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Doner</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="doner_action.php" method="post" id="doner_form" enctype="multipart/form-data">
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Name <span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <input type="text" name="doner_name" id="doner_name" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Address <span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <input type="text" name="doner_add" id="doner_add" class="form-control" required>
                 
                </div>
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Doner Gender</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                      <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                      <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                  </div>
                </div>
            </fieldset>
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Mobile No.<span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <input type="text" id="doner_mobo" name="doner_mobo" required>
                </div>
              </div>
            </div>
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">DOD<span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <input type="date" id="doner_dod" name="doner_dod" required>
                </div>
              </div>
            </div>
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Blood Group<span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <select name="doner_bg" id="doner_bg" class="form-control">
                    <option value="">Select Blood Group</option>
                    <?php
              $q1 = "SELECT * FROM blood";
              $query1 = mysqli_query($conn, $q1);
              while ($result = mysqli_fetch_array($query1)) {
                echo '
                <option value="' . $result["id"] . '">' . $result["blood_group"] . '</option>';
              }

            ?>
                    </select>
                 
                </div>
              </div>
            </div>

            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Email <span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <input type="email" name="doner_email" id="doner_email" class="form-control" required>
                </div>
              </div>
            </div> 
            <div class="form-group my-2">
              <div class="row">
                <label class="col-md-4 text-right">Doner Photo <span class="text-danger"><span>*</label>
                <div class="col-md-8">
                  <input type="file" class="form-control-file" name="doner_image" id="doner_image" required>
                </div>
              </div>
            </div>
            <input type="hidden" id="action" name="action" value="Add">
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add Doner</button>
              </div>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
        <!-- nav bar end-->    </div>
</body>

</html>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<script>
  function fun_edit(idd) {
    doner_id = idd;
    console.log(idd);
    $.ajax({
      url: "doner_action.php",
      method: "POST",
      data: {
        action: 'edit_fetch',
        doner_id: doner_id
      },
      dataType: "json",
      success: function(data) {
        console.log(data.doner_name);
        console.log(data.doner_email);
        $('#dd_name').val(data.doner_name);
        $('#d_add').val(data.doner_add);
        if (data.doner_gender == "male") {
          $("#d_male").prop("checked", true);
        } else {
          $("#d_female").prop("checked", true);
        }
        $('#d_mobo').val(data.doner_mobo);
        $('#d_dod').val(data.doner_dod);
        $('#d_bg').val(data.doner_bg);
        $('#doner_id').val(doner_id);
        $('#d_email').val(data.doner_email);
        $("#d_image").attr("src", data.doner_photo);
        $('#up_button').modal('show');
      }
    })
  }

  function fun_delete(idd) {
    doner_id = idd;
    console.log(idd);
    $.ajax({
      url: "doner_action.php",
      method: "POST",
      data: {
        action: 'edit_fetch',
        doner_id: doner_id
      },
      dataType: "json",
      success: function(data) {
        $('#d_name').html("");
        $('#d_name').append(data.doner_name);
        $('#dd_id').val(doner_id);
        $('#dp_button').modal('show');
      }
    })
  }
</script>

</body>

</html>