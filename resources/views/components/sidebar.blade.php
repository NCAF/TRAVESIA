<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard"> <img alt="image" src="{{ asset('admin/assets/img/logo.png') }}" class="header-logo" />
                <span class="logo-name">Travesia</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ Request::path() === 'dashboard' ? 'active' : '' }}">
                <a href="/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>


            </li>
            <li class="menu-header">Destinasi</li>
            <li class="dropdown {{ Request::path() === 'destinasi' ? 'active' : '' }}"><a class="nav-link"
                    href="/destinasi"><i data-feather="map-pin"></i><span>Destinasi</span></a>
            </li>
            <li class="menu-header">Pemesanan</li>
            <li class="dropdown {{ Request::path() === 'pemesanan' ? 'active' : '' }}"><a class="nav-link"
                    href="/pemesanan"><i data-feather="clock"></i><span>Pemesanan</span></a>
            </li>
            <li class="menu-header">Chat</li>
            <li class="dropdown {{ Request::path() === 'Chat' ? 'active' : '' }}"><a class="nav-link"
                    href="/chat"><i data-feather="message-circle"></i><span>Chat</span></a>
            </li>

        </ul>
    </aside>
</div>