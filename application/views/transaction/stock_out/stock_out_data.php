<section class="section">
  <div class="section-header">
    <h1> Stock Keluar</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>

  <!-- main content -->
  <section class="content">
    <?php $this->view('message')?>
    <a href="<?=site_url('stock/out/add')?>" style="margin-top: 15px" class="btn btn-primary mb-1">Add(+)</a>
    <div class="card">
     <div class="card-body table-responsive">
      <table class="table table-bordered table-striped" id="datatables">
       <thead>
        <tr>
         <th style="width: 5%" class="text-center">ID</th>
         <th class="text-center">Barcode</th>
         <th class="text-center">Item</th>
         <th class="text-center">Qty</th>
         <th class="text-center">Date</th>
         <th class="text-center">Action</th>
       </tr>
     </thead>
     <tbody>
      <?php $no = 1;
      foreach($row as $key => $data) { ?>
        <tr>
         <td style="width: 5%"><?=$no++?></td>
         <td><?=$data->barcode?></td>
         <td><?=$data->item_name?></td>
         <td class="text-center" style="width: 10%"><?=$data->qty?></td>
         <td class="text-center"><?=indo_date($data->date)?></td>
         <td class="text-center" width="250px">

          
           <button id="set_detail" onclick="select_detail()" class="btn btn-success btn-xs" 
           data-toggle="modal" data-target="#modal-detail"
           data-barcode="<?=$data->barcode?>"
           data-item_name="<?=$data->item_name?>"
           data-qty="<?=$data->qty?>"
           data-detail="<?=$data->detail?>"
           data-date="<?=indo_date($data->date)?>">
           <i class="fa fa-eye" style="margin-right: 3px"></i>Detail</button> 
           <?php if($this->fungsi->user_login()->level == 1) { ?> 
            <a href="<?=site_url('stock/out/del/'.$data->stock_id.'/'.$data->item_id)?>"  id="btn-delete" class="btn btn-danger btn-xs">
             <i class="fa fa-trash" style="margin-right: 3px"></i>Delete</a>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Stock Keluar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
       <table class="table table-bordered no-margin">
         <tbody>
           <tr>
             <th style="width: 35%">Barcode</th>
             <td><span id="barcode"></span></td>
           </tr>
           <tr>
             <th>Item</th>
             <td><span id="item_name"></span></td>
           </tr>
           <tr>
             <th>Qty</th>
             <td><span id="qty"></span></td>
           </tr>
           <tr>
             <th>Detail</th>
             <td><span id="detail"></span></td>
           </tr>
           <tr>
             <th>Date</th>
             <td><span id="date"></span></td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>

<script>
  function select_detail(){
    $(document).on('click', '#set_detail', function() {
      var barcode = $(this).data('barcode');
      var item_name = $(this).data('item_name');
      var qty = $(this).data('qty');
      var detail = $(this).data('detail');
      var date = $(this).data('date');
      $('#barcode').text(barcode);
      $('#item_name').text(item_name);
      $('#qty').text(qty);
      $('#detail').text(detail);
      $('#date').text(date);
    })
  }
</script>
