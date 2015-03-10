<?php
// Start the session
session_start();
include ('./util.php'); 

//file_uploads = On;

if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['contrasena'])){
	header('location:registro.php?msg=3');
}
if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
  if (isSet($_POST['nombre']) && isSet($_POST['apellido']) && isSet($_POST['correo']) && isSet($_POST['usuario']) && isSet($_POST['contrasena'])) {
        $cant[1] = $_POST['nombre'];
        $cant[2] = $_POST['apellido'];
        $cant[3] = $_POST['correo'];
        $cant[4] = $_POST['usuario'];
		$cant[5] = $_POST['contrasena'];
		$cant[6] = $_POST['user_rol_id'];

        $nombre = $cant[1];
        $apellido = $cant[2];
        $correo = $cant[3];
        //-------------------------------------------------
        
        $target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$cant[7] = $target_file;
		insertar($cant);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		       		
		
		             header('location:perfil_admin.php?msg=1');
 
		
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

        
        //-----------------------------------------------
         
    }else{
    	header('location:perfil_admin.php?msg=2');
    }
}else{
	header('location:registro.php?msg=4');
}


?>