<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
       
    <span class="app-brand-logo demo">
       <img src="img/logo2.png" width="170px" height="190px" alt="">
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
    <li class="menu-item">
        <a href="{{url('/dashboard')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    @endguest
    

    <!-- Layouts -->
    @role('admin')
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">Layouts</div>
        </a>

        <ul class="menu-sub">
        <li class="menu-item">
            <a href="{{ route('kategori_produk.index') }}" class="menu-link">
            <div data-i18n="Without menu">Kategori Produk</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('barang_masuk.index') }}" class="menu-link">
            <div data-i18n="Without navbar">Barang Masuk</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('produk.index') }}" class="menu-link">
            <div data-i18n="Container">Produk</div>
            </a>
        </li>
        </ul>
    </li>
    @endrole

    @role('user')
    
    @endrole

    {{-- <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Pages</span>
    </li> --}}
    <!-- Forms & Tables -->
    {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li> --}}
    <!-- Forms -->
    <!-- Tables -->
    {{-- <li class="menu-item">
        <a href="ecommerce.produk.index" class="menu-link">
        <i class="menu-icon tf-icons bx bx-table"></i>
        <div data-i18n="Tables">Tables</div>
        </a>
    </li> --}}
    
</ul>
</aside>
<!-- / Menu -->