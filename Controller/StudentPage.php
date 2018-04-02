<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 00:58
 */

//require_once 'dbConnection.php';
require_once '../classes/DataBaseConnection.php';
include_once '../classes/DBCrud.php';
$object = new DBCrud();
if(isset($_POST['ara'])){

    header('location:Home.php');
}
elseif(isset($_POST['ekle'])){

    header('location:Home.php');
}
elseif(isset($_POST['sil'])){

    header('location:Home1.php');
}
elseif(isset($_POST['guncelle'])){

    header('location:Home.php');
}

else {
    $hata = $sql->errorInfo();
    echo "$hata[2]";
    // echo empty($hata[2]) ? "Başarılı Bir Şekilde Çalıştı." : $hata[2];
}