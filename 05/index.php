<?php
$config = [
    'database' => [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'db',
        'charset' => 'utf8mb4'
    ]
];
function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}
require "class.Database.php";
require "index.view.php";

$db = new Database($config['database']);
$dsn = 'mysql:' . http_build_query($config,'',';');

//select ID
$id = $_GET['id'];
$query = 'select * from db where id = ?';
$post = $db->query($query, [$id])->fetch();

if (empty($post)) {
     echo "Brak danych";
   }
    else {
     foreach ($post as $name) {
         echo $name;
   }}

echo ' <br> http://05.test/index.php?id=3 <br> podglą id=3';