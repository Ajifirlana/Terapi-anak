<?php 

$tgl_sekarang = date("Y");
$tgl_exp ="2023";
        if ($tgl_sekarang >=$tgl_exp) {
         ?>

      <script type="text/javascript" language="javascript">
                alert("Masa Berlaku Telah Habis Silahkan Hubungi Programmer...!!!");
              </script>
       <?php }else{?>        
       
<body class="hold-transition login-page">



<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo base_url()?>uploads/terapi.jpg" width="100px" height="100px">
    <br>
   
   <h3>SISTEM INFORMASI PENJADWALAN TERAPI ANAK 
BERKEBUTUHAN KHUSUS</h3>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo" align="center">
      <?php
          echo $this->session->flashdata('msg');
          ?>
  

    </div>

    <p class="login-box-msg">Silahkan login di bawah ini.</p>

    <form action="<?php echo base_url();?>index.php/login_anak/aksi_login" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" id="user" placeholder="Username" autofocus required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="pass" class="form-control" placeholder="Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div align="center" class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id="kirim" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>


    </form>
  </div>
</div>
<?php }?>
