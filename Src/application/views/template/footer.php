            </div>
        <!--end row -->
        </div>
    <!--end conatiner -->
    </div>

<div class="container footer" style="background:#000; height: 50px; text-align: center; ">
  
</div>
<script language='javascript'>
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

  $(document).ready(function() {
      $('#list').DataTable();
  });
</script>
</body>
</html>