<?php

echo 'start project';

include_once "config/bootstrap.php";

$useremail="Abbos@gmail.com";
$userpassword="abbos2002";


$pd=new Userauthentication();


var_dump($pd->addUser($useremail, $userpassword));