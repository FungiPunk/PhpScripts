<?php

    require 'vendor/autoload.php';

    use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;

    $filePath = 'The Linux Command Line.pdf';
    $bucketName = 'difusiontec-bucket';
    $keyName = 'documents/' . basename($filePath);

    $s3 = S3Client::factory(
        array(
            'version' => 'latest',
            'region' => 'us-west-1'
        )
        );
    
    try{
        
        // So you need to move the file on $filePath to a temporary place.
		// The solution being used: http://stackoverflow.com/questions/21004691/downloading-a-file-and-saving-it-locally-with-php
		if (!file_exists('/tmp/tmpfile')) {
			mkdir('/tmp/tmpfile');
		}

        $tempFilePath = '/tmp/tmpfile/' . basename($filePath);
		$tempFile = fopen($tempFilePath, "w") or die("Error: Unable to open file.");
		$fileContents = file_get_contents($filePath);
		$tempFile = file_put_contents($tempFilePath, $fileContents);

        $s3->putObject(
			array(
				'Bucket' => $bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $tempFilePath,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);

    }catch(S3Exception $e){
        echo $e->getMessage();
    }

?>