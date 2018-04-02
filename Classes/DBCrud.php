<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 00:43
 */

class DBCrud extends DataBaseConnection
{
    public function get_data_in_table($query)
    {
        $output = '';
        $result = $this->execute_query($query);
        $output .= '
  <table class="table table-bordered table-striped">
   <tr>
     
    <th width="35%">Ad</th>
    <th width="35%">Soyad</th>
    <th width="35%">Bölüm</th>
    <th width="10%">Güncelle</th>
    <th width="10%">Sil</th>
   </tr>
  ';
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_object($result))
            {
                $output .= '
    <tr>
      
     <td>'.$row->ad.'</td>
     <td>'.$row->soyad.'</td>
     <td>'.$row->bolum.'</td>
     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update " data-toggle="collapse" data-target="#user_collapse">Güncelle</button></td>
     <td><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete" data-toggle="collapse" data-target="#user_collapse">Sil</button></td>      
    </tr>
    ';
            }
        }
        else
        {
            $output .= '
    <tr>
     <td colspan="5" align="center">Veri Bulunamadı</td>
    </tr>
   ';
        }
        $output .= '</table>';
        return $output;
    }


}