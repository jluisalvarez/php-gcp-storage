<h1> Probando PHP con Google Storage</h1>

<?php

require_once 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

$projectId = 'cc2021-307109';

$storage = new StorageClient([
    'projectId' => $projectId
]);

$buckets = $storage->buckets([
]);
echo "<h2>Buckets</h2>";
foreach ($buckets as $bucket) {
    echo "<p>" . $bucket->name() . "</p>";
}

$bucketName = 'depositocc2021';
printf("<h2>Contenido Bucket " . $bucketName . "</h2>");
$bucket = $storage->bucket($bucketName);
$objects = $bucket->objects();
printf("<ul>");
foreach ($objects as $obj) {
    printf('<li><a href="https://storage.googleapis.com/' . $bucketName . '/' . $obj->name() . '">' . $obj->name()  . '</a></li>');
}
printf("</ul>");


?>
<p><a href="index.html">Back</a></p>
