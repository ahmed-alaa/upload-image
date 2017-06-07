<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upload Image</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
    .row {
      padding-bottom: 10px;
    }
    label {
      display: block;
    }
  </style>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Upload Image</h1>
</div>

<!-- Handling success message -->  
<?php 
if($_GET['msg'] && $_GET['msg'] == 'success') { 
?>
<div class="alert alert-success">
  <strong>Success!</strong> Image uploaded successfully.
</div>
<?php 
} 
else if($_GET['msg']) {
  $msg = $_GET['msg'];
  switch ($msg) {
    case 'error-size':
      $msg = 'File size is too large';
      break;
    case 'error-not-image':
      $msg = 'File is not an image';
      break;
    default:
      $msg = 'Error in uploading file.';
      break;
  }

  ?>
  <div class="alert alert-danger">
    <strong>Error!</strong> <?php echo $msg; ?>
  </div>
<?php
} 
?>

<form action="upload.php" method="post" enctype="multipart/form-data">  
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <label>Title</label>
        <input required type="text" name="title" class="form-control" placeholder="Enter image title">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <label>Upload Image</label>
        <input required type="file" name="imageUpload" id="imageUpload">
      </div>
    </div>
    <input type="submit" class="btn btn-success" value="Upload Image" name="submit">
  </div>
</form>
<br/>
<?php
$dirname = "uploads/";
$images = glob($dirname."*.*");
if(sizeof($images) > 0) { ?>
<div class="jumbotron text-center">
  <h1>Images</h1>
</div>
<div class="row">
<?php
  foreach($images as $image) {
      echo '<div class="col-md-3"><img width="100%" src="'.$image.'" /></div>';
  }
}
?>
</div>
<br/>
</body>
</html>
