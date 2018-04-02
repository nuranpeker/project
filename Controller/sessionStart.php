<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 01:00
 */

require_once '../classes/DataBaseConnection.php';
include '../Model/DBConnection.php';
$object = new DataBaseConnection();
//session_start();
if(isset($_POST['admin'])){

    $admin = $_POST['admin'];
    }
elseif(isset($_POST['akademik_per'])){

    $akademik_per = $_POST['akademik_per'];
}
elseif(isset($_POST['ogrenci'])){

    $ogrenci = $_POST['ogrenci'];
}
$tcKimlik=$_POST['tcKimlik'];
$kullaniciAdi=$_POST['kullaniciAdi'];
$sifre=$_POST['sifre'];
$sql= $pdo->prepare("select* from uyeler where tcKimlik = ? and kullaniciAdi = ? and sifre = ?");
$sql->execute(array($tcKimlik,$kullaniciAdi,$sifre));
$islem=$sql->fetch();
//$query="SELECT* FROM uyeler where tcKimlik =$tcKimlik, kullaniciAdi = $kullaniciAdi, sifre =$sifre ";
//$sqli= $object->execute_query($query);
// while($islem  = mysqli_fetch_object($sqli)) {
        if ($islem && $akademik_per) {
            $_SESSION['tcKimlik'] = $islem['tcKimlik'];
            $_SESSION['kullaniciAdi'] = $islem['kullaniciAdi'];
            $_SESSION['sifre'] = $islem['sifre'];
            header('location:../View/indexCrud.php');
        } elseif ($islem  && $admin) {
            $_SESSION['tcKimlik'] = $islem['tcKimlik'];
            $_SESSION['kullaniciAdi'] = $islem['kullaniciAdi'];
            $_SESSION['sifre'] = $islem['sifre'];
            header('location ""');
        } elseif ($islem  && $ogrenci) {
            $_SESSION['tcKimlik'] = $islem['tcKimlik'];
            $_SESSION['kullaniciAdi'] = $islem['kullaniciAdi'];
            $_SESSION['sifre'] = $islem['sifre'];
            header('location:../View/Home1.php');
        } else {
            //$hata = $sql->errorInfo();
            //$hata = $query->errorInfo();
            //echo "$hata[2]";
            //echo empty($hata[2]) ? "Başarılı Bir Şekilde Çalıştı." : $hata[2];
            echo"hata oluştu";
        }
//}
?>


