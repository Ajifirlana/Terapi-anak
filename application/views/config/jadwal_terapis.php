
 
<!DOCTYPE html>
<html>
<head>

 <?php $this->load->view('template_a');?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('config/top-menu'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
  <?php $this->load->view('config/side'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small>Control Panel</small>
      </h1>
     
    </section>
<section class="content-header">
    <div class="col-md-3">
          <div class="info-box">
          

            <div align="center">
              <span class="info-box-text">Jadwal</span>
              <span class="info-box-number"><?php echo $jumlahjadwal;?><small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div><div class="col-md-3">
          <div class="info-box">
          

            <div class="info-box-content">
              <span class="info-box-text">Izin</span>
               <span class="info-box-number"><?php echo $jumlahanakizin ;?><small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3">
          <div class="info-box">
          

            <div class="info-box-content">
              <span class="info-box-text">Lihat Terapis</span>
              <span class="info-box-number">0<small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div><div class="col-md-3">
          <div class="info-box">
          

            <div class="info-box-content">
              <span class="info-box-text">Lihat Anak</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
      </section>
    <!-- Main content -->
    <section class="content">
    <div class="row">
  <div class="col-md-8">
    <a data-toggle="modal" data-target="#modal-tambah">
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Jadwal</button><br><br>
    </a>


    <div class="box">
      <div class="box-header">
        <h3 class="box-title">SENIN</h3>
        

      </div>
      <section class="content-header">
          <small><?php
          echo $this->session->flashdata('msg');
          ?></small>
      </section>

<div class="box-header">
	
      </div>


      <!-- /.box-header -->
      <div class="box-body">
        <table id="user" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Nama Lengkap</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>

            <th>Ruang Terapis</th>
            <th>Jenis Terapis</th>
            
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
        
          foreach ($sm_user->result() as $row) {
           ?>
          <tr>

             
             <td><?php echo $row->nama_lengkap; ?></td>
             <td><?php echo $row->jam_mulai; ?></td>
             <td><?php echo $row->jam_selesai; ?></td>

              <td><?php echo $row->ruang; ?></td>
              <td><?php echo $row->jenis_terapi; ?></td>
            <td>

 <a data-toggle="modal" data-target="#modal-edit<?=$row->id_jadwal;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>


             
 <a data-toggle="modal" data-target="#modal-hapus<?=$row->id_jadwal;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-trash"></i></a>

            </td>
          </tr>
          <?php } ?>

          </tbody>
        </table>
     
      <!-- /.box-body -->
    </div>
  </div>




      <!-- /.box-header -->




  <div class="box">
      <div class="box-header">
        <h3 class="box-title">SELASA</h3>
        

      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="selasa" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Nama Lengkap</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>

            <th>Ruang Terapis</th>
            <th>Jenis Terapis</th>
            
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
        
          foreach ($selasa->result() as $row)  {
           ?>

          <tr>
             <td><?php echo $row->nama_lengkap; ?></td>
             <td><?php echo $row->jam_mulai; ?></td>
             <td><?php echo $row->jam_selesai; ?></td>

             <td><?php echo $row->ruang; ?></td>
              <td><?php echo $row->jenis_terapi; ?></td>
        <td>

 <a data-toggle="modal" data-target="#modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>
 <a data-toggle="modal" data-target="#modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-trash"></i></a>

            </td>

          </tr>
 <?php } ?>        

          </tbody>
        </table>
     
      <!-- /.box-body -->
    </div>


    
  </div>


      <!-- /.box-header -->


  <div class="box">
      <div class="box-header">
        <h3 class="box-title">RABU</h3>
        

      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="rabu" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Nama Lengkap</th>

            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
           
            <th>Ruang Terapis</th>
             <th>Jenis Terapis</th>
            
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
        
          foreach ($rabu->result() as $row)  {
           ?>

          <tr>
             <td><?php echo $row->id_jadwal; ?><?php echo $row->nama_lengkap; ?></td>
             <td><?php echo $row->jam_mulai; ?></td>
             <td><?php echo $row->jam_selesai; ?></td>

             <td><?php echo $row->ruang; ?></td>
              <td><?php echo $row->jenis_terapi; ?></td>
        <td>

 <a data-toggle="modal" data-target="#modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>
 <a data-toggle="modal" data-target="#modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-trash"></i></a>

            </td>

          </tr>
 <?php } ?>        

          </tbody>
        </table>
     
      <!-- /.box-body -->
    </div>


    
  </div>


      <!-- /.box-header -->

  <div class="box">
      <div class="box-header">
        <h3 class="box-title">KAMIS</h3>
        

      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="kamis" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Nama Lengkap</th>

            <th>Jam Mulai</th>
            <th>Jam Selesai</th>

            <th>Ruang Terapis</th>
            <th>Jenis Terapis</th>
            
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
        
          foreach ($kamis->result() as $row)  {
           ?>

          <tr>
             <td><?php echo $row->nama_lengkap; ?></td>
             <td><?php echo $row->jam_mulai; ?></td>
             <td><?php echo $row->jam_selesai; ?></td>

             <td><?php echo $row->ruang; ?></td>
              <td><?php echo $row->jenis_terapi; ?></td>
        <td>

 <a data-toggle="modal" data-target="#modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>
 <a data-toggle="modal" data-target="#modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-trash"></i></a>

            </td>

          </tr>
 <?php } ?>        

          </tbody>
        </table>
     
      <!-- /.box-body -->
    </div>


    
  </div>


        <!-- /.box-header -->

  <div class="box">
      <div class="box-header">
        <h3 class="box-title">JUM'AT</h3>
        

      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="jumat" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Nama Lengkap</th>

            <th>Jam Mulai</th>
            <th>Jam Selesai</th>

            <th>Ruang Terapis</th>
            <th>Jenis Terapis</th>
            
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
        
          foreach ($jumat->result() as $row)  {
           ?>

          <tr>
             <td><?php echo $row->nama_lengkap; ?></td>
             <td><?php echo $row->jam_mulai; ?></td>
             <td><?php echo $row->jam_selesai; ?></td>

             <td><?php echo $row->ruang; ?></td>
              <td><?php echo $row->jenis_terapi; ?></td>
        <td>

 <a data-toggle="modal" data-target="#modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>
 <a data-toggle="modal" data-target="#modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-trash"></i></a>

            </td>

          </tr>
 <?php } ?>        

          </tbody>
        </table>
     
      <!-- /.box-body -->
    </div>


    
  </div>


   <div class="box">
      <div class="box-header">
        <h3 class="box-title">SABTU</h3>
        

      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="sabtu" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Nama Lengkap</th>

            <th>Jam Mulai</th>
            <th>Jam Selesai</th>

            <th>Ruang Terapis</th>
            <th>Jenis Terapis</th>
            
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
        
          foreach ($sabtu->result() as $row)  {
           ?>

          <tr>
             <td><?php echo $row->nama_lengkap; ?></td>
             <td><?php echo $row->jam_mulai; ?></td>
             <td><?php echo $row->jam_selesai; ?></td>

             <td><?php echo $row->ruang; ?></td>
              <td><?php echo $row->jenis_terapi; ?></td>
        <td>

 <a data-toggle="modal" data-target="#modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>
 <a data-toggle="modal" data-target="#modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-trash"></i></a>

            </td>

          </tr>
 <?php } ?>        

          </tbody>
        </table>
     
      <!-- /.box-body -->
    </div>


    
  </div>




   <div class="box">
      <div class="box-header">
        <h3 class="box-title">MINGGU</h3>
        

      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="minggu" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Nama Lengkap</th>

            <th>Jam Mulai</th>
            <th>Jam Selesai</th>

            <th>Ruang Terapis</th>
            <th>Jenis Terapis</th>
            
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
        
          foreach ($minggu->result() as $row)  {
           ?>

          <tr>
             <td><?php echo $row->nama_lengkap; ?></td>
             <td><?php echo $row->jam_mulai; ?></td>
             <td><?php echo $row->jam_selesai; ?></td>

              <td><?php echo $row->ruang; ?></td>
              <td><?php echo $row->jenis_terapi; ?></td>
        <td>

 <a data-toggle="modal" data-target="#modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>
 <a data-toggle="modal" data-target="#modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-trash"></i></a>

            </td>

          </tr>
 <?php } ?>        

          </tbody>
        </table>
     
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
    <strong>Copyright &copy; 2021 <a href="https://caramengatasimasalahmu.blogspot.com">Teknologi</a>.</strong> All rights
    reserved.
  </footer>

<script type="text/javascript">
  $(document).ready( function () {
      $('#user').DataTable();
  } );

  $(document).ready( function () {
      $('#selasa').DataTable();
  } );

  $(document).ready( function () {
      $('#rabu').DataTable();
  } );


  $(document).ready( function () {
      $('#kamis').DataTable();
  } );


  $(document).ready( function () {
      $('#jumat').DataTable();
  } );

  $(document).ready( function () {
      $('#sabtu').DataTable();
  } );


  $(document).ready( function () {
      $('#minggu').DataTable();
  } );
</script>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>

</body>


</html>

 <!-- Modal hapus -->
<?php 
          foreach ($sm_user->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus<?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_user/<?php echo $row->id_jadwal; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Jadwal...???</label>
            <br>
            <label>"<?=$row->nama_lengkap;?>"</label>
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


 <!-- Modal hapus -->
<?php 
          foreach ($sabtu->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_user/<?php echo $row->id_jadwal; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Jadwal...???</label>
            <br>
            <label>"<?=$row->nama_lengkap;?>"</label>
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



 <!-- Modal hapus -->
<?php 
          foreach ($minggu->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_user/<?php echo $row->id_jadwal; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Jadwal...???</label>
            <br>
            <label>"<?=$row->nama_lengkap;?>"</label>
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



 <!-- Modal hapus -->
<?php 
          foreach ($kamis->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_user/<?php echo $row->id_jadwal; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Jadwal...???</label>
            <br>
            <label>"<?=$row->nama_lengkap;?>"</label>
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



 <!-- Modal hapus -->
<?php 
          foreach ($jumat->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_user/<?php echo $row->id_jadwal; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Jadwal...???</label>
            <br>
            <label>"<?=$row->nama_lengkap;?>"</label>
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


        <!-- Modal hapus selasa-->
<?php 
          foreach ($selasa->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_user/<?php echo $row->id_jadwal; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Jadwal...???</label>
            <br>
            <label>"<?=$row->nama_lengkap;?>"</label>
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

      </div>

    <!-- Modal hapus selasa-->
<?php 
          foreach ($rabu->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_user/<?php echo $row->id_jadwal; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Jadwal...???</label>
            <br>
            <label>"<?=$row->nama_lengkap;?>"</label>
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

      </div>



<!--/modal ubah-->

<?php 
          foreach ($sm_user->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit<?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/edit_user')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
  

         <div class="form-group">
            
           <input type="hidden" name="id_anak" autocomplete="off" value="<?=$row->id_anak;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>


         <div class="form-group">
            <label>Jam Mulai</label>
     
           <input type="text" name="jam_mulai" autocomplete="off" value="<?=$row->jam_mulai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>        

         <div class="form-group">
            <label>Jam Selesai</label>
     
           <input type="text" name="jam_selesai" autocomplete="off" value="<?=$row->jam_selesai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>   
<div class="form-group">
            <label>Hari</label>
     
            <select name="hari" class="form-control" selected>
            
              <option value="senin">senin</option>

              <option value="selasa">selasa</option>

              <option value="rabu">rabu</option>

              <option value="kamis">kamis</option>


                          <option value="jumat">jumat</option>

                          <option value="sabtu">sabtu</option>
                          <option value="minggu">minggu</option>
                          

            </select>
          
          </div>

           <div class="form-group">
            <label>Jenis Terapis</label>
     
           <input type="text" name="jenis_terapi" autocomplete="off" value="<?=$row->jenis_terapi;?>" required placeholder="Masukkan Jenis Terapi" class="form-control" cols="30" rows="3">
          
          </div>     
           
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i>Edit</button>
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>


<!--/modal ubah-->

<?php 
          foreach ($sabtu->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/edit_user')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
  

         <div class="form-group">
            
           <input type="hidden" name="id_anak" autocomplete="off" value="<?=$row->id_anak;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>


         <div class="form-group">
            <label>Jam Mulai</label>
     
           <input type="text" name="jam_mulai" autocomplete="off" value="<?=$row->jam_mulai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>        

         <div class="form-group">
            <label>Jam Selesai</label>
     
           <input type="text" name="jam_selesai" autocomplete="off" value="<?=$row->jam_selesai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>   
<div class="form-group">
            <label>Hari</label>
     
            <select name="hari" class="form-control" selected>
            
              <option value="senin">senin</option>

              <option value="selasa">selasa</option>

              <option value="rabu">rabu</option>

              <option value="kamis">kamis</option>


                          <option value="jumat">jumat</option>

                          <option value="sabtu">sabtu</option>
                          <option value="minggu">minggu</option>
                          

            </select>
          
          </div>

           <div class="form-group">
            <label>Jenis Terapis</label>
     
           <input type="text" name="jenis_terapi" autocomplete="off" value="<?=$row->jenis_terapi;?>" required placeholder="Masukkan Jenis Terapi" class="form-control" cols="30" rows="3">
          
          </div>     
           
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i>Edit</button>
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>



<!--/modal ubah-->

<?php 
          foreach ($minggu->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/edit_user')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
  

         <div class="form-group">
            
           <input type="hidden" name="id_anak" autocomplete="off" value="<?=$row->id_anak;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>


         <div class="form-group">
            <label>Jam Mulai</label>
     
           <input type="text" name="jam_mulai" autocomplete="off" value="<?=$row->jam_mulai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>        

         <div class="form-group">
            <label>Jam Selesai</label>
     
           <input type="text" name="jam_selesai" autocomplete="off" value="<?=$row->jam_selesai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>   
<div class="form-group">
            <label>Hari</label>
     
            <select name="hari" class="form-control" selected>
            
              <option value="senin">senin</option>

              <option value="selasa">selasa</option>

              <option value="rabu">rabu</option>

              <option value="kamis">kamis</option>


                          <option value="jumat">jumat</option>

                          <option value="sabtu">sabtu</option>
                          <option value="minggu">minggu</option>
                          

            </select>
          
          </div>

           <div class="form-group">
            <label>Jenis Terapis</label>
     
           <input type="text" name="jenis_terapi" autocomplete="off" value="<?=$row->jenis_terapi;?>" required placeholder="Masukkan Jenis Terapi" class="form-control" cols="30" rows="3">
          
          </div>     
           
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i>Edit</button>
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>



<?php 
          foreach ($jumat->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/edit_user')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
  

         <div class="form-group">
            
           <input type="hidden" name="id_anak" autocomplete="off" value="<?=$row->id_anak;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>


         <div class="form-group">
            <label>Jam Mulai</label>
     
           <input type="text" name="jam_mulai" autocomplete="off" value="<?=$row->jam_mulai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>        

         <div class="form-group">
            <label>Jam Selesai</label>
     
           <input type="text" name="jam_selesai" autocomplete="off" value="<?=$row->jam_selesai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>   
<div class="form-group">
            <label>Hari</label>
     
            <select name="hari" class="form-control" selected>
            
              <option value="senin">senin</option>

              <option value="selasa">selasa</option>

              <option value="rabu">rabu</option>

              <option value="kamis">kamis</option>


                          <option value="jumat">jumat</option>

                          <option value="sabtu">sabtu</option>
                          <option value="minggu">minggu</option>
                          

            </select>
          
          </div>

           <div class="form-group">
            <label>Jenis Terapis</label>
     
           <input type="text" name="jenis_terapi" autocomplete="off" value="<?=$row->jenis_terapi;?>" required placeholder="Masukkan Jenis Terapi" class="form-control" cols="30" rows="3">
          
          </div>     
           
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i>Edit</button>
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>

<?php 
          foreach ($kamis->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/edit_user')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
  

         <div class="form-group">
            
           <input type="hidden" name="id_anak" autocomplete="off" value="<?=$row->id_anak;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>


         <div class="form-group">
            <label>Jam Mulai</label>
     
           <input type="text" name="jam_mulai" autocomplete="off" value="<?=$row->jam_mulai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>        

         <div class="form-group">
            <label>Jam Selesai</label>
     
           <input type="text" name="jam_selesai" autocomplete="off" value="<?=$row->jam_selesai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>   
<div class="form-group">
            <label>Hari</label>
     
            <select name="hari" class="form-control" selected>
            
              <option value="senin">senin</option>

              <option value="selasa">selasa</option>

              <option value="rabu">rabu</option>

              <option value="kamis">kamis</option>


                          <option value="jumat">jumat</option>

                          <option value="sabtu">sabtu</option>
                          <option value="minggu">minggu</option>
                          

            </select>
          
          </div>

           <div class="form-group">
            <label>Jenis Terapis</label>
     
           <input type="text" name="jenis_terapi" autocomplete="off" value="<?=$row->jenis_terapi;?>" required placeholder="Masukkan Jenis Terapi" class="form-control" cols="30" rows="3">
          
          </div>     
           
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i>Edit</button>
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>

<!--/modal ubah selasa-->

<?php 
          foreach ($selasa->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/edit_user')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
   <div class="form-group">
            
           <input type="hidden" name="id_anak" autocomplete="off" value="<?=$row->id_anak;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>

         <div class="form-group">
            <label>Jam Mulai</label>
     
           <input type="text" name="jam_mulai" autocomplete="off" value="<?=$row->jam_mulai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>        

         <div class="form-group">
            <label>Jam Selesai</label>
     
           <input type="text" name="jam_selesai" autocomplete="off" value="<?=$row->jam_selesai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>   
<div class="form-group">
            <label>Hari</label>
     
            <select name="hari" class="form-control" selected>
            
              <option value="senin">senin</option>

              <option value="selasa">selasa</option>

              <option value="rabu">rabu</option>

              <option value="kamis">kamis</option>


                          <option value="jumat">jumat</option>

                          <option value="sabtu">sabtu</option>
                          <option value="minggu">minggu</option>
                          

            </select>
          
          </div>

           <div class="form-group">
            <label>Jenis Terapis</label>
     
           <input type="text" name="jenis_terapi" autocomplete="off" value="<?=$row->jenis_terapi;?>" required placeholder="Masukkan Jenis Terapi" class="form-control" cols="30" rows="3">
          
          </div>     
           
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i>Edit</button>
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>


<!--/modal ubah selasa-->

<?php 
          foreach ($rabu->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit-<?=$row->hari;?><?=$row->id_jadwal;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/edit_user')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_jadwal;?>" name="id_jadwal" class="form-control" >
 
   <div class="form-group">
            
           <input type="hidden" name="id_anak" autocomplete="off" value="<?=$row->id_anak;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>


         <div class="form-group">
            <label>Jam Mulai</label>
     
           <input type="text" name="jam_mulai" autocomplete="off" value="<?=$row->jam_mulai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>        

         <div class="form-group">
            <label>Jam Selesai</label>
     
           <input type="text" name="jam_selesai" autocomplete="off" value="<?=$row->jam_selesai;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>   
<div class="form-group">
            <label>Hari</label>
     
            <select name="hari" class="form-control" selected>
            
              <option value="senin">senin</option>

              <option value="selasa">selasa</option>

              <option value="rabu">rabu</option>

              <option value="kamis">kamis</option>


                          <option value="jumat">jumat</option>

                          <option value="sabtu">sabtu</option>
                          <option value="minggu">minggu</option>
                          

            </select>
          
          </div>

           <div class="form-group">
            <label>Jenis Terapis</label>
     
           <input type="text" name="jenis_terapi" autocomplete="off" value="<?=$row->jenis_terapi;?>" required placeholder="Masukkan Jenis Terapi" class="form-control" cols="30" rows="3">
          
          </div>     
           
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i>Edit</button>
          </div>
        </form>

     </div>
  </div>
</div>
        <?php } ?>



<!--/ Modal Tambah -->
<div class="row">
  <div id="modal-tambah" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('dashboard/tambah_jadwal')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data Jadwal</h4>
        </div>
        <div class="modal-body">
 
          <div class="form-group">
            <label>ID Anak</label>
     
            <select name="id_anak" class="form-control">
              <?php 


          foreach ($pilianak->result() as $row) {
           ?> 
              <option value="<?php echo $row->id_anak; ?>"><?php echo $row->nama_lengkap; ?></option>


          <?php } ?>
            
            </select>
          
          </div>


          <div class="form-group">
            <label>Nama Guru</label>
     
            <select name="id_guru" class="form-control">
              <?php 


          foreach ($pilih_guru->result() as $row) {
           ?> 
              <option value="<?php echo $row->id; ?>"><?php echo $row->nama_user; ?></option>


          <?php } ?>
            
            </select>
          
          </div>

          <div class="form-group">
            <label>Ruang Terapis</label>
     
          <select name="ruang" class="form-control">
            
              <option value="Ruang Aba">Ruang Aba</option>

              <option value="Ruang Fisio">Ruang Fisio</option>

              <option value="Ruang Wicara">Ruang Wicara</option>

              <option value="Ruang Okupasi">Ruang Okupasi</option>

              <option value="Ruang Sensor integrasi">Ruang Sensor integrasi</option>

            </select>
          </div>

          <div class="form-group">
            <label>Jam Mulai</label>
          <input type="text" name="jam_mulai" autocomplete="off" required placeholder="Masukkan Jam Mulai" class="form-control" cols="30" rows="3">
          </div>

           <div class="form-group">
            <label>Jam Selesai</label>
          <input type="text" name="jam_selesai" autocomplete="off" required placeholder="Masukkan Jam Selesai" class="form-control" cols="30" rows="3">
          </div>
<div class="form-group">
            <label>Hari</label>
     
            <select name="hari" class="form-control">
            
              <option value="senin">senin</option>

              <option value="selasa">selasa</option>

              <option value="rabu">rabu</option>

              <option value="kamis">kamis</option>


                          <option value="jumat">jumat</option>

                          <option value="sabtu">sabtu</option>
                          <option value="minggu">minggu</option>
                          

            </select>
          
          </div>

 <div class="form-group">
            <label>Jenis Terapi</label>
          <input type="text" name="jenis_terapi" autocomplete="off" required placeholder="Masukkan Jenis Terapi" class="form-control" cols="30" rows="3">
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
