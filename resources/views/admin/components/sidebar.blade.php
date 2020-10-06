<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin')}}" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="{{route('admin')}}" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview {{ (request()->is('admin/contacts*')) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link  {{ (request()->is('admin/contacts*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-address-book"></i>
                  <p>
                    Contacts
                    <i class="right fas fa-angle-left"></i>
                    <span class="badge badge-info right">1</span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('appointment.index')}}" class="nav-link {{ (request()->is('admin/contacts/appointment')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Contact Manager</p>
                      </a>
                    </li>      
                </ul>
              </li>
             {{--  Doctor --}}
             <li class="nav-item has-treeview {{ (request()->is('admin/doctors*')) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ (request()->is('admin/doctors*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Doctors
                  <i class="right fas fa-angle-left"></i>
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('occupation.index')}}" class="nav-link {{ (request()->is('admin/doctors/occupation')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Occupation Manager</p>
                    </a>
                  </li>         

                  <li class="nav-item">
                    <a href="{{route('doctor.index')}}" class="nav-link {{ (request()->is('admin/doctors/doctor')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Doctor Manager</p>
                      </a>
                  </li>   
                              
              </ul>
            </li>
            {{--  Doctor --}}
           {{--  Research --}}
           <li class="nav-item has-treeview {{ (request()->is('admin/researches*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/researches*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Researches
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">  
                  <li class="nav-item">
                    <a href="{{route('type.index')}}" class="nav-link {{ (request()->is('admin/researches/type')) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Disease Type Manager</p>
                      </a>
                    </li>    
                    <li class="nav-item">
                      <a href="{{route('disease.index')}}" class="nav-link {{ (request()->is('admin/researches/disease')) ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Disease Manager</p>
                        </a>
                      </li>   
                      <li class="nav-item">
                        <a href="{{route('research.index')}}" class="nav-link {{ (request()->is('admin/researches/research')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Research Manager</p>
                          </a>
                        </li>  
            </ul>
          </li>
            {{--  Research --}}
          {{--   Product --}}
          <li class="nav-item has-treeview {{ (request()->is('admin/products*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/products*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{ (request()->is('admin/products/category')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                  </a>
                </li>      
                <li class="nav-item">
                  <a href="{{route('image.index')}}" class="nav-link {{ (request()->is('admin/products/image')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Images</p>
                    </a>
                </li>   
                <li class="nav-item">
                  <a href="{{route('product.index')}}" class="nav-link {{ (request()->is('admin/products/product')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Products</p>
                    </a>
                  </li>       
                  
            </ul>
          </li>
          {{--   Product --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>