<section class="section">
  <div class="section-header">
    <h1> Sales Report</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>

  <!-- main content -->
  <section class="content">
    <?php $this->view('message')?>
    <div class="card">
     <div class="card-body table-responsive">
      <table class="table table-bordered table-striped" id="datatables">
       <thead>
        <tr>
         <th style="width: 5%" class="text-center">ID</th>
         <th class="text-center">Invoice</th>
         <th class="text-center">Date</th>
         <th class="text-center">Total</th>
         <th class="text-center">Discount</th>
         <th class="text-center">Grand Total</th>
         <th class="text-center">Action</th>
       </tr>
     </thead>
     <tbody>
      <?php $no = 1;
      foreach($row->result() as $key => $data) { ?>
        <tr>
         <td style="text-align: center;"><?=$no++?></td>
         <td style="text-align: center;"><?=$data->invoice?></td>
         <td style="text-align: center;"><?=indo_date($data->date)?></td>
         <td style="text-align: right;"><?=indo_currency($data->total_price)?></td>
         <td style="text-align: right;"><?=indo_currency($data->discount)?></td>
         <td style="text-align: right;"><?=indo_currency($data->final_price)?></td>
         <td class="text-center" width="350px">    
           <a href="<?=site_url('sales/cetak/'.$data->sales_id)?>" target="_blank" class="btn btn-primary btn-xs">
            <i class="fas fa-print" style="margin-right: 3px"></i>Cetak</a>
            <button id="detail" data-target="#modal-detail" data-toggle="modal" class="btn btn-success btn-xs fas fa-eye"
            data-invoice="<?=$data->invoice?>"
            data-date="<?=indo_date($data->date)?>"
            data-time="<?=substr($data->sales_created, 11, 5)?>"
            data-customer="<?=$data->customer_id == null ? "Umum" : $data->customer_name?>"
            data-total="<?=indo_currency($data->total_price)?>"
            data-discount="<?=indo_currency($data->discount)?>"
            data-grandtotal="<?=indo_currency($data->final_price)?>"
            data-cash="<?=indo_currency($data->cash)?>"
            data-change="<?=indo_currency($data->change)?>"
            data-note="<?=($data->note)?>"
            data-cashier="<?=ucfirst(($data->user_name))?>"
            data-salesid="<?=($data->sales_id)?>">Detail</button>

            
            <?php if($this->fungsi->user_login()->level == 1) { ?> 
              <a  href="<?=site_url('sales/del/'.$data->sales_id)?>" onclick="return confirm('Yakin Data Ingin Dihapus?')" class="btn btn-danger btn-xs">
                <i class="fas fa-trash" style="margin-right: 3px"></i>Delete</a>
              <?php } ?>
            </td>
          </tr>
          <?php 
        } ?>
      </tbody>
    </table>
  </div>
</div>
</section>

</section>

<div class="modal fade" id="modal-detail">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sales Detail</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered no-margin">
          <tbody>
            <tr>
              <th style="width: 20%">Invoice</th>
              <td style="width: 30%"><span id="invoice"></span></td>
              <th style="width: 20%">Customer</th>
              <td style="width: 30%"><span id="cust"></span></td>
            </tr>
            <tr>
              <th>Tanggal</th>
              <td><span id="datetime"></span></td>
              <th>Kasir</th>
              <td><span id="cashier"></span></td>
            </tr>
            <tr>
              <th>Total</th>
              <td><span id="total"></span></td>
              <th>Cash</th>
              <td><span id="cash"></span></td>
            </tr>
            <tr>
              <th>Discount</th>
              <td><span id="discount"></span></td>
              <th>Change</th>
              <td><span id="change"></span></td>
            </tr>
            <tr>
              <th>Grand Total</th>
              <td><span id="grandtotal"></span></td>
              <th>Note</th>
              <td><span id="note"></span></td>
            </tr>
            <tr>
              <th>Product</th>
              <td colspan="3"><span id="product"></span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '#detail', function() {
    $('#invoice').text($(this).data('invoice'))
    $('#cust').text($(this).data('customer'))
    $('#datetime').text($(this).data('date') + ' ' + $(this).data('time'))
    $('#total').text($(this).data('total'))
    $('#discount').text($(this).data('discount'))
    $('#change').text($(this).data('change'))
    $('#grandtotal').text($(this).data('grandtotal'))
    $('#note').text($(this).data('note'))
    $('#cashier').text($(this).data('cashier'))
    $('#cash').text($(this).data('cash'))
    
    var product = '<table class="table no-margin">'
    product += '<tr><th style="text-align: center;">Item</th><th style="text-align: center;">Qty</th><th style="text-align: center;">Price</th><th style="text-align: center;">Disc</th><th style="text-align: center;">Total</th></tr>'
    $.getJSON('<?=site_url('data_sales/sales_product/')?>'+$(this).data('salesid'), function(data) {
      $.each(data, function(key, val) {
        product += '<tr><td>'+val.name+'</td><td style="text-align: center;">'+val.qty+'</td><td style="text-align: right;">'+val.price+'</td><td style="text-align: right;">'+val.discount_item+'</td><td style="text-align: right;">'+val.total+'</td></tr>'
      })
      product += '</table>'
      $('#product').html(product)
    })
  })
</script>
