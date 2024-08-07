# Lucky draw

## Clone mã nguồn từ github

- [ ] [link github](https://github.com/KhanhDang1904/Lucky) 

## Cấu hình file  index.php

Trỏ đường dẫn từ file admin/index.php đến đúng đường dẫn của file vendor

```
require(dirname(__DIR__) . '/vendor/autoload.php');
require(dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php');
```

## Cấu hình common/main.php

Trỏ đường dẫn từ file admin/common/main.php đến đúng đường dẫn của file vendor

```
'vendorPath' => (dirname(dirname(__DIR__))) . '/vendor',
```

## Cấu hình database (admin/common/main-local.php)

```
'db' => [
           'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=lucky_admin',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'lucky_'
        ],
```
