<?php
$server_name = $_SERVER['SERVER_NAME'];
if ($server_name === "carent"){
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1;dbname=carent',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',

        // Schema cache options (for production environment)
        //'enableSchemaCache' => true,
        //'schemaCacheDuration' => 60,
        //'schemaCache' => 'cache',
    ];
}
else
{
    if ($server_name === "192.168.1.210"){
        return [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=carent',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',

            // Schema cache options (for production environment)
            //'enableSchemaCache' => true,
            //'schemaCacheDuration' => 60,
            //'schemaCache' => 'cache',
        ];
    }
    else {
        return [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql.zzz.com.ua;dbname=ikidz',
            'username' => 'carent',
            'password' => 'Carent2019',
            'charset' => 'utf8',
        ];
    }
}
