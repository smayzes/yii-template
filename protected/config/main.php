<?php
date_default_timezone_set('America/Vancouver');

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	//'theme'=>'bootstrap',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii Template',
	//'sourceLanguage' => 'xx',
	//'language' => 'en',

	// preloading 'log' component
	'preload'=>array('log','rollbar'),
	// path aliases

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
			'application.components.Rollbar.*',
		'application.helpers.*',
		'application.vendor.*',
			'application.vendor.PHPPass.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'<gii-password>',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('<your-ip>'),
		),
	),

	'behaviors'=>array(
        'onBeginRequest' => array(
            'class' => 'application.components.Behaviors.BeginRequest'
        ),
    ),

	// application components
	'components'=>array(
		'user'=>array(
			'class'=>'application.components.WebUser',
		),

		'rollbar'=>array(
			'class' => 'RollbarComponent',
			'AccessToken'=>'<Rollbar-AccessToken>',
			'environment' => 'Production',
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'rules'=>array(
				'gii' => 'gii',
		        'gii/<controller:\w+>' => 'gii/<controller>',
		        'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',

		        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db'=>array(
            'connectionString'   => 'mysql:host=localhost;dbname=',
			'emulatePrepare'     => true,
			'username'           => '',
			'password'           => '',
			'charset'            => 'utf8',
            'schemaCachingDuration' => 3600000, // One hour
            'enableProfiling'       => true,
            'enableParamLogging'    => true,
        ),

		'errorHandler'=>array(
			'class'=>'RollbarErrorHandler',
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					//'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*array(
					'class'=>'CWebLogRoute',
				),*/
			),
		),

		/*
		'messages' => array(
			'class'                  => 'CDbMessageSource',
			'sourceMessageTable'     => 'avg_messages',
			'translatedMessageTable' => 'avg_messages_t',
			'cachingDuration'        => 0, // should turn on when we're done testing
			// config for db message source here, see http://www.yiiframework.com/doc/api/CDbMessageSource
		),
		'coreMessages'=>array(
			// we do not want internal yii messages translated automatically
            'basePath'=>null,
        ),
        */

		'request'=>array(
			'class'=>'application.components.HttpRequest.HttpRequest',
            'enableCookieValidation'=>true,
            'enableCsrfValidation'=>true,
        ),

        'cache'=>array(
			'class'=>'system.caching.CApcCache',
        ),

        'clientScript'=>array(
			'packages'=>array(
        		'jquery'=>array(
          			'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jquery/1.9.1/',
          			'js'=>array('jquery.min.js'),
        		),
        		'jquery.ui'=>array(
					'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/',
					'js'=>array('jquery-ui.min.js'),
					'depends'=>array('jquery'),
				),
			),
      		'coreScriptPosition' => CClientScript::POS_HEAD,
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'adminEmail'=>'<your-email>',
	),
);