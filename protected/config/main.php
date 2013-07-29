<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'homeUrl'=>'http://chenhao-100.chenhao.net',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'language'=>'zh_cn',
	'sourceLanguage'=>'en',
				
	'modules'=>array(
		// uncomment the following to enable the Gii tool
        'admin' => array(
        ),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','192.168.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
			
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			
		/*
				'posts'=>'post/list',
				'post/<id:\d+>'=>'post/read',
				'post/<year:\d{4}>/<title>'=>'post/read',
				*/			
			),
			'showScriptName'=>false,
		),
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'jimmy',
			'password' => '123456',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
			/*
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				*/
				array(
            		'class'=>'CWebLogRoute', 
            		'levels'=>'trace',     //级别为trace 
            		'categories'=>'system.db.*' //只显示关于数据库信息,包括数据库连接,数据库执行语句 
				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'artcile'=>array(
				'customAttributeId'=>array(
				'1'=>'头条',
				'2'=>'推荐',
				'3'=>'幻灯片',
				'4'=>'特效',
				'5'=>'滚动',
				'6'=>'加粗',
				'7'=>'图片',
				'8'=>'跳转',
				)
		),		
	),	
);