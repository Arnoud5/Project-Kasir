<section class="section">
  <div class="section-header">
    <h1>Barcode Generator</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>

  <!-- main content -->
  <div class="pull-right">
     <a href="<?=site_url('item')?>" class="btn btn-primary btn-flat btn-sm" >
       <i class="fa fa-undo" style="margin-right: 5px"></i>Back
     </a>
   </div>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="margin-top: 50px; color: #818589;" >Barcode <i class="fa fa-barcode"> </i> <br>------------</h3>
        <br>
      </div>
      
   <?php $this->view('message')?>
   

   <div class="box-body" >    
    <?php 
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
    ?>
    <br>
    <?=$row->barcode?>    
  </div>

    </div>
    

<!-- <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="margin-top: 50px; color: #818589;" >QR Code <i class="fa fa-qrcode"> </i> <br>------------</h3>
        <br>
      </div>
   <div class="box-body">    
      <?php 
    $qrCode = new Endroid\QrCode\QrCode('1');
    $qrCode->writeFile('uploads/qr-code/item-'.$row->item_id.'.png');
   ?>    
   <img src="<?=base_url('uploads/qr-code/item-'.$row->item_id.'.png')?>">
  </div>
  </div> -->

</section>

</section>