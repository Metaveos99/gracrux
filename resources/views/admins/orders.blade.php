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

    <title>Orders</title>

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
            <div class="card">

            @if (session('message'))
              <div class="alert alert-success">
                 <span class="text-dark">{{session('message')}} </span> 
              </div>
            @endif

                <h5 class="card-header">Orders</h5>
                <div class="table-responsive text-nowrap p-1">
                  <table class="table " id="example1">
                    <thead>
                      <tr>
                        <th>Order Id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                      @foreach ($data as $pro )

                      <tr>
                        <td>{{$pro->order_id}}</td>
                        <td style="max-width:1rem; overflow-wrap: break-word; white-space: normal;">{{$pro->productname}}</td>
                        <td>{{$pro->price}}</td>
                        <td>{{$pro->discount}}</td>
                        <td>{{$pro->quantity}}</td>
                        <td>{{$pro->total}}</td>
                        <td>{{$pro->status}}</td>
                        <td>{{$pro->order_date}}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow "  data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="z-index:99">
                              
                            <a class="dropdown-item open-modal-btn" href="javascript:void(0);" data-value="{{$pro['order_id']}}" data-bs-toggle="modal" data-bs-target="#myModal"
                              ><i class="bx bx-edit-alt me-1"></i> Edit status</a
                            >
                              <a class="dropdown-item open-modal-btns" href="javascript:void(0);" data-value="{{$pro['order_id']}}" data-bs-toggle="modal" data-bs-target="#myModal1"
                                ><i class="bx bx-image me-1"></i> Delivery Details</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                        
                      @endforeach

                   
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
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




    <!-- The Modal -->
    <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Status</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form action="updatedeliverystatus" method="post">
                        @csrf

                      <div id="new" style="display:none">
                        <label for="validationCustomUsername" class="form-label">Sr</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" id="sr" name="sr" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        </div>
                      </div>  

                      <div class="mt-3" >
                        <label for="validationCustomUsername" class="form-label">Status</label>
                        <div class="input-group has-validation">
                          <select name="status" id="dstatus" class="form-control">
                            <option value="Ordered">Ordered</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Out For Delivery">Out For Delivery</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                          </select>
                        </div>
                      </div>  


                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" name="bdyu" class="btn btn-primary">Update</button>
                </div>
                
              </form>
                  </div>
                </div>
        </div>
<!-- The Modal -->



<!-- The Modal -->
<div class="modal" id="myModal1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Delivery Details</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form >
                        @csrf

                      <div id="new" style="display:none">
                        <label for="validationCustomUsername" class="form-label">Sr</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" id="sr1" name="sr" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        </div>
                      </div>  

                      <div class="mb-3">
                        <label for="validationCustomUsername" class="form-label">Full Name</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" id="dname" id="validationCustomUsername" aria-describedby="inputGroupPrepend" readonly>
                        </div>
                      </div>  

                      <div class="mb-3">
                        <label for="validationCustomUsername" class="form-label">Number</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" id="dnumber" id="validationCustomUsername" aria-describedby="inputGroupPrepend" readonly>
                        </div>
                      </div>  

                      <div class="mb-3">
                        <label for="validationCustomUsername" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" id="demail" id="validationCustomUsername" aria-describedby="inputGroupPrepend" readonly>
                        </div>
                      </div>  
                      
                      <div class="mb-3">
                        <label for="validationCustomUsername" class="form-label">City</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" id="dcity" id="validationCustomUsername" aria-describedby="inputGroupPrepend" readonly>
                        </div>
                      </div>  

                      <div class="mb-3">
                        <label for="validationCustomUsername" class="form-label">State</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" id="dstate" id="validationCustomUsername" aria-describedby="inputGroupPrepend" readonly>
                        </div>
                      </div>  

                      <div class="mb-3">
                        <label for="validationCustomUsername" class="form-label">Zip</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" id="dzip" id="validationCustomUsername" aria-describedby="inputGroupPrepend" readonly>
                        </div>
                      </div>
                      
                      <div class="mb-3">
                        <label for="validationCustomUsername" class="form-label">Address</label>
                        <div class="input-group has-validation">
                          <textarea class="form-control" id="daddress" cols="30"  readonly></textarea>  
                        </div>
                      </div>  
                      

                     

                </div>
                
              
                
              </form>
                  </div>
                </div>
        </div>
<!-- The Modal -->


    

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


    <script>
      document.getElementById('adminorders').classList.add('active')
    </script>


<script>
    $(".open-modal-btn").click(function() {
      const data = JSON.parse($(this).attr("data-value"));
      
      $.get("deliverystatus", {
        datas: JSON.stringify(data)
      }, function(response) {
        
        $('#sr').val(response.order_id);
        $('#dstatus').val(response.status);
       
      });
    });

    $(".open-modal-btns").click(function() {
      const data = JSON.parse($(this).attr("data-value"));
      
      $.get("deliverydetails", {
        datas: JSON.stringify(data)
      }, function(response) {
        
        $('#sr1').val(response.order_id);
        $('#dname').val(response.bill_name);
        $('#dnumber').val(response.number);
        $('#demail').val(response.email);
        $('#dcity').val(response.city);
        $('#dstate').val(response.state);
        $('#dzip').val(response.zip);
        $('#daddress').val(response.address);
        
      });
    });



  </script>





  </body>
</html>
