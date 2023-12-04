<!DOCTYPE html>
<html>
<head>
  <title>Laporan Sales</title>
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
  $nama_file = "Laporan Sales";
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attechment; filename=".$nama_file.".xls");
  ?>

  <h3 style="text-align: center">Laporan Sales Detail</h3>
  <div style="text-align: center;">
    <a style="font-size: 12px;">Periode : <?= date('d-M-Y', strtotime($_GET['dari'])); ?> s/d <?= date('d-M-Y', strtotime($_GET['sampai'])); ?></a>
  </div>

  
  <br><br>
  <table class="table table-bordered table-striped">
    
    <tr>
     <th style="text-align: center; ">No</th>
     <th style="text-align: center;">Invoice</th>
     <th style="text-align: center;">Date</th>
     <th style="text-align: center;">Kasir</th>
     <th style="text-align: center;">Total Price</th>
     <th style="text-align: center;">Discount</th>
     <th style="text-align: center;">Cash</th>
     <th style="text-align: center;">Kembalian</th>
     <th style="text-align: center;">Final Price</th>

   </tr>

   <?php $no=1;
   $grand_total = 0;
   foreach($laporan as $l) : ?>

    <tr>
      <td style="text-align: center;"><?=$no++ ?></td>
      <td style="text-align: center;"><?=$l->invoice ?></td>
      <td style="text-align: center;"><?=indo_date($l->date) ?></td>
      <td style="text-align: center;"><?=$l->name ?></td>
      <td style="text-align: right;"><?=indo_currency($l->total_price) ?></td>
      <td style="text-align: right;"><?=indo_currency($l->discount)?></td>
      <td style="text-align: right;"><?=indo_currency($l->cash) ?></td>
      <td style="text-align: right;"><?=indo_currency($l->change) ?></td>          
      <td style="text-align: right;"><?=indo_currency($l->final_price) ?></td>
    </tr>

    <?php $grand_total += ($l->final_price); ?> 
  <?php endforeach; ?>
</table>

<table align="right" style="margin-right: 30px">
  <tr >
    <td colspan="8"><b>Total</td>
      <td><b><?=indo_currency($grand_total) ?></td>
      </tr>
    </table>
    
  </body>
  </html>