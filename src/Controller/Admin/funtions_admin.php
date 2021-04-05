<?php
require_once "../../Models/connect.php";
// echo "<h1>Link file thành công</h1>";
$connect = new ConnectDataBase('PHP_PROJECT');
function searchProduct($key)
{
    $query = "select * from PRODUCT where name_product LIKE '%$key%'";
    $result =  $GLOBALS['connect']->query($query);
    return $result;
}
function searchUserName($key)
{
    $query = "select * from USERS where id_user LIKE '%$key%' or user_name LIKE '%$key%' or full_name LIKE '%$key%' or 
    email LIKE '%$key%'";
    $result =  $GLOBALS['connect']->query($query);
    return $result;
}
function deleteUser($key)
{
    $query = "DELETE FROM USERS
    WHERE id_user = $key";
      $GLOBALS['connect']->query($query);
   
}
function reload($page){
    header("Refresh: 2 ; url=$page");
}

// tìm kiếm theo tên
function SearchListProduct($search)
{
   $connect = new ConnectDataBase();
   $sql='SELECT * FROM product
        WHERE name_product LIKE '%$search%'';
   return $connect->query($sql);
}
// $key='teddy';
// searchProduct($key);
