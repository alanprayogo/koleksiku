<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (Auth::check())
            @if (Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard-admin') }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('show-category') }}">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Kategori</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('show-book') }}">
                        <i class="icon-book menu-icon"></i>
                        <span class="menu-title">Buku</span>
                    </a>
                </li>
            @elseif(Auth::user()->role == 'user')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard-user') }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
            @endif
        @endif
    </ul>
</nav>
