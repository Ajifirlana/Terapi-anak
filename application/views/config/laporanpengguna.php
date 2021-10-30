<!DOCTYPE html>
<html>
<head>
  
</head>
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
     </h1>
     
 <a data-toggle="modal" data-target="#modal-tambah">
      <button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Data Pengguna
        </button><br><br>
    </a>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
  <div class="col-md-12">
  

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Orang Tua</h3>
        
 <?php
          echo $this->session->flashdata('msg');
          ?>
      </div>

<div class="box-header">
  
      </div>

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

<script type="text/javascript">
  $(document).ready( function () {
      $('#user').DataTable();
  } );
</script>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="user" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
          <tr>
            <th>Nama Orang Tua</th>
            <th>ID Anak</th>
            <th>Nama Anak</th>
            <th>Hak Akses</th>
            
            <th>Aksi</th>
            
          </tr>
          </thead>
          <tbody>
          <?php 
          $no = $this->uri->segment('3') + 1;
          foreach ($sm_user->result() as $row) {
           ?>
          <tr>
             <td><?php echo $row->nama_user; ?></td>

             <td><?php echo $row->id_user; ?></td>

             <td><?php echo $row->nama_lengkap; ?></td>
             <td><?php echo $row->hak_akses; ?></td>
          <td>
 <a data-toggle="modal" data-target="#modal-edit<?=$row->id;?>" button class="btn btn-info btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil-square-o"></i></a>


             
 <a data-toggle="modal" data-target="#modal-hapus<?=$row->id;?>" button class="btn btn-danger btn-flat btn-xs" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-trash"></i></a>
</td>
          
          </tr>
          <?php $no++; } ?>

          </tbody>
        </table>

      <!-- Modal hapus -->
<?php 
          foreach ($sm_user->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-hapus<?=$row->id;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url();?>dashboard/hapus_orang_tua/<?php echo $row->id; ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Hapus Data Orang Tua</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$row->id;?>" name="id" class="form-control" >
 
 <div class="form-group">
            <label>Apakah Anda Yakin Menghapus Data Orang Tua ?</label>
            <br>
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

<!--/modal ubah-->

<?php 
          foreach ($sm_user->result() as $row) {
           ?>

  <div class="row">
  <div id="modal-edit<?=$row->id;?>" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('dashboard/edit_pengguna')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Orang Tua</h4>
        </div>
        <div class="modal-body">
      <input type="hidden" name="id" autocomplete="off" value="<?=$row->id;?>" required class="form-control" cols="30" rows="3">
          
          <div class="form-group">
            <label>Nama User</label>
          <input type="text" name="nama_user" autocomplete="off" value="<?=$row->nama_user;?>" required placeholder="Masukkan Modal" class="form-control" cols="30" rows="3">
          </div>

          <div class="form-group">
            <label>Password Baru</label>
          <input type="password" name="password" autocomplete="off" required value="<?=$row->password;?>" class="form-control" cols="30" rows="3">
          </div>
           <div class="form-group">
            <label>Nama Anak</label>
     
            <select name="id_user" class="form-control" selected="">

               <option value="<?php echo $row->id_anak;?>"><?php echo $row->nama_lengkap;?></option>


            <?php 
          foreach ($data_anak->result() as $anak) {
           ?>
              <option value="<?php echo $anak->id_anak;?>"><?php echo $anak->nama_lengkap;?></option>


        <?php } ?>
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
<!--/ Modal Tambah -->
<div class="row">
  <div id="modal-tambah" class="modal fade">
    <div class="modal-dialog">
 
<form action="<?php echo base_url('index.php/dashboard/post_pengguna')?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data Orang Tua</h4>
        </div>
        <div class="modal-body">
 
          <div class="form-group">
            <label>Nama User</label>
          <input type="text" name="nama_user" autocomplete="off" required="" class="form-control" cols="30" rows="3">
          </div>
<div class="form-group">
            <label>Password</label>
            <input type="text" name="password" autocomplete="off" required="" class="form-control" cols="30" rows="3">
              </div>
  <div class="form-group">
            <label>Nama Anak</label>
     
            <select name="id_user" class="form-control" selected="">

               <option value="<?php echo $row->id_anak;?>"><?php echo $row->nama_lengkap;?></option>


            <?php 
          foreach ($data_anak->result() as $anak) {
           ?>
              <option value="<?php echo $anak->id_anak;?>"><?php echo $anak->nama_lengkap;?></option>


        <?php } ?>
            </select>
          
          </div>
         <div class="form-group">
            <label>Hak Akses</label>
     
            <select name="hak_akses" class="form-control">
            
              <option value="admin">admin</option>
  <option value="orang_tua">orang_tua</option>
  <option value="terapis">terapis</option>
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
    <strong>Copyright &copy; 2017 <a href="#">Teknologi</a>.</strong> All rights
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
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/admin/dist/js/demo.js"></script>
<!-- page script -->
<script src="<?php echo base_url();?>assets/admin/plugins/ckeditor-full/ckeditor.js"></script>

</body>
</html>