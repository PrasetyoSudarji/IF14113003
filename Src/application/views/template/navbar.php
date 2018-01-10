<div class="container top" style="background:#000; padding-top: 20px;"  >
<nav class="navbar navbar-inverse " >

      <ul class="nav navbar-nav">
	  <?php
			if (!$this->session->has_userdata('login')){
				echo "<li class=";if($link=='home'){echo 'active';}echo "><a href='".base_url()."'><i class='fa fa-home' aria-hidden='true'></i> &nbsp&nbsp&nbspHome </a></li>";

			}else{
				if($_SESSION['status']=='non-active'){
					echo "<li class=";if($link=='home'){echo 'active';}echo "><a href='".base_url()."'><i class='fa fa-home' aria-hidden='true'></i><b> &nbsp&nbspHome </b></a></li>";
				}else{
					if($_SESSION['level'] < 3){
						echo "<li class=";if($link=='home'){echo 'active';}echo "><a href='".base_url()."'><i class='fa fa-home' aria-hidden='true'></i><b> &nbsp&nbspHome </b></a></li>";
						echo "<li class='dropdown'>
				              <a class='dropdown-toggle' data-toggle='dropdown' href='#''><span class='fa fa-calendar'></span> 
				              <b> &nbsp&nbspKegiatan </b><span class='caret'></span></a>
				                <ul class='dropdown-menu'>
				                  <li class=";if($link=='lihat_kegiatan'){echo 'active';}echo "><a href='".base_url()."index.php/kegiatan'><i class='fa fa-table' aria-hidden='true'></i> Lihat Kegiatan </a></li>
				                  ";
				                  if($_SESSION['jabatan']=="Admin"){
				                  	echo "<li class=";if($link=='tambah_kegiatan'){echo 'active';}echo "><a href='".base_url()."index.php/kegiatan/tambah'><i class='fa fa-plus' aria-hidden='true'></i> Tambah Kegiatan </a></li>";
				                  }
				                echo "</ul>
				              </li>";
						
						echo "<li class='dropdown'>
				              <a class='dropdown-toggle' data-toggle='dropdown' href='#''><span class='fa fa-envelope'></span> 
				              <b> &nbsp&nbspSurat dan Edaran </b><span class='caret'></span></a>
				                <ul class='dropdown-menu'>
				                  <li class=";if($link=='lihat_surat'){echo 'active';}echo "><a href='".base_url()."index.php/suratEdaran'><i class='fa fa-table' aria-hidden='true'></i> Lihat Surat </a></li>
				                  <li class=";if($link=='lihat_edaran'){echo 'active';}echo "><a href='".base_url()."index.php/suratEdaran/edaran'><i class='fa fa-table' aria-hidden='true'></i> Lihat Edaran </a></li>
				                  ";
				                  if($_SESSION['level']==2){
				                  	echo "<li class=";if($link=='tambah_surat'){echo 'active';}echo "><a href='".base_url()."index.php/suratEdaran/tambahSurat'><i class='fa fa-plus' aria-hidden='true'></i> Tambah Surat</a></li>";
				                  	echo "<li class=";if($link=='tambah_edaran'){echo 'active';}echo "><a href='".base_url()."index.php/suratEdaran/tambahEdaran'><i class='fa fa-plus' aria-hidden='true'></i> Tambah Edaran </a></li>";
				                  }
				                echo "</ul>
				              </li>";
						echo "<li class='dropdown'>
				              <a class='dropdown-toggle' data-toggle='dropdown' href='#''><span class='fa fa-money'></span> 
				              <b> &nbsp&nbspKeuangan </b><span class='caret'></span></a>
				                <ul class='dropdown-menu'>
				                  <li class=";if($link=='rekapitulasi'){echo 'active';}echo "><a href='".base_url()."index.php/rekapitulasi'><i class='fa fa-book' aria-hidden='true'></i> Kas-Rekapitulasi </a></li>
				                  <li class=";if($link=='iuran'){echo 'active';}echo "><a href='".base_url()."index.php/iuran'><i class='fa fa-table' aria-hidden='true'></i> Iuran </a></li>
				                  ";
				                  if($_SESSION['jabatan']=="Bendahara"){
				                  	echo "<li class=";if($link=='pembayaranIuran'){echo 'active';}echo "><a href='".base_url()."index.php/iuran/pembayaran'><i class='fa fa-plus' aria-hidden='true'></i> Pembayaran Iuran </a></li>";
				                  }
				                echo "</ul>
				              </li>";
						
						echo "<li class='dropdown'>
				              <a class='dropdown-toggle' data-toggle='dropdown' href='#''><span class='fa fa-group'></span> 
				               <b> &nbsp&nbspSumber Daya </b><span class='caret'></span></a>
				                <ul class='dropdown-menu'>";
				                  
				                  	echo "<li class=";if($link=='view_anggota'){echo 'active';}echo "><a href='".base_url()."index.php/anggota'><i class='fa fa-table' aria-hidden='true'></i> Lihat Anggota </a></li>";
				                  	if($_SESSION['jabatan']=='Admin' || $_SESSION['jabatan'] == 'Ketua'){
				                  		echo "<li class=";if($link=='lihat_request_anggota'){echo 'active';}echo "><a href='".base_url()."index.php/anggota/request'><i class='fa fa-plus' aria-hidden='true'></i> Request Anggota </a></li>";
				                  		echo "<li class=";if($link=='pindah_anggota'){echo 'active';}echo "><a href='".base_url()."index.php/anggota/pindah'><i class='fa fa-retweet' aria-hidden='true'></i> Pindah Anggota </a></li>";
				                  		echo "<li class=";if($link=='lihat_request_perpindahan'){echo 'active';}echo "><a href='".base_url()."index.php/anggota/viewRequestPindah'><i class='fa fa-bell' aria-hidden='true'></i> Request Perpindahan </a></li>";
				                  	}
				                  
				                echo "</ul>
				              </li>";
		          	}else if($_SESSION['level'] >= 3){
			          	echo "<li class='dropdown'>
			              <a class='dropdown-toggle' data-toggle='dropdown' href='#''><span class='fa fa-envelope'></span> 
			              <b> &nbsp&nbspSurat dan Edaran </b><span class='caret'></span></a>
			                <ul class='dropdown-menu'>
			                  <li class=";if($link=='lihat_surat'){echo 'active';}echo "><a href='".base_url()."index.php/suratEdaran'><i class='fa fa-table' aria-hidden='true'></i> Lihat Surat </a></li>
			                  <li class=";if($link=='lihat_edaran'){echo 'active';}echo "><a href='".base_url()."index.php/suratEdaran/edaran'><i class='fa fa-table' aria-hidden='true'></i> Lihat Edaran </a></li>
			                  ";
			                  
		                  	echo "<li class=";if($link=='tambah_surat'){echo 'active';}echo "><a href='".base_url()."index.php/suratEdaran/tambahSurat'><i class='fa fa-plus' aria-hidden='true'></i> Tambah Surat</a></li>";
		                  	echo "<li class=";if($link=='tambah_edaran'){echo 'active';}echo "><a href='".base_url()."index.php/suratEdaran/tambahEdaran'><i class='fa fa-plus' aria-hidden='true'></i> Tambah Edaran </a></li>";
			                echo "</ul>
			              </li>";

			            if($_SESSION['level'] == 3){
			            	echo "<li class='dropdown'>
				              <a class='dropdown-toggle' data-toggle='dropdown' href='#''><span class='fa fa-group'></span> 
				               <b> &nbsp&nbspSumber Daya </b><span class='caret'></span></a>
				                <ul class='dropdown-menu'>";
			                  	echo "
			                  	<li class=";if($link=='view_anggota_kabupaten'){echo 'active';}echo "><a href='".base_url()."index.php/anggota/viewKabupatenKota'><i class='fa fa-table' aria-hidden='true'></i> Lihat Anggota </a></li>";
				                echo "</ul>
				              </li>";
			          	}else if($_SESSION['level'] == 4){
				          	echo "<li class='dropdown'>
				              <a class='dropdown-toggle' data-toggle='dropdown' href='#''><span class='fa fa-group'></span> 
				               <b> &nbsp&nbspSumber Daya </b><span class='caret'></span></a>
				                <ul class='dropdown-menu'>";
			                  	echo "
			                  	<li class=";if($link=='view_provinsi'){echo 'active';}echo "><a href='".base_url()."index.php/anggota/viewProvinsi'><i class='fa fa-table' aria-hidden='true'></i> Lihat Anggota </a></li>";
				                echo "</ul>
				              </li>";
			          	}else if($_SESSION['level'] == 5){
			          		echo "<li class='dropdown'>
				              <a class='dropdown-toggle' data-toggle='dropdown' href='#''><span class='fa fa-group'></span> 
				               <b> &nbsp&nbspSumber Daya </b><span class='caret'></span></a>
				                <ul class='dropdown-menu'>";
			                  	echo "
			                  	<li class=";if($link=='view_provinsi'){echo 'active';}echo "><a href='".base_url()."index.php/anggota/viewNasional'><i class='fa fa-table' aria-hidden='true'></i> Lihat Anggota </a></li>";
				                echo "</ul>
				              </li>";
			          	}
		          	}
				}
				
			}
	  ?>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="padding-right: 10px;">
      <?php
        if (!$this->session->has_userdata('login')){
          echo '<li><a href="#" data-toggle="modal" data-target="#register-modal"><span class="fa fa-user-plus glyphicon-plus"></span><b> Register </b></a></li>';
          echo '<li><a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span><b> Login </b></a></li>';
        }else{
           ?>
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <b>&nbsp&nbsp<?php 
              	echo $_SESSION['nama'];
              ?>
               </b><span class='caret'></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?=base_url()?>index.php/Logout" onclick="return confirm('Yakin akan keluar dari sistem?')"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
                </ul>
              </li>
            </ul>
            
          <?php
          }
        ?>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="loginmodal-container">
              <h1>Login to Your Account</h1><br>
              <form method="POST" action="<?=base_url()?>index.php/Login">
                <input type="text" name="user" placeholder="Username">
                <input type="password" name="pass" placeholder="Password">
                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="loginmodal-container">
              <h1>Create Your Account</h1><br>
              <form method="POST" action="<?=base_url()?>index.php/register">
              	<input type="text" name="inputNama" placeholder="Fullname">
                <input type="text" name="inputUser" placeholder="Username">
                <input type="password" name="inputPass" placeholder="Password">
                <input type="password" name="inputPassConfirm" placeholder="Confirm Password">
                <input type="submit" name="login" class="login loginmodal-submit" value="Register">
              </form>
            </div>
          </div>
        </div>

      </ul>
</nav>
</div>
    

<div class="container" style="background:#fff;min-height:500px; box-shadow:0px -6px 22px 0px rgba(0, 0, 0, 0.2);">
    <div class="row">