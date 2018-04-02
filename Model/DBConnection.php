<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 00:53
 */

$sunucu="localhost";
$veritabani="personel";
$kullaniciAdi="root";
$sifre="1234";

try{
    //pdo= new PDO("mysql:host=$sunucu;$veritabani;charset=UTF8",$kullaniciAdi,$sifre);
    $pdo= new PDO("mysql:host=localhost;dbname=personel;charset=UTF8","root",1234);
    // echo "veri tabanına bağlandı";
}catch (PDOException $e){
    echo $e->getMessage();
}
?>