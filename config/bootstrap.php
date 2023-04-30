<?php

include_once "autoload.php";

$database=new Database("127.0.0.1", "pentagol", 'root', "");
$pdo=$database->connect();
Userauthentication::$pdo=$pdo;
Post::$pdo=$pdo;
P::$pdo=$pdo;
Game::$pdo=$pdo;
Teams::$pdo=$pdo;
