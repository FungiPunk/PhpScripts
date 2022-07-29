<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$bucket = 'difusiontec-bucket/documents';
$keyname = 'test_object2';

$s3 = new S3CLient([
    'version' => 'latest',
    'region' => 'us-west-1',
]);

try {

    $result = $s3->getObject([
        'Bucket' => $bucket,
        'Key' => $keyname,
        'SaveAs' => $keyname
    ]);

} catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}

?>