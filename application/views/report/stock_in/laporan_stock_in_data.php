<section class="section">
  <div class="section-header">
    <h1>Laporan Stock In</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>

  <!-- main content -->
  <section class="content">


    <form method="POST" action="<?php echo base_url('report_stock_in') ?>" style="text-align: center;">
     <div class="input-group w-25 mx-auto">
      <div class="form-group">
        <label>Dari Tanggal</label>
        <input type="date" name="dari" class="form-control" value="<?=set_value('dari')?>">
        <?php echo form_error('dari', '<span class="text-small text-danger">','</span>') ?>
      </div>
      <div class="form-group" style="padding-left: 30px">
        <label>Sampai Tanggal</label>
        <input type="date" name="sampai" class="form-control" value="<?=set_value('sampai')?>">
        <?php echo form_error('sampai', '<span class="text-small text-danger">','</span>') ?>
      </div>
    </div>

    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i>Tampilkan Data Laporan</button>
    
  </form> <hr>

  <div class="btn-group">
    <a class="btn btn-sm btn-info" target="_blank" href="<?php echo base_url().'report_stock_in/pdf/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><i class="fas fa-file-pdf"></i> Export PDF</a>
  </div>


  <div class="btn-group">
    <a class="btn btn-sm btn-success"  href="<?php echo base_url().'report_stock_in/excel/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><i class="fas fa-file-excel"></i> Export Excel</a>
  </div> 

  <div class="table-responsive mt-3">
    <table class="table table-bordered table-striped" >
      
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
    <table align="right" style="margin-right: 30px">
      <tr >
        <td colspan="10"><b>Total</td>
          <td><b><?=indo_currency($grand_total) ?></td>
          </tr>
        </table>
      </div>
    </div>

  </section>
</section>