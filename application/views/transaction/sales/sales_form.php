<section class="section">
  <div class="section-header">
    <h1> Sales</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>
</section>

<section class="content">
  <div class="row">
    <div class="col-lg-4">
     <div class="card card-widget">
      <div class="card-body">
       <table width="100%">
        <tr>
         <td style="vertical-align: top">
          <label for="date"><b>Date</b></label>
        </td>
        <td>
          <div class="form-group">
           <input type="date" id="date" value="<?=date('Y-m-d')?>" class="form-control" readonly disabled>
         </div>
       </td>
     </tr>
     <tr>
       <td style="vertical-align: top">
        <label for="customer"><b>Kasir</b></label>
      </td>
      <td>
        <div class="form-group">
         <input type="text" id="user" value="<?=$this->fungsi->user_login()->name?>" class="form-control" readonly disabled>
       </div>
     </td>
   </tr>
   <tr>
     <td style="vertical-align: top">
      <label for="customer"><b>Customer</b></label>
    </td>
    <td>
      <div class="form-group">
        <input type="text" id="customer"  value="Umum" class="form-control" readonly disabled>
      </div>

    </td>
  </tr>
</table>
</div>
</div>
</div>

<div class="col-lg-4">
 <div class="card card-widget">
  <div class="card-body">
   <table width="100%">
    <tr>
     <td style="vertical-align: top; width: 30%">
      <label for="barcode">Barcode</label>
    </td>
    <td>
      <div class="form-group input-group">
       <input type="hidden" id="item_id">
       <input type="hidden" id="price">
       <input type="hidden" id="stock">
       <input type="hidden" id="qty_cart">
       <input type="text" id="barcode" class="form-control" autofocus autocomplete="off"> 
       <span class="input-group-btn">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-item">
         <i class="fa fa-search"></i>
       </button>
     </span>
   </div>
 </td>
</tr>
<tr>
 <td style="vertical-align: top">
  <label for="qty">Qty</label>
</td>
<td>
  <div class="form-group">
    <div class="row">
      <div class="col-md-5">
       <input type="number" id="qty" value="1" min="1" class="form-control">
     </div>
     <label style="margin-left: 13px">Stock</label>
     <div class="col-md-5">
      <input type="number" id="stock1" class="form-control" readonly disabled>
    </div>
  </div>
</div>
</td>
</tr>
<tr>
 <td></td>
 <td>
  <div>
   <button type="button" id="add_cart" class="btn btn-primary">
    <i class="fa fa-cart-plus"></i>Add
  </button>
</div>
</td>
</tr>
</table>
</div>
</div>            	
</div>

<div class="col-lg-4">
 <div class="card card-widget">
  <div class="card-body">
   <div align="right">
    <h4>Invoice <b><span id="nofaktur"><?=$invoice?></span></b></h4>
    <h1><span style="font-size: 50pt">Rp </span><b><span id="grand_total2" style="font-size: 50pt">0</span></b></h1>
  </div>
</div>
</div>
</div>
</div>

<div class="row">
 <div class="col-lg-12">
  <div class="card card-widget">
   <div class="card-body table-responsive">
    <table class="table table-bordered table-striped">
     <thead>
      <tr>
       <th width="5%" style="text-align: center;"><b>No</b></th>
       <th style="text-align: center;"><b>Barcode</b></th>
       <th style="text-align: center;"><b>Product Item</b></th>
       <th width="8%" style="text-align: center;"><b>Price</b></th>
       <th style="text-align: center;"><b>Qty</b></th>
       <th width="15%" style="text-align: center;"><b>Discount Item</b></th>
       <th width="15%" style="text-align: center;"><b>Total</b></th>
       <th width="18%" style="text-align: center;"><b>Actions</b></th>
     </tr>
   </thead>
   <tbody id="cart_table">
    <?php $this->view('transaction/sales/cart_data') ?>
  </tbody>
</table>
</div>
</div>
</div>
</div>

<div class="row">
 <div class="col-lg-3">
  <div class="card card-widget">
   <div class="card-body">
    <table width="100%">
     <tr>
      <td style="vertical-align: top; width: 30%">
       <label for="sub_total"><b>Sub Total</b></label>
     </td>
     <td>
       <div class="form-group">
        <input type="number" id="sub_total" value="" class="form-control" readonly disabled>
      </div>
    </td>
  </tr>
  <tr>
    <td style="vertical-align: top">
     <label for="discount"><b>Discount</b></label>
   </td>
   <td>
     <div class="form-group">
      <input type="number" id="discount" value="0" min="0" class="form-control">
    </div>
  </td>
