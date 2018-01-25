<?php

    $connect = mysqli_connect('localhost','root','','perez');
    if(isset($_POST["dishname"])) {
         $dish = $_POST["dishname"];
         $categ = $_POST["category"];
         $query = '';
     for($count = 0; $count<count($dish); $count++) {
          $dish_clean = mysqli_real_escape_string($connect, $dish[$count]);
          $categ_clean = mysqli_real_escape_string($connect, $categ[$count]);

       if($dish_clean != '' && $categ_clean != '') {
          $query .= 'INSERT INTO availabledish(dishname , category) 
          VALUES("'.$dish_clean.'", "'.$categ_clean.'");';
        }
    }
        
 if($query != '') {
     
  if(mysqli_multi_query($connect, $query)) {
   echo 'Item Data Inserted';
  } else {
   echo 'Error';
  }
 } else {
  echo 'All Fields are Required';
 }
}
?>