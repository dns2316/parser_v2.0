<?php
function poligons($post, $empty, $txt){
            if($post){
              $username="$txt <u>".$post."</u>";
              echo $username;}
            else {
                $username=null;
                echo "$txt $empty<br />";
              }
}
function parse_buttons($site, $target){//vse zapisivatb d ''!!!
  $html = file_get_html($site);
  $element='empty';
  foreach($html->find($target) as $element){
    echo "<div class='print1'>".$element."</div><br>";
  }
  // $html->clear();//clear memory
  // unset($html);
}
function parse_buttons1($site, $target){//vse zapisivatb d ''!!!
  $html = file_get_html($site);
  $element='empty';
  foreach($html->find($target) as $element){
    return($element);
  }
  // $html->clear();//clear memory
  // unset($html);
}
?>
