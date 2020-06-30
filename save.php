<?php
include_once('db.php');
$db = new DataBase();

$data['title'] = $_POST['title'];
$data['text'] = $_POST['text'];
$data['img'] = $_POST['img'];
$data['id'] = $_POST['id'];

$sql = "UPDATE `articles` SET
    `title` = '".$data['title']."',
    `text`='".addcslashes($data['text'],"'\"")."', 
    `date_up`='".date("Y-M-D")."'
     WHERE `id` ='".$data['id']."'"
;
$db->execute($sql);
header("Location: /parser/admin/index.php");
