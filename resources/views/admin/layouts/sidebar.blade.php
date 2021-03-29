<nav id="sidebar">
    <div class="sidebar-header">
        <i class="fa fa-user"></i><h3 class="d-inline m-l-10">Administrator</h3>
    </div>

    <ul class="list-unstyled components m-l-10">
        <li>
            <a class="active" href="{{ route('adminDashboard') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('usersIndex') }}">Manage Users</a>
        </li>
        <li>
            <a href="{{route('permissionsIndex')}}">Manage Permissions</a>
        </li>
        <li>
            <a href="{{route('rolesIndex')}}">Manage Roles</a>
        </li>
        <li>
            <a href="{{route('departmentsIndex')}}">Manage Departments</a>
        </li>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Portfolio</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
    </ul>
</nav>