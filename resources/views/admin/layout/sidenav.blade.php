<nav class="vertnav navbar navbar-light">
  <!-- nav bar -->
  <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ url('deshboard/default') }}">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-sm"
              xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
              y="0px" viewBox="0 0 120 120" xml:space="preserve">
              <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
          </svg>
      </a>
  </div>
  <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
          <a href="#dashboard" data-toggle="collapse" aria-expanded="false"
              class="dropdown-toggle nav-link">
              <i class="fe fe-home fe-16"></i>
              <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ url('deshboard') }}"><span
                          class="ml-1 item-text">E-commerce</span></a>
              </li>
          </ul>
      </li>
  </ul>
  <p class="text-muted nav-heading mt-4 mb-1">
      <span>Components</span>
  </p>
  <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
          <a href="#ui-elements" data-toggle="collapse" aria-expanded="false"
              class="dropdown-toggle nav-link">
              <i class="fe fe-box fe-16"></i>
              <span class="ml-3 item-text">Category Elements</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('category.index') }}"><span
                          class="ml-1 item-text">Category</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('subcategory.index') }}"><span
                          class="ml-1 item-text">Sub Category</span></a>
              </li>

          </ul>
      </li>
      <li class="nav-item w-100">
          <a class="nav-link" href="{{ route('admin.index') }}">
              <i class="fe fe-layers fe-16"></i>
              <span class="ml-3 item-text">Admins</span>
              <span class="badge badge-pill badge-primary">New</span>
          </a>
      </li>
      <li class="nav-item dropdown">
          <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-credit-card fe-16"></i>
              <span class="ml-3 item-text">Products</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="forms">
              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('product.index') }}"><span
                          class="ml-1 item-text">Basic Products</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('brand.index') }}"><span
                          class="ml-1 item-text">Brand Products</span></a>
              </li>
          </ul>
      </li>
      
      <li class="nav-item dropdown">
          <a href="#units" data-toggle="collapse" aria-expanded="false"
              class="dropdown-toggle nav-link">
              <i class="fe fe-pie-chart fe-16"></i>
              <span class="ml-3 item-text">Units</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="units">

              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{route('unit.index')}}"><span
                          class="ml-1 item-text">All Unit</span></a>
              </li>
          </ul>
      </li>
  </ul>
  <p class="text-muted nav-heading mt-4 mb-1">
      <span>Apps</span>
  </p>
  <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
          <a href="#size_color" data-toggle="collapse" aria-expanded="false"
              class="dropdown-toggle nav-link">
              <i class="fe fe-book fe-16"></i>
              <span class="ml-3 item-text">Size Color</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="size_color">
              <a class="nav-link pl-3" href="{{ route('color.index') }}"><span class="ml-1">Color List</span></a>
              <a class="nav-link pl-3" href="{{ route('size.index') }}"><span class="ml-1">Size List</span></a>
          </ul>
      </li>

  </ul>

  <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
          <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-file fe-16"></i>
              <span class="ml-3 item-text">Pages</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{url('order_manage')}}">
                      <span class="ml-1 item-text">Orders</span>
                  </a>
              </li>

              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('error') }}">
                      <span class="ml-1 item-text">Page 404</span>
                  </a>
              </li>

          </ul>
      </li>
  </ul>

  <p class="text-muted nav-heading mt-4 mb-1">
      <span>Documentation</span>
  </p>
  <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
          <a class="nav-link" href="#">
              <i class="fe fe-help-circle fe-16"></i>
              <span class="ml-3 item-text">Getting Start</span>
          </a>
      </li>
  </ul>
  <div class="btn-box w-100 mt-4 mb-1">
      <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Buy now</span>
  </div>
</nav>