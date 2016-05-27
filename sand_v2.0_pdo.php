<head>
<html lang="ru">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<?php include_once 'header.php';
require_once 'library/simple_html_dom.php';
require_once 'functions.php';


// try {
    $dbh = new PDO('mysql:host=localhost;dbname=php_dns', 'gtx', '678352saqejgf2');
    // foreach($dbh->query('SELECT * from habra_post') as $row) {
    //     print_r($row);}
    try{
        array(PDO::ATTR_PERSISTENT => true);
      echo "Подключились УРА!!!\n";
    }catch (Exception $e){
      die("\nWTF!!! Ошибка подключения! =( ".$e->getMessage());
    }
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



  try {
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $dbh->beginTransaction();
  $dbh->exec("insert into php_dns (title, text_body, reg_date, full_text, next_date, link)
              values ($title1,$text1,$date1,$full_text,$date_nextd,$html_in)");

  $dbh->commit();

} catch (Exception $e) {
  $dbh->rollBack();
  echo "\nТа ну епт, опять ошибка =((( " . $e->getMessage();
}
$dbh=null;}
//
//
//
//   $result=$dbh->query("INSERT INTO `habra_post`(`title`, `text_body`, `reg_date`, `full_text`, `next_date`, `link`)
//                                                          VALUES ($title1,$text1,$date1,$full_text,$date_nextd,$html_in)", $dbh);
//   if ($result) {
//           echo "<p>Данные успешно добавлены в таблицу.</p>";
//       } else {
//           // file_put_contents('mylog.txt', mysql_error());
//           die('Ошибка в запросе!');
//       }}
//
//     $dbh = null;
// }
// catch (PDOException $e) {
//     print "Error!: " . $e->getMessage() . "<br/>";
//     die();
// }
?>
