<?php


function curl_get($url,$referer = 'http://www.google.com')
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36');
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    return $data;
}



function curl_img($url,$file_name)
{
//    $ch = curl_init($url);
//    $fp = fopen('assets\images\\' . $file_name, 'w');
//    curl_setopt($ch, CURLOPT_FILE, $fp);
//    curl_setopt($ch, CURLOPT_HEADER, 0);
//    curl_exec($ch);
//    curl_close($ch);
//    fclose($fp);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    file_put_contents("assets/images/".$file_name, $data);

}
?>