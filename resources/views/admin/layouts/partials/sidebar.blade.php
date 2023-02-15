<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">MRS</span>
    </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <!-- Dashboard -->
            <li class="nav-item">
              <a href="{{ url('/dashboard') }}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <!-- Medicines -->
            <li class="nav-item {{ (request()->is('medicines*')) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ (request()->is('medicines*')) ? 'active' : '' }}">
                <i class="nav-icon fab fa-product-hunt"></i>
                <p>
                  Medicines
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('medicines/') }}" class="nav-link {{ (request()->is('medicines/type*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Medicines</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('medicines/type') }}" class="nav-link {{ (request()->is('medicines/type*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('medicines/formulae') }}" class="nav-link {{ (request()->is('medicines/formulae*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Formulae</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('medicines/brand') }}" class="nav-link {{ (request()->is('medicines/brand*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Brand</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('medicines/company') }}" class="nav-link {{ (request()->is('medicines/company*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Company</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('medicines/category') }}" class="nav-link {{ (request()->is('medicines/category*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('medicines/symptom') }}" class="nav-link {{ (request()->is('medicines/symptom*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Symptoms</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('medicines/body_part') }}" class="nav-link {{ (request()->is('medicines/body_part*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Body Parts</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('medicines/dosage') }}" class="nav-link {{ (request()->is('medicines/dosage*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dosage</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('medicines/age') }}" class="nav-link {{ (request()->is('medicines/age*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Age</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- CMS -->
            <li class="nav-item {{ (request()->is('cms*')) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ (request()->is('cms*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  CMS
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('cms/genral-settings/') }}" class="nav-link {{ (request()->is('cms/genral-settings*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Genral Settings</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('cms/home-page/') }}" class="nav-link {{ (request()->is('cms/home-page*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Home Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('cms/about-page/') }}" class="nav-link {{ (request()->is('cms/about-page*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('cms/shop-page/') }}" class="nav-link {{ (request()->is('cms/shop-page*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Shop Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('cms/smart-doctor/') }}" class="nav-link {{ (request()->is('cms/smart-doctor*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Smart Doctor Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('cms/search-medicine-page/') }}" class="nav-link {{ (request()->is('cms/search-medicine-page*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Search Medicine Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('cms/contact-page/') }}" class="nav-link {{ (request()->is('cms/contact-page*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contact Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('cms/terms-conditions/') }}" class="nav-link {{ (request()->is('cms/terms-conditions*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Terms & Conditions Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('cms/privacy-policy/') }}" class="nav-link {{ (request()->is('cms/privacy-policy*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Privacy Policy Page</p>
                  </a>
                </li>
                  
              </ul>
            </li>

            <!-- News -->
            <li class="nav-item">
              <a href="{{ url('/newss') }}" class="nav-link {{ (request()->is('newss*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-newspaper "></i>
                <p>News</p>
              </a>
            </li>

            <!-- Testimonial -->
            <li class="nav-item">
              <a href="{{ url('/testimonial') }}" class="nav-link {{ (request()->is('testimonial*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-comments"></i>
                <p>Testimonials</p>
              </a>
            </li>

            <!-- Coupon Code -->
            <li class="nav-item">
              <a href="{{ url('/coupon') }}" class="nav-link {{ (request()->is('coupon*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-gift"></i>
                <p>Coupons Code</p>
              </a>
            </li>

            <!-- Tax  -->
            <li class="nav-item">
              <a href="{{ url('/tax') }}" class="nav-link {{ (request()->is('tax*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-percent"></i>
                <p>Tax Rate</p>
              </a>
            </li>

            <!-- Shipping Charges  -->
            <li class="nav-item">
              <a href="{{ url('/shipping') }}" class="nav-link {{ (request()->is('shipping*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-shipping-fast"></i>
                <p>Shipping Charges</p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>