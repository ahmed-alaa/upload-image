<?php
/*
 * Handle Upload
 */
$dir = "uploads/";
$fileName = $_POST['title'];
$imageFileType = pathinfo($_FILES["imageUpload"]["name"],PATHINFO_EXTENSION);
$file = $dir . $fileName . "." . $imageFileType;//. basename($_FILES["imageUpload"]["name"]);

if(isset($_POST["submit"])) {
	$msg = '';

	// validate file is an image
    $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
    if($check === false) {
        $msg = "error-not-image";
    }

    // validat file size
    if ($_FILES["imageUpload"]["size"] > 500000 && empty($msg)) {
	    $msg = "error-size";
	}

	// Upload file	
	if (empty($msg)) {
		if(move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $file))
        	$msg = "success";
        else 
        	$msg = "error-failed";
    }

    header("Location:index.php?msg=".$msg);
}