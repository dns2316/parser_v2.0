<head>
<html lang="ru">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
include_once 'header.php';
require_once 'library/simple_html_dom.php';
require_once 'functions.php';

/* подключаемся к базе данных*/

    $bd = mysqli_connect("localhost", "gtx", "678352saqejgf2", "php_dns");






$html = file_get_html('http://habrahabr.ru');
$element='empty';
$date_nextd=date('y-m-d h:i',strtotime('+1 day'));
$date1=date('y-m-d h:i');
foreach($html->find('div.post') as $p => $item){
  $title1 = (string)implode(" ", $item->find('h2.post__title'));
  $text1 = (string)implode(" ", $item->find('.html_format'));
  $url_a = (string)implode(" ", $item->find('a.button'));
  $url_b = explode('"', $url_a);
  $html_in = file_get_html($url_b[3]);
  $stringurl=(string)$url_b[3];
  $full_text = (string)implode(" ", $html_in->find('.html_format'));
// print_r ($title1);
// echo $title1;
/*запись данных в базу*/

// $title1='Заголовок1';
// $text1='текст1';
// $date1='2016-05-28';
// $full_text='весь текст бла бла бла';
// $date_nextd='2016-05-29';
// $html_in='http://habrahabr.ru';


// $bd-> query("INSERT INTO habra_post SET title='$title1'");
$bd-> query("INSERT INTO habra_post SET title='$title1', text_body='$text1', reg_date='$date1', full_text='$full_text', next_date='$date_nextd', link='$url_b[3]'");
    if($bd==true)
    {
        echo "<br>Oll OK";
    }
    else
    {
       echo mysqli_error();
    }
}
?>
