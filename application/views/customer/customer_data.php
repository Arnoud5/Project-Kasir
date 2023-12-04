<section class="section">
  <div class="section-header">
    <h1> Data Customer</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>

  <!-- main content -->
  <section class="content">
    <?php $this->view('message')?>
    <a href="<?=site_url('customer/add')?>" style="margin-top: 15px" class="btn btn-primary mb-1">Add(+)</a>
    <div class="card">
     <div class="card-body table-responsive">
      <table class="table table-bordered table-striped" id="datatables">
       <thead>
        <tr>
         <th style="width: 5%" class="text-center">ID</th>
         <th class="text-center">Name</th>
         <th class="text-center">Gender</th>
         <th class="text-center">Phone</th>
         <th class="text-center">Address</th>
         <th class="text-center">Action</th>
       </tr>
     </thead>
     <tbody>
      <?php $no = 1;
      foreach($row->result() as $key => $data) { ?>
        <tr>
         <td><?=$no++?></td>
         <td><?=$data->name?></td>
         <td><?=$data->gender?></td>
         <td><?=$data->phone?></td>
         <td><?=$data->address?></td>
         <td class="text-center" width="250px">
          <form action="<?=site_url('customer/reset')?>" method="post">
            
            <a href="<?=site_url('customer/edit/'.$data->customer_id)?>" class="btn btn-primary btn-xs">
             <i class="fa fa-edit" style="margin-right: 3px"></i>Edit</a>

           </form>

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