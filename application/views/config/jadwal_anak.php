
 
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
        <?php if($getidentitas == null){ 

          echo "Penjadwalan Izin dan Jadwal Pengganti";}
        else{ echo 'Penjadwalan Izin dan Jadwal Pengganti '.$getidentitas->nama_lengkap; }?>
        <?php ?>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
  <div class="col-md-6">
    <a data-toggle="modal" data-target="#modal-tambah">
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Jadwal</button><br><br>
    </a>


    <div class="box">
      <div class="box-header">
        <h3 class="box-title">PENGAJUAN IZIN</h3>
        

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
            <th>No</th>
            <th>Tanggal Izin</th>
            <th>Ket</th>
            <th>Status</th>
            
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
        $no = 1;
          foreach ($sm_user->result() as $row) {
           ?>
          <tr>

             
             <td><?php echo $no; ?></td>
             <td><?php echo $row->tanggal_pengajuan; ?></td>
             <td><?php echo $row->keterangan; ?></td>
              <td><?php echo $row->status; ?></td>
            <td>

 <a data-toggle="modal" data-target="#modal-edit<?=$row->id_izn;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>


             
 <a data-toggle="modal" data-target="#modal-hapus<?=$row->id_izn;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-trash"></i></a>

            </td>
          </tr>
          <?php $no++; } ?>

          </tbody>
        </table>
     
      <!-- /.box-body -->
    </div>
  </div>



    <div class="box">
      <div class="box-header">
        <h3 class="box-title">JADWAL PENGGANTI</h3>
        

      </div>
    

<div class="box-header">
  
      </div>


      <!-- /.box-header -->
      <div class="box-body">
        <table id="pengganti" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Jam</th>
            <th>Nama</th>
            <th>Terapis</th>
            <th>Ket</th>
          
          </tr>
          </thead>
          <tbody>
          <?php 
        $no = 1;
          foreach ($tb_pengganti->result() as $row) {
           ?>
          <tr>

             
             <td><?php echo $row->jam_mulai; ?> - <?php echo $row->jam_selesai; ?></td>
             <td><?php echo $row->nama_lengkap; ?></td>
             <td><?php echo $row->jenis_terapi; ?></td>
              <td><?php echo $row->keterangan; ?></td>
           

          </tr>
          <?php $no++; } ?>

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
      $('#pengganti').DataTable();
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

<!--/modal ubah-->

<?php 
          foreach ($sm_user->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit<?=$row->id_izn;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('dashboard/edit_jadwal')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Izin</h4>
        </div>
        <div class="modal-body">
      <input type="hidden" name="id_izn" autocomplete="off" value="<?=$row->id_izn;?>" required class="form-control" cols="30" rows="3">
          
          <div class="form-group">
            <label>Tanggal Izin</label>
          <input type="date" name="tanggal_pengajuan" autocomplete="off" value="<?=$row->tanggal_pengajuan;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
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
 <!-- Modal hapus -->
<?php 
          foreach ($sm_user->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus<?=$row->id_izn;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/hapus_izin/<?php echo $row->id_izn; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Izin</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_izn;?>" name="id_izn" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Izin <?=$row->nama_lengkap;?> dengan keterangan <?=$row->keterangan;?></label>
          
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


      </div>



<!--/ Modal Tambah -->
<div class="row">
  <div id="modal-tambah" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('dashboard/tambah_izin')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data Izin</h4>
        </div>
        <div class="modal-body">
 
         
          <div class="form-group">
          <input type="hidden" name="id_anak" autocomplete="off" required placeholder="Masukkan Jam Mulai" class="form-control" cols="30" rows="3" value="<?php echo $this->session->userdata('id_user');?>">
          </div>

          <div class="form-group">
            <label>Tanggal Izin</label>
          <input type="date" name="tanggal_pengajuan" autocomplete="off" required="" value="" class="form-control" cols="30" rows="3">
          </div>

           <div class="form-group">
            <label>Keterangan</label>
          <input type="text" name="keterangan" autocomplete="off" required placeholder="Masukkan keterangan" class="form-control" cols="30" rows="3">
          </div>


 <div class="form-group">
            <label>Status</label>
          <input type="text" name="status" autocomplete="off" required placeholder="Masukkan Jenis Terapi" class="form-control" cols="30" rows="3">
          </div>
      
           
           
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i>Simpan</button>
          </div>
        </form>

     </div>
  </div>
</div>

<!--end modal tambah -->
