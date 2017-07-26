<?php

include("inc_koneksi.php");
include("inc_module.php");

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('editable', dirname(__FILE__) . '/../extensions/x-editable');
return array(
    'sourceLanguage' => 'en',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'JMX',
    'theme' => 'frontend',
    // preloading 'log' component
    'preload' => array(
        //'log',
        'booster'
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'editable.*', //easy include of editable classes,
        'ext.EExcelView.*',
    ),
    'modules' => $modul, // ----> include("inc_module.php");	
    // application components
    'components' => array(
		'komponenBantu' => array(
			'class' => 'ext.onet.komponenBantu',
		),

        'ePdf' => array(
            'class' => 'ext.yii-pdf.EYiiPdf',
            'params' => array(
                /*
                  'mpdf' => array(
                  'librarySourcePath' => 'application.vendors.mpdf.*',
                  'constants' => array(
                  '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                  ),
                  'class' => 'mpdf', // the literal class filename to be loaded from the vendors folder
                  /* 'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                  'mode'              => '', //  This parameter specifies the mode of the new document.
                  'format'            => 'A4', // format A4, A5, ...
                  'default_font_size' => 0, // Sets the default document font size in points (pt)
                  'default_font'      => '', // Sets the default font-family for the new document.
                  'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                  'mgr'               => 15, // margin_right
                  'mgt'               => 16, // margin_top
                  'mgb'               => 16, // margin_bottom
                  'mgh'               => 9, // margin_header
                  'mgf'               => 9, // margin_footer
                  'orientation'       => 'P', // landscape or portrait orientation
                  )
                  ),
                 */
                'HTML2PDF' => array(
                    'librarySourcePath' => 'application.vendor.html2pdf.*',
                    'classFile' => 'html2pdf.class.php', // For adding to Yii::$classMap
                /* 'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                  'orientation' => 'P', // landscape or portrait orientation
                  'format'      => 'A4', // format A4, A5, ...
                  'language'    => 'en', // language: fr, en, it ...
                  'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                  'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                  'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                  ) */
                )
            ),
        ),
        /*
        'session' => array(
            'class' => 'application.components.MyCDbHttpSession',
            'connectionID' => 'db',
            'sessionTableName' => 'user_session',
            'autoCreateSessionTable' => false,
            'cookieMode' => 'only',
            //Extension properties
            'compareIpAddress' => true,
            'compareUserAgent' => true,
            //'compareIpBlocks' => 0,
            //'timeout' => 3600,
        ),
         * 
         */
        //resize image
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            'driver' => 'GD',
        ),
        //end resize image
        'request' => array(
            'enableCsrfValidation' => true,
            'enableCookieValidation' => true,
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'WebUser',
            'loginUrl' => array('site/login'),
        ),
        'booster' => array(
            'class' => 'ext.booster.components.Booster',
        ),
        'browser' => array(
            'class' => 'ext.browser.CBrowserComponent',
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                //'<module:\w+>/<controller:\w+>/<id:\d+>/*'=>'<module>/<controller>/view',
                //'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                //'<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                'login' => 'site/login',
                'logout' => 'site/logout',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        // uncomment the following to use a MySQL database
        'db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host='.$db_host.';dbname='.$db_name.'', // ---> include("inc_koneksi.php");
            'emulatePrepare' => true,
            'username' => $db_user,// ---> include("inc_koneksi.php");
            'password' => $db_pass,
            'charset' => 'utf8',
            'enableProfiling' => true,
            'enableParamLogging' => true,
            //'schemaCachingDuration' => 3600, //in second time
        ),
        'dblocal' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host='.$db_host_local.';dbname='.$db_name_local.'', // ---> include("inc_koneksi.php");
            'emulatePrepare' => true,
            'username' => $db_user_local,// ---> include("inc_koneksi.php");
            'password' => $db_pass_local,
            'charset' => 'utf8',
            'enableProfiling' => true,
            'enableParamLogging' => true,
            //'schemaCachingDuration' => 3600, //in second time
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => '//site/error',
        ),
        'editable' => array(
            'class' => 'editable.EditableConfig',
            'form' => 'plain', //form style: 'bootstrap', 'jqueryui', 'plain' 
            'mode' => 'popup', //mode: 'popup' or 'inline'  
            'defaults' => array(//default settings for all editable elements
                'emptytext' => 'Click to edit'
            )
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
                    'class' => 'CDbLogRoute',
                    'levels' => 'error, warning',
                    'filter' => array(
                        'class' => 'AdvancedCDbLogFilter',
                        'ignoreCategories' => array(
                            // Ignore query command, for return to execute command
                            'system.db.CDbCommand.query',
                        ),
                    ),
                    'logTableName' => 'logging',
                    'connectionID' => 'db',
                    'autoCreateLogTable' => false,
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),

             * 
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);