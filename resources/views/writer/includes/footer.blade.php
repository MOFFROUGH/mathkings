<footer class="main-footer">
  <div class="pull-right hidden-xs">

  </div>
  <strong>Copyright &copy; {{Carbon\Carbon::now()->year }}<a href="https://userfinlte.io"> MyMathKings</a>.</strong> All rights
  reserved.
</footer>

<script src="{{asset('userfin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('userfin/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('userfin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('userfin/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('userfin/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('userfin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('userfin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('userfin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('userfin/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('userfin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('userfin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('userfin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Slimscro-->
<script type="{{asset('userfin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('userfin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('userfin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('userfin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('userfin/dist/js/demo.js')}}"></script>
<script src="{{asset('userfin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('userfin/bower_components/datatables.net/js/jquery.dataTables.js')}}"></script>

<script src="{{asset('userfin/dist/sweetalert-dev.js')}}"></script>
<script src="{{asset('userfin/dist/sweetalert.min.js')}}"></script>

<script src="{{asset('userfin/ckeditor/ckeditor.js')}}"></script>



<script src="{{asset('userfin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('userfin/bower_components/datatables.net-bs/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('userfin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script type="text/javascript">
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<script type="text/javascript">

  $(document).ready(function(){

        $('.select2').select2()

  });
</script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>



<!-- SlimScroll -->
