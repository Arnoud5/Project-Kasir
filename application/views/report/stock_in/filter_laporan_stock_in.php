<section class="section">
  <div class="section-header">
    <h1>Laporan Stock In</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>

  <!-- main content -->
  <section class="content">
    <?php $this->view('message')?>
    <form method="POST" action="<?php echo base_url('report_stock_in') ?>" style="text-align: center;">
      <div class="input-group w-25 mx-auto">
        <div class="form-group">
          <label>Dari Tanggal</label>
          <input type="date" name="dari" class="form-control">
          <?php echo form_error('dari', '<span class="text-small text-danger">','</span>') ?>
        </div>

        <div class="form-group" style="padding-left: 30px">
          <label>Sampai Tanggal</label>
          <input type="date" name="sampai" class="form-control">
          <?php echo form_error('sampai', '<span class="text-small text-danger">','</span>') ?>
        </div>
      </div>

      <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i>Tampilkan Data Laporan</button>
      
    </form>
  </section>

</section>