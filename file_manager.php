<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>File Manager - Personal Cloud Storage</title>
</head>
<body>
    <header>
        <div class="container">
            <h1>File Manager</h1>
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
        <h2>Manage your files</h2>
        <table>
            <tr>
                <th>File Name</th>
                <th>Action</th>
            </tr>
            <?php
            $dir = "files/";
            if (is_dir($dir)){
                if ($dh = opendir($dir)){
                    while (($file = readdir($dh)) !== false){
                        if ($file != "." && $file != "..") {
                            echo "<tr>";
                            echo "<td>$file</td>";
                            echo "<td><a href='download.php?file=$file'>Download</a> | <a href='delete.php?file=$file'>Delete</a></td>";
                            echo "</tr>";
                        }
                    }
                    closedir($dh);
                }
            }
            ?>
        </table>
    </div>
</body>
</html>
