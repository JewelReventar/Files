<?php

    $connect = mysqli_connect('localhost','root','','perez');
    if(isset($_POST["dishname"])) {
         $package = $_POST["package"];
         $dish = $_POST["dishname"];
         $categ = $_POST["category"];
         $query = '';
     for($count = 0; $count<count($dish); $count++) {
          $package_clean = mysqli_real_escape_string($connect, $package[$count]);
          $dish_clean = mysqli_real_escape_string($connect, $dish[$count]);
          $categ_clean = mysqli_real_escape_string($connect, $categ[$count]);

       if($package_clean != '' && $dish_clean != '' && $categ_clean != '') {
          $query .= 'INSERT INTO dishes(package,dishname , category) 
          VALUES("'.$package_clean.'", "'.$dish_clean.'", "'.$categ_clean.'");';
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