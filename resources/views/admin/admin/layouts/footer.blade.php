  <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="https://allpngfree.com">AllPNGFree</a>.</strong>
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
  <script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <!-- Tags Input -->
  <script src="{{ url('admin/plugins/tagsinput/tagsinput.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ url('admin/dist/js/adminlte.js') }}"></script>

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

        const categoryList = (value) => {
            if (value === "") {
                $("#CategoryList").css("display", "none")
                console.log(value)
            } else {
                $.ajax({
                    url: "http://127.0.0.1:8000/api/superadmin/category/load-category",
                    type: "POST",
                    data: {
                        value,
                    },
                    success: function(data) {
                        if (data == 0) {
                            $("#CategoryList").css("display", "none");
                            $("#categoryId").val("");
                        } else {
                            $("#CategoryList").css("display", "block");
                            $("#CategoryList .CategoryItemBox").html(data);
                        }
                    },
                });
            }

        }

        // $("#CategoryList .CategoryItem")
        $(document).on("click", "#CategoryList .CategoryItem", function() {
            $("#category").val($(this).text());
            const catId = $(this).data("catid")
            $("#categoryId").val(catId);
            $("#CategoryList").css("display", "none");
        });
    </script>
  </body>

  </html>
