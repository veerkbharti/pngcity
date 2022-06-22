  <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="{{url('/')}}">PNGCity</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 2.0
      </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ url('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ url('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  {{-- <!-- Summernote  -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
  <!-- DataTables  & Plugins -->
  <script src="{{ url('admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ url('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ url('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <!-- Tags Input -->
  <script src="{{ url('admin_assets/plugins/tagsinput/tagsinput.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ url('admin_assets/dist/js/adminlte.js') }}"></script>
  <script src="{{ url('admin_assets/dist/js/scripts.js') }}"></script>

  <script>
      $(function() {
          $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
      });

      //   $(function() {
      //       $('#post_content').summernote({
      //           height: 200,
      //       });
      //   })




  </script>
  </body>

  </html>
