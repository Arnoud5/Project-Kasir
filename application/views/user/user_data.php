<section class="section">
  <div class="section-header">
    <h1> Data User</h1>
  </div>
  <?php $this->load->view("_partials/breadcrumb.php") ?>

  <!-- main content -->
  <section class="content">
    <?php $this->view('message')?>
    <a href="<?=site_url('user/add')?>" style="margin-top: 15px" class="btn btn-primary mb-1">Add(+)</a>
    <div class="card">
     <div class="card-body table-responsive">
      <table class="table table-bordered table-striped" id="datatables">
       <thead>
        <tr>
         <th style="width: 5%" class="text-center">ID</th>
         <th class="text-center">Username</th>
         <th class="text-center">Name</th>
         <th class="text-center">Address</th>
         <th class="text-center">Level</th>
         <th class="text-center">Action</th>
       </tr>
     </thead>
     <tbody>
      <?php $no = 1;
      foreach($row->result() as $key => $data) { ?>
        <tr>
         <td><?=$no++?></td>
         <td><?=$data->username?></td>
         <td><?=$data->name?></td>
         <td><?=$data->address?></td>
         <td><?=$data->level == 1 ? "Admin" : "Kasir"?></td>
         <td class="text-center" width="250px">
          
          <a href="<?=site_url('user/edit/'.$data->user_id)?>" class="btn btn-primary btn-xs">
           <i class="fa fa-edit" style="margin-right: 3px"></i>Edit</a>

           <a href="#modalReset" data-toggle="modal" onclick="$('#modalReset #formReset').attr('action')" class="btn btn-success btn-xs">
             <i class="fa fa-unlock" style="margin-right: 3px"></i>Reset Pass</a>
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

<div class="modal fade" id="modalReset">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <h4 class="modal-title" style="margin-left: 30px">Yakin Password Ingin Direset?</h4>
      <div class="modal-footer">
        <form style="margin-top: 20px" id="formReset" action="<?=site_url('user/reset')?>"  method="post">
          <input type="hidden" name="user_id" value="<?=$data->user_id?>">
          <button class="btn btn-primary btn-lg"  style="margin-right: 10px; font-size: 16px">Yes</button>
          <button class="btn btn-danger btn-lg" data-dismiss="modal" style="font-size: 16px">Cancel</button>
        </form>
      </div>
      <p></p>
    </div>
  </div>
</div>