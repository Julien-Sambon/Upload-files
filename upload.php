<?php

$target_dir = "upload/";

// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
    if (count($_FILES['fileToUpload']['name']) > 0) {
        for ($i = 0; $i < count($_FILES['fileToUpload']['name']); $i++) {
            $target_file = $target_dir . "image_" . basename($_FILES["fileToUpload"]["name"][$i]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $uploadOk[$i] = 1;
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
            if ($check !== false) {
                $uploadOk[$i] = 1;
            } else {
                echo "File is not an image.";
                $uploadOk[$i] = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk[$i] = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"][$i] > 1000000) {
                echo "Sorry, your file is too large.";
                $uploadOk[$i] = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk[$i] = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk[$i] == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                    echo "The file " . basename($_FILES["fileToUpload"]["name"][$i]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}
?>





