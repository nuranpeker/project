<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 00:59
 */
include '../classes/DataBaseConnection.php';
include '../classes/DBCrud.php';
$object = new DBCrud();
if(isset($_POST["action"]))
{
    if($_POST["action"] == "Yükle")
    {
        echo $object->get_data_in_table("SELECT* FROM ogrenciler ORDER BY id ");
    }
    if($_POST["action"] == "Ekle")
    {
        $ad =   $_POST["ad"];
        $soyad = $_POST["soyad"];
        $bolum = $_POST["bolum"];

        $query = "INSERT ogrenciler (ad, soyad, bolum) 
  VALUES ('".$ad."', '".$soyad."', '".$bolum."')";
        $object->execute_query($query);

        echo 'Veri Eklendi';
    }
    if($_POST["action"] == "Veri Al")
    {
        $output = '';
        $query = "SELECT* FROM ogrenciler WHERE id = '".$_POST["user_id"]."'";
        $result = $object->execute_query($query);
        while($row = mysqli_fetch_array($result))
        {
            $output['ad'] = $row['ad'];
            $output['soyad'] = $row['soyad'];
            $output['bolum'] = $row['bolum'];
        }
        echo json_encode($output);
    }

    if($_POST["action"] == "Güncelle")
    {
        $ad =   $_POST["ad"];
        $soyad =  $_POST["soyad"];
        $bolum =  $_POST["bolum"];
        $query = "UPDATE ogrenciler SET ad = '".$ad."', soyad = '".$soyad."' ,bolum = '".$bolum."' where id = '".$_POST["user_id"]."'";
        $object->execute_query($query);
        echo 'Veri Güncellendi';
    }
    if($_POST["action"] == "Sil")
    {
        $query = "DELETE FROM ogrenciler WHERE id = '".$_POST["user_id"]."'";
        $object->execute_query($query);
        echo 'Veri Silindi';
    }
    if($_POST["action"] == "Ara")
    {
        $search =  $_POST["query"];
        $query = "SELECT* FROM ogrenciler WHERE ad LIKE '%".$search."%' OR soyad LIKE '%".$search."%' ORDER BY id ASC";
        echo $object->get_data_in_table($query);
    }
}
?>
