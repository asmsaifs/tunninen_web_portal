<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            //'dsn' => 'mysql:host=localhost;dbname=tunninen_cms_live',
            'dsn' => 'mysql:host=eu-cdbr-azure-north-e.cloudapp.net;dbname=mysql_tunninen_web',
            // 'dsn' => 'mysql:host=localhost;dbname=DB_NAME;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock', // OSX MAMP
            // 'dsn' => 'mysql:host=localhost;dbname=DB_NAME;/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock', // OSX XAMPP
            //'username' => 'root',
            //'password' => 'root',
            
            'username' => 'b5a7b6f0321f02',
            'password' => '89fa021d',
            'charset' => 'utf8',

            // in productive enviroments you can enable the schema caching
            // 'enableSchemaCache' => true,
            // 'schemaCacheDuration' => 43200,
        ]
    ]
];