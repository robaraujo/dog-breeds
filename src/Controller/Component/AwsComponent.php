<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
use Aws\S3\S3Client;

class AwsComponent extends Component{
  public $config = null;
  public $s3 = null;

  public function initialize(array $config){
    parent::initialize($config);
    $this->config = [
        's3' => [
          'key' => 'YOUR_KEY',
          'secret' => 'YOUR_SECRET',
          'bucket' => 'YOUR_BUCKET',
        ]
    ];
    $this->s3 = S3Client::factory([
      'credentials' => [
        'key' => $this->config['s3']['key'],
        'secret' => $this->config['s3']['secret']
      ],
      'region' => 'eu-central-1',
      'version' => 'latest'
    ]);
  }
}