<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <?php $this->view('message')?>
  <?php $this->load->view("_partials/breadcrumb.php") ?>
  <div class="row">
    <?php if($this->fungsi->user_login()->level == 1) { ?> 
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total User</h4>
            </div>
            <div class="card-body"><?php echo $this->dashboard_m->get_data('user')->num_rows();?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-shopping-cart"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Item</h4>
        </div>
        <div class="card-body"><?php echo $this->dashboard_m->get_data('item')->num_rows();?>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-warning">
      <i class="fas fa-truck"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Suppliers</h4>
      </div>
      <div class="card-body"><?php echo $this->dashboard_m->get_data('supplier')->num_rows();?>
    </div>
  </div>
</div>
</div>
<?php if($this->fungsi->user_login()->level == 1) { ?> 
 <div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-success">
      <i class="fas fa-file"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Reports</h4>
      </div>
      <div class="card-body">
        3
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>

<?php if($this->fungsi->user_login()->level == 1) { ?> 
  <div class="card card-solid">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-th" style="margin-right: 10px"></i>Produk Terlaris Bulan Ini</h3>
    </div>

    <div class="row">
      <div class="card-body">
        <div id="sales-bar" class="graph"></div>
      </div>
    </div>
  </div>
<?php } ?>

</div>
</section>

<link rel="stylesheet" href="<?php echo base_url('assets/assets_stisla')?>/bower_components/morris.js/morris.css">
<script src="<?php echo base_url('assets/assets_stisla')?>/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('assets/assets_stisla')?>/bower_components/morris.js/morris.min.js"></script>

<script>

 Morris.Bar({
  element: 'sales-bar',
  resize: true,
  data: [
  <?php  foreach ($row as $key => $data) {
   echo "{item: '".$data->name."', sold: ".$data->sold."},";
 } ?>
 ],
 barColors: ['#7B68EE'],
 xkey: 'item',
 ykeys: ['sold'],
 labels: ['Sold'],
 hideHover: 'auto'
});

</script>
