<h1> Upload file with PHP on Google Storage</h1>

<?php

require_once 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;


if ($_FILES['file']['error'] != 4) {
    printf("<p>Uploading file ");
    $fileContent = file_get_contents($_FILES["file"]["tmp_name"]);
    $cloudPath = $_FILES["file"]["name"];
    printf($cloudPath . "...</p>");
} else {
    printf("<p>Error: You must choose a file to upload</p>");
}

$projectId = 'cc2021-307109';

try {
    $storage = new StorageClient([
        'keyFilePath' => '/home/alvarez/cc2021-307109-d4d2a68e56b6.json'
    ]);

    $bucketName = 'depositocc2021';

    $bucket = $storage->bucket($bucketName);

    // upload/replace file 
    $storageObject = $bucket->upload(
        $fileContent,
        ['name' => $cloudPath]
        // if $cloudPath is existed then will be overwrite without confirmation
        // NOTE: 
        // a. do not put prefix '/', '/' is a separate folder name  !!
        // b. private key MUST have 'storage.objects.delete' permission if want to replace file !
    );


} catch (Exception $e) {
    // maybe invalid private key ?
    print '<p>' . $e . '</p>';

}

if ($storageObject != null) {
    printf("<p>OK: file uploads successly.</p>");
} else {
    printf("<p>Error: upload file fails.</p>");
}


?>

<p><a href="index.html">Back to home</a></p>