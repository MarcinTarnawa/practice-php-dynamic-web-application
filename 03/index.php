<?php
require_once "config.php";

$id = intval($_POST['id'] ?? 1);
$name = $_POST['name'] ?? 'Marcin';

$rules = [
    "selectuser" =>  ["sql" => "select * from db where user='$name'", "list" => "Select user by name"],
    "selectid" => ["sql" => "select * from db where id = '$id'", "list" => "Select record by ID"],
    "selectall" => ["sql" => "select * from db", "list" => "Select all records"],
    "delete" => ["sql" => "delete from db where id = '$id'", "list" => "Delete record by id"],
    "insert" => ["sql" => "insert into db (user) values ('$name')", "list" => "Insert new recrod"],
    "update"=> ["sql" => "update db set user='$name' where id = '$id'", "list" => "Update recrod"],
];

function operator($rules) {
    foreach ($rules as $key => $value) {
        if (isset($value['list'])) {
            echo "<option value=\"" . htmlspecialchars($key) . "\">" . htmlspecialchars($value['list']) . "</option>";
        }
    }
}

require 'class.Database.php';
require 'index.view.php';

$operator_key = $_POST["operator"] ?? 'selectall';
$query = $rules[$operator_key]["sql"];

try 
    {
    $db = new Database($config['database']);
    $post = $db->query($query)->fetchAll();
    echo $rules[$operator_key]["list"];
    echo "<pre>";
        var_dump($post);
    echo "</pre>";
    }
catch(PDOException $e)
    {
    die("Error: ".$e->getMessage());
    }