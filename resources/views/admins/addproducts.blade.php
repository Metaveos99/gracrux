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

    <title>Add Products</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="admin/assets/img/favicon/favicon.ico" />

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
                      <h5 class="mb-0">Add Product</h5> 
                     
                    </div>
                    <div class="card-body">
                      <form action="{{route('add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Product Name</label>
                          <input type="text" name="pname" class="form-control" id="basic-default-fullname" placeholder="Hair Oil" required/>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Price</label>
                          <input type="number" name="price" class="form-control" id="bprice" placeholder="1200" required/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Discount</label>
                          <input type="number" name="discount" class="form-control" id="bdiscount" placeholder="20%"required />
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Discount Price</label>
                          <input type="number" name="dprice" class="form-control" id="bdprice" placeholder="850" readonly />
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Category</label>
                          <input type="text" name="category" class="form-control" id="basic-default-company" placeholder="Oil"required />
                        </div>
                        
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">Description</label>
                          <textarea
                            id="basic-default-message" name="description"
                            class="form-control"
                            placeholder="Best Oil For Hair growth"required
                          ></textarea>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="mb-3">
                              <label for="formFile" class="form-label">Image 1</label>
                              <input class="form-control" name="img1" accept=".jpg, .png, .jpeg" type="file" id="formFile" required/>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <label for="formFile" class="form-label">Image 2</label>
                              <input class="form-control" name="img2" accept=".jpg, .png, .jpeg" type="file" id="formFile" required/>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <label for="formFile" class="form-label">Image 3</label>
                              <input class="form-control" name="img3" accept=".jpg, .png, .jpeg" type="file" id="formFile" required/>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <label for="formFile" class="form-label">Image 4</label>
                              <input class="form-control" name="img4" accept=".jpg, .png, .jpeg" type="file" id="formFile" required/>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="mb-3">
                              <label for="formFile" class="form-label">Image 5</label>
                              <input class="form-control" name="img5" accept=".jpg, .png, .jpeg" type="file" id="formFile" required/>
                            </div>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>
                    </div>
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
      document.getElementById('adminproducts').classList.add('active')
    </script>

  <script>

  $(document).ready(function(){

    $('#bprice').keyup(function(){

      $pr =  $('#bprice').val();

      $dis = $('#bdiscount').val();

      $d = ($pr/100)*$dis

      $val = Math.round($pr -$d)

      $('#bdprice').val($val)

    });


    $('#bdiscount').keyup(function(){

      $pr =  $('#bprice').val();

      $dis = $('#bdiscount').val();

      $d = ($pr/100)*$dis

      $val = Math.round($pr -$d)

      $('#bdprice').val($val)

     });




  });

  </script>


  </body>
</html>
