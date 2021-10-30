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

    <a href="<?php echo base_url();?>index.php/dashboard/tmbhkirimlaporan">
      <button class="btn btn-primary"><i class="fa fa-plus"></i> Kirim Laporan</button><br><br>
    </a>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Kegiatan</h3>


      </div>
      <section class="content-header">
          <small><?php
          echo $this->session->flashdata('msg');
          ?></small>
      </section>

<div class="box-header">
	<?php
    // Cek apakah terdapat session nama message
    if($this->session->flashdata('message')){ // Jika ada
      echo $this->session->flashdata('message'); // Tampilkan pesannya
    }
    ?>

  <?php
    // Cek apakah terdapat session nama message
    if($this->session->flashdata('error')){ // Jika ada
      echo $this->session->flashdata('error'); // Tampilkan pesannya
    }
    ?>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="berita" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>No.</th>

            <th>Tanggal</th>
            <th>File</th>

            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          $no = $this->uri->segment('3') + 1;
          foreach ($kirimlaporan->result() as $row) {
            $tgl = tgl_indo($row->created_at); 
           ?>
          <tr>
            <td><?php echo $no; ?></td>

            <td><?php echo $tgl; ?></td>
            <td align="center"><a data-toggle="modal" data-target="#modal-hapus<?=$row->id_berita;?>"><img src="<?php echo site_url();?>uploads/<?php echo $row->image; ?>" width="100px" height="100px" alt=""></td>
           </td>
            <td><?php echo $row->keterangan; ?></td>


         
            
            <td>
              
                 <a data-toggle="modal" data-target="#modal-edit<?=$row->id_berita;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data">Edit</a>

 <a data-toggle="modal" data-target="#modal-hapus<?=$row->id_berita;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Tampil Data">Tampil</a>

            </td>
          </tr>
          <?php $no++; } ?>

          </tbody>
          
        </table>
         

      <!-- Modal hapus -->
<?php 

          foreach ($kirimlaporan->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus<?=$row->id_berita;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>index.php/dashboard/proses_hapus_berita/<?php echo $row->id_berita; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tampil Data Kegiatan</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id_berita;?>" name="id_berita" class="form-control" >
 
 <div class="form-group">
            <label>Kategori</label>
            <br>
            <label>"<?=$row->kategori;?>"</label>
          </div>

            
        
            <center><label>Foto Kegiatan</label></center>
          
            <td><center> 
<embed src="<?php echo site_url();?>uploads/<?php echo $row->image; ?>" frameborder="0" width="100%" height="400px">

            </center>
            </td>
        
          
        </div>
     
        </form>

     </div>
  </div>
</div>
        <?php } ?>




      <!-- Modal Ubah -->
<?php 
          foreach ($kirimlaporan->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit<?=$row->id_berita;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/edit_laporanku')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Kegiatan</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" name="id_berita" value="<?=$row->id_berita;?>" class="form-control" >
 
         
         <div class="form-group">
            <label>Jadwal Kegiatan</label>
            <input type="date" name="created_at" class="form-control" value="<?=$row->created_at;?>">

          </div>

          <div class="form-group">
            <label>Capaian</label>
            <input type="text" name="capaian" class="form-control" value="<?=$row->capaian;?>">

          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?=$row->keterangan;?>">

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


<!-- END Modal Ubah -->

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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
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