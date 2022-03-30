<?php 
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
    $uploadOk = 1;
} else {
    $uploadOk = 0;
}
if ($_FILES["image"]["size"] > 500000) {
    $uploadOk = 0;
}
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $uploadOk = 0;
}
$name_image = $name.bin2hex(random_bytes(16)).".".$imageFileType;
$target_file = $target_dir.$name_image;

