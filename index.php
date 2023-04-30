<?php


include_once "config/bootstrap.php";

$table='games';
$className="P";
$id=2;

$datagame=new P();
$res=$datagame->getAllData($table, $className );
echo json_encode($res);


$resone=$datagame->getOneData($id, $table, $className);
echo json_encode($resone);