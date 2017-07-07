<?php

   define('DB_SERVER', 'maersk-cms-sea-mysqldbserver.mysql.database.azure.com');
   define('DB_USERNAME', 'maerskDDAC@maersk-cms-sea-mysqldbserver');
   define('DB_PASSWORD', 'M@er$kDD@c');
   define('DB_DATABASE', 'maersk');
   $connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>