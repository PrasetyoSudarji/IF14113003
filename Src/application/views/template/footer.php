            </div>
        <!--end row -->
        </div>
    <!--end conatiner -->
    </div>

<div class="container footer" style="background:#000; height: 50px; text-align: center; ">
  
</div>
<script language='javascript'>

  function updateUser(id) {
      var ajaxRequest;
    
      try {
        ajaxRequest = new XMLHttpRequest(); //Opera 8.0+, Firefox, Safari
      } catch(e) {
        //Untuk IE
        try {
          ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e) {
          try {
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
          } catch(e) {
            alert("Gagal karena browser anda tidak mendukung ajax");
            return false;
          }
        }
      }

      ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == 4) {
          var ajaxTampil = document.getElementById('placeholderUser');
          ajaxTampil.innerHTML = ajaxRequest.responseText;
        }
      }
      var url="<?=base_url()?>index.php/anggota/edit?id="+id;
      
      ajaxRequest.open("GET",url,true);
      ajaxRequest.send(null);
  }

  function viewKegiatan(id) {
      var ajaxRequest;
    
      try {
        ajaxRequest = new XMLHttpRequest(); //Opera 8.0+, Firefox, Safari
      } catch(e) {
        //Untuk IE
        try {
          ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e) {
          try {
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
          } catch(e) {
            alert("Gagal karena browser anda tidak mendukung ajax");
            return false;
          }
        }
      }

      ajaxRequest.onreadystatechange = function() {
        if (ajaxRequest.readyState == 4) {
          var ajaxTampil = document.getElementById('placeholderKegiatan');
          ajaxTampil.innerHTML = ajaxRequest.responseText;
        }
      }
      var url="<?=base_url()?>index.php/kegiatan/view?id="+id;
      
      ajaxRequest.open("GET",url,true);
      ajaxRequest.send(null);
  }

  $('.form_date').datetimepicker({
    language:  'id',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.form_datetime').datetimepicker({
    language:  'id',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1
    });

  $(document).ready(function() {
      $('#list').DataTable();
  });


</script>
</body>
</html>