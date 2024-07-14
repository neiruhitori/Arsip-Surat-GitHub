<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item {{ Request::is('arsip') ? 'menu-open' : '' }}">
                <a href="/arsip" class="nav-link {{ Request::is('arsip') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-star"></i>
                    <p>
                        Arsip
                    </p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('kategori') ? 'menu-open' : '' }}">
                <a href="/kategori" class="nav-link {{ Request::is('kategori') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Kategori Surat
                    </p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('about') ? 'menu-open' : '' }}">
                <a href="/about" class="nav-link {{ Request::is('about') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>
                        About
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
