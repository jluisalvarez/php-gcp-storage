<h1> Upload file with PHP on Google Storage</h1>

<?php

require_once 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;


if ($_FILES['file']['error'] != 4) {
    printf("<p>Uploading file ");
    $fileContent = file_get_contents($_FILES["file"]["tmp_name"]);
    $cloudPath = $_FILES["file"]["name"];
    printf($cloudPath . "...</p>");
    $projectId = 'ID_PROJECT';

    try {
        $storage = new StorageClient([
            'keyFilePath' => '/PATH/TO/FILE.JSON'
        ]);
    
        $bucketName = 'BUCKETNAME';
    
        $bucket = $storage->bucket($bucketName);
    
        $storageObject = $bucket->upload(
            $fileContent,
            ['name' => $cloudPath]
        );
    } catch (Exception $e) {
        // maybe invalid private key ?
        print '<p>' . $e . '</p>';
    }
    
} else {
    printf("<p>Error: You must choose a file to upload</p>");
}

if ($storageObject != null) {
    printf("<p>OK: file uploads successly.</p>");
} else {
    printf("<p>Error: upload file fails.</p>");
}


?>

<p><a href="index.html">Back to home</a></p>