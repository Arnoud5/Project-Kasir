<!DOCTYPE html>
<html>
<head>
  <title>Laporan Stock Out</title>
</head>
<body>
  <style type="text/css">
    body{
      font-family: sans-serif;
      text-align: center;
    }
  </style>

  <?php

        //Siapkan Nama File yang akan di export
  $nama_file = "Laporan Stock Out";
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attechment; filename=".$nama_file.".xls");
  ?>

  <h3 style="text-align: center">Laporan Stock Out</h3>
  <div style="text-align: center;">
    <a style="font-size: 12px;">Periode : <?= date('d-M-Y', strtotime($_GET['dari'])); ?> s/d <?= date('d-M-Y', strtotime($_GET['sampai'])); ?></a>
  </div>
  
  <br><br>

  <table class="table table-bordered table-striped">
    
    <tr>
     <th style="text-align: center;">No</th>
     <th style="text-align: center;">Date</th>
     <th style="text-align: center;">Kasir</th>
     <th style="text-align: center;">Produk</th>
     <th style="text-align: center;">Detail</th>
     <th style="text-align: center;">Qty</th>

   </tr>

   <?php $no=1;
   $grand_total = 0;
   foreach($laporan as $l) : ?>

    <tr>
     <td style="text-align: center;"><?=$no++ ?></td>
     <td style="text-align: center;"><?=indo_date($l->date) ?></td>
     <td style="text-align: center;"><?=$l->kasir?></td>
     <td><?=$l->item_name?></td>
     <td><?=$l->detail?></td>
     <td style="text-align: center;"><?=$l->qty?></td>

   <?php endforeach; ?>
 </table>
 
</body>
</html>