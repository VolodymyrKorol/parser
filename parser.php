<?php


include_once('db.php');
include_once('curl.php');



$html = curl_get('http://www.dailynebraskan.com/news/');
set_time_limit ( 90 );
$db = new DataBase();


$sql = "SELECT * FROM `articles` ORDER BY id ASC LIMIT 1";
$last_article = $db->query($sql);

preg_match_all('#<article id="card-summary-(.+?)</article>#su', $html, $matches);


for ($i = 6; $i < count($matches[0]); $i++) {
    set_time_limit ( 90 );

//GET HTML HEADER OF THE ARTICLE
    preg_match_all('#<h3 class="tnt-headline ">(.+?)</h3>#su', $matches[0][$i], $html_header);


//GET LINK OF THE ARTICLE
    preg_match_all('#"/(.+?)"#su', $html_header[0][0], $article_link);
    $article_link[0][0] = substr($article_link[0][0], 1, -1);

//GET TITLE OF THE ARTICLE
    preg_match_all('#class="tnt-asset-link">(.+?)</a>#su', $html_header[0][0], $article_title);
    $article_title[0][0] = substr($article_title[0][0], 23, -4);
    $article_title[0][0] = trim($article_title[0][0]);

//GET FULL TEXT OF THE ARTICLE
    $single_html = curl_get('http://www.dailynebraskan.com'.$article_link[0][0]);
    preg_match_all('#<div class="asset-body" data-subscription-required-class="asset-body">(.+?)<div class="share-container content-below"#su', $single_html, $article_html_texts);
    preg_match_all('#<p(.+?)</p>#su', $article_html_texts[0][0], $article_texts);

    //Concatenation of the text
        $text = '';
        for ($j = 0; $j < count($article_texts[0]); $j++) {
            $text = $text . $article_texts[0][$j];
        }

//GET DATE OF THE ARTICLE
    preg_match_all('#<time datetime="(.+?)T#su', $matches[0][$i], $article_date);
    $article_date[0][0] = substr($article_date[0][0], 16, -1);

//GET IMG OF THE ARTICLE
    preg_match_all('#<meta itemprop="url" content="(.+?)">#su', $single_html, $article_img);
    $article_img[0][0] = substr($article_img[0][0], 30, -2);
    $extension = 'jpg';
    $filename = uniqid() . '.' . $extension;
   curl_img($article_img[0][0], $filename);
 //   save_image($article_img[0][0], $filename);





    $sql = "SELECT * FROM `articles` WHERE `article_link`='".$article_link[0][0]."'";
    if (!empty($last_article)) {
        if ($last_article[0]['article_link'] === $article_link[0][0]) {
            break;
        }
    }


//DATABASE SAVE
    $sql = "INSERT INTO `articles` SET
    `title` = '".$article_title[0][0]."',
    `text`='".addcslashes($text,"'\"")."', 
    `date_up`='".$article_date[0][0]."',
    `img_url`='/parser/assets/images/".$filename."',
    `article_link`='".$article_link[0][0]."'";
     $db->execute($sql);


    $article_title = [];
    $article_link = [];
    $article_date = [];
    $article_img = [];
    $article_texts = [];
    $text = '';
    $single_html = '';



}

$to = "peryjeky@gmail.com";
$message = "Yep!";
$m_title = "Volodymyr";
if(mail($to,$m_title,$message,"From: volodymyr01korol@gmail.com \r\n"))
  echo "Yeess!"  ;
//header("Location: /parser/admin/index.php");