</tr>
<tr>
  <td style="vertical-align: top">
   <label for="grand_total"><b>Grand Total</b></label>
 </td>
 <td>
   <div class="form-group">
    <input type="number" id="grand_total" class="form-control" readonly disabled>
  </div>
</td>
</tr>
</table>
</div>
</div>
</div>

<div class="col-lg-3">
  <div class="card card-widget">
   <div class="card-body">
    <table width="100%">
     <tr>
      <td style="vertical-align: top; width: 30%">
       <label for="cash"><b>Cash</b></label>
     </td>
     <td>
       <div class="form-group">
        <input type="number" id="cash" value="0" min="0" class="form-control">
      </div>
    </td>
  </tr>
  <tr>
    <td style="vertical-align: top">
     <label for="change"><b>Change</b></label>
   </td>
   <td>
     <div>
      <input type="number" id="change" class="form-control" readonly disabled>
    </div>
  </td>
</tr>
</table>
</div>
</div>
</div>

<div class="col-lg-3" hidden>
  <div class="card card-widget">
   <div class="card-body">
    <table width="100%">
     <tr>
      <td style="vertical-align: top">
       <label for="note"><b>Note</b></label>
     </td>
     <td>
       <div>
        <textarea id="note" style="height: 112px" rows="3" class="form-control"></textarea>
      </div>
    </td>
  </tr>
</table>
</div>
</div>
</div>

<div class="col-lg-3">
  <div>
    <button id="process_payment" class="btn btn-flat btn-lg btn-success">
      <i class="fa fa-paper-plane"></i> Process Payment
    </button>
    <button style="margin-left: 10px" id="cancel_payment" class="btn btn-flat btn-lg btn-warning">
      <i class="fa fa-refresh"></i> Cancel
    </button>

  </div>
</div>
</div>
</section>

<div class="modal fade" id="modal-item">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Item</h4>
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
                  data-id="<?=$data->item_id?>"
                  data-barcode="<?=$data->barcode?>"
                  data-price="<?=$data->price?>"
                  data-stock="<?=$data->stock?>">
                  <i class="fa fa-check"></i>Select
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

<div class="modal fade" id="modal-item-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Item Cart</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="cartid_item">
        <div class="form-group">
          <label for="product_item">Barcode</label>
          <input type="text" id="barcode_item" class="form-control"  readonly disabled>
        </div>
        <div class="form-group">
          <label for="product_item">Item Name</label>
          <input type="text" id="product_item" class="form-control" readonly disabled>
        </div>
        <div class="form-group">
          <label for="price_item">Price</label>
          <input type="number" id="price_item" min="0" class="form-control"  readonly disabled>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-7">
              <label for="qty_item">qty</label>
              <input type="number" id="qty_item" min="1" class="form-control">
            </div>
            <div class="col-md-5">
              <label for="qty_item">Stock Item</label>
              <input type="number" id="stock_item" class="form-control" readonly disabled>
            </div>
          </div>
        </div>
        <div class="form-group" hidden>
          <label for="total_before">Total Before Discount</label>
          <input type="number" id="total_before" class="form-control" readonly disabled>
        </div>
        <div class="form-group" hidden>
          <label for="discount_item">Discount Per Item</label>
          <input type="number" id="discount_item" min="0" class="form-control">
        </div>
        <div class="form-group">
          <label for="total_item">Total</label>
          <input type="number" id="total_item" class="form-control" readonly disabled>
        </div>
      </div>
      <div class="modal-footer">
        <div class="pull-right">
          <button type="button" id="edit_cart" class="btn btn-lg btn-success"><i class="fa fa-paper-plane"></i> Save</button>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
 $(document).on('click', '#select', function() {
  var barcode = $(this).data('barcode')

  $('#item_id').val($(this).data('id'))
  $('#barcode').val(barcode)
  $('#price').val($(this).data('price'))
  $('#stock').val($(this).data('stock'))
  $('#stock1').val($(this).data('stock'))
  $('#modal-item').modal('hide')

  get_cart_qty(barcode)
})

 function get_cart_qty(barcode){
  $('#cart_table tr').each(function() {
   var qty_cart = $("#cart_table td.barcode:contains('"+barcode+"')").parent().find("td").eq(4).html()
   if(qty_cart != null){
    $('#qty_cart').val(qty_cart)
  }else{
    $('#qty_cart').val(0)
  }
})
}

