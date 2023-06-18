<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('dashboard') }}" class="app-brand-link">

      <span class="app-brand-text demo menu-text fw-bolder ms-2">Inventory</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <!-- Layouts -->

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Data Master</span>
    </li>

    <!-- Tables -->
    <li class="menu-item {{ request()->is('inventory*') ? 'active' : '' }}">
      <a href="{{ route('inventory.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-package"></i>
        <div data-i18n="Tables">Data Inventaris</div>
      </a>
    </li>
    <li class="menu-item {{ request()->is('warehouse*') ? 'active' : '' }}">
      <a href="{{ route('warehouse.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home"></i>
        <div data-i18n="Tables">Data Gudang</div>
      </a>
    </li>
    {{-- <li class="menu-item {{ request()->is('inventory*') ? 'active' : '' }}">
      <a href="{{ route('inventory.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-data"></i>
        <div data-i18n="Tables">Data Unit</div>
      </a>
    </li> --}}
    <li class="menu-item {{ request()->is('history*') ? 'active' : '' }}">
      <a href="{{ route('history.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-history"></i>
        <div data-i18n="Tables">History</div>
      </a>
    </li>

  </ul>
</aside>
