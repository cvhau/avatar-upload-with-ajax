<?php
require_once "../config.php";

$response = ['status' => 'failed'];

if (isset($_FILES['uploadAvatar'])) {
    $fileUpload = $_FILES['uploadAvatar'];
    $fileName = hash("md5", uniqid()) . "." . pathinfo($fileUpload['name'], PATHINFO_EXTENSION);
    $targetFile = rtrim(trim(IMAGE_DIR), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $fileName;
    move_uploaded_file($fileUpload['tmp_name'], $targetFile);
    $response['status'] = 'ok';
    $response['uploaded_url'] = getImageUrl($fileName);
} else {
    $response['message'] = "The uploaded file not found.";
}

echo json_encode($response);
