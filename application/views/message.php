<?php if ($this->session->has_userdata('success')) { ?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</span></button>
		<i class="icon fa fa-check"></i> <?=$this->session->flashdata('success');?>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('failed')) { ?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</span></button>
		<i class="icon fa fa-ban"></i> <?=$this->session->flashdata('failed');?>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('gantipass')) { ?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</span></button>
		<i class="icon fa fa-check"></i> <?=$this->session->flashdata('gantipass');?>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('resetsuccess')) { ?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</span></button>
		<i class="icon fa fa-check"></i> <?=$this->session->flashdata('resetsuccess');?>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('resetfailed')) { ?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</span></button>
		<i class="icon fa fa-ban"></i> <?=$this->session->flashdata('resetfailed');?>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('error')) { ?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</span></button>
		<i class="icon fa fa-ban"></i> <?=strip_tags(str_replace('</p>', '', $this->session->flashdata('error')));?>
	</div>
<?php } ?>
<!-- 
$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Item Berhasil ditambahkan!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			</div>'); -->