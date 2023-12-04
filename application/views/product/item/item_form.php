<section class="section">
  <div class="section-header">
    <h1><?=ucfirst($page)?> item</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>

  <!-- main content -->
  <section class="content">
   <?php $this->view('message')?>
   <div class="card">
     <div class="card-body" style="margin-top: 30px">
      <div class="row">
       <div class="col-md-4" style="margin-left: 30px">
        <?php echo form_open_multipart('item/process') ?>
        <div class="form-group">
          <label><b>Barcode</b></label>
          <input type="hidden" name="id" value="<?=$row->item_id?>">
          <input type="text" name="barcode" value="<?=$row->barcode?>" class="form-control" required>
          <span style="color: red"><?=form_error('barcode')?></span>
        </div>
        <div class="form-group">
          <label><b>Nama Item</b></label>
          <input type="text" name="name" value="<?=$row->name?>" class="form-control" required>
          <span style="color: red"><?=form_error('name')?></span>
        </div>

        <div class="form-group">
          <label><b>Satuan</b></label>
          <?php echo form_dropdown('unit', $unit, $selectedunit, 
          ['class' => 'form-control', 'required' => 'required'])?>
          <span style="color: red"><?=form_error('satuan')?></span>
        </div>
        <div class="form-group">
          <label><b>Price</b></label>
          <input type="number" name="price" value="<?=$row->price?>" class="form-control" required>
          <span style="color: red"><?=form_error('price')?></span>
        </div>
        
        <div class="form-group">
          <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
           <i class="fa fa-paper-plane" style="margin-right: 3px"></i>Save</button>
           <button type="reset" class="btn btn-primary btn-flat" style="margin-left: 10px">
            <i class="fa fa-undo" style="margin-right: 3px"></i>Reset</button>
            <a style="margin-left: 10px" href="<?=site_url('item')?>" class="btn btn-danger btn-flat">
             <i class="fa fa-arrow-left" style="margin-right: 3px"></i>Back</a>

           </div>

           <?php echo form_close() ?>

         </div>
       </div>
     </div>
   </div>
 </section>

</section>