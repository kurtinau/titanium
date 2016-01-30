<?php namespace App\Myclass;


use Aws\S3\S3Client;
use Storage;

class MyS3Tool{

	public static function getS3Path() {
		$s3 = S3Client::factory ( array (  
        'key' => 'AKIAI5Q4RNJ3FETYTZQQ',  
        'secret' => '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'   
) );
		$Bucket = 'youhaotaijin.titanium';
		$location = $s3->getBucketLocation([
    		'Bucket' => $Bucket, // REQUIRED
		]);
		$location = '-'.$location->get('Location');
		$host = $s3->getObjectUrl($Bucket,'/');
		$finalURL = substr_replace($host, $location, 10, 0);

		return $finalURL;

    }

    public static function getGlideServer(){
    	return \League\Glide\ServerFactory::create([
                'source'                => Storage::disk('s3')->getDriver(),
                'cache'                 => Storage::disk('local')->getDriver(),
                //'source_path_prefix'    => '',
                'cache_path_prefix'     => 'uploads/images/.cache',
                'base_url'              => 'img',
                'useSecureURLs'         => false,
                ]);
    }

}