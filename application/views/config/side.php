<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <ul class="sidebar-menu">
        <li class="header">Selamat Datang <?php echo $this->session->userdata('username'); ?>

<br>
          

  ID : <?php echo $this->session->userdata('id_user');?><?php echo $this->session->userdata('id_anak');?>
        </li>
        
      </ul>

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li class="header">DATA MASTER</li>
        
        
         <?php 
        if ($this->session->userdata('hak_akses') == 'admin') {

         ?>

<li class="treeview">
          <a href="<?php echo base_url();?>dashboard">
             <i class="fa fa-files-o"></i> <span>Terapis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
    
        </li>
        <li class="treeview">
          <a href="<?php echo base_url();?>index.php/dashboard/anak_terapis">
           <i class="fa fa-files-o"></i> <span>Anak Terapis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
    
        </li>
        <li class="treeview">
          <a href="<?php echo base_url();?>index.php/dashboard/jadwal_terapis">
           <i class="fa fa-files-o"></i> <span>Jadwal Terapi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
    
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Terapis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url();?>index.php/dashboard/user"><i class="fa fa-inbox"></i>Data Pengguna</a></li>

          </ul>
        </li>
      <?php } ?>
      <?php 
        if ($this->session->userdata('hak_akses') == 'orang_tua') {
         ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>ORANG TUA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="<?php echo base_url();?>dashboard/orangtua"><i class="fa fa-inbox"></i>Data Jadwal Anak</a></li>
          <li><a href="<?php echo base_url();?>dashboard/profile"><i class="fa fa-inbox"></i>Profile</a></li>
          </ul>

        </li>
       
      <?php } ?>

       <?php 
        if ($this->session->userdata('level') == 'User') {
         ?>
         <li class="treeview">
          <a href="<?php echo base_url();?>index.php/dashboard/kegiatan_user">
            <i class="fa fa-files-o"></i> <span>Kegiatan</span>
          </a>
        </li>
         <li class="treeview">
          <a href="<?php echo base_url();?>index.php/dashboard/kirimlaporan">
            <i class="fa fa-files-o"></i> <span>Kirim Laporan Kegiatan</span>
          </a>
        </li>

           <?php } ?>
     
         
       
      <li class="treeview">
          <a href="<?php echo base_url();?>index.php/login/logout">
            <i class="fa fa-user"></i> <span>Logout</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
    
        </li>
        </ul>

    
    </section>
    <!-- /.sidebar -->
  </aside>