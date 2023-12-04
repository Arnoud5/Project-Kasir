
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Kasir</title>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
  
  <link rel="stylesheet" href="<?php echo base_url('assets/assets_stisla')?>/bower_components/font-awesome/css/font-awesome.min.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url('assets/assets_stisla') ?>/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">


  <link rel="stylesheet" href="<?php echo base_url('assets/assets_stisla') ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/assets_stisla') ?>/assets/css/components.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar ">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          <a class="nav-link disabled" style="font-size: 20px" href="">Welcome <?=$this->fungsi->user_login()->name ?></a>  
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">

          <div class="sidebar-brand">
            <a href="<?=site_url('dashboard')?>"><img src="<?php echo site_url('');?>assets/assets/img/logo-kasir.jpg"
             width="120px" height="120px" class="rounded-circle" style="margin-top: 20px" >
           </a>
         </div>

         <div class="sidebar-brand sidebar-brand-sm">
          <a href="<?=site_url('dashboard')?>"><img src="<?php echo base_url();?>assets/assets/img/logo-kasir.jpg"
           width="50px" height="50px" class="rounded-circle" style="margin-top: 20px" ></a>
         </div>
         
         
         <ul class="sidebar-menu">
          <li class="menu-header" style="margin-top: 80px">Home</li>
          <li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
            <a href="<?=site_url('dashboard')?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            
          </li>
          <li class="menu-header">Master</li>
          <li class="nav-item dropdown <?=$this->uri->segment(1) == 'user' || $this->uri->segment(1) == 'category' ||
          $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' || $this->uri->segment(1) == 'customer' ||
          $this->uri->segment(1) == 'supplier' ||
          $this->uri->segment(1) == 'data_sales' ? 'active' : ''?>" >
          <a href="#" class=" has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data</span></a>
          <ul class="dropdown-menu">

            

            <?php if($this->fungsi->user_login()->level == 1) { ?> 
              <li <?=$this->uri->segment(1) == 'user' ? 'class="active"' : ''?>><a class="nav-link" href="<?=site_url('user')?>">User</a></li>
            <?php } ?>

            <!--  <li <?=$this->uri->segment(1) == 'category' ? 'class="active"' : ''?>><a class="nav-link" href="<?=site_url('category')?>">Category</a></li> -->
            <li <?=$this->uri->segment(1) == 'unit' ? 'class="active"' : ''?>><a class="nav-link" href="<?=site_url('unit')?>">Unit</a></li>
            <li <?=$this->uri->segment(1) == 'item' ? 'class="active"' : ''?>><a class="nav-link" href="<?=site_url('item')?>">Item</a></li>
            <!--  <li <?=$this->uri->segment(1) == 'customer' ? 'class="active"' : ''?>><a class="nav-link" href="<?=site_url('customer')?>">Customer</a></li> -->
            <li <?=$this->uri->segment(1) == 'supplier' ? 'class="active"' : ''?>><a class="nav-link" href="<?=site_url('supplier')?>">Supplier</a></li>
            <li <?=$this->uri->segment(1) == 'data_sales' ? 'class="active"' : ''?>><a href="<?=site_url('data_sales')?>">Sales</a></li>
          </ul>
        </li>

        <li class="menu-header">Transaction</li>
        <li class="nav-item dropdown <?=$this->uri->segment(1) == 'sales' || $this->uri->segment(1) == 'stock'  ? 'active' : ''?>" >
          <a href="#" class=" has-dropdown" data-toggle="dropdown"><i class="fas fa-th-large"></i> <span>Transaction</span></a>
          <ul class="dropdown-menu">
            <li <?=$this->uri->segment(1) == 'sales' ? 'class="active"' : ''?>><a class="nav-link" href="<?=site_url('sales')?>">Sales</a></li>
            <li <?=$this->uri->segment(1) == 'stock' &&  $this->uri->segment(2) == 'in' ? 'class="active"' : ''?>><a class="nav-link" href="<?=site_url('stock/in')?>">Stock In</a></li>
            <li <?=$this->uri->segment(1) == 'stock' &&  $this->uri->segment(2) == 'out' ? 'class="active"' : ''?>><a class="nav-link" href="<?=site_url('stock/out')?>">Stock Out</a></li>
          </ul>
        </li>

        
        <?php if($this->fungsi->user_login()->level == 1) { ?>
          <li class="menu-header">laporan</li>
          <li class="nav-item dropdown <?=$this->uri->segment(1) == 'report_sales' || $this->uri->segment(1) == 'report_sales_detail' || $this->uri->segment(1) == 'report_stock_in' || $this->uri->segment(1) == 'report_stock_out' ? 'active' : ''?>">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i> <span>Laporan</span></a>
            <ul class="dropdown-menu">
              <li <?=$this->uri->segment(1) == 'report_sales' ? 'class="active"' : ''?>><a href="<?=site_url('report_sales')?>">Laporan Sales</a></li>
              <li <?=$this->uri->segment(1) == 'report_sales_detail' ? 'class="active"' : ''?>><a href="<?=site_url('report_sales_detail')?>">Laporan Sales Detail</a></li>
              <li <?=$this->uri->segment(1) == 'report_stock_in' ? 'class="active"' : ''?>><a href="<?=site_url('report_stock_in')?>">Laporan Stock In</a></li>
              <li <?=$this->uri->segment(1) == 'report_stock_out' ? 'class="active"' : ''?>><a href="<?=site_url('report_stock_out')?>">Laporan Stock Out</a></li>
              <!-- <li><a href="">Chart</a></li> -->
            </ul>
          </li>
        <?php } ?>
        
        <li class="menu-header"></li>
        <li>
          <a href="<?=site_url('auth/logout')?>" class="nav-link btn btn-danger mb-1" style="color: #000000"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
          
        </li>
        <li class="menu-header"></li>
        <li>
          <a href="auth/ganti_password" class="nav-link btn btn-primary mb-1" style="color: #000000"><i class="fas fa-lock"></i><span>Ganti Password</span></a>
          
        </li>


        <li class="menu-header"></li>
        <li class="menu-header"></li>
      </ul>
      
    </aside>
  </div>
</div>
</div>
</body>


<!-- Main Content -->
<div class="main-content">
  <?php echo $contents ?>
</div>

<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
  </div>
  <div class="footer-right">
    2.3.0
  </div>
</footer>



<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?php echo base_url('assets/assets_stisla') ?>/assets/js/stisla.js"></script>




<script src="<?php echo base_url('assets/assets_stisla') ?>/assets/js/scripts.js"></script>
<script src="<?php echo base_url('assets/assets_stisla') ?>/assets/js/custom.js"></script>


<script src="<?php echo base_url('assets/assets_stisla') ?>/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/assets_stisla') ?>/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>


<script>
  $(document).ready(function() {
    $('#datatables').DataTable();
  });
</script>

<script>
  var flash = $('#flash').data('flash');
  if(flash) {
    Swal.fire({
      icon: "error",
      title: "Error!",
      text: "Item Belum Dipilih!",
    });
  }


  $(document).on('click', '#btn-delete', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
      title: "Yakin Data Ingin Dihapus?",
        // text: "Password Akan Direset Menjadi 123456",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
      }).then((result) => {
        if (result.isConfirmed) {
         window.location = link;
       }
     });
    })


  </script>


</body>
</html>
