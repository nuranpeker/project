<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 00:55
 */

//include 'classes/DataBaseConnection.php';
include '../classes/DataBaseConnection.php';
include '../classes/DBCrud.php';
$object = new DBCrud();
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Akademik</title>
     <link rel="stylesheet" type="text/css" href="../Styles/style1.css" />
</head>
<body>
<div class="container" >
     <div id="header">
          <div class="header" >
               <div id="logo" align="left">
               </div>
               <div id="baslik">
                    <p><br><br>
                         T.C.<br>
                         SAKARYA ÜNİVERSİTESİ<br>
                         AKADEMİK PERSONEL BİLGİ SİSTEMİ
                    </p>
               </div>
          </div>
     </div>
    <div class="container box" align="center">
    <form id="ogrCrud" method="post" action="../Controller/StudentPage.php">
        <input style="width: 400px" type="submit" id="ara" name="ara" value="Öğrenci Ara"><br><br><br>
        <input style="width: 400px" type="submit" id="ekle" name="ekle"  value="Öğrenci Ekle"><br><br><br>
        <input style="width: 400px" type="submit" id="sil" name="sil" value="Öğrenci Sil"><br><br><br>
        <input style="width: 400px" type="submit" id="guncelle" name="guncelle" value="Öğrenci Güncelle">
    </form>
    </div>


</body>
</html>