$(document).on('click', '#add_cart', function() {
  var item_id = $('#item_id').val()
  var price = $('#price').val()
  var stock = $('#stock').val()
  var qty = $('#qty').val()
  var qty_cart = $('#qty_cart').val()

  if(item_id == ''){
    swal.fire("Item Belum Dipilih", "Hi, silahkan pilih item sebelum mencoba lagi", "info");
    $('#barcode').focus()
  } else if (stock < 1 ||  parseInt(stock) < (parseInt(qty_cart) + parseInt(qty))) {
    swal.fire("Stock Tidak Cukup", "Hi, stock tidak cukup. bisa tambahkan stock dahulu atau kurangi barang yang dijual ya", "info");
    $('#qty').focus()
  } else {
    $.ajax({
      type: 'POST',
      url: '<?=site_url('sales/process')?>',
      data: {'add_cart' : true, 'item_id' : item_id, 'price' : price, 'qty' : qty},
      dataType: 'json',
      success: function(result) {
        if(result.success == true) {
          $('#cart_table').load('<?=site_url('sales/cart_data')?>', function() {
            calculate()
          }) 
          $('#item_id').val('')
          $('#barcode').val('')
          $('#qty').val(1)
          $('#stock1').val('')
          $('#barcode').focus('')
        } else {
          swal.fire("Item Gagal Ditambah!", "Item gagal ditambah. silahkan coba lagi", "error");

        }
      }
    })
  }
})

$(document).on('click', '#del_cart', function() {
  Swal.fire({
    title: 'Hapus Item?',
    text: 'Apakah Yakin Item Ingin Dihapus?',
    icon: 'warning',
    showCancelButton: true,
    cancelButtonColor: "#FF0000",
    confirmButtonText: 'ya, saya ingin menghapus item',
    cancelButtonText: 'tidak',
  }).then((result) => {
    if (result.isConfirmed) {
      var cart_id = $(this).data('cartid');
      $.ajax({
        type: 'POST',
        url: '<?=site_url('sales/cart_del')?>',
        dataType: 'json',
        data: {'cart_id': cart_id},
        success: function(result) {
          if(result.success == true) {
            $('#cart_table').load('<?=site_url('sales/cart_data')?>', function() {
              calculate()
            })
            swal.fire("Done!", "Item telah di hapus", "success");
          } else {
            swal.fire("Gagal!", "Item gagal dihapus. harap coba lagi", "error");
          }
        }
      })
    } else {
      swal.fire("info", "item tidak jadi di delete", "info");
    }
  });

})

$(document).on('click', '#update_cart', function() {
  $('#cartid_item').val($(this).data('cartid'))
  $('#barcode_item').val($(this).data('barcode'))
  $('#product_item').val($(this).data('product'))
  $('#stock_item').val($(this).data('stock'))
  $('#price_item').val($(this).data('price'))
  $('#qty_item').val($(this).data('qty'))
  $('#total_before').val($(this).data('price') * $(this).data('qty'))
  $('#discount_item').val($(this).data('discount'))
  $('#total_item').val($(this).data('total'))
})

function count_edit_modal() {
  var price = $('#price_item').val()
  var qty = $('#qty_item').val()
  var discount = $('#discount_item').val()

  total_before = price * qty
  $('#total_before').val(total_before)

  total = (price - discount) * qty
  $('#total_item').val(total)  

  if(discount == '') {
    $('#discount_item').val(0)
  }
}

$(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
  count_edit_modal()
})

$(document).on('click', '#edit_cart', function() {
  var cart_id = $('#cartid_item').val()
  var price = $('#price_item').val()
  var qty = $('#qty_item').val()
  var discount = $('#discount_item').val()
  var total = $('#total_item').val()
  var stock = $('#stock_item').val()

  if(price == '' || price < 1){
    swal.fire("Harga Tidak Boleh Kosong!", "silahkan masukkan harga", "info");
    $('#price_item').focus()
  } else if (qty == '' || qty < 1) {
    swal.fire("Qty Tidak boleh kosong!", "Jumlah barang minimal 1", "info");
    $('#qty_item').focus()
  } else if (parseInt(qty) > parseInt(stock)) {
    swal.fire("Stock Tidak Cukup!", "Hi, stock tidak cukup. bisa tambahkan stock dahulu atau kurangi barang yang dijual ya", "info");
    $('#qty_item').focus()
  } else {
    $.ajax({
      type: 'POST',
      url: '<?=site_url('sales/process')?>',
      data: {'edit_cart' : true, 'cart_id' : cart_id, 'price' : price, 'qty' : qty, 'discount' : discount, 'total' : total},
      dataType: 'json',
      success: function(result) {
        if(result.success == true) {
          $('#cart_table').load('<?=site_url('sales/cart_data')?>', function() {
            calculate() 
          })
          swal.fire("Done!", "Item Cart Berhasil di update!", "success");
          $('#modal-item-edit').modal('hide');
        } else {
          swal.fire("Done!", "Data tidak di update", "info");
          $('#modal-item-edit').modal('hide');
        }
      }
    })
  }
})

