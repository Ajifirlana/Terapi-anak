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
   
    <!-- Main content -->
    <section class="content">

        
    <div class="row">

  <div class="col-md-12">


    
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Guru</h3>
<p></p>

<a data-toggle="modal" data-target="#modal-tambah">
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Guru</button><br><br>
    </a>



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
            <th>Nama Guru</th>
<th>Tanggal Lahir</th>
<th>Jenis Kelamin</th>
<th>Agama</th>
<th>No Telp</th>
<th>Tempat Lahir</th>

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
  <td><?php echo $row->nama_user; ?></td>
 <td><?php echo $row->tanggal_lahir; ?></td>

 <td><?php echo $row->jenis_kelamin; ?></td>

 <td><?php echo $row->agama; ?></td>

 <td><?php echo $row->no_telp; ?></td>

 <td><?php echo $row->tempat_lahir; ?></td>


            <td>
        

 <a data-toggle="modal" data-target="#modal-edit<?=$row->id;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>



 <a data-toggle="modal" data-target="#modal-hapus<?=$row->id;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>


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
  <div id="modal-hapus<?=$row->id;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url()?>dashboard/hapus_guru/<?php echo $row->id; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Guru</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id;?>" name="id" class="form-control" >

          <input type="hidden" readonly value="<?=$row->nama_user;?>" name="nama_lengkap" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Data Guru...???</label>
            
            <label>"<?=$row->nama_user;?>"</label>
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

<br>
      <!-- /.box-header -->
    <!--  <div class="box-body">
   
   <table id="jadwal" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>

            <th>No</th>
            <th>Nama Guru</th>

            <th>Jam Mulai</th>

            <th>Jam Selesai</th>

            <th>Hari</th>

         <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
         $no=1;
          foreach ($jadwal_ajar->result() as $row) {
               
           ?>
          <tr>

  <td><?php echo $no++; ?></td>
  <td><?php echo $row->nama_user; ?></td>

  <td><?php echo $row->jam_mulai; ?></td>

  <td><?php echo $row->jam_selesai; ?></td>

  <td><?php echo $row->hari; ?></td>

          </tr>
          <?php } ?>

          </tbody>
          
        </table>
         

    -->
<?php 

          foreach ($sm_berita->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus<?=$row->id;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url()?>dashboard/hapus_guru/<?php echo $row->id; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Guru</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id;?>" name="id" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Data Guru...???</label>
            
            <label>"<?=$row->nama_user;?>"</label>
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

  $(document).ready( function () {
      $('#jadwal').DataTable();
  } );
</script>


<!-- ./wrapper -->
<script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>

</body>


<!--/ Modal Tambah -->
<div class="row">
  <div id="modal-tambah" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('dashboard/tambah_guru')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data Guru</h4>
        </div>
        <div class="modal-body">
 
           <div class="form-group">
            <label>Nama Guru</label>
          <input type="text" name="nama_user" autocomplete="off" required placeholder="Masukkan Nama Guru" class="form-control" cols="30" rows="3">
          </div>


          <div class="form-group">
            <label>Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" autocomplete="off" required class="form-control" cols="30" rows="3">
          </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
     
            <select name="jenis_kelamin" class="form-control">
             
              <option value="laki-laki">Laki-Laki</option>

              <option value="perempuan">Perempuan</option>
            
            </select>
          
          </div>

          <div class="form-group">
            <label>Agama</label>
     
            <select name="agama" class="form-control">
             
              <option value="islam">islam</option>

              <option value="hindu">hindu</option>

              <option value="kristen">kristen</option>
              <option value="budha">budha</option>
            
            </select>
          
          </div>

 <div class="form-group">
            <label>No Telepon</label>
          <input type="number" name="no_telp" autocomplete="off" required class="form-control">
          </div>

          <div class="form-group">
            <label>Tempat Lahir</label>
          <input type="text" name="tempat_lahir" autocomplete="off" required class="form-control">
          </div>
 <div class="form-group">
            <label>Password</label>
          <input type="text" name="password" autocomplete="off" required placeholder="Masukkan Password" class="form-control" cols="30" rows="3">
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


<!--/ Modal Tambah -->
<div class="row">
  <div id="set-jadwal" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('dashboard/set_jadwal')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Setting Data Guru</h4>
        </div>
        <div class="modal-body">
 
           <div class="form-group">
            <label>Nama Guru</label>
        
        <select name="ruang" class="form-control">
              <?php 


          foreach ($pilih_guru->result() as $row) {
           ?> 
              <option value="<?php echo $row->id; ?>"><?php echo $row->nama_user; ?></option>


          <?php } ?>
            
            </select>
              </div>

          <div class="form-group">
            <label>Ruang Guru</label>
          
            <select name="id_jadwal" class="form-control">
              <?php 


          foreach ($pilihruang->result() as $row) {
           ?> 
              <option value="<?php echo $row->id_jadwal; ?>"><?php echo $row->ruang; ?></option>


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

<!--/modal ubah-->

<?php 
          foreach ($sm_berita->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit<?=$row->id;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('dashboard/edit_guru')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Guru</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id;?>" name="id" class="form-control" >
 
  


         <div class="form-group">
            <label>Nama Guru</label>
     
           <input type="text" name="nama_user" autocomplete="off" value="<?=$row->nama_user;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          
          </div>        




           <div class="form-group">
            <label>Password</label>
     
           <input type="text" name="password" autocomplete="off" value="" required placeholder="Masukkan password baru" class="form-control" cols="30" rows="3">
          
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
</html>