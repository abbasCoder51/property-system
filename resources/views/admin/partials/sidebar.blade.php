<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.properties.index') }}">
        <div class="sidebar-brand-text mx-3">Property System Admin</div>
    </a>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Property
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.properties.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Properties</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.countries.index') }}">
            <i class="fas fa-fw fa-globe"></i>
            <span>Countries</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.counties.index') }}">
            <i class="fas fa-fw fa-leaf"></i>
            <span>Counties</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.property-types.index') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Property Types</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.towns.index') }}">
            <i class="fas fa-fw fa-building"></i>
            <span>Towns</span>
        </a>
    </li>

    <hr class="sidebar-divider">
</ul>
