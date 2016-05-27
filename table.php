<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>table on php</title>
    <link rel="stylesheet" type="text/css" href="style_table.css">
    <link rel="stylesheet" type="text/css" href="style_input_for_table.css">
  </head>
  <body>
    <?php
    include_once 'header.php'
    // Inputs!
     ?>
     <div id="main">
      <form action="table.php" method="post">
            <div class="main_input">
              <div class="field">
                <label for="name3">Name:</label>
                <input type="text" name="name3" placeholder="Name" /><br />

                <label for="surname3">Surname:</label>
                <input type="text" name="surname3" placeholder="Surname" /><br />

                <label for="age3">Age:</label>
                <input id="text_i" type="text" name="age3" placeholder="Age" /><br />
              </div>
                <input class="batton_click" type="submit" name="submit" value="Enter"/>
            </div>
      </form>
      <?php
      //  _______
      // add data to table.txt
       ?>
      <?php
      $name3=null;
      $surname3=null;
      $age=null;
        if(isset($_POST['name3'],$_POST['surname3'],$_POST['age3'])){
          $file=file("table.txt",FILE_IGNORE_NEW_LINES);
          $curent=";".$_POST['name3']."_".$_POST['surname3']."_".$_POST['age3'];
          file_put_contents("table.txt",$curent,FILE_APPEND|LOCK_EX);}
          // _______
          // read data from table.txt
      ?>
      <div id="table">
      <table cellpadding="5" cellspacing="3" id="first_table">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Surname</th>
          <th scope="col">Age</th>
        </tr>
      <?php
        $string1=array('0' => file_get_contents("table.txt"));//Array ( [0] => Angela_First_16;Lily_Oto_18;Ann_Girl_31 ;Nataly_Fit_31;Ronda_Fight_31 )
        $datatxt=explode(";",$string1[0]);//Array ( [0] => Angela_First_16 [1] => Lily_Oto_18 [2] => Ann_Girl_31 )
        for($i=0;$i<count($datatxt);$i++){
          $step=$datatxt[$i];//Angela_First_16Lily_Oto_18Ann_Girl_31
          $mass=explode("_",$step);//Array ( [0] => Angela [1] => First [2] => 16 ) Array ( [0] => Lily [1] => Oto [2] => 18 ) Array ( [0] => Ann [1] => Girl [2] => 31 )
            for($j=0;$j<count($step);$j++){
              $name="<tr align='center'><td>".$mass[0]."</td>";
              $surname="<td>".$mass[1]."</td>";
              $age="<td>".$mass[2]."</td></th>";
              $ec=$name.$surname.$age;
              echo $ec;}}
      ?>
      </table>
      </div>
    <?php
    // _______
     ?>
   </div>
  </body>
</html>
