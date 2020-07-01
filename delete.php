<?php
include_once('db.php');
$db = new DataBase();
$data['id'] = $_GET['article_id'];
$sql = "DELETE FROM `articles` WHERE `id` ='".$data['id']."'"
;
$db->execute($sql);
header("Location: /parser/admin/index.php");