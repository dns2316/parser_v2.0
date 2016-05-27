<head>
<meta charset="utf-8">
</head>
<?php include_once 'header.php';
require_once 'library/simple_html_dom.php';
require_once 'functions.php';

$connect_mysql=mysqli_connect('localhost', 'gtx', '678352saqejgf2', 'php_dns');
if (!$connect_mysql) {
    die('<p>Ошибка подключения к MySQL</p> (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo '<p>Соединение с MySQL установлено...</p> ' . mysqli_get_host_info($connect_mysql) . "\n";
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
  $result=mysqli_query($connect_mysql, "INSERT INTO `habra_post`(`title`, `text_body`, `reg_date`, `full_text`, `next_date`, `link`)
                                                         VALUES ($title1,$text1,$date1,$full_text,$date_nextd,$html_in)");
  $result=mysqli_query($connect_mysql, "INSERT INTO `habra_post`(`title`)
                                                         VALUES ($title1)");
  if ($result) {
          echo "<p>Данные успешно добавлены в таблицу.</p>";
      } else {
          // file_put_contents('mylog.txt', mysql_error());
          die('Ошибка в запросе!'.mysql_error());
      }}
mysqli_close($connect_mysql);
?>
