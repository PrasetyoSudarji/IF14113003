<div class="container top" style="background:#000; padding-top: 20px;"  >
<nav class="navbar navbar-inverse " >

      <ul class="nav navbar-nav">
	  <?php
			if ($_SESSION['login'] == null){
				echo "<li class=";if($link=='home'){echo 'active';}echo "><a href='".base_url()."'><i class='fa fa-home' aria-hidden='true'></i> &nbsp&nbsp&nbspHome </a></li>";

			}else{
				echo "<li class=";if($link=='home'){echo 'active';}echo "><a href='".base_url()."index.php/home'><i class='fa fa-home' aria-hidden='true'></i> Home </a></li>";
				echo "<li class=";if($link=='kegiatan'){echo 'active';}echo "><a href='".base_url()."'><i class='fa fa-calendar' aria-hidden='true'></i> &nbsp&nbsp&nbspKegiatan </a></li>";
				echo "<li class=";if($link=='surat_edaran'){echo 'active';}echo "><a href='".base_url()."'><i class='fa fa-envelope' aria-hidden='true'></i> &nbsp&nbsp&nbspSurat dan Edaran </a></li>";
				echo "<li class=";if($link=='keuangan'){echo 'active';}echo "><a href='".base_url()."'><i class='fa fa-money' aria-hidden='true'></i> &nbsp&nbsp&nbspKeuangan </a></li>";
				echo "<li class=";if($link=='sumber_daya'){echo 'active';}echo "><a href='".base_url()."'><i class='fa fa-group' aria-hidden='true'></i> &nbsp&nbsp&nbspSumber Daya </a></li>";
				if($_SESSION['level'] > 1){
					echo "<li class=";if($link=='administrasi'){echo 'active';}echo "><a href='".base_url()."'><i class='fa fa-edit' aria-hidden='true'></i> &nbsp&nbsp&nbspAdministrasi </a></li>";
				}
			}
	  ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
        if ($_SESSION['login'] == null){
          echo '<li><a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>';
        }else{
           ?>
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> &nbsp&nbsp&nbsp<?php 
              	echo $nameUser;
              ?>
               <span class='caret'></span></a>
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
      </ul>
</nav>
</div>
    

<div class="container" style="background:#fff;min-height:500px; box-shadow:0px -6px 22px 0px rgba(0, 0, 0, 0.2);">
    <div class="row">