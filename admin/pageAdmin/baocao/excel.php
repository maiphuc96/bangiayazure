<?php
  include $_SERVER["DOCUMENT_ROOT"] . "/admin/function/baocao/baocao.php";
  include $_SERVER["DOCUMENT_ROOT"] . "/function/dbCon.php";
?>


<?php 
function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
    'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
    'i'=>'í|ì|ỉ|ĩ|ị',   
    'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
    'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
    'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
foreach($unicode as $khongdau=>$codau) {
  $arr=explode("|",$codau);
  $str = str_replace($arr,$khongdau,$str);
}
return $str;
}
function changeTitle($str){
  $str=trim($str);
  if ($str=="") return "";
  $str =str_replace('"','',$str);
  $str =str_replace("'",'',$str);
  $str = stripUnicode($str);
  $str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');
  
  // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
  $str = str_replace(' ',' ',$str);
  return $str;
}
  ?>

<div style="text-transform: uppercase; width: 100%;color: #ffffff;font-size: 32px;background-color: #fe980f;text-align: center;">
      Bao cao ban hang <?php
         $thang=$_GET['thang'];
         $nam=$_GET['nam'];
         echo'(';
         echo $thang;echo'-';
         echo $nam;echo')';
      ?>
  </div>
<div class="table-responsive">
<table  id="exTable" class="table table-bordered table-hover table-striped">
  <thead>
    <tr id="tieude_ds_sp">
      <th id="baocao">ID</th>
      <th id="baocao">Ten San Pham</th>
      <th id="baocao">Ngay Ban</th>
      <th id="baocao">So Luong</th>
      <th id="baocao">Doanh Thu</th>
    </tr>
  </thead>

  <tbody>
    <?php

   if (isset($_GET['thang']))
    $thang=$_GET['thang'];
   if (isset($_GET['nam']))
    $nam=$_GET['nam'];
   settype($thang, 'int');
   settype($nam, 'int');
   echo'<input type="hidden" name="nam" value="';echo $nam;echo'">
  <input type="hidden" name="thang" value="';echo $thang;echo'">';
   $ds_nam = loadBaoCao($thang,$nam);
   $tongdoanhthu=0;
   while ($row_ds=mysql_fetch_array($ds_nam)) {
  echo' <tr>
        <td id="baocao">';echo $row_ds['id_bao_cao'];echo'</td>
        <td id="baocao">';echo changeTitle($row_ds['ten_san_pham']);echo'</td>
        <td id="baocao">';echo $row_ds['ngay'];echo'</td>
        <td id="baocao">';echo $row_ds['so_luong'];echo'</td>
        <td id="baocao">';echo number_format($row_ds['doanh_thu']);echo'vnd</td>
      </tr>';

    $tongdoanhthu=$tongdoanhthu+$row_ds['doanh_thu'];
   }
  echo' <tr>

        <td id="baocao">';echo'</td>
        <td id="baocao">';echo'</td>
        <td id="baocao">';echo'</td>
        <td id="baocao">';echo 'Tong doanh thu ';echo '</td>
        <td id="baocao">';echo number_format($tongdoanhthu); echo'vnd</td>
      </tr>';
      echo'<input type="hidden" name="total" class="btn btn-success" value="';echo $tongdoanhthu;echo'vnd" />';

  ?>
  
  </tbody>

</table>
</div>
    
<input style="border: 0px;width: 100%;background-color: #fe980f;color: white;font-size: 16px;" type="button" value="Xuất báo cáo" onclick="exportToExcel('exTable')" />

<script>
function exportToExcel(tableID){
    var tab_text="<table border='2px'><tr style='height: 0px; text-align: center; width: 250px'><div style='text-align: center'>Bao Cao Ban Hang(SHOES-SHOP)</div></tr>";
   // var textRange; 
    var j=0;
    tab = document.getElementById(tableID); // id of table

    for(j = 0 ; j < tab.rows.length ; j++)
    {

        tab_text=tab_text;
        tab_text=tab_text+tab.rows[j].innerHTML.toString()+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text= tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); //remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write( 'sep=,\r\n' + tab_text);
        txtArea1.document.close();
        txtArea1.focus();
        sa=txtArea1.document.execCommand("SaveAs",true,"sudhir123.txt");
    }
    else {
       sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
    }
    
    return (sa);
}
</script>



