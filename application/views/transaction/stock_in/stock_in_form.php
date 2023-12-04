<section class="section">
  <div class="section-header">
    <h1>Stock Masuk</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>

  <!-- main content -->
  <section class="content">
   <div class="card">
     <div class="card-body" style="margin-top: 30px">
      <div class="row">
       <div class="col-md-4" style="margin-left: 30px">
        <form action="<?=site_url('stock/process')?>" method="post">
         <div class="form-group">
          <label><b>Date</b></label>
          <input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control" required>
          <span style="color: red"><?=form_error('date')?></span>
        </div>
        <div>
          <label><b>Barcode</b></label>
        </div>
        <div class="form-group input-group">
          <input type="hidden" name="item_id" id="item_id">
          <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
          <span class="input-group-btn">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-item">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
        <div class="form-group">
          <label><b>Item Name</b></label>
          <input type="text" name="name" id="name" class="form-control" readonly>
          <span style="color: red"><?=form_error('name')?></span>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-8">
              <label><b>Satuan</b></label>
              <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
            </div>
            <div class="col-md-4">
              <label><b>Initial Stock</b></label>
              <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label><b>Detail</b></label>
          <input type="text" name="detail" class="form-control" required>
          <span style="color: red"><?=form_error('detail')?></span>
        </div>
        <div class="form-group">
          <label><b>Supplier</b></label>
          <select name="supplier" class="form-control" required>
            <option value="">--Pilih--</option>
            <?php foreach($supplier as $s => $data) { 
              echo '<option value="'.$data->supplier_id.'">'.$data->name.'</option>';
            }?>
          </select>
          <span style="color: red"><?=form_error('supplier')?></span>
        </div>
        <div class="form-group">
          <label><b>Qty</b></label>
          <input type="number" name="qty" class="form-control" required>
          <span style="color: red"><?=form_error('qty')?></span>
        </div>
        <div class="form-group">
          <label><b>Price</b></label>
          <input type="number" name="price" class="form-control" required>
          <span style="color: red"><?=form_error('price')?></span>
        </div>
        <div class="form-group">
          <button type="submit" name="in_add" class="btn btn-success btn-flat">
           <i class="fa fa-paper-plane" style="margin-right: 3px"></i>Save</button>
           <button type="reset" class="btn btn-primary btn-flat" style="margin-left: 10px">
            <i class="fa fa-undo" style="margin-right: 3px"></i>Reset</button>
            <a style="margin-left: 10px" href="<?=site_url('stock/in')?>" class="btn btn-danger btn-flat">
             <i class="fa fa-arrow-left" style="margin-right: 3px"></i>Back</a>
             
           </div>

         </form>
       </div>
     </div>
   </div>
 </div>
</section>

</section>


<div class="modal fade" id="modal-item">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Select Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered table-striped" id="datatables">
          <thead>
            <tr>
              <th>Barcode</th>
              <th>Name</th>
              <th>Satuan</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($item as $i => $data) { ?>
              <tr>
                <td><?=$data->barcode?></td>
                <td><?=$data->name?></td>
                <td><?=$data->unit_name?></td>
                <td><?=indo_currency($data->price)?></td>
                <td><?=$data->stock?></td>
                <td>
                  <button class="btn btn-xs btn-info" id="select" 
                  data-item_id="<?=$data->item_id?>"
                  data-barcode="<?=$data->barcode?>"
                  data-name="<?=$data->name?>"
                  data-unit="<?=$data->unit_name?>"
                  data-stock="<?=$data->stock?>">
                  <i class="fa fa-check">Select</i>
                </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<script>
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var item_id = $(this).data('item_id');
      var barcode = $(this).data('barcode');
      var name = $(this).data('name');
      var unit_name = $(this).data('unit');
      var stock = $(this).data('stock');
      $('#item_id').val(item_id);
      $('#barcode').val(barcode);
      $('#name').val(name);
      $('#unit_name').val(unit_name);
      $('#stock').val(stock);
      $('#modal-item').modal('hide');
    })
  })

  $('#barcode').keypress(function (e) {
    var key = e.which;
    var barcode = $(this).val();
    if(key == 13){
      $.ajax({
        type: 'POST',
        url: '<?=site_url('sales/get_item')?>',
        data: {'barcode' : barcode},
        dataType: 'json',
        success: function(result) {
          if(result.success == true) {
            $('#select').click();
          } else {
            alert('Item Tidak Ditemukan!');
            $('#barcode').val('');
          }
        }
      })
    }
  });

</script>

