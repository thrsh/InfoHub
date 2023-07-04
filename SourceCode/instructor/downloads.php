<?php

require_once("include/connection.php");

if (isset($_GET['file_id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['file_id']);

    // fetch file to download from database
    $sql = "SELECT * FROM upload_files WHERE ID=$id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $file = mysqli_fetch_assoc($result);
        $filepath = '../uploads/' . $file['NAME'];

        if (file_exists($filepath)) {
            // Determine the file's MIME type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $filepath);
            finfo_close($finfo);

            // Set appropriate headers based on MIME type
            header('Content-Description: File Transfer');
            header('Content-Type: ' . $mime_type);
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));

            // Read the file and output it to the browser
            readfile($filepath);

            // Update the download count
            $newCount = $file['DOWNLOAD'] + 1;
            $updateQuery = "UPDATE upload_files SET DOWNLOAD=$newCount WHERE ID=$id";
            mysqli_query($conn, $updateQuery);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Invalid file ID.";
    }
}

?>
