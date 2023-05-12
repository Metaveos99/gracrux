<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="/adminhome" class="app-brand-link">
              <img src="gralogo.png" class="img-fluid" alt="" srcset="">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item" id="adminhome">
              <a href="/adminhome" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item" id="adminproducts">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-shopping-bags"></i>
                <div data-i18n="Layouts">Products</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="/allproducts" class="menu-link">
                    <div data-i18n="Without menu">All Products</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/addproducts" class="menu-link">
                    <div data-i18n="Without menu">Add Product</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/editproducts" class="menu-link">
                    <div data-i18n="Without navbar">Edit product</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('del')}}" class="menu-link">
                    <div data-i18n="Container">Remove Product</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item" id="admincat">
              <a href="{{route('category')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Boxicons">Add Category</div>
              </a>
            </li>

            <!-- Extended components -->
            <li class="menu-item" id="adminorders">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-purchase-tag"></i>
                <div data-i18n="Extended UI">Orders</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('adminorder')}}" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Orders Placed</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('deliveredorder')}}" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Completed Orders</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('admincancelorder')}}" class="menu-link">
                    <div data-i18n="Text Divider">Canceled Orders</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item" id="adminus">
              <a href="{{route('users')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Boxicons">Users</div>
              </a>
            </li>

            

            <li class="menu-item" id="admintrans">
              <a href="{{route('transactions')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-rupee"></i>
                <div data-i18n="Boxicons">Transactions</div>
              </a>
            </li>
            
            <li class="menu-item" id="adminprofile">
              <a href="/adminprofile" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Boxicons">Profile</div>
              </a>
            </li>
            
            <li class="menu-item" id="adminprofile">
            <form action="logout" method="post">
                        @csrf
              <button class="dropdown-item ms-1" type="submit">
                <i class="bx bx-power-off ms-2 me-2"></i>
                <span class="align-middle">Log Out</span>
              </button>
              </form>
            </li>

            
          </ul>
        </aside>