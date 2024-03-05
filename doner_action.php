<?php
include('database_connection.php');
if($_POST["action"] == "Update")
			{
				$doner_name = $_POST["doner_name"];
				$doner_id = $_POST["doner_id"];
				$doner_add = $_POST["doner_add"];
				$doner_gender = $_POST["gender"];
				$doner_mobo = $_POST["doner_mobo"];
				$doner_dod = $_POST["doner_dod"];
				$doner_bg = $_POST["doner_bg"];
				$doner_email = $_POST["doner_email"];
			
				if (empty($_FILES['doner_image']['name'])) {

					$qu="UPDATE `doner` SET `d_name` = '$doner_name', `d_gender` = '$doner_gender', `d_bgroup` = '$doner_bg', `d_mobile` = '$doner_mobo', `d_email` = '$doner_email', `d_add` = '$doner_add', `d_date` = '$doner_dod' WHERE `doner`.`d_id` = '$doner_id'";

					$query=mysqli_query($conn,$qu);
					if ($query){
						header("Location: doner.php?update=1");
					}
					else {
						header("Location: doner.php?update=0");
					}

				}
				else{
					 $doner_image = $_FILES["doner_image"];
					 $filename=$doner_image['name'];
					 $fileext=explode('.',$filename);
					 $filecheck=strtolower(end($fileext));
					 $fileextedd=array('png','jpg','jpeg');
					if (in_array($filecheck,$fileextedd)) {
						   $destinationfile='upload/'.$filename;
						   move_uploaded_file($doner_image['tmp_name'],$destinationfile);
							$qu="UPDATE `doner` SET `d_name` = '$doner_name', `d_gender` = '$doner_gender',`d_image`='$destinationfile', `d_bgroup` = '$doner_bg', `d_mobile` = '$doner_mobo', `d_email` = '$doner_email', `d_add` = '$doner_add', `d_date` = '$doner_dod' WHERE `doner`.`d_id` = '$doner_id'";

							$query=mysqli_query($conn,$qu);
							if ($query){
								header("Location: doner.php?update=1");
							}
							else {
								header("Location: doner.php?update=0");
							}
					  }
				}
			}
if($_POST["action"] == "edit_fetch")
	{ $id=$_POST["doner_id"];
		$q1="SELECT * FROM doner WHERE d_id='$id'";
            $query1=mysqli_query($conn,$q1);
            while ($result=mysqli_fetch_array($query1)) {
				$output["doner_name"] = $result["d_name"];
				$output["doner_add"] =  $result["d_add"];
				$output["doner_dod"] = $result["d_date"];
				$output["doner_bg"] =  $result["d_bgroup"];
				$output["doner_gender"] = $result["d_gender"];
				$output["doner_mobo"] =  $result["d_mobile"];
				$output["doner_email"] = $result["d_email"];
				$output["doner_photo"] =  $result["d_image"];
			}
			echo json_encode($output);
		
	}
	if($_POST["action"] == 'Add')
	{		
		
			$doner_name = $_POST["doner_name"];
			$doner_add = $_POST["doner_add"];
			$doner_gender = $_POST["gender"];
			$doner_mobo = $_POST["doner_mobo"];
			$doner_dod = $_POST["doner_dod"];
			$doner_bg = $_POST["doner_bg"];
			$doner_email = $_POST["doner_email"];
			$doner_image = $_FILES["doner_image"];
		$filename = $doner_image['name'];
		$fileext = explode('.', $filename);
		$filecheck = strtolower(end($fileext));
		$fileextedd = array('png', 'jpg', 'jpeg');
		if (in_array($filecheck, $fileextedd)) {
			$temp = explode(".", $_FILES["doner_image"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			$destinationfile = 'upload/' . $newfilename;
			move_uploaded_file($_FILES["doner_image"]["tmp_name"], $destinationfile);
			
			echo '<img src="' . $destinationfile . '" alt="">';
        	
				echo $doner_name ."<br>";
				echo $doner_add ."<br>";
				echo $doner_gender ."<br>";
				echo $doner_mobo ."<br>";
				echo $doner_dod ."<br>";
				echo $doner_bg ."<br>";
				echo $doner_email ."<br>";
				
			   }
	
 $q="INSERT INTO `doner`(`d_name`, `d_gender`, `d_bgroup`, `d_mobile`, `d_email`, `d_image`, `d_add`, `d_date`) VALUES ('$doner_name','$doner_gender','$doner_bg','$doner_mobo','$doner_email','$destinationfile','$doner_add','$doner_dod')";
				$query=mysqli_query($conn,$q);
				if ($query){
					$q1="update `blood`set status = status + 1 WHERE `id` ='$doner_bg'";
				$query1=mysqli_query($conn,$q1);
					
					header("Location: doner.php?insert=1");
				}
				else {
					header("Location: doner.php?insert=0");
				}
			   }
	
	if($_POST["action"] == "delete")
	{	$doner_id = $_POST["doner_id"];
		echo $doner_id;
		$q_dele = "DELETE FROM doner WHERE d_id ='$doner_id'";
		// echo $student_id.$q_dele;
		$query=mysqli_query($conn,$q_dele);
		if ($query)
		{
			header("Location: doner.php?delete=1");
		}
		else 
		{
			header("Location: doner.php?delete=0");
		}
	}
	
// echo $_POST["student_class_id"];
// echo $_POST["student_email"];
