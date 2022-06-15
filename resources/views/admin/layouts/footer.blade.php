  <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="https://pngcity.com">PNGCity</a>.</strong>
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
  <!-- Summernote  -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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


      function categoryList(search) {
          const category = $("#category").val();
          if (category === "") {
              $('#addCategoryBtn').attr('disabled', true);
          } else {
              $('#addCategoryBtn').attr('disabled', false);
          }
          if (search === "") {
              $("#CategoryList").hide();
          } else {
              $("#CategoryList").show();
              $.ajax({
                  url: "{{ url('/') }}/api/superadmin/category/list",
                  type: "GET",
                  data: {
                      search,
                  },
                  success: function(data) {
                      $('#CategoryList').html(data);
                  }
              });
          }
      }
      // $("#CategoryList .CategoryItem")
      $(document).on("click", "#CategoryList .CategoryItem", function() {
          $("#category").val($(this).text());
          $("#CategoryList").css("display", "none");
      });

      function addCategory() {
          const category = $("#category").val();
          $.ajax({
              url: "{{ url('/') }}/api/superadmin/category/add",
              type: "GET",
              data: {
                  category,
              },
              success: function(data) {
                  var post_category = $("#post_category").val();
                  if (post_category === "") {
                      post_category = category;
                  } else {
                      post_category = $("#post_category").val() + "," + category;
                  }
                  $("#post_category").val(post_category);
                  $("#category").val("");
                  $('#addCategoryBtn').attr('disabled', true);
              }
          });
      }


  </script>
  </body>

  </html>
