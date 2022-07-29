<?php

namespace SomeNamespace;

require '/home/juca/Documents/PhpScripts/vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


$s3Client = new S3Client([
    'profile' => 'default',
    'region' => 'us-west-1',
    'version' => 'latest'
]);

//Listing all S3 Bucket
$buckets = $s3Client->listBuckets();
foreach ($buckets['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}

?>