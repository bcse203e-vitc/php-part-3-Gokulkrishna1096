<?php
$uploadDir = "uploads/";

if (isset($_FILES['file'])) {
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileSize = $_FILES['file']['size'];

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (in_array($fileExtension, $allowedExtensions)) {
        if ($fileError === 0) {
            if ($fileSize <= 5 * 1024 * 1024) {
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $destination = $uploadDir . $fileName;
                if (move_uploaded_file($fileTmpName, $destination)) {
                    echo "<p>File uploaded successfully!</p>";
                    echo "<img src='" . $destination . "' width='200' alt='Uploaded Image'>";
                } else {
                    echo "<p>Failed to upload the file.</p>";
                }
            } else {
                echo "<p>File size exceeds the 5MB limit.</p>";
            }
        } else {
            echo "<p>Error uploading the file. Error code: $fileError</p>";
        }
    } else {
        echo "<p>Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <h1>Upload an Image</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="file">Choose an image to upload:</label><br>
        <input type="file" name="file" id="file" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
