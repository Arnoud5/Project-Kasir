<section class="section">
  <div class="section-header">
    <h1><?=ucfirst($page)?> customer</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>

  <!-- main content -->
  <section class="content">
   <div class="card">
     <div class="card-body" style="margin-top: 30px" >
      <div class="row">
       <div class="col-md-4" style="margin-left: 30px">
        <form action="<?=site_url('customer/process')?>" method="post">
         <div class="form-group">
          <label><b>Name</b></label>
          <input type="hidden" name="id" value="<?=$row->customer_id?>">
          <input type="text" name="name" value="<?=$row->name?>" class="form-control" required>
          <span style="color: red"><?=form_error('name')?></span>
        </div>
        <div class="form-group">
          <label><b>Gender</b></label>
          <select name="gender" class="form-control" required>
            <option value="">--Pilih--</option>
            <option value="L" <?=$row->gender == 'L' ? 'selected' : ''?>>Laki-laki</option>
            <option value="P" <?=$row->gender == 'P' ? 'selected' : ''?>>Perempuan</option>
          </select>
          <span style="color: red"><?=form_error('description')?></span>
        </div>
        <div class="form-group">
          <label><b>Phone</b></label>
          <input type="text" name="phone" value="<?=$row->phone?>" class="form-control" required>
          <span style="color: red"><?=form_error('phone')?></span>
        </div>
        <div class="form-group">
          <label><b>Address</b></label>
          <textarea name="address"  class="form-control" required><?=$row->address?></textarea>
          <span style="color: red"><?=form_error('address')?></span>
        </div>
        <div class="form-group">
          <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
           <i class="fa fa-paper-plane" style="margin-right: 3px"></i>Save</button>
           <button type="reset" class="btn btn-primary btn-flat" style="margin-left: 10px">
            <i class="fa fa-undo" style="margin-right: 3px"></i>Reset</button>
            <a style="margin-left: 10px" href="<?=site_url('customer')?>" class="btn btn-danger btn-flat">
             <i class="fa fa-arrow-left" style="margin-right: 3px"></i>Back</a>

           </div>

         </form>
       </div>
     </div>
   </div>
 </div>
</section>

</section>