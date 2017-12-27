<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Samsak.id</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/logo.png">    
    <!-- CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/template-login/css/login_modal.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/DataTables/DataTables-1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/mine/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/mine/css/button.css">

    <!-- jQuery library -->
    <script src="<?=base_url()?>assets/jquery/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?=base_url()?>assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/DataTables/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>
    <!-- Other Library -->  
    <link rel="stylesheet" href="<?=base_url()?>assets/fontawesome/css/font-awesome.min.css">
    
  </head>
  <body >
<div class="container" style="background:#fff;margin-top:0px; padding-top:30px; padding-bottom:15px; border-bottom:solid thin #e8e8e8; box-shadow:         0px -6px 22px 0px rgba(0, 0, 0, 0.2); border-radius: 0px;">

      <div class="container">
      <div class="row ">
        <div class="col-md-1">
            <a href='<?=base_url();?>'>
              <img src="<?=base_url()?>assets/img/logo.png" width="70px" style="margin-bottom:10px; "/>
            </a>
        </div>
        <div class="col-md-5">
          <h3><b>Samsak.id</b></h3>
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
        <div class="col-md-6">
            <p class="text-right" >
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <a href="https://twitter.com/itera_PTN" style="color: #000;" ><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></a>
            </span>&nbsp;&nbsp;&nbsp;
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <a href="https://www.facebook.com/itera.official/" style="color: #000;"><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></a>
            </span>&nbsp;&nbsp;&nbsp;
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <a href="https://www.instagram.com/iteraofficial/" style="color: #000;"><i class="fa fa-instagram fa-stack-1x fa-inverse"></i></a>
            </span>&nbsp;&nbsp;&nbsp;
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <a href="https://www.youtube.com/results?search_query=itera" style="color: #000;"><i class="fa fa-youtube fa-stack-1x fa-inverse"></i></a>
            </span>&nbsp;&nbsp;&nbsp;
            </p>
        </div>
      </div>
    </div>
    </div>

    <script language='javascript'>
      $(document).ready(function() {
          $('#list').DataTable();
      } );
    </script>
