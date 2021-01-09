<?php
    session_start();
	spl_autoload_register(function($class){
		require 'classes/'.$class.'.php';
	});
  

    define("DB_HOST", "localhost");
    define("DB_NAME", "blogger");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("BASE_URL", "http://localhost/blogger/");

    $userObj = new Users;
    $dashObj = new Dashboard;
    $blogObj = new Blog;

?>