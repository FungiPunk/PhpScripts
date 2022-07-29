<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$bucket = 'difusiontec-bucket';
$keyname = 'images/linux_meme.png';

$s3 = new S3CLient([
    'version' => 'latest',
    'region' => 'us-west-1',
]);

try{

    $result = $s3->putObject([
        'Bucket' => $bucket,
        'Key' => $keyname,
        'Body' => 'Cursos_consultorias.png'
    ]);

    echo $result['ObjectURL'] . PHP_EOL;
     
} catch (S3Exception $e){
    echo $e ->getMessage() . PHP_EOL;
}

?>