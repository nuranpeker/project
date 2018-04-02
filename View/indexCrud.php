<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 01:27
 */

include '../classes/DataBaseConnection.php';
include '../classes/DBCrud.php';
$object = new DBCrud();
?>
<html>
<head>
    <title> </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Styles/style.css" />
</head>
<body>
<div class="container box">
    <h3 align="center">Öğrenci İşlemleri </h3><br />
    <div class="col-md-8">
        <button type="button" name="add" id="add" class="btn btn-success" data-toggle="collapse" data-target="#user_collapse">Veri Gir</button>
    </div>
    <div class="col-md-4">
        <input type="text" name="search" id="search" placeholder="Ara"  class="form-control" />
    </div>
    <br />
    <br />
    <div id="user_collapse" class="collapse">
        <form method="post" id="user_form">
            <label>Adı</label>
            <input type="text" name="ad" id="ad" class="form-control" />
            <br />
            <label>Soyadı</label>
            <input type="text" name="soyad" id="soyad" class="form-control" />
            <br />
            <label>Bölümü</label>
            <input type="text" name="bolum" id="bolum" class="form-control" />
            <br />
            <br />
            <div align="center">
                <input type="hidden" name="action" id="action" />
                <input type="hidden" name="user_id" id="user_id" />
                <input style="background-color:red; color: white; font-size: 15px" type="submit" name="button_action" id="button_action" class="btn btn-default" value="Ekle" />
            </div>
            <br />
        </form>
    </div>
    <br />
    <div class="table-responsive" id="user_table">

    </div>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){

        load_data();
        $('#action').val("Ekle");
        $('#add').click(function(){
            $('#user_form')[0].reset();
            $('#button_action').val("Ekle");
        });

        function load_data()
        {
            var action = "Yükle";
            $.ajax({
                url:"../Controller/actionCrud.php",
                method:"POST",
                data:{action:action},
                success:function(data)
                {
                    $('#user_table').html(data);
                }
            });
        }

        $('#user_form').on('submit', function(event){
            event.preventDefault();
            var firstName = $('#ad').val();
            var lastName = $('#soyad').val();
            if(firstName != '' && lastName != '')
            {
                $.ajax({
                    url:"../Controller/actionCrud.php",
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(data)
                    {
                        alert(data);
                        $('#user_form')[0].reset();
                        load_data();
                        $("#action").val("Ekle");
                        $('#button_action').val("Ekle");

                    }
                });
            }
            else
            {
                alert("Alanlar boş bırakılamaz!");
            }
        });

        $(document).on('click', '.update', function(){
            var user_id = $(this).attr("id");
            var action = "Veri Al";
            $.ajax({
                url:"../Controller/actionCrud.php",
                method:"POST",
                data:{user_id:user_id, action:action},
                dataType:"json",
                success:function(data)
                {
                    $('.collapse').collapse("show");
                    $('#ad').val(data.ad);
                    $('#soyad').val(data.soyad);
                    $('#bolum').val(data.bolum);
                    $('#button_action').val("Güncelle");
                    $('#action').val("Güncelle");
                    $('#user_id').val(user_id);
                }
            });
        });
        $(document).on('click', '.delete', function(){
            var user_id = $(this).attr("id");
            var action = "Sil";
            if(confirm("Veriyi silmek istiyor musunuz?"))
            {
                $.ajax({
                    url:"../Controller/actionCrud.php",
                    method:"POST",
                    data:{user_id:user_id, action:action},
                    success:function(data)
                    {
                        alert(data);
                        load_data();
                    }
                });
            }
            else
            {
                return false;
            }
        });
        $('#search').keyup(function(){
            var query = $('#search').val();
            var action = "Ara";
            if(query !="")
            {
                $.ajax({
                    url:"../Controller/actionCrud.php",
                    method:"POST",
                    data:{query:query, action:action},
                    success:function(data)
                    {
                        $('#user_table').html(data);
                    }
                })
            }
            else
            {
                load_data();
            }
        });
    });
</script>
