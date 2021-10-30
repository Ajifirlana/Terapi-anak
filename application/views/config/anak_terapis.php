
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'top-menu.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  
  <?php include 'side.php'; ?>
  <!-- Content Wrapper. Contains page content -->
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
    <a data-toggle="modal" data-target="#modal-tambah">
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Anak Terapi
        </button><br><br>
    </a>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Anak Terapi</h3>
        
        <section class="content-header">
          <small><?php
          echo $this->session->flashdata('msg');
          ?></small>
      </section>

<div class="box-header">
	<?php 
        if ($this->session->userdata('level') == 'User') {
         ?>

      <script type="text/javascript" language="javascript">
                alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
              </script>
              <?php
              redirect('index.php/dashboard');
            }
        ?>
      </div>

      
<script type="text/javascript">
  $(document).ready( function () {
      $('#komentar').DataTable();
  } );
</script>

      <div class="box-body">
        <table id="komentar" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Nama Lengkap</th> <th>Jenis Kelamin</th><th>Tempat,Tgl Lahir</th>

            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          
          foreach ($sm_komentar->result() as $row) {
           ?>
          <tr>
            <td><?php echo $row->nama_lengkap; ?></td>
            <td><?php echo $row->jenis_kelamin; ?></td>

            <td><?php echo $row->tempat_lahir; ?></td>
            <td>
              
              <a data-toggle="modal" data-target="#modal-edit<?=$row->id_anak;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>

<a data-toggle="modal" data-target="#modal-hapus<?=$row->id_anak;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-trash"></i></a>

            </td>
          </tr>
          <?php } ?>

          </tbody>
        </table>


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
    <strong>Copyright &copy; 2017 <a href="http://caramengatasimasalahmu.blogspot.com/">Teknologi</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!--/ Modal Tambah -->
<div class="row">
  <div id="modal-tambah" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/post_bidang')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data Anak</h4>
        </div>
        <div class="modal-body">
 
         <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" required class="form-control" >
          </div>

<div class="form-group">
            <label>Nama Panggilan</label>
            <input type="text" name="nama_panggilan" required class="form-control" >
          </div>
          
<div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" required class="form-control" >
          </div>
          
                 
<div class="form-group">
            <label>Jenis Kelamin</label>
     
            <select name="jenis_kelamin" class="form-control" selected>
            
              <option value="laki-laki">laki-laki</option>

              <option value="perempuan">perempuan</option>

                          

            </select>
          
          </div>
          <div class="form-group">
            <label>Nama Orang Tua</label>
     
            <select name="id_anak" class="form-control" selected>
       <?php 
          foreach ($data_orang_tua->result() as $ank) {
           ?>
              <option value="<?=$ank->id_user;?>"><?=$ank->nama_user;?></option>

        <?php } ?>
            </select>
          
          </div>
           
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Simpan</button>
          </div>
        </form>

     </div>
  </div>
</div>

<!--end modal tambah -->

<!-- Modal hapus -->
<?php 
          foreach ($sm_komentar->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus<?=$row->id_anak;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_komentar/<?php echo $row->id_anak; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Anak</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_anak;?>" name="id_anak" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Data Anak...???</label>
            <p></p>
            <label>"<?= $row->nama_lengkap;?>"</label>
          </div>
          
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Hapus</button>
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>

    <!-- Modal Ubah -->
<?php 
          foreach ($sm_komentar->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit<?=$row->id_anak;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/edit_anakterapis')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Anak</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id;?>" name="id" class="form-control" >
 
      

           <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" value="<?=$row->nama_lengkap;?>" name="nama_lengkap" class="form-control" >
          </div>
    
<div class="form-group">
            <label>Nama Orang Tua</label>
     
            <select name="id_anak" class="form-control" selected>
              
           <option value="<?=$ank->id_user;?>"><?=$ank->nama_user;?></option>
            <?php 
          foreach ($data_orang_tua->result() as $ank) {
           ?>
              <option value="<?=$ank->id_user;?>"><?=$ank->nama_user;?></option>

        <?php } ?>
            </select>
          
          </div>
<div class="form-group">
            <label>Nama Panggilan</label>
            <input type="text" value="<?=$row->nama_panggilan;?>" name="nama_panggilan" class="form-control" >
          </div>
          
<div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" value="<?=$row->tempat_lahir;?>" name="tempat_lahir" class="form-control" >
          </div>
          
                 
<div class="form-group">
            <label>Jenis Kelamin</label>
     
            <select name="jenis_kelamin" class="form-control" selected>
            
              <option value="laki-laki">laki-laki</option>

              <option value="perempuan">perempuan</option>

                          

            </select>
          
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
        <?php } ?>
<script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>

