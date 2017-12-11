<div class="container top" style="background:#000; height: 50px;"  >
<nav class="navbar navbar-inverse ">

      <ul class="nav navbar-nav">
	  <?php
			if ($_SESSION['login'] == null){
				echo "<li class=";if($link=='home'){echo 'active';}echo "><a href='".base_url()."'><i class='fa fa-home' aria-hidden='true'></i> Home </a></li>";
			}else{
				echo "<li class=";if($link=='home'){echo 'active';}echo "><a href='".base_url()."index.php/menu'><i class='fa fa-home' aria-hidden='true'></i> Home </a></li>";
			}
	  ?>
      </ul>
  
</nav>
</div>
    

<div class="container" style="background:#fff;min-height:500px; box-shadow:0px -6px 22px 0px rgba(0, 0, 0, 0.2);">
    <div class="row">