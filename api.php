<?php

require_once("sdk/vendor/autoload.php");
require_once('sdk/obs-autoloader.php');


// 声明命名空间
use Obs\ObsClient;


	class ObsStorageObjectApi
	{
		private $bucket;
		private $client;


		public function __construct($option) {
			$this->bucket = $option['bucket'];
			// 创建ObsClient实例
            $this->client = new ObsClient([
                'key' => $option['obs_key'],
                'secret' => $option['obs_secret'],
                'endpoint' => $option['endpoint'] ? $option['endpoint'] : 'obs.cn-east-2.myhuaweicloud.com'
            ]);
		}


		public function Upload($key, $localFilePath) {
		    try{
                $this->client -> putObject([
                    'Bucket' => $this->bucket,
                    'Key' => $key,
                    'SourceFile' => $localFilePath
                ]);
                return True;
            } catch (Obs\ObsException $obsException) {
                return False;
            }
		}


		public function Delete($keys) {
		    try{
                $this->client->deleteObject ( [
                    'Bucket' => $this->bucket,
                    'Key' => $keys
                ] );
                return True;
            } catch (Obs\ObsException $obsException) {
		        return False;
            }
		}


		public function hasExist($key) {
		    try {
                $this->client -> getObjectMetadata([
                    'Bucket' => $this->bucket,
                    'Key' => $key
                ]);
                return True;
            } catch (Obs\ObsException $obsException) {
                return False;
            }
		}


        function __destruct() {
            $this->client->close();
        }
	}
