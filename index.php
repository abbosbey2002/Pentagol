<?php

echo 'start project';

include_once "config/bootstrap.php";

$useremail="sodiqjon@gmail.com";
$userpassword="sodiqjon";


$pd=new Userauthentication();

// var_dump($pd->addUser($useremail, $userpassword));


$title="this is title";
$image="this is image url";
$descr="fefef";
$type="this is type";

$addP=new Post();
// var_dump($addP->addPost($title, $image, $descr, $type));
//  $addP->addPost($title, $image, $descr, $type);

// 
 $remove=new P();


 $id=1;
 $table='posts';
 $className='Userauthentication';
//  $remove->removeData($id, $table);

 $res=$remove->getOneData($id, $table, $className);

 print_r($res);
