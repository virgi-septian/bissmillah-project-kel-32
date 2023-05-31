<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
       
    <span class="app-brand-logo demo">
       <img src="{{ asset('img/logo2.png') }}" width="170px" height="190px" alt="">
    </span>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
    <!-- Dashboard -->
    @guest
    <li class="menu-item">
        <a href="{{url('/')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Halaman Login</div>
        </a>
    </li>
    @else
    <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{url('/dashboard')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    @endguest
    

    <!-- Data Master -->
    @role('owner')
        <li class="menu-item {{ Request::is('data-master*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Data Master</div>
            </a>

            <li class="menu-item">
            <a href="{{ route('menu.map.index') }}" class="menu-link">
            <i class="menu-icon bi bi-gear"></i>
            <div data-i18n="Layouts">MAP</div>
            </a>
        </li>

            <ul class="menu-sub">
            <li class="menu-item {{ Request::is('data-master/obat*') ? 'active' : ''}}">
                <a href="{{ route('data-master.obat.index') }}" class="menu-link">
                <div data-i18n="Without menu">Katalog Obat</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('data-master/stock-obat*') ? 'active' : ''}}">
                <a href="{{ route('data-master.stock-obat.index') }}" class="menu-link">
                <div data-i18n="Without menu">Stok Obat</div>
                </a>
            </li>
            
            <li class="menu-item {{ Request::is('') ? 'active' : ''}}">
                <a href="#" class="menu-link">
                <div data-i18n="Container">Data Pengeluaran</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('') ? 'active' : ''}}">
                <a href="#" class="menu-link">
                <div data-i18n="Container">Data Penjualan</div>
                </a>
            </li>
            </ul>
        </li>
        <li class="menu-item {{ Request::is('transaksi*') ? 'active open' : ''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon bi bi-cash-coin"></i>
            <div data-i18n="Layouts">Transaksi</div>
            </a>

            <ul class="menu-sub">
            <li class="menu-item {{ Request::is('transaksi/penjualan*') ? 'active open' : ''}}">
                <a href="{{ route('transaksi.penjualan.index') }}" class="menu-link">
                <div data-i18n="Without menu">Penjualan Barang</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                <div data-i18n="Without menu">Belanja Barang</div>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="#" class="menu-link">
                <div data-i18n="Container">Laporan Penjualan</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('transaksi/supplier*') ? 'active open' : ''}}">
                <a href="{{ route('transaksi.supplier.index') }}" class="menu-link">
                <div data-i18n="Container">Data Supplier</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <div data-i18n="Container">Opname Barang</div>
                </a>
            </li>
            </ul>
        </li>
        <!-- Data -->


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Setting</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
            <i class="menu-icon bi bi-gear"></i>
            <div data-i18n="Layouts">Setting</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('setting.usermanagement') }}" class="menu-link">
            <i class="menu-icon bi bi-person"></i>
            <div data-i18n="Layouts">User Management</div>
            </a>
        </li>
    @endrole
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Menu</span>
    </li>
    <li class="menu-item">
        <a href="{{ route('menu.map.index') }}" class="menu-link">
        <i class="menu-icon bi bi-gear"></i>
        <div data-i18n="Layouts">MAP</div>
        </a>
    </li>
    @role('gudang')
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
        <i class="menu-icon bi bi-capsule"></i>
        <div data-i18n="Layouts">Katalog Obat</div>
        </a>
        <a href="javascript:void(0);" class="menu-link">
        <i class="menu-icon menu-icon bi bi-box-seam"></i>
        <div data-i18n="Layouts">Stok Obat</div>
        </a>
        <a href="javascript:void(0);" class="menu-link">
        <i class="menu-icon bi bi-capsule-pill"></i>
        <div data-i18n="Layouts">Opname Barang</div>
        </a>
    </li>
    @endrole
    @role('kasir')
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link">
        <i class="menu-icon bi bi-box-seam"></i>
        <div data-i18n="Layouts">Stok Obat</div>
        </a>
        <a href="javascript:void(0);" class="menu-link">
        <i class="menu-icon bi bi-cart3"></i>
        <div data-i18n="Layouts">Transaksi Penjualan</div>
        </a>
    </li>
    @endrole
</ul>
</aside>
<!-- / Menu -->