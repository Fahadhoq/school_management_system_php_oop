<?php

define('ROOT', 'http://localhost/learn/php/php_opp_school_management_system/public');
define('ASSETS', 'http://localhost/learn/php/php_opp_school_management_system/public/assets');

define('DBNAME', 'school_db');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBDRIVER', 'mysql');

spl_autoload_register(function($class_name){
   require "../private/models/". ucfirst($class_name). ".php"; 
});