function calculate(){
  var subtotal = 0;
  $('#cart_table tr').each(function() {
    subtotal += parseInt($(this).find('#total').text())
  })
  isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

  var discount = $('#discount').val()
  var grand_total = subtotal - discount
  if(isNaN(grand_total)) {
    $('#grand_total').val(0)
    $('#grand_total2').text(0)
  }else{
    $('#grand_total').val(grand_total)
    $('#grand_total2').text(grand_total)
  }

  var cash = $('#cash').val();
  cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

  if(discount == '') {
    $('#discount').val(0)
  }  
}

$(document).on('keyup mouseup', '#discount, #cash', function() {
  calculate()
})

$(document).ready(function() {
  calculate()
}) 

$(document).on('click', '#process_payment', function() {
  var customer_id = $('#customer').val()
  var subtotal = $('#sub_total').val()
  var discount = $('#discount').val()
  var grandtotal = $('#grand_total').val()
  var cash = $('#cash').val()
  var change = $('#change').val()
  var note = $('#note').val()
  var date = $('#date').val()

  if(subtotal < 1) {
    swal.fire("info", "Tidak Ada Item Yang Dipilih!", "info");
    $('#barcode').focus()
  } else if(cash < 1) {
    swal.fire("info", "Jumlah Uang Cash Belum Diinput!", "info");
    $('#cash').focus()
  } else if(change < 0) {
    swal.fire("info", "Jumlah Uang Cash Kurang!", "info");
    $('#cash').focus()
  } else {
    Swal.fire({
      title: 'Proses Transaksi',
      text: 'Apakah Yakin ingin memproses transaksi?',
      icon: 'question',
      showCancelButton: true,
      cancelButtonColor: "#FF0000",
      confirmButtonText: 'ya, saya ingin memproses transaksi',
      cancelButtonText: 'tidak',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: '<?=site_url('sales/process')?>',
          data: {'process_payment' : true, 'customer_id' : customer_id, 'subtotal' : subtotal,
          'discount' : discount, 'grandtotal' : grandtotal, 'cash' : cash, 'change' : change, 'note' : note, 'date' : date},
          dataType: 'json',
          success: function(result) {
            if(result.success) {
              swal.fire("Transaksi Berhasil!", "", "success");
              window.open('<?=site_url('sales/cetak/')?>' + result.sales_id, '_blank');
            }else{
              swal.fire("Transaksi Gagal!", "Silahkan coba lagi", "warning");
            }
            location.href='<?=site_url('sales')?>'
          }
        })
      } else {
      }
    });
  } 
})

$(document).on('click', '#cancel_payment', function() {
 Swal.fire({
  title: 'warning',
  text: 'Yakin Transaksi Ingin Dicancel?',
  icon: 'warning',
  showCancelButton: true,
  cancelButtonColor: "#FF0000",
  confirmButtonText: 'ya, saya ingin cancel transaksi',
  cancelButtonText: 'tidak',
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
      type: 'POST',
      url: '<?=site_url('sales/cart_del')?>',
      dataType: 'json',
      data: {'cancel_payment': true},
      success: function(result) {
        if(result.success == true) {
          $('#cart_table').load('<?=site_url('sales/cart_data')?>', function() {
            calculate()
          })
        }
      }
    })
    $('#discount').val(0)
    $('#cash').val(0)
    $('#customer').val('').change()
    $('#barcode').val('')
    $('#barcode').focus()
  } else {
  }
});
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
          $('#item_id').val(result.item.item_id)
          $('#barcode').val(barcode)
          $('#price').val(result.item.price)
          $('#stock').val(result.item.stock)
          $('#stock1').val(result.item.stock1)

          $('#add_cart').click();
        } else {
          swal.fire("Warning", "Item Tidak Ditemukan!", "warning");
          $('#barcode').val('');
        }
      }
    })
  }
});
</script>

