<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Stock In</title>

</head>
<body>
  <div style="text-align: center;">
    <h2 style="font-size: 32px; font-weight: bold;">Laporan Stock In</h2>
  </div>
  <div style="text-align: center;">
    <h5 style="font-size: 14px;">Periode : <?= date('d-M-Y', strtotime($_GET['dari'])); ?> s/d <?= date('d-M-Y', strtotime($_GET['sampai'])); ?></h5>
  </div>

  <table class="table table-bordered table-striped" style="margin-top: 60px; font-size: 10px">
    
    <tr>
     <th style="text-align: center;">No</th>
     <th style="text-align: center;">Date</th>
     <th style="text-align: center;">Kasir</th>
     <th style="text-align: center;">Produk</th>
     <th style="text-align: center;">Detail</th>
     <th style="text-align: center;">Supplier</th>
     <th style="text-align: center;">Qty</th>
     <th style="text-align: center;">Harga</th>

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
      <td><?=$l->supp_name?></td>
      <td style="text-align: center;"><?=$l->qty?></td>
      <td style="text-align: right;"><?=indo_currency($l->price) ?></td>
    </tr>

    <?php $grand_total += ($l->price); ?> 
  <?php endforeach; ?>
</table>


<table align="right" style="margin-top: 20px">
  <tr >
    <td colspan="7" style="font-weight: bold;"><b>Total</td>
      <td style="font-weight: bold;"><b><?=indo_currency($grand_total) ?></td>
      </tr>
    </table>
    
  </body>
  </html>