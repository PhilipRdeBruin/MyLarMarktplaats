
<?php

$msg = "Hallo again";
echo '<script type="text/javascript">alert("' . $msg . '")</script>';
die();

    // Set initiele parameters
    $target_dir = "advertenties/fotos/";
    $max_size = 1000 * 2048;

    // Check if image file is a actual image or fake image
    $target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
    $uploadOk = 1;
    $image_filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["file_to_upload"]["tmp_name"]);

    if($check === false) {
        phpAlert("File is not an image.");
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        phpAlert("Sorry, file already exists.");
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file_to_upload"]["size"] > $max_size) {
        phpAlert("Sorry, your file is too large.");
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($image_filetype != "jpg" && $image_filetype != "png"
        && $image_filetype != "jpeg" && $image_filetype != "gif" ) {
        phpAlert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        phpAlert("Sorry, your file was not uploaded.");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {
            $uploadbestand = basename($_FILES["file_to_upload"]["name"]);
            $_SESSION['uploadfotos'] = $_SESSION['uploadfotos'] . ";" . $target_file;
        } else {
            phpalert("Sorry, there was an error uploading your file.");
        }
    }
?>
