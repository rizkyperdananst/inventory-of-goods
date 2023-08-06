<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link {{ Request()->is('admin/dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Pages</li>
      <li class="nav-item">
        <a class="nav-link {{ Request()->is('admin/category*') ? 'active' : '' }}" href="{{ route('category.index') }}">
          <i class="fa-solid fa-sitemap me-2"></i>
          <span class="menu-title">Kategory</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request()->is('admin/goods*') ? 'active' : '' }}" href="{{ route('goods.index') }}">
          <i class="fa-solid fa-sitemap me-2"></i>
          <span class="menu-title">Barang</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request()->is('admin/supplier*') ? 'active' : '' }}" href="{{ route('supplier.index') }}">
          <i class="fa-solid fa-truck-field me-2"></i>
          <span class="menu-title">Supplier</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request()->is('admin/buy*') ? 'active' : '' }}" href="{{ route('buy.index') }}">
          <i class="fa-solid fa-cart-shopping me-2"></i>
          <span class="menu-title">Pembelian</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-floor-plan"></i>
          <span class="menu-title">UI Elements</span>
          <i class="menu-arrow"></i> 
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li> --}}
      <li class="nav-item nav-category">Auth</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
        <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">User</span>
        </a>
      </li>
    </ul>
  </nav>