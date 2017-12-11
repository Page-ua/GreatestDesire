<?php return array (
  'components' => 
  array (
    'db' => 
    array (
      'class' => 'yii\\db\\Connection',
      'dsn' => 'mysql:host=165.227.76.89;dbname=humhub',
      'username' => 'root',
      'password' => '4854279e93a779a3e59efb2aa90c8d366d16db5bb9f5e1eb',
      'charset' => 'utf8',
    ),
    'formatter' => 
    array (
      'defaultTimeZone' => 'Pacific/Pago_Pago',
    ),
    'formatterApp' => 
    array (
      'defaultTimeZone' => 'Pacific/Pago_Pago',
      'timeZone' => 'Pacific/Pago_Pago',
    ),
    'cache' => 
    array (
      'class' => 'yii\\caching\\FileCache',
      'keyPrefix' => 'humhub',
    ),
    'user' => 
    array (
    ),
    'mailer' => 
    array (
      'transport' => 
      array (
        'class' => 'Swift_MailTransport',
      ),
      'view' => 
      array (
        'theme' => 
        array (
          'name' => 'HumHub',
          'basePath' => '/var/www/html/themes/HumHub',
          'publishResources' => false,
        ),
      ),
    ),
    'view' => 
    array (
      'theme' =>
      array (
        'name' => 'HumHub',
        'basePath' => '/var/www/html/themes/HumHub',
        'publishResources' => false,
      ),
    ),
  ),
  'params' => 
  array (
    'installer' => 
    array (
      'db' => 
      array (
        'installer_hostname' => '165.227.76.89',
        'installer_database' => 'humhub',
      ),
    ),
    'config_created_at' => 1512997548,
    'horImageScrollOnMobile' => '1',
    'databaseInstalled' => true,
    'installed' => true,
  ),
  'name' => 'Greatest Desire',
  'language' => 'ru',
  'timeZone' => 'Pacific/Pago_Pago',
); ?>