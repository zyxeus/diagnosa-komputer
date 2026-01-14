<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
    <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Cek My PC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="image">
                <img src="/assets/dist/img/user2-160x160.jpg"
                    class="img-circle elevation-2"
                    alt="Admin Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile.edit') }}" class="d-block">
                    {{ Auth::guard('admin')->user()->name ?? Auth::guard('admin')->user()->email }}
                </a>
                <small class="text-muted">
                    {{ Auth::guard('admin')->user()->email }}
                </small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/" target="_blank" class="nav-link text-primary">
                <i class="nav-icon fas fa-external-link-alt"></i>
                <p>
                    Kunjungi Situs
                </p>
                </a>
            </li>

            <li class="nav-item menu-open">
                <a href="/admin/dashboard" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>
                    Basis Pengetahuan
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/gejala" class="nav-link">
                        <i class="fas fa-search nav-icon" style="font-size: 0.8rem;"></i>
                        <p>Kelola Gejala</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/kerusakan" class="nav-link">
                        <i class="fas fa-exclamation-triangle nav-icon" style="font-size: 0.8rem;"></i>
                        <p>Kelola Kerusakan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/solusi" class="nav-link">
                        <i class="fas fa-tools nav-icon" style="font-size: 0.8rem;"></i>
                        <p>Kelola Solusi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/proses" class="nav-link">
                        <i class="fas fa-stethoscope nav-icon" style="font-size: 0.8rem;"></i>
                        <p>Kelola Proses</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="/admin/user" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>
                    Users
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/riwayat" class="nav-link">
                <i class="fas fa-file-alt nav-icon"></i>
                <p>
                    Riwayat Diagnosa
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/testimoni" class="nav-link">
                <i class="fas fa-comment-alt nav-icon"></i>
                <p>
                    Testimoni Pengguna
                </p>
                </a>
            </li>

            <li class="nav-item">
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="#" class="nav-link text-danger"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>

            </ul>
        </nav>

    </div>
</aside>
