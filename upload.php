<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Upload - Personal Cloud Storage</title>
</head>
<body>
    <header>
        <div class="container">
            <h1>Upload File</h1>
        </div>
    </header>
    <nav>
        <div class="container">
            <a href="dashboard.php">Home</a>
            <a href="file_manager.php">File Manager</a>
            <a href="upload.php">Upload</a>
            <a href="settings.php">Settings</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload" required>
            <input type="submit" value="Upload File" name="submit">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $target_dir = "files/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        ?>
    </div>
</body>
</html>
