<!DOCTYPE html>
<html>
<head>
  <title>Laporan Sales Detail</title>
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
  $nama_file = "Laporan Sales Detail";
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
      <th style="text-align: center;">No</th>
      <th style="text-align: center;">Invoice</th>
      <th style="text-align: center;">Produk</th>
      <th style="text-align: center;">Harga</th>
      <th style="text-align: center;">Qty</th>
      <th style="text-align: center;">Discount Item</th>
      <th style="text-align: center;">Total</th>

    </tr>

    <?php $no=1;
    $grand_total = 0;
    foreach($laporan as $l) : ?>

      <tr>
        <td style="text-align: center;"><?=$no++ ?></td>
        <td style="text-align: center;"><?=$l->invoice ?></td>
        <td><?=$l->item_name?></td>
        <td style="text-align: right;"><?=indo_currency($l->item_price) ?></td>
        <td style="text-align: center;"><?=$l->qty?></td>
        <td style="text-align: right;"><?=indo_currency($l->discount_item) ?></td>
        <td style="text-align: right;"><?=indo_currency($l->total) ?></td>

        <?php $grand_total += ($l->total); ?> 
      <?php endforeach; ?>
    </table>

    <table align="right" style="margin-right: 30px;">
      <tr >
        <td colspan="6"><b>Total</td>
          <td><b><?=indo_currency($grand_total) ?></td>
          </tr>
        </table>
        
      </body>
      </html>