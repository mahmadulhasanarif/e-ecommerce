  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">@if (Auth::user())
              {{ Auth::user()->name }}
          @else
              Admin
          @endif</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Category 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Create</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Subcategory Page
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('subcategory.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>subcat Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('subcategory.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subcat Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Brand Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('brand.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('brand.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand Create</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Unit Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('unit.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('unit.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Create</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Size Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('size.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Size Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('size.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Size Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Color Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('color.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Color Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('color.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Color Create</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Product Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Payment Method
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('payment.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('payment.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Create</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Shiping Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('shiping.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shiping Index</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('shiping.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shiping Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('order.index') }}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Order Page
              </p>
            </a>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  