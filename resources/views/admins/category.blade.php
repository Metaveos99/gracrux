<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="admin/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Add Category</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="grafavicon.png" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="admin/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="admin/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="admin/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="admin/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="admin/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <x-sidebar/>
        
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <x-navbar/>

          
          <div class="container mt-5">
          <div class="card mb-4">
                @if (session('success'))

                <div class="alert alert-success">
                  <span class="text-dark">
                    {{session('success')}}
                  </span>
                </div>

                @elseif (session('fail'))
                <div class="alert alert-danger">
                  <span class="text-dark">
                    {{session('fail')}}
                  </span>
                </div>

                @endif

                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add Category</h5> 
                     
                    </div>
                    <div class="card-body">
                      <form action="{{route('addcategory')}}" method="post">
                        @csrf

                        <div class="row d-flex align-items-end">
                          <div class="col-md-8">
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-fullname">Category Name</label>
                              <input type="text" name="cname" class="form-control" id="basic-default-fullname" placeholder="Hair Oil" required/>
                            </div>

                          </div>

                          <div class="col-md-4 mb-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                          </div>

                        </div>
                        
                      </form>
                    </div>
                  </div>


                  <div class="card">
                        <h5 class="card-header">Categories</h5>
                        <div class="table-responsive text-nowrap p-1">
                          <table class="table " id="example1">
                            <thead>
                              <tr>
                                <th>Sr</th>
                                <th>Name</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <span class="d-none">  {{$a=0}}
                             </span>
                              @foreach ($data as $cat )
                              <span class="d-none">
                                {{++$a}}
                              </span> 
                              <tr>
                                <td>{{$a}}</td>
                                <td>{{$cat['name']}}</td>
                                <td>
                                  <form action="{{route('delcategory')}}" method="post">
                                    @csrf
                                    <button type="submit" name="delcat"
                                    value="{{$cat['id']}}" class="btn btn-danger">Delete</button>
                                  </form>
                                </td>
        
                              </tr>
                                
                              @endforeach
        
                           
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!--/ Basic Bootstrap Table -->
                    </div>


          </div>


          
 
            

            

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="admin/assets/vendor/js/bootstrap.js"></script>
    <script src="admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="admin/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="admin/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
      document.getElementById('admincat').classList.add('active')
    </script>

  <!-- DataTables  & Plugins -->
<script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="admin/plugins/jszip/jszip.min.js"></script>
<script src="admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


  </body>
</html>
