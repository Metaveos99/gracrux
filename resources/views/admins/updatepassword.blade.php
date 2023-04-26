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

    <title>Profile</title>

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

          
           <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link " href="adminprofile"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="/adminupdatepassword"
                        ><i class="bx bx-key me-1"></i> Update Password</a
                      >
                    </li>
                    
                  </ul>
                  <div class="card mb-4">
                      
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Current Password </label>
                            <input
                              class="form-control"
                              type="password"
                              id="firstName"
                              name="firstName"
                              placeholder="Current Password"
                              minlength="8"
                              maxlength="12"
                              required
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">New Password</label>
                            <input class="form-control" type="password" name="newpassword" id="lastName" placeholder="New Password" minlength="8"
                              maxlength="12"
                              required/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Confirm Password</label>
                            <input
                              class="form-control"
                              type="password"
                              id="email"
                              name="confirmpassword"
                              placeholder="Confirm Password"
                              minlength="8"
                              maxlength="12"
                              required
                            />
                          </div>
                          
                          
                          
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- / Content -->
            

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  All Rights Reserved 
                </div>
                
              </div>
            </footer>
            <!-- / Footer -->

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
      document.getElementById('adminprofile').classList.add('active')
    </script>

  </body>
</html>
