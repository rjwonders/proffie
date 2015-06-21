<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'db' => require(__DIR__ . '/db.php'),
		'easyImage' => [
			'class' => 'common\extensions\easyimage\EasyImage',
			'driver' => 'GD',
			//'quality' => 100,
			//'cachePath' => '/assets/easyimage/',
			//'cacheTime' => 2592000,
			//'retinaSupport' => false,
		 ],
    ],
];
