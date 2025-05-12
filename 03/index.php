<?php
require_once "config.php";

$id = intval($_POST['id'] ?? 1);
$name = $_POST['name'] ?? 'marcin';

// $list = [
//     'selectid' => "select * from db where id = ?",
//     'selectall' => 'select * from db',
//     'delete' => "delete from db where id = ?",
//     'insert' => "insert into db (name) values ('$name')",
//     'update' => "update db set name='$name' where id = ?",
// ];

$list = [
    'selectuser' => "Select user by name",
    'selectid' => "Select record by ID",
    'selectall' => 'Select all records',
    'delete' => "Delete record by id",
    'insert' => "Insert new recrod",
    'update' => "Update recrod",
];

require 'class.Database.php';
require 'index.view.php';

$db = new Database($config['database']);

function operator($list) {
    foreach ($list as $key => $item)
        echo "<option value =" . $key . ">" . $item;
}

$query = $list[$_POST['operator'] ?? 'selectall'];

if($query == $list['selectall']){
    $selectAll = $db->selectAll('user');
    if (empty($selectAll)) {
            echo "Brak danych";
        }
        else {
        }
    echo "<pre>";
    var_dump($selectAll);
    echo "</pre>";
    }

if($query == $list['selectid']){
    $post = $db->selectId('user', [$id]);
    if (empty($post)) {
        echo "Brak danych";
    }
    else {
        foreach ($post as $key => $value) {
            echo $key . " = " . $value . " ";
    }}}

if($query == $list['selectuser']){
        $params = [
        'name' => "$name"
    ];
    $post = $db->selectUser('user', [$name]);
    if (empty($post)) {
        echo "Brak danych";
    }
    else {
    echo "<pre>";
    var_dump($post);
    echo "</pre>";
    }}

if ($query == $list['delete']) { 
    $post = $db->delete('user', [$id]);
    echo $post;
    }

if ($query == $list['update']) { 
    $params = [
        'id' => "$id",
        'name' => "$name"
    ];
    $post = $db->update('user', $params);
    echo $post;
    }

if ($query == $list['insert']) { 
     $params = [
        'name' => "$name"
    ];
    $post = $db->insert('user', $params);
    echo $post;
    }

// //insert into Value
// if($query == $list['insert']){
//     $post = $db->query($query)->fetch();
// }

// //delete ID
// if ($query == $list['delete']) { 
//     $post = $db->query($query, [$id])->fetch();
// }

// // dd($post);

// //update ID
// if ($query == $list['update']) { 
//     $post = $db->query($query, [$id], [$name])->fetch();
//     }

// //select ID
// if($query == $list['selectid']){
//     $post = $db->query($query, [$id])->fetch();
//         if (empty($post)) {
//             echo "Brak danych";
//         }
//         else {
//             foreach ($post as $key => $value) {
//                 echo $key . " = " . $value . " ";
//         }}}

// // //select All
// if($query == $list['selectall']){
//     $selectAll = $db->query($query)->fetchAll();
//     if (empty($selectAll)) {
//             echo "Brak danych";
//         }
//         else {
//         }
//     echo "<pre>";
//     var_dump($selectAll);
//     echo "</pre>";
// }