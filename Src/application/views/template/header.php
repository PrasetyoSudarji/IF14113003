<!DOCTYPE html>
<html lang="en">
  <head>
	<title>SAMSAK (Sistem Aplikasi Manajemen Sumberdaya Anggota Karate)</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/logo_bkc.jpg">    
    <!-- CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/template-login/css/login_modal.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/DataTables/DataTables-1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/mine/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/mine/css/button.css">
    <link href="<?=base_url()?>assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <!-- jQuery library -->
    <script src="<?=base_url()?>assets/jquery/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?=base_url()?>assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/DataTables/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
    <!-- Other Library -->  
    <link rel="stylesheet" href="<?=base_url()?>assets/fontawesome/css/font-awesome.min.css">
    
  </head>
  <body >
<div class="container" style="background:#fff;margin-top:0px; padding-top:30px; padding-bottom:15px; border-bottom:solid thin #e8e8e8; box-shadow:         0px -6px 22px 0px rgba(0, 0, 0, 0.2); border-radius: 0px;">

      <div class="container">
      <div class="row ">
        <div class="col-md-1">
            <a href='<?=base_url();?>'>
              <img src="<?=base_url()?>assets/img/logo_bkc.jpg" width="80px" height="80px" style="margin-bottom:10px; "/>
            </a>
        </div>
        <div class="col-md-9">
          <h3><b>SAMSAK (Sistem Aplikasi Manajemen Sumberdaya Anggota Karate) </b></h3>
          <p><em>"<b>
              <?php
                if(!$this->session->has_userdata('kode_dojo')){
                  echo "Website for Karate Management In Indonesia";
                }else{
                  echo $_SESSION['nama_dojo']." (".$_SESSION['kode_dojo'].")";
                }
              ?>
            </b>"</em></p>
        </div>
        <div class="col-md-2">
            <p class="text-right" >
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <a href="https://www.facebook.com/groups/155324169181/" style="color: #000;"><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></a>
            </span>&nbsp;&nbsp;&nbsp;
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <a href="#" style="color: #000;"><i class="fa fa-instagram fa-stack-1x fa-inverse"></i></a>
            </span>&nbsp;&nbsp;&nbsp;
            </p>
        </div>
      </div>
    </div>
    </div>

    