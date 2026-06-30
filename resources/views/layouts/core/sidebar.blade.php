<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ url('home') }}" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" 
            alt="AdminLTE Logo" 
            class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light"> CEMS </span>
            </a>
        </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation"
            >

                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-gear"></i>
                        <p>
                            Settings
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('users') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('organizations') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Manage Organizations</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('students') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Manage Students</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="./generate/theme.html" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Theme Generate</p>
                    </a>
                </li>
            </ul>
            </nav>
    </div>
    </aside>