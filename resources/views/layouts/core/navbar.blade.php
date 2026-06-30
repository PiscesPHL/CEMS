<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!--end::Navbar Search-->

            

            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img
                        src="{{ auth()->user()->display_photo }}"
                        class="user-image rounded-circle shadow"
                        alt="User Image"
                    />
                    <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        <img src="{{ auth()->user()->display_photo }}" class="rounded-circle shadow" alt="User Image" />
                        <p>
                            {{ auth()->user()->name }} - Web Developer
                            <small>Member since {{ auth()->user()->member_since }}</small>
                        </p>
                    </li>
                    <!--end::User Image-->
                    
                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <a href="{{ url('users-account', auth()->user()->id) }}/edit" class="btn btn-outline-secondary"> Edit Profile</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-danger float-end">Sign out</a>
                        <form action="{{ route('logout') }}" id="logout-form" method="post" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
