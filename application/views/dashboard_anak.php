<!DOCTYPE html>
<html>
<head>
 <?php $this->load->view('template_a');?>
 
 </head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'config/top-menu.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  
  <?php include 'config/side.php'; ?>
  
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


    
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Jadwal Terapi</h3>

 <div class="box-body">
<?php $this->session->userdata('nama_lengkap');?>
      </div>

<div class="box-header">
	<?php
          echo $this->session->flashdata('msg');
          ?>

      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="berita" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Jam Mulai</th>

            <th>Jam Selesai</th>
            <th>Hari</th>
            <th>Jenis Terapi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
         
          foreach ($sm_berita->result() as $row) {
               
           ?>
          <tr>
  <td><?php echo $row->jam_mulai; ?></td>

            <td><?php echo $row->jam_selesai; ?></td>
           <td><?php echo $row->hari; ?></td>
            

            <td><?php echo $row->jenis_terapi; ?></td>
            
          </tr>
          <?php } ?>

          </tbody>
          
        </table>
         



      </div>

      <!-- /.box-body -->
    </div>
  </div>
</div>


  
  <div class="col-md-12">


    
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Izin Terapi</h3>

 <div class="box-body">
<?php $this->session->userdata('nama_lengkap');?>
      </div>

<div class="box-header">


      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="izin" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Keterangan</th>

            <th>Tanggal Pengajuan</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
          <?php 
         
          foreach ($izin_saya->result() as $row) {
               
           ?>
          <tr>
  <td><?php echo $row->keterangan; ?></td>

            <td><?php echo $row->tanggal_pengajuan; ?></td>
           <td><?php echo $row->status; ?></td>
            

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

    <strong>Copyright &copy; 2021 <a href="http://caramengatasimasalahmu.blogspot.com/">Teknologi</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<script type="text/javascript">
  $(document).ready( function () {
      $('#berita').DataTable();
  } );

  $(document).ready( function () {
      $('#izin').DataTable();
  } );
</script>


<!-- ./wrapper -->
<script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>

</body>


</html>
