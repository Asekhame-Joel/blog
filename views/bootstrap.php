<?php
use Core\Container;
use Core\Database;
use Core\App;

$container = new Container;
$container->addContainer('Core/Database', function(){
$config = require base_path("config.php");
return new Database($config['database']);
});
//whats is happen here is that, the key is assigned  a value
//remember in the addContainer method, a key and a value have to be provided which stored in the bindings array
//then the key is chained with the value
//here the database path or file path, is chained to the
//database instance whereby the database instance is called
//automatically when the key...which is the path to where the
//database instance is called.
//so the whole database function and class are called once the key which the path to the database file is specifield.

// $db = $container->removeContainer('Core/Database');

App::setContainer($container);