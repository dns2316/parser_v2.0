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

//парсим страницу

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
  $stringurl=$url_b[3];
  $full_text = implode(" ", $html_in->find('.html_format'));

//Преобразование в "сущности" - убирает кавычки html

  $title1 = htmlspecialchars($title1, ENT_QUOTES);
  $text1 = htmlspecialchars($text1, ENT_QUOTES);
  $date1 = htmlspecialchars($date1, ENT_QUOTES);
  $full_text = htmlspecialchars($full_text, ENT_QUOTES);
  $date_nextd = htmlspecialchars($date_nextd, ENT_QUOTES);
  $html_in = htmlspecialchars($html_in, ENT_QUOTES);

/*запись данных в базу*/
$link_test=mysqli_query($bd, "SELECT * FROM `php_dns`.`habra_post`");
if(!$link_test){
  $bd-> query("INSERT IGNORE INTO habra_post SET title='$title1', text_body='$text1', reg_date='$date1', full_text='$full_text', next_date='$date_nextd', link='$html_in'");
      if($bd==false)
      {
          // echo "<br>Oll OK";
      // }
      // else
      // {
         echo mysqli_error();
      }
}}}

//Вывод инфы из MySQL

$sql_out = mysqli_query($bd,
"SELECT
  `id`,
  `title`,
  `text_body`,
  `reg_date`,
  `full_text`,
  `next_date`,
  `link`
FROM
  `php_dns`.`habra_post`");

$result=null;

while ($result = mysqli_fetch_assoc($sql_out)) {
    echo htmlspecialchars_decode($result['title']);
    echo htmlspecialchars_decode($result['text_body']);
    echo htmlspecialchars_decode($result['reg_date']);
    echo htmlspecialchars_decode($result['full_text']);
    echo htmlspecialchars_decode($result['next_date']);
    echo htmlspecialchars_decode($result['link']);
}

// echo htmlspecialchars_decode($date_nextd);
// echo htmlspecialchars_decode($date1);
// echo htmlspecialchars_decode($title1);
// echo htmlspecialchars_decode($text1);
// echo htmlspecialchars_decode($html_in);
// echo htmlspecialchars_decode($full_text);
?>
