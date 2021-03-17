<h1> Probando PHP con Google Storage</h1>

<?php

require_once 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

$projectId = 'ID_PROJECT';

$storage = new StorageClient([
    'projectId' => $projectId
]);

$buckets = $storage->buckets([
]);
echo "<h2>Buckets</h2>";
foreach ($buckets as $bucket) {
    echo "<p>" . $bucket->name() . "</p>";
}

$bucketName = 'BUCKETNAME';
printf("<h2>Contents of Bucket " . $bucketName . "</h2>");
$bucket = $storage->bucket($bucketName);
$objects = $bucket->objects();
printf("<ul>");
foreach ($objects as $obj) {
    printf('<li><a href="https://storage.googleapis.com/' . $bucketName . '/' . $obj->name() . '">' . $obj->name()  . '</a></li>');
}
printf("</ul>");


?>
<p><a href="index.html">Back</a></p>
