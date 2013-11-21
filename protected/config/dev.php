<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'components'=>array(
            'db'=>array(
                'connectionString'   => 'mysql:host=localhost;dbname=',
				'emulatePrepare'     => true,
				'username'           => '',
				'password'           => '',
				'charset'            => 'utf8',
                'schemaCachingDuration' => 300, // 5 Minutes
                'enableProfiling'       => true,
                'enableParamLogging'    => true,
            ),
	        'log'=>array(
				'routes'=>array(
					array(
		                'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
		                'ipFilters'=>array('127.0.0.1'),
		            ),
				),
			),
        ),
        'params'=>array(
        	'Rollbar'=>array(
        		'AccessToken'=>'<Rollbar-AccessToken>',
        		'Environment'=>'Development',
        		'MaxErrno'=>'E_ALL ^ E_NOTICE',
        	),
        ),
    )
);