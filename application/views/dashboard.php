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
    <section class="content-header">
    <div class="col-md-3">
          <div class="info-box">
          

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Anak</span>
              <span class="info-box-number"><?php echo $jumlah ;?><small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div><div class="col-md-3">
          <div class="info-box">
          

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Terapis</span>
              <span class="info-box-number"><?php echo $jumlah ;?><small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3">
          <div class="info-box">
          

            <div class="info-box-content">
              <span class="info-box-text">Anak Terapi</span>
              <span class="info-box-number"><?php echo $jumlahankterapis ;?><small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div><div class="col-md-3">
          <div class="info-box">
          

            <div class="info-box-content">
              <span class="info-box-text">Anak Terapi Izin</span>
              <span class="info-box-number"><?php echo $jumlahanakizin ;?><small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </section>
    <!-- Main content -->
    <section class="content">

        
    <div class="row">
      <div class="col-md-3">
     <div class="box-header">
        
      </div>
       </div>
  <div class="col-md-12">


    
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Izin</h3>

      <p></p>

 <div class="box-body">

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

            <th>No</th>
            <th>Nama Anak</th>

            <th>Tanggal Pengajuan</th>

            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
         $no=1;
          foreach ($sm_berita->result() as $row) {
               
           ?>
          <tr>

  <td><?php echo $no++; ?></td>
  <td><?php echo $row->nama_lengkap; ?></td>

            <td><?php echo $row->tanggal_pengajuan; ?></td>
           <td><?php echo $row->keterangan; ?></td>
            


            <td><?php echo $row->status; ?></td>
            
            <td>
        

 <a data-toggle="modal" data-target="#modal-hapus<?=$row->id_izn;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>

            </td>
          </tr>
          <?php } ?>

          </tbody>
          
        </table>
         

      <!-- Modal hapus -->
<?php 

          foreach ($sm_berita->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus<?=$row->id_izn;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url()?>dashboard/hapus_izinisadmin/<?php echo $row->id_izn; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Kegiatan</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_izn;?>" name="id_izn" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Data Izin...???</label>
            
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

      <div class="box-header">
  <?php 
        if ($this->session->userdata('level') == 'User') {
         ?>

      <script type="text/javascript" language="javascript">
                alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
              </script>
              <?php
              redirect('index.php/dashboard/chart');
            }
        ?>
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
</script>


<!-- ./wrapper -->
<script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>

</body>


</html>