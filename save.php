<?php
include_once('db.php');
$db = new DataBase();

$data['title'] = $_POST['title'];
$data['text'] = $_POST['text'];
$data['id'] = $_POST['id'];

if(isset($_FILES['file-upload'])){
    $file_name = trim($_FILES['file-upload']['name']);
    $file_size = $_FILES['file-upload']['size'];
    $file_tmp = $_FILES['file-upload']['tmp_name'];
    $file_type = $_FILES['file-upload']['type'];
    $arr = explode('.', $file_name);
    $file_ext = strtolower(end($arr));

    $extentions = ["jpeg","jpg","png"];
    move_uploaded_file($file_tmp, "assets/images/".$file_name);
    $data['img'] = "/parser/assets/images/".$file_name;

}
$sql = "UPDATE `articles` SET
    `title` = '".$data['title']."',
    `text`='".addcslashes($data['text'],"'\"")."', 
    `date_up`='".date("Y-m-d")."',
    `img_url` = '".$data['img']."'
     WHERE `id` ='".$data['id']."'"
;
$db->execute($sql);
header("Location: /parser/admin/index.php");
