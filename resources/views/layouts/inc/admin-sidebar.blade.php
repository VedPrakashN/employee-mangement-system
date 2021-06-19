<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Employee
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ Request::is('admin/add-employee') ? 'show':'' }} {{ Request::is('admin/view-employee') ? 'show':'' }}"
                id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ Request::is('admin/add-employee') ? 'active':'' }}" href="{{ url('admin/add-employee') }}">Add Employee</a>
                    <a class="nav-link {{ Request::is('admin/view-employee') ? 'active':'' }}" href="{{ url('admin/view-employee') }}">View Employee</a>
                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Roles & Permission</div>
            <a class="nav-link" href="{{ url('admin/users') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Users
            </a>
            <a class="nav-link" href="{{ url('admin/roles') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Roles
            </a>
            {{-- <a class="nav-link" href="{{ url('admin/permissions') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Permission
            </a> --}}
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
