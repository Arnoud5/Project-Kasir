<section class="section">
  <div class="section-header">
    <h1><?=ucfirst($page)?> category</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>

  <!-- main content -->
  <section class="content">
    <?php $this->view('message')?>
    <div class="card">
     <div class="card-body" style="margin-top: 30px">
      <div class="row">
       <div class="col-md-4" style="margin-left: 30px">
        <form action="<?=site_url('category/process')?>" method="post">
         <div class="form-group">
          <label><b>Name</b></label>
          <input type="hidden" name="id" value="<?=$row->category_id?>">
          <input type="text" name="name" value="<?=$row->name?>" class="form-control" required>
          <span style="color: red"><?=form_error('name')?></span>
        </div>
        <div class="form-group">
          <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
           <i class="fa fa-paper-plane" style="margin-right: 3px"></i>Save</button>
           <button type="reset" class="btn btn-primary btn-flat" style="margin-left: 10px">
            <i class="fa fa-undo" style="margin-right: 3px"></i>Reset</button>
            <a style="margin-left: 10px" href="<?=site_url('category')?>" class="btn btn-danger btn-flat">
             <i class="fa fa-arrow-left" style="margin-right: 3px"></i>Back</a>

           </div>

         </form>
       </div>
     </div>
   </div>
 </div>
</section>

</section>