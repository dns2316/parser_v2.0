<?php
include_once 'header.php';
require_once 'library/simple_html_dom.php';
require_once 'functions.php';

/* подключаемся к базе данных*/

    $bd = mysqli_connect("localhost", "gtx", "678352saqejgf2", "php_dns");




/*запись данных в базу*/

$html = file_get_html('http://habrahabr.ru');
$element='empty';
$date_nextd=date('y-m-d h:i',strtotime('+1 day'));
$date1=date('y-m-d h:i');
foreach($html->find('div.post') as $p => $item){
  $title1 = implode(" ", $item->find('h2.post__title'));
  $text1 = implode(" ", $item->find('.html_format'));
  $url_a = implode(" ", $item->find('a.button'));
  $url_b = explode('"', $url_a);
  $html_in = file_get_html($url_b[3]);
  $full_text = implode(" ", $html_in->find('.html_format'));

$bd-> query("INSERT INTO habra_post SET title='$title1', text_body='$text1', reg_date='$date1', full_text='$full_text', next_date='$date_nextd', link='$html_in'");
    if($bd==true)
    {
        echo "Oll OK";
    }
    else
    {
       echo mysqli_error();
    }}
?>
