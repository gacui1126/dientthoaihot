<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="{{asset("adminlte/dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Trang Admin</span>
    </a>

    <div class="sidebar">
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset("adminlte/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh mục sản phẩm

              </p>
            </a>
          </li>
        </ul>
      </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link">
                <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Sản phẩm
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('slide.index')}}" class="nav-link">
                <i class="nav-icon fab fa-slideshare"></i>
              <p>
                Slide
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
              <p>
                Danh sách thành viên
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('roles.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Danh sách phân quyền
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('admin.bill.index')}}" class="nav-link">
                <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Đơn hàng
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
