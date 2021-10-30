<?php $this->load->view('template_a');?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  <?php $this->load->view('config/top-menu'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
  <?php $this->load->view('config/side'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small>Control Panel</small>
      
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
  <div class="col-md-12">
   
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Profil</h3>
        
        <section class="content-header">
          <small></small>
      </section>

<div class="box-header">
	
      </div>

      

      <div class="box-body">

        <?php
          echo $this->session->flashdata('msg');
          ?>
<form action="<?php echo base_url('dashboard/update_profile')?>" method="post">
                 <div class="form-group">
           
            <input type="hidden" name="id_user" required="" autocomplete="off" placeholder="Masukkan Kategori Bidang" class="form-control" cols="5" rows="1" value="<?php echo $this->session->userdata('id_user'); ?>">
          </div>
           <div class="form-group">
            <label>Nama User</label>
            <input type="text" name="nama_user" required="" autocomplete="off" placeholder="Masukkan Nama User" class="form-control" cols="5" rows="1" value="<?php echo $this->session->userdata('nama_user'); ?>">
          </div>

          <div class="form-group">
            <label>Password Baru</label>
          <input type="password" name="password" required="" autocomplete="off" placeholder="Password" class="form-control" cols="5" rows="1">
          </div>
          <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i>Simpan</button>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2017 <a href="https://caramengatasimasalahmu.blogspot.com/">Teknologi</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



  <div class="row">
  <div id="#" class="modal fade">
    <div class="modal-dialog">
 
<form action="#" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Kategori</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?= $this->session->userdata('id_user');?>" name="id_user" class="form-control" >
 
      

           <div class="form-group">
            <label>Nama Kategori Bidang</label>
            <input type="text" value="" name="nama_lengkap" class="form-control" >
          </div>

          
                 

        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
          </div>
        </form>

     </div>
  </div>
</div>
<script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>

