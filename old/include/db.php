<?php




$db = new PDO("sqlite::" . __DIR__ . "/../../database.sqlite");

/* $db->exec('create table users (
   id integer,
   name text
)');

$db->exec("insert into T values (   1 , 'one', 1.1, 'xyz')");
$db->exec("insert into T values ('two', 2.2  ,   2, x'deadbeef')");

$stmt = $db->prepare('select * from T');
$stmt->execute(); */

